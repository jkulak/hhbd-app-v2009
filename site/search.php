<?php
# ****************************************
# autor: Jakub 'feedel' Ku³ak
# data utworzenia: 07.09.2005
# projekt: www.hhbd.pl
# email: jakubkulak at interia dot pl
# @version $Id$
#                                        
# plik wyszukujacy      
# ****************************************

$start=microtime(true);

include ('include/connect-to-database.php');

$searchstring = strtoupper($_POST['searchstring']);

$licznik = 0;

if ($searchstring == '') {
	header('Location: /');
	exit();
	}
	
$temp = array();
$smarts = array();
$temp2 = array();
$smarts2 = array();
	
$tables = array(1 => 'artists', 'albums', 'songs', 'labels', 'users', 'albums');
$searchnames = array(1 => 'name', 'title', 'title', 'name', 'login', 'catalog_cd');
$linkname = array(1 => 'n', 'a', 's', 'l', 'u', 'a');

// wyszukiwanie dopasowne w alumach, wykonawcach, wytworniach, utworach
for ($i=1;$i<=6;$i++) {
	
	$sql = 'SELECT urlname ' . 
		'FROM ' . $tables[$i] . ' ' . 
		'WHERE (' . $searchnames[$i] . '="' . $searchstring . '")';
	$result = mysql_query($sql);
	$searchrow = mysql_fetch_array($result);
	if (mysql_num_rows($result) == 1) {
		header('Location: /' . $linkname[$i]. '/' . $searchrow['urlname'] ); 
		exit();
		}
	}
	

### ZAPYTANIE O CIAG W SRODKU I NA KONCU
for ($i=1;$i<=6;$i++) {
	$sql = 'SELECT urlname, ' . $searchnames[$i] . ' ' . 
		'FROM ' . $tables[$i] . ' ' . 
		'WHERE (' . $searchnames[$i] . ' LIKE "' . $searchstring . '%" AND ' . $searchnames[$i] . '<>"' . $searchstring . '") ORDER BY ' . $searchnames[$i] ;
	$result = mysql_query($sql);
	while($searchrow = mysql_fetch_array($result)) {
		$licznik++;
		array_push($temp, '<a href="/' . $linkname[$i] . '/' . $searchrow['urlname'] . '">' . $searchrow[$searchnames[$i]] . '</a>');
		array_push($temp2, '/' . $linkname[$i] . '/' . $searchrow['urlname'] );
		}		
/*		
	$sql = 'SELECT urlname, ' . $searchnames[$i] . ' ' .  
		'FROM ' . $tables[$i] . ' ' . 
		'WHERE (' . $searchnames[$i] . ' LIKE "%' . $searchstring . '" AND ' . $searchnames[$i] . '<>"' . $searchstring . '" AND ' . $searchnames[$i] . ' NOT LIKE "%' . $searchstring . '%")';
	$result = mysql_query($sql);
	while($searchrow = mysql_fetch_array($result)) {
		$licznik++;
		array_push($temp, '<a href="/' . $linkname[$i] . '/' . $searchrow['urlname'] . '">' . $searchrow[$searchnames[$i]] . '</a>');
		}
*/		
	$sql = 'SELECT urlname, ' . $searchnames[$i] . ' ' .  
		'FROM ' . $tables[$i] . ' ' . 
		'WHERE (' . $searchnames[$i] . ' LIKE "%' . $searchstring . '%" AND ' . $searchnames[$i] . '<>"' . $searchstring . '" AND ' . $searchnames[$i] . ' NOT LIKE "' . $searchstring . '%") ORDER BY ' . $searchnames[$i] ;

	$result = mysql_query($sql);
	while($searchrow = mysql_fetch_array($result)) {
		$licznik++;
		array_push($temp, '<a href="/' . $linkname[$i] . '/' . $searchrow['urlname'] . '">' . $searchrow[$searchnames[$i]] . '</a>');
		array_push($temp2, '/' . $linkname[$i] . '/' . $searchrow['urlname'] );
		}
		
	array_push($smarts, $temp);
	$temp = array();
	
	array_push($smarts2, $temp2);
	$temp2 = array();
	
	}
	

// wyszukiwanie dokladne w altnames	
$sql = 'SELECT t1.urlname FROM artists t1, altnames_lookup t2 WHERE (t1.id=t2.artistid AND t2.altname LIKE "%' . $searchstring . '%")';

$result = @mysql_query($sql);
$searchrow = @mysql_fetch_array($result);
if ((@mysql_num_rows($result) == 1) AND ($licznik <= 1)) {	
		header('Location: /n/' . $searchrow['urlname'] ); 
		exit();
		}

$smarty->assign('artists_list', $smarts[0]);
$smarty->assign('albums_list', $smarts[1]);
$smarty->assign('songs_list', $smarts[2]);
$smarty->assign('labels_list', $smarts[3]);
$smarty->assign('users_list', $smarts[4]);
$smarty->assign('sns_list', $smarts[5]);

if ($licznik == 1) { 

    if ($smarts2[0][0] != '') {
        header('Location: ' . $smarts2[0][0]); 
		}
    if ($smarts2[1][0] != '') {
        header('Location: ' . $smarts2[1][0]); 
		}
    if ($smarts2[2][0] != '') {
     	header('Location: ' . $smarts2[2][0]); 
		}
    if ($smarts2[3][0] != '') {
        header('Location: ' . $smarts2[3][0]); 
		}
	if ($smarts2[4][0] != '') {
        header('Location: ' . $smarts2[4][0]); 
		}
	if ($smarts2[5][0] != '') {
        header('Location: ' . $smarts2[5][0]); 
		}
	}
	

	
// DODANIE DO BAZY CIAGU WYSZUKIWANEGO
$sql = 'INSERT INTO searches (searchstring, userid) VALUES ("' . $searchstring . '", "' . $_SESSION['HHBDUSERID'] . '")';
@mysql_query($sql);

$sql = 'SELECT id FROM searches WHERE searchstring="' . $searchstring . '"';
$result = mysql_query($sql);
$smarty->assign('searched', @mysql_num_rows($result));

	


$smarty->assign('time', round(microtime(true)-$start, 3));
$smarty->assign('results', $licznik);
$smarty->assign('searchstring', $searchstring);

//*****************************************************************	
$smarty->assign('title', 'HHBD.PL | WYNIKI WYSZUKIWANIA');
$smarty->assign('ctitle', 'WYNIKI WYSZUKIWANIA: "' . $searchstring . '"');
$smarty->assign('body_template', 'site/search.tpl');
//*****************************************************************

	
	
?>
