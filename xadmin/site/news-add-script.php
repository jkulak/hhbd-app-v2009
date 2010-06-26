<?php

if (!isset($_SESSION['adminusername'])) {
    header('Location: /');
	exit();
    }

$news = $_POST['news'];
$title = $_POST['title'];
$userid = $_SESSION['adminuserid'];

// $glyph = $_POST['glyph'];

$artists = $_POST['artists'];
$labels = $_POST['labels'];
$concerts = $_POST['concerts'];
$albums = $_POST['albums'];
$cities = $_POST['cities'];

$added = $_POST['date'];
if ($added == '') $added = date('Y-m-d H:i:s');

$filename = $_FILES['graph']['tmp_name'];

$newfilename = strtolower(substr($added, 0, 10) . '-' . substr($title, 0, 10) . '-' . substr($news, 0, 20));
$newfilename = create_urlname($newfilename, 1, 1);

$path = dirname( $_SERVER['PATH_TRANSLATED'] );
$path = substr($path, 0, -6); // 6 bo xadmin
// print ('<BR>path:' . $path . '<BR>');

$newname = $path . 'imgs/database/news/' . $fileprefix . $newfilename . '.jpg';
$thumb = $path . 'imgs/database/news-thumbs/' . $fileprefix . $newfilename . '_small.jpg';
$glyph = $path . 'imgs/database/news-glyphs/' . $fileprefix . $newfilename . '_glyph.jpg';

if ($filename != '') { $newfilename = $fileprefix . $newfilename . '.jpg'; } else $newfilename = '';

//print ('<BR><BR>filename:' . $newname . '<BR><BR>');
//print ('<BR><BR>graph:' . $graph . '<BR><BR>');

//print ('<B>TITLE:</B>&nbsp;' . $title . '<BR>');
//print ('<B>NEWS:</B>&nbsp;' . nl2br($news) . '<BR><BR>');
//print ('<B>EXPIRES:</B>&nbsp;' . $expires . '<BR><BR>');
//print ('<B>ADDEDBYID:</B>&nbsp;' . $userid . '<BR><BR>');

$sql = 'INSERT INTO news (title, news, addedby, added, graph) VALUES ' .
       '("' . $title . '", "' . $news . '", "' . $userid . '", "' . $added . '", "' . $newfilename . '")';
$result = mysql_query($sql);
if ($result) {
    $smarty->assign('info', 'News zosta³ dodany do bazy.');
	$newsid = mysql_insert_id();

	//upload grafiki
	if (move_uploaded_file($filename,$newname)) {
		$smarty->assign('fileinfo', 'Skopiowano grafikê na serwer.');

		createthumbnail($thumb, $newname, 10979669, 148, 0);
		createthumbnail($glyph, $newname, 10979669, 35, 35);

		}
	else {
		$smarty->assign('fileinfo', '<font color=red>Nie skopiowano grafiki na serwer.</font>');
		}		
	
	
	
	//dodanie powiazan	
	
	
$concertsarray = explode(',', $concerts);
foreach ($concertsarray as $concert) 
	if ($concert!= '') {
		$sql = 'INSERT INTO news_concert_lookup (concertid, newsid) ' .
			   'VALUES ("' . $concert . '", "' . $newsid . '")';
		$resutl = mysql_query($sql);
		}	
		
		
		
$artistsarray = explode(',', $artists);
foreach ($artistsarray as $artist) 
	if ($artist!= '') {
		$sql = 'INSERT INTO news_artist_lookup (artistid, newsid) ' .
			   'VALUES ("' . $artist . '", "' . $newsid . '")';
		$resutl = mysql_query($sql);
		}
		
$labelsarray = explode(',', $labels);
foreach ($labelsarray as $label) 
	if ($label != '') {
		$sql = 'INSERT INTO news_label_lookup (labelid, newsid) ' .
			   'VALUES ("' . $label . '", "' . $newsid . '")';
		$resutl = mysql_query($sql);
		}		
		
$albumsarray = explode(',', $albums);
foreach ($albumsarray as $album) 
	if ($album!= '') {
		$sql = 'INSERT INTO news_album_lookup (albumid, newsid) ' .
			   'VALUES ("' . $album . '", "' . $newsid . '")';
		$resutl = mysql_query($sql);
		}			
		
$citiesarray = explode(',', $cities);
foreach ($citiesarray as $city) 
	if ($city!= '') {
		$sql = 'INSERT INTO news_city_lookup (cityid, newsid) ' .
			   'VALUES ("' . $city . '", "' . $newsid . '")';
		$resutl = mysql_query($sql);
		}	
	
		
} else {
    $smarty->assign('info', '<font color=red>News NIE zosta³ dodany do bazy.</font> (' . mysql_error() . ')');
    }

//*****************************************************************	
$smarty->assign('ctitle', 'DODAWANIE NEWSA');
$smarty->assign('mainsection', '<font color="#6f91ac">DODAWANIE NEWSA</font>');
$smarty->assign('body_template', 'site/news-add-script.tpl');
//*****************************************************************
?>