<?php
session_start();
include('include/config.php');

// Record the logout time on the latest session log entry
$ldate = date('d-m-Y h:i:s A', time());
if (isset($_SESSION['dp_id'])) {
	db_query($con, "UPDATE dutypersonnelslog SET logout = ? WHERE uid = ? ORDER BY id DESC LIMIT 1", "si",
		array($ldate, $_SESSION['dp_id']));
}

session_unset();
$_SESSION['succmsg'] = 'You have successfully logged out.';

header('Location: ../index.html');
exit();
?>
