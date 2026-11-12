<?php
session_start();
include('include/config.php');

// Code for updating password
if (isset($_POST['change'])) {
	// Details verified in forgot-password.php
	if (!isset($_SESSION['contactno']) || !isset($_SESSION['email'])) {
		header('Location: forgot-password.php');
		exit();
	}

	$contactno = $_SESSION['contactno'];
	$email     = $_SESSION['email'];

	$query = db_query($con, "UPDATE admin SET password = ? WHERE contactno = ? AND email = ?", "sss",
		array(password_hash($_POST['password'], PASSWORD_DEFAULT), $contactno, $email));

	if ($query) {
		unset($_SESSION['contactno'], $_SESSION['email']);
		$_SESSION['succmsg'] = 'Password successfully updated. Please log in with your new password.';
		header('Location: login.php');
		exit();
	}
}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Admin Password Reset</title>
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
						<h2>RHU | Admin Reset Password</h2>
					</a>
				</div>

				<div class="box-login">
					<form role="form" name="passwordreset" method="post" onsubmit="return valid();">
						<fieldset>
							<h2 class="auth-title">Admin Reset Password</h2>
							<p class="auth-hint">
								Please set your new password.
							</p>

							<div class="form-group">
								<span class="input-icon">
									<input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
									<i class="fa fa-lock"></i>
								</span>
							</div>

							<div class="form-group">
								<span class="input-icon">
									<input type="password" class="form-control" id="password_again" name="password_again" placeholder="Confirm Password" required>
									<i class="fa fa-lock"></i>
								</span>
							</div>

							<div class="form-actions">
								<button type="submit" class="btn btn-primary btn-block" name="change">
									Change Password <i class="fa fa-arrow-circle-right"></i>
								</button>
							</div>

							<a class="auth-link" href="login.php">Already have an account? Log in</a>
						</fieldset>
					</form>

					<div class="copyright">
						&copy; <span class="current-year"></span> <span class="text-bold text-uppercase"> RHU</span>. <span>All rights reserved</span>
					</div>
				</div>
			</div>
		</div>

		<script>
			function valid()
			{
				if (document.passwordreset.password.value != document.passwordreset.password_again.value)
				{
					alert("Password and Confirm Password fields do not match!");
					document.passwordreset.password_again.focus();
					return false;
				}
				return true;
			}
		</script>
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
