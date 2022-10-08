<?php 
/**
 * Rating Result List template
 */
?>
<div class="rating-results-list <?php if (isset( $class ) ) { echo esc_attr( $class ); } ?>">
	<?php
	
	if ( count( $rating_results ) == 0 ) {


	} else {	
		?>
			<?php
			
			$index = 1;
			
			foreach ( $rating_results as $rating_result ) {
					
				$post_id = $rating_result['post_id'];
				$rating_form_id = $rating_result['rating_form_id'];
				$post_obj = get_post( $post_id );

				?>
	
				<a class="item" href="<?php echo esc_attr( get_the_permalink( $post_id ) ); ?>">
					
					
					<?php

					
					mrp_get_template_part( 'rating-result', null, true, array(
						'no_rating_results_text' => '',
						'ignore_count' => true,
						'show_rich_snippets' => false,
						'show_title' => false,
						'before_title' => $before_title,
						'after_title' => $after_title,
						'show_date' => false,
						'show_count' => $show_count,
						'result_type' => $result_type,
						'class' => $class . ' rating-result-list-' . $rating_form_id . '-' . $post_id,
						'rating_result' => $rating_result,
						'before_count' => $before_count,
						'after_count' => $after_count,
						'post_id' => $post_id,
						'rating_form_id' => $rating_form_id,
						'preserve_max_option' => false,
						'before_date' => $before_date,
						'after_date' => $after_date,
						'icon_classes' => $icon_classes,
						'use_custom_star_images' => $use_custom_star_images,
						'image_width' => $image_width,
						'image_height' => $image_height
					) );
					
					?>

					<div class="title"><?php echo esc_html( $post_obj->post_title ); ?></div>
				</a>

				<?php

				$index++;
			}
				
			?>
	<?php
	}
?>
</div>