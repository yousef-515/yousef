<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'tabibi_db' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         '3790VXxL=rXp@~HGR4arnn=SQja:9d.}Hi[pOz~EUHoB<>QrJyH1jc9-}mLlZ3-C' );
define( 'SECURE_AUTH_KEY',  'KmwShHKf2-S<}CXQc<5cjDHdoeo!q)>+~&IWpx{@v[0a7)@b|C{nN;<3m;,K3xP^' );
define( 'LOGGED_IN_KEY',    '4,(d xH~QLv=Y?Agr8,tPK7wO7-(FX(#2/7}FcnaYp{k3NY*<i(jji5<.pOMA*2M' );
define( 'NONCE_KEY',        'rS3v^`|{qSoR*s$~<rZs0G*3h@ByJxmgT4p4lkQh#[Yq2x3y|J/qH0P4>hE{5egs' );
define( 'AUTH_SALT',        '4H%*t?VH8#lCvGfF_]45A9o-c-9Xj59KLC`E6n]%jKmj;,GHSb#v>6{3~uWPs&j2' );
define( 'SECURE_AUTH_SALT', 'rM)^L%qQ#9r%/]GKJm<tp8E[u/<;wJDxk#p,Ko}h=!Tk.YH9X9XbhJnm5$s?RN4Z' );
define( 'LOGGED_IN_SALT',   '}M@GIDsY_D7pMn;-GMU/J:GC@eE[PA;xx|r7yc4d0?e16BiI8FA_4c%/^hEK=R6A' );
define( 'NONCE_SALT',       'A85FgZS+6B;vdjz:%xy&-[GlI@@_+Br|FSjvh=7V*Iz3kZwHCJH,#e;u=sBDc;x]' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
