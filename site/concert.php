<?php

$smarty->assign ('urlname', $id);

// pobranie ID z tablicy na podstawie wpisu z linku, mamy ID
$sql = 'SELECT id FROM concerts WHERE urlname="' . $id . '"';
$row = @mysql_fetch_array(mysql_query($sql));
$id = $row['id'];
if ($id == '') { $add = 'niekomb';}

// mamy ID
mysql_query('UPDATE concerts SET viewed=(viewed+1) WHERE id=' . $id);

$sql = 'SELECT t1.title, t1.poster, t1.cityid, t2.name AS city, t1.place, t1.website, t1.cost, ' . 
	   't1.start, t1.date, t1.description, t1.viewed, t1.added, t1.addedby ' . 
	   'FROM concerts AS t1, cities AS t2 WHERE (t1.id="' . $id . '" AND t2.id=t1.cityid)';
$result = mysql_query($sql);
$row = mysql_fetch_array($result);

if (isset($row['title'])) $keywords .= $row['title'] . ',';

$smarty->assign ('ctitle', $row['title']);
if ((file_exists('imgs/database/posters/' . $row['poster'])) AND ($row['poster'] != '')) {
	$smarty->assign ('poster', $row['poster']);	
	}
else $smarty->assign ('poster', 'noposter.gif');

$smarty->assign ('city', $row['city']);
$smarty->assign ('date', show_normal_date($row['date']));
$smarty->assign ('place', $row['place']);
$smarty->assign ('cost', $row['cost']);
$smarty->assign ('start', $row['start']);
$smarty->assign ('cdescription', nl2p($row['description']));

if (isset($row['city'])) $keywords .= $row['city'] . ',';
if (isset($row['place'])) $keywords .= $row['place'] . ',';

if ($row['website'] != '') {
	$website = '<a href="/stronakoncertu/' . urlencode($id) . '" target="_blank" onMouseOver="javascript:window.status=\'' . $row['website'] . '\'; return true" onMouseOut="javascript:window.status=\'\'">' . $row['website'] . '</a>';
	$smarty->assign ('website', $website);
	}


$smarty->assign ('viewed', $row['viewed']); 
$smarty->assign ('added', show_normal_date_from_timestamp($row['added']));
$smarty->assign ('addedby', $row['addedby']);
$smarty->assign ('updated', $row['updated']);
$smarty->assign ('updatedby', $row['updatedby']);

//*****************************************************************
$smarty->assign ('title', strtoupper($row['title']));
$smarty->assign ('description', $row['title'] . ' - tutaj wszystko o tej imprezie!');
//*****************************************************************	

if (!isset($add)) {
	$add = 'informacje';
	// LISTA WYKONAWCOW KONCERTU	
	$concert_artists_list = array();

	$sql = 'SELECT t1.urlname, t1.name FROM artists AS t1, artist_concert_lookup AS t2 WHERE (t1.id=t2.artistid AND t2.concertid="' . $id . '")';
	$result = @mysql_query($sql);
	while ($row = @mysql_fetch_array($result)) {
		if (isset($row['name'])) $keywords .= $row['name'] . ',';
		array_push($concert_artists_list, '<a href="/n/' .$row['urlname'] . '">' . $row['name'] . '</a>');
		}
	$smarty->assign ('concert_artists_list', $concert_artists_list);
	$smarty->assign ('concert_artist_concert_data_list', $main);
	$smarty->assign ('concert_artist_concerts_list', $concert_artist_concerts_list);
	}	



//************************************************************ LISTA POWIAZANYCH NEWSOW
include ('part-news.php');



// ************************************************************** KOMENTARZE	
include ('part-comments.php');



$sectiontitles = array (informacje => 'informacje', komentarze => 'komentarze', relaca => 'relacja', newsy => 'newsy');
$smarty->assign ('sectiontitle', $sectiontitles[$add]);

$smarty->assign('s', $s);	
$smarty->assign('id', $id);
$smarty->assign('add', $add);

$smarty->assign('keywords', $keywords);
	
//*****************************************************************	
$smarty->assign('body_template', 'site/concert.tpl');
//*****************************************************************
?>
