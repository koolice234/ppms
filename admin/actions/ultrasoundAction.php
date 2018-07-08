
	<?php
include "../dbconnect.php";

if(isset($_POST['ultraAdd'])){
	
// 	$row = mysqli_query($connect, "SELECT patient_ID FROM patient WHERE patient_Name = '$patientPath'") or die(mysqli_error($connect)); 
// 	  while($fetch = $row->fetch_array()){
// 	$P_id = $fetch['patient_ID'];
// }	
	$patientID = $_POST['patientUltraID'];
	$sched_id = $_POST['schedID'];

	
	$ultra_date= date('Y-m-d');
	$ultra_reason =$_POST['ultra_reason'];
	$ultra_biparietalDiameter =$_POST['ultra_biparietalDiameter'];
	$ultra_occiDiameter =$_POST['ultra_occiDiameter'];
	$ultra_abdominal =$_POST['ultra_abdominal'];
	$ultra_fetalHeart =$_POST['ultra_fetalHeart'];
	$ultra_distalFemoral =$_POST['ultra_distalFemoral'];
	$ultra_femoralLenght =$_POST['ultra_femoralLenght'];
	$ultra_headCircumference =$_POST['ultra_headCircumference'];
	$ultra_headCircumferenceWeek =$_POST['ultra_headCircumferenceWeek'];
	$ultra_estimatedFetal =$_POST['ultra_estimatedFetal'];
	$ultra_hadlock =$_POST['ultra_hadlock'];
	$ultra_warsof =$_POST['ultra_warsof'];
	$ultra_amonioticFluid1 =$_POST['ultra_amonioticFluid1'];
	$ultra_amonioticFluid2 =$_POST['ultra_amonioticFluid2'];
	$ultra_amonioticFluid3 =$_POST['ultra_amonioticFluid3'];
	$ultra_amonioticFluid4 =$_POST['ultra_amonioticFluid4'];
	$ultra_cervical =$_POST['ultra_cervical'];
	$ultra_cervicalDesc =$_POST['ultra_cervicalDesc'];
	$ultra_fetalTone =$_POST['ultra_fetalTone'];
	$ultra_fetalMovement =$_POST['ultra_fetalMovement'];
	$ultra_fetalBreathing =$_POST['ultra_fetalBreathing'];
	$ultra_biophysicalProfile =$_POST['ultra_biophysicalProfile'];
	$ultra_other =$_POST['ultra_other'];
	$ultra_remark =$_POST['ultra_remark'];
	
	$ultra_date= date('Y-m-d');

	$check = $connect->query("SELECT * FROM `ultrasound` WHERE ultrasound.patient_ID = '$patientID' AND `ultra_date` = '$ultra_date'") or die(mysqli_error());
	$checkrows=mysqli_num_rows($check);

	if($checkrows>0) {
		echo "<script>alert('Patient Already Done with this Laboratory.');window.location.href='../PatientRecord-Checkup.php';</script>";
	} else {
		mysqli_query($connect, "INSERT INTO ultrasound (sched_ID,patient_ID,ultra_date,ultra_reason,ultra_biparietalDiameter,ultra_occiDiameter,ultra_abdominal,ultra_fetalHeart,ultra_distalFemoral,ultra_femoralLenght,ultra_headCircumference,ultra_headCircumferenceWeek,ultra_estimatedFetal,ultra_hadlock,ultra_warsof,ultra_amonioticFluid1,ultra_amonioticFluid2,ultra_amonioticFluid3,ultra_amonioticFluid4,ultra_cervical,ultra_cervicalDesc,ultra_fetalTone,ultra_fetalMovement,ultra_fetalBreathing,ultra_biophysicalProfile,ultra_other,ultra_remark) VALUES ('$sched_id','$patientID','$ultra_date','$ultra_reason','$ultra_biparietalDiameter','$ultra_occiDiameter','$ultra_abdominal','$ultra_fetalHeart','$ultra_distalFemoral','$ultra_femoralLenght','$ultra_headCircumference','$ultra_headCircumferenceWeek','$ultra_estimatedFetal','$ultra_hadlock','$ultra_warsof','$ultra_amonioticFluid1','$ultra_amonioticFluid2','$ultra_amonioticFluid3','$ultra_amonioticFluid4','$ultra_cervical','$ultra_cervicalDesc','$ultra_fetalTone','$ultra_fetalMovement','$ultra_fetalBreathing','$ultra_biophysicalProfile','$ultra_other','$ultra_remark')") or die(mysqli_error($connect)); 
		mysqli_query($connect, "INSERT INTO transactionHistory (trans_PatientID,trans_Desc,trans_Date) VALUES ('$patientID','Ultrasound','$ultra_date')") or die(mysqli_error($connect));

		echo "<script>alert('Successfuly Add Ultrasound laboratory');window.location.href='../PatientRecord-Checkup.php';</script>";
}
}
?>