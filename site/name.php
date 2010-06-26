<?php

$smarty->assign ('urlname', $id);

// pobranie ID z tablicy na podstawie wpisu z linku, mamy ID
$sql = 'SELECT id FROM artists WHERE urlname="' . $id . '"';
$row = @mysql_fetch_array(mysql_query($sql));
$id = $row['id'];
if ($id == '') { $add = 'niekomb';}

// mamy ID
mysql_query('UPDATE artists SET viewed=(viewed+1) WHERE id=' . $id);

$sql = 'SELECT name, realname, concertinfo, profile, website, viewed, added, addedby, updated, updatedby ' .
	   'FROM artists WHERE id=' . $id;
$result = mysql_query($sql);
$artistrow = @mysql_fetch_array($result);

// *************************************************************************
// * STA£E ELEMENTY STRONY *************************************************
// *************************************************************************
$smarty->assign ('name', $artistrow['name']);
$smarty->assign ('realname', $artistrow['realname']);
$smarty->assign ('concertinfo', $artistrow['concertinfo']);

if ($artistrow['website'] != '') {
	$website = '<a href="/stronawykonawcy/' . urlencode($id) . '" target="_blank" onMouseOver="javascript:window.status=\'' . $artistrow['website'] . '\'; return true" onMouseOut="javascript:window.status=\'\'">' . $artistrow['website'] . '</a>';
	$smarty->assign ('website', $website);
	}

$smarty->assign ('viewed', $artistrow['viewed']); 
$smarty->assign ('added', show_normal_date(substr($artistrow['added'], 0, 10)));
$smarty->assign ('addedby', $artistrow['addedby']);
$smarty->assign ('updated', $artistrow['updated']);
$smarty->assign ('updatedby', $artistrow['updatedby']);

if (isset($artistrow['name'])) $keywords .= $artistrow['name'] . ',';
if (isset($artistrow['realname'])) $keywords .= $artistrow['realname'] . ',';



// **************************************************************** ZDJÊCIE
$sql = 'SELECT filename, source, sourceurl FROM artists_photos WHERE (artistid=' . $id . ' AND main="y")';
$result = mysql_query($sql);
$photo = @mysql_fetch_array($result);
  
if ((file_exists('imgs/database/artists/' . $photo['filename'])) AND ($photo['filename'] != '')) {  
	$smarty->assign ('photourl', $photo['filename']);
	$smarty->assign ('photohint', 'Fot. ' . $photo['source'] . ($photo['sourceurl'] == '' ? '' : ' - ' . $photo['sourceurl']));
	$smarty->assign ('photolink', '/galeria/' . $id);
	}
else { 
	$smarty->assign ('photourl', 'nohs.gif');
	$smarty->assign ('photohint', '');
	$smarty->assign ('photolink', '/dodajzdjecie/' . $id);
	}

// ******************************************************** ZNANY TAK¯E JAKO
$alsoknownas_list = array();

$sql = 'SELECT t1.altname FROM altnames_lookup AS t1 ' .
	   'WHERE (t1.artistid=' . $id . ') ORDER BY t1.altname';
$result = mysql_query($sql);
while ($row = @mysql_fetch_array($result)) { 
	array_push($alsoknownas_list, $row['altname']);
	if (isset($artistrow['altname'])) $keywords .= $artistrow['altname'] . ',';
	}
	
$smarty->assign ('alsoknownas_list', $alsoknownas_list);

// **************************************************************** PROJEKTY
$projects_list = array();
$sql = 'SELECT t1.name, t1.urlname, t2.insince, t2.awaysince FROM artists AS t1, band_lookup AS t2 ' .
	   'WHERE (t1.id=t2.bandid AND t2.artistid=' . $id . ') ORDER BY t1.name';
$result = mysql_query($sql);	
while ( $row = @mysql_fetch_array($result) ) {
	if (isset($artistrow['name'])) $keywords .= $row['name'] . ',';
	$projects = $projects . '<a href="/n/' . $row['urlname'] . '">' . $row['name'] . '</a>';
	if (($row[insince] != '0000-00-00') OR ($row[awaysince] != '0000-00-00')) {
		$projects = $projects . ' (';
		if ($row[insince] != '0000-00-00') {
			$insince =  substr($row[insince], 0, 4); 
			$projects = $projects . "od $insince";  
			}
		if (($row[insince] != '0000-00-00') AND ($row[awaysince] != '0000-00-00')) {
			$projects = $projects . ' ';
			}
		if ($row[awaysince] != '0000-00-00') {
			$awaysince =  substr($row[awaysince], 0, 4); 
			$projects = $projects . "do $awaysince";  
			}		
		$projects = $projects . ')';	  
		}
	array_push($projects_list, $projects);
	
	$projects = '';
	}
