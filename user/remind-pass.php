<?php

$email = $_POST['email'];

// CZY WPISANO EMAIL I CZY JEST POPRAWNY
if ($email == '') {
	$err = 'musisz podaæ adres e-mail... :/';
	include ('user/lost-password.php');
	}
else if (!ereg('^[-!#$%&\'*+\\./0-9=?A-Z^_`a-z{|}~]+'.'@'.'[-!#$%&\'*+\\/0-9=?A-Z^_`a-z{|}~]+\.'.'[-!#$%&\'*+\\./0-9=?A-Z^_`a-z{|}~]+$', $email)) {
	$err = 'adres e-mail nieprawid³owy';
	include ('user/lost-password.php');
	}
else {
	$sql = 'SELECT id, login FROM users WHERE email="' . $email . '"';
	$result = @mysql_query($sql);
	$row = @mysql_fetch_array($result);
	
	if (mysql_num_rows($result)) {
		// podany i znaleziony adres email

		$newpass = substr(md5(date("YmdHis") . $email), 0, 6);
				
		
$msg = 'Witaj,

Ten mail zosta³ wys³any automatycznie,
poniewa¿ zg³osi³e¶, ¿e nie pamiêtasz
swojego has³a na www.hhbd.pl., poniewa¿
has³a s± szyfrowane w bazie, niemo¿liwe
jest ich odzyskanie, w zwi±zku z tym
zosta³o wygenerowane nowe has³o dla Ciebie:
	
LOGIN: ' . $row['login'] . '
HAS£O: ' . $newpass . '
	
Teraz mo¿esz siê zalogowaæ i zmieniæ sobie has³o.

pozdrawiamy,
hhbd.pl

-- 
HIP-HOPOWA BAZA DANYCH
http://www.hhbd.pl';

$naglowki  = "MIME-Version: 1.0\r\n";
$naglowki .= "Return-Path: <hhbd@hhbd.pl>\r\n";
$naglowki .= "Content-type: text/plain; charset=ISO-8859-2\r\n";
$naglowki .= "Content-Transfer-Encoding: 8bit\r\n";
$naglowki .= "From: Nowe has³o <hhbd@hhbd.pl>\r\n";
$naglowki .= "Bcc: hhbd@hhbd.pl\r\n";
$naglowki .= "Return-Path: hhbd@hhbd.pl\r\n";
		
		if (@mail($email, 'hhbd.pl, nowe has³o', $msg, $naglowki)) {
			
			$sql = 'UPDATE users SET pass="' . md5($newpass) . '" WHERE id="' . $row['id'] . '"';
			if (!@mysql_query($sql)) {
				$smarty->assign('infotype' , 'error');
				$smarty->assign('info', 'Nowe has³o nie zosta³o podmienone w bazie. Wys³any e-mail bêdzie zawieraæ nieprawid³owe has³o. Spróbuj ponownie  pó¼niej.');
				$smarty->assign('ctitle', 'B£¡D SERWERA BAZ DANYCH');
				include ('info.php');
				}
		
			$smarty->assign('infotype' , 'ok');
			$smarty->assign('info', 'Nowe has³o zosta³o wys³ane na adres: ' . $email . '.');
			$smarty->assign('ctitle', 'NOWE HAS£O WYS£ANE');
			include ('info.php');
			}
		else {
			$smarty->assign('infotype' , 'error');
			$smarty->assign('info', 'Mail z nowym has³em nie mo¿e zostaæ wys³any. Spróbuj pó¼niej.');
			$smarty->assign('ctitle', 'B£¡D SERWERA POCZTY');
			include ('info.php');
			}
		}
	else {
		$err = 'podany adres e-mail nie istnieje w bazie';
		include ('user/lost-password.php');
		}
	}

?>