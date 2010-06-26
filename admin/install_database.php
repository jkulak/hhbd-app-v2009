<?php

//session_start();
//if (!isset($_SESSION['username'])) {
//    header("Location: index.php");
//	exit();
//    }

  include ('template_top.php');

  // skrypt instalujacy baze danych na serwerze
  
  //laczenie z baza danych na serwerze
  
  $sql = @mysql_pconnect("localhost", "fee", "f33del");
  if (!$sql) {
    print ("Nie mozna sie polaczyc z baza. (" . mysql_error() . ")<BR>");
    exit();
    }
  else {
	print ("Polaczono z baza danych.<BR>");
	}
	  
  // tworzenie bazy danych
  
  $nazwa_bazy = "hhbd";

  $sql = "CREATE DATABASE $nazwa_bazy";
  if ( mysql_query($sql) ) {
    echo("Baza '$nazwa_bazy' zostala utworzona.<br>");
 	}
  else {
  	echo("Nie mozna utworzyc bazy '$nazwa_bazy' (" . mysql_error() . ")<br>");
 	}
  
  // otwieranie bazy danych do edycji

  if (! @mysql_select_db($nazwa_bazy) ) {
    print ("Nie mozna odnalezc bazy: $nazwa_bazy (" . mysql_error() . ")<br>");
    exit();
	}
  else {
	print ("Otworzono baze: '$nazwa_bazy' do edycji<br>");
	}
	  
  //tworzenie tabeli albumow
  
  $nazwa_tabeli = "albums";

// tytul, wykonawca, wytwornia, rok wydania, ilosc piosenek,
// okladka tyl, przod, ew. obrazek z plyty, data dodania do bazy
// nosniki na jakich wydana byla, czy legalna

  $sql = "CREATE TABLE $nazwa_tabeli ( " .
    "id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, " .
    "title TINYTEXT, " .
	"labelid INT, " .
	"year DATE, " .
	"media_mc BOOL, " .
	"catalog_mc TINYTEXT, " .	
	"media_cd BOOL, " .
	"catalog_cd TINYTEXT, " .
	"media_lp BOOL, " .		
	"catalog_lp TINYTEXT, " .
	"singiel BOOL, " .	
	"addedby INT, " .	
	"added DATETIME, " .
	"updatedby INT, " .		
	"updated DATETIME, " .	
	"viewed INT NOT NULL, " . 
    "cover TINYTEXT, " .	
	'status INT NOT NULL DEFAULT \'999\'' . 
    ")"; // tytul nie jest UNIQUE, bo dwa zespoly moga miec taki sam tytul
	
  if ( mysql_query($sql) ) {
    echo("Tabela '$nazwa_tabeli' zostala utworzona.<br>");
    }
  else {
  	echo("Nie mozna utworzyc tabeli: '$nazwa_tabeli' (" . mysql_error() . ")<br>");
	}	
	
	
$nazwa_tabeli = 'album_label_lookup';

