<?php
session_start();
include "../config/config.php";
$userid = $_SESSION['userid'];
$pesan = mysql_query("SELECT nomor FROM tabel_messages
    WHERE kepada='$userid' and sudahbaca='N'");
$j = mysql_num_rows($pesan);
if($j>0){
    echo $j;
}
?>
