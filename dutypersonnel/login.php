<?php
session_start();
include("include/config.php");

if (isset($_POST['submit'])) {
	$username = trim($_POST['username']);
	$password = $_POST['password'];

	$row = db_row($con, "SELECT * FROM dutypersonnel WHERE dutyEmail = ? LIMIT 1", "s", array($username));

	if ($row && verify_password($password, $row['password'])) {
		// Transparently upgrade legacy MD5 hashes to password_hash()
		if (password_needs_upgrade($row['password'])) {
			db_query($con, "UPDATE dutypersonnel SET password = ? WHERE id = ?", "si",
				array(password_hash($password, PASSWORD_DEFAULT), $row['id']));
		}

		$_SESSION['dplogin'] = $username;
		$_SESSION['dp_id'] = $row['id'];

		$uip = $_SERVER['REMOTE_ADDR'];
		db_query($con, "INSERT INTO dutypersonnelslog(uid, username, userip, status) VALUES (?, ?, ?, 1)", "iss",
			array($row['id'], $username, $uip));

		$host = $_SERVER['HTTP_HOST'];
		$uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		header("Location: http://$host$uri/dashboard.php");
		exit();
	} else {
		$uip = $_SERVER['REMOTE_ADDR'];
		db_query($con, "INSERT INTO dutypersonnelslog(username, userip, status) VALUES (?, ?, 0)", "ss",
			array($username, $uip));

		$_SESSION['errmsg'] = "Invalid username or password";
		$host = $_SERVER['HTTP_HOST'];
		$uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		header("Location: http://$host$uri/login.php");
		exit();
	}
}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Duty Personnel Login</title>
		<link rel="icon" type="image/x-icon" href="../images/logo.png">
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta content="" name="description" />
		<meta content="" name="author" />
		<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="../vendor/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="../vendor/themify-icons/themify-icons.min.css">
		<link href="../vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="../vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
		<link href="../vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
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
						<h2>RHU | Duty Personnel Login</h2>
					</a>
				</div>

				<div class="box-login">
					<form class="form-login" method="post" autocomplete="off">
						<fieldset>
							<h2 class="auth-title">Sign in to your account</h2>
							<p class="auth-hint">
								Please enter your email and password to log in.
							</p>
							<?php if (isset($_SESSION['errmsg']) && $_SESSION['errmsg'] != '') { ?>
							<div class="auth-error">
								<i class="fa fa-exclamation-circle"></i>
								<?php echo htmlspecialchars($_SESSION['errmsg']); ?>
							</div>
							<?php $_SESSION['errmsg'] = ''; } ?>
							<?php if (isset($_SESSION['succmsg']) && $_SESSION['succmsg'] != '') { ?>
							<div class="auth-success">
								<i class="fa fa-check-circle"></i>
								<?php echo htmlspecialchars($_SESSION['succmsg']); ?>
							</div>
							<?php $_SESSION['succmsg'] = ''; } ?>

							<div class="form-group">
								<span class="input-icon">
									<input type="email" class="form-control" name="username" placeholder="Email" required>
									<i class="fa fa-user"></i>
								</span>
							</div>

							<div class="form-group">
								<span class="input-icon">
									<input type="password" class="form-control password" name="password" placeholder="Password" required>
									<i class="fa fa-lock"></i>
								</span>
							</div>

							<div class="form-actions">
								<button type="submit" class="btn btn-primary btn-block" name="submit">
									Login <i class="fa fa-arrow-circle-right"></i>
								</button>
							</div>

							<a class="auth-link" href="forgot-password.php">Forgot Password?</a>
						</fieldset>
					</form>

					<div class="copyright">
						&copy; <span class="current-year"></span> <span class="text-bold text-uppercase"> RHU</span>. <span>All rights reserved</span>
					</div>
				</div>
			</div>
		</div>

		<script src="../vendor/jquery/jquery.min.js"></script>
		<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="../vendor/modernizr/modernizr.js"></script>
		<script src="../vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="../vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="../vendor/switchery/switchery.min.js"></script>
		<script src="../vendor/jquery-validation/jquery.validate.min.js"></script>

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
