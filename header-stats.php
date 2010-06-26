<?php

$sql = 'SELECT id FROM albums';
$result = @mysql_query($sql);
$smarty->assign('album_count', mysql_num_rows($result));

$sql = 'SELECT id FROM artists';
$result = @mysql_query($sql);
$smarty->assign('artist_count', mysql_num_rows($result));

$sql = 'SELECT id FROM labels';
$result = @mysql_query($sql);
$smarty->assign('label_count', mysql_num_rows($result));

$sql = 'SELECT id FROM news';
$result = @mysql_query($sql);
$smarty->assign('news_count', mysql_num_rows($result));

$sql = 'SELECT id FROM concerts';
$result = @mysql_query($sql);
$smarty->assign('concert_count', mysql_num_rows($result));

$sql = 'SELECT id FROM clips';
$result = @mysql_query($sql);
$smarty->assign('clip_count', mysql_num_rows($result));

$sql = 'SELECT id FROM album_prices';
$result = @mysql_query($sql);
$smarty->assign('price_count', mysql_num_rows($result));

$sql = 'SELECT id FROM albums WHERE (year' . '>"' . date('Y-m-d') . '")';
$result = @mysql_query($sql);
$smarty->assign('announce_count', mysql_num_rows($result));
?>