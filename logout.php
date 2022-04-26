<?php
// $_SESSION["autenticado"] = 0;
// session_start();
//     session_unset();
//     session_destroy();
//     session_write_close();
//     setcookie(session_name(),'',0,'/');
//     session_regenerate_id(true);

// setcookie("usuario", "", time()-3600);
setcookie("PHPSESSID", "", time()-3600);
// $objDateTime = new DateTime('NOW');
// setcookie("PHPSESSID", "", $objDateTime);
session_start();
$_SESSION = array();
session_destroy();
header ("location: login.php");


?>