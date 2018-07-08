<?php 
	$now = time(); 
	$LMP = strtotime("2018-01-04");
	$datediff = $now - $LMP;
	$days = round($datediff / (60 * 60 * 24));
	$genweek = floor($days / 7);
	echo $genweek;
?>