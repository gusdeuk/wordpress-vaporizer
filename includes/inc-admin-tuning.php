<?php

/************* CUSTOM LOGIN PAGE *****************/

// calling your own login css so you can style it

//Updated to proper 'enqueue' method
//http://codex.wordpress.org/Plugin_API/Action_Reference/login_enqueue_scripts
function bones_login_css() {
  wp_enqueue_style( 'bones_login_css', get_template_directory_uri() . '/css/login.css', false );
}

// changing the logo link from wordpress.org to your site
function bones_login_url() {  return home_url(); }

// changing the alt text on the logo to show your site name
function bones_login_title() { return get_option( 'blogname' ); }

// calling it only on the login page
add_action( 'login_enqueue_scripts', 'bones_login_css', 10 );
add_filter( 'login_headerurl', 'bones_login_url' );
add_filter( 'login_headertitle', 'bones_login_title' );



//*******************************************************************	
// customize admin footer text
function custom_admin_footer() {
	echo 'Design and coded with love by Gus &#8594; <a href="http://www.networkian.com.ar" target="_blank">www.networkian.com.ar</a>' ;
} 
add_filter('admin_footer_text', 'custom_admin_footer');



//*******************************************************************	
// DASHBOARD WIDGETS
// REMOVE PUNTUALES
function remove_dashboard_widgets(){
  global$wp_meta_boxes;

  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']);  
  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
  unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
  unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']); 
  unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']); 
  unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']); 

  unset($wp_meta_boxes['dashboard']['normal']['core']['yoast_db_widget']);           // Yoast's SEO Plugin Widget
  unset($wp_meta_boxes['dashboard']['normal']['core']['rg_forms_dashboard']);        // Gravity Forms Plugin Widget
  unset($wp_meta_boxes['dashboard']['normal']['core']['bbp-dashboard-right-now']);   // bbPress Plugin Widget
  unset($wp_meta_boxes['dashboard']['normal']['core']['icl_dashboard_widget']);   // WPML
  
}
add_action('wp_dashboard_setup', 'remove_dashboard_widgets');

remove_action( 'welcome_panel', 'wp_welcome_panel' );


//*******************************************************************
// AGREGO EL EDITOR STYLE CSS
// This theme styles the visual editor with editor-style.css to match the theme style.
/*function my_theme_add_editor_styles() {
    add_editor_style( get_bloginfo('template_directory').'/stylesheets/editor-style.css' );
}
add_action( 'init', 'my_theme_add_editor_styles' );*/


//*******************************************************************

// Removing Menu Items (LIMITO AL USER EDITOR CIERTAS COSAS)
// ELIMINO MENUS MAIN Y SUS CHILDS
function remove_menu_items() {
	if( (current_user_can('install_themes')) ) {
			$restricted = array(__('NADA'));
	} // check if admin and hide these for admins
	else { 	
		global $menu;
		//$restricted = array(__('Links'), __('Comments'), __('Media'),__('Plugins'), __('Tools'), __('Users'), __('Contacto'), __('Dashboard'), __('Settings'), __('Hommer'), __('Trabajos'));
		$restricted = array(__('Tools'), __('Settings'));
		end ($menu);
		while (prev($menu)){
		$value = explode(' ',$menu[key($menu)][0]);
			if(in_array($value[0] != NULL?$value[0]:"" , $restricted)){
			  unset($menu[key($menu)]);}
			}
		}
	// OTRA FORMA SIN EL ARRAY SACO EL DASH
	//remove_menu_page('index.php'); // Dashboard	
	}
/*
TEMBIEN SE PUEDE HACER ASI (ADENTRO DE LA FUNCION DE ARRIBA)
remove_menu_page('index.php'); // Dashboard
remove_menu_page('edit.php'); // Posts
remove_menu_page('upload.php'); // Media
remove_menu_page('link-manager.php'); // Links
remove_menu_page('edit.php?post_type=page'); // Pages
remove_menu_page('edit-comments.php'); // Comments
remove_menu_page('themes.php'); // Appearance
remove_menu_page('plugins.php'); // Plugins
remove_menu_page('users.php'); // Users
remove_menu_page('tools.php'); // Tools
remove_menu_page('options-general.php'); // Settings	
*/
	
add_action('admin_menu', 'remove_menu_items');
//*******************************************************************	
//http://sumtips.com/2011/03/remove-reorder-menu-submenu-wordpress.html
// Removing SUB Menu Items
//To find what the submenu names are, just go to wp-admin/menu.php and search for the item you want to disable.
function remove_submenus() {
  global $submenu;

  	if( (current_user_can('install_themes')) ) {
	// check if admin and hide these for admins
	} 
	else { 
		//unset($submenu['index.php'][10]); // Removes 'Updates'.
		//unset($submenu['themes.php'][5]); // Removes 'Themes'.
		//unset($submenu['options-general.php'][15]); // Removes 'Writing'.
		//unset($submenu['options-general.php'][25]); // Removes 'Discussion'.
		//unset($submenu['edit.php'][16]); // Removes 'Tags'. 
		//unset($submenu['themes.php'][5]); // Removes 'THEMES'.
		//unset($submenu['themes.php'][10]); // Removes 'NAVMENUS'.
		// OTRA FORMA SIN UNSET MAS FACIL CON LAS URLS Y SUB URLS
		remove_submenu_page( 'themes.php', 'widgets.php' );	// Removes 'THEMES'.
		//remove_submenu_page( 'themes.php', 'nav-menus.php' );	// Removes 'NAVMENUS'.
		remove_submenu_page( 'themes.php', 'themes.php' );	// Removes 'WIDGETS'.
		//remove_submenu_page( 'edit.php', 'edit-tags.php' );	// Removes 'TAGS' NO ANDA.
	}
  
}
add_action('admin_menu', 'remove_submenus');


