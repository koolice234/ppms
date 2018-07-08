
	<?php
include "../dbconnect.php";

if(isset($_POST['ultraAdd'])){
	
// 	$row = mysqli_query($connect, "SELECT patient_ID FROM patient WHERE patient_Name = '$patientPath'") or die(mysqli_error($connect)); 
// 	  while($fetch = $row->fetch_array()){
// 	$P_id = $fetch['patient_ID'];
// }	
	$patientID = $_POST['patientUltraID'];
	$sched_id = $_POST['schedID'];
	$ultra_fetusQty = $_POST['fetusQty'];
	$ultra_genweeks = $_POST['genweek'];
	$ultra_date= date('Y-m-d');
	$ultra_reason =$_POST['ultra_reason'];
	$ultra_biparietalDiameter =$_POST['ultra_biparietalDiameter'];
	$ultra_occiDiameter =$_POST['ultra_occiDiameter'];
	$ultra_abdominal =$_POST['ultra_abdominal'];
	$ultra_fetalHeart =$_POST['ultra_fetalHeart'];
	$ultra_distalFemoral =$_POST['ultra_distalFemoral'];
	$ultra_femoralLenght =$_POST['ultra_femoralLenght'];
	$ultra_headCircumference =$_POST['ultra_headCircumference'];
	$ultra_estimatedFetal = $_POST['ultra_estimatedFetal'];
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
	$year = date("Y", strtotime("+8 HOURS"));

	if(isset($_POST['Miscarriage'])){$ultra_Miscarriage = $_POST['Miscarriage'];	} else{ $ultra_Miscarriage = 0; }
	if(isset($_POST['Premature'])){$ultra_Premature = $_POST['Premature'];	} else{ $ultra_Premature = 0; }
	if(isset($_POST['Preeclampsia'])){$ultra_Preeclampsia = $_POST['Preeclampsia'];	} else{ $ultra_Preeclampsia = 0; }
	if(isset($_POST['Chromosomal'])){$ultra_Chromosomal = $_POST['Chromosomal'];	} else{ $ultra_Chromosomal = 0; }
	if(isset($_POST['Oligohydramnios'])){$ultra_Oligohydramnios = $_POST['Oligohydramnios'];	} else{ $ultra_Oligohydramnios = 0; }
	if(isset($_POST['Ectopic'])){$ultra_Ectopic = $_POST['Ectopic'];	} else{ $ultra_Ectopic = 0; }
	if(isset($_POST['Placenta'])){$ultra_Placenta = $_POST['Placenta'];	} else{ $ultra_Placenta = 0; }


	$check = $connect->query("SELECT * FROM `ultrasound` WHERE ultrasound.patient_ID = '$patientID' AND `ultra_date` = '$ultra_date'") or die(mysqli_error());
	$checkrows=mysqli_num_rows($check);

		$stmt1 = $connect->prepare("INSERT INTO ultrasound (sched_ID,patient_ID,ultra_date,ultra_reason,ultra_biparietalDiameter,ultra_occiDiameter,ultra_abdominal,ultra_fetalHeart,ultra_distalFemoral,ultra_femoralLenght,ultra_headCircumference,ultra_estimatedFetal,ultra_hadlock,ultra_warsof,ultra_amonioticFluid1,ultra_amonioticFluid2,ultra_amonioticFluid3,ultra_amonioticFluid4,ultra_cervical,ultra_cervicalDesc,ultra_fetalTone,ultra_fetalMovement,ultra_fetalBreathing,ultra_biophysicalProfile,ultra_other,ultra_remark,ultra_genweeks,ultra_fetusQty,comp_miscarriage,comp_premature,comp_preclampsia,comp_chromosal,comp_oligohydra,comp_ectopic,comp_placenta) VALUES ('$sched_id','$patientID','$ultra_date','$ultra_reason','$ultra_biparietalDiameter','$ultra_occiDiameter','$ultra_abdominal','$ultra_fetalHeart','$ultra_distalFemoral','$ultra_femoralLenght','$ultra_headCircumference','$ultra_estimatedFetal','$ultra_hadlock','$ultra_warsof','$ultra_amonioticFluid1','$ultra_amonioticFluid2','$ultra_amonioticFluid3','$ultra_amonioticFluid4','$ultra_cervical','$ultra_cervicalDesc','$ultra_fetalTone','$ultra_fetalMovement','$ultra_fetalBreathing','$ultra_biophysicalProfile','$ultra_other','$ultra_remark','$ultra_genweeks','$ultra_fetusQty','$ultra_Miscarriage','$ultra_Premature','$ultra_Preeclampsia','$ultra_Chromosomal','$ultra_Oligohydramnios','$ultra_Ectopic','$ultra_Placenta')");
		$stmt2 = $connect->prepare("INSERT INTO transaction(trans_type,trans_date,trans_patientid) VALUES ('Ultrasound','$ultra_date','$patientID')");
		$stmt2->execute();
		$stmt1->execute();


		echo "<script>alert('Successfuly Add Ultrasound laboratory');window.location.href='../PatientRecord-Checkup.php';</script>";
}
?>