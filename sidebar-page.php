<?php
/*
 * Sidebar Template
*/
?>
<div id="sidebar" class="col-md-4">

		<!-- Specifications panel (no specs for pages, only share)-->
		<div id="specifications-sidebar-wrapper">

			<!-- Social BAR Plugin -->
			<h4 class="sidebar_title_2"><?php _e( 'Share this page', 'bonestheme' )?></h4>

			<div class="cont-share">
				<!-- Go to www.addthis.com/dashboard to customize your tools --> <div class="addthis_inline_share_toolbox"></div>
			</div>

		</div>



		<!-- tags (show tag cloud 10 most popular)-->
		<h4 class="sidebar_title_2"><?php _e( 'Top 10 Tags', 'bonestheme' )?></h4>
		<div class="cont-tags">
			<?php 
			
			$tags = get_tags();
			$args = array(
				'smallest'                  => 14, 
				'largest'                   => 14,
				'unit'                      => 'px', 
				'number'                    => 10,  
				'format'                    => 'flat',
				'separator'                 => "</li><li>",
				'orderby'                   => 'count', 
				'order'                     => 'DESC',
				'show_count'                => 1,
				'echo'                      => false
			);
			$tag_string = '<ul><li>' . wp_tag_cloud($args ) . '</li></ul>';
			echo($tag_string);

			?>
		</div>


		<!-- latest reviews -->
		<h4 class="sidebar_title_2"><?php _e( 'Latest reviews', 'bonestheme' )?></h4>

		<div class="cont-latest-reviews">
			<ul>
				<?php
					$args = array( // Define WP Query Parameters
						'post_type' => 'post',
						'posts_per_page'=> '5',
					);
					$the_query = new WP_Query( $args ); 
					while ($the_query -> have_posts()) : $the_query -> the_post(); 
					?>
						<li>
						<a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
						</li>
					<?php
					endwhile;

					wp_reset_postdata(); //reset
				?>
			</ul>
		</div>


		<?php /*
		<!-- popular reviews -->
		<h4 class="sidebar_title_2"><?php _e( 'Top Rated by Our Readers', 'bonestheme' )?></h4>

		<div class="cont-popular-reviews">
			<?php
			MRP_Multi_Rating_API::display_rating_results_list(array(
				'show_count' => false,
				'title' => '',
				'rating_form_id' => 1,
				'show_filter' => false,
				'filter_label_text' => __( 'Choose a category', 'bonestheme' ),
				'filter_button_text' => __( 'Filter', 'bonestheme' ),
				'taxonomy' => 'category',
				'term_id' => 0, // for all,
				'show_featured_img' => false,
				'image_size' => 'thumbnail',
				'sort_by' => 'highest_rated',
				'show_rank' => false,
				'limit' => 5,
				'result_type' => 'percentage'
				));
			?>
		</div>
		*/ ?>


		<!-- NEW top editor highest rated reviews -->
		<h4 class="sidebar_title_2"><?php _e( 'Highest Rated', 'bonestheme' )?></h4>

		<div class="cont-popular-reviews">
			<div class="rating-results-list ">

				<?php 
				$editorposts = get_posts( array(
					'posts_per_page' => 100,
					'suppress_filters' => false
				) );
				
				$sortedposts = [];
				if ( $editorposts ) {
					foreach ( $editorposts as $post ) :
						setup_postdata( $post ); 
						// GET EDITOR FIELDS FOR AVERAGE
						include( 'includes/inc-editor-fields.php' );
						// get editor fields average and save + url
						$post->average = $rating_editor_average;
						$post->url = get_permalink($post->ID);
						array_push($sortedposts, $post);
					endforeach; 
					wp_reset_postdata();

					// sort by average
					function cmp($a, $b) {
						return strcmp($b->average, $a->average);
					}
					usort($sortedposts, "cmp");

					// show 5 highest only
					$sortedposts = array_slice($sortedposts, 0, 5, true);

					foreach ( $sortedposts as $postx ) : ?>

						<a class="item" href="<?php echo $postx->url;?>">
							<span class="rating-result">
								<span class="percentage-result"> <?php echo $postx->average;?></span>
							</span>
							<div class="title"><?php echo $postx->post_title;?></div>
						</a>

					<?php
					endforeach;

				} ?>
			</div>
		</div>
		<!-- end top editor highest rated reviews -->

		<?php if ( is_active_sidebar( 'sidebar1' ) ) : ?>
			<!-- get other widgets -->
			<?php //dynamic_sidebar( 'sidebar1' ); ?>
		<?php endif; ?>

</div>
<!-- end sidebar -->
