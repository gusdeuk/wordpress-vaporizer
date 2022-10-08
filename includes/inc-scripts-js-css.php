<?php
/*********************
SCRIPTS & ENQUEUEING JS AND CSS
TODO EMRPOILIJAR ESTO PARA QUE PATO LO PUEDA EDITAR
SEPARAR HEADER DEL FOOTER,  etc
EL Ultimo parametro booleano es >>>> va en el footer?
*********************/

// loading modernizr and jquery, and reply script
function bones_scripts_and_styles() {
  global $wp_styles; // call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way

  if (!is_admin()) {

    // 1- REGISTER SCRIPTS AND STYLES

    // js bootstrap
    // download a custom file @ getbootstrap.com/customize/ if you don't want all js components
    wp_register_script( 'bones-bootstrap', get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js', array(), '3.3.6', true );
    

    // modernizr (without media query polyfill)
    wp_register_script( 'bones-modernizr', get_template_directory_uri() . '/js/modernizr/modernizr.custom.min.js', array(), '2.5.3', false );

    // register bootstrap stylesheet
	wp_register_style( 'bones-bootstrap-css', get_template_directory_uri() . '/bootstrap/css-flatly/bootstrap.min.css', array(), '', 'all' );

    // register main stylesheet
    wp_register_style( 'base-stylesheet', get_template_directory_uri() . '/css/style-base.css', array(), '', 'all' );

     // OTHER CSS
    wp_register_style( 'animate-stylesheet', get_template_directory_uri() . '/css/animate.css', array(), '', 'all' );
    wp_register_style( 'override-stylesheet', get_template_directory_uri() . '/css/style-overrides.css', array(), '', 'all' );
    wp_register_style( 'font-awe-stylesheet', get_template_directory_uri() . '/fonts/font-awesome/font-awesome.css', array(), '', 'all' );
    wp_register_style( 'font-stylesheet', get_template_directory_uri() . '/fonts/lato/fonts.css', array(), '', 'all' );
    wp_register_style( 'components-stylesheet', get_template_directory_uri() . '/css/style-components.css', array(), '', 'all' );
	wp_register_style( 'custom-fixes', get_template_directory_uri() . '/css/custom-fixes.css', array(), '', 'all' );

    // ie-only style sheet
    wp_register_style( 'bones-ie-only', get_template_directory_uri() . '/css/ie.css', array(), '' );

    // comment reply script for threaded comments
    if ( is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
		wp_enqueue_script( 'comment-reply' );
    }
    // -----------------------------------------------------------------------------------------------
    // adding more scripts file in the footer
    wp_register_script( 'bones-js', get_template_directory_uri() . '/js/main-base.js', array( 'jquery' ), '', true );
    wp_register_script( 'owl-js', get_template_directory_uri() . '/js/owl-carousel/owl.carousel.min.js', array( 'jquery' ), '', true );
    wp_register_script( 'q2w3-js', get_template_directory_uri() . '/js/q2w3-fixed-widget/q2w3-fixed-widget.min.js', array( 'jquery' ), '', true );
	wp_register_script( 'vaposhop-discount-hack', get_template_directory_uri() . '/js/custom-hacks/vaposhop-discount-display.js', array( 'jquery' ), '', true );
    //------------------------------------------------------------------------------------------------
    // 2 ENQUEUE SCRIPTS AND STYLES
    wp_enqueue_script( 'bones-modernizr' );

    wp_enqueue_style( 'bones-bootstrap-css' );

    
    wp_enqueue_style( 'animate-stylesheet' );
    wp_enqueue_style( 'font-awe-stylesheet' );
    wp_enqueue_style( 'font-stylesheet' );
    wp_enqueue_style( 'components-stylesheet' );
    wp_enqueue_style( 'base-stylesheet' );
    wp_enqueue_style( 'override-stylesheet' );
	wp_enqueue_style( 'custom-fixes' );

    
    //------------------------------------------------------------------------------------------------
    wp_enqueue_style( 'bones-ie-only' );
    $wp_styles->add_data( 'bones-ie-only', 'conditional', 'lt IE 9' ); // add conditional wrapper around ie stylesheet

    //------------------------------------------------------------------------------------------------
    // 3 BOOTSTRAP DEREGISTER AND REREGISTER

	// comment out the next two lines to load the local copy of jQuery
	wp_deregister_script('jquery');
	//wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js', false, '1.11.2');
	wp_register_script('jquery',  get_template_directory_uri() . '/js/jquery/jquery.min.js', false, '1.11.2');
	
    //------------------------------------------------------------------------------------------------
    // 4 ENQUEUE MORE SCRIPTS AND STYLES
    //  enqueue  more scripts!
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'bones-js' );
    wp_enqueue_script( 'bones-bootstrap' );
    wp_enqueue_script( 'owl-js' );
	wp_enqueue_script( 'q2w3-js' );
	wp_enqueue_script( 'vaposhop-discount-hack' );

     //------------------------------------------------------------------------------------------------
    // REMOVE CSS AND JS from CONTACT FORM 7
    //add_filter( 'wpcf7_load_js', '__return_false' );
    add_filter( 'wpcf7_load_css', '__return_false' );

    // 5 ENQUEUE for specific page !!!!!!!!!!!!!!!!!!!
    function enqueue_specific_pages() {

    // chquear page por el SLUG, se carga esecifico para esa page
      if ( is_page( 'test' ) ) {
        /** Call specific enqueue */
         /*wp_register_style( 'test-stylesheet', get_template_directory_uri() . '/css-xtra/pato_pastear_TIRAR.css', array(), '', 'all' );
         wp_enqueue_style( 'test-stylesheet' );*/
      }

      if ( is_page( 'contacto' ) ) {
            // LOAD CONTACT FORM JS ONLY IN CONTACT PAGE
        
            if ( function_exists( 'wpcf7_enqueue_scripts' ) ) {
                wpcf7_enqueue_scripts();
            }
         
            if ( function_exists( 'wpcf7_enqueue_styles' ) ) {
                // NO CSS
                //wpcf7_enqueue_styles();
            }
      } 

    }
    enqueue_specific_pages();

  }
}
?>