<?php

$artist = $_POST['artist'];
$title = $_POST['title'];
$album = $_POST['album'];
$label = $_POST['label'];
$year = $_POST['year'];

$site = $_POST['sid'];

$sql = 'SELECT id FROM songs WHERE urlname="' . $site . '"';
$result = @mysql_query($sql);
$row = @mysql_fetch_array($result);

$id = $row['id'];

$sql = 'INSERT INTO song_samples (songid, sample, addedby) VALUES ' . 
	'("' . $id . '", "' . $artist . ' - ' . $title . ' (' . $album . ') [' . $label . ', ' . $year . ']' . '", "' . $_SESSION['hhbduserid'] . '")';



if (@mysql_query($sql)) {	
	$smarty->assign('infotype' , 'ok');
	$smarty->assign('info', 'Sampel zosta³ dodany do bazy!');
	$smarty->assign('ctitle', 'SAMPEL DODANY');
	}
else {
	$smarty->assign('infotype' , 'error');
	$smarty->assign('info', 'Sampel nie zosta³ dodany. Proszê spróbowaæ pó¼niej. Przepraszamy za wszelkie utrudnienia.');
	$smarty->assign('ctitle', 'B£¡D SERWERA');
	}

include ('info.php');

?>