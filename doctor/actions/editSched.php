<?php 
include("../dbconnect.php");
if(isset($_POST['sEdit'])){
	$editSchedDate= $_POST['editSchedDate'];
	$editSchedTime= $_POST['editSchedTime'];
	$id= $_POST['schedID'];
	mysqli_query($connect, "UPDATE schedule SET sched_Date='$editSchedDate', sched_status='Reschedule', sched_Time='$editSchedTime' WHERE `sched_ID` = '$id'") or die(mysqli_error($connect));
		echo "<script>alert('Schedule Information Successfully Edited');window.location.href='../PatientRecord-Schedule.php';</script>";
	}

	if(isset($_POST['noShow'])){
	$editSchedDate= $_POST['editSchedDate'];
	$editSchedTime= $_POST['editSchedTime'];
	$id= $_POST['schedID'];
	mysqli_query($connect, "UPDATE schedule SET sched_Date='$editSchedDate', sched_status='No-Show', sched_Time='$editSchedTime' WHERE `sched_ID` = '$id'") or die(mysqli_error($connect));
		echo "<script>alert('Schedule Information Successfully Edited');window.location.href='../PatientRecord-Schedule.php';</script>";
	}
?>