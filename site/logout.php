<?php
# ****************************************
# autor: Jakub 'feedel' Ku³ak
# data utworzenia: 22.10.2004
# projekt: www.4fun.pl, www.forfun.pl
# email: jakubkulak at interia dot pl
# @version $Id$
#                                        
# plik logujacy uzytkownika        
# ****************************************

$_SESSION['hhbdlogin'] = null;
$_SESSION['hhbduserid'] = null;

//print ('hhbdlogin: ' . $_SESSION['hhbdlogin']);

//header('Location: /glowna');
$smarty->assign('body_template', 'site/main.tpl');


?>