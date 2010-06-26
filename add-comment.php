<?php

/**
 * 
 *
 * @version $Id$
 * @copyright 2005 
 **/ 
 
include ('include/connect-to-database.php');

$id = $_POST['id'];
$type = $_POST['type'];
$urlname = $_POST['urlname'];

$comment = $_POST['comment'];
$addedby = $_POST['addedby'];
$addedbyurlname = $_POST['addedbyurlname'];

$added = date("YmdHis");
$ip = $_SERVER['REMOTE_ADDR'];

if ($addedby == '') {$addedby = '---';}

$type_arr = array (n => 'artist_comments', p => 'concert_comments', news => 'news_comments', a => 'album_comments', l => 'label_comments');

$sql = 'INSERT INTO ' . $type_arr[$type] . ' (comment, aid, ip, addedby, addedbyurlname, added) VALUES ("' . $comment . '", "' . $id . '", "' . $ip . '", "' . $addedby . '", "' . $addedbyurlname . '", "' . $added . '")';
$result = mysql_query($sql);

header('Location: ' . $type . '/' . $urlname . '/komentarze');

?>