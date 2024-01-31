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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'khurram' );

/** Database username */
define( 'DB_USER', 'Khurrams' );

/** Database password */
define( 'DB_PASSWORD', 'nhibatana' );

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
define( 'AUTH_KEY',         'fMu2Mj0B5_$Ok11p8n^],wt(K5qiw|!6xPG4*x|/Q1?1{W0?n/FGyo(U&h6uI<Ul' );
define( 'SECURE_AUTH_KEY',  'lY`G0g9[,2s_]h(4j)S:elyQa6g-!mTNMhc,T((np{PCGpgyGZ],SA.QGXO}c6O^' );
define( 'LOGGED_IN_KEY',    '&|Qaw3Bhi2`uIddF8$WuE&M}%&v6YqpEo83vFTJijn(r_K n{yN}![fjh#~0U|gk' );
define( 'NONCE_KEY',        'M4gQMk<.J,VD9V}r<g:2V#0%c%&u3TL{%BDjaer|MIa;,=@P~}pAKp[vdYbQ$Xx]' );
define( 'AUTH_SALT',        'XQ*;cQ#1G<Xjl|<&QQ&C2&v3Wr,+-iGz%Gc( :x_:zQS4f^ZMB=He]_]I1&eLR{b' );
define( 'SECURE_AUTH_SALT', ' >VUKzL=F~f}u|X-~<g,S2UM Mg[~([rm/+h?ZZ>k elB Lv),r(W_lHnTMfv#3L' );
define( 'LOGGED_IN_SALT',   ',UdP6XR5N`=>^4R*9Kq_zodG9qz1)B;4#NG2Kjk79xnCK#SA(ip J&~oc2.P&ET$' );
define( 'NONCE_SALT',       '6EzgV(Rf>7w=%V$zA^9D3]v`?=)qPUFuFdfJMNF72FH:8 10dgl =C#y4fI?eFJU' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
