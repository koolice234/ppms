<?php
include "../dbconnect.php";

if(isset($_POST['prescADD'])){
	$patientID = $_POST['patientID'];
	$pcID =$_POST['pcID'];
	$medicineName= $_POST['medicineName'];
	$Dosage = $_POST['Dosage'];
	$frequency= $_POST['frequency'];
	$date = date("Y-m-d");


		mysqli_query($connect, "INSERT INTO prescription (pc_ID,patient_ID,presc_medicines,presc_dosage,presc_frequency) VALUES ('$pcID','$patientID','$medicineName','$Dosage','$frequency')") or die(mysqli_error($connect)); 

		echo "<script>alert('Successfuly Prescription');window.location.href='../PatientRecord-Checkup.php';</script>";
	


}

?>