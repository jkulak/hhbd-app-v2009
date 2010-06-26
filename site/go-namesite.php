<?php


$sql = 'UPDATE artists SET hits=(hits+1) WHERE id=' . $id;
@mysql_query($sql);

$sql = 'SELECT website FROM artists WHERE id=' . $id;
$result = mysql_query($sql);
$row = @mysql_fetch_array($result);

header('Location: ' . $row['website']);	


?>