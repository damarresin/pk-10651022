<?phpsession_start(); //memulai sessioninclude('../config/config.php');$username = $_POST['username'];$password = md5($_POST['password']);$select = "SELECT * FROM users WHERE username = '$username' ";$result = mysql_query($select);$data = mysql_fetch_array($result);$id = $data['id_user'];$reset="update users set password='$password' where id_user='$id'";$save=mysql_query($reset);if ($save){echo "<script>window.alert('Sukses Reset')</script>";echo "<meta http-equiv='refresh' content='0; url=../index.php?hal=login'>"; } else { echo "<meta http-equiv='refresh' content='0; url=../'>"; }?>						