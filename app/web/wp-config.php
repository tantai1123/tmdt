<?php
define('WP_CACHE', true); // Added by WP Rocket
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'bitnami_wordpress' );

/** MySQL database username */
define( 'DB_USER', 'bn_wordpress' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'mariadb:3306' );

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         '(<zG]0:>XbDv2W8X}$r5KU5J^<W=8J<vp`6BIgS[Z Xi5^;y%r+NoEZ0TN/&3~{s');
define('SECURE_AUTH_KEY',  '^Jm5VAV$gb0m*@b&`ynSK22:1b.P.L831k#;Gj~~w$dOl: %)}n3(uhF4WtSs$#V');
define('LOGGED_IN_KEY',    'e!%!0{+!99T(yzrD4;S+F!~X*XD3`&7_3bCUZGOsw4+Ce@][Lpk_vu,^1IR,N,%|');
define('NONCE_KEY',        '9u_:a-e/R_mFiyr%sO-Mq;])TlSV>2y(eK8mh}/Tg2+SvNQTqSlaDnP{USR}flI0');
define('AUTH_SALT',        '#pOf|wI]57Mq*.NcY1n:Y5.Pe3!iD!}2M.aR:W-UCFN$eJA~EJ5wPq{_R]5%SbPK');
define('SECURE_AUTH_SALT', '>vmc+7Zb?.IiX5Oo|=>WCseI)suZM3Yl^+wpvhrMNONW|d4D=,j1;[sd;C=}@SBe');
define('LOGGED_IN_SALT',   'K%|{2VL[}dQ@3JPb*#[L[|Lmg:=!w^~UE&Jjo]V3:CDQK~-naxefD9yXe~uoJ1bF');
define('NONCE_SALT',       '{*O uK4W9+6TSvekL&A&C#m?6`Co%Fl,-GBMng1FX/S?!58/+$1{(r0<y);^zF0W');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'mo_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

define('WP_PLUGIN_DIR', '/bitnami/wordpress' . '/wp-content/plugins');
/* That's all, stop editing! Happy publishing. */


if ( defined( 'WP_CLI' ) ) {
  $_SERVER['HTTP_HOST'] = '127.0.0.1';
}

define('WP_SITEURL', 'http://' . $_SERVER['HTTP_HOST'] . '/');
define('WP_HOME', 'http://' . $_SERVER['HTTP_HOST'] . '/');
define('FS_METHOD', 'direct');
/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

define('WP_TEMP_DIR', '/opt/bitnami/wordpress/tmp');

if ( !defined( 'WP_CLI' ) ) {
//  Disable pingback.ping xmlrpc method to prevent WordPress from participating in DDoS attacks
//  More info at: https://wiki.bitnami.com/Applications/Bitnami_WordPress#XMLRPC_and_Pingback

// remove x-pingback HTTP header
add_filter("wp_headers", function($headers) {
            unset($headers["X-Pingback"]);
            return $headers;
           });
// disable pingbacks
add_filter( "xmlrpc_methods", function( $methods ) {
             unset( $methods["pingback.ping"] );
             return $methods;
           });
}
