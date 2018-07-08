<?php
include "../dbconnect.php";

if(isset($_POST['checkADD'])){
	$schedID = $_POST['schedID'];
	$pID = $_POST['patientFetchID'];
	$pr_weight= $_POST['pr_weight'];
	$bp1= $_POST['bp1'];
	$bp2= $_POST['bp2'];
	$pr_problem= $_POST['pc_problem'];
	$diagnosis = implode(',',$_POST['checkbox']); 
	date_default_timezone_set("Asia/Manila");
  $time1 =date('h:i:s a');
  $date1 = date('Y-m-d');
	$date= date("Y-m-d");
	$bp = $bp1."/".$bp2;
	$time =date("g:i a", strtotime("h:m:s"));


	$check = $connect->query("SELECT * FROM `patientcheckup` WHERE  patientcheckup.patient_ID = '$pID'  AND `pc_date` = '$date'") or die(mysqli_error());
	$checkrows=mysqli_num_rows($check);

	if($checkrows>0) {
		echo "<script>alert('Patient Diagnosis Already Inputed on this Schedule.');window.location.href='../PatientRecord-Checkup.php';</script>";
	} else {
	mysqli_query($connect, "INSERT INTO patientcheckup (patient_ID,sched_ID,pc_weight,pc_date,pc_diagnosis,pc_bloodPressure,pc_problems) VALUES ('$pID','$schedID','$pr_weight','$date','$diagnosis','$bp','$pr_problem')") or die(mysqli_error($connect)); 
	mysqli_query($connect, "INSERT INTO transaction (trans_PatientID,trans_Type,trans_date) VALUES ('$pID','Patient Checkup','$date')") or die(mysqli_error($connect));
	mysqli_query($connect, "INSERT INTO logs VALUES('','Doctor Have Done Checkup for patient','$time','$date')") or die(mysqli_error($connect));
	echo "<script>alert('Patient Diagnosis Successfully Saved');window.location.href='../PatientRecord-Checkup.php';</script>";
	}
}

?>