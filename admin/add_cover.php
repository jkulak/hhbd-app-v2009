<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
	exit();
    }

include ('template_top.php');
include ('connect_to_database.php');	


function createthumbnail($dstfilename, $srcfilename, $dstsize, $srcsize, $frmcolor){
	$image_p = imagecreatetruecolor($dstsize, $dstsize);
	imagefilledrectangle($image_p, 0, 0, $dstsize, $dstsize, $frmcolor);
	$image = imagecreatefromjpeg($srcfilename);
	imagecopyresampled($image_p, $image, 0, 0, 0, 0, $dstsize, $dstsize, 250, 250);
	imagejpeg($image_p, $dstfilename);
	print ('thumb' . $dstsize . ': ' . $dstfilename . '<BR>');
	
	//print ('<img src="http://www.hhbd.pl' . substr($dstfilename, 32, strlen($dstfilename) - 32) . '"><BR><BR>');
	}

$id = $_POST['albumid'];
$filename = $_FILES['coverfile']['tmp_name'];

print ('Tymczsowa nazwa pliku: ' . $filename . '<BR><BR>');

$sql = 'SELECT title, year, singiel FROM albums WHERE id=' . $id;
$result = mysql_query($sql);
$album = mysql_fetch_array($result);
  
$sql = 'SELECT t1.name FROM artists AS t1, album_artist_lookup AS t2 WHERE (t1.id=t2.artistid AND t2.albumid=' . $id . ')';
$result = mysql_query($sql);
$artist = mysql_fetch_array($result);  
  
$ep = ($album[2] == '1') ? '_(ep)' : ''; 
  
$newfilename = strtolower($artist[0] . '-' . $album[0] . '_(' . $album[1] . ')' . $ep);
$newfilename = strtolower($newfilename);
$toreplace = array(' ', '?', ':', '*', '|', '/', '\\', '"', '<', '>', '\'', '.', ',', '%', '@', '#') ;
$newfilename = str_replace($toreplace, '_', $newfilename);

// ZMIANA POLSKICH LITEREK!
$toreplace = array('±', 'æ', 'ê', '³', 'ñ', 'ó', '¶', '¼', '¿', '¦', '£', '¯');
$replaceto = array('a', 'c', 'e', 'l', 'n', 'o', 's', 'z', 'z', 's', 'l', 'z');  
$newfilename = str_replace($toreplace, $replaceto, $newfilename);
  	

//var_dump( $_SERVER );

$path = '/home/hhbd/domains/hhbd.pl/public_html/';
$newname = $path . 'imgs/database/albums/www_hhbd_pl_' . $newfilename . '.jpg';
$thumb75 = $path . 'imgs/database/albums-thumbs/www_hhbd_pl_' . $newfilename . '_75.jpg';

$newcover = 'www_hhbd_pl_' . $newfilename . '.jpg';
print ('<B>PATH</B>: ' . $path . '<BR>');
print ('<B>NEWNAME</B>: ' . $newname . '<br>');
print ('<B>COVER</B>: ' . $newcover . '<br>');

  
// DODANIE NAZWY OKLADKI DO TABELI ALBUMÓW
$sql = 'UPDATE albums SET cover="' . $newcover . '" WHERE id=' . $id;

if (mysql_query($sql))
	{
    $albumid = mysql_insert_id();
	print ("<BR><B>okladka zostala dodana do bazy!</B><br>");		

	print ('filename: ' . $filename . '<br/>');
	//$newname = $newfilename . '.jpg';
	print ('newname: ' . $newname . '<br/>');	

	    if ( move_uploaded_file($filename, $newname) )
	    {
   		    chmod($newname, 0644);
			print ('skopiowano plik na serwer!<BR><BR><BR>');
			createthumbnail($thumb75, $newname, 75, 250, 0);
			chmod($thumb75, 0644);
			print ('<img src="http://www.hhbd.pl/imgs/database/albums/' . $newcover . '"><BR><BR>');
		}
		else
		{
			print ('Nie skopiowano pliku tam gdzie trzeba...<BR><BR>');
		}	
	
	}
else {
	echo('<P>Nie dodano okladki do bazy! (' . mysql_error() . ')<br>');
	}



include('template_bottom.php');	
?>