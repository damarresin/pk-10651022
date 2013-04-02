<?php
 
// setting koneksi ke database
mysql_connect("localhost", "root", ""); // isikan nama server, username, dan password Anda
mysql_select_db("counter_db"); // nama database yang Anda gunakan
 
function initCounter() {
 
     $ip = $_SERVER['REMOTE_ADDR']; // menangkap ip pengunjung
     $location = $_SERVER['PHP_SELF']; // menangkap server path
 
     //membuat log dalam tabel database 'counter'
     $create_log = mysql_query("INSERT INTO counter(ip,location)VALUES('$ip', '$location') ");
 
}
 
function getCounter($mode, $location = NULL) {
 
if(is_null($location)) {
     $location = $_SERVER['PHP_SELF'];
}
 
if($mode == "unique") {
     $get_res = mysql_query("SELECT DISTINCT ip FROM counter WHERE location = '$location' ");
}     else{
     $get_res = mysql_query("SELECT ip FROM counter WHERE location = '$location' ");
}
 
$res = mysql_num_rows($get_res);
 
return $res;
 
}
 
?>