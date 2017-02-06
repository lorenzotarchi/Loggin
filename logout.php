<?php
session_start();
$_SESSION = array();
session_destroy(); 
 

$msg = "Log-out effettuato";
 

$msg = urlencode($msg); 
 
header("location: iniziale.php?msg=$msg");
exit();
?>