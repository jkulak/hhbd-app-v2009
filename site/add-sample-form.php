<?php

//*****************************************************************
$smarty->assign ('title', 'HHBD.PL | DODAJ SAMPEL');
$smarty->assign ('description', 'hip-hop, hiphop, polski hip-hop, tede, peja, wwo, prosto, umc, mezo');
$smarty->assign ('ctitle', 'DODAJ INFO O ROZPOZNANYM SAMPLU');
//*****************************************************************	

$smarty->assign('sid', $id);
$smarty->assign('add', $add);

$sql = 'SELECT title FROM songs WHERE urlname="' . $id . '"';

$result = mysql_query($sql);
$row = mysql_fetch_array($result);

$title = $row['title'];

$smarty->assign('stitle', $title);



//*****************************************************************	
$smarty->assign('body_template', 'site/add-sample-form.tpl');
//*****************************************************************
?>