//*******************************************************************	
// Remove the Editor Submenu Item (ESPACIAL APARTE)
function remove_editor_menu() {
  remove_action('admin_menu', '_add_themes_utility_last', 101);
}
add_action('_admin_menu', 'remove_editor_menu', 1);


//*******************************************************************	
//Disable Meta Boxes in the Editing Pages
//*******************************************************************	
//To find out the ID, just inspect the source code or use a tool like the Web Developer Toolbar to determine the ID attribute value of the section’s containing <div>. 
function customize_meta_boxes() {
//--------------------------------------------------------
  /* Removes meta boxes from Posts */
  //remove_meta_box('postcustom','post','normal');
  //remove_meta_box('trackbacksdiv','post','normal');
  //remove_meta_box('commentstatusdiv','post','normal');
  //remove_meta_box('commentsdiv','post','normal');
  //remove_meta_box('slugdiv','post','normal');
  //remove_meta_box('tagsdiv-post_tag','post','normal');
  //remove_meta_box('postexcerpt','post','normal');
//--------------------------------------------------------
  /* Removes meta boxes from pages */
  //remove_meta_box('postcustom','page','normal');
  //remove_meta_box('trackbacksdiv','page','normal');
  //remove_meta_box('commentstatusdiv','page','normal');
  //remove_meta_box('commentsdiv','page','normal');
  //remove_meta_box('slugdiv','page','normal'); 
}

//add_action('admin_init','customize_meta_boxes');


//--------------------------------------------------------
// Remove Items from the Post and Page Columns y MEDIA LIBRARY
function custom_post_columns($defaults) {
  //unset($defaults['comments']);
  //unset($defaults['tags']);
  return $defaults;
}
add_filter('manage_posts_columns', 'custom_post_columns');

function custom_pages_columns($defaults) {
  //unset($defaults['comments']);
  //unset($defaults['tags']);
  return $defaults;
}
add_filter('manage_pages_columns', 'custom_pages_columns');

function custom_media_columns($defaults) {
  //unset($defaults['comments']);
  //unset($defaults['tags']);
  return $defaults;
}
//add_filter('manage_media_columns', 'custom_media_columns');



//**************************************************************
// ReTHUMBNAILS EN POSTS Y PAGES (LISTA PRINCIPAL)
add_filter('manage_posts_columns', 'thumbnail_column');
//add_filter('manage_pages_columns', 'thumbnail_column');

function thumbnail_column($columns) {
    $columns['thumbnail'] = 'Thumbnail';
    return $columns;
}

add_action('manage_posts_custom_column',  'show_thumbnail_column');
//add_action('manage_pages_custom_column',  'show_thumbnail_column');
function show_thumbnail_column($name) {
    global $post;
    switch ($name) {
        case 'thumbnail':
           // $thumbnail = get_the_post_thumbnail($post->ID, array(70,70));
            //echo $thumbnail;
			$thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "thumbnail" );
			echo "<img src='".$thumbnail_src[0]."' ". "width=75 height=75 />";
    }
}



//**************************************************************
//  AGREGAR TEMPLATES EN PAGES (LISTA PRINCIPAL)
add_filter('manage_pages_columns', 'template_column');

function template_column($columns) {
    $columns['template'] = 'Template';
    return $columns;
}

add_action('manage_pages_custom_column',  'show_template_column');
function show_template_column($name) {
    global $post;
    switch ($name) {
        case 'template':
            $template = get_post_meta($post->ID,'_wp_page_template',true);
			$template = substr($template, 0, strrpos($template, '.')); 
			if($template==""){
				$template="<div style='color: #009900'>Default</div>";
				}
            echo $template;
    }
}



//**************************************************************
// AGREGAR MENU ORDER EN LISTADO DE PAGES (LISTA PRINCIPAL)
add_filter('manage_pages_columns', 'menu_order_column');

function menu_order_column($columns) {
	$columns['menu_order'] = 'Order';
    return $columns;
}

add_action('manage_pages_custom_column',  'show_menu_order_column');
function show_menu_order_column($name) {
    global $post;
	switch ($name) {
        case 'menu_order':
		$mostrarorder = $post-> menu_order;
		echo  $mostrarorder;
	}
}


//*******************************************************************	
//Customize the Favorites Dropdown
//We can do this by adding another filter and unsetting the link, which is contained in a PHP array called $actions.

function custom_favorite_actions($actions) {
  unset($actions['edit-comments.php']);
  return $actions;
}
//add_filter('favorite_actions', 'custom_favorite_actions');



//*******************************************************************	
// DISABLE SPECIFIC WIDGETS
/*
function remove_some_wp_widgets(){
  unregister_widget('WP_Widget_Calendar');
  unregister_widget('WP_Widget_Search');
  unregister_widget('WP_Widget_Recent_Comments');
}

add_action('widgets_init','remove_some_wp_widgets', 1);
*/
//*******************************************************************	
//UPDATES >>>> Hide the Upgrade Notice to Recent Versions
//add_filter( 'pre_site_transient_update_core', create_function( '$a', "return null;" ) );

//*******************************************************************	
/* BLOCK UPDATES */
//if ( !current_user_can( 'edit_users' ) ) {
  //add_action( 'init', create_function( '$a', "remove_action( 'init', 'wp_version_check' );" ), 2 );
 // add_filter( 'pre_option_update_core', create_function( '$a', "return null;" ) );
//}
?>