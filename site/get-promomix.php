<?php

$sql = 'UPDATE album_promomixes SET hits=(hits+1) WHERE urlname="' . $id . '"';
@mysql_query($sql);

$sql = 'SELECT promomix FROM album_promomixes WHERE urlname="' . $id . '"';
$result = @mysql_query($sql);
$row = @mysql_fetch_array($result);



header('Location: ' . $row['promomix']);	


?>