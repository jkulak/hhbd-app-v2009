<?php

//$temp = array();
//$sql = 'SELECT title, urlname FROM albums ORDER BY viewed DESC LIMIT 10';
//$result = @mysql_query($sql);
//while($row = @mysql_fetch_array($result)) {
//	array_push($temp, 	'<a href="/a/' . $row['urlname'] . '">' . $row['title'] . '</a>');
//	} // while
//$smarty->assign('mp_albums', $temp);

$temp = array();
$sql = 'SELECT name, urlname FROM artists ORDER BY viewed DESC LIMIT 10';
$result = @mysql_query($sql);
while($row = @mysql_fetch_array($result)) {
	array_push($temp, 	'<a href="/n/' . $row['urlname'] . '">' . $row['name'] . '</a>');
	} // while
$smarty->assign('mp_artists', $temp);

$temp = array();
$sql = 'SELECT name, urlname FROM labels ORDER BY viewed DESC LIMIT 10';
$result = @mysql_query($sql);
while($row = @mysql_fetch_array($result)) {
	array_push($temp, 	'<a href="/l/' . $row['urlname'] . '">' . $row['name'] . '</a>');
	} // while
$smarty->assign('mp_labels', $temp);

$temp = array();
$sql = 'SELECT title, urlname FROM songs ORDER BY viewed DESC LIMIT 10';
$result = @mysql_query($sql);
while($row = @mysql_fetch_array($result)) {
	array_push($temp, 	'<a href="/s/' . $row['urlname'] . '">' . $row['title'] . '</a>');
	} // while
$smarty->assign('mp_songs', $temp);

$temp = array();
$sql = 'SELECT title, urlname FROM concerts ORDER BY viewed DESC LIMIT 10';
$result = @mysql_query($sql);
while($row = @mysql_fetch_array($result)) {
	array_push($temp, 	'<a href="/p/' . $row['urlname'] . '">' . $row['title'] . '</a>');
	} // while
$smarty->assign('mp_concerts', $temp);

$temp = array();
$sql = 'SELECT id, title FROM news ORDER BY viewed DESC LIMIT 10';
$result = @mysql_query($sql);
while($row = @mysql_fetch_array($result)) {
	array_push($temp, 	'<a href="/news/' . $row['id'] . '">' . $row['title'] . '</a>');
	} // while
$smarty->assign('mp_news', $temp);



// ALBUMY OCENIANIE

$sql = 'SELECT t1.urlname AS artisturlname, t1.name, t3.premier, t3.title, t3.urlname AS albumurlname, t3.year, t3.singiel, t3.cover, t4.name AS labelname, t4.urlname AS labelurlname, t5.rating ' . 
	'FROM artists AS t1, album_artist_lookup AS t2, albums AS t3, labels AS t4, ratings_avg t5 ' .
	'WHERE (t1.id=t2.artistid AND t2.albumid=t3.id AND t4.id=t3.labelid AND t3.id=t5.albumid) ' . 
	'ORDER BY t5.rating DESC ' .
	'LIMIT 10';

$result = mysql_query($sql);

	$album_titles_list = array();
	$album_artists_list = array();	
	$album_covers_list = array();
	$album_ids_list = array();
	$album_years_list = array();
	$album_labels_list = array();
	$album_sns_list = array();
	$album_ratings_list = array();
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
		array_push($album_sns_list, $row['catalog_cd']);
		if ((file_exists('imgs/database/albums-thumbs/' . substr($row['cover'], 0, strlen($row['cover']) - 4) . '_75.jpg')) AND ($row['cover'] != '')) {
			array_push($album_covers_list, substr($row['cover'], 0, strlen($row['cover']) - 4) . '_75.jpg');
			}
		else array_push($album_covers_list, 'nocover_75.jpg');

		array_push($album_years_list,  $premier);
		array_push($album_labels_list, '<a href="/l/' . $row['labelurlname'] . '">' . $row['labelname'] . '</a>');	
		array_push($album_ratings_list, $row['rating']);
		}	
	$smarty->assign ('album_titles_list', $album_titles_list);
	$smarty->assign ('album_artists_list', $album_artists_list);
	$smarty->assign ('album_ids_list', $album_ids_list);
	$smarty->assign ('album_covers_list', $album_covers_list);
	$smarty->assign ('album_years_list', $album_years_list);
	$smarty->assign ('album_labels_list', $album_labels_list);
	$smarty->assign ('album_sns_list', $album_sns_list);
	$smarty->assign ('album_ratings_list', $album_ratings_list);	


	
	
	
// -************************************
// ALBUMY NAJPOPULARNIEJSZE


$sql = 'SELECT t1.urlname AS artisturlname, t1.name, t3.premier, t3.title, t3.urlname AS albumurlname, t3.year, t3.singiel, t3.cover, t3.viewed, t4.name AS labelname, t4.urlname AS labelurlname ' . 
	'FROM artists AS t1, album_artist_lookup AS t2, albums AS t3, labels AS t4 ' .
	'WHERE (t1.id=t2.artistid AND t2.albumid=t3.id AND t4.id=t3.labelid) ' . 
	'ORDER BY t3.viewed DESC ' .
	'LIMIT 10';

$result = mysql_query($sql);

	$album_titles_list = array();
	$album_artists_list = array();	
	$album_covers_list = array();
	$album_ids_list = array();
	$album_years_list = array();
	$album_labels_list = array();
	$album_sns_list = array();
	$album_ratings_list = array();
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
		array_push($album_sns_list, $row['catalog_cd']);
		if ((file_exists('imgs/database/albums-thumbs/' . substr($row['cover'], 0, strlen($row['cover']) - 4) . '_75.jpg')) AND ($row['cover'] != '')) {
			array_push($album_covers_list, substr($row['cover'], 0, strlen($row['cover']) - 4) . '_75.jpg');
			}
		else array_push($album_covers_list, 'nocover_75.jpg');

		array_push($album_years_list,  $premier);
		array_push($album_labels_list, '<a href="/l/' . $row['labelurlname'] . '">' . $row['labelname'] . '</a>');	
		array_push($album_ratings_list, $row['viewed']);
		}	
	$smarty->assign ('albumpop_titles_list', $album_titles_list);
	$smarty->assign ('albumpop_artists_list', $album_artists_list);
	$smarty->assign ('albumpop_ids_list', $album_ids_list);
	$smarty->assign ('albumpop_covers_list', $album_covers_list);
	$smarty->assign ('albumpop_years_list', $album_years_list);
	$smarty->assign ('albumpop_labels_list', $album_labels_list);
	$smarty->assign ('albumpop_sns_list', $album_sns_list);
	$smarty->assign ('albumpop_ratings_list', $album_ratings_list);	

//*****************************************************************	
$smarty->assign('title', 'HHBD.PL | TOP10');
$smarty->assign('ctitle', 'TOP10');
$smarty->assign('body_template', 'site/top10.tpl');
$smarty->assign('history', '<a href="/">HHBD.PL</a> -> TOP10');
//*****************************************************************

?>