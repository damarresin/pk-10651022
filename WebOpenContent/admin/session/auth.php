<?php
session_start(); //memulai session
include('../config/config.php');
$username = $_POST['username'];
$password = md5($_POST['password']);

// untuk mencegah sql injection
// kita gunakan mysql_real_escape_string
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);

// cek data yang dikirim, apakah kosong atau tidak
if (empty($username) && empty($password)) {
	// kalau username dan password kosong
	header('location:../index.php?error=1');
	break;
} else if (empty($username)) {
	// kalau username saja yang kosong
	header('location:../index.php?error=2');
	break;
} else if (empty($password)) {
	// kalau password saja yang kosong
	header('location:../index.php?error=3');
	break;
}


//query untuk mengambil data user dari database sesuai dengan username inputan form
$q = "SELECT * FROM users WHERE username = '$username' ";
$result = mysql_query($q);
$data = mysql_fetch_array($result);
//cek kesesuaian password masukan dengan database
if ($password == $data['password']) {
//menyimpan tipe user dan username dalam session
	// kalau username dan password sudah terdaftar di database
	// buat session dengan nama username dengan isi nama user yang login
	$_SESSION['username'] = $username;
	$_SESSION['role'] = $data['role'];
	
	// redirect ke halaman users [menampilkan semua users]
	header('location:../');
}
//jika password tidak sesuai
else {
	// kalau username ataupun password tidak terdaftar di database
	header('location:../index.php?error=4');
}
?> 