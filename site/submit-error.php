<?php

$sid = $_POST['add'];
$site = $_POST['sid'];
$addedby = $_POST['addedby'];
$message = $_POST['message'];

$sql = 'INSERT INTO submision_errors (sid, site, addedby, message) VALUES ' . 
	'("' . $sid . '", "' . $site . '", "' . $addedby . '", "' . $message . '")';

if (@mysql_query($sql)) {	
	$smarty->assign('infotype' , 'ok');
	$smarty->assign('info', 'Informacja o b��dnych danych zosta�a wys�ana. Problem zostanie rozpatrzony tak szybko jak to tylko mo�liwe. Dzi�kujemy za pomoc. Zostaniesz poinformowany o podj�tej akcji.');
	$smarty->assign('ctitle', 'INFORMACJA O B��DNYCH DANYCH WYS�ANA');
	}
else {
	$smarty->assign('infotype' , 'error');
	$smarty->assign('info', 'Informacja o b��dnych danych nie zosta�a wys�ana. Prosz� spr�bowa� p�niej. Przepraszamy za wszelkie utrudnienia.');
	$smarty->assign('ctitle', 'B��D SERWERA BAZ DANYCH');
	}

include ('info.php');

?>