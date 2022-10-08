<?php

/* LOAD NWRK MODULES */

/*base*/
require_once( 'includes/inc-brew.php' ); 
require_once( 'includes/inc-bones.php' );

/*wp menus*/
require_once( 'includes/inc-wp-menus.php' );
require_once( 'includes/inc-wp-menus-navwalker.php' );

/*head and footer scripts js css jquery etc*/
require_once( 'includes/inc-scripts-js-css.php' ); 

/*register sidebars*/
require_once( 'includes/inc-sidebars-init.php' );

/*internal widgets*/
require_once( 'includes/inc-widgets-internal.php' ); 

/*admin dashboard*/
require_once( 'includes/inc-admin-dashboard.php' ); 

/*admin tunning*/
require_once( 'includes/inc-admin-tuning.php' ); 

/*images support setup*/
require_once( 'includes/inc-images-and-thumbs.php' );

/*theme content management shortcodes setup*/
require_once( 'includes/inc-shortcodes.php' ); 

/*comments layout elements init*/
require_once( 'includes/inc-comments-init.php' );

/*theme general options view*/
require_once( 'includes/inc-theme-options.php' );

/* Disable WP standard comments functionality */
require_once( 'includes/inc-disable-comments.php' );

/* WPML */
require_once( 'includes/inc-wpml.php' );

/*post formats support*/
//require_once( 'includes/post-formats.php' ); 

/* Custom post types */
//require_once( 'includes/custom-post-type.php' );

/* MRPRO */
require_once( 'includes/inc-multirating-pro.php' );

?>
