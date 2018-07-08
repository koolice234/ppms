<?php
include "../dbconnect.php";

if(isset($_POST['pAdd'])){
	$fname= $_POST['p_fname'];
	$lname= $_POST['p_lname'];
	$address= $_POST['p_address'];
	$age= $_POST['p_age'];
	$contact= $_POST['p_contact'];
	$btype= $_POST['p_btype'];
	$lmp =$_POST['LMP'];
	$time =date("g:i a", strtotime("h:m:s"));
	$month = date("M", strtotime("+8 HOURS"));
	$year = date("Y", strtotime("+8 HOURS"));
	date_default_timezone_set("Asia/Manila");
 	 $time1 =date('h:i:s a');
 	 $date1 = date('Y-m-d');
	$check = $connect->query("SELECT * FROM `patient` WHERE `patient_firstName` = '$fname' AND `patient_lastName` = '$lname'") or die(mysqli_error());
	$checkrows=mysqli_num_rows($check);

	if($checkrows>0) {
		echo "<script>alert('Patient Name Already Existed');window.location.href='../DataEntry-Patient.php';</script>";
	} else {
			mysqli_query($connect, "INSERT INTO patient (patient_firstName,patient_lastName,patient_address,patient_contactNumber,patient_bloodType,patient_age,patient_Name,patient_time,patient_LMP,month,year) VALUES ('$fname','$lname','$address','$contact','$btype','$age','$fname $lname' ,'$time','$lmp','$month','$year')") or die(mysqli_error($connect)); 
			mysqli_query($connect, "INSERT INTO logs VALUES('','Secretary Added 1 Patient','$time1','$date1')") or die(mysqli_error($connect));


		echo "<script>alert('Patient Successfully Saved');window.location.href='../PatientRecord-Schedule.php';</script>";

	}
	
}elseif(isset($_POST['modEdit'])){
	$fname= $_POST['patient_firstName'];
	$lname= $_POST['p_lname1'];
	$address= $_POST['p_address1'];
	$age= $_POST['p_bdate1'];
	$contact= $_POST['p_contact1'];
	$btype= $_POST['p_btype1'];
	$id= $_POST['id1'];

	mysqli_query($connect, "UPDATE patient SET  patient_firstName= '$fname' , patient_lastName = '$lname' , patient_address = '$address', patient_contactNumber = '$contact' , patient_Age = '$age' , patient_bloodType = '$btype' WHERE `patient_ID` =  '$id' ") or die(mysqli_error($connect));
	mysqli_query($connect, "INSERT INTO logs VALUES('','Secretary Edited 1 Patient','$time1','$date1')") or die(mysqli_error($connect));
		echo "<script>alert('Patient Successfully Saved');window.location.href='../DataEntry-Patient.php';</script>";


}elseif(isset($_POST['pdel'])){
	$id= $_POST['id'];
	mysqli_query($connect, "DELETE FROM patient WHERE `patient_ID` = '$id' ") or die(mysqli_error($connect));
	header("location: ../DataEntry-Patient.php");
	mysqli_query($connect, "INSERT INTO logs VALUES('','Secretary Deleted 1 Patient','$time1','$date1')") or die(mysqli_error($connect));

}

?>