<?php

$activatestring = $add;

$sql = 'SELECT userid, activationstring FROM users_activations WHERE userid=' . $id;
$result = @mysql_query($sql);
$row = @mysql_fetch_array($result);
if (@mysql_num_rows($result) == 1) {
	if ($row['activationstring'] == $activatestring) {
		$sql = 'SELECT login FROM users WHERE id=' . $id;
		$result = @mysql_query($sql);
		$row = @mysql_fetch_array($result);
		$login = $row['login'];
		
		// usuniecie oczekiwania na aktywacje z tabeli oczekujacych aktywacji
		$sql = 'DELETE FROM users_activations WHERE userid=' . $id;
		$result = @mysql_query($sql);
		
		// ustawienie statusu na 1 - czyli zywkly uzytkownik
		$sql = 'UPDATE users SET status=1 WHERE id=' . $id;
		$result = @mysql_query($sql);
		
		$smarty->assign('info', 'Aktywacja powiod³a siê! Witaj <strong>' . $login . '</strong> w gronie u¿ytkowników HIP-HOPOWEJ BAZY DANYCH!');
		
		}
	else {
		$smarty->assign('info', 'Numer aktywacyjny niepoprawny. Spróbuj jeszcze raz.');
		}		
	}
else {
	$smarty->assign('info', 'Proszê spróbowaæ za jaki¶ czas.');
	// email do szefa, ze cos jest nie tak	
	@mail('error@hhbd.pl', 'aktywacja konta', 'id: ' . $id . ' wystepuje w tabeli users_activations: ' . mysql_num_rows($result) . ' razy.');
	}

$smarty->assign('ctitle', 'AKTYWACJA KONTA');
include ('info.php');

?>