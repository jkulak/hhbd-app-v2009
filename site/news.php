<?php

if ((!isset($id)) OR ($id=='')) {
	$sql = 'SELECT id FROM news ORDER BY added DESC LIMIT 1';
	$lastidrow = @mysql_fetch_array(@mysql_query($sql));
	$id = $lastidrow['id'];
	}

$sql = 'UPDATE news SET viewed=(viewed+1) WHERE id="' . $id . '"';
@mysql_query($sql);

$sql = 'SELECT t1.id, t1.news, t1.title, t1.added, t1.glyph, t1.viewed, t1.graph, t2.login ' . 
	'FROM news AS t1, users AS t2 ' .
	'WHERE (t2.id=t1.addedby AND t1.id="' . $id. '") ';

$result = @mysql_query($sql);
$row = @mysql_fetch_array($result);

//*****************************************************************
$smarty->assign ('title', 'HHBD.PL | ' . strtoupper($row['title']));
$smarty->assign ('subtitle', strtoupper($row['title']));
$smarty->assign ('description', strtoupper($row['title']));
$smarty->assign ('ctitle', 'czytelnia');
//*****************************************************************	

$smarty->assign('img', $row['graph']);

if ($row['graph'] == '') {
	$img = 'feedodal.jpg';
	}
else $img = substr($row['graph'], 0, strlen($row['graph']) - 4) . '_small.jpg';


$smarty->assign('newsimg', $img);

$smarty->assign('news', nl2p($row['news']));
$smarty->assign('addedby', $row['login']);
$smarty->assign('added', show_time_from_datetime($row['added'], ':') . ', ' . show_normal_date($row['added']));
$smarty->assign('viewed', $row['viewed']);



$sql = 'SELECT t2.urlname, t2.name ' . 
	'FROM artists AS t2, news_artist_lookup AS t3 ' .
	'WHERE (t3.newsid="' . $id . '" AND t2.id=t3.artistid)';
$result = @mysql_query($sql);

if (@mysql_num_rows($result)) {
	while ($labelsrow = @mysql_fetch_array($result)) {
		$artiststemp = $artiststemp . ', ' . '<a href="/n/' . $labelsrow['urlname'] . '">' . $labelsrow['name'] . '</a>';
		}
	$smarty->assign('refartists', substr($artiststemp, 2, strlen($artiststemp) - 2));
	}
	
	
$sql = 'SELECT t2.urlname, t2.name ' . 
	'FROM labels AS t2, news_label_lookup AS t3 ' .
	'WHERE (t3.newsid="' . $id . '" AND t2.id=t3.labelid)';
$result = @mysql_query($sql);

if (@mysql_num_rows($result)) {
	while ($labelsrow = @mysql_fetch_array($result)) {
		$labelstemp = $labelstemp . ', ' . '<a href="/l/' . $labelsrow['urlname'] . '">' . $labelsrow['name'] . '</a>';
		}
	$smarty->assign('reflabels', substr($labelstemp, 2, strlen($labelstemp) - 2));
	}
	
	
$sql = 'SELECT t2.urlname, t2.title ' . 
	'FROM concerts AS t2, news_concert_lookup AS t3 ' .
	'WHERE (t3.newsid="' . $id . '" AND t2.id=t3.concertid)';
$result = @mysql_query($sql);

if (@mysql_num_rows($result)) {
	while ($labelsrow = @mysql_fetch_array($result)) {
		$concertstemp = $concertstemp . ', ' . '<a href="/p/' . $labelsrow['urlname'] . '">' . $labelsrow['title'] . '</a>';
		}
	$smarty->assign('refconcerts', substr($concertstemp, 2, strlen($concertstemp) - 2));
	}
	
	
// *************************** OKLADKI POWIAZANYCH ALBUMOW
$refalbums = array();

$sql = 'SELECT t2.urlname, t2.title, t2.cover ' . 
	'FROM albums AS t2, news_album_lookup AS t3 ' .
	'WHERE (t3.newsid="' . $id . '" AND t2.id=t3.albumid)';
$result = @mysql_query($sql);
	
while ($row = @mysql_fetch_array($result)) {
	$coverfile = substr($row['cover'], 0, (strlen($row['cover'])) - 4) . '_75.jpg';
	if (file_exists('imgs/database/albums-thumbs/' . $coverfile)) {
		array_push($refalbums, '<a href="/a/' . $row['urlname'] . '"><img src="' . '/imgs/database/albums-thumbs/' . $coverfile . '" width="75" height="75" border="0" style="margin: 2px 6px 0 0;" alt="' . $row['title'] . '"></a>');
		}
	else array_push($refalbums, '<a href="/a/' . $row['urlname'] . '"><img src="' . '/imgs/database/albums-thumbs/nocover_75.jpg" width="75" height="75" border="0" style="margin: 2px 6px 0 0;" alt="' . $row['title'] . '"></a>');
// 
	}