$sql = 'CREATE TABLE ' . $nazwa_tabeli . ' ('  .
	'albumid INT, ' .
	'labelid INT ' .
    ')';
	
  if ( mysql_query($sql) ) {
    echo("Tabela '$nazwa_tabeli' zostala utworzona.<br>");
    }
  else {
  	echo("Nie mozna utworzyc tabeli: '$nazwa_tabeli' (" . mysql_error() . ")<br>");
	}		
	
	
	
  // tworzenie tabeli wykonawcow (id, nazwa, adres strony http)

  $nazwa_tabeli = "artists";

  $sql = "CREATE TABLE $nazwa_tabeli ( " .
    "id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, " .
    "name VARCHAR(250), " .
    "realname TINYTEXT, " .
	"website TINYTEXT, " .
	'concertinfo TEXT, ' .
	"since DATE, " .
	"till DATE, " .	
	"band BOOL, " .
	"addedby INT, " .	
	"added DATETIME, " .
	"updatedby INT, " .			
	"updated DATETIME, " .	 	
	"viewed INT NOT NULL, " .	
    "UNIQUE (name))";
	
  if ( mysql_query($sql) ) {
    echo("Tabela '$nazwa_tabeli' zostala utworzona.<br>");
	}
  else {
  	echo("Nie mozna utworzyc tabeli: '$nazwa_tabeli' (" . mysql_error() . ")<br>");
	}

	
  // tworzenie tabeli wydawnictw (id, nazwa, adres strony http)
	
  $nazwa_tabeli = "labels";

  $sql = "CREATE TABLE $nazwa_tabeli ( " .
    "id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, " .
    "name VARCHAR(250), " .
	"website TINYTEXT, " .
    "email TINYTEXT, " .	
	"addres TINYTEXT, " .	
	"addedby INT, " .	
 	"added DATETIME, " .	
	"updatedby INT, " .			
	"updated DATETIME, " .		
	"viewed INT NOT NULL, " .	
    "UNIQUE (name))";
	
	
  if ( mysql_query($sql) ) {
    echo("Tabela '$nazwa_tabeli' zostala utworzona.<br>");
	}
  else {
  	echo("Nie mozna utworzyc tabeli: '$nazwa_tabeli' (" . mysql_error() . ")<br>");
	}
	
	
 	
  // tworzenie tabeli utworow (id, tytul, albumid, czas trwania, bpm, 	
  
  $nazwa_tabeli = "songs";

  $sql = "CREATE TABLE $nazwa_tabeli ( " .
    "id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, " .
    "title TINYTEXT, " .
	"length INT, " .
	"bpm FLOAT, " .
	"acapella BOOL, " .
	"radio BOOL, " .
	"instrumental BOOL, " .
	"addedby INT, " .	
	"added DATETIME, " .
	"updatedby INT, " .			
	"updated DATETIME, " .	
	"viewed INT NOT NULL " .	 
    ")";	
	
  if ( mysql_query($sql) ) {
    echo("Tabela '$nazwa_tabeli' zostala utworzona.<br>");
	}
  else {
  	echo("Nie mozna utworzyc tabeli: '$nazwa_tabeli' (" . mysql_error() . ")<br>");
	}
	
  // tworzenie tabeli powiazan piosenek i albumow (idalbumu, idpiosenki)
	
  $nazwa_tabeli = "album_lookup";

  $sql = "CREATE TABLE $nazwa_tabeli ( " .
    "songid INT NOT NULL, " .
    "albumid INT NOT NULL, " .	
    "track INT NOT NULL " .
    ")";	
	
  if ( mysql_query($sql) ) {
    echo("Tabela '$nazwa_tabeli' zostala utworzona.<br>");
	}
  else {
  	echo("Nie mozna utworzyc tabeli: '$nazwa_tabeli' (" . mysql_error() . ")<br>");
	}
		
  // tworzenie tabeli powiazan featuringow (idwykonawcy, idpiosenki)
	
  $nazwa_tabeli = "feature_lookup";

  $sql = "CREATE TABLE $nazwa_tabeli ( " .
    "songid INT NOT NULL, " .
    "artistid INT NOT NULL, " .
	"feattype INT NOT NULL " .
    ")";	
	
  if ( mysql_query($sql) ) {
    echo("Tabela '$nazwa_tabeli' zostala utworzona.<br>");
	}
  else {
  	echo("Nie mozna utworzyc tabeli: '$nazwa_tabeli' (" . mysql_error() . ")<br>");
	}
	
	
  // tworzenie tabeli powiazan wykonawcow (idwykonawcy, idpiosenki)
	
  $nazwa_tabeli = "artist_lookup";

  $sql = "CREATE TABLE $nazwa_tabeli ( " .
    "songid INT NOT NULL, " .
    "artistid INT NOT NULL " .
    ")";	

  if ( mysql_query($sql) ) {
    echo("Tabela '$nazwa_tabeli' zostala utworzona.<br>");
	}
  else {
  	echo("Nie mozna utworzyc tabeli: '$nazwa_tabeli' (" . mysql_error() . ")<br>");
	}
	
  // tworzenie tabeli powiazan autorow muzyki (idautoramuzyki, idpiosenki)
	
  $nazwa_tabeli = "music_lookup";

  $sql = "CREATE TABLE $nazwa_tabeli ( " .
    "songid INT NOT NULL, " .
    "artistid INT NOT NULL " .
    ")";	

  if ( mysql_query($sql) ) {
    echo("Tabela '$nazwa_tabeli' zostala utworzona.<br>");
	}
  else {
  	echo("Nie mozna utworzyc tabeli: '$nazwa_tabeli' (" . mysql_error() . ")<br>");
	}
	
	
  // tworzenie tabeli powiazan autorow scratchy (idscratch, idpiosenki)
	
  $nazwa_tabeli = "scratch_lookup";

  $sql = "CREATE TABLE $nazwa_tabeli ( " .
    "songid INT NOT NULL, " .
    "artistid INT NOT NULL " .
    ")";	

  if ( mysql_query($sql) ) {
    echo("Tabela '$nazwa_tabeli' zostala utworzona.<br>");
	}
  else {
  	echo("Nie mozna utworzyc tabeli: '$nazwa_tabeli' (" . mysql_error() . ")<br>");
	}		
	
  // tworzenie tabeli powiazan wykonawcow (idwykonawcy, idpiosenki)
	
  $nazwa_tabeli = "album_artist_lookup";

  $sql = "CREATE TABLE $nazwa_tabeli ( " .
    "albumid INT NOT NULL, " .
    "artistid INT NOT NULL " .
    ")";	
	
  if ( mysql_query($sql) ) {
    echo("Tabela '$nazwa_tabeli' zostala utworzona.<br>");
	}
  else {
  	echo("Nie mozna utworzyc tabeli: '$nazwa_tabeli' (" . mysql_error() . ")<br>");
	}	
	
	
  // tworzenie tabeli powiazan wykonawcow (idwykonawcy, idpiosenki)
	
  $nazwa_tabeli = "city_artist_lookup";

  $sql = "CREATE TABLE $nazwa_tabeli ( " .
    "cityid INT NOT NULL, " .
    "artistid INT NOT NULL " .
    ")";	
	
  if ( mysql_query($sql) ) {
    echo("Tabela '$nazwa_tabeli' zostala utworzona.<br>");
	}
  else {
  	echo("Nie mozna utworzyc tabeli: '$nazwa_tabeli' (" . mysql_error() . ")<br>");
	}		
	

  // tworzenie tabeli powiazan wykonawcow (idwykonawcy, idpiosenki)
	
  $nazwa_tabeli = "city_label_lookup";

  $sql = "CREATE TABLE $nazwa_tabeli ( " .
    "cityid INT NOT NULL, " .
    "labelid INT NOT NULL " .
    ")";	
	
  if ( mysql_query($sql) ) {
    echo("Tabela '$nazwa_tabeli' zostala utworzona.<br>");
	}
  else {
  	echo("Nie mozna utworzyc tabeli: '$nazwa_tabeli' (" . mysql_error() . ")<br>");
	}		

	

  // tworzenie tabeli powiazan remiksow (idwykonawcy, idpiosenki)
	
  $nazwa_tabeli = "remix_lookup";

  $sql = "CREATE TABLE $nazwa_tabeli ( " .
    "songid INT NOT NULL, " .
    "artistid INT NOT NULL " .
    ")";	
	
  if ( mysql_query($sql) ) {
    echo("Tabela '$nazwa_tabeli' zostala utworzona.<br>");
	}
  else {
  	echo("Nie mozna utworzyc tabeli: '$nazwa_tabeli' (" . mysql_error() . ")<br>");
	}	
	

  // tworzenie tabeli powiazan teledyskow i wytworni (idwytworni, idpiosenki)
  $nazwa_tabeli = "clip_lookup";
  $sql = "CREATE TABLE $nazwa_tabeli ( " .
    "songid INT NOT NULL, " .
    "clipid INT NOT NULL " .
    ")";	
	
  if ( mysql_query($sql) ) {
    echo("Tabela '$nazwa_tabeli' zostala utworzona.<br>");
	}
  else {
  	echo("Nie mozna utworzyc tabeli: '$nazwa_tabeli' (" . mysql_error() . ")<br>");
	}		
	
	
  /* tworzenie tabeli powiazan wytworni (albumid, labelid)
  $nazwa_tabeli = "labels_lookup";
  $sql = "CREATE TABLE $nazwa_tabeli ( " .
    "albumid INT NOT NULL, " .
    "labelid INT NOT NULL " .
    ")";	
	
  if ( mysql_query($sql) ) {
    echo("Tabela '$nazwa_tabeli' zostala utworzona.<br>");
	}
  else {
  	echo("Nie mozna utworzyc tabeli: '$nazwa_tabeli' (" . mysql_error() . ")<br>");
	}		
	* 
	
	*/
	
  // tworzenie tabeli powiazan wykonawcow i zespolow (artistid, bandid (artist))
  $nazwa_tabeli = "band_lookup";
  $sql = "CREATE TABLE $nazwa_tabeli ( " .
    "artistid INT NOT NULL, " .
    "bandid INT NOT NULL, " .
	"insince DATE, " .
	"awaysince DATE " .
    ")";	
	
  if ( mysql_query($sql) ) {
    echo("Tabela '$nazwa_tabeli' zostala utworzona.<br>");
	}
  else {
  	echo("Nie mozna utworzyc tabeli: '$nazwa_tabeli' (" . mysql_error() . ")<br>");
	}		


  // tworzenie tabeli pseudownimow (artistid, altname)
  $nazwa_tabeli = "altnames_lookup";
  $sql = "CREATE TABLE $nazwa_tabeli ( " .
    "artistid INT NOT NULL, " .
    "altname TINYTEXT " .
    ")";	
	
  if ( mysql_query($sql) ) {
    echo("Tabela '$nazwa_tabeli' zostala utworzona.<br>");
	}
  else {
  	echo("Nie mozna utworzyc tabeli: '$nazwa_tabeli' (" . mysql_error() . ")<br>");
	}	
				
  // tworzenie tabeli typow featuringow (id, feattype)
  $nazwa_tabeli = "feattypes";
  $sql = "CREATE TABLE $nazwa_tabeli ( " .
    "id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, " .
    "feattype TINYTEXT " .
    ")";	
	
  if ( mysql_query($sql) ) {
    echo("Tabela '$nazwa_tabeli' zostala utworzona.<br>");
	}
  else {
  	echo("Nie mozna utworzyc tabeli: '$nazwa_tabeli' (" . mysql_error() . ")<br>");
	}			
	
 // tworzenie tabeli typow featuringow (id, feattype)
  $nazwa_tabeli = "cities";
  $sql = "CREATE TABLE $nazwa_tabeli ( " .
    "id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, " .
    "name TINYTEXT, " .
    "addedby INT, " .	
	"added DATETIME, " .
	"updatedby INT, " .			
	"updated DATETIME, " .	 	
	"viewed INT NOT NULL " .	
    ")";	
	
  if ( mysql_query($sql) ) {
    echo("Tabela '$nazwa_tabeli' zostala utworzona.<br>");
	}
  else {
  	echo("Nie mozna utworzyc tabeli: '$nazwa_tabeli' (" . mysql_error() . ")<br>");
	}		
	
	
  $nazwa_tabeli = "users";

  $sql = "CREATE TABLE $nazwa_tabeli ( " .
    "ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY, " .
    "login VARCHAR(16), " .
    "pass VARCHAR(32), " .
    "name VARCHAR(50), " .
    "email VARCHAR(50), " .	
	"www VARCHAR(50), " .	
	"place VARCHAR(50), " .	
	'timeslogedin INT DEFAULT \'0\', ' .	
	"lastlogin DATETIME, " .	
	"added TIMESTAMP, " .
	'about TEXT, ' . 
	'status INT DEFAULT \'0\',' . 
	'gender INT DEFAULT \'0\',' . 
	'woje INT DEFAULT \'0\',' . 	
	'activationstring TEXT ' .
    ")";
	
  if ( mysql_query($sql) ) {
    echo("Tabela '$nazwa_tabeli' zostala utworzona.<br>");
    }
  else {
  	echo("Nie mozna utworzyc tabeli: '$nazwa_tabeli' (" . mysql_error() . ")<br>");
	}		
	
	
  $nazwa_tabeli = "activations";

  $sql = "CREATE TABLE $nazwa_tabeli ( " .
    "userid INT, " .
	'activationstring TEXT ' .
    ")";
	
  if ( mysql_query($sql) ) {
    echo("Tabela '$nazwa_tabeli' zostala utworzona.<br>");
    }
  else {
  	echo("Nie mozna utworzyc tabeli: '$nazwa_tabeli' (" . mysql_error() . ")<br>");
	}	
	

  $nazwa_tabeli = "searches";

  $sql = "CREATE TABLE $nazwa_tabeli ( " .
    "ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY, " .
    "searchstring TEXT, " .
	'userid INT, ' .
	'added TIMESTAMP ' .
    ")";
	
  if ( mysql_query($sql) ) {
    echo("Tabela '$nazwa_tabeli' zostala utworzona.<br>");
    }
  else {
  	echo("Nie mozna utworzyc tabeli: '$nazwa_tabeli' (" . mysql_error() . ")<br>");
	}		
	
	
  $nazwa_tabeli = "ratings";

  $sql = "CREATE TABLE $nazwa_tabeli ( " .
    "ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY, " .
	'albumid INT, ' .
	'userid INT, ' .
	'rate INT, ' .
	'added TIMESTAMP ' .
    ")";
	
  if ( mysql_query($sql) ) {
    echo("Tabela '$nazwa_tabeli' zostala utworzona.<br>");
    }
  else {
  	echo("Nie mozna utworzyc tabeli: '$nazwa_tabeli' (" . mysql_error() . ")<br>");
	}			
	
	
  $nazwa_tabeli = 'prices';

  $sql = "CREATE TABLE $nazwa_tabeli ( " .
	'albumid INT, ' .
	'link TINYTEXT, ' .	
	'shopname TINYTEXT, ' .
	'price DOUBLE (10,2) ' .
    ")";
	
  if ( mysql_query($sql) ) {
    echo("Tabela '$nazwa_tabeli' zostala utworzona.<br>");
    }
  else {
  	echo("Nie mozna utworzyc tabeli: '$nazwa_tabeli' (" . mysql_error() . ")<br>");
	}		
	
 $nazwa_tabeli = "collection";

  $sql = "CREATE TABLE $nazwa_tabeli ( " .
    "ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY, " .
	'albumid INT, ' .
	'userid INT, ' .
	'added TIMESTAMP ' .
    ")";
	
  if ( mysql_query($sql) ) {
    echo("Tabela '$nazwa_tabeli' zostala utworzona.<br>");
    }
  else {
  	echo("Nie mozna utworzyc tabeli: '$nazwa_tabeli' (" . mysql_error() . ")<br>");
	}		
	


 $nazwa_tabeli = "wishlist";

  $sql = "CREATE TABLE $nazwa_tabeli ( " .
    "ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY, " .
	'albumid INT, ' .
	'userid INT, ' .
	'added TIMESTAMP ' .
    ")";
	
  if ( mysql_query($sql) ) {
    echo("Tabela '$nazwa_tabeli' zostala utworzona.<br>");
    }
  else {
  	echo("Nie mozna utworzyc tabeli: '$nazwa_tabeli' (" . mysql_error() . ")<br>");
	}				
	
	
 $nazwa_tabeli = 'clips';

  $sql = 'CREATE TABLE ' . $nazwa_tabeli . ' ('  .
    'ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY, ' .
	'time INT, ' .
	'title TINYTEXT, ' .
	'description TEXT, ' .		
	'userid INT, ' .
    'addedby INT, ' .	
	'added TIMESTAMP, ' .
	'updatedby INT, ' .			
	'updated DATETIME, ' .	 	
	'viewed INT NOT NULL ' .	
    ')';
	
  if ( mysql_query($sql) ) {
    echo("Tabela '$nazwa_tabeli' zostala utworzona.<br>");
    }
  else {
  	echo("Nie mozna utworzyc tabeli: '$nazwa_tabeli' (" . mysql_error() . ")<br>");
	}		
	





