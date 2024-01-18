<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>Validation OTP</title>
		<!-- Custom fonts for this template-->
		<link href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet" type="text/css">
		<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
		<link rel="shortcut icon" href="<?=  base_url('assets/img/favicon.png');?>">
		<!-- Custom styles for this template-->
		<link href="<?= base_url('assets/css/sb-admin-2.min.css'); ?>" rel="stylesheet">
		<style>
			.bg-login-image {
				background-image: url("<?= base_url('assets/img/finance_0bdk.svg'); ?>");
				background-repeat: no-repeat;
				background-size: 80%;
			}
		</style>
		<?php
		$id_user = $_SESSION['id_user'];
		date_default_timezone_set('Asia/Jakarta');
		$hostname 	= 'localhost';
		$username 	= 'root';
		$password 	= '';
		$dbname 	= 'demo';
		$conn = mysqli_connect($hostname, $username, $password, $dbname);
		if (!isset($_POST['submit-otp'])) { 
		$q = mysqli_query($conn, "SELECT * FROM user WHERE id_user = $id_user");
		$hasil = mysqli_fetch_array($q);
		}
		if (isset($_POST['submit-otp'])) {
			$nomor = mysqli_escape_string($conn, $_POST['nomor']);
			if ($nomor) {
				if (!mysqli_query($conn, "DELETE FROM otp WHERE nomor = $nomor")) {
					echo ("Error description: " . mysqli_error($con));
				}
				$curl = curl_init();
				$otp = rand(100000, 999999);
				$waktu = time();
				mysqli_query($conn, "INSERT INTO otp (nomor,otp,waktu) VALUES ( $nomor ,$otp , $waktu )");
				$data = [
					'target' => $nomor,
					'message' => "Your OTP : " . $otp,
					'countryCode' => '0'
				];
				curl_setopt(
					$curl,
					CURLOPT_HTTPHEADER,
					array(
						"Authorization: @0XJg-iTDfjcq!J3ZDDh",
					)
				);
				curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
				curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
				curl_setopt($curl, CURLOPT_URL, "https://api.fonnte.com/send");
				curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
				curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
				$result = curl_exec($curl);
				curl_close($curl);
			}
		} elseif (isset($_POST['submit-login'])) {
			$otp = mysqli_escape_string($conn, $_POST['otp']);
			$nomor = mysqli_escape_string($conn, $_POST['nomor']);
			$q = mysqli_query($conn, "SELECT * FROM otp WHERE nomor = $nomor AND otp = $otp");
			$row = mysqli_num_rows($q);
			$r = mysqli_fetch_array($q);
			if ($row) {
				if (time() - $r['waktu'] <= 300) {
					if ($hasil['status'] == '0') {
						redirect('User/control_access');
					}elseif($hasil['status'] == '2'){
						redirect('User');
					}
				} else {
					set_pesan('Kode OTP Expired',false);
					redirect('auth');
				}
			} else {
				set_pesan('Kode OTP Salah, Silahkan Login Kembali',false);
				redirect('auth');
			}
		}
		?>
	</head>
	<body class="bg-gradient-primary">
		<div class="container">
			<div class="row justify-content-center mt-5 pt-lg-5">
				<div class="col-xl-10 col-lg-12 col-md-9">
					<div class="card o-hidden border-0 shadow-lg">
						<div class="card-body p-lg-5 p-0">
							<!-- Nested Row within Card Body -->
							<div class="row">
								<div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
								<div class="col-lg-6">
									<div class="p-5">
										<div class="text-center mb-4">
											<span class="text-muted">Validation OTP</span>
										</div>
										<?= $this->session->flashdata('pesan'); ?>
										<form method="POST" action="" accept-charset="utf-8" >				
										<center>
											<div style="display: <?php echo isset($_POST['submit-otp']) ? "none" : "flex" ?>;flex-direction:column;margin-bottom:10px;box-sizing:border-box;">
											<label for="nomor" style="text-align: left;margin-bottom:5px;">Phone Number</label> 
											<?php if (!isset($_POST['submit-otp'])) { ?>
											<input name="nomor" type="text" id="nomor" value="<?php echo $hasil['phone_number']?>" readonly style="padding:8px;border:2px solid lightgray;border-radius:5px;" 
											<?php } ?>
											/></div>
											<?php
											if (isset($_POST['submit-otp'])) { ?>
												<div style="display: flex;flex-direction:column;margin-bottom:10px;"><label for="otp" style="text-align: left;margin-bottom:5px;box-sizing:border-box;"></label> 
												<input name="nomor" type="text" id="nomor" value="<?php echo $nomor?>" hidden>
												<input placeholder="Enter 6-Digit OTP Code" name="otp" type="text" id="otp" style="padding:8px;border:2px solid lightgray;border-radius:5px;" /></div>
											<?php }
											if (!isset($_POST['submit-otp'])) { ?>
												<button type="submit" id="btn-otp" name="submit-otp" class="btn btn-primary btn-user btn-block">
												Request OTP
												</button>
												<div class="text-center mt-2">
													<a class="btn btn-warning btn-user btn-block" href="<?= base_url('auth') ?>">Back to Login Page!</a>
												</div>
											<?php }
											if (isset($_POST['submit-otp'])) { ?>
												<button type="submit" id="btn-login" class="btn btn-primary btn-user btn-block" name="submit-login">Login</button>
												<div class="text-center mt-2">
													<a class="btn btn-warning btn-user btn-block" href="<?= base_url('auth') ?>">Back to Login Page!</a>
												</div>
											<?php }  ?>
										</center>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
	<!-- Bootstrap core JavaScript-->
	<script src="<?= base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
	<script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
	<!-- Core plugin JavaScript-->
	<script src="<?= base_url('assets/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>
	<!-- Custom scripts for all pages-->
	<script src="<?= base_url('assets/js/sb-admin-2.min.js'); ?>"></script>
</html>
<!-- Outer Row -->




