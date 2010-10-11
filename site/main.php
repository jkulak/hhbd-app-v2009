<?php

	//*****************************************************************	
	$smarty->assign('title', 'HHBD.PL - Polski hip-hop, albumy, zapowiedzi, wykonawcy');
	$smarty->assign('description', 'Polski hip-hop, największa baza informacji, najnowsze albumy, informacje o wykonawcach.');
	$smarty->assign('cssfile', 'main');
	//*****************************************************************

// ************************************************************* OSTATNIO WYDANE

$sql = 'SELECT t1.urlname AS artisturlname, t1.name, t3.premier, t3.title, t3.urlname AS albumurlname, t3.year, t3.singiel, t3.cover, t4.name AS labelname, t4.urlname AS labelurlname ' . 
	'FROM artists AS t1, album_artist_lookup AS t2, albums AS t3, labels AS t4 ' .
	'WHERE (t1.id=t2.artistid AND t2.albumid=t3.id AND t4.id=t3.labelid AND t3.year' . '<="' . date('Y-m-d') . '") ' . 
	'ORDER BY t3.year DESC ' .
	'LIMIT 3';

$result = mysql_query($sql);

	$ownalbum_titles_list = array();
	$ownalbum_artists_list = array();
	$ownalbum_covers_list = array();
	$ownalbum_ids_list = array();
	$ownalbum_years_list = array();
	$ownalbum_labels_list = array();
	$ownalbum_sns_list = array();
	
	$own_titles = array();
	$own_names = array();
	
	while ( $row = @mysql_fetch_array($result) ) { 
		$year = $row['year'];
		$year = substr($year, 0, 4);  	
		$singiel = ($row['singiel'] == 1) ? ' (EP)' : '';
		array_push($ownalbum_titles_list, '<a href="/a/' . $row['albumurlname'] . '">' . $row['title'] . $singiel . '</a>');
		array_push($ownalbum_artists_list, '<a href="/n/' . $row['artisturlname'] . '">' . $row['name'] . '</a>');
		array_push($ownalbum_ids_list, $row['albumurlname']);
		if (isset($row['catalog_cd'])) {
		  array_push($ownalbum_sns_list, $row['catalog_cd']);
	  }
		if ($row['cover'] != '') {
			array_push($ownalbum_covers_list, substr($row['cover'], 0, strlen($row['cover']) - 4) . '_75.jpg');
			}
		else array_push($ownalbum_covers_list, 'nocover_75.jpg');
		
		$year = $row['year'];
		if (($year[5] == 0) AND ($year[6] == 0)) {
			$year =  substr($year, 0, 4);
			}
		else {
			$year = show_normal_date($year);
			}
		
		array_push($ownalbum_years_list,  $year);
		array_push($ownalbum_labels_list, '<a href="/l/' . $row['labelurlname'] . '">' . $row['labelname'] . '</a>');
		
		array_push($own_titles, $row['title']);
		array_push($own_names, $row['name']);
		}	
	$smarty->assign ('ownalbum_titles_list', $ownalbum_titles_list);
	$smarty->assign ('ownalbum_artists_list', $ownalbum_artists_list);
	$smarty->assign ('ownalbum_ids_list', $ownalbum_ids_list);
	$smarty->assign ('ownalbum_covers_list', $ownalbum_covers_list);
	$smarty->assign ('ownalbum_years_list', $ownalbum_years_list);
	$smarty->assign ('ownalbum_labels_list', $ownalbum_labels_list);
	$smarty->assign ('ownalbum_sns_list', $ownalbum_sns_list);
	$smarty->assign('ownalbums_names', $own_names);
	$smarty->assign('ownalbums_titles', $own_titles);





// *****************************************************************************




$sql = 'SELECT t1.urlname AS artisturlname, t1.name, t3.premier, t3.title, t3.urlname AS albumurlname, t3.year, t3.singiel, t3.cover, t4.name AS labelname, t4.urlname AS labelurlname ' . 
	'FROM artists AS t1, album_artist_lookup AS t2, albums AS t3, labels AS t4 ' .
	'WHERE (t1.id=t2.artistid AND t2.albumid=t3.id AND t4.id=t3.labelid AND t3.year' . '>"' . date('Y-m-d') . '") ' . 
	'ORDER BY t3.year ' .
	'LIMIT 3';

