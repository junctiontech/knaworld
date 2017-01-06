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
define('DB_NAME', 'lexusinfra');

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
define('AUTH_KEY',         'S$c/J326= *@cyh$$%roHTs:fZY.>%Bjh=<ftT?Amh8+AOoG<naSKj0c2j36BqN3');
define('SECURE_AUTH_KEY',  '~]SP{P4UqirG!hHa1/&11WK3[`f8z< M`IFfveegPbVQI|A|&[h*)i7%=furL:v^');
define('LOGGED_IN_KEY',    '=.^j<UZIxsx{e3vc/)c[1gSvg6|R0iM#Ed7JdF-ES_{b3U $}N&/:^k)GG1~7h5B');
define('NONCE_KEY',        'u?^T4Ji;)pBdkFM({?`.B)mdczK .Nc?*%z^8NT-LMvF%3~/h^)J:cZ1c2??6klp');
define('AUTH_SALT',        '2Sz;+AU SwNUU(). !RJngQgq92|&Zj.Y5n>1fb-~]lr6(R~O`a,W<YkBZ+,jh|t');
define('SECURE_AUTH_SALT', 's9:0a8Px+6fOb$5EV:iLF<>f&I;Ma4rVp9(/OCepP9f<<[ wX.}`J?cu~:?<EhPW');
define('LOGGED_IN_SALT',   'U*uIq[KGS.SIB^Vhe31^Hi3DoFz1U?/gH~].8qoF-?62`<78RfMuLChW_=|3Z*P`');
define('NONCE_SALT',       'X% r@CB*Qi}3mtEe}?dsU{aQ@[X3H?G8v3Z69A4#O4QTdBIa_/uoKY}W#jJ,@KgB');

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
