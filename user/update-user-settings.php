<?php
 
$userurlname = $_SESSION['hhbdurlname'];

$allow_wishlist = ($_POST['allow_wishlist'] == 'y') ? 'y' : 'n';
$allow_collection = ($_POST['allow_collection'] == 'y') ? 'y' : 'n';

$email1 = $_POST['email1'];
$email2 = $_POST['email2'];

$old_pass = $_POST['old_pass'];
$pass1 = $_POST['pass1'];
$pass2 = $_POST['pass2'];

if ( ($email1 != '') AND ($email2 != '') ) {
	if ($email1 == $email2) {
		if (ereg('^[-!#$%&\'*+\\./0-9=?A-Z^_`a-z{|}~]+'.'@'.'[-!#$%&\'*+\\/0-9=?A-Z^_`a-z{|}~]+\.'.'[-!#$%&\'*+\\./0-9=?A-Z^_`a-z{|}~]+$', $email1)) {
			$sql = 'SELECT id FROM users WHERE (email="' . $email1 . '" AND urlname<>"' . $userurlname . '")';
			if (mysql_num_rows(mysql_query($sql))) {
				$smarty->assign('emailerr', 'taki adres e-mail jest ju¿ w bazie, wpisz inny');
				}
			else {
				$sql = 'UPDATE users SET email="' . $email1 . '" WHERE urlname="' . $userurlname . '"';
				if (mysql_query($sql)) {
					$smarty->assign('emailerr', 'adres e-mail zosta³ zmienony');
					}				
				}
			}
		else {
			$smarty->assign('emailerr', 'adres e-mail nieprawid³owy, podaj inny');
			}
		}
	else $smarty->assign('emailerr', 'Nowe emaile nie s¡ takie same!');
	}

$sql = 'SELECT pass FROM users WHERE urlname="' . $userurlname . '"';
$result = mysql_query($sql);
$passrow = mysql_fetch_array($result);
$userpass = $passrow['pass'];
	
if ( ($pass1 != '') AND ($pass2 != '') ) {
	if ($pass1 == $pass2) {
		if ( $userpass == md5($old_pass) ) {
			$sql = 'UPDATE users SET pass="' . md5($pass1) . '" WHERE urlname="' . $userurlname . '"';
				if (mysql_query($sql)) {
					$smarty->assign('passerr', 'has³o zosta³o zmienione');
					}
			$passinfo = '';
			}
		else $smarty->assign('passerr', 'Poda³e¶ z³e has³o!');
		}
	else $smarty->assign('passerr', 'Nowe has³a nie s¡ takie same!');
	}

$sql = 'UPDATE users SET allow_wishlist="' . $allow_wishlist . '", allow_collection="' . $allow_collection . '" WHERE urlname="' . $userurlname . '"';
if (mysql_query($sql)) {
	$smarty->assign('optionsinfo', 'opcje zapisane poprawnie');	
	}

$id = 'ustawienia';

include ('user/myprofile.php');

?>