$result = mysql_query($sql);

	$album_titles_list = array();
	$album_artists_list = array();	
	$album_covers_list = array();
	$album_ids_list = array();
	$album_years_list = array();
	$album_labels_list = array();
	$album_sns_list = array();
	
	$titles = array();
	$names = array();
	while ( $row = @mysql_fetch_array($result) ) { 
		$year = $row['year'];
		$year = substr($year, 0, 4);  	
		
		if ($row['premier'] != '') {
			$premier =  strtolower($row['premier']);
			}
		else {
			$premier = show_normal_date($row['year']);
			}	
		
		$singiel = ($row['singiel'] == 1) ? ' (EP)' : '';
		array_push($album_titles_list, '<a href="/a/' . $row['albumurlname'] . '">' . $row['title'] . $singiel . '</a>');
		array_push($album_artists_list, '<a href="/n/' . $row['artisturlname'] . '">' . $row['name'] . '</a>');
		array_push($album_ids_list, $row['albumurlname']);
		if (isset($row['catalog_cd'])) {
		  array_push($album_sns_list, $row['catalog_cd']);
	  }

		if ($row['cover'] != '') {
			array_push($album_covers_list, substr($row['cover'], 0, strlen($row['cover']) - 4) . '_75.jpg');
			}
		else array_push($album_covers_list, 'nocover_75.jpg');

		array_push($album_years_list,  $premier);
		array_push($album_labels_list, '<a href="/l/' . $row['labelurlname'] . '">' . $row['labelname'] . '</a>');
		
		array_push($titles, $row['title']);
		array_push($names, $row['name']);
		}	
	$smarty->assign ('album_titles_list', $album_titles_list);
	$smarty->assign ('album_artists_list', $album_artists_list);
	$smarty->assign ('album_ids_list', $album_ids_list);
	$smarty->assign ('album_covers_list', $album_covers_list);
	$smarty->assign ('album_years_list', $album_years_list);
	$smarty->assign ('album_labels_list', $album_labels_list);
	$smarty->assign ('album_sns_list', $album_sns_list);
	
	$smarty->assign('albums_names', $names);
	$smarty->assign('albums_titles', $titles);
	
$concerts = array();
$concertsurlnames = array();
$concertsthumbs = array();
$cities = array();
$dates = array();
$start = array();

$sql = 'SELECT t1.urlname, t1.date, t1.start, t1.title, DATE_FORMAT(t1.date, "%w") as dzien, t1.place, t1.poster, t3.name AS city ' .
	'FROM concerts AS t1, cities AS t3 ' .
	'WHERE (t1.cityid=t3.id AND t1.date>="' . date('Y-m-d') . '") ' .
	'GROUP BY t1.id ORDER BY t1.date LIMIT 7';

$result = mysql_query($sql);
while($row = mysql_fetch_array($result) ){
//	print ('<li class="concertdate">' . date('Y-m-d',strtotime($row['date'])) . ':</li>');
//	print ('<li> - <a href="index.php?s=concert&id=' . $row['id'] . '">' . $row['title'] . ', ' . $row['city'] . '</a></li>');

	if ($row['poster'] != '') {
			array_push($concertsthumbs, substr($row['poster'], 0, strlen($row['poster']) - 4) . '_thumb.jpg');
			}
		else array_push($concertsthumbs, 'noposter.gif');
		
	array_push($concerts, '<a href="/p/' . $row['urlname'] . '">' . $row['title'] . '</a>'/* .  . ' - <strong>' .  . '</strong>'*/);
	array_push($cities, $row['city'] . ', ' . $row['place']);
	array_push($dates, $dni_tygodnia[$row['dzien']] . ', ' . show_normal_date($row['date']));
	array_push($concertsurlnames, $row['urlname']);
	array_push($start, $row['start']);
	}
$smarty->assign('concerts', $concerts);
$smarty->assign('concertsthumbs', $concertsthumbs);
$smarty->assign('cities', $cities);
$smarty->assign('dates', $dates);
$smarty->assign('start', $start);
$smarty->assign('concertsurlnames', $concertsurlnames);


// *********************************************************************************************
// *** WYBOR POSTACI TYGODNIA                                                                ***
// *********************************************************************************************
$sql = 'SELECT aid FROM artists_everyweek ORDER BY id DESC LIMIT 1';
$result = mysql_query($sql);
$row = mysql_fetch_array($result);
$artistid = $row['aid'];

$sql = 'SELECT name, urlname, profile FROM artists WHERE id="'. $artistid . '"';
$result = @mysql_query($sql);
$row = @mysql_fetch_array($result);

$smarty->assign('weekartistname', $row['name']);
$smarty->assign('weekartisturlname', $row['urlname']);
$smarty->assign('weekartistprofile', substr($row['profile'], 0, 170) . '...');
$smarty->assign('weekartistname', $row['name']);

// ALBUMY

$weekartistalbums = array();

$sql = 'SELECT t1.title, t1.urlname, t1.year FROM albums t1, album_artist_lookup t2 WHERE (t1.id=t2.albumid AND t2.artistid="' . $artistid . '")';
$result = @mysql_query($sql);
while($row = @mysql_fetch_array($result)){
	array_push($weekartistalbums, '<a href="/a/' . $row['urlname'] . '">' . $row['title'] . ', ' . substr($row['year'], 0, 4) . '</a>');
	}
$smarty->assign('weekartistalbums', $weekartistalbums);
	
	//*****************************************************************	
	$smarty->assign('body_template', 'site/main.tpl');
	//*****************************************************************

?>