$nazwa_tabeli = 'clip_song_lookup';

$sql = 'CREATE TABLE ' . $nazwa_tabeli . ' ('  .
	'songid INT, ' .
	'clipid INT ' .
    ')';
	
  if ( mysql_query($sql) ) {
    echo("Tabela '$nazwa_tabeli' zostala utworzona.<br>");
    }
  else {
  	echo("Nie mozna utworzyc tabeli: '$nazwa_tabeli' (" . mysql_error() . ")<br>");
	}	
	
$nazwa_tabeli = 'clip_director_lookup';

$sql = 'CREATE TABLE ' . $nazwa_tabeli . ' ('  .
	'directorid INT, ' .
	'clipid INT ' .
    ')';
	
  if ( mysql_query($sql) ) {
    echo("Tabela '$nazwa_tabeli' zostala utworzona.<br>");
    }
  else {
  	echo("Nie mozna utworzyc tabeli: '$nazwa_tabeli' (" . mysql_error() . ")<br>");
	}	
	
	
	
$nazwa_tabeli = 'clip_screenplay_lookup';

$sql = 'CREATE TABLE ' . $nazwa_tabeli . ' ('  .
	'screenplayid INT, ' .
	'clipid INT ' .
    ')';
	
  if ( mysql_query($sql) ) {
    echo("Tabela '$nazwa_tabeli' zostala utworzona.<br>");
    }
  else {
  	echo("Nie mozna utworzyc tabeli: '$nazwa_tabeli' (" . mysql_error() . ")<br>");
	}	
	
		
	
