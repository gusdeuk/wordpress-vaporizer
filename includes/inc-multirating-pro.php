<?php
/**
 * Makes optional fields required
 * 
 * @param unknown $validation_results
 * @param unknown $fields
 * @return $validation_results
 */
function mrp_optional_fields_validation( $validation_results, $fields ) {
	
	if ( isset( $fields['name'] ) && strlen( trim( $fields['name'] ) ) == 0 ) {
		array_push( $validation_results, array( 
				'severity' => 'error', 
				'field' => 'name',
				'name' => 'name_required_error',
				'message' => __( 'Name is required.', 'multi-rating-pro' ) ) );
	}
		
	if (  isset( $fields['email'] ) && strlen( trim( $fields['email'] ) ) == 0 ) {
		array_push( $validation_results, array(
				'severity' => 'error',
				'field' => 'email',
				'name' => 'email_required_error',
				'message' => __( 'E-mail is required.', 'multi-rating-pro' )
		) );
	}
		
	/*if (  isset( $fields['comment'] ) && strlen( trim( $fields['comment'] ) ) == 0 ) {
		array_push( $validation_results, array( 
				'severity' => 'error', 
				'field' => 'comment',
				'name' => 'comment_required_error',
				'message' => __( 'Comment is required.', 'multi-rating-pro' ) 
		) );
	}*/
	 
	return $validation_results;
}
add_filter( 'mrp_after_rating_form_field_validation', 'mrp_optional_fields_validation', 10, 12);