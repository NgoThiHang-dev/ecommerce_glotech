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
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'ecommerce_glotech' );

/** Database username */
define( 'DB_USER', 'ecommerce_glotech' );

/** Database password */
define( 'DB_PASSWORD', '123456789' );

/** Database hostname */
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
define( 'AUTH_KEY',         '0Xm]i[BH.6whmgG`_; KY[A}>EEV2-2ztjuAK69ufKN(75horgk2NhD_*]GtK6wo' );
define( 'SECURE_AUTH_KEY',  '5b??YiS:$hZ/Xr$n>3onFwZiAI}J9hFxU~|:O[6;I+:}R:s{~3DD`qscC<2xDc5-' );
define( 'LOGGED_IN_KEY',    'mi[zUJoyKv,u$})Nuk1|(C^#M&*^g:x!{+v:OJa|(8ynil&Po_a=6rGHmSct|b1s' );
define( 'NONCE_KEY',        'qgi6eQ%AL!o{l fH]/~DPdu*PX?rp.Oyk*6#GL#QIjFlc9D_a0o `vkYp{rHV:U9' );
define( 'AUTH_SALT',        'tf(OwBDH^Hi,KXj=W@5>=vBFmnT:n;6gTH5.u;G&@wZG!1(;wx&AVOR6ZyV41v!_' );
define( 'SECURE_AUTH_SALT', '<{=Os`t7m`EIE7Dy_[t:?c}H|Ef)-8J/|{23?@G;.)>?@LE4Bjf&Or#):~+>HZ#n' );
define( 'LOGGED_IN_SALT',   '(br$Wt(yohn U e,S#YnQUpp+gkZSq_8JFv:Jx&.s%(?D%m_$[GYxThA;5*$9)k2' );
define( 'NONCE_SALT',       '=FIeb5[<LX .n]OX2xev:s&!Ry]K`@+wwY{ %Su:F1G?SuAYYf!nZerI G{;DX3F' );

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
