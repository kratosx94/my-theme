<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'webshop' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         'jvD o]3S%eUCtYT 0uWLC|upvqK-10;3GGoa);~!sf1C:l(j`_Gyf#)sSY;L^lq(' );
define( 'SECURE_AUTH_KEY',  '$Ix7CjLTC5LY5yb#RdI>o>qnhhajl$y(?/AQ;N`G?:rf+pf-CR32W_2VH7DOiKBt' );
define( 'LOGGED_IN_KEY',    '1pZ;4v2l )5(UYa*8?TD5fs&?;)357Xa?F4:e~vhcy241$56VgjoJ>Ew5Fg)eaTn' );
define( 'NONCE_KEY',        'KQs$t.&W:?~ ,[3VckdJ^rb{C_BeuuYHoS]n-dCATGnkgA.hyN?~8eIy]4W<CJx3' );
define( 'AUTH_SALT',        'CCcU[a]Fy$`buVv#s~_ HARc7_;/NrTs|Uj!WN6q|2kW=~8/#Y=o%~ f^].F#nw.' );
define( 'SECURE_AUTH_SALT', 'Kw#XhTmQ= xk`zncAf0uf:12g{aSY%uU-.X[,1<t$DoBL-UoFHfDm02X6ph3OnZ_' );
define( 'LOGGED_IN_SALT',   'Uu/zH4$KF%AOq*ji)[<$w4G?u7h<e_bTS&#1Y/o_RtE-pAPrM|=RpHK}yIHRHo.8' );
define( 'NONCE_SALT',       'a4(xI]2>uz9*vW*NaN82QKP[pU^4sU$2XFvl09!FChQU2?Z~OA&VEmGbZ}z[=V@p' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
