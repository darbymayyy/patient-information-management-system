<?php
include("include/config.php");
$row_val = db_row($con, "SELECT HealthCenter FROM settings WHERE id = 1");
$name = $row_val ? $row_val['HealthCenter'] : 'Health Center';
?>
<header class="navbar navbar-default navbar-static-top">
	<!-- start: NAVBAR HEADER -->
	<div class="navbar-header">
		<a href="#" class="sidebar-mobile-toggler pull-left hidden-md hidden-lg" data-toggle-class="app-slide-off" data-toggle-target="#app" data-toggle-click-outside="#sidebar">
			<i class="ti-align-justify"></i>
		</a>
		<a class="navbar-brand" href="dashboard.php">
			<span class="brand-logo"><img src="../images/logo.png" alt=""></span>
			<h2>RHU</h2>
		</a>
		<a href="#" class="sidebar-toggler pull-right visible-md visible-lg" data-toggle-class="app-sidebar-closed" data-toggle-target="#app">
			<i class="ti-align-justify"></i>
		</a>
		<a class="pull-right menu-toggler visible-xs-block" id="menu-toggler" data-toggle="collapse" href=".navbar-collapse">
			<span class="sr-only">Toggle navigation</span>
			<i class="ti-view-grid"></i>
		</a>
	</div>
	<!-- end: NAVBAR HEADER -->
	<!-- start: NAVBAR COLLAPSE -->
	<div class="navbar-collapse collapse">
		<ul class="nav navbar-right">
			<li class="header-center">
				<h2><?php echo htmlspecialchars($name); ?></h2>
			</li>

			<li class="dropdown current-user">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					<img src="assets/images/images.jpg" alt="Profile">
					<span class="username">
					<?php
					$query = db_query($con, "SELECT fullname FROM admin WHERE id = ?", "i", array($_SESSION['admin_id']));
					while ($row = mysqli_fetch_array($query)) {
						echo htmlspecialchars($row['fullname']);
					}
					?>
					<i class="ti-angle-down"></i></span>
				</a>
				<ul class="dropdown-menu dropdown-dark">
					<li>
						<a href="edit-profile.php">
							My Profile
						</a>
					</li>
					<li>
						<a href="change-password.php">
							Change Password
						</a>
					</li>
					<li>
						<a href="logout.php">
							Log Out
						</a>
					</li>
				</ul>
			</li>
			<!-- end: USER OPTIONS DROPDOWN -->
		</ul>
		<!-- start: MENU TOGGLER FOR MOBILE DEVICES -->
		<div class="close-handle visible-xs-block menu-toggler" data-toggle="collapse" href=".navbar-collapse">
			<div class="arrow-left"></div>
			<div class="arrow-right"></div>
		</div>
		<!-- end: MENU TOGGLER FOR MOBILE DEVICES -->
	</div>
	<!-- end: NAVBAR COLLAPSE -->
</header>
