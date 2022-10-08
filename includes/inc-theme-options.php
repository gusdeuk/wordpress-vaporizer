<?php

add_action( 'admin_init', 'theme_options_init' );
add_action( 'admin_menu', 'theme_options_add_page' );

/*
Init plugin options to white list our options
*/

/* PARA ACCEDER A LOS SETTINGS DE CUALQUIER LADO
    $options = get_option('nwrk_theme_options');
    echo $options['sometext'];
*/


function theme_options_init(){
	register_setting( 'nwrk_options', 'nwrk_theme_options', 'theme_options_validate' );
}

/**
 * Load up the menu page
 */
function theme_options_add_page() {
	//add_theme_page( __( 'Theme Options', 'bonestheme' ), __( 'Theme Options', 'bonestheme' ), 'edit_theme_options', 'theme_options', 'theme_options_do_page' );
	add_menu_page( __( 'Global Options', 'bonestheme' ), __( 'Global Options', 'bonestheme' ), 'edit_theme_options', 'theme_options', 'theme_options_do_page', get_bloginfo('template_url') . "/images/nwrk-icon.png" /*, 30*/);
	//add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
	//PARA QUE ESTO FUNCIONE PARA EL EDITOR, DEBO HABILITARLE "edit_theme_options" y TAMBNIEN "manage_options", sino no graba los settings
	//add_menu_page("Custom Settings", "Custom Settings", 'edit_theme_options', basename(__FILE__), 'theme_settings_admin', get_bloginfo('template_url') . "/images-xtra/icon_admin.png");
}


/**
 * Create arrays for our select and radio options
 */
$select_options = array(
	'0' => array(
		'value' =>	'0',
		'label' => __( 'Zero', 'bonestheme' )
	),
	'1' => array(
		'value' =>	'1',
		'label' => __( 'One', 'bonestheme' )
	),
	'2' => array(
		'value' => '2',
		'label' => __( 'Two', 'bonestheme' )
	),
	'3' => array(
		'value' => '3',
		'label' => __( 'Three', 'bonestheme' )
	),
	'4' => array(
		'value' => '4',
		'label' => __( 'Four', 'bonestheme' )
	),
	'5' => array(
		'value' => '3',
		'label' => __( 'Five', 'bonestheme' )
	)
);

$radio_options = array(
	'yes' => array(
		'value' => 'yes',
		'label' => __( 'Yes', 'bonestheme' )
	),
	'no' => array(
		'value' => 'no',
		'label' => __( 'No', 'bonestheme' )
	),
	'maybe' => array(
		'value' => 'maybe',
		'label' => __( 'Maybe', 'bonestheme' )
	)
);

/**
 * Create the options page
 */