$nazwa_tabeli = 'clip_edit_lookup';

$sql = 'CREATE TABLE ' . $nazwa_tabeli . ' ('  .
	'editorid INT, ' .
	'clipid INT ' .
    ')';
	
  if ( mysql_query($sql) ) {
    echo("Tabela '$nazwa_tabeli' zostala utworzona.<br>");
    }
  else {
  	echo("Nie mozna utworzyc tabeli: '$nazwa_tabeli' (" . mysql_error() . ")<br>");
	}	
	
$nazwa_tabeli = 'clip_animation_lookup';

$sql = 'CREATE TABLE ' . $nazwa_tabeli . ' ('  .
	'animatorid INT, ' .
	'clipid INT ' .
    ')';
	
  if ( mysql_query($sql) ) {
    echo("Tabela '$nazwa_tabeli' zostala utworzona.<br>");
    }
  else {
  	echo("Nie mozna utworzyc tabeli: '$nazwa_tabeli' (" . mysql_error() . ")<br>");
	}		
	
	
	
$nazwa_tabeli = 'clip_photos_lookup';

$sql = 'CREATE TABLE ' . $nazwa_tabeli . ' ('  .
	'photographerid INT, ' .
	'clipid INT ' .
    ')';
	
  if ( mysql_query($sql) ) {
    echo("Tabela '$nazwa_tabeli' zostala utworzona.<br>");
    }
  else {
  	echo("Nie mozna utworzyc tabeli: '$nazwa_tabeli' (" . mysql_error() . ")<br>");
	}		
	
