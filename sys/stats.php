<?php

if ($_SESSION['hhbdlogin'] != 'fee') {
	Header ('Location: /');
	exit;
	}


function show_host_click_count() {
	$sql = 'SELECT COUNT(host) AS hostcount, host, ip FROM stats GROUP BY host ORDER BY hostcount DESC LIMIT 20';
	$result = mysql_query($sql);
	// ERROR POKAZUJE
	print (mysql_error());
	print ('<ul>');
	$inum = 1;
	while ($row = mysql_fetch_array($result)) {
		print ('<li>' . $inum++ . '. <strong>' . $row['host'] . '</strong> (' . $row['ip'] . ') - <strong>' . $row['hostcount'] . '</strong></li>');
		}
	}

$last_clicks = array();

$sql = 'SELECT date, s, sid, additional, ip FROM stats ORDER BY date DESC LIMIT 500';
$result = mysql_query($sql);

$inum = 1;
while ($row = mysql_fetch_array($result)) {
	$s = ($row['s'] == '') ? 'glowna' : $row['s'];
	$adres = $s . (($row['sid'] != '') ? '/' . $row['sid'] : '') . (($row['additional'] != '') ? '/' .  $row['additional'] : '');
	array_push($last_clicks, show_time_from_timestamp($row['date'], ':') . ' (' . gethostbyaddr($row['ip']) . ') <a href="/' . $adres . '" target="_blank">' . $adres . '</a>');
	}
$smarty->assign('last_clicks', $last_clicks);


$sql = 'SELECT COUNT(id) AS clickcount FROM stats';
$result = @mysql_query($sql);
$row = mysql_fetch_array($result);
$smarty->assign('all_count', $row['clickcount']);

$wczoraj = date('Ymd');
$wczoraj = (($wczoraj) - 1) . '235959';
$sql = 'SELECT COUNT(id) AS clickcount FROM stats WHERE (date>"' . $wczoraj . '")';
$result = mysql_query($sql);
$row = mysql_fetch_array($result);
$smarty->assign('today_count', $row['clickcount']);
	
$dzisiaj = date('Ymd');
$przedwczoraj = (($dzisiaj) - 2) . '235959';
$dzisiaj = $dzisiaj  . '000000';
$sql = 'SELECT COUNT(id) AS clickcount FROM stats WHERE (date>"' . $przedwczoraj . '" AND date<"' . $dzisiaj . '")';
$result = mysql_query($sql);
$row = mysql_fetch_array($result);
$smarty->assign('yesterday_count', $row['clickcount']);



//*****************************************************************	
$smarty->assign('sectiontitle', 'ostatnie kliniêcia');
$smarty->assign('title', 'HHBD.PL | STATYSTYKI');
$smarty->assign('ctitle', 'statystyki');
$smarty->assign('body_template', 'sys/stats.tpl');
//*****************************************************************

?>