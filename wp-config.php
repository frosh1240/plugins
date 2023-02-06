<?php
define( 'WP_CACHE', true );
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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'wordpress' );

/** Database password */
define( 'DB_PASSWORD', 'wordpress' );

/** Database hostname */
define( 'DB_HOST', 'database' );

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
define( 'AUTH_KEY',         '& SD8vhf7<8^rms~QpJ9[ikL8m8?`4^MT{nsvq|dt:Po/fy5SPlT-`BM4gM|cUqF' );
define( 'SECURE_AUTH_KEY',  'k:./JZqEZwnP`Zbq.-;Cr[V$}:zC|>;*)6;%pQK<?<o%+CkaZfBL&`Va0SW`j1p{' );
define( 'LOGGED_IN_KEY',    ':UmK&E9ekj*t*-#b7DAGfTI^j#gf-F`DD!1=DOe/1+jm:i5L3fue5W)nUdN+ ~>M' );
define( 'NONCE_KEY',        'm0AJ6{c6@CxE5H_Gna$Y>1MZ=TF#k#B9G.h/v/F(hzHS1IfaP-]dctV%Gr%a[qCT' );
define( 'AUTH_SALT',        '!8xhnQZ/Nck|L_xl(>pY<d%j]:J={D-#L.2Bg:c(ZdBMMjJGKp.os,K$UVJ-#Y-T' );
define( 'SECURE_AUTH_SALT', '/XSIja,X`k}aF&7]Vkdw1$:Bung/b+#uN/:!Q7Wa N05zrErV8Tw+/>d;<_-*H18' );
define( 'LOGGED_IN_SALT',   '+v4:i*UrS#2~+gN/I`#Gt<^5?qJS`/y#aTH]&|D9]zxzUV)tv_q9OLv-Y:Hmxs*]' );
define( 'NONCE_SALT',       '&Luq*n//6-g-e$x):P5wU@h[7s~<UTOD%1AGLJ<FsbCC(e[ow]|<4I4Y#%r9]1(}' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