$smarty->assign ('projects_list', $projects_list);

// ******************************************************************* SK£AD
$members_list = array();
$sql = 'SELECT t1.name, t1.urlname, t2.insince, t2.awaysince FROM artists AS t1, band_lookup AS t2 ' .
	   'WHERE (t1.id=t2.artistid AND t2.bandid=' . $id . ') ORDER BY t1.name';
$result = mysql_query($sql);	
while ( $row = @mysql_fetch_array($result) ) {
	$members = $members . '<a href="/n/' . $row['urlname'] . '">' . $row['name'] . '</a>';
	if (($row[insince] != '0000-00-00') OR ($row[awaysince] != '0000-00-00')) {
		$members = $members . ' (';
		if ($row[insince] != '0000-00-00') {
			$insince =  substr($row[insince], 0, 4); 
			$members = $members . "od $insince";
			}
		if (($row[insince] != '0000-00-00') AND ($row[awaysince] != '0000-00-00')) {
			$members = $members . ' ';
			}
		if ($row[awaysince] != '0000-00-00') {
			$awaysince =  substr($row[awaysince], 0, 4); 
			$members = $members . "do $awaysince";
			}		
		$members = $members . ')';	  
		}
	array_push($members_list, $members);
	$members = '';
	}
$smarty->assign ('members_list', $members_list);

// ***************************************************** STRONY NIEOFICJALNE
$unofficials_list = array();
$sql = 'SELECT id, url, addedby, status FROM artists_websites WHERE (status<>9 AND artistid=' . $id . ') ORDER BY added DESC';
$result = mysql_query($sql);

while($websitesrow = @mysql_fetch_array($result)){
	if ($websitesrow['addedby'] == $userid) {
		if ($websitesrow['status'] == 0) {
			$unofficial = $unofficial .  '<i>' . substr($websitesrow['url'], 0, 12) . '... - oczekuje na moderacjê</i>';
			}
		}
	if ($websitesrow['status'] == 1) {			    
		$unofficial = $unofficial . '<a href="visitartistsite.php?id=' . $websitesrow['id'] . '" target="_blank">' . $websitesrow['url'] . '</a>';
		// [<a href="ZGLOSDOMODERACJISTRONE" alt="Strona nie dzia³a!">x</a>]			
		}
	array_push($unofficial_list, $unofficial);
	$unofficial = '';	}

$smarty->assign ('unofficials_list', $unofficials_list);

// ***************************************************** RELACJE Z KONCERTÓW
/*
* $sql = 'SELECT t1.id, t1.date, t1.title, t3.name AS city ' .
	   'FROM concerts AS t1, artist_concert_lookup AS t2, cities AS t3 ' .
	   'WHERE (t2.artistid="' . $id . '" AND t1.cityid=t3.id AND t1.id=t2.concertid AND date) ' .
	   'ORDER BY t1.date ' . 
	   'LIMIT 5';
$result = mysql_query($sql);
if (@mysql_num_rows($result)>0) $concerts = '<p><strong>NAJBLI¯SZE KONCERTY:</strong><ul class="smallindentnews">';
while( $concertsrow = @mysql_fetch_array($result) ) {
	if ($concertsrow['date'] <= date('Y-m-d')) {
		$concertsrep = $concertsrep . '<li><a href="index.php?s=concert&id=' . $concertsrow['id'] . '">' . date('j.m.Y', strtotime($concertsrow['date'])) . ' - ' . substr($concertsrow['city'], 0, 15) . '</a> (<a href="?s=report&id=' . $concertsrow['id'] . '">RELACJA</a>)</li>';
		}
	else {
		$concertsrep = $concertsrep . '<li><a href="index.php?s=concert&id=' . $concertsrow['id'] . '">' . date('j.m.Y', strtotime($concertsrow['date'])) . ' - ' . $concertsrow['city'] . '</a></li>';
		}
	}
if ($concertsrep != '') {
	$concertsrep = $concertsrep . '<li><a href="index.php?s=concerts&id=' . $id . '"><i>poka¿ wszystkie</i></a></li></ul></p>' . "\n";
	}
	
	*/

