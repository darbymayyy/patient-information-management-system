<?php 
require_once("include/config.php");
if(!empty($_POST["email"])) {
	$email= trim($_POST["email"]);
$result = db_query($con,"SELECT PatientEmail FROM tblpatient WHERE PatientEmail = ?","s",array($email));
$count = $result ? mysqli_num_rows($result) : 0;
if($count>0)
{
echo "<span style='color:red'> Email already exists</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
} else{
	
	echo "<span style='color:green'> Email available for Registration</span>";
 echo "<script>$('#submit').prop('disabled',false);</script>";
}
}


?>
