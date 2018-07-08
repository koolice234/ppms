<?php
include "../dbconnect.php";

if(isset($_POST['schedAdd'])){
	if(!isset($_POST['schedDate'])){
		echo "<script>alert('Please Insert Schedule Date');window.location.href='../PatientRecord-Schedule.php';</script>";
	}
	if(!isset($_POST['schedTime'])){
		echo "<script>alert('Please Insert Schedule Time');window.location.href='../PatientRecord-Schedule.php';</script>";
	}
	date_default_timezone_set("Asia/Manila");
	  $time1 =date('h:i:s a');
	  $date1 = date('Y-m-d');
	$date = date("Y-m-d");
	$patient= $_POST['patient'];
	$schedDate= $_POST['schedDate'];
	$schedTime =date("g:i a", strtotime($_POST['schedTime']));
	$month = date("M", strtotime("+8 HOURS"));
	$year = date("Y", strtotime("+8 HOURS"));
 	$weekDay = date('w', strtotime($schedDate));

	if ($weekDay == 0) {
		echo "<script>alert('this date is sunday');window.location.href='../PatientRecord-Schedule.php';</script>";
	}
	$check = $connect->query("SELECT * FROM `schedule` WHERE `patient_ID` = '$patient' AND `sched_Date` = '$schedDate'") or die(mysqli_error());
	$checkrows=mysqli_num_rows($check);

	$check1 = $connect->query("SELECT * FROM `schedule` WHERE `patient_ID` = '$patient' AND `sched_Date` != '$schedDate'") or die(mysqli_error());
	$checkrows1=mysqli_num_rows($check1);

			if($checkrows>0) {
				echo "<script>alert('Patient Already Scheduled on this date! ');window.location.href='../PatientRecord-Schedule.php';</script>";
			}elseif($checkrows1>0){
				
				$stmt1 = $connect->prepare("INSERT INTO schedule (patient_ID,sched_Date,sched_Time,sched_status,month,year) VALUES ('$patient','$schedDate','$schedTime','Pending','$month','$year')");
				$stmt2 = $connect->prepare("INSERT INTO transaction(trans_type,trans_date,trans_patientid) VALUES ('Checkup','$date','$patient')");
				$stmt3 = $connect->prepare("INSERT INTO logs VALUES('','Secretary Added 1 Schedule','$time1','$date1')");
				$stmt2->execute();
				$stmt1->execute();
				$stmt3->execute();
				echo "<script>alert('Patient Successfully Scheduled! ');window.location.href='../PatientRecord-Schedule.php';</script>";
			}else{
				mysqli_query($connect, "INSERT INTO schedule (patient_ID,sched_Date,sched_Time) VALUES ('$patient','$schedDate','$schedTime')") or die(mysqli_error($connect)); 

				echo "<script>alert('Successfully Add Schedule');window.location.href='../PatientRecord-Schedule.php';</script>";
			}

}

?>
