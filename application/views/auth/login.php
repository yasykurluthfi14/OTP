<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>Login Page</title>
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
											<span class="text-muted">Login Page</span>
										</div>
										<?= $this->session->flashdata('pesan'); ?>
										<?= form_open('', ['class' => 'user']); ?>
										<div class="form-group">
											<input autofocus="autofocus" autocomplete="off" value="<?= set_value('username'); ?>" type="text" name="username" class="form-control form-control-user" placeholder="Username">
											<?= form_error('username', '<small class="text-danger">', '</small>'); ?>
										</div>
										<div class="form-group">
											<input type="password" name="password" class="form-control form-control-user" placeholder="Password">
											<?= form_error('password', '<small class="text-danger">', '</small>'); ?>
										</div>
										<button type="submit" class="btn btn-primary btn-user btn-block">
											Login
										</button>
										<div class="text-center mt-4">
											<a class="small" href="<?= base_url('Auth/register') ?>">Create an account!</a>
										</div>
										<?= form_close(); ?>
										<br>
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

