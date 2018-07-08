<?php 
include("../dbconnect.php");
if(isset($_POST['sEdit'])){
	$fname= $_POST['s_fname'];
	$lname= $_POST['s_lname'];
	$address= $_POST['s_address'];
	$bday= $_POST['s_bdate'];
	$contact= $_POST['s_contact'];
	$gender= $_POST['s_gender'];
	$sposition= $_POST['s_position'];
	$id= $_POST['id'];

	mysqli_query($connect, "UPDATE staff SET  staff_fname= '$fname' , staff_lname = '$lname' , staff_contactNumber = '$contact' , staff_address = '$address' , staff_gender = '$gender' , staff_bdate = '$bday', staff_position ='$sposition' WHERE staff_ID =  '$id' ") or die(mysqli_error($connect));
		echo "<script>alert('Staff Information Successfully UPDATE');window.location.href='../DataEntry-Staff.php';</script>";

}

?>