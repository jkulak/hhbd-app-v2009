<?php

$albumurlname = $id;
$sql = 'SELECT t1.urlname, t1.name, t2.id, t2.title ' . 
	   'FROM artists AS t1, albums AS t2, album_artist_lookup AS t3 ' .
	   'WHERE (t1.id=t3.artistid AND t3.albumid=t2.id AND t2.urlname="' . $albumurlname . '")';	   
	   
$row = @mysql_fetch_array(@mysql_query($sql));

$albumid = $row['id'];
$title = $row['title'];
$artisturlname = $row['urlname'];
$artist = $row['name'];

$smarty->assign('album', '<a href="/album/' . $albumurlname . '">' . $album . '</a>');

$users = array();
$sql = 'SELECT t1.id, t1.login, t1.urlname, t1.allow_collection ' .
	   'FROM users AS t1, collection AS t2 ' .
	   'WHERE (t2.userid=t1.id AND t2.albumid="' . $albumid . '")';

$result = @mysql_query($sql);	   

while($row = @mysql_fetch_array($result)) {
	if ($row['allow_collection'] == 'y') {
		array_push($users, '<a href="/u/' . $row['urlname'] . '/kolekcja">' . $row['login'] . '</a>'); 
		}
	else {
		//mamy usera ktory nie udostepnia swojej listy
		array_push($users, 'prywatna kolekcja');
		}
	}
$smarty->assign ('users', $users);

//*****************************************************************
$smarty->assign ('title', 'HHBD.PL | KOLEKCJA | ' . strtoupper($title));
$smarty->assign ('description', 'hip-hop, hiphop, polski hip-hop, tede, peja, wwo, prosto, umc, mezo, ' . $title);
$smarty->assign ('ctitle', 'kolekcja: ' . $title);
//*****************************************************************	





//*****************************************************************	
$smarty->assign('body_template', 'site/collection.tpl');
//*****************************************************************

?>