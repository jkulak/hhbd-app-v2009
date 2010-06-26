<?php

$smarty->assign ('urlname', $id);

$urlname = $id;

// pobranie ID z tablicy na podstawie wpisu z linku, mamy ID
$sql = 'SELECT id FROM users WHERE urlname="' . $id . '"';
$row = @mysql_fetch_array(mysql_query($sql));
$id = $row['id'];
if ($id == '') { $add = 'niekomb';}

// mamy ID
@mysql_query('UPDATE users SET viewed=(viewed+1) WHERE id=' . $id);

$sql = 'SELECT login, added, about, place, gender, birthyear  ' .
	   'FROM users WHERE id=' . $id;

$result = @mysql_query($sql);
$row = @mysql_fetch_array($result);

//*****************************************************************
$smarty->assign ('title', 'HHBD.PL | ' . strtoupper($row['login']));
$smarty->assign ('description', strtoupper($row['login']) . ' - informacje o u¿ytkowniku hip-hopowej bazy danych (www.hhbd.pl).');
$smarty->assign ('ctitle', strtoupper($row['login']));
//*****************************************************************	

// *************************************************************************
// * STA£E ELEMENTY STRONY *************************************************
// *************************************************************************
$smarty->assign ('added', show_normal_date($row['added'], 0, 10));

$smarty->assign ('place', $row['place']);

if ($row['birthyear'] <> '00') {
	$smarty->assign ('age', date("Y") - (int)('19' . $row['birthyear']));
	}	

$smarty->assign ('about', $artistrow['about']);


// ***************************************************** RECENZJE
$sql = 'SELECT t1.title, t1.urlname AS albumurlname, t3.urlname AS artisturlname, t3.name, t2.review, t2.id AS reviewid, t2.added, t2.status, t2.title AS reviewtitle ' .
	'FROM albums AS t1, album_reviews AS t2, artists AS t3, album_artist_lookup AS t4 ' .
	'WHERE (t1.id=t2.albumid AND t2.addedby="' . $id . '" AND t4.artistid=t3.id AND t4.albumid=t1.id AND t2.status=1) ' .
	'ORDER BY t2.added DESC';
$result = mysql_query($sql);
if (@mysql_num_rows($result)) {
	$smarty->assign ('show_reviews_tab', 1);
	$smarty->assign ('reviews_count', @mysql_num_rows($result));
	if (!isset($add)) {
		$add = 'recenzje';
		}
	}
if ($add == 'recenzje') {	
	$review_dates_list = array();
	$review_texts_list = array();
	$review_titles_list = array();
	$review_albums_list = array();
	$review_artists_list = array();
	while ($row = @mysql_fetch_array($result)) {	
		array_push($review_dates_list, show_time_from_timestamp($row['added'], ':') . ', ' . show_normal_date_from_timestamp($row['added']));
		array_push($review_texts_list, $row['review']);
		array_push($review_titles_list, strtoupper($row['reviewtitle']));
		array_push($review_albums_list, '<a href="/a/' . $row['albumurlname'] . '">' . $row['title'] . '</a>');
		array_push($review_artists_list, '<a href="/n/' . $row['artisturlname'] . '">' . $row['name'] . '</a>');
		}
	$smarty->assign('review_dates_list', $review_dates_list);
	$smarty->assign('review_texts_list', $review_texts_list);
	$smarty->assign('review_titles_list', $review_titles_list);
	$smarty->assign('review_albums_list', $review_albums_list);
	$smarty->assign('review_artists_list', $review_artists_list);
	}

	
// ************************************************************ OCENY
$sql = 'SELECT t1.title, t1.id, t1.urlname AS albumurlname, t2.rate, t3.urlname AS artisturlname, t3.name ' .
	'FROM albums AS t1, ratings AS t2, artists AS t3, album_artist_lookup AS t4 ' .
	'WHERE (t1.id=t2.albumid AND t2.userid="' . $id . '" AND t4.artistid=t3.id AND t4.albumid=t1.id) ' .
	'ORDER BY t2.rate DESC';
$result = mysql_query($sql);
if (mysql_num_rows($result)) { 
	$smarty->assign ('show_ratings_tab', 1);
	if (!isset($add)) {
		$add = 'oceny';
		}
	}
	
if ($add == 'oceny') {
	$ratings = array();
	while ($ratingrow = @mysql_fetch_array($result)) {	
		array_push($ratings, '<a href="/n/' . $ratingrow['artisturlname'] . '">' . $ratingrow['name'] . '</a> - <a href="/a/' . $ratingrow['albumurlname'] . '">' . $ratingrow['title'] . '</a>: <strong>' . $ratingrow['rate'] . '</strong>');		
		}
	$smarty->assign ('ratings', $ratings);
	}

	
// ***************************************************** CHCÊ LISTA	
$sql = 'SELECT t1.title, t1.id, t1.urlname AS albumurlname, t3.urlname AS artisturlname, t3.name ' .
	'FROM albums AS t1, wishlist AS t2, artists AS t3, album_artist_lookup AS t4 ' .
	'WHERE (t1.id=t2.albumid AND t2.userid="' . $id . '" AND t4.artistid=t3.id AND t4.albumid=t1.id) ' .
	'ORDER BY t2.added DESC';
$result = @mysql_query($sql);

