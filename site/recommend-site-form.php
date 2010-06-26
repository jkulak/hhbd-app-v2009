<?php

//*****************************************************************
$smarty->assign ('title', 'HHBD.PL | WY¦LIJ STRONÊ ZNAJOMEMU');
$smarty->assign ('description', 'hip-hop, hiphop, polski hip-hop, tede, peja, wwo, prosto, umc, mezo');
$smarty->assign ('ctitle', 'WY¦LIJ STRONÊ ZNAJOMEMU');
//*****************************************************************	

$smarty->assign('link', substr('www.hhbd.pl/' . $id . '/' . $add, 0, 69));
$smarty->assign('sid', $id);
$smarty->assign('add', $add);

//*****************************************************************	
$smarty->assign('body_template', 'site/recommend-site-form.tpl');
//*****************************************************************
?>