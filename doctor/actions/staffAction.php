<?php
include "../dbconnect.php";

if(isset($_POST['sAdd'])){
	$fname= $_POST['staff_fname'];
	$lname= $_POST['staff_lname'];
	$address= $_POST['staff_address'];
	$bday= $_POST['staff_bdate'];
	$contact= $_POST['staff_contact'];
	$gen = $_POST['staff_gender'];
	$position= $_POST['staff_pos'];


$check = mysqli_query($connect,"SELECT * FROM `staff` WHERE `staff_fname` = '$fname' AND `staff_lname` = '$lname' ") or die(mysqli_error());
	$checkrows=mysqli_num_rows($check);
	if($checkrows==1) {
	echo "<script>alert('Staff Information Already Existed');window.location.href='../DataEntry-Staff.php';</script>";
	}else{

		mysqli_query($connect, "INSERT INTO staff (staff_fname,staff_lname,staff_contactNumber,staff_address,staff_gender,staff_bdate,staff_position) VALUES ('$fname','$lname','$contact','$address','$gen','$bday','$position')") or die(mysqli_error($connect)); 

	echo "<script>alert('Staff Information Saved');window.location.href='../DataEntry-Staff.php';</script>";
	}


}


?>