<?php

$smarty->assign ('urlname', $id);
$urlname = $id;

// pobranie ID z tablicy na podstawie wpisu z linku, mamy ID
$sql = 'SELECT id FROM albums WHERE urlname="' . $id . '"';
$row = @mysql_fetch_array(@mysql_query($sql));
$id = $row['id'];
if ($id == '') { $add = 'niekomb';}

if (!isset($add)) $add = 'informacje';


// mamy ID
mysql_query('UPDATE albums SET viewed=(viewed+1) WHERE id=' . $id);

$sql = 'SELECT t3.title, t3.viewed, t3.added, t3.addedby, t3.cover, t3.singiel, t3.epfor, t3.premier, t3.artistabout, ' . 
       't3.description, t3.year, t3.catalog_cd, t4.name AS labelname, t4.urlname AS labelurlname, t1.name, t1.urlname AS artisturlname ' .
       'FROM artists AS t1, album_artist_lookup AS t2, albums AS t3, labels AS t4 ' . 
       'WHERE ((t3.id=' . $id . ') AND (t2.artistid=t1.id) AND (t2.albumid=' . $id . ') AND (t3.labelid=t4.id))';

$result = @mysql_query($sql);
$row = @mysql_fetch_array($result);


// *************************************************************************
// * STA�E ELEMENTY STRONY *************************************************
// *************************************************************************
$title = $row['title'] . (($row['singiel']) ? ' (EP)' : '') . (($row['year'] > date('Y-m-d')) ? ' (<font color="red" class="announced">zapowiedziany</font>)' : '');

$smarty->assign ('title', $title);

if (isset($row['title'])) $keywords .= $row['title'] . ',';

$year = $row['year'];

if ($row['year'] > date('Y-m-d')) {
	//zapowiedziany
	if ($row['premier'] != '') {
		$smarty->assign ('premier', $row['premier']);
		}
	else {
		$smarty->assign ('premier', show_normal_date($row['year']));
		}	
	}
else {
	//juz wydany
	
	if (($year[5] == 0) AND ($year[6] == 0)) {
		$smarty->assign ('year', substr($year, 0, 4));
		}
	else {
		$smarty->assign ('year', show_normal_date($year));
		}
	}
	
	
$sqlp = 'SELECT urlname, size FROM album_promomixes WHERE urlname="' . $urlname . '"';
$resultp = @mysql_query($sqlp);
$rowp = @mysql_fetch_array($resultp);
if (@mysql_num_rows($resultp)) {
	$promomix = '<a href="/promomix/' . $rowp['urlname'] . '" target="_blank">POBIERZ (' . $rowp['size'] . ')</a>';
	$smarty->assign('promomix', $promomix);
	}

	

	
	
// **************************************** PERSONALIZACJA
if (isset($_SESSION['hhbdlogin'])) {
	$sql = 'SELECT id FROM collection WHERE (userid=' . $_SESSION['hhbduserid'] . ' AND albumid=' . $id . ')';
	if (@mysql_num_rows(@mysql_query($sql))) {
		$smarty->assign('percoll', 'album jest w Twojej kolekcji [<a href="/kolusun/' . $urlname . '">X</a>]'); 
		}
	else {
		$smarty->assign('percoll', '<a href="/koldodaj/' . $urlname . '">dodaj</a> do swojej kolekcji'); 
		}
		
	$sql = 'SELECT id FROM wishlist WHERE  (userid=' . $_SESSION['hhbduserid'] . ' AND albumid=' . $id . ')';
	if (@mysql_num_rows(@mysql_query($sql))) {
		$smarty->assign('perwish', 'album jest w Twojej chcęliście [<a href="/chceusun/' . $urlname . '">X</a>]'); 
		}
	else {
		$smarty->assign('perwish', '<a href="/chcedodaj/' . $urlname . '">dodaj</a> do swojej chcęlisty'); 
		}		
	}
else {
	$smarty->assign('percoll', 'Zaloguj się by stworzyć swoją');
	$smarty->assign('perwish', 'kolekcję i chcęlistę');	
	}
	
	
// ***************************************************************** OCENA
$_MIN_VOTES = 3;
$sql = 'SELECT rating FROM ratings_avg WHERE albumid=' . $id;
$votes = @mysql_fetch_array( @mysql_query($sql));
$rate = sprintf("%01.2f", $votes['rating']);

