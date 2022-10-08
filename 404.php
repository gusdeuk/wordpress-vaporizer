<?php
/*
404 VIEW
*/
?>
<?php get_header(); ?>

<div class="title-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">

				<header class="page-heading">
					<h1 class="page-title" itemprop="headline"><?php _e("Page Not Found","bonestheme"); ?></h1>
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

				<div style="margin-top:20px;">
					<img class="img-responsive center-block" src="<?php bloginfo('template_directory'); ?>/images/404.png" />
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


<?php get_footer(); ?>