<?php
//*******************************************************************	
// Custom custom meta box in the dashboard
add_action('wp_dashboard_setup', 'mycustom_dashboard_widgets');

function mycustom_dashboard_widgets() {
global $wp_meta_boxes;

wp_add_dashboard_widget('custom_help_widget1', 'Vaporizer Info CMS', 'custom_dashboard_help1');
wp_add_dashboard_widget('custom_help_widget2', 'Custom Content Images', 'custom_dashboard_help2');
wp_add_dashboard_widget('custom_help_widget4', 'Start Up Tips', 'custom_dashboard_help3');
wp_add_dashboard_widget('custom_help_widget3', 'Website Care', 'custom_dashboard_help4');
}

function custom_dashboard_help1() {
require_once( 'inc-admin-dashboard/panel_1.php' ); 
}

function custom_dashboard_help2() {
require_once( 'inc-admin-dashboard/panel_2.php' ); 
}

function custom_dashboard_help3() {

require_once( 'inc-admin-dashboard/panel_3.php' ); 
}

function custom_dashboard_help4() {
require_once( 'inc-admin-dashboard/panel_4.php' ); 
}

?>