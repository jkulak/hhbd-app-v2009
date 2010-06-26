<?php
# ****************************************
# autor: Jakub 'feedel' Ku³ak
# data utworzenia: 01.12.2004
# projekt: www.hhbd.pl
# email: jakubkulak at interia dot pl
# @version $Id$
#                                        
# plik skryptu dodajacego ocene albumu
# ****************************************

if (!isset($_SESSION['hhbdlogin'])) {
	header ( 'Location: /');
	}
else {
	$id = $id;
	$userid = $_SESSION['hhbduserid'];
	$rate = $add;
	
	if (($rate < 1) OR ($rate > 10)) { 
        header ( 'Location: /');
		}

	$sql = 'SELECT id FROM albums WHERE urlname="' . $id . '"';
	$row = @mysql_fetch_array(@mysql_query($sql));
	$rid = $row['id'];
	
	$sql = 'DELETE FROM ratings WHERE (albumid=' . $rid . ' AND userid=' . $userid . ')';
	@mysql_query($sql);
	
	$sql = 'SELECT AVG(rate) AS avgvote FROM ratings WHERE albumid=' . $rid;
	$votes = @mysql_fetch_array(@mysql_query($sql));
	$rate = $votes['avgvote'];
	
	$sql = 'UPDATE ratings_avg SET rating="' . $rate . '" WHERE albumid="' . $rid . '"';
	if (@mysql_affected_rows(@mysql_query($sql)) == 0) {
		$sql = 'INSERT INTO ratings_avg (albumid, rating) VALUES (' . $rid . ', ' . $rate . ')';
		@mysql_query($sql);
		}

	
	header('Location: /a/' . $id);	
	}
	
	
?>