// ****************************************************************** MIASTO
$sql = 'SELECT t1.name AS city FROM cities AS t1, artists AS t2, artist_city_lookup AS t3 ' .
	   'WHERE (t3.cityid=t1.id AND t3.artistid=t2.id AND t2.id=' . $id . ')';
$result = mysql_query($sql);
$cityrow = @mysql_fetch_array($result);
$smarty-> assign('city', $cityrow['city']);



//****************************************************************************
//* WYKONANIE WSZYSTKICH ZAPYTAN W CELU SPRAWDZENIA CO JEST, A CZEGO NIE MA. *
//****************************************************************************

// ******************************************************************** PROFIL
if ($artistrow['profile'] <> '') {
	$smarty->assign ('profile', nl2p($artistrow['profile']));	
	$smarty->assign ('show_profile_tab', 1);
	if (!isset($add)) {
		$add = 'profil';
		}
	}
	
// ******************************************************** ALBUMY SYGNOWANE
$sql = 'SELECT t3.title, t3.cover, t3.urlname AS albumurlname, t3.year, t3.singiel, t3.catalog_cd, t4.name AS labelname, t4.urlname AS labelurlname ' . 
	   'FROM album_artist_lookup AS t2, albums AS t3, labels AS t4 ' .
	   'WHERE (t2.artistid=' . $id . ' AND t3.id=t2.albumid AND t4.id=t3.labelid) ORDER BY t3.year DESC, t3.title';		 
$result = mysql_query($sql);
if (@mysql_num_rows($result)) {
	$smarty->assign ('show_album_tab', 1);
	if (!isset($add)) {
		$add = 'albumy';
		}
	}	
if ($add == 'albumy') {
	$ownalbum_titles_list = array();
	$ownalbum_covers_list = array();
	$ownalbum_ids_list = array();
	$ownalbum_years_list = array();
	$ownalbum_labels_list = array();
	$ownalbum_sns_list = array();
	while ( $row = @mysql_fetch_array($result) ) { 
		$year = $row['year'];
		if ($year > date('Y-m-d')) $announced = ' (<font class="announced">zapowiedziany</font>)'; else $announced = '';
		$year = substr($year, 0, 4);  	
		//if ($year != $prevyear) {
		//	$ownalbums = $ownalbums . '<li><strong>' . $year . '</strong></li>';
		//	$prevyear = $year;  
		//	}
		$singiel = ($row['singiel'] == 1) ? ' (EP)' : '';
		array_push($ownalbum_titles_list, $row['title'] . $singiel . $announced);
		array_push($ownalbum_ids_list, $row['albumurlname']);
		array_push($ownalbum_sns_list, $row['catalog_cd']);
		
		if (file_exists('imgs/database/albums-thumbs/' . substr($row['cover'], 0, strlen($row['cover']) - 4) . '_75.jpg')) {
			array_push($ownalbum_covers_list, substr($row['cover'], 0, strlen($row['cover']) - 4) . '_75.jpg');
			}
		else array_push($ownalbum_covers_list, 'nocover_75.jpg');
		
		array_push($ownalbum_years_list, $year);
		array_push($ownalbum_labels_list, '<a href="/l/' . $row['labelurlname'] . '">' . $row['labelname'] . '</a>');	
		}	
	$smarty->assign ('ownalbum_titles_list', $ownalbum_titles_list);
	$smarty->assign ('ownalbum_ids_list', $ownalbum_ids_list);
	$smarty->assign ('ownalbum_covers_list', $ownalbum_covers_list);
	$smarty->assign ('ownalbum_years_list', $ownalbum_years_list);
	$smarty->assign ('ownalbum_labels_list', $ownalbum_labels_list);
	$smarty->assign ('ownalbum_sns_list', $ownalbum_sns_list);
	}

// ****************************************************************** ALBUMY
$sql = 'SELECT t3.title, t3.urlname AS albumurlname, t3.year, t3.cover, t3.singiel, t3.catalog_cd, t4.name AS labelname, t4.urlname AS labelurlname, t6.name, t6.urlname FROM album_artist_lookup AS t2, albums AS t3, labels AS t4, band_lookup AS t5, artists AS t6 ' .
	   'WHERE (t5.artistid=' . $id . ' AND t5.bandid=t2.artistid AND t3.id=t2.albumid AND t4.id=t3.labelid AND t6.id=t5.bandid) ORDER BY t3.year DESC, t3.title';		 
$result = mysql_query($sql);
if (@mysql_num_rows($result)) {
	$smarty->assign ('show_album_tab', 1);
	if (!isset($add)) {
		$add = 'albumy';
		}
	}	
