<?php
include "../dbconnect.php";

if(isset($_POST['hemaAdd'])){
	
 	
	$H_id =$_POST['patientcheckupID'];
	$H_date= date('Y-m-d');
	$H_hemoglobin= $_POST['result_hemoglobin'];
	$H_hematocrit= $_POST['result_hematocrit'];
	$H_rbc= $_POST['result_rbcCount'];
	$H_wbc= $_POST['result_wbcCount'];
	$H_platelet= $_POST['result_platelet'];
	$H_neutropil= $_POST['result_neutropils'];
	$H_eosinophils= $_POST['result_eosinophils'];
	$H_basophils=  $_POST['result_basophils'];
	$H_diffCount=  $_POST['result_diffCount'];
	$H_monocytes=  $_POST['result_monocytes'];
	$schedID =$_POST['schedID'];
	
	$check = $connect->query("SELECT * FROM `hematology` WHERE hematology.patient_ID = '$H_id' AND `hema_date` = '$H_date'") or die(mysqli_error());
	$checkrows=mysqli_num_rows($check);

	if($checkrows>0) {
		echo "<script>alert('Laboratory Already Conducted on this Day');window.location.href='../PatientRecord-Checkup.php';</script>";
	} else {

		mysqli_query($connect, "INSERT INTO hematology (sched_ID,patient_ID,hema_date,hema_hemoglobin,hema_hematocrit,hema_rbcCount,hema_wbcCount,hema_plateletCount,hema_neutropils,hema_eosinophils,hema_basophils,hema_totalDiffCount,hema_monocytes) VALUES ('$schedID','$H_id','$H_date','$H_hemoglobin','$H_hematocrit','$H_rbc','$H_wbc','$H_platelet','$H_neutropil','$H_eosinophils','$H_basophils','$H_diffCount','$H_monocytes')") or die(mysqli_error($connect)); 
		mysqli_query($connect, "INSERT INTO transactionHistory (trans_PatientID,trans_Desc,trans_Date) VALUES ('$H_id','Hematology','$H_date')") or die(mysqli_error($connect));


		echo "<script>alert('Successfuly Add Hematology laboratory');window.location.href='../PatientRecord-Checkup.php';</script>";
		}
}
?>