<?php
/**
 * Rating form template for optional fields i.e. name, email and comment
 */

// Show name input. Do not show name input if logged in, the user's display name is used
if ( $show_name_input == true && $user_id == 0 && $comment_id == null ) {
	?>
	<p class="mrp optional-field">
		<input type="text" name="name-<?php echo $sequence; ?>" size="30" placeholder="<?php _e( 'Name', 'multi-rating-pro' ); ?>" id="mrp-name-<?php echo $sequence ?>" class="name" value="<?php echo esc_attr( $name ); ?>" maxlength="100"></input>
		<span id="name-<?php echo $sequence; ?>-error" class="mrp-error"></span>
	</p>
	<?php
}

// Show email input. Do not show email input if logged in, the user's email is used
if ( $show_email_input == true && $user_id == 0 && $comment_id == null ) {
	?>
	<p class="mrp optional-field">
		<input type="text" name="email-<?php echo $sequence ?>" size="30" placeholder="<?php  _e( 'E-mail', 'multi-rating-pro' ); ?>" id="mrp-email-<?php echo $sequence ?>" class="name" value="<?php echo esc_attr( $email ); ?>" maxlength="100"></input>
		<span id="email-<?php echo $sequence; ?>-error" class="mrp-error"></span>
	</p>
	<?php
}

// Show comment textarea
if ( $show_comment_textarea == true && $comment_id == null ) {
	?>
	<p class="mrp optional-field">
		<textarea rows="5" cols="50" name="comment-<?php echo $sequence ?>" placeholder="<?php _e( 'Comments', 'multi-rating-pro' ); ?>" id="mrp-comment-<?php echo $sequence ?>" class="comments" value="" maxlength="1020"><?php echo esc_textarea( $comment ); ?></textarea>
		<span id="comment-<?php echo $sequence; ?>-error" class="mrp-error"></span>
	</p>
	<?php
}