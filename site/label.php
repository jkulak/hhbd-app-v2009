<?php

$smarty->assign ('urlname', $id);

// pobranie ID z tablicy na podstawie wpisu z linku, mamy ID
$sql = 'SELECT id FROM labels WHERE urlname="' . $id . '"';
$row = @mysql_fetch_array(@mysql_query($sql));
$id = $row['id'];
if ($id == '') { $add = 'niekomb';}

// mamy ID
mysql_query('UPDATE labels SET viewed=(viewed+1) WHERE id=' . $id);

$sql = 'SELECT name, profile, website, hits, email, addres, logo, viewed, added, addedby ' .
	   'FROM labels WHERE id=' . $id;
$result = @mysql_query($sql);
$row = @mysql_fetch_array($result);

// *************************************************************************
// * STA£E ELEMENTY STRONY *************************************************
// *************************************************************************
$smarty->assign ('name', $row['name']);


if ($row['website'] != '') {
	$website = '<a href="/stronawytworni/' . urlencode($id) . '" target="_blank" onMouseOver="javascript:window.status=\'' . $row['website'] . '\'; return true" onMouseOut="javascript:window.status=\'\'">' . $row['website'] . '</a>';
	$smarty->assign ('website', $website);
	}


$smarty->assign ('email', $row['email']);
$smarty->assign ('addres', $row['addres']);
if ((file_exists('imgs/database/labels/' . $row['logo'])) AND ($row['logo'] != '')) {
	$smarty->assign ('logo', $row['logo']);	
	}
else $smarty->assign ('logo', 'nologo.gif');

// rebuild 1.5
$keywords = '';

if (isset($row['name'])) $keywords .= $row['name'] . ',';

//print ($row['logo']);
$smarty->assign ('viewed', $row['viewed']); 
$smarty->assign ('added', substr($row['added'], 0, 10));
$smarty->assign ('addedby', $row['addedby']);


//*****************************************************************
$smarty->assign ('title', strtoupper($row['name']));


$smarty->assign ('description', strtoupper($row['name']) . ' - lista wydawnictw, profil, logo, informacje kontaktowe. ' . substr(preg_replace($preg_search, $preg_replace, $row['profile']), 0, 130));
$smarty->assign ('ctitle', strtoupper($row['name']));
//*****************************************************************	

// ****************************************************************** MIASTO
$sql = 'SELECT t1.name AS city FROM cities AS t1, labels AS t2, city_label_lookup AS t3 ' .
	   'WHERE (t3.cityid=t1.id AND t3.labelid=t2.id AND t2.id=' . $id . ')';
$result = @mysql_query($sql);
$cityrow = @mysql_fetch_array($result);
$smarty-> assign('city', $cityrow['city']);



//****************************************************************************
//* WYKONANIE WSZYSTKICH ZAPYTAN W CELU SPRAWDZENIA CO JEST, A CZEGO NIE MA. *
//****************************************************************************

// ******************************************************************** PROFIL
if ($row['profile'] <> '') {
	$smarty->assign ('profile', nl2p($row['profile']));	
	$smarty->assign ('show_profile_tab', 1);
	if (!isset($add)) {
		$add = 'profil';
		}
	}
	

// **************************************************************** WYDAWNICTWA
$sql = 'SELECT t1.urlname AS albumurlname, t1.title, t1.year, t1.catalog_mc, t1.catalog_cd, t1.catalog_lp, t1.singiel, t2.urlname AS artisturlname, t2.name ' . 
   	'FROM albums AS t1, artists AS t2, album_artist_lookup AS t3 ' .
   	'WHERE (t1.labelid=' . $id . ' AND t1.id=t3.albumid AND t2.id=t3.artistid) ' . 
   	'ORDER BY t1.year DESC, t1.catalog_cd';
$result = mysql_query($sql);	
$smarty->assign('discogs_count', @mysql_num_rows($result));
if (@mysql_num_rows($result)) {
	$smarty->assign ('show_discog_tab', 1);
	if (!isset($add)) {
		$add = 'wydawnictwa';
		}
	}	
if ($add == 'wydawnictwa') {
	$label_discogs_list = array();
	$label_years_list = array();
	$label_nums_list = array();
	$inum = 0;
	while ( $row = mysql_fetch_array($result) ) { 
	
		if (isset($row['title'])) $keywords .= $row['title'] . ',';
		if (isset($row['name'])) $keywords .= $row['name'] . ',';
		
		$announced = '';
		$inum++;
		$year = $row['year'];
		if ($year > date('Y-m-d')) $announced = ' (<font color="red"><i>zapowiedziany</i></font>)';
		$year = substr($year, 0, 4);  	
		$catalog = '&nbsp';
		if ($row['catalog_cd'] != '') $catalog = $row['catalog_cd'] ;
		$ep = ($row['singiel'] == 1) ? ' (EP)' : '';	  
		array_push($label_nums_list, $catalog);
		array_push($label_discogs_list, '<a href="/n/' . $row['artisturlname'] . '">' . $row['name'] . '</a> - <a href="/a/' . $row['albumurlname'] . '">' . $row['title'] . $ep . '</a>' . $announced);
		array_push($label_years_list,  $year);
		}
	$smarty->assign('label_discogs_list', $label_discogs_list);
	$smarty->assign('label_nums_list', $label_nums_list);
	$smarty->assign('label_years_list', $label_years_list);
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




$sectiontitles = array ('wydawnictwa' => 'wydawnictwa', 'newsy' => 'newsy', 'profil' => 'profil', 'komentarze' => 'komentarze', 'brak' => 'brak szczegó³owych danych', 'niekomb' => 'nie kombinuj!');

if (!isset($add)) {
	$add = 'brak';
	}

// rebuild
if ($add != '') {
  $smarty->assign ('sectiontitle', $sectiontitles[$add]);
}

$smarty->assign('s', $s);
$smarty->assign('id', $id);	
$smarty->assign('add', $add);

$smarty->assign('keywords', $keywords);
	
//*****************************************************************	
$smarty->assign('body_template', 'site/label.tpl');
//*****************************************************************

?>