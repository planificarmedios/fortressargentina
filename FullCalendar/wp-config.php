<?php
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
define( 'DB_NAME', 'calendar' );

/** MySQL database username */
define( 'DB_USER', 'medinilla' );

/** MySQL database password */
define( 'DB_PASSWORD', 'LFln785@' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'E_d5rFG/fhY8}2C,U^:b2nn{}K5S;ejn.qPCgP|wL1VAE5g`iA?`*{htCt!V[}Sd' );
define( 'SECURE_AUTH_KEY',  ';2qR8AaRgWFSICBo!4,3a+5s5p%Bt?_C|(^!fD?YfYEA2t+=`5dI)HEy(HL;;RLT' );
define( 'LOGGED_IN_KEY',    ':tp9KwYWqTqem[&QPo+80N!P@n7i@_~btQM%-T!d)6oKLiCDRi(IL0V1e(6)b_6x' );
define( 'NONCE_KEY',        'ASe>sl%I4G}3<Rio.;~|PVOydZOn^ZZ>lIF|v5X,iJrjoScSJ?@cqGs?c~NmsZMe' );
define( 'AUTH_SALT',        'KX8=Av5Avtjo~}46R>@A)rKW){a$)}1:%In&Zsa4]5K1gCcfgwCS:HhPy01!B[tE' );
define( 'SECURE_AUTH_SALT', 'c,NnbrDt|i7cFy&o+p=R`hq0B)%J>5c=3#nP;DZ`5b]iIAFrGRg@4CM(;?<`#,gM' );
define( 'LOGGED_IN_SALT',   'y5Tz3J5vwK~| m5l)Iq]t?zJ;X-N1TW]WWWymMe<A4^zqPi$DGVjJ.cvJ)uky6=>' );
define( 'NONCE_SALT',       's+]QJ,)nzf%8$o6 !dX@rI66bAA.fe:NnL#;=B87u=dJ}og]|}ek_sfZJJ G<Abh' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
