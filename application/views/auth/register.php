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

<!-- Outer Row -->
<div class="row justify-content-center mt-5">

	<div class="col-xl-10 col-lg-12 col-md-9">

		<div class="card o-hidden border-0 shadow-lg">
			<div class="card-body p-lg-5 p-0">
				<div class="p-4">
					<div class="text-center mb-4">
						<span class="text-muted">Create Account</span>
					</div>
					<?= $this->session->flashdata('pesan'); ?>
					<?= form_open('', ['class' => 'user']); ?>
					<div class="form-group">
						<input autofocus="autofocus" autocomplete="off" value="<?= set_value('username'); ?>" type="text" name="username" class="form-control form-control-user" placeholder="Username">
						<?= form_error('username', '<small class="text-danger">', '</small>'); ?>
					</div>
					<div class="row">
						<div class="col">
							<div class="form-group">
								<input type="password" name="password" class="form-control form-control-user" placeholder="Password">
								<?= form_error('password', '<small class="text-danger">', '</small>'); ?>
							</div>
						</div>
						<div class="col">
							<div class="form-group">
								<input type="password" name="password2" class="form-control form-control-user" placeholder="Confirm Password">
								<?= form_error('password2', '<small class="text-danger">', '</small>'); ?>
							</div>
						</div>
					</div>
					<div class="form-group">
						<input value="<?= set_value('name'); ?>" type="text" name="name" class="form-control form-control-user" placeholder="Name">
						<?= form_error('name', '<small class="text-danger">', '</small>'); ?>
					</div>
					<div class="row">
						<div class="col">
							<div class="form-group">
								<input value="<?= set_value('email'); ?>" type="text" name="email" class="form-control form-control-user" placeholder="Email">
								<?= form_error('email', '<small class="text-danger">', '</small>'); ?>
							</div>
						</div>
						<div class="col">
							<div class="form-group">
								<input value="<?= set_value('phone_number'); ?>" type="text" name="phone_number" class="form-control form-control-user" placeholder="Phone Number	">
								<?= form_error('phone_number', '<small class="text-danger">', '</small>'); ?>
							</div>
						</div>
					</div>
					<button type="submit" class="btn btn-primary btn-user btn-block">
						Register
					</button>
					<div class="text-center mt-4">
						<a class="small" href="<?= base_url('auth') ?>">Already have an account? Login</a>
					</div>
					<?= form_close(); ?>
					<br>
				</div>
			</div>
		</div>

	</div>
</div>



    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/js/sb-admin-2.min.js'); ?>"></script>

</body>

</html>

<!-- Outer Row -->
