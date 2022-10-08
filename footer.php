<?php
/*
 * FOOTER INCLUDE
*/
?>
	<footer id="footer" class="clearfix">
		 <div id="footer-widgets">

			<div class="container">

				<div id="footer-wrapper">

					<div class="row">
						<div class="col-md-3 footer-box box-1">
						  <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-1') ) : ?>
						  <?php endif; ?>
						</div> <!-- end widget1 -->

						<div class="col-md-3 footer-box box-2">
						  <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-2') ) : ?>
						  <?php endif; ?>
						</div> <!-- end widget1 -->

						<div class="col-md-3 footer-box box-3">
						  <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-3') ) : ?>
						  <?php endif; ?>
						</div> <!-- end widget1 -->

						<div class="col-md-3 footer-box box-4">
						  <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-4') ) : ?>
						  <?php endif; ?>
						</div> <!-- end widget1 -->

					</div> <!-- end .row -->

				</div> <!-- end #footer-wrapper -->

			</div> <!-- end .container -->
		</div> <!-- end #footer-widgets -->

	  <div id="sub-floor">
		<div class="container">
			<div class="row">
				<div class="col-md-9 right-elems">

					<?php bones_footer_nav(); ?>

				</div>

				<div class="col-md-3 left-elems clearfix">

						<div class="social-media">
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


					<div class="to-top"></div>

				</div>


			</div> <!-- end .row -->
		</div>
	  </div>

	</footer> <!-- end footer -->

	<!-- get footer scripts  -->
	<?php wp_footer(); ?>
	<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx  -->

  </body>

</html> <!-- end page -->
