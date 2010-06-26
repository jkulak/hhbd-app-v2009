<?php

//*****************************************************************
$smarty->assign ('title', 'HHBD.PL | TWÓJ PROFIL');
//$smarty->assign ('description', strtoupper($row['title']));
//*****************************************************************	

if (!isset($id)) {
	$id = 'profil';
	}
	
$sql = 'SELECT timesloggedin, lastlogin, viewed, added, id FROM users WHERE urlname="' . $_SESSION['hhbdurlname'] . '"';
$result = @mysql_query($sql);
$row = mysql_fetch_array($result);
$userid = $row['id'];

if ($id == 'profil') {
	$sql = 'SELECT timesloggedin, lastlogin, viewed, added, id FROM users WHERE urlname="' . $_SESSION['hhbdurlname'] . '"';
	$result = @mysql_query($sql);
	$row = @mysql_fetch_array($result);
	
	$smarty->assign('timesloggedin', $row['timesloggedin']);
	$smarty->assign('lastlogin', show_time_from_datetime($row['lastlogin'], ':') . ', ' . show_normal_date($row['lastlogin']));
	$smarty->assign('viewed', $row['viewed']);
	$smarty->assign('added', show_time_from_datetime($row['added'], ':') . ', ' . show_normal_date($row['added']));
	}
	
