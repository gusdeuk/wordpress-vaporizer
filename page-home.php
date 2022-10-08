<?php
/*
Template Name: Page Home
*/
?>

<?php get_header(); ?>

<!--  START LOOP -->
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
<!-- SLIDER-->
<div class="slider-wrapper">

	<div class="container">

		<div class="row">

			<div class="col-xs-12">


				<div class="clearfix slider-next-prev">
					<div id="btn-prev" class="sl-icon-prev fa fa-chevron-left"></div>
					<div id="btn-next" class="sl-icon-next fa fa-chevron-right"></div>
				</div>

				<div id="home-slider" class="owl-carousel owl-theme">

				<?php 

				$slider_elements=array();
				for ($i = 1; $i <= 10; $i++) {
					$post_object_elem = get_field('slider_review_'.$i);
					if($post_object_elem) {
						array_push($slider_elements, $post_object_elem);
					}
				}

				for ($i = 1; $i <= count($slider_elements); $i++) { ?>

					<?php
					$post_object = get_field('slider_review_'.$i);
					if( $post_object ): 
					  // override $post
						$post = $post_object;
						setup_postdata( $post ); 
					?>

					<div class="item img-responsive center-block">
						<a href="<?php the_permalink(); ?>">

							<?php
							$header_image = get_field( "review_header_image" );

							if($header_image){ ?>

								<img src="<?php echo  $header_image['url'] ?>" alt="<?php echo  $header_image['alt'] ?>" class="img-responsive" />

								<?php } else { ?>

								<img src="<?php echo (get_template_directory_uri() . '/images/no-image-header.png')?>" alt="" class="img-responsive" />

							<?php }?>


							<div class="left-elems">

								<div class = "sl-textbox">


									<div class="sl-title" title="<?php the_title()?>">
										<?php
										$shortened_title = wp_trim_words( the_title("","",false), $num_words = 8, $more = "...");
										echo $shortened_title;
										?>
									</div>

									<div class="sl-excerpt"><?php the_excerpt(''); ?></div>

								</div>
										
								<?php 
								/* HIDE CATEGORIES LABEL
								<div class="sl-categories clearfix">
									<div>
									<?php
											$category = get_the_category();
											echo $category[0]->cat_name;
											//echo get_the_category_list(' ');
									?>
									</div>
								</div>
								*/
								?>

								<?php 
								/* HIDE READ MORE
								<div class="sl-call-to-action">
									<a class="sl-button btn" href="<?php the_permalink(); ?>"><?php _e( 'Read more', 'bonestheme' );?></a>
								</div>
								*/
								?>
								
							</div>

							<div class="right-elems">


								<?php
								// GET EDITOR FIELDS FOR AVERAGE
									include( 'includes/inc-editor-fields.php' );
								?>

								<div class="gen-rating-box">
									<div class="gen-rating-num"><span><?php echo ($rating_editor_average_round); ?><span></div>

									<div class="gen-rating-meter">
										<div class="gen-rating-value" style="width:<?php echo ($rating_editor_average_metervalue); ?>px;"></div>
									</div>

									<div class="gen-rating-label"><?php _e( 'Our rating', 'bonestheme' );?></div>

								</div>



							</div>

						</a>
					</div>

					<?php wp_reset_postdata(); // RESET SLIDER OBJECT LOOP ?>
					<?php endif;?>

				<?php } // end for ?>
	 
					
				</div>
				<!-- end home-slider -->

			</div>
			<!-- end col -->
			
		</div>
		<!-- end row -->
	</div>
	<!-- end ontainer -->

</div>
<!-- end slider wrapper -->

<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
<!-- FEATURED REVIEWS -->
<!-- main title-->
<div class="home-main-title-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-md-10">
				<div class="featured-text"><?php _e( 'Featured reviews', 'bonestheme' );?></div>
			</div>
			<div class="col-md-2 hidden-sm hidden-xs to-relative">
				<div class="featured-icon"></div>
			</div>
		</div>
	</div>
</div>

