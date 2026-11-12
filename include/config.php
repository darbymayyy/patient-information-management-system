<?php
/**
 * PIMS — database configuration (public site).
 */

define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'epiz_31027381_rhu');

// Keep errors out of the page output but available in the PHP error log.
ini_set('display_errors', '0');
error_reporting(E_ALL);
date_default_timezone_set('Asia/Manila');

$con = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
if (mysqli_connect_errno()) {
	error_log('MySQL connection failed: ' . mysqli_connect_error());
	die('Database connection failed. Please check the configuration.');
}
