<?

include 'ses.config.php';

if($_COOKIE["sess"]!="") {
  $sess=update_session();
  }
else {
  $sess=new_session();
  }

$_session = get_session_vars($sess);

?>