<?php

if ($_SESSION['hhbdlogin'] != 'fee') {
	Header ('Location: /');
	exit;
	}

	

// concert_comments', news => 'news_comments', album => 'album_comments', wytwornia => 'label_comments');	
$sql = 'SELECT aid, comment, addedby, addedbyurlname, added FROM artist_comments ORDER BY added DESC';
$result = mysql_query($sql);
$smarty->assign('ncommentcount', @mysql_num_rows($result));
$totalcount += @mysql_num_rows($result);
$comments_list = array();
$comments_autors_list = array();
$comments_autor_ids_list = array();
$comments_dates_list = array();
$comments_aid_list = array();

while ($row = @mysql_fetch_array($result)) {

	$result2 = @mysql_query('SELECT name, urlname FROM artists WHERE id="' . $row['aid'] . '"');
	$row2 = @mysql_fetch_array($result2);	
	array_push($comments_aid_list, '<a href="/n/' . $row2['urlname'] . '" target="_blank">' . strtoupper($row2['name']) . '</a>');	
	array_push($comments_list, nl2br(htmlspecialchars($row['comment'])));
	array_push($comments_autors_list, $row['addedby']);
	array_push($comments_autor_ids_list, $row['addedbyurlname']);
	array_push($comments_dates_list, show_time_from_timestamp($row['added'], ':') . ', ' . show_normal_date_from_timestamp($row['added']));		
	}	
$smarty->assign('comments_aid_list', $comments_aid_list);	
$smarty->assign('comments_list', $comments_list);	
$smarty->assign('comments_autors_list', $comments_autors_list);
$smarty->assign('comments_autor_ids_list', $comments_autor_ids_list);
$smarty->assign('comments_dates_list', $comments_dates_list);


// *******************************************************************************
// * ALBUMY                                                                      *
// *******************************************************************************
$sql = 'SELECT aid, comment, addedby, addedbyurlname, added FROM album_comments ORDER BY added DESC';
$result = mysql_query($sql);
$smarty->assign('acommentcount', @mysql_num_rows($result));
$totalcount += @mysql_num_rows($result);
$comments_a_list = array();
$comments_a_autors_list = array();
$comments_a_autor_ids_list = array();
$comments_a_dates_list = array();
$comments_a_aid_list = array();
while ($row = @mysql_fetch_array($result)) {
	$result2 = mysql_query('SELECT title, urlname FROM albums WHERE id="' . $row['aid'] . '"');
	$row2 = mysql_fetch_array($result2);	
	array_push($comments_a_aid_list, '<a href="/a/' . $row2['urlname'] . '" target="_blank">' . strtoupper($row2['title']) . '</a>');	

	array_push($comments_a_list, nl2br(htmlspecialchars($row['comment'])));
	array_push($comments_a_autors_list, $row['addedby']);
	array_push($comments_a_autor_ids_list, $row['addedbyurlname']);
	array_push($comments_a_dates_list, show_time_from_timestamp($row['added'], ':') . ', ' . show_normal_date_from_timestamp($row['added']));		
	}	
$smarty->assign('comments_a_aid_list', $comments_a_aid_list);	
$smarty->assign('comments_a_list', $comments_a_list);	
$smarty->assign('comments_a_autors_list', $comments_a_autors_list);
$smarty->assign('comments_a_autor_ids_list', $comments_a_autor_ids_list);
$smarty->assign('comments_a_dates_list', $comments_a_dates_list);
// *******************************************************************************
// *******************************************************************************
// *******************************************************************************




// *******************************************************************************
// * NEWSY                                                                       *
// *******************************************************************************
$sql = 'SELECT aid, comment, addedby, addedbyurlname, added FROM news_comments ORDER BY added DESC';
$result = mysql_query($sql);
$smarty->assign('newscommentcount', @mysql_num_rows($result));
$totalcount += @mysql_num_rows($result);
$comments_news_list = array();
$comments_news_autors_list = array();
$comments_news_autor_ids_list = array();
$comments_news_dates_list = array();
$comments_news_aid_list = array();
while ($row = @mysql_fetch_array($result)) {
	$result2 = mysql_query('SELECT title FROM news WHERE id="' . $row['aid'] . '"');
	$row2 = mysql_fetch_array($result2);	
	array_push($comments_news_aid_list, '<a href="/news/' . $row['aid'] . '" target="_blank">' . strtoupper($row2['title']) . '</a>');	

	array_push($comments_news_list, nl2br(htmlspecialchars($row['comment'])));
	array_push($comments_news_autors_list, $row['addedby']);
	array_push($comments_news_autor_ids_list, $row['addedbyurlname']);
	array_push($comments_news_dates_list, show_time_from_timestamp($row['added'], ':') . ', ' . show_normal_date_from_timestamp($row['added']));		
	}	
$smarty->assign('comments_news_aid_list', $comments_news_aid_list);	
$smarty->assign('comments_news_list', $comments_news_list);	
$smarty->assign('comments_news_autors_list', $comments_news_autors_list);
$smarty->assign('comments_news_autor_ids_list', $comments_news_autor_ids_list);
$smarty->assign('comments_news_dates_list', $comments_news_dates_list);
// *******************************************************************************
// *******************************************************************************
// *******************************************************************************




// *******************************************************************************
// * KONCERTY                                                                    *
// *******************************************************************************
$sql = 'SELECT aid, comment, addedby, addedbyurlname, added FROM concert_comments ORDER BY added DESC';
$result = mysql_query($sql);
$smarty->assign('pcommentcount', @mysql_num_rows($result));
$totalcount += @mysql_num_rows($result);
$comments_p_list = array();
$comments_p_autors_list = array();
$comments_p_autor_ids_list = array();
$comments_p_dates_list = array();
$comments_p_aid_list = array();
while ($row = @mysql_fetch_array($result)) {
	$result2 = mysql_query('SELECT title, urlname FROM concerts WHERE id="' . $row['aid'] . '"');
	$row2 = mysql_fetch_array($result2);	
	array_push($comments_p_aid_list, '<a href="/news/' . $row2['urlname'] . '" target="_blank">' . strtoupper($row2['title']) . '</a>');	

	array_push($comments_p_list, nl2br(htmlspecialchars($row['comment'])));
	array_push($comments_p_autors_list, $row['addedby']);
	array_push($comments_p_autor_ids_list, $row['addedbyurlname']);
	array_push($comments_p_dates_list, show_time_from_timestamp($row['added'], ':') . ', ' . show_normal_date_from_timestamp($row['added']));		
	}	
$smarty->assign('comments_p_aid_list', $comments_p_aid_list);	
$smarty->assign('comments_p_list', $comments_p_list);	
$smarty->assign('comments_p_autors_list', $comments_p_autors_list);
$smarty->assign('comments_p_autor_ids_list', $comments_p_autor_ids_list);
$smarty->assign('comments_p_dates_list', $comments_p_dates_list);
// *******************************************************************************
// *******************************************************************************
// *******************************************************************************



$smarty->assign('totalcount', $totalcount);

//*****************************************************************	
$smarty->assign('sectiontitle', 'KOmentarze');
$smarty->assign('title', 'HHBD.PL | KOMENTARZE');
$smarty->assign('ctitle', 'komentarze');
$smarty->assign('body_template', 'sys/comments.tpl');
//*****************************************************************

?>