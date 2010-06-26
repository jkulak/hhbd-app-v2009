<?php

/**
 * 
 *
 * @version $Id$
 * @copyright 2005 
 **/ 
 
include ('include/connect-to-database.php');

$title = $_POST['title'];
$albumid = $_POST['id'];

$review = $_POST['review'];
$addedby = $_POST['addedby'];
$addedbyurlname = $_POST['addedbyurlname'];

$added = date("YmdHis");
$ip = $_SERVER['REMOTE_ADDR'];

$sql = 'INSERT INTO album_reviews (title, review, albumid, addedby, added) VALUES ("' . $title . '","' . $review . '","' . $albumid . '", "' . $addedby . '", "' . $added . '")';
$result = @mysql_query($sql);



header('Location: /mojprofil/recenzje');

?>