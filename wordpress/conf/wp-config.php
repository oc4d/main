<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') ) {
    define('ABSPATH', dirname(__FILE__) . '/');
}


// ** MySQL settings - You can get this info from your web host ** //
$dbName = 'wordpress';
$dbUser = 'root';
$dbPassword = 'root';

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
 $authKey = 'd5a4940d1a2e480782621d4bc80cb82468db004a';
 $secureAuthKey = 'f6a0f04ffdd6bc0ecea501b84a7b9bea6bc6a556';
 $loggedInKey = 'e9c93911d62ea4e12985a47f372eb83352ce985b';
 $nonceKey = '5d5c115939c2b92a11c8db89f039896f4f8b7ab8';
 $authSalt = '1f54809088878b97326229075ec3f0ba3037b973';
 $secureAuthSalt = '06ca0a0cbe03a37b6474c111a4e14006522ad53e';
 $loggedInSalt = 'a51cfeac431e22dfcb5ad03049f51b872f79cb50';
 $nonceSalt = 'd7c710699f4c59b4490403c628e4381b37fbfe1a';

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'oc4d_';

if (file_exists(ABSPATH . "wp-config.overrides.php")) {
    include_once ABSPATH . "wp-config.overrides.php";
}

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/*if (empty($dockerHost)) {
    $dockerHost = "127.0.0.1";
} else {
    $dockerHost = parse_url($dockerHost, PHP_URL_HOST);
}*/
$dockerHost = $_SERVER['HTTP_HOST'];
$siteUrl = "http://" . $dockerHost;

define('WP_HOME', $siteUrl);
define('WP_SITEURL', $siteUrl);
unset($siteUrl);


define('DB_NAME', $dbName);
define('DB_USER', $dbUser);
define('DB_PASSWORD', $dbPassword);
unset($dbName);
unset($dbUser);
unset($dbPassword);
define('DB_HOST', 'mysql');
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');

define('AUTH_KEY',         $authKey);
define('SECURE_AUTH_KEY',  $secureAuthKey);
define('LOGGED_IN_KEY',    $loggedInKey);
define('NONCE_KEY',        $nonceKey);
define('AUTH_SALT',        $authSalt);
define('SECURE_AUTH_SALT', $secureAuthSalt);
define('LOGGED_IN_SALT',   $loggedInSalt);
define('NONCE_SALT',       $nonceSalt);
unset($authKey);
unset($secureAuthKey);
unset($loggedInKey);
unset($nonceKey);
unset($authSalt);
unset($secureAuthSalt);
unset($loggedInSalt);
unset($nonceSalt);

// If we're behind a proxy server and using HTTPS, we need to alert Wordpress of that fact
// see also http://codex.wordpress.org/Administration_Over_SSL#Using_a_Reverse_Proxy
if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
	$_SERVER['HTTPS'] = 'on';
}


/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