$sql = 'SELECT id FROM ratings WHERE albumid="' . $id . '"';
$numvotes = @mysql_num_rows(@mysql_query($sql));
    
if ($numvotes >= $_MIN_VOTES) {
	$smarty->assign('ratingpic', '<img src="/imgs/layout/rating/rate' . ceil($rate) . '.gif" align="bottom">');
	}
else {
	$smarty->assign('ratingpic', '<img src="/imgs/layout/rating/rate0.gif" align="bottom">');
	}	
if ($numvotes >= $_MIN_VOTES) {
	$smarty->assign('rate', 'Ocena: ' . $rate . ' (głosów: ' . $numvotes . ')');
	}
else {
	$smarty->assign('rate', 'Oczekiwanie jeszcze na ' . ($_MIN_VOTES - $numvotes) . ' głosy.') ;
	}		
			
$sql = 'SELECT rate FROM ratings WHERE (userid=' . $_SESSION['hhbduserid'] . ' AND albumid=' . $id . ')';
$result = mysql_query($sql);
$rowx = @mysql_fetch_array($result);
$voted = @mysql_num_rows($result);	
	
if ($voted > 0) {
    $smarty->assign('myrate',  'Twoja ocena: ' . $rowx['rate'] . ' (<a href="/anulujocene/' . $urlname . '">anuluj</a>)');
	}
else {	
	if (isset($_SESSION['hhbduserid'])) {
	    $giverate = ('Oceń: ');
		for ($i==1; $i<11; $i++) {
			$giverate = $giverate . ('<a href="/ocenalbum/' . $urlname . '/' . $i . '">' . $i . '</a> ');
			}
		$smarty->assign('myrate', $giverate);
		}
	else $smarty->assign('myrate', 'Zaloguj się by zagłosować.');		
	}



$smarty->assign ('catalog_cd', $row['catalog_cd']);

$smarty->assign ('artist', '<a href="/n/' . $row['artisturlname'] . '">' . $row['name'] . '</a>');
if ($row['labelurlname'] != 'BRAK') {
	$smarty->assign ('label', '<a href="/l/' . $row['labelurlname'] . '">' . $row['labelname'] . '</a>');
	}

if ((file_exists('imgs/database/albums/' . $row['cover'])) AND ($row['cover'] != '')) {
	$smarty->assign ('cover', $row['cover']);	
	}
else $smarty->assign ('cover', 'nocover.gif');

$sql = 'SELECT COUNT(userid) AS collection FROM collection WHERE albumid="' . $id . '"';
$collection = @mysql_fetch_array(@mysql_query($sql));
$smarty->assign('collcount', $collection['collection']);

$sql = 'SELECT COUNT(userid) AS wishlist FROM wishlist WHERE albumid="' . $id . '"';
$wishlist = @mysql_fetch_array(@mysql_query($sql));
$smarty->assign('wishcount', $wishlist['wishlist']);
		


$smarty->assign ('viewed', $row['viewed']); 
$smarty->assign ('added', substr($row['added'], 0, 10));
$smarty->assign ('addedby', $row['addedby']);



//*****************************************************************
$smarty->assign ('title', strtoupper($row['name']) . ' - ' . strtoupper($row['title']) . ' (' . substr($year, 0, 4) . ')');

$descr = 'Traklista, opis, recenzje, teksty, sample.';


if ($row['description'] != '') {
	$tempdescr = preg_replace($preg_search, $preg_replace, $row['description']);	
	$descr .= ' ' . substr($tempdescr, 0, 140);
	}

$smarty->assign ('description', strtoupper($row['name']) . ' - ' . strtoupper($row['title']) . ' - ' . $descr );
$smarty->assign ('ctitle', strtoupper($title));
//*****************************************************************	

if (isset($row['name'])) $keywords .= $row['name'] . ',';


//****************************************************************************
//* WYKONANIE WSZYSTKICH ZAPYTAN W CELU SPRAWDZENIA CO JEST, A CZEGO NIE MA. *
//****************************************************************************


// ******************************************************** LISTA OCEN

$sql = 'SELECT t1.rate, t2.login, t2.urlname FROM ratings t1, users t2 WHERE (t1.userid=t2.id AND t1.albumid=' . $id . ')';
$result = @mysql_query($sql);
if (@mysql_num_rows($result)) {
	$smarty->assign ('show_ratings_tab', 1);
	}	
