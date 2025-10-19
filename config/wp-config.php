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
define('DB_NAME', 'tbstm_db');

/** MySQL database username */
define('DB_USER', 'tbstm_db');

/** MySQL database password */
define('DB_PASSWORD', 'HqytGjHQrt5UTgJGXxXc');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         '~O!%@4k`++xZ=*@^C&olZp5?wg)nwE22@J|W/bUa;ORjaDQ&|)D}})|<1,>sz7^v');
define('SECURE_AUTH_KEY',  'l~+j)?a2v8:&|MuH-K@W=p@le}jUN$faJ_`G/y0y-QNd}qQ[#V3$EZZ~36_Pm*-1');
define('LOGGED_IN_KEY',    '&FU2F2,~=a:>H`^{f-&amIzB}8RM=&_D6#_po9T+pLtHzr{US>q @ptv`SF!<x(9');
define('NONCE_KEY',        '2NaZ%[P+Wa3gIp7*OT>YGgKt@T7TU=C18;y12X@DyG[nyv^LEo+ni`6l-`eYah#L');
define('AUTH_SALT',        '<trJf]bFyP0#g7UX,!KZHr=[*~+KEP/KnxEom6+%RDMvLE)YT@*Uboa+p?;##{Og');
define('SECURE_AUTH_SALT', '9x9;>uFG -<%I+Lvi*{A^OIt t9>|gHK[:}7E-U<+Y]`p><Z[=Dt3e_B%mD~G#(x');
define('LOGGED_IN_SALT',   'v-Et$Ojm>FFN*9dHoN+k`W3*^PqL-V8cQ*_I(HtLfX`mRHskd;P,x+Y)v<._RV-q');
define('NONCE_SALT',       ':-R&NXgqd`Ej_$&ct&R>gDr}(L<pd0_;+;[`z[~0EJc0{DJJP`dac5a|XF}$t4*u');
/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_tbcutoms_';

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
//define('WP_DEBUG', false);
define( 'WP_DEBUG', true );
define( 'WP_DEBUG_LOG', true );
define( 'WP_DEBUG_DISPLAY', false );
@ini_set( 'display_errors', 0 );

set_time_limit(300);



define('AUTOMATIC_UPDATER_DISABLED', true );

define('FS_METHOD', 'direct');
define('DISALLOW_FILE_EDIT',true);

define('GMAP_KEY', '');
define( 'ALLOW_UNFILTERED_UPLOADS', true );
define('SITE_VERSION', '1.0.1');
define('SITE_NAME', 'TBS');

define('WP_HOME','https://tbs.themax.vn');
define('WP_SITEURL','https://tbs.themax.vn');

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
