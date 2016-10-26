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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'mysql');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'd5a4940d1a2e480782621d4bc80cb82468db004a');
define('SECURE_AUTH_KEY',  'f6a0f04ffdd6bc0ecea501b84a7b9bea6bc6a556');
define('LOGGED_IN_KEY',    'e9c93911d62ea4e12985a47f372eb83352ce985b');
define('NONCE_KEY',        '5d5c115939c2b92a11c8db89f039896f4f8b7ab8');
define('AUTH_SALT',        '1f54809088878b97326229075ec3f0ba3037b973');
define('SECURE_AUTH_SALT', '06ca0a0cbe03a37b6474c111a4e14006522ad53e');
define('LOGGED_IN_SALT',   'a51cfeac431e22dfcb5ad03049f51b872f79cb50');
define('NONCE_SALT',       'd7c710699f4c59b4490403c628e4381b37fbfe1a');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'oc4d_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

if (empty($dockerHost)) {
    $dockerHost = "127.0.0.1";
} else {
    $dockerHost = parse_url($dockerHost, PHP_URL_HOST);
}
$dockerHost = $_SERVER['HTTP_HOST'];
$siteUrl = "http://" . $dockerHost . ":8090";

define('WP_HOME', $siteUrl);
define('WP_SITEURL', $siteUrl);

// If we're behind a proxy server and using HTTPS, we need to alert Wordpress of that fact
// see also http://codex.wordpress.org/Administration_Over_SSL#Using_a_Reverse_Proxy
if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
	$_SERVER['HTTPS'] = 'on';
}

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
