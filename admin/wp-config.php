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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'ecom' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'manager' );

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
define( 'AUTH_KEY',         'hh[ma,#X$=Ic5i8r.fh0s)1;x:bR2@7+ESbKhRqHjmW-;MC$Dl-P!T,*:I&beCxw' );
define( 'SECURE_AUTH_KEY',  '#jD>FV;%)U93<q2z&n]T3)R$m8+Nl%Rrt) QSb^p`emU%@G4Ch2P]Z.DUq|3ILf&' );
define( 'LOGGED_IN_KEY',    'PRugpE!`!+YfU 3pWsL!W>l|V1C7?Us%pz_h]NWc`6qC<|-J/V8BWU}e9QJ+Va1k' );
define( 'NONCE_KEY',        ';;K9H>cJ#W9#c=[w0/9~?D/qhJ`%/wx{)/05)?h>0e9 SaT:l3q9|>a7#zMsZmut' );
define( 'AUTH_SALT',        'O|?aDuVU(urKom^p Kd.`{;dyebsNO8]o@NE^jKdWb)K*cv-U4SENL7j<jl0i9<f' );
define( 'SECURE_AUTH_SALT', '<cIrovJzSfWcawL2.R8fP4lVU=OD]uZtse[nyq+q6|lgV{vlG<gd3-6a3>l1q$&c' );
define( 'LOGGED_IN_SALT',   'Fz979h4/+In9Mijb9|PHKB,5&#Bs6clZA$veDS$dP/X~!u=.+{$06, Z5I;!FJ4A' );
define( 'NONCE_SALT',       'yrLThB5iw/IC&u7*]&/:e~8h61%HCs/YJd?GIyYjHvJYmo8]5?S@2EEH,oc6A< X' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'ecom_';

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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
