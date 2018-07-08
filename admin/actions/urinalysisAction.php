<?php
include "../dbconnect.php";

if(isset($_POST['uriADD'])){
	$u_id = $_POST['patientcheckupID'];
	$schedID =$_POST['schedID'];
	$ucolor= $_POST['u_color'];
	$utransparency= $_POST['u_transparency'];
	$uph= $_POST['u_ph'];
	$usg= $_POST['u_sg'];
	$usugar= $_POST['u_sugar'];
	$uprotien= $_POST['u_protein'];
	$utransparency1= $_POST['u_transparency1'];
	$uph1= $_POST['u_ph1'];
	$usg1= $_POST['u_sg1'];
	$time =date("g:i a", strtotime("h:m:s"));
	$date =date("Y-m-d");


	$check = $connect->query("SELECT * FROM `urinalysis` WHERE urinalysis.patient_ID = '$u_id' AND `uri_date` = '$date'") or die(mysqli_error());
	$checkrows=mysqli_num_rows($check);

	if($checkrows>0) {
		echo "<script>alert('Patient Already Done with this Laboratory.');window.location.href='../PatientRecord-Checkup.php';</script>";
	} else {
			mysqli_query($connect, "INSERT INTO `urinalysis` (sched_ID,patient_ID,uri_date,uri_color,uri_transparency,uri_pH,uri_specificGravity,uri_sugar,uri_protein,uri_MICtransparency,uri_MICpH,uri_MICspecificGravity) VALUES ('$schedID','$u_id','$date','$ucolor','$utransparency','$uph','$usg','$usugar','$uprotien' ,'$utransparency1','$uph1','$usg1')" ) or die(mysqli_error($connect)); 
			mysqli_query($connect, "INSERT INTO transactionHistory (trans_PatientID,trans_Desc,trans_Date) VALUES ('$u_id','Urinalysis','$date')") or die(mysqli_error($connect));

		echo "<script>alert('Patient Successfully Saved');window.location.href='../PatientRecord-Checkup.php';</script>";

	}
	


}

?>