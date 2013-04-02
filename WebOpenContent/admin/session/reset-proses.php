<?php
$username = $_POST['username'];
$jawab2 = $_POST['jawab2'];
//query untuk mengambil data user dari database sesuai dengan username inputan form
$q = "SELECT * FROM users WHERE username = '$username' ";
$result = mysql_query($q);
$data = mysql_fetch_array($result);
//cek kesesuaian password masukan dengan database
if ($jawab2 == $data['jawab2']) {
?>
						<form action="session/reset.php" method="post" style="color:white;width:350px; margin:auto; margin-top:10%;">
							<fieldset class="login">
								<legend style="color:skyblue">Reset Password</legend>
								<span style="color:red">
								<p>Enter Your New Password </p>
								</span>
								<div>
								<input type="password" name="password" placeholder="Password" required/>
								<input type="hidden" name="username" value="<?php echo $data['username']; ?>" required/>
								</div>
								<div>
								<input type="submit" class="btnLogin" value="Reset">
								</div>
							</fieldset>
						</form>
<?php					
				
				}
				else { //jika tidak terdaftar maka
?>				
									<form action="?hal=forgot" method="post" style="color:white;width:350px; margin:auto; margin-top:10%;">
											<fieldset class="login">
												<legend style="color:skyblue">Verifikasi Jawab</legend>
												<span style="color:red">
												<p>Jawaban II Tidak Sesuai</p>
												</span>
												<div>
												  <input type="submit" class="btnLogin" value="Ok">
												</div>
											</fieldset>
									</form>
<?php
				}

?>						