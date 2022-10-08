<?php

// wp thumbnails (FREATURED IMAGES)
add_theme_support( 'post-thumbnails' );

// default thumb size
set_post_thumbnail_size(100, 100, true);

// to add header image support go here: http://themble.com/support/adding-header-background-image-support/

// wp custom background (thx to @bransonwerner for update)
/*	add_theme_support( 'custom-background',
	array(
	'default-image' => '',  // background image default
	'default-color' => '', // background color default (dont add the #)
	'wp-head-callback' => '_custom_background_cb',
	'admin-head-callback' => '',
	'admin-preview-callback' => ''
	)
);*/

// ******************************************************************	
// THUMBNAILS
// *******************************************************************	
// add_image_size( $name, $width, $height, $crop );
// $width The post thumbnail width in pixels.  Default: 0 
// $height The post thumbnail $height in pixels.  Default: 0 
// $crop Crop the image or not. False - Soft proportional crop mode ; True - Hard crop mode.

// remove SOME default image  sizes in wordpress
// THIS OVERRIDES BACKEND IMAGES
update_option( 'thumbnail_size_h', 100);
update_option( 'thumbnail_size_w', 100);
update_option( 'medium_size_h', 0 );
update_option( 'medium_size_w', 0 );
update_option( 'large_size_h', 0 );
update_option( 'large_size_w', 0 );

// custom thumbnail sizes if needed
// add_image_size( 'custom-size', 220, 220, array( 'left', 'top' ) ); // Hard crop left top
//add_image_size( 'post-header', 1200, 440, true );
// size for the GRID / Featured images
//add_image_size( 'post-medium', 585, 330, true );
// content images fit to 900 px width ONLY, no crop
/*add_image_size( 'post-big', 900);*/


//On some production environments you may get a “unexpected T_FUNCTION” error (older versions of PHP 5 don’t like anonymous functions). In this situation go for the following:
function jpeg_quality_callback($arg){
	return (int)90;
}

add_filter('jpeg_quality', 'jpeg_quality_callback');

?>