if (@mysql_num_rows($result)) {
	$smarty->assign ('show_wishlist_tab', 1);
	$smarty->assign ('wishlist_count', @mysql_num_rows($result));
	if (!isset($add)) {
		$add = 'chcelista';
		}
	}
if ($add == 'chcelista') {
	$wishlist = array();
	while ($row = @mysql_fetch_array($result)) {	
		$sql = 'SELECT COUNT(albumid) AS numvotes FROM wishlist WHERE albumid=' . $row['id'];
		$votesresult = @mysql_query($sql);
		$votes = @mysql_fetch_array($votesresult);
		$numvotes = $votes['numvotes'];	
		array_push($wishlist, '<a href="/n/' . $row['artisturlname'] . '">' . $row['name'] . '</a> - <a href="/a/' . $row['albumurlname'] . '">' . $row['title'] . '</a> (<a href="/chcelista/' . $row['albumurlname'] . '">' . $numvotes . '</a>)');
		}
	$smarty->assign ('wishlist', $wishlist);
	}
	

// ***************************************************** KOLEKCJA
$sql = 'SELECT t1.title, t1.id, t1.urlname AS albumurlname, t3.urlname AS artisturlname, t3.name ' .
	'FROM albums AS t1, collection AS t2, artists AS t3, album_artist_lookup AS t4 ' .
	'WHERE (t1.id=t2.albumid AND t2.userid="' . $id . '" AND t4.artistid=t3.id AND t4.albumid=t1.id) ' .
	'ORDER BY t2.added DESC';
$result = @mysql_query($sql);
if (@mysql_num_rows($result)) {
	$smarty->assign ('show_collection_tab', 1);
	$smarty->assign ('collection_count', @mysql_num_rows($result));
	if (!isset($add)) {
		$add = 'kolekcja';
		}
	}	
if ($add == 'kolekcja') {
	$collection = array();
	while ($row = @mysql_fetch_array($result)) {	
		$sql = 'SELECT COUNT(albumid) AS numvotes FROM collection WHERE albumid=' . $row['id'];
		$votesresult = @mysql_query($sql);
		$votes = @mysql_fetch_array($votesresult);
		$numvotes = $votes['numvotes'];	
		array_push($collection, '<a href="/n/' . $row['artisturlname'] . '">' . $row['name'] . '</a> - <a href="/a/' . $row['albumurlname'] . '">' . $row['title'] . '</a> (<a href="/kolekcja/' . $row['albumurlname'] . '">' . $numvotes . '</a>)');
		}
	$smarty->assign ('collection', $collection);
	}
	
	
	
$sql = 'SELECT t1.title AS albumtitle, t1.urlname, t2.sample, t2.added, t2.status, t6.urlname AS songurlname, t6.title ' .
		'FROM albums AS t1, song_samples AS t2, album_lookup AS t5, songs AS t6 ' .
		'WHERE (t2.addedby="' . $id . '" AND t2.songid=t6.id AND t5.songid=t6.id AND t5.albumid=t1.id AND t2.status=1) ' .
		'ORDER BY t2.added DESC';
$result = @mysql_query($sql);
if (@mysql_num_rows($result)) {
	$smarty->assign ('show_samples_tab', 1);
	$smarty->assign ('samples_count', @mysql_num_rows($result));
	if (!isset($add)) {
		$add = 'sample';
		}
	}
if ($add == 'sample') {
	$sample_dates_list = array();
	$sample_infos_list = array();
	$sample_songs_list = array();
	$sample_albums_list = array();
	$sample_status_list = array();
	while ($row = mysql_fetch_array($result)) {	
    if ($row['status'] == 0 ) { array_push($sample_status_list, '<img src="/imgs/layout/mod_waiting.gif">');}
			else if ($row['status'] == 9 ) { array_push($sample_status_list, '<img src="/imgs/layout/mod_rejected.gif">'); }
			else if ($row['status'] == 1 ) { array_push($sample_status_list, '<img src="/imgs/layout/mod_accepted.gif">'); }
		array_push($sample_dates_list, show_time_from_timestamp($row['added'], ':') . ', ' . show_normal_date_from_timestamp($row['added']));
		array_push($sample_songs_list, '<a href="/s/' . $row['songurlname'] . '">' . $row['title'] . '</a>');
		array_push($sample_albums_list, '<a href="/a/' . $row['urlname'] . '">' . $row['albumtitle'] . '</a>');
		array_push($sample_infos_list, $row['sample']);
		}
	$smarty->assign('sample_status_list', $sample_status_list);
	$smarty->assign('sample_albums_list', $sample_albums_list);
	$smarty->assign('sample_songs_list', $sample_songs_list);
	$smarty->assign('sample_dates_list', $sample_dates_list);
	$smarty->assign('sample_infos_list', $sample_infos_list);	
	}

if (!isset($add)) {
	$add = 'wyslijwiadomosc';
	}

$sectiontitles = array (oceny => 'oceny', recenzje => 'recenzje', sample => 'info o samplach', wyslijwiadomosc => 'WY¦LIJ WIADOMO¦Æ', chcelista => 'chcêlista', kolekcja => 'kolekcja', brak => 'brak szczegó³owych danych', niekomb => 'nie kombinuj!');
$smarty->assign ('sectiontitle', $sectiontitles[$add]);

$smarty->assign('s', $s);
$smarty->assign('id', $id);	
$smarty->assign('add', $add);
	
//*****************************************************************	
$smarty->assign('body_template', 'user/show-user.tpl');
//*****************************************************************

?>