<?php

session_start();

// if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=false){
//  //$Ulogout=true;
//    header("location:login.php");
// }

session_unset();
session_destroy();
header("location:/proctoring/home.php");

?>