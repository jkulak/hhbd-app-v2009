<?php

//yyyy-mm-dd hh-mm-ss

$dni_tygodnia = array ( 'niedziela', 'poniedziałek', 'wtorek', 'środa', 'czwartek', 'piątek', 'sobota');

function show_date_from_timestamp($timestamp, $delimiter) {
	return(substr($timestamp, 0, 4) . $delimiter . substr($timestamp, 4, 2) . $delimiter . substr($timestamp, 6, 2));
	}
	
function show_time_from_timestamp($timestamp, $delimiter) {
	return(substr($timestamp, 8, 2) . $delimiter . substr($timestamp, 10, 2). $delimiter . substr($timestamp, 12, 2));
	}
	
function show_time_from_datetime($timestamp, $delimiter) {
	return(substr($timestamp, 11, 2) . $delimiter . substr($timestamp, 14, 2). $delimiter . substr($timestamp, 17, 2));
	}	
	
function show_normal_date($date){
	$months = array(1=>'stycznia', 'lutego', 'marca', 'kwietnia', 'maja', 'czerwca', 'lipca', 'sierpnia', 'września', 'października', 'listopada', 'grudnia');
	return((int)substr($date, 8, 2) . ' ' . $months[(int)substr($date, 5, 2)] . ' ' . substr($date, 0, 4));
	}
	
function show_normal_date_from_timestamp($date){
	$months = array(1=>'stycznia', 'lutego', 'marca', 'kwietnia', 'maja', 'czerwca', 'lipca', 'sierpnia', 'września', 'października', 'listopada', 'grudnia');
	return((int)substr($date, 6, 2) . ' ' . $months[(int)substr($date, 4, 2)] . ' ' . substr($date, 0, 4));
	}

?>