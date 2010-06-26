<?php


$sql = 'UPDATE album_prices SET hits=(hits+1) WHERE id=' . $id;
@mysql_query($sql);

$sql = 'SELECT link FROM album_prices WHERE id=' . $id;
$result = mysql_query($sql);
$row = @mysql_fetch_array($result);

header('Location: ' . $row['link']);	


?>