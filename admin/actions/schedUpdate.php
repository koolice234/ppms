<?php 
include("../dbconnect.php");
date_default_timezone_set("Asia/Manila");
  $time1 =date('h:i:s a');
  $date1 = date('Y-m-d');
if(isset($_POST['schedUpdate'])){
	$time= $_POST['schedTime'];
	$date= $_POST['schedDate'];
	$id= $_POST['sched_ID'];

	mysqli_query($connect, "UPDATE schedule SET sched_Date= '$date' , sched_Time = '$time' WHERE sched_ID =  '$id' ") or die(mysqli_error($connect));
		echo "<script>alert('Schedule Information Updated Successfully');window.location.href='../index.php';</script>";

	$qry = mysqli_query($connect, "SELECT * FROM schedule INNER JOIN patient ON schedule.patient_ID = patient.patient_ID WHERE `sched_ID` = '$id' ") or die(mysqli_error($connect));
	while ($fetch = mysqli_fetch_array($qry)){ 
		$name = $fetch['patient_firstName'].' '.$fetch['patient_lastName'];
	}
	
	mysqli_query($connect, "INSERT INTO logs VALUES('','Secretary Rescheduled $name Schedule','$time1','$date1')") or die(mysqli_error($connect));
}

?>