function theme_options_do_page() {
	global $select_options, $radio_options;

	if ( ! isset( $_REQUEST['settings-updated'] ) )
		$_REQUEST['settings-updated'] = false;

	?>
	<div class="wrap">
		<?php /*screen_icon(); */echo "<h2>" /*. get_current_theme()*/ . __( 'Global Site Options', 'bonestheme' ) . "</h2>"; ?>

		<hr>

		<?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
		<div class="updated fade"><p><strong><?php _e( 'Options saved', 'bonestheme' ); ?></strong></p></div>
		<?php endif; ?>

		<form method="post" action="options.php">
			<?php settings_fields( 'nwrk_options' ); ?>
			<?php $options = get_option( 'nwrk_theme_options' ); ?>

			<table class="form-table">

				<!-- HEADER PHRASES OPTIONS -->
				<tr valign="top"><th scope="row"><?php _e( 'Header Text EN', 'bonestheme' ); ?></th>
					<td>
						<input id="nwrk_theme_options[header_text_en]" class="regular-text" type="text" name="nwrk_theme_options[header_text_en]" value="<?php esc_attr_e( $options['header_text_en'] ); ?>" />
						
					</td>
				</tr>
				<tr valign="top"><th scope="row"><?php _e( 'Header Text DE', 'bonestheme' ); ?></th>
					<td>
						<input id="nwrk_theme_options[header_text_de]" class="regular-text" type="text" name="nwrk_theme_options[header_text_de]" value="<?php esc_attr_e( $options['header_text_de'] ); ?>" />
						
					</td>
				</tr>
				<tr valign="top"><th scope="row"><?php _e( 'Header Text NL', 'bonestheme' ); ?></th>
					<td>
						<input id="nwrk_theme_options[header_text_nl]" class="regular-text" type="text" name="nwrk_theme_options[header_text_nl]" value="<?php esc_attr_e( $options['header_text_nl'] ); ?>" />
						
					</td>
				</tr>
				<tr valign="top"><th scope="row"><?php _e( 'Header Text FR', 'bonestheme' ); ?></th>
					<td>
						<input id="nwrk_theme_options[header_text_fr]" class="regular-text" type="text" name="nwrk_theme_options[header_text_fr]" value="<?php esc_attr_e( $options['header_text_fr'] ); ?>" />
						
					</td>
				</tr>
				<tr valign="top"><th scope="row"><?php _e( 'Header Text IT', 'bonestheme' ); ?></th>
					<td>
						<input id="nwrk_theme_options[header_text_it]" class="regular-text" type="text" name="nwrk_theme_options[header_text_it]" value="<?php esc_attr_e( $options['header_text_it'] ); ?>" />
						
					</td>
				</tr>
				<tr valign="top"><th scope="row"><?php _e( 'Header Text ES', 'bonestheme' ); ?></th>
					<td>
						<input id="nwrk_theme_options[header_text_es]" class="regular-text" type="text" name="nwrk_theme_options[header_text_es]" value="<?php esc_attr_e( $options['header_text_es'] ); ?>" />
						
					</td>
				</tr>

			</table>


			<hr>

			<table class="form-table">

				<!-- SOCIAL OPTIONS -->
				<tr valign="top"><th scope="row"><?php _e( 'Facebook header link', 'bonestheme' ); ?></th>
					<td>
						<input id="nwrk_theme_options[social_facebook]" class="regular-text" type="text" name="nwrk_theme_options[social_facebook]" value="<?php esc_attr_e( $options['social_facebook'] ); ?>" />
					</td>
				</tr>
				<tr valign="top"><th scope="row"><?php _e( 'Twitter header link', 'bonestheme' ); ?></th>
					<td>
						<input id="nwrk_theme_options[social_twitter]" class="regular-text" type="text" name="nwrk_theme_options[social_twitter]" value="<?php esc_attr_e( $options['social_twitter'] ); ?>" />
					</td>
				</tr>
				<tr valign="top"><th scope="row"><?php _e( 'Instagram header Link', 'bonestheme' ); ?></th>
					<td>
						<input id="nwrk_theme_options[social_instagram]" class="regular-text" type="text" name="nwrk_theme_options[social_instagram]" value="<?php esc_attr_e( $options['social_instagram'] ); ?>" />
					</td>
				</tr>
				<tr valign="top"><th scope="row"><?php _e( 'You tube header link', 'bonestheme' ); ?></th>
					<td>
						<input id="nwrk_theme_options[social_youtube]" class="regular-text" type="text" name="nwrk_theme_options[social_youtube]" value="<?php esc_attr_e( $options['social_youtube'] ); ?>" />
					</td>
				</tr>


				<?php /*

				 <!-- A sample checkbox option -->

				<tr valign="top"><th scope="row"><?php _e( 'A checkbox', 'bonestheme' ); ?></th>
					<td>
						<input id="nwrk_theme_options[option1]" name="nwrk_theme_options[option1]" type="checkbox" value="1" <?php checked( '1', $options['option1'] ); ?> />
						<label class="description" for="nwrk_theme_options[option1]"><?php _e( 'Sample checkbox', 'bonestheme' ); ?></label>
					</td>
				</tr>

				<!-- A sample text  -->
				<tr valign="top"><th scope="row"><?php _e( 'Some text', 'bonestheme' ); ?></th>
					<td>
						<input id="nwrk_theme_options[sometext]" class="regular-text" type="text" name="nwrk_theme_options[sometext]" value="<?php esc_attr_e( $options['sometext'] ); ?>" />
						<label class="description" for="nwrk_theme_options[sometext]"><?php _e( 'Sample text input', 'bonestheme' ); ?></label>
					</td>
				</tr>

				<!-- A sample select option -->
				<tr valign="top"><th scope="row"><?php _e( 'Select input', 'bonestheme' ); ?></th>
					<td>
						<select name="nwrk_theme_options[selectinput]">
							<?php
								$selected = $options['selectinput'];
								$p = '';
								$r = '';

								foreach ( $select_options as $option ) {
									$label = $option['label'];
									if ( $selected == $option['value'] ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";
								}
								echo $p . $r;
							?>
						</select>
						<label class="description" for="nwrk_theme_options[selectinput]"><?php _e( 'Sample select input', 'bonestheme' ); ?></label>
					</td>
				</tr>

				<!-- A sample radio  -->
				<tr valign="top"><th scope="row"><?php _e( 'Radio buttons', 'bonestheme' ); ?></th>
					<td>
						<fieldset><legend class="screen-reader-text"><span><?php _e( 'Radio buttons', 'bonestheme' ); ?></span></legend>
						<?php
							if ( ! isset( $checked ) )
								$checked = '';
							foreach ( $radio_options as $option ) {
								$radio_setting = $options['radioinput'];

								if ( '' != $radio_setting ) {
									if ( $options['radioinput'] == $option['value'] ) {
										$checked = "checked=\"checked\"";
									} else {
										$checked = '';
									}
								}
								?>
								<label class="description"><input type="radio" name="nwrk_theme_options[radioinput]" value="<?php esc_attr_e( $option['value'] ); ?>" <?php echo $checked; ?> /> <?php echo $option['label']; ?></label><br />
								<?php
							}
						?>
						</fieldset>
					</td>
				</tr>

				<!-- A sample TEXT AREA option -->
				<tr valign="top"><th scope="row"><?php _e( 'A textbox', 'bonestheme' ); ?></th>
					<td>
						<textarea id="nwrk_theme_options[sometextarea]" class="large-text" cols="50" rows="10" name="nwrk_theme_options[sometextarea]"><?php echo esc_textarea( $options['sometextarea'] ); ?></textarea>
						<label class="description" for="nwrk_theme_options[sometextarea]"><?php _e( 'Sample text box', 'bonestheme' ); ?></label>
					</td>
				</tr>

				*/?>
			</table>


			<hr>

			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e( 'Save Options', 'bonestheme' ); ?>" />
			</p>
		</form>
	</div>
	<?php
}

/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */
function theme_options_validate( $input ) {
	global $select_options, $radio_options;

	// Our checkbox value is either 0 or 1
	if ( ! isset( $input['option1'] ) )
		$input['option1'] = null;
	$input['option1'] = ( $input['option1'] == 1 ? 1 : 0 );

	// Say our text option must be safe text with no HTML tags
	$input['sometext'] = wp_filter_nohtml_kses( $input['sometext'] );

	// Our select option must actually be in our array of select options
	if ( ! array_key_exists( $input['selectinput'], $select_options ) )
		$input['selectinput'] = null;

	// Our radio option must actually be in our array of radio options
	if ( ! isset( $input['radioinput'] ) )
		$input['radioinput'] = null;
	if ( ! array_key_exists( $input['radioinput'], $radio_options ) )
		$input['radioinput'] = null;

	// Say our textarea option must be safe text with the allowed tags for posts
	$input['sometextarea'] = wp_filter_post_kses( $input['sometextarea'] );

	return $input;
}

// adapted from http://planetozh.com/blog/2009/05/handling-plugins-options-in-wordpress-28-with-register_setting/
?>