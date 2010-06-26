<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
	exit();
    }

include ('template_top.php');
include ('connect_to_database.php');	

$id = $_POST['id'];
$filename = $_FILES['label_logo']['tmp_name'];

print ('Tymczsowa nazwa pliku: ' . $filename . '<BR><BR>');

$sql = 'SELECT name FROM labels WHERE id=' . $id;
$result = mysql_query($sql);
$labelrow = mysql_fetch_array($result);
$name = $labelrow['name'];
  
$newfilename = strtolower($name . '-logo');
$toreplace = array(' ', '?', ':', '*', '|', '/', '\\', '"', '<', '>', '\'', '.', ',') ;
$newfilename = str_replace($toreplace, '_', $newfilename);

// ZMIANA POLSKICH LITEREK!
$toreplace = array('±', 'æ', 'ê', '³', 'ñ', 'ó', '¶', '¼', '¿', '¦', '£', '¯');
$replaceto = array('a', 'c', 'e', 'l', 'n', 'o', 's', 'z', 'z', 's', 'l', 'z');  
$newfilename = str_replace($toreplace, $replaceto, $newfilename);
  	
$path = dirname( $_SERVER['PATH_TRANSLATED'] );
$path = substr($path, 0, -5);
$newname = $path . 'imgs/database/labels/www_hhbd_pl_' . $newfilename . '.jpg';
$newcover = 'www_hhbd_pl_' . $newfilename . '.jpg';
print ('<B>PATH</B>: ' . $path . '<BR>');
print ('<B>NEWNAME</B>: ' . $newname . '<br>');
print ('<B>LOGO</B>: ' . $newcover . '<br>');

  
// DODANIE NAZWY OKLADKI DO TABELI ALBUMÓW
$sql = 'UPDATE labels SET logo="' . $newcover . '" WHERE id=' . $id;

if (mysql_query($sql)) {
    $albumid = mysql_insert_id();
	print ("<BR><B>logo zostalo dodane do bazy!</B><br>");		

    if (move_uploaded_file($filename,$newname)) {
		print ('skopiowano plik na serwer!<BR><BR><BR>');
		print ('<img src="http://www.hhbd.pl/' . 'imgs/database/labels/' . $newcover . '"><BR><BR>');
		}
	else {
		print ('Nie skopiowano pliku tam gdzie trzeba...<BR><BR>');
		}	
	
	}
else {
	echo('<P>Nie dodano loga do bazy! (' . mysql_error() . ')<br>');
	}



include('template_bottom.php');	
?>