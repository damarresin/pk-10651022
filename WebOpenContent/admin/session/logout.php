<?php
//script from http://stackoverflow.com/questions/11607155/php-logout-script
include('../config/config.php');
    session_start();
    session_destroy();
    $username = $_SESSION['username'];
setcookie($username, time()-3600);  
    header('location:../');
    die;    
?>
