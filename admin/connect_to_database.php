<?php
# ****************************************
# autor: Jakub 'feedel' Ku³ak
# data utworzenia: 22.10.2004
# projekt: www.4fun.pl, www.forfun.pl
# email: jakubkulak at interia dot pl
# @version $Id$
#                                        
# Zestaw ogolno uzywanych funkcji        
# ****************************************

  // Connect to the database server
  $sql = mysql_connect('sql.cal.pl', 'hhbd_hhbd', 'web');
    if (!$sql) {
      print ("Nie mozna sie polaczyc z baza: " . mysql_error() . "<br>");
      exit();
      }

  $nazwa_bazy = 'hhbd_hhbd';  
  
  if (! @mysql_select_db($nazwa_bazy) ) {
      print ("Nie mozna odnalezc bazy: $nazwa_bazy (" . mysql_error() . ")<br>");
      exit();
	  }

?>