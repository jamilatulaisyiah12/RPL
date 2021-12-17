<?php
session_start();
include'koneksi.php';

if(isset($_POST['login'])){
	$password = mysqli_real_escape_string($koneksi, $_POST['password']);
	$data_akses = mysqli_query($koneksi, "SELECT * FROM login INNER JOIN tabel_dpt ON login.username = tabel_dpt.username WHERE password='$password'");
	// echo "SELECT * FROM login INNER JOIN tabel_dpt ON login.username = tabel_dpt.username WHERE password='$password'";
	// die();
	$r = mysqli_fetch_array($data_akses);
	$username = $r['username'];
	$password = $r['password'];
	$nama = $r['nama'];
	$level = $r['level'];
	if( mysqli_num_rows($data_akses) === 1 ){
		$_SESSION["login"] = true;
		$_SESSION['username'] = $username;
		$_SESSION['nama'] = $nama;
		$_SESSION['password'] = $password;
		$_SESSION['level'] = $level;
		header('location:sistem');
	}else{
		echo "<script type='text/javascript'>
		setTimeout(function () {
			swal({
				title: 'Password Salah',
				type: 'warning',
				timer: 3200,
				showConfirmButton: true
				});
				},10);
				window.setTimeout(function(){
					window.location.replace('index.php');
					},3000);
					</script>";
				}
			}
			?>
			<!DOCTYPE html>
			<html lang="en">
			<style>
				body { 
					background-image: url(sekola.jpg);

				}
			</style>
			<head>
				<title>E-VOTE SMK SP</title>
				<meta charset="UTF-8">
				<meta name="viewport" content="width=device-width, initial-scale=1">
				<link rel="stylesheet" type="text/css" href="fontawesome-free/css/all.min.css">
				<link rel="stylesheet" type="text/css" href="css/sweetalert.css">
				<!--===============================================================================================-->	
				<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
				<!--===============================================================================================-->
				<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
				<!--===============================================================================================-->
				<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
				<!--===============================================================================================-->
				<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
				<!--===============================================================================================-->	
				<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
				<!--===============================================================================================-->
				<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
				<!--===============================================================================================-->
				<link rel="stylesheet" type="text/css" href="css/util.css">
				<link rel="stylesheet" type="text/css" href="css/main.css">
				<!--===============================================================================================-->
			</head>
			<body>

				<div class="limiter">
					<div class="container-login100">
						<div class="wrap-login100">
							<div class="login100-pic js-tilt" data-tilt>
								<br>
								<br><br><br>
								<img src="images/logo_smk.png" alt="IMG">
							</div>

							<form class="login100-form validate-form" action="" method="post">
								<span class="login100-form-title">
									SILAHKAN LOG IN UNTUK MELAKUKAN
									PEMILIHAN KETUA DAN WAKIL KETUA OSIS
									SMK SIDING PURI SUMENEP
								</span>
								Username
								<div class="wrap-input100 validate-input">
									<input class="input100" type="text" name="username" placeholder="Masukan username..." autocomplete="off" required="required">
									<span class="focus-input100"></span>
									<span class="symbol-input100">
										<i class="fa fa-user" aria-hidden="true"></i>
									</span>
								</div>
								Password
								<div class="wrap-input100 validate-input">
									<input class="input100" type="password" name="password" placeholder="Masukkan Password..." autocomplete="off" required="required">
									<span class="focus-input100"></span>
									<span class="symbol-input100">
										<i class="fa fa-lock" aria-hidden="true"></i>
									</span>
								</div>

								<div class="container-login100-form-btn">
									<button class="login100-form-btn" name="login" id="login">
										Log In
									</button>
								</div>
								
								<br><br>
								<div class="text-center p-t-12">
									<span class="txt1">
									</span>
									<a class="txt2" href="#">
										<p>&copy;Copyright SMKSIDINGPURI<?php echo date('Y') ?></p>
									</a>
								</div>


							</form>
						</div>
					</div>
				</div>

				<script src="js/sweetalert.min.js"></script>
				<!--===============================================================================================-->	
				<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
				<!--===============================================================================================-->
				<script src="vendor/bootstrap/js/popper.js"></script>
				<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
				<!--===============================================================================================-->
				<script src="vendor/select2/select2.min.js"></script>
				<!--===============================================================================================-->
				<script src="vendor/tilt/tilt.jquery.min.js"></script>
				<script >
					$('.js-tilt').tilt({
						scale: 1.1
					})
				</script>
				<!--===============================================================================================-->
				<script src="js/main.js"></script>

			</body>
			</html>