$nazwa_tabeli = 'clip_label_lookup';

$sql = 'CREATE TABLE ' . $nazwa_tabeli . ' ('  .
	'labelid INT, ' .
	'clipid INT ' .
    ')';
	
  if ( mysql_query($sql) ) {
    echo("Tabela '$nazwa_tabeli' zostala utworzona.<br>");
    }
  else {
  	echo("Nie mozna utworzyc tabeli: '$nazwa_tabeli' (" . mysql_error() . ")<br>");
	}		

	
$nazwa_tabeli = 'song_samples';

$sql = 'CREATE TABLE ' . $nazwa_tabeli . ' ('  .
	'songid INT, ' .
	'sample TEXT, ' .
    'addedby INT, ' .	
	'added TIMESTAMP ' .
    ')';
	
  if ( mysql_query($sql) ) {
    echo("Tabela '$nazwa_tabeli' zostala utworzona.<br>");
    }
  else {
  	echo("Nie mozna utworzyc tabeli: '$nazwa_tabeli' (" . mysql_error() . ")<br>");
	}		
	
	
	
$nazwa_tabeli = 'album_comments';

$sql = 'CREATE TABLE ' . $nazwa_tabeli . ' ('  .
	'albumid INT, ' .
	'comment TEXT, ' .
    'addedby INT, ' .	
	'added TIMESTAMP ' .
    ')';
	
  if ( mysql_query($sql) ) {
    echo("Tabela '$nazwa_tabeli' zostala utworzona.<br>");
    }
  else {
  	echo("Nie mozna utworzyc tabeli: '$nazwa_tabeli' (" . mysql_error() . ")<br>");
	}		
	