$smarty->assign('refalbums', $refalbums);



// ***************************************************** NAJPOPULARNIEJSZE NEWSY
$titles = array();
$added1 = array();

$sql = 'SELECT id, title, viewed, added FROM news ORDER BY viewed DESC LIMIT 10';
$result = @mysql_query($sql);
while ($popularrow = @mysql_fetch_array($result)) {
	array_push($titles, '<a href="/news/' . $popularrow['id'] . '/' . $p . '">' . $popularrow['title'] . '</a> (' . $popularrow['viewed'] . ')');
	array_push($added1,  substr($popularrow['added'], 0, 10));
	}
$smarty->assign('titles', $titles);
$smarty->assign('added1', $added1);

$titles2 = array();
$added2 = array();

$sql = 'SELECT id, title, viewed, added FROM news ORDER BY viewed DESC LIMIT 10,10';
$result = @mysql_query($sql);
while ($popularrow = @mysql_fetch_array($result)) {
	array_push($titles2, '<a href="/news/' . $popularrow['id'] . '/' . $p . '">' . $popularrow['title'] . '</a> (' . $popularrow['viewed'] . ')');
	array_push($added2,  substr($popularrow['added'], 0, 10));
	}
$smarty->assign('titles2', $titles2);
$smarty->assign('added2', $added2);



// ************************************************************** KOMENTARZE	
$sql = 'SELECT comment, addedby, addedbyurlname, added FROM news_comments WHERE aid=' . $id . ' ORDER BY added DESC';
$result = mysql_query($sql);
$smarty->assign('commentcount', @mysql_num_rows($result));

	$comments_list = array();
	$comments_autors_list = array();
	$comments_autor_ids_list = array();
	$comments_dates_list = array();
	
	$ip = $_SERVER['REMOTE_ADDR'];
	$smarty->assign('host', gethostbyaddr($ip));

	while ($row = @mysql_fetch_array($result)) {
		array_push($comments_list, nl2br(htmlspecialchars($row['comment'])));
		array_push($comments_autors_list, $row['addedby']);
		array_push($comments_autor_ids_list, $row['addedbyurlname']);
		array_push($comments_dates_list, show_time_from_timestamp($row['added'], ':') . ', ' . show_normal_date_from_timestamp($row['added']));		
		}	
	$smarty->assign('comments_list', $comments_list);	
	$smarty->assign('comments_autors_list', $comments_autors_list);
	$smarty->assign('comments_autor_ids_list', $comments_autor_ids_list);
	$smarty->assign('comments_dates_list', $comments_dates_list);
	
// ************************************************************* LISTA NEWSOW
$part -= 1;
$part *= $ile_na_stronie;

$news_titles_list = array();
$news_ids_list = array();
$news_dates_list = array();
$news_list = array();
$news_glyphs_list = array();
$news_reads_list = array();
$news_comments_list = array();

$sql = 'SELECT t1.id, t1.news, t1.title, t1.added, t1.expires, t1.graph, t2.login, t1.viewed ' . 
	'FROM news AS t1, users AS t2 ' .
	'WHERE (t2.id=t1.addedby AND t1.id<>"' . $id . '") ' . 
	'ORDER BY t1.added DESC LIMIT 50';
$result = @mysql_query($sql);


while($newsrow = @mysql_fetch_array($result)) {
	array_push($news_dates_list, $newsrow['added']);
	array_push($news_ids_list, $newsrow['id']);
	array_push($news_titles_list, $newsrow['title']);

	
	if ($newsrow['graph'] == '') {
		$img = 'feedodal.jpg';
		}
	else $img= substr($newsrow['graph'], 0, strlen($newsrow['graph']) - 4) . '_glyph.jpg';
	
	array_push($news_glyphs_list, $img);

	array_push($news_list, nl2br(substr($newsrow['news'], 0, 197) . ' ...<a href="/news/' . $newsrow['id']. '" class="rms">>></a>'));
	
	$sql = 'SELECT id FROM news_comments WHERE aid=' . $newsrow['id'];
	$nums = @mysql_num_rows(@mysql_query($sql));
	array_push($news_comments_list, $nums);
		
	array_push($news_reads_list, $newsrow['viewed']);
	}
$smarty->assign('news_dates_list', $news_dates_list);
$smarty->assign('news_titles_list', $news_titles_list);
$smarty->assign('news_glyphs_list', $news_glyphs_list);
$smarty->assign('news_ids_list', $news_ids_list);
$smarty->assign('news_list', $news_list);
$smarty->assign('news_comments_list', $news_comments_list);
$smarty->assign('news_reads_list', $news_reads_list);


$smarty->assign('s', $s);
$smarty->assign('id', $id);

//*****************************************************************	
$smarty->assign('body_template', 'site/news.tpl');
//*****************************************************************
?>
