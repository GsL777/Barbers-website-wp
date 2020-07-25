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
define( 'DB_NAME', 'barber-website' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         '.%aH7#W[sIRRH9 i7n:E8|3(MLma!#FWVnETHs+V:P_;tH@6%%L{_FjZ2htN!s|Y' );
define( 'SECURE_AUTH_KEY',  '?@FAsO9VF5Hw7w}K(^!KF*6}v0?4_jntwP;83<FO1fQ?IoqK(Y?`/@1gpPb;B?1<' );
define( 'LOGGED_IN_KEY',    'B 0?$^tW^2-puHS+]MJ{qTyA=^EeqCnL%69ug:z|q0ntjqz;n(e3z9_F1}2fp$-o' );
define( 'NONCE_KEY',        'i]o@%*t5QQ*8wgt1G9XS{,8iB<1rUoaNzk9KLpHzp0jHlz`yxiRm((5QMb2DA0f~' );
define( 'AUTH_SALT',        'b%?G4PJGg?u#TxRq?u]t:uQ,6~NVw=L_N2Tczdpjp.tbRAyY<&.4S`R$NRpz?oXX' );
define( 'SECURE_AUTH_SALT', 'BZ!LCkxa-!IgCtq#2(Lug%q6j[RE*eA7.:wb9:BuGb}+@Waxx{<2o76<,T,u{_t(' );
define( 'LOGGED_IN_SALT',   '+jOEf.<KW%,u&_L>a<|rx4:Uj-[!>t@kROvSIeb&b(`aMr$)kTgaOU4m=&>00DYz' );
define( 'NONCE_SALT',       'I%I%CA=A3)DaGR+ALV-$u%s.m=$t^qv$2,)Qj=Q7k;q6P_w8E-U%= MBwabT[#I.' );

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

define('WP_DEBUG', true); //true - wordpress prints mistakes, errors.
define('WP_DEBUG_DISPLAY', false); //false - doesn't print errors publicly .
define('WP_DEBUG_LOG', true); //true - creates log file that only me can access.

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