$nazwa_tabeli = 'album_reviews';

$sql = 'CREATE TABLE ' . $nazwa_tabeli . ' ('  .
    'ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY, ' .
	'albumid INT, ' .
	'title TEXT, ' .
	'review TEXT, ' .
    'addedby INT, ' .	
	'added TIMESTAMP, ' .
	'actionby INT, ' . 
	'status TINYINT DEFAULT "0"' .
	
    ')';
	
  if ( mysql_query($sql) ) {
    echo("Tabela '$nazwa_tabeli' zostala utworzona.<br>");
    }
  else {
  	echo("Nie mozna utworzyc tabeli: '$nazwa_tabeli' (" . mysql_error() . ")<br>");
	}	
	
	
$nazwa_tabeli = 'artists_photos';

$sql = 'CREATE TABLE ' . $nazwa_tabeli . ' ('  .
    'ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY, ' .
	'artistid INT, ' .
	'main INT, ' .
	'filename TEXT, ' . 
	'description TEXT, ' .
	'source TINYTEXT, ' .
	'sourceemail TINYTEXT, ' .	
    'addedby INT, ' .	
	'added TIMESTAMP ' .
    ')';
	
  if ( mysql_query($sql) ) {
    echo("Tabela '$nazwa_tabeli' zostala utworzona.<br>");
    }
  else {
  	echo("Nie mozna utworzyc tabeli: '$nazwa_tabeli' (" . mysql_error() . ")<br>");
	}			
	

