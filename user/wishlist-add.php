<?php
# ****************************************
# autor: Jakub 'feedel' Ku³ak
# data utworzenia: 22.10.2004
# projekt: www.4fun.pl, www.forfun.pl
# email: jakubkulak at interia dot pl
# @version $Id$
#                                        
# plik dodajacy plyte do chcekolekcji        
# ****************************************

if (!isset($_SESSION['hhbdlogin'])) {
	header ( 'Location: /');
	}
else {
	$sql = 'SELECT id FROM albums WHERE urlname="' . $id . '"';
	$row = @mysql_fetch_array(@mysql_query($sql));
	$rid = $row['id'];

	$sql = 'INSERT INTO wishlist (userid, albumid) VALUES (' . $_SESSION['hhbduserid'] . ', ' . $rid . ')';
	$result = @mysql_query($sql);
	header('Location: /a/' . $id);
	}
	






?>