if ($add == 'albumy') {
	$album_titles_list = array();
	$album_covers_list = array();
	$album_ids_list = array();
	$album_years_list = array();
	$album_labels_list = array();
	$album_artists_list = array();
	$album_sns_list = array();
	while ( $row = @mysql_fetch_array($result) ) { 
		$year = $row['year'];
		if ($year > date('Y-m-d')) $announced = ' (<span class="announced">zapowiedziany</span>)'; else $announced = '';
		$year = substr($year, 0, 4);   	
		//if ($year != $prevyear) {
		//	$albums = $albums . '<li><strong>' . $year . '</strong></li>';
		//	$prevyear = $year;  
		//	}
		$singiel = ($row['singiel'] == 1) ? ' (EP)' : '';	
		array_push($album_titles_list, $row['title'] . $singiel . $announced);
		array_push($album_ids_list, $row['albumurlname']);
		array_push($album_sns_list, $row['catalog_cd']);
		
		if (file_exists('imgs/database/albums-thumbs/' . substr($row['cover'], 0, strlen($row['cover']) - 4) . '_75.jpg')) {
			array_push($album_covers_list, substr($row['cover'], 0, strlen($row['cover']) - 4) . '_75.jpg');
			}
		else array_push($album_covers_list, 'nocover_75.jpg');

		array_push($album_years_list, $year);
		array_push($album_labels_list, '<a href="/l/' . $row['labelurlname'] . '">' . $row['labelname'] . '</a>');	
		array_push($album_artists_list, '<a href="/n/' . $row['urlname'] . '">' . $row['name'] . '</a>');	
		}
	$smarty->assign ('album_titles_list', $album_titles_list);
	$smarty->assign ('album_ids_list', $album_ids_list);
	$smarty->assign ('album_covers_list', $album_covers_list);
	$smarty->assign ('album_years_list', $album_years_list);
	$smarty->assign ('album_labels_list', $album_labels_list);
	$smarty->assign ('album_artists_list', $album_artists_list);
	$smarty->assign ('album_sns_list', $album_sns_list);
	}

// ******************************************************** WYSTÊPY GO¦CINNE
$sql = 'SELECT DISTINCT(t4.urlname), t4.title, t4.year, t4.singiel, t6.urlname AS labelurlname, t6.name, t1.id AS artistid, t1.name AS artist ' .
	   'FROM artists AS t1, songs AS t2, feature_lookup AS t3, albums AS t4, album_lookup AS t5, labels AS t6 ' . 
	   'WHERE (t1.id=' . $id . ' AND t3.artistid=t1.id AND t3.songid=t2.id AND t5.songid=t2.id AND t5.albumid=t4.id AND t4.labelid=t6.id) ' . // AND t7.albumid=t4.id AND t7.labelid=t6.id
	   'ORDER BY t4.year DESC, t4.title';
$result = mysql_query($sql);
if (@mysql_num_rows($result)) {
	$smarty->assign ('show_guest_tab', 1);
	if (!isset($add)) {
		$add = 'goscinnie';
		}
	}	
if ($add == 'goscinnie') {
	$guest_list = array();
	while ( $row = @mysql_fetch_array($result) ) { 
		$year = $row['year'];
		if ($year > date('Y-m-d')) $announced = ' (<span class="announced">zapowiedziany</span>)'; else $announced = '';
		$year = substr($year, 0, 4);   	
		//if ($year != $prevyear) {
		//	$guest = $guest . '<li><strong>' . $year . '</strong></li>';
		//	$prevyear = $year;  
		//	}
		$singiel = ($row['singiel'] == 1) ? ' (EP)' : '';
		$guest = $guest . '<a href="/a/' . $row['urlname'] . '">' . $row['title'] . $singiel . '</a>' . $announced . ' (' . $year . ', <a href="/l/' . $row['labelurlname'] . '">' . $row['name'] . '</a>)'; 
		array_push($guest_list, $guest);
		$guest = '';
		}
	$smarty->assign ('guest_list', $guest_list);
	}
	
// ****************************************************************** MUZYKA
$sql = 'SELECT DISTINCT(t4.urlname), t4.title, t4.year, t4.singiel, t6.urlname AS labelurlname, t6.name ' .
	   'FROM artists AS t1, songs AS t2, music_lookup AS t3, albums AS t4, album_lookup AS t5, labels AS t6 ' . 
	   'WHERE (t1.id=' . $id . ' AND t3.artistid=t1.id AND t3.songid=t2.id AND t5.songid=t2.id AND t5.albumid=t4.id AND t4.labelid=t6.id) ' . // AND t7.albumid=t4.id AND t7.labelid=t6.id
	   'ORDER BY t4.year DESC, t4.title';
