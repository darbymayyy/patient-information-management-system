<?php
session_start();
include('include/config.php');

$_SESSION['alogin'] = '';
session_unset();
session_destroy();

header('Location: ../index.html');
exit();
?>
