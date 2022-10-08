<?php
/*
 * HEADER INCLUDE
*/
?>
<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

<head>
	<meta charset="utf-8">

	<?php // Google Chrome Frame for IE ?>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title><?php if (is_front_page()) { bloginfo('name'); } else { wp_title(''); } ?></title>

	<?php // mobile meta (hooray!) ?>
	<meta name="HandheldFriendly" content="True"/>
	<meta name="MobileOptimized" content="320"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

	<?php // icons & favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) ?>
	<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/favicon-apple-touch.png"/>
	<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png?v=2"/>
			<!--[if IE]>
				<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
				<![endif]-->
				<?php // or, set /favicon.ico for IE10 win ?>
				<meta name="msapplication-TileColor" content="#f01d4f"/>
				<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/favicon-win8-tile.png"/>

				<?php /* <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/> */?>

				<?php // wordpress head functions ?>

				<?php wp_head(); ?>
				<?php // end of wordpress head ?>

	<?php
	// is this "addition" needed? Why?. 
	// lets comment for now, this thing fires a console js error and tries to load recaptcha TWICE (recaptcha is already loaded by rating plugin). 
	// <script src='https://www.google.com/recaptcha/api.js'></script>
	?>
</head>

			<body <?php body_class(); ?>>

				<header class="header" id="header">


					<nav role="navigation">

					 	<!-- toolbar-top-->
					 	<div class="head-toolbar">
							<div class="container">
								<div class="row">

									<div class="col-xs-12">
											<!--LANG SELECTOR ****************************** -->
											<div class="lang_selector clearfix"><?php language_selector_flags(); ?></div>
											<!-- NAV ****************************** -->
											<?php bones_top_nav(); ?>
									</div>
									
								</div>
							</div>
						</div>

						
						<div class="hdr-elements">
							<div class="container clearfix">
								<div class="row">

									<div class="row to-relative col-xs-12">

										<div class="hdr-left to-relative ">

											<?php
											 	$options = get_option('nwrk_theme_options');
												$fraseheader=$options['header_text_'.ICL_LANGUAGE_CODE];
											?>

											<a href="<?php echo get_home_url();?>" rel="homepage" class ="hdr-logo-1"></a>							
											<a href="<?php echo get_home_url();?>" rel="homepage" class ="hdr-logo-2"></a>
											<a href="<?php echo get_home_url();?>" rel="homepage" class ="hdr-logo-mobile"></a>

											<div class="hdr-phrase"><?php echo $fraseheader;?></div>
											
										 </div>

										 <div  class="hdr-right social-media">
										 	<?php
											 	$options = get_option('nwrk_theme_options');
												$link_facebook=$options['social_facebook'];
												$link_twitter=$options['social_twitter'];
												$link_instagram=$options['social_instagram'];
												$link_youtube=$options['social_youtube'];
											 ?>

											<a href="<?php echo($link_facebook);?>" class="fa fa-facebook-square" target="_blank"></a>
											<a href="<?php echo($link_twitter);?>" class="fa fa-twitter-square" target="_blank"></a>
											<!-- <a href="<?php //echo($link_youtube);?>" class="fa fa-youtube-square" target="_blank"></a>
											<a href="<?php //echo($link_instagram);?>" class="fa fa-instagram" target="_blank"></a> -->

										 </div>
									</div>
								</div>
						 	</div>
					 	</div>


					 <div class="main-navbar navbar navbar-inverse">
						<div class="container">
							<div class="row">
								<div class="col-xs-12">

									<div class="search-box">
										<?php get_search_form(); ?>
									</div>

									<!-- .navbar-toggle is used as the toggle for collapsed navbar content -->
									<div class="navbar-header">
										<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
											<span class="icon-bar"></span>
											<span class="icon-bar"></span>
											<span class="icon-bar"></span>
										</button>
									</div>

									<div class="navbar-collapse collapse navbar-responsive-collapse">

										<?php bones_main_nav(); ?>

									</div>
								</div>
							</div>
						</div>
					</div> 

			</nav>

		</header> <?php // end header ?>
