<?php 
include("../dbconnect.php");
$id= $_GET['id'];
date_default_timezone_set("Asia/Manila");
  $time =date('h:i:s a');
  $date = date('Y-m-d');
	$qry = mysqli_query($connect, "SELECT * FROM schedule INNER JOIN patient ON schedule.patient_ID = patient.patient_ID WHERE `sched_ID` = '$id' ") or die(mysqli_error($connect));
	while ($fetch = mysqli_fetch_array($qry)){ 
		$name = $fetch['patient_firstName'].' '.$fetch['patient_lastName'];
	}
	mysqli_query($connect, "UPDATE schedule SET sched_status = 'Cancelled'  WHERE `sched_ID` = '$id' ") or die(mysqli_error($connect));
	mysqli_query($connect, "INSERT INTO logs VALUES('','Secretary Cancelled $name Schedule','$time','$date')") or die(mysqli_error($connect));
echo "<script>alert('Schedule Successfully Cancelled');window.location.href='../index.php';</script>";



?>