var fs = require('fs');
var json = JSON.parse(fs.readFileSync('secret/secret.json', 'utf8'));
var settings = fs.readFileSync('../wiki/conf/LocalSettings.php', 'utf8');

var secret = '$wgDBname = "' + json.services.wiki.dbname + '";' + '\n';
secret += '$wgDBuser = "' + json.services.mysql.user + '";' + '\n';
secret += '$wgDBpassword = "' + json.services.mysql.password + '";';

if (!settings.includes(secret)) {
    fs.appendFileSync('../wiki/conf/LocalSettings.php', '\n' + secret);
}
