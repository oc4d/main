var path = require('path');
var fs = require('fs');

var rootDir = path.join(path.dirname(fs.realpathSync(__filename)), '../');
var args = process.argv.slice(2);
var secretsFile = args[0];

if (!secretsFile) {
    console.error([
        'Secrets file not specified!',
        '',
        'Usage:',
        '    setenv.js /tmp/production.json'
    ].join('\n'));
    process.exit(127);
}

var secrets;
try {
    console.log('Reading from ' + secretsFile);
    secrets = fs.readFileSync(secretsFile, 'utf8');
    secrets = JSON.parse(secrets);
} catch (e) {
    console.error('Unable to read secrets file!\n', e);
    process.exit(1);
}

var services = secrets.services;

function writeConfig(contents, path) {
    try {
        fs.writeFileSync(path, contents);
        console.log('Settings written to' + path);
    } catch (e) {
        console.error('Unable to write to ' + path + '\n', e);
    }
}

/***    MEDIAWIKI   ***/
var mwLocalSettings = [
    '<?php',
    '$wgDBname = "' + services.wiki.dbname + '";',
    '$wgDBuser = "' + services.mysql.user + '";',
    '$wgDBpassword = "' + services.mysql.password + '";',
    '$wgDBprefix = "' + services.wiki.dbprefix + '";',
].join('\n');
var mwConfigFile = rootDir + '/wiki/conf/LocalSettings.overrides.php';
writeConfig(mwLocalSettings, mwConfigFile);

/***    WORDPRESS    ***/
var wpLocalSettings = [
    '<?php',
    '$dbName = "' + services.wordpress.dbname + '";',
    '$dbUser = "' + services.mysql.user + '";',
    '$dbPassword = "' + services.mysql.password + '";',
    '$table_prefix = "' + services.wordpress.dbprefix + '";',
].join('\n');
var wpConfigFile = rootDir + '/wordpress/conf/wp-config.overrides.php';
writeConfig(wpLocalSettings, wpConfigFile);
