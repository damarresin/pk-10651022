<?php
// panggil script class
include 'captcha/class-captcha.php';
// membuat obyek class
$captcha1 = new mathcaptcha();

// jika kode hasil perhitungan dari session sama dengan kode
// yang dimasukkan user, maka kode captcha cocok
if ($captcha1->resultcaptcha() == $_POST['kode'])
{
	$username = $_POST['username'];
				$query = mysql_query("select * from users where username='$username'");

				$data = mysql_fetch_array($query);

				if (mysql_num_rows($query) == 1) {
?>				
									<form action="?hal=question" method="post" style="color:white;width:350px; margin:auto; margin-top:10%;">
											<fieldset class="login">
												<legend style="color:skyblue">Verifikasi Akun</legend>
												<span style="color:red">
												<p>Username <?php echo $data['username'];?> Terdaftar</p>
												</span>
												<div>
												<input type="hidden" name="username" value="<?php echo $data['username'];?>" required/>
												</div>
												<div>
												  <input type="submit" class="btnLogin" value="Next">
												</div>
											</fieldset>
									</form>
<?php					
				
				}
				else { //jika tidak terdaftar maka
?>				
									<form action="?hal=forgot" method="post" style="color:white;width:350px; margin:auto; margin-top:10%;">
											<fieldset class="login">
												<legend style="color:skyblue">Verifikasi Akun</legend>
												<span style="color:red">
												<p>Username <?php echo $_POST['username'];?> TIDAK Terdaftar</p>
												</span>
												<div>
												  <input type="submit" class="btnLogin" value="Ok">
												</div>
											</fieldset>
									</form>
<?php
				}

}
else
{
?>
									<form action="?hal=forgot" method="post" style="color:white;width:350px; margin:auto; margin-top:10%;">
											<fieldset class="login">
												<legend style="color:skyblue">Verifikasi Akun</legend>
												<span style="color:red">
												<p>Kode SALAH, Mohon Ulangi</p>
												</span>
												<div>
												  <input type="submit" class="btnLogin" value="Ok">
												</div>
											</fieldset>
									</form>
<?php
}

//echo "<p><a href='../?hal=forgot'>Ulangi Entri</a></p>";

?>
