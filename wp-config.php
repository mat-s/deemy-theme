<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
define('DB_NAME', 'wordpress');
define('DB_USER', 'wordpress');
define('DB_PASSWORD', 'wordpress123');
define('DB_HOST', 'db');

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
define('AUTH_KEY',         '|0*W1-OHD}}`.#fcws`Dj!|l8Av)GYY#I::] [`YJ!bAd-wlCF]J3CMWnWuUmNmm');
define('SECURE_AUTH_KEY',  'K/8FTws|5wYrJ-@vaEY-yYB{8m{{]*.C<*-$.svjsTWiq#?fV !vu&Zq4*,l/Bz]');
define('LOGGED_IN_KEY',    ': zl[~o{xcOI$bN+`uN1y+T_{N6T|wWk+!I|ux8rEdVCc`nNf+:0<Sx, qe_OFT&');
define('NONCE_KEY',        'TeR3=vY3JT($lNbK!FDO]oE`AD_-P|bw+<cZ#d+H722N|X%]}J-wx)P639g(iXx/');
define('AUTH_SALT',        'Ap+u+Eqc+{[47eXu! &jqWI0&g@p$s@x2xg0BG$Rw{!4-3wZ4 ]c~;`MF1p8%}e|');
define('SECURE_AUTH_SALT', 'ML.%nj)DAxY1s4uf53aW9]%S|18pTThHN]1M#V}@/@g$_TIVhY7{dxbQ .k7Dit}');
define('LOGGED_IN_SALT',   'OmLz(u.z3y?BPGJSA&b3x(Pv.rM&7u/FQ@&)D#fCRe*{U4*a<>Qth]%c;Js6q w[');
define('NONCE_SALT',       'F!RH2y&K/3JayVkSO_24_$-,?>zje(v|$%mb*wR5>:YEVt<Qf2T =ZV+9 p%)%H:');

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
 */
$table_prefix = 'al35kd_wp_';

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', false);

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) {
  define('ABSPATH', __DIR__ . '/wp/');
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
