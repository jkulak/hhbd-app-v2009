<?php

session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
	exit();
    }

include ('template_top.php');
include ('connect_to_database.php');	  
include ('functions.php');  

include ('include/urlname-functions.php');
  
function goback(){ 
	print ("<a href=\"add_price_form.php?file=$_POST[file]&albumid=$_POST[albumid]&" . 
	"\">Popraw</a>");
	}  
   
$file = $_FILES['myfile']['tmp_name'];
$albumid = $_POST['albumid'];

print ('plik: ' . $file . '<BR>');
print ('id albumu: ' . $albumid . '<BR>');    

$songs = file($file); 
foreach ($songs as $line_num => $song) {  

	// usuniecie wszelkich znakow konca wiersza
	$song = rtrim($song);

	
	$pos = strpos($song, '.');
	$track = substr($song, 0, $pos );
	print ('track#: ' . $track . ' ');
	$song = substr($song, $pos + 2, strlen($song) - $pos - 2);
	
	$pos = strpos($song, '(');
	$title = substr($song, 0, $pos - 1);
	$toreplace = array('[', ']');
	$replaceto = array('(', ')');
	$title = str_replace($toreplace, $replaceto, $title);
	
	print ('tytu�: ' . $title . ' ');
	$length = substr($song, $pos + 1,strlen($song) - $pos);
	print ('czas: ' . $length . '<BR>'); 
	$length = substr($length,2,2)  +  substr($length, 0, strpos($length, ':')) * 60; 
	print ('sekund: ' . $length . '<BR>');
	
	
	$toreplace = array('�', '�', '�', '�', '�', '�');
	$replaceto = array('�', '�', '�', '�', '�', '�');
	$title = str_replace($toreplace, $replaceto, $title);
	
	$data_dodania = date("YmdHis");  
	$sql = 'INSERT INTO songs (title, urlname, length, added, addedby) VALUES ("' . $title . '","' . create_urlname($title, 1, 1) . '", ' . $length . 
	', \'' . $data_dodania . '\', ' . $_SESSION['userid'] . ')';
	
	if ($result = mysql_query($sql)) {
		print ('track: ' . $track . ' dodany<BR>');
		$songid = mysql_insert_id();
		//$track = ($line_num + 1);
		$sql = "INSERT INTO album_lookup (albumid, songid, track) VALUES (" .
               "'$albumid', '$songid', '$track')";
	
		if (mysql_query($sql)) {
    		print ("<BR>Dodane powiazanie: albumid: $albumid, songid: $songid <br>");		
			}
		else {
    		echo("<P>Nie dodano powiazania!' (" . mysql_error() . ")<br>");
			}				
		}
	}
	
	 
  
include('template_bottom.php');	  

?>