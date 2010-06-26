<?php

$letter = isset($id) ? ' | ' . $id : '';

//*****************************************************************	
$smarty->assign('title', 'KONCERY, IMPREZY HIP-HOP');
//*****************************************************************

$concerts = array();
$concertsurlnames = array();
$concertsthumbs = array();

$sql = 'SELECT t1.urlname, t1.date, t1.title, t1.poster, t3.name AS city ' .
	'FROM concerts AS t1, cities AS t3 ' .
	'WHERE (t1.cityid=t3.id AND t1.date>="' . date('Y-m-d') . '") ' .
	'GROUP BY t1.id ORDER BY t1.date';

$result = mysql_query($sql);
while($row = mysql_fetch_array($result) ){
//	print ('<li class="concertdate">' . date('Y-m-d',strtotime($row['date'])) . ':</li>');
//	print ('<li> - <a href="index.php?s=concert&id=' . $row['id'] . '">' . $row['title'] . ', ' . $row['city'] . '</a></li>');

	if ((file_exists('imgs/database/posters-thumbs/' . substr($row['poster'], 0, strlen($row['poster']) - 4) . '_thumb.jpg')) AND ($row['poster'] != '')) {
			array_push($concertsthumbs, substr($row['poster'], 0, strlen($row['poster']) - 4) . '_thumb.jpg');
			}
		else array_push($concertsthumbs, 'noposter.gif');
		
	array_push($concerts, '<a href="/p/' . $row['urlname'] . '">' . $row['title'] . '</a> - ' . $row['city'] . ' - <strong>' . show_normal_date($row['date']) . '</strong>');
	array_push($concertsurlnames, $row['urlname']);
	}
$smarty->assign('concerts', $concerts);
$smarty->assign('concertsthumbs', $concertsthumbs);
$smarty->assign('concertsurlnames', $concertsurlnames);


$smarty->assign('keywords', 'koncert koncerty polskie imprezy ipreza hip-hop hip hop');
$smarty->assign ('description', 'Lista polskich imprez/koncertów hip-hopowych.');	

//*****************************************************************	
$smarty->assign('body_template', 'site/concerts-list.tpl');
//*****************************************************************

?>