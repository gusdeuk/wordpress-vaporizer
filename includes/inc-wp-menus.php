<?php
/*********************
MENUS & NAVIGATION
*********************/

// wp menus
add_theme_support( 'menus' );

// registering wp3+ menus
register_nav_menus(
	array(
		'main-nav' => __( 'The Main Menu', 'bonestheme' ),   // main nav in header
		'footer-links' => __( 'Footer Links', 'bonestheme' ), // secondary nav in footer
		'top-nav' => __( 'Top Menu', 'bonestheme' ) // topnav in header
	)
);

// the main menu
function bones_main_nav() {
	// display the wp3 menu if available
	wp_nav_menu(array(
		'container' => false,                           			// remove nav container
		'container_class' => 'menu clearfix',           			// class of container (should you choose to use it)
		'menu' => __( 'The Main Menu', 'bonestheme' ),  			// nav name
		'menu_class' => 'nav navbar-nav navbar-left',  				// adding custom nav class
		'theme_location' => 'main-nav',                 			// where it's located in the theme
		'before' => '',                                 			// before the menu
		'after' => '',                                  			// after the menu
		'link_before' => '',                            			// before each link
		'link_after' => '',                             			// after each link
		 'depth' => 2,                                   			// limit the depth of the nav
		 'fallback_cb' => 'wp_bootstrap_navwalker::fallback',		// fallback
		'walker' => new wp_bootstrap_navwalker()        			// for bootstrap nav
		//'items_wrap' => add_static_item_to_menu()
	));
} /* end bones main nav */

// this is the fallback for header menu
function bones_main_nav_fallback() {
	wp_page_menu( array(
		'show_home' => true,
		'menu_class' => 'nav top-nav clearfix',      // adding custom nav class
		'include'     => '',
		'exclude'     => '',
		'echo'        => true,
		'link_before' => '',                            // before each link
		'link_after' => ''                             // after each link
	) );
}

function add_static_item_to_menu() {
  // default value of 'items_wrap' is <ul id="%1$s" class="%2$s">%3$s</ul>'
  
  // open the <ul>, set 'menu_class' and 'menu_id' values
  $wrap  = '<ul id="%1$s" class="%2$s">';

   // the static link 
  $wrap .= '<li class="my-static-link"><a href="'. get_home_url().'">Home</a></li>';
  
  // get nav items as configured in /wp-admin/
  $wrap .= '%3$s';
  
  // close the <ul>
  $wrap .= '</ul>';
  // return the result
  return $wrap;
}

function bones_footer_nav() {
 wp_nav_menu(array(
				  'container' => 'div',                           // enter '' to remove nav container (just make sure .footer-links in _base.scss isn't wrapping)
				  'container_class' => 'footer-links cf',         // class of container (should you choose to use it)
				  'menu' => __( 'Footer Links', 'bonestheme' ),   // nav name
				  'menu_class' => 'nav footer-nav cf clearfix',            // adding custom nav class
				  'theme_location' => 'footer-links',             // where it's located in the theme
				  'before' => '',                                 // before the menu
				  'after' => '',                                  // after the menu
				  'link_before' => '',                            // before each link
				  'link_after' => '<span>|</span>',                             // after each link
				  'depth' => 0,                                   // limit the depth of the nav
				  'fallback_cb' => 'bones_footer_links_fallback'  // fallback function
				)); 
}

// this is the fallback for footer menu
function bones_footer_links_fallback() {
	/* you can put a default here if you like */
}

function bones_top_nav() {
 wp_nav_menu(array(
				  'container' => 'div',                           // enter '' to remove nav container (just make sure .footer-links in _base.scss isn't wrapping)
				  'container_class' => 'top-nav-menu',         // class of container (should you choose to use it)
				  'menu' => __( 'Top Menu', 'bonestheme' ),   // nav name
				  'menu_class' => 'nav top-nav cf clearfix',            // adding custom nav class
				  'theme_location' => 'top-nav',             // where it's located in the theme
				  'before' => '',                                 // before the menu
				  'after' => '',                                  // after the menu
				  'link_before' => '',                            // before each link
				  'link_after' => '<span>|</span>',                             // after each link
				  'depth' => 0,                                   // limit the depth of the nav
				  'fallback_cb' => ''  // fallback function
				)); 
}




?>