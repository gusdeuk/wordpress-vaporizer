<?php
/*
Search results VIEW
*/
?>
<?php get_header(); ?>

<div class="title-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">

				<header class="page-heading">
					<h1 class="page-title" itemprop="headline"><?php _e("Search Results","bonestheme"); ?></h1>
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

				<div class="search-results-title">
					<span><?php _e("Results for","bonestheme"); ?> > </span><span><?php echo esc_attr(get_search_query()); ?></span>
				</div>

				<div class="search-list">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<a class="search-results-item transition-250" href="<?php the_permalink() ?>">
						<div class="title"><?php the_title(); ?></div>
						<div class="date"><?php echo get_the_time('d M Y') ?></div>
						<div class="excerpt"><?php the_excerpt(); ?></div>
					</a>
					<div class="search-results-item-sep"></div>

				<?php endwhile; ?>
				</div>

					<?php if (function_exists("emm_paginate")) { 
						emm_paginate();
					} ?>

				<?php else : ?>

					<?php _e( 'No search results found.', 'bonestheme' );?>

				<?php endif; ?>
				
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
