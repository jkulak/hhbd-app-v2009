<?php
# ****************************************
# autor: Jakub 'feedel' Ku�ak
# data utworzenia: 22.10.2004
# projekt: www.4fun.pl, www.forfun.pl
# email: jakubkulak at interia dot pl
# @version $Id$
#                                        
# plik logujacy uzytkownika        
# ****************************************

session_start();

$sql = 'SELECT id, login, urlname, lastlogin, pass, status FROM users WHERE login="' . $_POST['login'] . '"';
$result = mysql_query($sql);
$row = mysql_fetch_array($result);

if(mysql_num_rows($result) == 1) { 
	if ($row['status'] != 0) {
		if ($row['pass'] == md5($_POST['pass'])){
			$timeslogedin = $row['timeslogedin'];
			

			
			$_SESSION['hhbdlogin'] = $row['login'];
    		$_SESSION['hhbdurlname'] = $row['urlname'];    		    
			$_SESSION['hhbduserid'] = $row['id'];  
    		$sql = 'UPDATE users SET lastlogin="' . date("Y-m-d H:i:s") . '", timesloggedin=(timesloggedin+1) WHERE urlname="' . $row['urlname'] . '"';
    		$result = mysql_query($sql);    			
			header('Location: /'); 			
		
			}
		else {
			$smarty->assign('loginname', $_POST['login']);
			$smarty->assign('errmsg', 'Wpisa�e� niepoprawne has�o - Spr�buj jeszcze raz');
			}
		}
	else {
		$smarty->assign('errmsg', 'Konto oczekuje na aktywacj�');
		}       
    } 
else {
	if($num == 0) { 
		$smarty->assign('errmsg', 'nieznany u�ytkownik');
    	}
  	else {
		$smarty->assign('errmsg', 'wtf?');
		}
	}
include ('site/main.php');
?>