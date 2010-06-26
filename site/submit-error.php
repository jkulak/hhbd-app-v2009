<?php

$sid = $_POST['add'];
$site = $_POST['sid'];
$addedby = $_POST['addedby'];
$message = $_POST['message'];

$sql = 'INSERT INTO submision_errors (sid, site, addedby, message) VALUES ' . 
	'("' . $sid . '", "' . $site . '", "' . $addedby . '", "' . $message . '")';

if (@mysql_query($sql)) {	
	$smarty->assign('infotype' , 'ok');
	$smarty->assign('info', 'Informacja o b³êdnych danych zosta³a wys³ana. Problem zostanie rozpatrzony tak szybko jak to tylko mo¿liwe. Dziêkujemy za pomoc. Zostaniesz poinformowany o podjêtej akcji.');
	$smarty->assign('ctitle', 'INFORMACJA O B£ÊDNYCH DANYCH WYS£ANA');
	}
else {
	$smarty->assign('infotype' , 'error');
	$smarty->assign('info', 'Informacja o b³êdnych danych nie zosta³a wys³ana. Proszê spróbowaæ pó¼niej. Przepraszamy za wszelkie utrudnienia.');
	$smarty->assign('ctitle', 'B£¡D SERWERA BAZ DANYCH');
	}

include ('info.php');

?>