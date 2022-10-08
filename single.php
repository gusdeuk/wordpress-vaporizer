<?php
/*
 * SINGLE POST VIEW
*/
?>
<?php get_header(); ?>


<!--  START LOOP -->
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


<div class="single-header-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 single-header-container">

				<?php			
				$header_image = get_field( "review_header_image" );

				if($header_image){ ?>

					<img src="<?php echo  $header_image['url'] ?>" alt="<?php echo  $header_image['alt'] ?>" class="img-responsive" />

					<?php } else { ?>

					<img src="<?php echo (get_template_directory_uri() . '/images/no-image-header.png')?>" alt="" class="img-responsive" />

				<?php }?>

					<div class="left-elems">
						<div class = "single-header-textbox">

							<div class="single-header-title" itemprop="headline" title="<?php the_title()?>">
								<?php
								$shortened_title = wp_trim_words( the_title("","",false), $num_words = 8, $more = "...");
								echo $shortened_title;
								?>
							</div>

							<?php /*
							<div class="single-header-excerpt"><?php the_excerpt(); ?></div>
							*/?>

							<div class="single-header-excerpt"><?php echo get_the_time('d') ?> <?php echo get_the_time('M') ?> <?php echo get_the_time('Y') ?></div>

						</div>
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
						
						<?php /*
						<div class="item-date clearfix">
							
							<div class="left day"><?php echo get_the_time('d') ?></div>
							<div class="right">
								<div class="month"><?php echo get_the_time('M') ?></div>
								<div class="year"><?php echo get_the_time('Y') ?></div>
							</div>

						</div>
						*/?>

					</div>

			</div>
			<!-- end col -->
		</div>
		<!-- end row -->
	</div>
	<!-- end container -->
</div>
<!-- end single-header-wrapper -->

<div class="title-wrapper">
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
<!-- end main-title-wrapper -->


