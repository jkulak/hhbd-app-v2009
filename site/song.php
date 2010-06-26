<?php

$smarty->assign ('urlname', $id);
$urlname = $id;

// pobranie ID z tablicy na podstawie wpisu z linku, mamy ID
$sql = 'SELECT id, title, length, viewed, added FROM songs WHERE urlname="' . $id . '"';
$row = @mysql_fetch_array(@mysql_query($sql));
$id = $row['id'];
if ($id == '') { $add = 'niekomb';}

if ($row['length'] <> 0) {
	$mins =  floor($row['length'] / 60) ;
	$secs = ($row['length'] % 60) < 10 ? '0' . ($row['length'] % 60) : ($row['length'] % 60);
	$length = $mins . ':' . $secs;
	$smarty->assign('length', $length);
	}

$smarty->assign('viewed', $row['viewed'] + 1 );
$smarty->assign('added', show_normal_date($row['added']));

$smarty->assign('ctitle', $row['title']);
$smarty->assign('title', strtoupper($row['title']));

$smarty->assign ('description', strtoupper($row['title']) . ' - informacje o utworze, lista wykonawców, s³owa, wykorzystane sample...');

// mamy ID
mysql_query('UPDATE songs SET viewed=(viewed+1) WHERE id=' . $id);



// ****************************************************************************************
//                                                                                    RAP *
// ****************************************************************************************
$rap = array();
$sql = 'SELECT t1.urlname, t1.name FROM artists t1, artist_lookup t2 WHERE (t2.artistid=t1.id AND t2.songid="' . $id . '") ORDER BY t1.name';
$result = @mysql_query($sql);
while ($row = @mysql_fetch_array($result)) {
	array_push($rap, '<a href="/n/' . $row['urlname'] . '">' . $row['name'] . '</a>');
	}
$smarty->assign('rap', $rap);
// ****************************************************************************************



// ****************************************************************************************
//                                                                                 MUZYKA *
// ****************************************************************************************
$music = array();
$sql = 'SELECT t1.urlname, t1.name FROM artists t1, music_lookup t2 WHERE (t2.artistid=t1.id AND t2.songid="' . $id . '") ORDER BY t1.name';
$result = @mysql_query($sql);
while ($row = @mysql_fetch_array($result)) {
	array_push($music, '<a href="/n/' . $row['urlname'] . '">' . $row['name'] . '</a>');
	}
$smarty->assign('music', $music);
// ****************************************************************************************



// ****************************************************************************************
//                                                                                SKRECZE *
// ****************************************************************************************
$scratch = array();
$sql = 'SELECT t1.urlname, t1.name FROM artists t1, scratch_lookup t2 WHERE (t2.artistid=t1.id AND t2.songid="' . $id . '") ORDER BY t1.name';
$result = @mysql_query($sql);
while ($row = @mysql_fetch_array($result)) {
	array_push($scratch, '<a href="/n/' . $row['urlname'] . '">' . $row['name'] . '</a>');
	}
$smarty->assign('scratch', $scratch);
// ****************************************************************************************



// ****************************************************************************************
//                                                                             GOŒCIENNIE *
// ****************************************************************************************
$feat = array();
$sql = 'SELECT t1.urlname, t1.name, t3.feattype FROM artists t1, feature_lookup t2, feattypes t3 WHERE (t2.artistid=t1.id AND t3.id=t2.feattype AND t2.songid="' . $id . '") ORDER BY t1.name';
$result = @mysql_query($sql);
while ($row = @mysql_fetch_array($result)) {
	array_push($feat, '<a href="/n/' . $row['urlname'] . '">' . $row['name'] . '</a> (' . $row['feattype'] . ')');
	}
$smarty->assign('feat', $feat);
// ****************************************************************************************




// ****************************************************************************************
//                                                                          TEXT PIOSENKI *
// ****************************************************************************************
$sql = 'SELECT text FROM song_texts WHERE songid="' . $id . '"';
$result = mysql_query($sql);
$row = mysql_fetch_array($result);
$smarty->assign('lyrics', $row['text']);
// ****************************************************************************************



// ****************************************************************************************
//                                                                            NA ALBUMACH *
// ****************************************************************************************
$onalbums = array();

$sql = 'SELECT t1.title, t1.urlname AS albumurlname, t1.year, t2.name, t2.urlname AS artisturlname, t5.name AS labelname, t5.urlname AS labelurlname
		FROM albums t1, artists t2, album_lookup t3, album_artist_lookup t4, labels t5
		WHERE (t4.albumid=t1.id AND t4.artistid=t2.id AND t3.albumid=t1.id AND t5.id=t1.labelid AND t3.songid="' . $id . '") 
		ORDER BY t1.year DESC';
$result = mysql_query($sql);
while ($row = mysql_fetch_array($result)) {
	array_push($onalbums, '<a href="/n/' . $row['artisturlname'] . '">' . $row['name'] . '</a> - <a href="/a/' . $row['albumurlname'] . '">' . $row['title'] . '</a> (' . substr($row['year'], 0, 4) . ', <a href="/l/' . $row['labelurlname'] . '">' . $row['labelname'] . '</a>)');
	};
$smarty->assign('onalbums', $onalbums);		
// ****************************************************************************************



// ****************************************************************************************
//                                                                    WYKORZYSTANE SAMPLE *
// ****************************************************************************************
$samples = array ();
$sql = 'SELECT t1.sample, t1.added, t2.urlname, t2.login FROM song_samples t1, users t2 WHERE (t1.addedby=t2.id AND t1.songid="' . $id . '")';
$result = @mysql_query($sql);
while ($row = mysql_fetch_array($result)) {
	array_push($samples, $row['sample'] . ' [doda³: <a href="/u/' . $row['urlname'] . '">' . $row['login'] . '</a>]');
	}
$smarty->assign('samples', $samples);
// ****************************************************************************************







// $sectiontitles = array (recenzje => 'recenzje', oceny => 'oceny albumu', informacje => 'informacje ogólne', opis => 'oficjalny opis albumu', newsy => 'newsy', lista => 'szczegó³owa lista utworów', komentarze => 'komentarze', brak => 'brak szczegó³owych danych', niekomb => 'nie kombinuj!');
$smarty->assign ('sectiontitle', 'na albumach');

$smarty->assign('s', $s);
$smarty->assign('id', $id);
$smarty->assign('add', $add);

$smarty->assign('keywords', $keywords);
//$smarty->assign('history', '<a href="/">HHBD.PL</a> -> <a href="/albumy">ALBUMY</a> -> <a href="/album/' . $urlname . '">' . strtoupper($title) . '</a> -> ' . strtoupper($sectiontitles[$add]));
	
//*****************************************************************	

$smarty->assign('body_template', 'site/song.tpl');
//*****************************************************************

?>