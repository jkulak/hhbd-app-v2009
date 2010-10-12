<?php

defined('PHPENV') ||
  define('PHPENV', (getenv('PHPENV') ? getenv('PHPENV') : 'PROD'));

defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__)));

define('MODELS_DIRECTORY', APPLICATION_PATH . '/Models');
define('LIBRARY_DIRECTORY', APPLICATION_PATH . '/Library');

error_reporting(E_ALL & ~E_NOTICE);

if (isset($_COOKIE[session_name()])) { session_start(); }

require_once('smarty/SmartyDir.class.php');
$smarty = new SmartyDir();

include ('include/connect-to-database.php');
include ('include/date-functions.php');


$addres = explode('/', $_GET['url']);

if (isset($addres[0])) {
  $s = $addres[0];
}

if (isset($addres[1])) {
  $id = $addres[1];
}

if (isset($addres[2])) {
  $add = $addres[2];
}

// header stats
include ('header-stats.php');

include ('load-site.php');

if (isset($_SESSION['hhbdlogin'])) { 
	$smarty->assign('hhbdlogin', $_SESSION['hhbdlogin']);
	$smarty->assign('hhbdurlname', $_SESSION['hhbdurlname']);
	$smarty->assign('hhbduserid', $_SESSION['hhbduserid']);
	}
	
if (isset($_SESSION['errmsg'])) {
	$smarty->assign('errmsg', $_SESSION['errmsg']);
	$_SESSION['errmsg'] = null;
	}

$smarty->debugging = false;

$smarty->display('index.tpl');

?>
