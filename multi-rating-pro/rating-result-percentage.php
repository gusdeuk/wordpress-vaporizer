<span class="percentage-result">
	<?php //echo $rating_result['adjusted_percentage_result']; ?>
	<?php 
	// CONMVERT PERCENTAGE 52.55% TO BASE 10 (5.2)
	$rating_average_round_base10 =  round($rating_result['adjusted_percentage_result']/10, 1, PHP_ROUND_HALF_UP);
	echo $rating_average_round_base10;
	?>
</span>