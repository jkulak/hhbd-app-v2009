<?php

$sid = $_POST['add'];
$site = $_POST['sid'];
$email = $_POST['email'];
$signature = $_POST['signature'];

$msg = 'Aloha!

Tego maila wys³a³ do Ciebie: ' . $signature . ' ze strony
o polskim hip-hopie:  http://www.hhbd.pl.

' . $signature  . ' poleca Ci obejrzenie: 
http://www.hhbd.pl/' . $site . '/' . $sid . '

pozdrawiamy,
hhbd.pl

-- 
HIP-HOPOWA BAZA DANYCH
http://www.hhbd.pl';

$naglowki  = "MIME-Version: 1.0\r\n";
$naglowki .= "Return-Path: <hhbd@hhbd.pl>\r\n";
$naglowki .= "Content-type: text/plain; charset=ISO-8859-2\r\n";
$naglowki .= "Content-Transfer-Encoding: 8bit\r\n";
$naglowki .= "From: " . $signature . " z hhbd.pl <hhbd@hhbd.pl>\r\n";
$naglowki .= "Bcc: hhbd@hhbd.pl\r\n";
$naglowki .= "Return-Path: hhbd@hhbd.pl\r\n";


$sql = 'INSERT INTO submision_recommendations (email, signature, link) VALUES ' . 
	'("' . $email . '", "' . $signature . '", "' . $site . '/' . $sid . '")';
@mysql_query($sql);


if (@mail($email, 'hhbd.pl, sprawd¼ to!', $msg, $naglowki)) {	
	$smarty->assign('infotype' , 'ok');
	$smarty->assign('info', 'Mail z polecan± stron± zosta³ wys³any. Dziêkujemy za korzystanie z systemu polecania stron!');
	$smarty->assign('ctitle', 'ADRES STRONY WYS£ANY');
	}
else {
	$smarty->assign('infotype' , 'error');
	$smarty->assign('info', 'Mail z polecan± stron± nie zosta³ wys³any, z powodu b³êdu serwera poczty. Proszê spróbowaæ pó¼niej. Przepraszamy za wszelkie utrudnienia.');
	$smarty->assign('ctitle', 'B£¡D SERWERA POCZTY');
	}

include ('info.php');

?>