$result = mysql_query($sql);
if (@mysql_num_rows($result)) {
	$smarty->assign ('show_music_tab', 1);
	if (!isset($add)) {
		$add = 'muzyka';
		}
	}	
if ($add == 'muzyka') {
	$music_list = array();
	while ( $row = @mysql_fetch_array($result) ) { 
		$year = $row['year'];
		if ($year > date('Y-m-d')) $announced = ' (<font class="announced">zapowiedziany</font>)'; else $announced = '';
		$year = substr($year, 0, 4);  	
		//if ($year != $prevyear) {
		//	$music = $music . '<li><strong>' . $year . '</strong></li>';
		//	$prevyear = $year;  
		//	}
		$singiel = ($row['singiel'] == 1) ? ' (EP)' : '';
		array_push($music_list, '<a href="/a/' . $row['urlname'] . '">' . $row['title'] . $singiel . '</a>' . $announced . ' (' . $year . ', <a href="/l/' . $row['labelurlname'] . '">' . $row['name'] . '</a>)');
		}
	$smarty->assign ('music_list', $music_list);
	}

// ********************************************************************* RAP
$sql = 'SELECT DISTINCT(t4.urlname), t4.title, t4.year, t4.singiel, t6.urlname AS labelurlname, t6.name ' .
	   'FROM artists AS t1, songs AS t2, artist_lookup AS t3, albums AS t4, album_lookup AS t5, labels AS t6 ' . 
	   'WHERE (t1.id=' . $id . ' AND t3.artistid=t1.id AND t3.songid=t2.id AND t5.songid=t2.id AND t5.albumid=t4.id AND t4.labelid=t6.id) ' . // AND t7.albumid=t4.id AND t7.labelid=t6.id
	   'ORDER BY t4.year DESC, t4.title';
$result = mysql_query($sql);
if (@mysql_num_rows($result)) {
	$smarty->assign ('show_rap_tab', 1);
	if (!isset($add)) {
		$add = 'rap';
		}
	}	
if ($add == 'rap') {
	$rap_list = array();
	while ( $row = @mysql_fetch_array($result) ) { 
		$year = $row['year'];
		if ($year > date('Y-m-d')) $announced = ' (<font class="announced">zapowiedziany</font>)'; else $announced = '';
		$year = substr($year, 0, 4);  	
		//if ($year != $prevyear) {
		//	$rap = $rap . '<li><strong>' . $year . '</strong></li>';
		//	$prevyear = $year;  
		//	}
		$singiel = ($row['singiel'] == 1) ? ' (EP)' : '';
		array_push($rap_list, '<a href="/a/' . $row['urlname'] . '">' . $row['title'] . $singiel . '</a>' . $announced . ' (' . $year . ', <a href="/l/' . $row['labelurlname'] . '">' . $row['name'] . '</a>)');
		}
	$smarty->assign ('rap_list', $rap_list);
	}

// ***************************************************************** SKRECZE
$sql = 'SELECT DISTINCT(t4.urlname), t4.title, t4.year, t4.singiel, t6.urlname AS labelurlname, t6.name ' .
	   'FROM artists AS t1, songs AS t2, scratch_lookup AS t3, albums AS t4, album_lookup AS t5, labels AS t6 ' . 
	   'WHERE (t1.id=' . $id . ' AND t3.artistid=t1.id AND t3.songid=t2.id AND t5.songid=t2.id AND t5.albumid=t4.id AND t4.labelid=t6.id) ' . // AND t7.albumid=t4.id AND t7.labelid=t6.id
	   'ORDER BY t4.year DESC, t4.title';
$result = mysql_query($sql);
if (@mysql_num_rows($result)) {
	$smarty->assign ('show_scratch_tab', 1);
	if (!isset($add)) {
		$add = 'skrecze';
		}
	}	