if ($add == 'oceny') {
	$album_ratings_list = array();
	while ($rowrating = @mysql_fetch_array($result)) {
		array_push($album_ratings_list, '<a href="/u/' . $rowrating['urlname'] . '">' . $rowrating['login'] . '</a>: ' . $rowrating['rate']);
		}
	$smarty->assign('album_ratings_list', $album_ratings_list);
	}
	
	
	
// ******************************************************************************** RECENZJE
$sql = 'SELECT t5.urlname AS userurlname, t5.login, t2.review, t2.id AS reviewid, t2.added, t2.status, t2.title AS reviewtitle ' .
	'FROM  album_reviews AS t2, users AS t5 ' .
	'WHERE (t2.addedby=t5.id AND t2.status=1 AND t2.albumid=' . $id . ') ' .
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
	$review_autors_list = array();
	while ($row = mysql_fetch_array($result)) {	
		array_push($review_dates_list, show_time_from_timestamp($row['added'], ':') . ', ' . show_normal_date_from_timestamp($row['added']));
		array_push($review_texts_list, $row['review']);
		array_push($review_titles_list, strtoupper($row['reviewtitle']));
		array_push($review_autors_list, '<a href="/u/' . $row['userurlname'] . '">' . $row['login'] . '</a>');
		}
	$smarty->assign('review_dates_list', $review_dates_list);
	$smarty->assign('review_texts_list', $review_texts_list);
	$smarty->assign('review_titles_list', $review_titles_list);
	$smarty->assign('review_autors_list', $review_autors_list);
	}


// **************************************************************** TRACKLISTING


$sql = 'SELECT t1.id, t1.urlname, t2.track, t1.title, t1.length, t1.bpm ' . 
	'FROM songs AS t1, album_lookup AS t2 ' .
	'WHERE (t1.id=t2.songid AND t2.albumid=' . $id . ') ' . 
	'ORDER BY t2.track';
$result = @mysql_query($sql);	

if (@mysql_num_rows($result)) {
	$smarty->assign ('show_tracklist_tab', 1);
	}	
