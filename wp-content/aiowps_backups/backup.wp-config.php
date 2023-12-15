<?php
// Begin AIOWPSEC Firewall
if (file_exists('/chroot/home/giftoco/gifto.co/html/aios-bootstrap.php')) {
	include_once('/chroot/home/giftoco/gifto.co/html/aios-bootstrap.php');
}
// End AIOWPSEC Firewall
define( 'WP_CACHE', true /* Modified by NitroPack */ ); // Added by WP Rocket

/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */

define( 'DB_NAME', 'giftoco_wp' );
define('WP_MAX_MEMORY_LIMIT', '512M');
//define('WP_MEMORY_LIMIT', '256M');
/** Database username */
define( 'DB_USER', 'giftoco_wp' );

/** Database password */
define( 'DB_PASSWORD', 'K^>c3_t9]Q/JW};M' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          'tmC*/5w]9HAh:G_ZzhP*wS7(<o6k`=$1=-GDKv!9d;Ll?#Wz=*&0}!22x6=0}F/8' );
define( 'SECURE_AUTH_KEY',   'x1$A *Tpe1J%wjDLl,ZU7wi5dW_6]5(U${f-nW*%UVPdag!K~NajPR2P@qq+nCpy' );
define( 'LOGGED_IN_KEY',     '-0De*qtejy!aoG!|nWWZ!)yzl4e(Dj*gS^g2sv#}~M~J7bh?#SX-6O&#VDa{f(' );
define( 'NONCE_KEY',         '7>57Zsk4l/*ZM=7s,oIZYTDCL8FZ.6^K?J*Z{f^inQ@-,d#Y=--E!pRIsaiiU`hO' );
define( 'AUTH_SALT',         'XlzD2_o)}1h{ib@.OQq0K&8-6k=P@x#xJLe>p!e+YNie8vV{hZKegMuh4_+iUO]o' );
define( 'SECURE_AUTH_SALT',  'vUAq!d0$FedhnC`n3QqE:4] 0=`wDR?T<2Dz`cn6Z^%Ffqv,vT?^loO ~zTXp-e!' );
define( 'LOGGED_IN_SALT',    'f+0BJDjVtc5=1 +:Dt/Ie_)WH2C^|+*3x<C0:9Fxbx#eGA:yDwOGmG:::4#z;rjW' );
define( 'NONCE_SALT',        'FtZTmV[/9zwyk=&8e<w(&dag@9j(Jc{*e17be#e7),%}#yAB%FD=_0*(5I!Zq{za' );
define( 'WP_CACHE_KEY_SALT', 'w/%bMg2%-U6;)2$r-B4=s])WQc(xpmpikO%Qa^v9P)/;lQ:>G-ac~Z#&:fxwg}yE' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'oprca_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG',false);
define( 'WP_DEBUG_LOG', false);
define('EMPTY_TRASH_DAYS',1);
define('WPFC_DISABLE_REDIRECTION', true);
define('DISABLE_WP_CRON', true);
//define( 'WP_AUTO_UPDATE_CORE', false );.
/* Add any custom values between this line and the "stop editing" line. */
	
define('WP_MEMORY_LIMIT', '2048M');
@ini_set( 'upload_max_size' , '2048M' );
@ini_set( 'post_max_size', '2048M');
@ini_set( 'memory_limit', '2048M' );
define( 'WP_AUTO_UPDATE_CORE',true);
define('ALTERNATE_WP_CRON', false);
define( 'DISABLE_WP_CRON',false);
define( 'FS_CHMOD_DIR', 0755 );
define( 'FS_CHMOD_FILE', 0644 );
#define( 'WP_REDIS_CLIENT', 'phpredis' );
#define( 'WP_REDIS_HOST', '/var/run/redis-multi-ac54d3c9.redis/redis.sock' );
#define( 'WP_REDIS_PORT', '0' );
#define( 'WP_REDIS_DATABASE', '0' );
#define( 'WP_REDIS_PREFIX', '43523f7b3b.nxcli.net' );
#define( 'WP_REDIS_TIMEOUT', '1' );
#define( 'WP_REDIS_READ_TIMEOUT', '1' );
#define( 'WP_REDIS_MAXTTL', '604800' );
#define( 'WP_REDIS_DISABLE_BANNERS', 'true' );
#define( 'WP_CACHE', true /* Modified by NitroPack */ );
/* That's all, stop editing! Happy publishing. */
//define('WPDB_PATH', ABSPATH . 'wp-includes/class-wpdb.php');
/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

set_time_limit(50000);//Disable File Edits
define('DISALLOW_FILE_EDIT', true);