<?php
/*
Template Name: Page Contact
*/
?>

<?php get_header(); ?>

<!--  START LOOP -->
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class="title-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">

				<header class="page-heading">
					<h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>
				</header> <!-- end article header -->

			</div>
			<!-- end col -->
		</div>
		<!-- end row -->
	</div>
	<!-- end container -->
</div>
<!-- end main-title-wrapper -->

<!-- generic-content-wrapper -->
<div class="generic-content-wrapper">
	<!-- ************************************************* -->
	<!-- MAIN + OPTIONAL SIDEBAR -->
	<div class="container">  
		<div id="content" class="clearfix row">
			<div id="main" class="col-sm-12" role="main">
			<!-- ************************************************* -->
			
						<div class="row">

							<div class="col-sm-3">

								<?php the_content(); ?>

							</div>

							<div class="col-sm-9">

								<?php 
								// SHORTCODE SEGUN LENGUAGE
								if(ICL_LANGUAGE_CODE=="nl"){
									echo do_shortcode( '[contact-form-7 id="123" title="Contact form NL"]' );
								}
								if(ICL_LANGUAGE_CODE=="en"){
									echo do_shortcode( '[contact-form-7 id="125" title="Contact form EN"]' );
								} 
								if(ICL_LANGUAGE_CODE=="fr"){
									echo do_shortcode( '[contact-form-7 id="124" title="Contact form FR"]' );
								} 
								if(ICL_LANGUAGE_CODE=="de"){
									echo do_shortcode( '[contact-form-7 id="126" title="Contact form DE"]' );
								} 
								if(ICL_LANGUAGE_CODE=="it"){
									echo do_shortcode( '[contact-form-7 id="760" title="Contact form IT"]' );
								} 
								if(ICL_LANGUAGE_CODE=="es"){
									echo do_shortcode( '[contact-form-7 id="764" title="Contact form ES"]' );
								} 				
								?>

							
							</div>

						</div>

			
			<!-- ************************************************* -->
			</div>
			<!-- END MAIN -->	
			<?php // get_sidebar("sidebar-name"); ?>
			<!-- END SIDEBAR -->	
		</div>
		<!-- end #CONTENT -->
	</div>
	<!-- end container -->
	<!-- ************************************************* -->
</div>
<!-- end generic-content-wrapper -->

<?php endwhile; ?>
<?php endif; ?>
<!--  END LOOP -->


<?php get_footer(); ?>


