<?php
//*****************************************************************
$smarty->assign ('title', 'HHBD.PL | ZA�ӯ KONTO');
$smarty->assign ('description', 'hip-hop, hiphop, polski hip-hop, tede, peja, wwo, prosto, umc, mezo');
$ctitle = 'ZA�ӯ KONTO';
if (isset($err)) {$ctitle = $ctitle . ' (<font color="red" style="letter-spacing: -1px;">' . $err . '</font>)';}
$smarty->assign ('ctitle', $ctitle);
//*****************************************************************	


//*****************************************************************	
$smarty->assign('body_template', 'user/new-account-form.tpl');
//*****************************************************************
?>