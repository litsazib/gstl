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
define('DB_NAME', 'gstl');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'M*y7A0^-bE#]<@ [<qi!f&W]tv}9wDvxNpkAuB7>akArl=:xy47+uy3/,8PyeH`h');
define('SECURE_AUTH_KEY',  '?Lgm,X2S7EQ=H9Q6j_M|XCXOEp8?Fd4{`;&T<-:z<]+n(%NSiscVTl`sQdN+jeBb');
define('LOGGED_IN_KEY',    '4ZeQ,f3KDA+%a&R.*I_! u6+pG,j(oA@_SRJ_c{zn0-M<`C89{Kzo;5-=TtD2Y@Y');
define('NONCE_KEY',        ',50{U:Lw9t,%Ax8H!=0HYaxZ$K5{2(M;BQUj;-O#/{fn!|mbA+#$PLZ |J6=JSeo');
define('AUTH_SALT',        'Dv9yy@6M|&gkJ=*R22WIz6ynAKM Cx%X>k:qg%Ew{,(*Q|@(%CCU*KsaY5^3Hqh{');
define('SECURE_AUTH_SALT', '_*Ci#%43w+w!YtQ/444wJ2RpF]JM``9p6f<&}*tXo52z%KaQU|4Ofa6r#WZ$]%..');
define('LOGGED_IN_SALT',   'q5]So=.]#zK?6D;6P2IAkq08[E=AiaNXV%k60k[p|8HA}NHq~IFy.n7rb7j+<8y<');
define('NONCE_SALT',       '[uCC$%0(]&OZ^M/Zb]1[1!5/:uAyx*uallnh;_<fmed/#.q@1IC;rDrbN$6e&KZM');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
