<?php

session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
	exit();
    }

  include ('template_top.php');
  include ('connect_to_database.php');	  
  include ('functions.php');  
  include ('include/functions.php'); 
  
  function goback(){ 
   print ("<a href=\"add_album_form.php?artist=$_GET[artist]&artist1id=$_GET[artist_list]&" . 
   "label=$_GET[label]&labelid=$_GET[label_list]&title=$_GET[title]&songcount=$_GET[songcount]&" .
   "date=$_GET[date]&addedby=$_GET[addedby]&artist2=$_GET[artist2]&artist2id=$_GET[artist_list2]&" . 
   "ep=$_GET[ep]&lp=$_GET[lp]&mc=$_GET[mc]&cd=$_GET[cd]&artist3=$_GET[artist3]&artist3id=$_GET[artist_list3]" .
   "\">Popraw</a>");
   }  
   
  $description = nl2br($_GET['description']);
  $premier = $_GET['premier'];
 
  
  //sprawdzanie poprawnosci danych
  if ($_GET[title] == "") {
    print ("<b>Brak nazwy albumu!</b><br>");
	goback();
    include('template_bottom.php');
	exit();
	}
	

  // wykonawca
  $artist1id = $_GET['artistid1']; 
  $artist2id = $_GET['artistid2']; 
  $artist3id = $_GET['artistid3'];   
  
  if (($artist1id == "") && ($artist2id == "") && ($artist3id == "")) {
    if (($_GET[artist] == "") && ($_GET[artist2] == "") && ($_GET[artist3] == "") ) {
      print ("<b>Brak wykonawcy! Wybierz chociaz jednego!</b><br>");
	  goback();
      include('template_bottom.php');
	  exit(); 
      }
	else {
	  $artist1id = GetArtistid($_GET['artist']);
	  $artist2id = GetArtistid($_GET['artist2']);
	  $artist3id = GetArtistid($_GET['artist3']);
	  }
	}
	

  // wytwornia
  $labelid = $_GET['labelid']; 
  if ($labelid == '') {
    if ($_GET['label'] == "") {
      print ("<b>Brak wytwórni!</b><br>");
	  goback();
      include('template_bottom.php');
	  exit(); 
      }
	else {
	  $labelid = Getlabelid($_GET['label']);
	  }
	}
	  
  // data premiery
  if ($_GET['year'] == "") {
    print ("<b>Brak daty premiery!</b><br>");
	goback();
    include('template_bottom.php');
	exit();
	}
   
  
  //ep=1
   if ($_GET[ep] == 1) {
     $ep = 1;
	 }
   else {
     $ep = 0;
	 }
   
  //mc=1
   if ($_GET[mc] == 1) {
     $mc = 1;
	 }
   else {
     $mc = 0;
	 }   

  //cd=1
   if ($_GET[cd] == 1) {
     $cd = 1;
	 }
   else {
     $cd = 0;
	 }   

  //lp=1
   if ($_GET[lp] == 1) {
     $lp = 1;
	 }
   else {
     $lp = 0;
	 }  
	 
  if ($lp == 0 && $mc == 0 && $cd == 0) {
    print ("<b>Zaznacz chocia¿ jeden nosnik na ktorym plyta zostala wydana!</b><br>");
	goback();
    include('template_bottom.php');
	exit();
	}
  
  $data_dodania = date("YmdHis");  
  
  //jezeli tutaj doszlimy, to znaczy ze wszystkie dane w porzadku
  if (($artist1id == -1) && ($_GET[artist] != "")) {
    $sql = "INSERT INTO artists (name, added, addedby) VALUES ('$_GET[artist]', '$data_dodania', '" . $_SESSION['userid'] . "')";
    $result = mysql_query($sql);
	if ($result) {
	  print ("Dodano do bazy nowego wykonawcê: '$_GET[artist]'<BR><BR>");
      $artist1id = mysql_insert_id();
      }
	else {
      print ("Nie dodano wykonawcy: '$_GET[artist]' (" . mysql_error() . ")<BR>");
	  }
	}
	
  if (($artist2id == -1) && ($_GET[artist2] != "")) {
    $sql = "INSERT INTO artists (name, added, addedby) VALUES ('$_GET[artist2]', '$data_dodania', '" . $_SESSION['userid'] . "')";
    $result = mysql_query($sql);
	if ($result) {
	  print ("Dodano do bazy nowego wykonawcê: '$_GET[artist2]'<BR><BR>");
      $artist2id = mysql_insert_id();
      }
	else {
      print ("Nie dodano wykonawcy: '$_GET[artist2]' (" . mysql_error() . ")<BR>");
	  }
	}
	
  if (($artist3id == -1) && ($_GET[artist3] != "")) {
    $sql = "INSERT INTO artists (name, added, addedby) VALUES ('$_GET[artist3]', '$data_dodania', '" . $_SESSION['userid'] . "')";
    $result = mysql_query($sql);
	if ($result) {
	  print ("Dodano do bazy nowego wykonawcê: '$_GET[artist3]'<BR><BR>");
      $artist3id = mysql_insert_id();
      }
	else {
      print ("Nie dodano wykonawcy: '$_GET[artist3]' (" . mysql_error() . ")<BR>");
	  }
	}		
	
	
  if ($labelid == -1) {
    $sql = "INSERT INTO labels (name, added, addedby) VALUES ('$_GET[label]', '$data_dodania', '" . $_SESSION['userid'] . "')";
    $result = mysql_query($sql);
	if ($result) {
	  print ("Dodano do bazy now¹ wytwórniê: '$_GET[label]'<BR><BR>");
	  $labelid = mysql_insert_id();
      }
	else {
	  print ("Nie dodano wytwórni: '$_GET[label]' (" . mysql_error() . ")<BR>");
	  }
	}	
	

  print ("Tytu³: '$_GET[title]'<BR>");
  $artist = GetArtistName($artist1id); 
  print ("Wykonawca1: '$artist' (id: $artist1id)<BR>");
  $artist2 = GetArtistName($artist2id); 
  print ("Wykonawca2: '$artist2' (id: $artist2id)<BR>");
  $artist3 = GetArtistName($artist3id); 
  print ("Wykonawca3: '$artist3' (id: $artist3id)<BR>");
  $label = GetLabelName($labelid);  
  print ("Wytwórnia: '$label' (id: $labelid)<BR>");  
  print ("Data premiery: $_GET[year]<BR>");
  print ("Na kasecie: " . ($mc == 1 ? 'Tak' : 'Nie') . "<BR>");
  print ("Na CD: " . ($cd == 1 ? 'Tak' : 'Nie') . "<BR>");
  print ("Na winylu: " . ($lp == 1 ? 'Tak' : 'Nie') . "<BR>");
  print ("Singiel: " . ($ep == 1 ? 'Tak' : 'Nie') . "<Br>");
  print ('Numer katalogowy CD: ' . $_GET['cdcatalog'] . '<br>');
  print ('Numer katalogowy LP: ' . $_GET['lpcatalog'] . '<br>');
  print ('Numer katalogowy MC: ' . $_GET['mccatalog'] . '<br>');    
  print ("Edytowany przez: " . $_SESSION['userid'] . "<BR>");
  print ("Edytowany: $data_dodania<br>");

  	  print ('albumid: ' . $_GET[id] . '<br>');
	  
  
  $sql = "UPDATE albums SET title='$_GET[title]', urlname='" . create_urlname($_GET[title], 1, 1) . "', labelid='$labelid', year='$_GET[year]', media_mc=$mc, media_cd=$cd, " .
	"media_lp=$lp, singiel=$ep, updatedby=$_SESSION[userid], updated=$data_dodania, catalog_cd='$_GET[cdcatalog]', " .
	"catalog_lp='$_GET[lpcatalog]', catalog_mc='$_GET[mccatalog]', epfor='$_GET[epforid]', description='$description' , premier='$premier'" .
	"WHERE id=$_GET[id]";
			 
      if (mysql_query($sql)) {
        print ("<BR><BR><B>Album '$_GET[title]' zostal update'owany, id: $_GET[id] </B><br><br>");		
      } else {
        echo("<P>Nie update'owano albumu '$_GET[title]' (" . mysql_error() . ")<br>");
      }
	  


