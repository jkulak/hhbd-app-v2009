<?php
  
  // SPRAWDZENIE POPRAWNOSI DANYCH (hasla takie same, loginu nie ma w bazie, email poprawny
  // wybrana plec, wybrane wojewodztwo, wpisane miasto
  
function changename($oldname) {
	$toreplace = array(' ', '?', ':', '*', '|', '/', '\\', '"', '<', '>', '&', '!', '-', '+', '%', '^', '(', ')', '#', ';', '~', '`', '[', ']', '{', '}', ',') ;
	$name = str_replace($toreplace, '_', $oldname);

	// ZMIANA POLSKICH LITEREK!
	$toreplace = array('@', '$', '±', 'æ', 'ê', '³', 'ñ', 'ó', '¶', '¼', '¿', '¦', '£', '¯', 'Ñ', 'Ê', 'Æ', '¡', 'Ó', '¬');
	$replaceto = array('a', 's', 'a', 'c', 'e', 'l', 'n', 'o', 's', 'z', 'z', 'S', 'L', 'Z', 'N', 'E', 'C', 'A', 'O', 'Z');    
	$name = str_replace($toreplace, $replaceto, $name);
	
	$name = str_replace('___', '_', $name);
	$name = str_replace('__', '_', $name);
	
	$name = str_replace(array('\'', '.'), '', $name);
	
	if (substr($name, strlen($name) - 1, 1) == '_') { $name = substr($name, 0, strlen($name) - 1);}
	
	return $name;
	}


$login = $_POST['login'];
$urlname = changename($_POST['login']);
$email = $_POST['email'];
$pass1 = $_POST['pass1'];
$pass2 = $_POST['pass2'];
$miasto = $_POST['miasto'];

$wojewodztwo = $_POST['wojewodztwo'];
$plec = $_POST['plec'];
$dataurodzenia = $_POST['dataurodzenia'];


// CZY WPISANO HASLO I CZY SA TAKIE SAME
if (($pass1 == '') OR ($pass2 == '')) {
	$err = 'Wpisz oba has³a';
	}
else if ($pass1 != $pass2) {
	$err = 'has³a nie zgadzaj± siê';
	}

// CZY WPISANO EMAIL I CZY JEST POPRAWNY
if ($email == '') {
	$err = 'podaj adres e-mail';
	}
else if (!ereg('^[-!#$%&\'*+\\./0-9=?A-Z^_`a-z{|}~]+'.'@'.'[-!#$%&\'*+\\/0-9=?A-Z^_`a-z{|}~]+\.'.'[-!#$%&\'*+\\./0-9=?A-Z^_`a-z{|}~]+$', $email)) {
	$err = 'adres e-mail nieprawid³owy, podaj inny';
	}
else {
	$sql = 'SELECT id FROM users WHERE email="' . $email . '"';
	$result = mysql_query($sql);
	if (mysql_num_rows($result)) {
		$err = 'podany adres e-mail jest ju¿ w bazie, podaj inny';
		}
	}
	
// CZY WPISANO LOGIN
if ($login == '') {
	$err = 'musisz wpisaæ jaki¶ login... :/';
	}
	

// CZY NIE MA JUZ TAKIEGO UZYTKOWNIKA
$sql = 'SELECT id FROM users WHERE login="' . $login . '"';
$result = mysql_query($sql);
if (mysql_num_rows($result)) {
	$err = 'w bazie jest ju¿ u¿ytkownik z tym loginem, podaj inny';
	}
		
$activationstring = md5($login . $pass . $email);

$added = date('Y-m-d H:i:s');

/*print ('LOGIN:&nbsp;' . $login . '<BR>');
print ('PASS:&nbsp;' . md5($pass) . '<BR>');
print ('EMAIL:&nbsp;' . $email . '<BR>');
print ('MIEJSCOWOSC:&nbsp;' . $place . '<BR>');
print ('WOJEWODZTWO:&nbsp;' . $wojewodztwo . '<BR>');
print ('PLEC:&nbsp;' . $gender . '<BR>');
print ('AS:&nbsp;' . $activationstring . '<BR>');

*/

if (!isset($err)) {

	$sql = 'INSERT INTO users (login, urlname, pass, email, place, woje, gender, birthyear, added) VALUES ' .
	'("' . $login . '", "' . $urlname . '", "' . md5($pass1) . '", "' . $email . '", "' . $miasto . '", "' . $wojewodztwo . '", "' . $plec . '", "' . $dataurodzenia . '", "' . $added . '")';
	$result = mysql_query($sql);
	$insertid = mysql_insert_id();

	$sql = 'INSERT INTO users_activations (userid, activationstring) VALUES (' . $insertid . ', \'' . $activationstring . '\')';
	$result = mysql_query($sql);	

	// wyslanie maila z activattion string
$msg ='Witaj,
	
Ten mail zosta³ wys³any automatycznie,
celem potwierdzenia za³o¿enia konta na www.hhbd.pl.

ZA£O¯ONE KONTO: ' . $login . '

Kliknij w link poni¿ej, ¿eby dokoñczyæ aktywacjê konta:
http://www.hhbd.pl/aktywuj/' . $insertid . '/' . $activationstring . '

Je¿eli nie wiesz czemu dosta³eœ tego maila,
po prostu go zignoruj - kolejne nie bêd± wysy³ane.

pozdrawiamy,
hhbd.pl

-- 
HIP-HOPOWA BAZA DANYCH
http://www.hhbd.pl';

$naglowki  = "MIME-Version: 1.0\r\n";
$naglowki .= "Return-Path: <hhbd@hhbd.pl>\r\n";
$naglowki .= "Content-type: text/plain; charset=ISO-8859-2\r\n";
$naglowki .= "Content-Transfer-Encoding: 8bit\r\n";
$naglowki .= "From: Rejestrator <hhbd@hhbd.pl>\r\n";
$naglowki .= "Bcc: hhbd@hhbd.pl\r\n";
$naglowki .= "Return-Path: hhbd@hhbd.pl\r\n";



 
	if (!(@mail($email, 'hhbd.pl, aktywacja konta: ' . $login, $msg, $naglowki))) {
		// usuniecie z bazy, tego do ktorego mail nie mogl zostac wyslany
		$sql = 'DELETE FROM users WHERE id="' . $insertid . '"';
		@mysql_query($sql);
		$sql = 'DELETE FROM users_activations WHERE userid="' . $insertid . '"';
		@mysql_query($sql);
		// **************		
		//BLAD MAILERA...
		// **************

		$smarty->assign('infotype' , 'error');
		$smarty->assign('info', 'Mail potwierdzaj±cy nie mo¿e zostaæ wys³any, konto nie zosta³o za³o¿one, spróbuj pó¼niej.');
		$smarty->assign('ctitle', 'B£¡D SERWERA POCZTY');
		include ('info.php');
		}
	else {
	
		//TUTAJ STRONA INFORMUJACA ZE KONTO ZOSTALO ZALOZONE
		$smarty->assign('infotype' , 'ok');
		$smarty->assign('info', 'Konto zosta³o za³o¿one, aby je aktywowaæ odbierz mail z konta: ' . $email . '.');
		$smarty->assign('ctitle', 'Nowe Konto');
		include ('info.php');
		}
	}
else {

	$smarty->assign ('login', $login);
	$smarty->assign ('miasto', $miasto);
	$smarty->assign ('email', $email);
	
	$smarty->assign ('wojewodztwo', $wojewodztwo);
	$smarty->assign ('dataurodzenia', $dataurodzenia);
	$smarty->assign ('plec', $plec);

	include ('user/new-account-form.php');
	
	}
	



?>