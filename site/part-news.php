<?php

$type_arr = array ('n' => 'news_artist_lookup', 'p' => 'news_concert_lookup', 'a' => 'news_album_lookup', 'l' => 'news_label_lookup');	
$column_arr = array ('n' => 'artistid', 'p' => 'concertid', 'a' => 'albumid', 'l' => 'labelid');	

$sql = 'SELECT t1.title, t1.id, t1.addedby, t1.added, t1.news ' . 
	   'FROM news AS t1, ' . $type_arr[$s]. ' AS t2 ' .
	   'WHERE (t2.' . $column_arr[$s] . ' ="' . $id . '" AND t2.newsid=t1.id) ' .
	   'ORDER BY added DESC LIMIT 10 ';

$result = @mysql_query($sql);
if (@mysql_num_rows($result)) {
	$smarty->assign ('show_news_tab', 1);
	if (!isset($add)) {
		$add = 'newsy';
		}
	}	
if ($add == 'newsy') {
	$news_titles_list = array();
	$news_list = array();
	$news_ids_list = array();
	$news_added_list = array();
	$news_addedby_list = array();
	while($newsrow = @mysql_fetch_array($result)){
		array_push($news_list, substr($newsrow['news'], 0, 100) . '...');
		array_push($news_titles_list, $newsrow['title']);
		array_push($news_ids_list, $newsrow['id']);
		array_push($news_added_list, $newsrow['added']);
		array_push($news_addedby_list, $newsrow['addedby']);
		}
	$smarty->assign('news_list', $news_list);
	$smarty->assign('news_titles_list', $news_titles_list);
	$smarty->assign('news_ids_list', $news_ids_list);
	$smarty->assign('news_added_list', $news_added_list);
	$smarty->assign('news_addedby_list', $news_addedby_list);
	}
	
?>