// kasowanie wszystkich powiazan
  $sql = "DELETE FROM album_artist_lookup WHERE albumid=$_GET[id]";
  mysql_query($sql);
  
  
  // dodanie powiazania album - artist 1
  if (($artist1id != -1) && ($artist1id != '')) {
    $sql = "INSERT INTO album_artist_lookup (artistid, albumid) VALUES (" .
          "'$artist1id', '$_GET[id]')";
    if (mysql_query($sql)) {
        print ("Dodane powiazanie: artist1: $artist1id, albumid: $_GET[id]<br>");		
      } else {
        echo("<P>Nie dodano powiazania!' (" . mysql_error() . ")<br>");
      }			  
	}	
	
  // dodanie powiazania album - artist 2
  if (($artist2id != -1) && ($artist2id != '')) {
    $sql = "INSERT INTO album_artist_lookup (artistid, albumid) VALUES (" .
          "'$artist2id', '$_GET[id]')";
    if (mysql_query($sql)) {
        print ("<BR>Dodane powiazanie: artist2: $artist2id, albumid: $_GET[id]<br>");		
      } else {
        echo("<P>Nie dodano powiazania!' (" . mysql_error() . ")<br>");
      }			  
	}	
	
  // dodanie powiazania album - artist 3
  if (($artist3id != -1) && ($artist3id != '')) {
    $sql = "INSERT INTO album_artist_lookup (artistid, albumid) VALUES (" .
          "'$artist3id', '$_GET[id]')";
    if (mysql_query($sql)) {
        print ("<BR>Dodane powiazanie: artist3: $artist3id, albumid: $_GET[id]<br>");		
      } else {
        echo("<P>Nie dodano powiazania!' (" . mysql_error() . ")<br>");
      }			  
	}			

  print ("<a href=\"add_song_form.php?addedby=$_GET[addedby]&artist1id=$artist1id&artist2id=$artist2id&artist3id=$artist3id&track=1&albumid=" . mysql_insert_id() . "\">Dodaj piosenki</a><br>");
  
  
  include('template_bottom.php');	  
?>