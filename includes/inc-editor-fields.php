<?php

/*GET EDITOR FIELDS and calculate stuff for editor*/
$editor_rating_easyOfUse =  get_field( "editor_rating_easyOfUse" );
$editor_rating_performance=  get_field( "editor_rating_performance" );
$editor_rating_buildQuality =  get_field( "editor_rating_buildQuality" );
$editor_rating_valueForMoney =  get_field( "editor_rating_valueForMoney" );
$editor_rating_cleaningMaintenance =  get_field( "editor_rating_cleaningMaintenance" );

$rating_editor_average = ($editor_rating_easyOfUse + $editor_rating_performance + $editor_rating_buildQuality + $editor_rating_valueForMoney + $editor_rating_cleaningMaintenance)/5;

$rating_editor_average_round = round( $rating_editor_average, 1, PHP_ROUND_HALF_UP);
// martch con box de 120px >> multip por 12 limit 120px
$rating_editor_average_metervalue = $rating_editor_average_round*12;

// martch con box de % >> multip por 10
$rating_editor_average_metervalue_percent = $rating_editor_average_round*10;

$editor_verdict =  get_field( "editor_verdict" );

if ($editor_verdict==""){

	$editor_verdict="Please, complete the Editor Verdict field in the post custom fields.";
}

?>