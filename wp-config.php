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
define( 'DB_NAME', 'water_damage_restoration' );

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
define( 'AUTH_KEY',         '`]1I4O21l$Ts)K~M):8H36k`!:u=8G6 *NhtFFQCPr-vcr (7|gjqi]vHKUuDRDl' );
define( 'SECURE_AUTH_KEY',  '}m~S^Pfx?iSa&YJrd[7@a!Cw7+n@k.^HjOZTV33D*KXZ.%6q2@A)z1[Z%P23DW37' );
define( 'LOGGED_IN_KEY',    'ayh=(G/VVl$+/Vp3TkfI!WD1cmkzT%u5za|ZsA _9tvQi5CD@mTp9<JsVIP1TqL7' );
define( 'NONCE_KEY',        ') !jy8}yzeRkIMn^GS)e/V iik4$w!9#t8&2O$<T? T0#70u%/J*o6!!Gr~TyDn;' );
define( 'AUTH_SALT',        'gz{fnb2z;wZd{=UX=&{>.#b27o04(T_H,Ku]KUCr#gR~@W*5V/+Kbmnna`#Jc^Cz' );
define( 'SECURE_AUTH_SALT', '[f~;--gCsoO.+;ISX!7/e@Dk=QT676eA>62`,xr?X{Tw-DOdv@{oYkuOze62pp~&' );
define( 'LOGGED_IN_SALT',   'dEZtJco}JUyy[3gxyzQ?FDEkNt{SNt4NbZVB{*_6;5+n]V^c{C0.2f.T6-in0 .}' );
define( 'NONCE_SALT',       'aS/b6Do7Vgwcf$KkM(M6e 4uiKDw,EafLNvm,~w^iZYo2$GKUptX@nH&,}Z9G~Uy' );

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
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', true );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
