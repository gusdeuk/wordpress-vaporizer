<?php
/*
 * Sidebar Template
*/
?>
<div id="sidebar" class="col-md-4">

		<!-- Specifications panel -->
		<div id="specifications-sidebar-wrapper">

			<h4 class="sidebar_title_1"><?php _e( 'Specifications', 'bonestheme' )?></h4>
			<?php
				require('includes/snip-product-specifications.php');
			?>

			<!-- Social BAR Plugin -->
			<h4 class="sidebar_title_2"><?php _e( 'Share this review', 'bonestheme' )?></h4>

			<div class="cont-share">
				<!-- Go to www.addthis.com/dashboard to customize your tools --> <div class="addthis_inline_share_toolbox"></div>
			</div>

		</div>



		<!-- tags -->
		<h4 class="sidebar_title_2"><?php _e( 'Tags', 'bonestheme' )?></h4>
		<div class="cont-tags">
			<?php the_tags( '<ul><li>', '</li><li>', '</li></ul>' ); ?>
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
		


		<!-- where to buy panel -->	

		<div id="where-to-buy-sidebar-wrapper">

				<?php
					if(get_field( "shop_label_1" )!=null){
						$has_shop_labels=true;
					} else {
						$has_shop_labels=false;
					}
					if($has_shop_labels) {
				?>
						<div class="sidebar_title_3"><?php _e( 'Where to buy', 'bonestheme' )?></div>
						<div class="cont-where-to-buy">
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
					<div class="vaposhop-discount-disclaimer">
						<p style="padding-top: 10px;">
							<?php _e( '*Use voucher code <strong>VAPOINFO5</strong> for a 5% discount on your purchase from <a class="vaposhop-discount-link" target="_blank" href="https://vaposhop.com">VapoShop</a>', 'vaposhop' )?>
						</p>
					</div>
				<?php
					}
				?>

		</div>

		<?php if ( is_active_sidebar( 'sidebar1' ) ) : ?>
			<!-- get other widgets -->
			<?php //dynamic_sidebar( 'sidebar1' ); ?>
		<?php endif; ?>

</div>
<!-- end sidebar -->

<script type="text/javascript">

 		var q2w3_sidebar_options = {
                "sidebar": "sidebar",
                "margin_top": 0,
                "margin_bottom": 0,
                "screen_max_width": 980,
                "width_inherit": false,
                "widgets": ['where-to-buy-sidebar-wrapper']
        };

        jQuery(document).ready(function() {

        q2w3_sidebar(q2w3_sidebar_options);

        // execute something only once after resizing
		var resizeId="";
		$(window).resize(function() {
		    clearTimeout(resizeId);
		    resizeId = setTimeout(doneResizing, 1000);
		});
		 
		 
		function doneResizing(){
		    //refresh things sidebar
		    q2w3_sidebar(q2w3_sidebar_options);
		    // kill timeout
		    clearTimeout(resizeId);
		}


        });


</script>
