<?php
/*
VIEW DE archive general > cae aca por categories/tags, author/date/etc
*/
?>
<?php get_header(); ?>


<?php if (is_category()) { ?>

	<div class="archive-header-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 archive-header-container">
				<?php 
						//-----------------------------------------
						// get category image in ACF
						// vars
						$queried_object = get_queried_object(); 
						$taxonomy = $queried_object->taxonomy;
						//$term_id = $queried_object->term_id;  

						// load image for this taxonomy term (term object)
						$imagedata = get_field('categoryimage', $queried_object);

						// load image for this taxonomy term (term string)
						//$imagedata = get_field('categoryimage', $taxonomy . '_' . $term_id);

						// get the desired size
						$imageURL = $imagedata['url'];
						
						//print($imageURL);
						/*print "<pre>";
						print_r($imagedata);
						print "</pre>";*/
						?>

						<img class="img-responsive" src="<?php echo $imageURL ?>" alt = "">


						<div class="left-elems">
							<div class = "archive-header-textbox">
								<div class="archive-header-title"><?php single_cat_title() . _e(" ") . _e("Reviews"); ?></div>
								<div class="archive-header-excerpt"><?php echo category_description(); ?></div>
							</div>
						</div>

				</div>
				<!-- end col -->
			</div>
			<!-- end row -->
		</div>
		<!-- end container -->
	</div>
	<!-- end cat-header-wrap -->

<?php } ?>



<div class="archive-main-title-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">

			</div>
			<!-- end col -->
		</div>
		<!-- end row -->
	</div>
	<!-- end container -->
</div>
<!-- end archive-main-title-wrapper -->



<div class="archive-content-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">


				<div class="archive-grid-container row"> <!-- Abre row -->

						<!--  START LOOP -->
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

						
							<div class="grid-item col-xs-12 col-sm-6">


								<a href="<?php the_permalink(); ?>">
									<div class="grid-item-top">
										<div class="grid-item-title" title="<?php the_title()?>">
											<?php
											$shortened_title = wp_trim_words( the_title("","",false), $num_words = 8, $more = "...");
											echo $shortened_title;
											?>
										</div>

										<?php 
											// GET EDITOR FIELDS FOR AVERAGE
											include( 'includes/inc-editor-fields.php' );
										?>

										<div class="gen-rating-box">
											<div class="gen-rating-num"><span><?php echo ($rating_editor_average_round); ?><span></div>
											<div class="gen-rating-meter">
												<div class="gen-rating-value" style="width:<?php echo ($rating_editor_average_metervalue); ?>px;"></div>
											</div>
										</div>

										<!-- ITEM IMAGE BOX -->
										<?php if ( has_post_thumbnail() ) { ?>
												<?php the_post_thumbnail( 'full' , array( 'class' => 'img-responsive' )); ?>
											<?php } else { ?> 
												<img class="img-responsive" src="<?php echo (get_template_directory_uri() . '/images/no-image-medium.png')?>"  >
										<?php }// end if ?> 

									</div>
								</a>

								<div class="grid-item-mid">
									<div><?php the_excerpt(''); ?></div>
								</div>

								<div class="grid-item-bottom">
									<div class="grid-item-cat">
									<?php 
									/* HIDE CATEGORY
										$category = get_the_category(); 
										echo $category[0]->cat_name;
										//echo get_the_category_list(' ');
									*/ 
									?>
									</div>
									<div class="grid-item-date"><?php echo get_the_time('d M Y') ?></div>
								</div>



							</div>
							<!-- end grid item -->


						<?php endwhile; ?>
						<?php endif; ?>
						<!--  END LOOP -->

				</div><!-- END archive-grid-container / row -->


				<!-- Paginator -->
				<?php if (function_exists("emm_paginate")) { 
					emm_paginate();
				} ?>

			</div>
			<!-- end col -->
		</div>
		<!-- end row -->
	</div>
	<!-- end container -->
</div>
<!-- end archive-content-wrapper -->


<?php get_footer(); ?>
