<?php
session_start();
if (!isset($_SESSION['loggedIn'])) {
        echo "<script>alert('Unauthorized access!Please login!');window.location.href='../index.php';</script>";
    }
include("dbConnect.php"); //Establishing connection with our database

$error = ""; //Variable for storing our errors.
if(isset($_POST["submit"])){

// Define $username and $password
$username=$_POST['username'];
$password=$_POST['password'];

// To protect from MySQL injection
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysqli_real_escape_string($connect, $username);
$password = mysqli_real_escape_string($connect, $password);

date_default_timezone_set("Asia/Manila");
$time =date("g:i a", strtotime("h:m:s"));
$date = date('Y-m-d', strtotime('Y-m-d'));
//Check username and password from database
 $sql = $connect->query("SELECT * FROM users WHERE user_userName='$username' and user_password='$password'") or die(mysqli_error());
 $connect->query();
 $stmt2 = $connect->prepare("INSERT INTO `logs VALUES('', 'Admin Logged-In', '$time', '$date')") or die(mysqli_error());
 $stmt2->execute();
while($staff = $sql->fetch_array()){


//If username and password exist in our database then create a session.
//Otherwise echo error.

	if($staff['user_userName'] ==  'admin' && $staff['user_password'] == 'admin')
	{
		echo "$time"; echo "$date";

		echo "<script>alert('Welcome!'); location.href='admin/index.php';</script>";
	}elseif($staff['user_userName'] == 'doctor' && $staff['user_password'] == 'doctor'){
	
		echo "<script>alert('Welcome!'); location.href='doctor/index.php';</script>";
	
	}
	else{ 
		echo "<script>alert('username and password does not match!'); location.href='index.php';</script>"; 
	}
	
	}
}
?>