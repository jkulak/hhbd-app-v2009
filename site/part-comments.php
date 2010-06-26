<?php

$type_arr = array ('n' => 'artist_comments', 'p' => 'concert_comments', 'news' => 'news_comments', 'a' => 'album_comments', 'l' => 'label_comments');	
$sql = 'SELECT comment, addedby, addedbyurlname, added FROM ' . $type_arr[$s] . ' WHERE aid=' . $id . ' ORDER BY added DESC';
$result = mysql_query($sql);
$smarty->assign('commentcount', @mysql_num_rows($result));

if ($add == 'komentarze') {
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

	}
	
?>