if (($add == 'lista') OR ($add == 'informacje')) {

$album_tracks_list = array();
$album_samples_list = array();
$album_lalalabs_list = array();
$main = array();

	while ( $rowsong = @mysql_fetch_array($result) ) {
		$sql = 'SELECT id FROM song_samples WHERE (songid=' . $rowsong['id'] . ' AND status=1)';
		$result2 = mysql_query($sql);
		if (@mysql_num_rows($result2) > 0) {array_push($album_samples_list, '1');} else array_push($album_samples_list, '0');
		
		$sql = 'SELECT ringtoneurl FROM lalalab_songs WHERE songid="' .  $rowsong['id'] . '"';
		$result3 = mysql_query($sql);
		if (@mysql_num_rows($result3) > 0) {array_push($album_lalalabs_list, $rowsong['urlname']);} else array_push($album_lalalabs_list, '0');		

	$sql = 'SELECT t1.name, t1.urlname ' .
		'FROM artists AS t1, feature_lookup AS t2 ' .
		'WHERE (' . $statquery . 't1.id=t2.artistid AND t2.songid=' . $rowsong['id'] . ') ' .
		'ORDER BY t1.added';
	$result_inside = mysql_query($sql);
	$album_trackfeats_list = array();
	while($row_inside = @mysql_fetch_array($result_inside)){
		//$feat = $feat . ', ' . '<a href="?s=name&id=' . $row_inside[id] . '">' . $row_inside[name] . '</a>';
		array_push($album_trackfeats_list, '<a href="/n/' . $row_inside['urlname'] . '">' . $row_inside['name'] . '</a>');
		
		} // while
		


	  $sql = 'SELECT t1.name, t1.urlname ' .
	         'FROM artists AS t1, music_lookup AS t2 ' .
			 'WHERE (' . $statquery . 't1.id=t2.artistid AND t2.songid=' . $rowsong['id'] . ') ' .
			 'ORDER BY t1.added';
	  $result_inside = @mysql_query($sql);
	  $album_trackmusic_list = array();
	  while($row_inside = @mysql_fetch_array($result_inside)){
	    //$music = $music . ', ' . '<a href="?s=name&id=' . $row_inside[id] . '">' . $row_inside[name] . '</a>';
		array_push($album_trackmusic_list, '<a href="/n/' . $row_inside['urlname'] . '">' . $row_inside['name'] . '</a>');
		
		} // while

	  $sql = 'SELECT t1.name, t1.urlname ' .
	         'FROM artists AS t1, scratch_lookup AS t2 ' .
			 'WHERE (' . $statquery . 't1.id=t2.artistid AND t2.songid=' . $rowsong['id'] . ') ' .
			 'ORDER BY t1.added';
	  $result_inside = @mysql_query($sql);
	  $album_trackscratch_list = array();
	  while($row_inside = @mysql_fetch_array($result_inside)){
	    //$scratch = $scratch . ', ' . '<a href="?s=name&id=' . $row_inside[id] . '">' . $row_inside[name] . '</a>';
		array_push($album_trackscratch_list, '<a href="/n/' . $row_inside['urlname'] . '">' . $row_inside['name'] . '</a>');
		} // while
	  
	  $sql = 'SELECT t1.name, t1.urlname ' .
	         'FROM artists AS t1, artist_lookup AS t2 ' .
			 'WHERE (' . $statquery . 't1.id=t2.artistid AND t2.songid=' . $rowsong['id'] . ') ' .
			 'ORDER BY t1.added';
	  $result_inside = @mysql_query($sql);
	  $album_trackrap_list = array();
	  while($row_inside = @mysql_fetch_array($result_inside)){
	    //$rap = $rap . ', ' . '<a href="?s=name&id=' . $row_inside[id] . '">' . $row_inside[name] . '</a>';
		array_push($album_trackrap_list, '<a href="/n/' . $row_inside['urlname'] . '">' . $row_inside['name'] . '</a>');
		} // while

	  
	  
	  array_push($main, array($album_trackfeats_list, $album_trackmusic_list, $album_trackrap_list, $album_trackscratch_list));
	  
	  	  
	  $czas = $rowsong['length'];
	  $sek = ($czas % 60);
	  if (strlen($sek)<2) $sek= '0' . $sek;
	  $m = floor($czas/60);
	  $czas = $m . ':' . $sek;
	  if ($czas == '0:00') $czas = ''; else $czas = '(' . $czas . ')';
	  
	  //if ($rowsong['track'] == 101) print ('<tr><td align="center"><B>CD 1:</B></td></tr>');
	  //if ($rowsong['track'] == 201) print ('<tr><td height="30"></td><td height="30"></td></tr><tr><td align="center"><B>CD 2:</B></td></tr>');	  
	  if ($rowsong['track'] > 99) $rowsong['track'] = substr($rowsong['track'], 1, 2);
	  
	  //print ('<tr><td>' . $row["track"] . ". <a href=\"?s=song&id=" . $row[id] . "\">" . strtoupper($row["title"]) . $sample . '</a>' . '<BR>');
	//print ('</td><td width="40" align="center" valign="top">' . $czas . " " . $bpm . "<BR>"); 

		array_push($album_tracks_list, $rowsong['track'] . '. <a href="/s/' . $rowsong['urlname'] . '">' . strtoupper($rowsong['title']) . '</a> ' . $czas );	
		
		}
	  
	$smarty->assign('album_tracks_list', $album_tracks_list);
	$smarty->assign('album_details', $main);
	$smarty->assign('album_samples_list', $album_samples_list);
	$smarty->assign('album_lalalabs_list', $album_lalalabs_list);
	}

	
	


// ******************************************************************** PROFIL
if (($row['description'] != '') OR ($row['artistabout'] != '')) {		
	$smarty->assign ('show_description_tab', 1);
	
	if ($add == 'informacje') {
	    if ($row['description'] != '') $smarty->assign('shortdesc', nl2p(substr($row['description'], 0, 300) . ' <a href="/a/' . $urlname . '/opis" class="readmore"> >></a>'));
		if ($row['artistabout'] != '') $smarty->assign ('shortartistabout', nl2p(substr($row['artistabout'], 0, 300) . ' <a href="/a/' . $urlname . '/opis" class="readmore"> >></a>'));
		}
		
	if ($add == 'opis') {
		$smarty->assign ('albumdescription', nl2p($row['description']));
		$smarty->assign ('artistabout', nl2p($row['artistabout']));
				
		}
	}
	

	
	
if ($row['artistabout'] <> '') {
	$smarty->assign ('artistabout', nl2p($row['artistabout']));	
	}
	
	
	
	

	


