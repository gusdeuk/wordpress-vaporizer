<?php
/*
Template Name: Page Standard
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
			<div id="main" class="col-md-8" role="main">
			<!-- ************************************************* -->

				<section class="entry-content" itemprop="articleBody">
					<?php the_content(); ?>
				</section>

			<!-- ************************************************* -->
			</div>
			<!-- END MAIN -->	
			<?php get_sidebar("page"); ?>
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