if ($id == 'recenzje') {
	$sql = 'SELECT t1.title, t1.urlname AS albumurlname, t3.urlname AS artisturlname, t3.name, t2.review, t2.id AS reviewid, t2.added, t2.status, t2.title AS reviewtitle ' .
	'FROM albums AS t1, album_reviews AS t2, artists AS t3, album_artist_lookup AS t4 ' .
	'WHERE (t1.id=t2.albumid AND t2.addedby="' . $userid . '" AND t4.artistid=t3.id AND t4.albumid=t1.id) ' .
	'ORDER BY t2.added DESC';
	$result = mysql_query($sql);
	
	$review_dates_list = array();
	$review_texts_list = array();
	$review_titles_list = array();
	$review_albums_list = array();
	$review_artists_list = array();
	$review_status_list = array();

	while ($row = mysql_fetch_array($result)) {	
    	if ($row['status'] == 0 ) { array_push($review_status_list, '<img src="/imgs/layout/mod_waiting.gif" alt="Oczekuje na moderacjê">');}
			else if ($row['status'] == 9 ) { array_push($review_status_list, '<img src="/imgs/layout/mod_rejected.gif" alt="Odrzucona przez moderatorów">'); }
			else if ($row['status'] == 1 ) { array_push($review_status_list, '<img src="/imgs/layout/mod_accepted.gif" alt="Zaakceptowana przez moderatorów">'); }
			
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
	$smarty->assign('review_status_list', $review_status_list);
	}

if ($id == 'chcelista') {
	$wishlist = array();
	
	$sql = 'SELECT t1.title, t1.id, t1.urlname AS albumurlname, t3.urlname AS artisturlname, t3.name ' .
	'FROM albums AS t1, wishlist AS t2, artists AS t3, album_artist_lookup AS t4 ' .
	'WHERE (t1.id=t2.albumid AND t2.userid="' . $userid . '" AND t4.artistid=t3.id AND t4.albumid=t1.id) ' .
	'ORDER BY t2.added DESC';
	$result = @mysql_query($sql);

	while ($row = @mysql_fetch_array($result)) {	
		$sql = 'SELECT COUNT(albumid) AS numvotes FROM wishlist WHERE albumid=' . $row['id'];
		$votesresult = @mysql_query($sql);
		$votes = @mysql_fetch_array($votesresult);
		$numvotes = $votes['numvotes'];	
		array_push($wishlist, '<a href="/n/' . $row['artisturlname'] . '">' . $row['name'] . '</a> - <a href="/a/' . $row['albumurlname'] . '">' . $row['title'] . '</a> (<a href="/chcelista/' . $row['albumurlname'] . '">' . $numvotes . '</a>)');
		}
	$smarty->assign ('wishlist', $wishlist);
	}
	
if ($id == 'kolekcja') {
	$collection = array();
	
	$sql = 'SELECT t1.title, t1.id, t1.urlname AS albumurlname, t3.urlname AS artisturlname, t3.name ' .
	'FROM albums AS t1, collection AS t2, artists AS t3, album_artist_lookup AS t4 ' .
	'WHERE (t1.id=t2.albumid AND t2.userid="' . $userid . '" AND t4.artistid=t3.id AND t4.albumid=t1.id) ' .
	'ORDER BY t2.added DESC';
	$result = @mysql_query($sql);

	while ($row = @mysql_fetch_array($result)) {	
		$sql = 'SELECT COUNT(albumid) AS numvotes FROM collection WHERE albumid=' . $row['id'];
		$votesresult = @mysql_query($sql);
		$votes = @mysql_fetch_array($votesresult);
		$numvotes = $votes['numvotes'];	
		array_push($collection, '<a href="/n/' . $row['artisturlname'] . '">' . $row['name'] . '</a> - <a href="/a/' . $row['albumurlname'] . '">' . $row['title'] . '</a> (<a href="/kolekcja/' . $row['albumurlname'] . '">' . $numvotes . '</a>)');
		}
	$smarty->assign ('collection', $collection);
	}

if ($id == 'oceny') {
	$ratings = array();
	
	$sql = 'SELECT t1.title, t1.id, t1.urlname AS albumurlname, t2.rate, t3.urlname AS artisturlname, t3.name ' .
		'FROM albums AS t1, ratings AS t2, artists AS t3, album_artist_lookup AS t4 ' .
		'WHERE (t1.id=t2.albumid AND t2.userid="' . $userid . '" AND t4.artistid=t3.id AND t4.albumid=t1.id) ' .
		'ORDER BY t2.rate DESC';
	$result = mysql_query($sql);

	while ($ratingrow = mysql_fetch_array($result)) {	
		$sql = 'SELECT COUNT(rate) AS numvotes FROM ratings WHERE albumid=' . $ratingrow['id'];
		$row = mysql_fetch_array(mysql_query($sql));
		$numvotes = $row['numvotes'];
		
		$sql = 'SELECT rating FROM ratings_avg WHERE albumid="' . $ratingrow['id'] . '"';
		$row = mysql_fetch_array(mysql_query($sql));
		$rate = sprintf("%01.2f", $row['rating']);
	
		array_push($ratings, '<a href="/n/' . $ratingrow['artisturlname'] . '">' . $ratingrow['name'] . '</a> - <a href="/a/' . $ratingrow['albumurlname'] . '">' . $ratingrow['title'] . '</a>: <strong>' . $ratingrow['rate'] . '</strong>/' . $rate . ' (<a href="/a/' . $ratingrow['albumurlname'] . '/oceny">' . $numvotes . '</a>)');
		
		
		}
	$smarty->assign ('ratings', $ratings);
	}
	
if ($id == 'sample') {
	$sample_dates_list = array();
	$sample_infos_list = array();
	$sample_songs_list = array();
	$sample_status_list = array();
	
	$sql = 'SELECT t3.urlname AS artisturlname, t3.name, t2.sample, t2.added, t2.status, t6.urlname AS songurlname, t6.title ' .
		'FROM albums AS t1, song_samples AS t2, artists AS t3, album_artist_lookup AS t4, album_lookup AS t5, songs AS t6 ' .
		'WHERE (t2.addedby="' . $userid . '" AND t2.songid=t6.id AND t4.artistid=t3.id AND t4.albumid=t1.id AND t5.songid=t6.id AND t5.albumid=t1.id) ' .
		'ORDER BY t2.added DESC';
	$result = mysql_query($sql);

	while ($row = mysql_fetch_array($result)) {	
    if ($row['status'] == 0 ) { array_push($sample_status_list, '<img src="/imgs/layout/mod_waiting.gif">');}
			else if ($row['status'] == 9 ) { array_push($sample_status_list, '<img src="/imgs/layout/mod_rejected.gif">'); }
			else if ($row['status'] == 1 ) { array_push($sample_status_list, '<img src="/imgs/layout/mod_accepted.gif">'); }
		array_push($sample_dates_list, show_time_from_timestamp($row['added'], ':') . ', ' . show_normal_date_from_timestamp($row['added']));
		array_push($sample_songs_list, '<a href="/n/' . $row['artisturlname'] . '">' . $row['name'] . '</a> - <a href="/s/' . $row['songurlname'] . '">' . $row['title'] . '</a>');
		array_push($sample_infos_list, $row['sample']);
		}
	$smarty->assign('sample_status_list', $sample_status_list);
	$smarty->assign('sample_songs_list', $sample_songs_list);
	$smarty->assign('sample_dates_list', $sample_dates_list);
	$smarty->assign('sample_infos_list', $sample_infos_list);	
	}
	
if ($id == 'ustawienia') {
	$sql = 'SELECT email, allow_wishlist, allow_collection FROM users WHERE id="' . $userid . '"';
	$row = mysql_fetch_array(mysql_query($sql));
	$smarty->assign('email', $row['email']);
	if ($row['allow_wishlist'] == 'y') {$smarty->assign('allow_wishlist', 'checked');}
	if ($row['allow_collection'] == 'y') {$smarty->assign('allow_collection', 'checked');}
	}
	


$sectiontitles = array (profil => 'profil', recenzje => 'twoje recenzje', oceny => 'oceny', chcelista => 'twoja chcêlista', kolekcja => 'twoja kolekcja', ustawienia => 'ustawienia profilu', sample => 'dodane przez ciebie info o samplach', niekomb => 'nie kombinuj!');

$smarty->assign('ctitle', $_SESSION['hhbdlogin'] . ': ' . $sectiontitles[$id]);
$smarty->assign('id', $id);

//*****************************************************************	
$smarty->assign('body_template', 'user/myprofile.tpl');
//*****************************************************************
?>