<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
<!-- content area-->
<div class="home-content-area-wrapper">
	<div class="container">
		<div class="row">

			<?php
			$featured_elements=array();
			for ($i = 1; $i <= 20; $i++) {
				$post_object_elem = get_field('featured_review_'.$i);
				if($post_object_elem) {
					array_push($featured_elements, $post_object_elem);
				}
			}

			for ($i = 1; $i <= count($featured_elements); $i++) { ?>

			<?php
			$post_object = get_field('featured_review_'.$i);
			if( $post_object ): 
			  // override $post
				$post = $post_object;
				setup_postdata( $post ); 
			?>

			<div class="col-xs-12 col-sm-12 col-md-6">

				
				<div class="grid-item">

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

					<div class="grid-item-bottom">
						<div class="grid-item-cat">
							<?php 
								/* HIDE CAT LABEL
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

			</div>
			<!-- end col -->

			<?php wp_reset_postdata(); // RESET ?>
			<?php endif;?>

			<?php } // end for ?>

		</div>
		<!-- end row -->
	</div>
	<!-- end container -->
</div>
<!-- end content area -->

<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
<!-- EDITOR CHOICE -->
<!-- second title-->
<div class="home-second-title-wrapper">
	<div class="container">

		<div class="row">

			<div class="col-md-10">
				<div class="editor-text"><?php _e( 'We recommend', 'bonestheme' );?></div>
			</div>
			<div class="col-md-2 hidden-sm hidden-xs to-relative">
				<div class="editor-icon"></div>
			</div>

		</div>
	</div>
</div>

<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
<!-- second content-->
<div class="home-second-content-wrapper">

	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				
				<?php 

					$editor_elements=array();
					for ($i = 1; $i <= 20; $i++) {
						$post_object_elem = get_field('editor_choice_'.$i);
						if($post_object_elem) {
							array_push($editor_elements, $post_object_elem);
						}
					}

					for ($i = 1; $i <= count($editor_elements); $i++) { ?>

					<?php
					$post_object = get_field('editor_choice_'.$i);
					if( $post_object ): 
					  // override $post
						$post = $post_object;
						setup_postdata( $post ); 
					?>

					
						<div class="grid-item-wide">
							

									<a href="<?php the_permalink(); ?>">
									<div class="grid-item-box ">

										<div class="grid-item-title" title="<?php the_title()?>">
											<?php
											$shortened_title = wp_trim_words( the_title("","",false), $num_words = 8, $more = "...");
											echo $shortened_title;
											?>
										</div>

										<div class="grid-item-excerpt"><?php the_excerpt(''); ?></div>
										
									</div>
									</a>
									<?php 
									/* HIDE CALL TO ACTION READ MORE
									<div class="grid-call-to-action"><a class="sl-button btn" href="<?php the_permalink(); ?>"><?php _e( 'Read more', 'bonestheme' );?></a></div>
									*/ 
									?>
									<?php 
									/* HIDE DATE
									<div class="item-date clearfix">
										<div class="left day"><?php echo get_the_time('d') ?></div>
										<div class="right">
											<div class="month"><?php echo get_the_time('M') ?></div>
											<div class="year"><?php echo get_the_time('Y') ?></div>
										</div>
									</div>
									*/
									?>


									<?php 
									// GET EDITOR FIELDS FOR AVERAGE
										include( 'includes/inc-editor-fields.php' );
									?>

									<div class="gen-rating-box">
										<div class="gen-rating-num"><span><?php echo ($rating_editor_average_round); ?><span></div>
										<div class="gen-rating-meter">
											<div class="gen-rating-value" style="width:<?php echo ($rating_editor_average_metervalue); ?>px;"></div>
										</div>
										<div class="gen-rating-label"><?php _e( 'Our rating', 'bonestheme' );?></div>
									</div>

									<a href="<?php the_permalink(); ?>">
									<!-- ITEM IMAGE BOX -->

										<?php			
										$header_image = get_field( "review_header_image" );

										if($header_image){ ?>

											<img src="<?php echo  $header_image['url'] ?>" alt="<?php echo  $header_image['alt'] ?>" class="img-responsive" />

											<?php } else { ?>

											<img src="<?php echo (get_template_directory_uri() . '/images/no-image-header.png')?>" alt="" class="img-responsive" />

										<?php }?>

									</a>

						
						</div>
						<!-- end grid item wide -->
					

					<div class="clearfix"></div>

					<?php wp_reset_postdata(); // RESET ?>
					<?php endif;?>

				<?php } // end for ?>



			</div>
			<!-- end col -->
		</div>
		<!-- end row -->
	</div>
	<!-- end container -->
</div>
<!-- end content area -->

<?php endwhile; ?>
<?php endif; ?>
<!--  END LOOP -->




<script>

	$(document).ready(function() {

		// init Slider

		$("#home-slider").owlCarousel({
		 
			navigation : true, // Show next and prev buttons
			slideSpeed : 600,
			paginationSpeed : 600,
			singleItem:true,
			navigationText : ["<",">"],
			navigation : false,
			autoPlay :10000
			//transitionStyle : "fadeUp"// "fade", "backSlide", goDown and fadeUp. 
			//Lazy load
			/*lazyLoad : false,
			lazyFollow : true,
			lazyEffect : "fade",

			//Auto height
			autoHeight : false,

			//JSON 
			jsonPath : false, 
			jsonSuccess : false,

			//Mouse Events
			dragBeforeAnimFinish : true,
			mouseDrag : true,
			touchDrag : true,

			//Transitions
			transitionStyle : false,

			// Other
			addClassActive : false,

			//Callbacks
			beforeUpdate : false,
			afterUpdate : false,
			beforeInit: false, 
			afterInit: false, 
			beforeMove: false, 
			afterMove: false,
			afterAction: false,
			startDragging : false
			afterLazyLoad : false*/
		 
		});

		// custom next prev buttons
		var owl = $("#home-slider").data('owlCarousel');

		$("#btn-next").click(function() {
		  owl.next();
		});

		$("#btn-prev").click(function() {
		  owl.prev();
		});
	});
</script>





<?php get_footer(); ?>
