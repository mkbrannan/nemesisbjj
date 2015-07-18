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
define('DB_NAME', 'nemesisbjj2');

/** MySQL database username */
define('DB_USER', 'nbjj2usr');

/** MySQL database password */
define('DB_PASSWORD', 'adwyaiuwodjpajwodgyaghwodiahwdiygawd');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         '$|Pv]m(2b$Ms BAO3CZc<|d0rQ*Y/c!jVVOm(oXBCA~}7Fh1b9;V(:gGV[r(Umg^');
define('SECURE_AUTH_KEY',  'jmUMS#)[B/rA+wNr[rJO8jC?{ax@|Yvl+wqxndszD>qeq6f_`S&XIudD4M@V#FKd');
define('LOGGED_IN_KEY',    'n$xLe.hUb]55L]#jq_,hbl=HDvIm._|2#05uX[}<</9Qvk&$Vr DF@iSywv>=IBc');
define('NONCE_KEY',        'e)w35C+#Y=ed6-$*7/t49$_25|JA+q%iS~P+!v]A~$z%f, Mjaq0)+PZf4cAUJGp');
define('AUTH_SALT',        '>Gja&^.Z/U@e|BwXS[Zv3fRH%A+--1[z/vqrCV.zOJ|Fu+!~X;$]eAFMf`iT(5l!');
define('SECURE_AUTH_SALT', '}l7|+OUmC/Js[x&QE-M+vq/FX}YUuwxE&iU@xcqmf70}~@N79s/~|PEqC@1aqKWk');
define('LOGGED_IN_SALT',   'J*OMyJYfVm 7z9B{rjzUHZB6Yc;AfBQ(|KbQYSrX/MP[-O!x*mW&0QqiVJjA:T5s');
define('NONCE_SALT',       'b9w2Dt^R?:-%fC]H6.FWP}?8|rOI+AMRNPm>L[@5YN=ZZ$6SYJ#T^fm(wNre:z3P');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