$nazwa_tabeli = 'concerts';

$sql = 'CREATE TABLE ' . $nazwa_tabeli . ' ('  .
    'ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY, ' .
	'cityid INT, ' .
	'title TEXT, ' .
	'artist TEXT, ' .
	'cost TEXT, ' .
	'website TEXT, ' .
	'start TEXT, ' .
	'date DATETIME, ' .
	'description TEXT, ' .
    'addedby INT, ' .	
	'added TIMESTAMP ' .
    ')';
	
  if ( mysql_query($sql) ) {
    echo("Tabela '$nazwa_tabeli' zostala utworzona.<br>");
    }
  else {
  	echo("Nie mozna utworzyc tabeli: '$nazwa_tabeli' (" . mysql_error() . ")<br>");
	}		
	
	
$nazwa_tabeli = 'artist_concert_lookup';

$sql = 'CREATE TABLE ' . $nazwa_tabeli . ' ('  .
	'artistid INT, ' .
	'concertid INT ' .
    ')';
	
  if ( mysql_query($sql) ) {
    echo("Tabela '$nazwa_tabeli' zostala utworzona.<br>");
    }
  else {
  	echo("Nie mozna utworzyc tabeli: '$nazwa_tabeli' (" . mysql_error() . ")<br>");
	}		
	
	
	
$nazwa_tabeli = 'news';

$sql = 'CREATE TABLE ' . $nazwa_tabeli . ' ('  .
    'ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY, ' .
	'news TEXT, ' .
	'title TINYTEXT, ' .
	'expires DATETIME, ' .
    'addedby INT, ' .	
	'added TIMESTAMP ' .
    ')';
	
  if ( mysql_query($sql) ) {
    echo("Tabela '$nazwa_tabeli' zostala utworzona.<br>");
    }
  else {
  	echo("Nie mozna utworzyc tabeli: '$nazwa_tabeli' (" . mysql_error() . ")<br>");
	}			
		
	
	
							
			
	
  include ("template_bottom.php");
	
		
	  
?>