if ($add == 'skrecze') {
	$scratch_list = array();
	while ( $row = @mysql_fetch_array($result) ) { 
		$year = $row['year'];
		if ($year > date('Y-m-d')) $announced = ' (<font class="announced">zapowiedziany</font>)'; else $announced = '';
		$year = substr($year, 0, 4);  	
		//if ($year != $prevyear) {
		//	$scratch = $scratch . '<li><strong>' . $year . '</strong></li>';
		//	$prevyear = $year;  
		//	}
		$singiel = ($row['singiel'] == 1) ? ' (EP)' : '';
		array_push($scratch_list, '<a href="/a/' . $row['urlname'] . '">' . $row['title'] . $singiel . '</a>' . $announced . ' (' . $year . ', <a href="/l/' . $row['labelurlname'] . '">' . $row['name'] . '</a>)');
		}
	$smarty->assign('scratch_list', $scratch_list);
	}
	
// ****************************************************************** KONCERTY
$sql = 'SELECT t1.urlname, t1.date, t1.description, t1.title, t3.name AS city ' .
	   'FROM concerts AS t1, artist_concert_lookup AS t2, cities AS t3 ' .
	   'WHERE (t2.artistid="' . $id . '" AND t1.cityid=t3.id AND t1.id=t2.concertid) ' .
	   'ORDER BY t1.date DESC';
$result = mysql_query($sql);
if (@mysql_num_rows($result)) {
	$smarty->assign ('show_concert_tab', 1);
	if (!isset($add)) {
		$add = 'imprezy';
		}
	}	
if ($add == 'imprezy') {
	$concert_ids_list = array();
	$concert_places_list = array();
	$concert_dates_list = array();
	$concert_titles_list = array();
	$concert_descriptions_list = array();
	$concert_done_list = array();
	
	while( $concertsrow = @mysql_fetch_array($result) ) {
		array_push($concert_places_list, $concertsrow['city']);
		array_push($concert_ids_list, $concertsrow['urlname']);
		array_push($concert_titles_list, $concertsrow['title']);
		array_push($concert_dates_list, $concertsrow['date']);
		array_push($concert_descriptions_list, substr($concertsrow['description'], 0, 100));
		array_push($concert_done_list, $concertsrow['date'] < date('Y-m-d') ? 'style="text-decoration: line-through;"' : '');
		}
		
	$smarty->assign ('concert_ids_list', $concert_ids_list);
	$smarty->assign ('concert_titles_list', $concert_titles_list);
	$smarty->assign ('concert_descriptions_list', $concert_descriptions_list);
	$smarty->assign ('concert_dates_list', $concert_dates_list);
	$smarty->assign ('concert_places_list', $concert_places_list);
	$smarty->assign ('concert_done_list', $concert_done_list);	
	}
	
//************************************************************ LISTA POWIAZANYCH NEWSOW
include ('part-news.php');
	
	
// ************************************************************** KOMENTARZE	
include ('part-comments.php');
	


// ******************************************************* POZYCJA NA LISCIE
$sql = 'SELECT id FROM artists ORDER BY viewed DESC LIMIT 30';
$result = mysql_query($sql);
$inum = 0;
while($row = @mysql_fetch_array($result)){
	$inum++;
	if ($id == $row['id']) {
		$smarty->assign('top30', $inum);
		//print ('znalazlem top100');
		}
	} // while
// *************************************************************************


//*****************************************************************
$smarty->assign ('title', strtoupper($artistrow['name']));

if ($artistrow['profile'] != '') {
	$tempdescr = preg_replace($preg_search, $preg_replace, $artistrow['profile']);	
	$descr .= ' ' . substr($tempdescr, 0, 140);
	}

$smarty->assign ('description', strtoupper($artistrow['name']) . ' - biografia, dyskografia, info koncertowe, newsy, teksty.' . $descr);
$smarty->assign ('ctitle', strtoupper($artistrow['name']));
//*****************************************************************	

if (!isset($add)) {
	$add = 'brak';
	}

$sectiontitles = array (albumy => 'albumy', goscinnie => 'go¦cinnie na albumach', muzyka => 'muzyka', rap => 'rap', skrecze => 'skrecze', 
						newsy => 'newsy', imprezy => 'imprezy, koncerty', profil => 'profil', komentarze => 'komentarze', brak => 'brak szczegó³owych danych', niekomb => 'nie kombinuj!');
$smarty->assign ('sectiontitle', $sectiontitles[$add]);

$smarty->assign('s', $s);
$smarty->assign('id', $id);	
$smarty->assign('add', $add);

$smarty->assign('keywords', $keywords . 'dyskografia,biografia,albumy,album,teksty,nowa p³yta');
	
//*****************************************************************	
$smarty->assign('body_template', 'site/name.tpl');
//*****************************************************************

?>