var fs = require('fs');
var json = JSON.parse(fs.readFileSync('secret/secret.json', 'utf8'));
var settings = fs.readFileSync('../wiki/conf/LocalSettings.php', 'utf8');

var secret = '$wgDBname = "' + json.services.wiki.dbname + '";' + '\n';
secret += '$wgDBuser = "' + json.services.mysql.user + '";' + '\n';
secret += '$wgDBpassword = "' + json.services.mysql.password + '";';

if (settings.includes(secret)) {
    var i = settings.indexOf(secret);
    settings = settings.slice(0, i - 1);
    fs.writeFileSync('../wiki/conf/LocalSettings.php', settings);
}
