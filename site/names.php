<?php

$letter = isset($id) ? ' | ' . $id : '';
$id = isset($id) ? $id : 'A';

//*****************************************************************	
$smarty->assign('title', 'HHBD.PL | LISTA WYKONAWCÓW' . $letter);
//*****************************************************************

$smarty->assign('listname', 'lista wykonawców');
	
function view_switch($id) {
	if ( $id == '' ) $id = 'xman';
	/*
	* ustawiam zmienna tymczasowa na string,
	* ktory na pewno nie wystapi
	*/	
	$temp = 'xman';
	
	$sql = 'SELECT name FROM artists ORDER BY name';
	$result = mysql_query($sql);
	while ($artistsrow = mysql_fetch_array($result)) {
		/*
		* porownuje pierwsza litere wybranych wartosci
		* ze zmienna tymczasowa. jezeli sa rozne - mam nowa litere,
		* wiec podmieniamy zmienna tymczasowa i wyswietlamy link,
		* chyba ze jest to aktualnie wybrana litera - wtedy nie
		* dajemy linku, tylko sama litere.
		*/
		if (strtolower(substr($artistsrow['name'], 0, 1)) != strtolower($temp)) {
			$temp = substr($artistsrow['name'], 0, 1);
			if ($id != $temp) {
				$letters = $letters . ('<a href="/wykonawcy/' . strtoupper($temp) . '">' . strtoupper($temp) . '</a> ' . "\n");
				}
			else $letters = $letters . (strtoupper($temp) . "\n"); 
			}
		}
	
	return $letters;
	}
	
$smarty->assign('namesletters', view_switch($id));

$lista_wykonawcow = array();

if (isset($id)) {      
	$sql = 'SELECT t1.urlname , t1.name, t1.special
		   FROM artists AS t1 
		   WHERE (t1.name LIKE "' . $id . '%") 
		   ORDER BY name';
	$result = mysql_query($sql);	
	while ( $row = mysql_fetch_array($result) ) { 
		$namelink = str_replace(' ', '+', $row['name']);
		array_push($lista_wykonawcow, (($row['special'] == 1) ? '<strong>' : '') . '<a href="/n/' . $row['urlname'] . '">' . $row['name'] . '</a>'. (($row['special'] == 1) ? '</strong>' : '' ));
		}
	$smarty->assign('nameslist', $lista_wykonawcow);
 	}

//*****************************************************************	
$smarty->assign('body_template', 'site/labels-names-list.tpl');
//*****************************************************************
?>