// ******************************************************* SINGIEL DLA, POPRZEDZONY
if ($row['epfor'] != 0) {
	$sql = 'SELECT title, urlname FROM albums WHERE id=' . $row['epfor'];
	$result = @mysql_query($sql);
	$epforrow = @mysql_fetch_array($result);
	if (isset($epforrow['title'])) $keywords .= $epforrow['title'] . ',';
	$smarty->assign('epfor', '<a href="/a/' . $epforrow['urlname'] . '">' . $epforrow['title'] . '</a>');
	}
else {
	$album_singles_list = array();
	$sql = 'SELECT urlname, title FROM albums WHERE epfor=' . $id . ' ORDER BY year DESC';
	$result = @mysql_query($sql);
    while ($epforrow = @mysql_fetch_array($result)) {
		if (isset($epforrow['title'])) $keywords .= $epforrow['title'] . ',';
		array_push($album_singles_list, '<a href="/a/' . $epforrow['urlname'] . '">' . $epforrow['title'] . '</a>');
		}		
	$smarty->assign('album_singles_list', $album_singles_list);
    }	
	


// ******************************************************* CZAS TRWANIA
$sql = 'SELECT t1.length ' . 
	'FROM songs AS t1, album_lookup AS t2 ' .
	'WHERE (t2.songid=t1.id AND t2.albumid=' . $id . ')';
$result = @mysql_query($sql);
$totaltime = 0;
while ($lengthrow = @mysql_fetch_array($result)) {
	$totaltime += $lengthrow['length'];		
	}
$sek = ($totaltime % 60);
if (strlen($sek)<2) $sek = '0' . $sek;
$m = floor($totaltime/60);
$totaltime = $m . ':' . $sek;	
if ($m > 0) $smarty->assign('length', $totaltime);
		




// **************************************************************** KUP ALBUM	
$album_shops_list = array();
$sql = 'SELECT t1.id, t1.link, t1.hits, t2.name FROM album_prices AS t1, eshops AS t2 WHERE (t1.shopid=t2.id AND t2.display="y" AND t1.albumid=' . $id . ')';
$result = @mysql_query($sql);
while ($row = @mysql_fetch_array($result)) {
	array_push($album_shops_list, '<a href="/kupalbum/' . urlencode($row['id']) . '" target="_blank" onMouseOver="javascript:window.status=\'' . $row['link'] . '\'; return true" onMouseOut="javascript:window.status=\'\'" rel="nofollow">' . $row['name'] . ' (' . $row['hits'] . ')</a>');
	}
$smarty->assign('album_shops_list', $album_shops_list);


//************************************************************ LISTA POWIAZANYCH NEWSOW
include ('part-news.php');
	
	
// ************************************************************** KOMENTARZE	
include ('part-comments.php');
	




// ******************************************************* POZYCJA NA LISCIE
$sql = 'SELECT id FROM albums ORDER BY viewed DESC LIMIT 10';
$result = @mysql_query($sql);
$inum = 0;
while($row = @mysql_fetch_array($result)){
	$inum++;
	if ($id == $row['id']) {
		$smarty->assign('top10', $inum);
		}
	} // while
// *************************************************************************


$sectiontitles = array (recenzje => 'recenzje', oceny => 'oceny albumu', informacje => 'informacje ogólne', opis => '"' . $title . '"', newsy => 'newsy', lista => 'szczegóowa lista utworów', komentarze => 'komentarze', brak => 'brak szczegółowych danych', niekomb => 'nie kombinuj!');
$smarty->assign ('sectiontitle', $sectiontitles[$add]);

if (strpos($title, '<font')) {
	$smarty->assign('imagealt', substr($title, 0, strpos($title, '<FONT')));
	}
else {
	$smarty->assign('imagealt', $title);
	}

$smarty->assign('s', $s);
$smarty->assign('id', $id);
$smarty->assign('add', $add);

$smarty->assign('keywords', $keywords);
$smarty->assign('history', '<a href="/">HHBD.PL</a> -> <a href="/albumy">ALBUMY</a> -> <a href="/a/' . $urlname . '">' . strtoupper($title) . '</a> -> ' . strtoupper($sectiontitles[$add]));
	
//*****************************************************************	

$smarty->assign('body_template', 'site/album.tpl');
//*****************************************************************

?>