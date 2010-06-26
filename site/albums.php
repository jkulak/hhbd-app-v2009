<?php

//*****************************************************************	
$smarty->assign('title', 'POLSKIE ALBUMY HIP-HOPOWE');
//*****************************************************************

$smarty->assign('subtitle', 'LISTA WYDANYCH W POLSCE ALBUMÓW');

$part = $id;

// ********************************************************************************	
//                                                            PRZE��CZNIK ALBUM�W *
// ********************************************************************************
$switch = '';

$sql = 'SELECT id FROM albums WHERE (year' . '<="' . date('Y-m-d') . '")';
$result = @mysql_query($sql);
$numrows = mysql_num_rows($result);

//ustawnienie najnowszej, jezeli zadna nie jest wybrana
$sides = 5;
$edges = 3;
$_ILE_NA_STRONIE = 6;


if ($part == '') $part = 1;

	if ($part>1) $switch .= ' <a href="/albumy/' . ($part - 1) . '">&lt;&lt;</a> ';
	
	$last = ceil($numrows / $_ILE_NA_STRONIE);

	for ($i=1;($i<$part-$sides AND $i<$edges+1);$i++) {
		$switch .= '<a href="/albumy/' . ($i) . '">' . ($i) . '</a> ';
		}
		
	if ($edges + 1< $part-$sides) {
		$istart = $part-$sides;
		$switch .= ' ... ';
		}
	else $istart = $i;

	// wyswietlanie tych po lewej stronie
	for ($i=$istart;$i<$part;$i++) {
		$switch .= '<a href="/albumy/' . ($i) . '">' . ($i) . '</a> ';
		}
	
	// wyswietlenie aktualnego
	$switch .= $part . ' ' ;
	
	// wyswietlanie tych po prawej stronie	
	for ($i=$part+1;($i<$part+$sides+1 AND $i<=$last);$i++) {		
		$switch .= '<a href="/albumy/' . ($i) . '">' . ($i) . '</a> ';
		}
		
	if ($part+$sides < $last-$edges) {
		
		$istart = $last-$edges+1;
		$switch .= ' ... ';
		}
	else $istart = $part + $sides + 1;		
	
	for ($i=$istart;($i<=$last);$i++) {
		$switch .= '<a href="/albumy/' . ($i) . '">' . ($i) . '</a> ';
		} 
		
	if ($part<$last) $switch .= ' <a href="/albumy/' . ($part + 1) . '">&gt;&gt;</a> ';


$smarty->assign('switch', $switch);

// ********************************************************************************




$titles = array();

$sql = 'SELECT id FROM albums WHERE (year' . '<="' . date('Y-m-d') . '")';
$numrows = mysql_num_rows(@mysql_query($sql));

if ($part == '') $part = ceil($numrows / $_ILE_NA_STRONIE);
$part -= 1;
$part *= $_ILE_NA_STRONIE;

$sql = 'SELECT t1.urlname AS artisturlname, t1.name, t3.premier, t3.title, t3.urlname AS albumurlname, t3.year, t3.singiel, t3.cover, t4.name AS labelname, t4.urlname AS labelurlname ' . 
	'FROM artists AS t1, album_artist_lookup AS t2, albums AS t3, labels AS t4 ' .
	'WHERE (t1.id=t2.artistid AND t2.albumid=t3.id AND t4.id=t3.labelid AND t3.year' . '<="' . date('Y-m-d') . '") ' . 
	'ORDER BY t3.year DESC ' .
	'LIMIT ' . ($part) . ',' . $_ILE_NA_STRONIE;

$result = mysql_query($sql);

	$ownalbum_titles_list = array();
	$ownalbum_artists_list = array();
	$ownalbum_covers_list = array();
	$ownalbum_ids_list = array();
	$ownalbum_years_list = array();
	$ownalbum_labels_list = array();
	$ownalbum_sns_list = array();
	while ( $row = @mysql_fetch_array($result) ) { 
		$year = $row['year'];
		$year = substr($year, 0, 4);  	
		$singiel = ($row['singiel'] == 1) ? ' (EP)' : '';
		array_push($ownalbum_titles_list, '<a href="/a/' . $row['albumurlname'] . '">' . $row['title'] . $singiel . '</a>');
		array_push($ownalbum_artists_list, '<a href="/n/' . $row['artisturlname'] . '">' . $row['name'] . '</a>');
		array_push($ownalbum_ids_list, $row['albumurlname']);
		array_push($ownalbum_sns_list, $row['catalog_cd']);
		if ((file_exists('imgs/database/albums-thumbs/' . substr($row['cover'], 0, strlen($row['cover']) - 4) . '_75.jpg')) AND ($row['cover'] != '')) {
			array_push($ownalbum_covers_list, substr($row['cover'], 0, strlen($row['cover']) - 4) . '_75.jpg');
			}
		else array_push($ownalbum_covers_list, 'nocover_75.jpg');
		
		$year = $row['year'];
		if (($year[5] == 0) AND ($year[6] == 0)) {
			$year =  substr($year, 0, 4);
			}
		else {
			$year = show_normal_date($year);
			}
		
		array_push($ownalbum_years_list, 'premiera: ' . $year);
		array_push($ownalbum_labels_list, '<a href="/l/' . $row['labelurlname'] . '">' . $row['labelname'] . '</a>');	
		}	
	$smarty->assign ('ownalbum_titles_list', $ownalbum_titles_list);
	$smarty->assign ('ownalbum_artists_list', $ownalbum_artists_list);
	$smarty->assign ('ownalbum_ids_list', $ownalbum_ids_list);
	$smarty->assign ('ownalbum_covers_list', $ownalbum_covers_list);
	$smarty->assign ('ownalbum_years_list', $ownalbum_years_list);
	$smarty->assign ('ownalbum_labels_list', $ownalbum_labels_list);
	$smarty->assign ('ownalbum_sns_list', $ownalbum_sns_list);



	 
	//if ($albumrow8['id'] != '') viewalbum($albumrow8);		
	//if ($albumrow7['id'] != '') viewalbum($albumrow7);		
	//if ($albumrow6['id'] != '') viewalbum($albumrow6);		
	//if ($albumrow5['id'] != '') viewalbum($albumrow5);			
//	if ($albumrow4['id'] != '') viewalbum($albumrow4);		
//	if ($albumrow3['id'] != '') viewalbum($albumrow3);		
//	if ($albumrow2['id'] != '') viewalbum($albumrow2);		
//	if ($albumrow1['id'] != '') viewalbum($albumrow1);		
	
		

	

$smarty->assign('keywords', 'polskie albumy hip-hop hip hop');
$smarty->assign ('description', 'Lista WSZYSTKICH polskich albumów hip-hopowych.');	


//*****************************************************************	
$smarty->assign('body_template', 'site/albums.tpl');
//*****************************************************************

?>