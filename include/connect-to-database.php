<?php

if ( PHPENV == 'DEV' ) {
  $dbHost = 'localhost:3306';
  $dbUser = 'www';
  $dbPassword = 'www';
  $dbSchema = 'hhbdrebuild';
}
else {
  $dbHost = '';
  $dbUser = '';
  $dbPassword = '';
  $dbSchema = '';
}


// Connect to the database server
$sqlc = mysql_connect($dbHost, $dbUser, $dbPassword);
if (!$sqlc) {
	$smarty->assign('errormsg', 'Nie można połączyć się z bazą!');
	}
  
if (!mysql_select_db($dbSchema) ) {
	$smarty->assign('errormsg', 'Nie można odnaleźć bazy!');
	}
