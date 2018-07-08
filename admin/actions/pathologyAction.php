<?php
include "../dbconnect.php";

if(isset($_POST['patAdd'])){
	
	$p_id = $_POST['patientcheckupID'];


	$pat_date= date('Y-m-d');
	$patientcheckupID = $_POST['schedID'];
	$pat_lca= $_POST['pat_lca'];
	$pat_plap= $_POST['pat_plap'];
	$pat_cytokeratin= $_POST['pat_cytokeratin'];
	$pat_nse= $_POST['pat_nse'];
	$pat_vimetin= $_POST['pat_vimetin'];
	$pat_chromogranin= $_POST['pat_chromogranin'];
	$pat_hmb45= $_POST['pat_hmb45'];
	$pat_note =  $_POST['pat_note'];
	

$check = $connect->query("SELECT * FROM `pathology` INNER JOIN `schedule` on pathology.sched_ID = schedule.sched_ID INNER JOIN `patient` on patient.patient_ID = pathology.patient_ID WHERE pathology.patient_ID  = '$p_id ' AND `pathology_date` = '$pat_date' ") or die(mysqli_error());
	$checkrows=mysqli_num_rows($check);

	if($checkrows>0) {
		echo "<script>alert('Laboratory Already Conducted on this Day');window.location.href='../PatientRecord-Checkup.php';</script>";
	} else {

		$stmt1 = $connect->prepare("INSERT INTO pathology(sched_ID,patient_ID,pathology_date,pathology_lca,pathology_plap,pathology_cytokeratin,pathology_nse,pathology_vimetin,pathology_chromogranin,pathology_hmb45,pathology_notes) VALUES ('$patientcheckupID','$p_id','$pat_date','$pat_lca','$pat_plap','$pat_cytokeratin','$pat_nse','$pat_vimetin','$pat_chromogranin','$pat_hmb45','$pat_note')");
		$stmt2 = $connect->prepare("INSERT INTO transaction(trans_type,trans_date,trans_patientid) VALUES ('Pathology','$pat_date','$p_id')");
		$stmt2->execute();
		$stmt1->execute();
		$fetchID = $_POST['patientcheckupID'];
		echo "<script>alert('Successfully Add Pathology Laboratory');window.location.href='../PatientRecord-Checkup.php'</script>";
	}
}
?>