<?php 
include("../dbconnect.php");
if(isset($_POST['sdel'])){
	$id= $_POST['id'];
	mysqli_query($connect, "DELETE FROM staff WHERE `staff_ID` = '$id' ") or die(mysqli_error($connect));
echo "<script>alert('Staff Information Successfully Deleted');window.location.href='../DataEntry-Staff.php';</script>";

}

?>