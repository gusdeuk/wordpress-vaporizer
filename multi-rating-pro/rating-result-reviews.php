<?php 
/**
 * Rating result reviews template
 */
?>

<div class="rating-result-reviews <?php if ( isset( $class ) ) { echo esc_attr( $class ); } ?>">
	
	<?php	
	if ( $show_filter == true && $taxonomy ) {	
		?>
		<form action="" class="mrp-filter" method="POST">
			
			<label for="term-id"><?php echo esc_html( $filter_label_text ); ?></label>
			<select id="term-id" name="term-id" class="term-id">
			
			<?php
			$selected = '';
			if ( $term_id == 0) {
				$selected = 'selected="selected"';
			}
			?>
			
			<option value="" <?php echo $selected; ?>><?php _e( 'All', 'multi-rating-pro' ); ?></option>
			
			<?php
			$terms = get_terms( $taxonomy );
			foreach ( $terms  as $current_term ) {
				$selected = '';
				if ( $current_term->term_id === $term_id ) {
					$selected = 'selected="selected"';
				}
				?>
				
				<option value="<?php echo esc_attr( $current_term->term_id ); ?>" <?php echo $selected; ?>><?php echo esc_html( $current_term->name ); ?></option>
				<?php
			}
			?>
			</select>
			
			<input type="submit" value="<?php echo esc_attr( $filter_button_text ); ?>" />
		</form>
	<?php
	}
	
	if ( count( $rating_result_reviews ) == 0 ) {
		
		$no_rating_results_text = apply_filters( 'mrp_no_rating_results_text', $no_rating_results_text );
		
		?>
		<p class="mrp"><?php echo esc_html( $no_rating_results_text ); ?></p>
		<?php 
	} else {
		
		?>
		<table>
		<?php
		
			foreach ( $rating_result_reviews as $rating_result_review ) {
				?>
				<tr class="rating-result-review">
					
					<?php
					
					$rating_result = $rating_result_review['rating_result'];
					$review_comment = $rating_result_review['comment'];
					$title = $rating_result_review['title'];
					$name = $rating_result_review['name'];
					$entry_date = $rating_result_review['entry_date'];
					$user_id = $rating_result_review['user_id'];
					$post_id = $rating_result_review['post_id'];
					$rating_form_id = $rating_result_review['rating_form_id'];
					
					?>

					<?php /*
					<td class="review-meta">

					MOVED TO DETAILS
					
					</td>
					*/?>
					
					<td class="review-details">

						<?php
						do_action( 'mrp_rating_result_reviews_before_review_meta', $rating_result_review );
						
						if ( $show_avatar ) {
							echo get_avatar( $user_id );
						}
						
						if ( $show_name ) {
							?>
							<div class="name">
								<?php
								if ( strlen( trim( $name ) ) == 0 ) {
									echo "$before_name" . __( 'Anonymous', 'multi-rating-pro' ) . "$after_name";
								} else {
									//echo "$before_name" . '<a href="' . get_author_posts_url( $user_id ) . '">' . esc_html( $name ) . '</a>' . "$after_name";
									echo "$before_name"  . esc_html( $name ) .  "$after_name";
								} ?>
							</div>
							<?php
						}
									
						
						if ( $show_overall_rating ) {
							
							do_action( 'mrp_rating_result_reviews_before_overall_rating', $rating_result_review );
							
							/**
							 * Overall rating result
							 */
							?>
							<p class="mrp">
								<?php
								mrp_get_template_part( 'rating-result', null, true, array(
									'no_rating_results_text' => '',
									'ignore_count' => true,
									'show_rich_snippets' => false,
									'show_title' => false,
									'before_title' => null,
									'after_title' => null,
									'show_date' => false,
									'show_count' => false,
									'result_type' => $result_type,
									'class' => $class . ' rating-result-' . $rating_form_id . '-' . $post_id,
									'rating_result' => $rating_result,
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
							</p>
							<?php	
						}

						if ( $show_date ) {
							?>
							<div class="entry-date"><?php echo "$before_date" . mysql2date( get_option( 'date_format' ), $entry_date ) . "$after_date"; ?></div>
							<?php
						}
						
						do_action( 'mrp_rating_result_reviews_after_review_meta', $rating_result_review );

						?>




						<?php
						
						do_action( 'mrp_rating_result_reviews_before_review_details', $rating_result_review );
						
						/**
						 * Comment
						 */
						if ( strlen( $title ) > 0 && $show_title ) {
								mrp_get_template_part( 'rating-result-review', 'title', true, array(
										'title' => $title
								) );
						}
						
						/**
						 * Comment
						 */
						if ( strlen( $review_comment ) > 0 && $show_comment ) {
							?>
							<p class="comment mrp"><?php echo "$before_comment" .  wp_kses_post( nl2br( $review_comment ) ) . "$after_comment"; ?></p>
							<?php
						}
						
						
			
						/**
						 * Rating Items
						 */
						if ( $show_rating_items && isset( $rating_result['rating_item_entry_values'] ) 
								&& is_array( $rating_result['rating_item_entry_values'] ) ) {
									
							do_action( 'mrp_rating_result_reviews_before_rating_items', $rating_result_review );
							
							foreach ( $rating_result['rating_item_entry_values'] as $rating_item_entry_value ) {
								
								?>
								<p class="mrp rating-item-result">
								
									<label class="description"><?php echo esc_html( $rating_item_entry_value['description'] ); ?></label>
								
									<span class="rating-result">
										<?php 
										$rating_item_type = $rating_item_entry_value['type'];
										$value = $rating_item_entry_value['value'];
										$value_text = stripslashes( $rating_item_entry_value['value_text'] );
										$max_option_value = $rating_item_entry_value['max_option_value'];
										
										if ( $rating_item_type == 'star_rating' ) {
												
											$template_part_name = 'star-rating';
											if ( $use_custom_star_images ) {
												$template_part_name = 'custom-star-images';
											}
												
											mrp_get_template_part( 'rating-result', $template_part_name, true, array(
												'max_stars' => $max_option_value,
												'star_result' => $value,
												'icon_classes' => $icon_classes,
												'image_height' => $image_height,
												'image_width' => $image_width
											) );
											
										} else if ( $rating_item_type == 'thumbs' ) {
					
											mrp_get_template_part( 'thumbs-value', null, true, array( 
												'value' => $value,
												'icon_classes' => $icon_classes
											) );
											
										} else {
											?>
											<span class="value-text"><?php echo esc_html( $value_text ); ?></span>
											<?php
											
										} ?>
									</span>
								</p>
								<?php
							}
						}
						
						/**
						 * Custom fields
						 */
						if ( $show_custom_fields && isset ( $rating_result['custom_field_values'] ) 
								&& is_array( $rating_result['custom_field_values'] ) ) {
									
							do_action( 'mrp_rating_result_reviews_before_custom_fields', $rating_result_review );
							
							foreach ( $rating_result['custom_field_values'] as $custom_field_value ) {
								
									$custom_field =  $custom_field_value['custom_field'];
									$value_text =  stripslashes( $custom_field_value['value'] );
								
									mrp_get_template_part( 'custom-field-value', null, true, array(
										'custom_field' => $custom_field,
										'value_text' => $value_text
									) );
							}
						}
						
						if ( $show_permalink ) {
							
							do_action( 'mrp_rating_result_reviews_before_permalink', $rating_result_review['post_id'] );
							
							$post_obj = get_post( $rating_result_review['post_id'] );
							?>
							<p class="mrp mrp-permalink"><a href="<?php echo get_the_permalink( $rating_result_review['post_id'] ); ?>"><?php echo esc_html( $post_obj->post_title ); ?></a></p>
							<?php
						}
			
						do_action( 'mrp_rating_result_reviews_after_review_details', $rating_result_review );
					?>
					</td>
				</tr>
				<?php
			}
			?>
		</table>	
		<?php
	}		
?>
</div>