<div class="generic-content-wrapper">

	<!-- ************************************************* -->
	<!-- MAIN + OPTIONAL SIDEBAR -->
	<div class="container">  
		<div id="content" class="clearfix row">
			<div id="main" class="col-md-8 " role="main">
			<!-- ************************************************* -->
			<!-- MAIN -->


				<!-- Post content -->
				<div class="single-content-wrapper entry-content" itemprop="articleBody">

					<?php the_content(); ?>

				</div>
				<!-- end single-content-wrapper -->


				<!-- Specifications panel for CONTENT AREA -->
				<div id="specifications-content-wrapper">
					<div class="bigtitle"><?php _e( 'Specifications', 'bonestheme' )?></div>
					<?php
						require('includes/snip-product-specifications.php');
					?>
				</div>
				<!-- END specifications -->


				<!-- where to buy 2 for CONTENT AREA -->
				<div id="where-to-buy-content-wrapper">
					<?php
						if(get_field( "shop_label_1" )!=null){
							$has_shop_labels=true;
						} else {
							$has_shop_labels=false;
						}
						if($has_shop_labels) {
					?>
							<div class="bigtitle"><?php _e( 'Where to buy', 'bonestheme' )?></div>
							<div class="cont-where-to-buy2">
					<?php
						}

						for ($i = 1; $i <= 5; $i++) {				
							$shop_label = get_field( "shop_label_".$i );
							$shop_link = get_field( "shop_link_".$i );				
							if($shop_label!=null){
								echo ("<a class='call-to-action' href=".$shop_link." target='_blank'>".$shop_label."</a>");
							}				
						}

						if($has_shop_labels) {
					?>
						</div>
						<!-- close cont where to -->
						<div class="vaposhop-mobile-discount-disclaimer">
							<p align="center" style="margin-bottom: 30px;">
								<?php _e( '*Use voucher code <strong>VAPOINFO5</strong> for a 5% discount on your purchase from <a class="vaposhop-discount-link" target="_blank" href="https://vaposhop.com">VapoShop</a>', 'vaposhop-mobile' )?>
							</p>
						</div>
					<?php
						}
					?>
				</div>
				<!-- END where to buy 2-->

				

				<!-- editor verdict and ratings -->
				<div class="editor-verdict-box">

					<div class="editor-title"><?php _e( 'Editors Verdict', 'bonestheme' );?></div>

					<?php include( 'includes/inc-editor-fields.php' ); ?>

					<div class="data clearfix">
						<div class="editor-icon"></div>
						<div class="editor-verdict"><?php echo($editor_verdict);?></div>
 						<div class="gen-rating-box">
							<div class="gen-rating-num"><span><?php echo ($rating_editor_average_round); ?><span></div>
							<div class="gen-rating-meter">
								<div class="gen-rating-value" style="width:<?php echo ($rating_editor_average_metervalue); ?>px;"></div>
							</div>
							<div class="gen-rating-label"><?php _e( 'Average rating', 'bonestheme' );?></div>
						</div>
					</div>


					<!-- editor ratings -->
					<div class="ratings">

						<div class="item">
							<div class="left">
								<div class="rating-title"><?php _e( 'Cleaning / Maintenance', 'bonestheme' );?></div>
								<div class="rating-meter">
									<div class="rating-value" style="width:<?php echo ($editor_rating_cleaningMaintenance*10); ?>%;"></div>
								</div>
							</div>
	 						<div class="rating-number"><?php echo($editor_rating_cleaningMaintenance);?></div>
 						</div>

 						<div class="item">
							<div class="left">
								<div class="rating-title"><?php _e( 'Performance', 'bonestheme' );?></div>
								<div class="rating-meter">
									<div class="rating-value" style="width:<?php echo ($editor_rating_performance*10); ?>%;"></div>
								</div>
							</div>
	 						<div class="rating-number"><?php echo($editor_rating_performance);?></div>
 						</div>

 						<div class="item">
							<div class="left">
								<div class="rating-title"><?php _e( 'Value for Money', 'bonestheme' );?></div>
								<div class="rating-meter">
									<div class="rating-value" style="width:<?php echo ($editor_rating_valueForMoney*10); ?>%;"></div>
								</div>
							</div>
	 						<div class="rating-number"><?php echo($editor_rating_valueForMoney);?></div>
 						</div>

 						<div class="item">
							<div class="left">
								<div class="rating-title"><?php _e( 'Build Quality', 'bonestheme' );?></div>
								<div class="rating-meter">
									<div class="rating-value" style="width:<?php echo ($editor_rating_buildQuality*10); ?>%;"></div>
								</div>
							</div>
	 						<div class="rating-number"><?php echo($editor_rating_buildQuality);?></div>
 						</div>

 						<div class="item">
							<div class="left">
								<div class="rating-title"><?php _e( 'Ease of Use', 'bonestheme' );?></div>
								<div class="rating-meter">
									<div class="rating-value" style="width:<?php echo ($editor_rating_easyOfUse*10); ?>%;"></div>
								</div>
							</div>
	 						<div class="rating-number"><?php echo($editor_rating_easyOfUse);?></div>
 						</div>

					</div>
					<!-- end ratings -->
		
				</div>
				<!-- end editor-verdict-box -->

				

				<!-- Related reviews block -->
				<div class="related-reviews">
					<?php	
					$related_elements=array();
					for ($i = 1; $i <= 5; $i++) {
						$post_object_elem = get_field('related_review_'.$i);
						if($post_object_elem) {
							array_push($related_elements, $post_object_elem);
						}
					}

					// Show related fields (if we have)
					if (count($related_elements)>0) {
					?>
						<div class="bigtitle"><?php _e( 'You may also like', 'bonestheme' )?></div>
						<div class="related-list clearfix">

						<?php
							for ($i = 1; $i <= count($related_elements); $i++) { 
								// get post object from field
								$post_object = get_field('related_review_'.$i);

								if( $post_object ) {
									// print_r($post_object);
									// override $post
									$related_title = $post_object->post_title;
									$related_id = $post_object->ID;
									$related_link = get_permalink($related_id);
									// option 1 > get square thumbnail
									// $image_url = get_the_post_thumbnail_url( $related_id, 'thumbnail' );
									// option 2 > get featured image url
									$thumb_id = get_post_thumbnail_id($post_object);
									$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
									$image_url= $thumb_url_array[0];
									
						?>	
								<a class="item" href="<?php echo $related_link ?>">
									<div class="title"><?php echo $related_title ?></div>
									<div class="image"><img src="<?php echo $image_url ?>" alt="" class="img-responsive" /></div>
								</a>
									
						<?php
								} // end if post_object
							} // end for		
						?>
						
						</div>
						<!-- END Related list -->
					<?php
					} // end if COUNT
					?>
				</div>
				<!-- END Related reviews -->


				<!-- users average / display RATING RESULT -->
				<div class="users-average-box">
					<div class="average-label"><?php _e( "Average readers' rating", 'bonestheme' );?></div>

					<div class="average-number">
					<?php
					MRP_Multi_Rating_API::display_rating_result(array(
						//'post_id' => 54, // pasar post id si se llama de otro lado
						'rating_form_id' => 1,
						'show_rich_snippets' => false,
						'show_count' => false,
						'echo' => true,
						'result_type'=> "percentage",
						'no_rating_results_text'=> '-',
						'before_count'=> "(",
						'after_count'=> " ".__( 'votes', 'bonestheme' ).")",
						));
					?>
					</div>
				</div>
				<!-- end users-average-box -->


				<!-- users comments LIST / display RESULT REVIEWS -->
				<div class="bigtitle"><?php _e( 'Rating by our readers', 'bonestheme' );?></div>

				<?php
				MRP_Multi_Rating_API::display_rating_result_reviews(array(
				//'post_id' => "", // means all posts are used
					'rating_form_id' => 1,
					'show_avatar' => false,
					'show_date' => false,
					'comments_only' => true,
					'echo' => true,
					'before_name' => '',
					'before_comment' => '',
					'show_name' => true,
					'show_comment' => true,
					'before_date' => '',
					'after_date' => '',
					//'rating_entry_ids' => '1,2,3,4',
					//'limit' => 10,
					'show_rating_items' => false,// show items 
					'show_permalink' => false,
					'show_overall_rating' => true,
					'result_type'=>"percentage",
					'show_filter'=>false
					));
				?>


				<!-- leave comment / display RATING FORM -->
				<div class="bigtitle"><?php _e( 'Rate this vaporizer', 'bonestheme' );?></div>

				<?php
				MRP_Multi_Rating_API::display_rating_form(array(
					'title' => '',
					'submit_button_text' => __( 'Send', 'bonestheme' ),
					/*'update_button_text' => __( 'Update Comment / Rate', 'bonestheme' ),
					'delete_button_text' => __( 'Delete Comment / Rate', 'bonestheme' ),*/
					'show_name_input' => true,
					'show_email_input' => true,
					'show_comment_textarea' => true,
					'user_can_update_delete'=> false,
					'before_title'=> "<h3>",
					'after_title'=> "</h3>",
					'echo' => true
					));
				?>

				<?php 
				// STD Wp comments template (Not used)
				//comments_template();
				?>

			
			<!-- ************************************************* -->
			</div>

			<!-- END MAIN -->	
			<?php get_sidebar("single-post"); ?>
			<!-- END SIDEBAR -->

			<div class="clearfix visible-xs"></div>	
		</div>
		<!-- end #CONTENT -->
	</div>
	<!-- end container -->
	<!-- ************************************************* -->
	</div>
<!-- end generic content wrapper -->

<?php endwhile; ?>
<?php endif; ?>
<!--  END LOOP -->

<?php get_footer(); ?>
