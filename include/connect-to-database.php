<?php

if ( getenv('ENVIRONMENT') == "DEV" ) {
  $dbHost = 'localhost';
  $dbUser = 'www';
  $dbPassword = 'www';
  $dbSchema = 'hhbd';
}
else {
  $dbHost = 'sql.cal.pl';
  $dbUser = 'hhbd_hhbd';
  $dbPassword = 'web';
  $dbSchema = 'hhbd_hhbd';
}


// Connect to the database server
$sqlc = mysql_connect($dbHost, $dbUser, $dbPassword);
if (!$sqlc) {
	$smarty->assign('errormsg', 'Nie można połączyć się z bazą!');
	}

  
if (!mysql_select_db($dbSchema) ) {
	$smarty->assign('errormsg', 'Nie można odnaleźć bazy!');
	}
	
	
	

?>
