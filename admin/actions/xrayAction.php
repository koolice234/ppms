<?php
include "../dbconnect.php";

if(isset($_POST['xAdd'])){
	$x_id = $_POST['patientcheckupID'];
	$schedID =$_POST['schedID'];
	
	$xray_date= date('Y-m-d');
	$xray_impression= $_POST['xray_impression'];
	$xray_remark= $_POST['xray_remark'];
	
	$check = $connect->query("SELECT * FROM `xray` WHERE  xray.patient_ID = '$x_id'  AND `xray_date` = '$xray_date'") or die(mysqli_error());
	$checkrows=mysqli_num_rows($check);

	if($checkrows>0) {
		echo "<script>alert('Patient Already Done with this Laboratory.');window.location.href='../PatientRecord-Checkup.php';</script>";
	} else {
		mysqli_query($connect, "INSERT INTO xray (sched_ID,patient_ID,xray_date,xray_impression,xray_remark) VALUES ('$schedID','$x_id','$xray_date','$xray_impression','$xray_remark')") or die(mysqli_error($connect)); 
		mysqli_query($connect, "INSERT INTO transactionHistory (trans_PatientID,trans_Desc,trans_Date) VALUES ('$x_id','X-Ray','$xray_date')") or die(mysqli_error($connect));
		echo "<script>alert('Successfuly Add Xray laboratory Result');window.location.href='../PatientRecord-Checkup.php';</script>";
	}
}
?>