<?php



$sql = 'SELECT id FROM songs WHERE urlname="' . $id . '"';
$row = @mysql_fetch_array(@mysql_query($sql));
$rid = $row['id'];

$sql = 'UPDATE lalalab_songs SET hits=(hits+1) WHERE songid=' . $rid;
@mysql_query($sql);

$sql = 'SELECT ringtoneurl FROM lalalab_songs WHERE songid=' . $rid;
$result = mysql_query($sql);
$row = @mysql_fetch_array($result);



header('Location: http://www.lalalab.pl/ringtone.action?id=' . $row['ringtoneurl']);	


?>