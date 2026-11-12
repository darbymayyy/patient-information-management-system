<?php
session_start();
include("include/config.php");

// Checking details for password reset
if (isset($_POST['submit'])) {
	$contactno = trim($_POST['contactno']);
	$email     = trim($_POST['email']);

	$row = db_row($con, "SELECT id FROM doctor WHERE contactno = ? AND email = ? LIMIT 1", "ss",
		array($contactno, $email));

	if ($row) {
		$_SESSION['cnumber'] = $contactno;
		$_SESSION['email']   = $email;
		header('Location: reset-password.php');
		exit();
	} else {
		$_SESSION['errmsg'] = 'Invalid details. Please try with valid details!';
		header('Location: forgot-password.php');
		exit();
	}
}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Doctor Password Recovery</title>
		<link rel="icon" type="image/x-icon" href="../images/logo.png">
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta content="" name="description" />
		<meta content="" name="author" />
		<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
		<link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
		<link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="assets/css/styles.css">
		<link rel="stylesheet" href="assets/css/plugins.css">
		<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
		<link rel="stylesheet" href="../css/auth.css">
	</head>
	<body class="login">
		<div class="auth-wrap">
			<div class="auth-card">
				<div class="auth-head">
					<a href="../index.html" class="auth-brand">
						<img src="../images/logo.png" alt="">
						<h2>RHU | Doctor Password Recovery</h2>
					</a>
				</div>

				<div class="box-login">
					<form class="form-login" method="post" autocomplete="off">
						<fieldset>
							<h2 class="auth-title">Doctor Password Recovery</h2>
							<p class="auth-hint">
								Please enter your registered email and contact number to recover your password.
							</p>
							<?php if (isset($_SESSION['errmsg']) && $_SESSION['errmsg'] != '') { ?>
							<div class="auth-error">
								<i class="fa fa-exclamation-circle"></i>
								<?php echo htmlspecialchars($_SESSION['errmsg']); ?>
							</div>
							<?php $_SESSION['errmsg'] = ''; } ?>

							<div class="form-group">
								<span class="input-icon">
									<input type="email" class="form-control" name="email" placeholder="Registered Email" required>
									<i class="fa fa-envelope-o"></i>
								</span>
							</div>

							<div class="form-group">
								<span class="input-icon">
									<input type="text" class="form-control" name="contactno" placeholder="Registered Contact Number" maxlength="11" required>
									<i class="fa fa-phone"></i>
								</span>
							</div>

							<div class="form-actions">
								<button type="submit" class="btn btn-primary btn-block" name="submit">
									Recover Password <i class="fa fa-arrow-circle-right"></i>
								</button>
							</div>

							<a class="auth-link" href="login.php">Back to Login</a>
						</fieldset>
					</form>

					<div class="copyright">
						&copy; <span class="current-year"></span> <span class="text-bold text-uppercase"> RHU</span>. <span>All rights reserved</span>
					</div>
				</div>
			</div>
		</div>

		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/modernizr/modernizr.js"></script>
		<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="vendor/switchery/switchery.min.js"></script>
		<script src="vendor/jquery-validation/jquery.validate.min.js"></script>

		<script src="assets/js/main.js?v=2"></script>
		<script src="assets/js/login.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				Login.init();
			});
		</script>
	</body>
</html>
