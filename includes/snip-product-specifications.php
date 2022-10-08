<?php
	/*
	// GET ALL THE FIELDS FOR A FIELD GROUP ID
	$group_ID = 79;
	$fields = array();
	$fields = apply_filters('acf/field_group/get_fields', $fields, $group_ID);

	if ($fields) {
		//print_r( $fields );
		echo '<div class="spec-fields">';
		    //echo '<ul class="list-unstyled">';
		    echo '<ul class="">';
		  	foreach( $fields as $field_name => $field )
			  	{
			    $value = get_field( $field['name'] );
			    if( $value && $value != 'no') {
			      echo '<li>' . $field['label'] . ':&nbsp;' . $value . '</li>';
			  	}
			}
		  	echo '</ul>';
		echo '</div>';
	}
	*/
?>
<!-- Specs attributes GET ALL THE FIELDS FOR A FIELD GROUP ID -->

<div class="cont-specifications">

	<?php if(get_field( "manufacturer" )) { ?>
		<div class="item clearfix">
			<div class="item-label"><?php _e( 'Brand', 'bonestheme' );?></div>
			<div class="item-value"><?php echo(get_field( "manufacturer" ));?></div>
		</div>
	<?php } ?>

	<?php if(get_field( "suitable_for" )) { ?>
		<div class="item clearfix">
			<div class="item-label"><?php _e( 'Suitable for', 'bonestheme' );?></div>
			<div class="item-value"><?php echo(get_field( "suitable_for" ));?></div>
		</div>
	<?php } ?>

	<?php if(get_field( "dimensions" )) { ?>
		<div class="item clearfix">
			<div class="item-label"><?php _e( 'Dimensions', 'bonestheme' );?></div>
			<div class="item-value"><?php echo(get_field( "dimensions" ));?></div>
		</div>
	<?php } ?>

	<?php if(get_field( "weight" )) { ?>
		<div class="item clearfix">
			<div class="item-label"><?php _e( 'Weight', 'bonestheme' );?></div>
			<div class="item-value"><?php echo(get_field( "weight" ));?></div>
		</div>
	<?php } ?>

	<?php if(get_field( "battery_capacity" )) { ?>
		<div class="item clearfix">
			<div class="item-label"><?php _e( 'Battery capacity', 'bonestheme' );?></div>
			<div class="item-value"><?php echo(get_field( "battery_capacity" ));?></div>
		</div>
	<?php } ?>

	<?php if(get_field( "heat-up_time" )) { ?>
		<div class="item clearfix">
			<div class="item-label"><?php _e( 'Heat-up time', 'bonestheme' );?></div>
			<div class="item-value"><?php echo(get_field( "heat-up_time" ));?></div>
		</div>
	<?php } ?>

	<?php if(get_field( "price" )) { ?>
		<div class="item clearfix">
			<div class="item-label"><?php _e( 'Price', 'bonestheme' );?></div>
			<div class="item-value"><?php echo(get_field( "price" ));?></div>
		</div>
	<?php } ?>

</div>