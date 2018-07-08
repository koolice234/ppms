<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from byrushan.com/projects/super-admin/app/2.1/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Jan 2018 17:21:41 GMT -->
<head>
    <title>PPMS | Login Page</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Vendor styles -->
        <link rel="stylesheet" href="vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css">
        <link rel="stylesheet" href="vendors/bower_components/animate.css/animate.min.css">

        <!-- App styles -->
        <link rel="stylesheet" href="css/app.min.css">
        <style>
            body  {
                   background-image:url(img/header.jpg);
                   background-repeat:no-repeat;
                   background-size:cover;
            }

        </style>
    </head>
<?php
include('dbConnect.php');
if(isset($_POST['login'])){
  $username=$_POST['username'];
$password=$_POST['password'];
  $mysqli = new mysqli("localhost", "root", "", "ppms_db");
  if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
  }

  $res = $mysqli->query("SELECT * FROM users where user_userName='$username' and user_password='$password'");
  date_default_timezone_set("Asia/Manila");
  $time =date('h:i:s a');
  $date = date('Y-m-d');
  $row = $res->fetch_assoc();
  $user = $row['user_userName'];
  $pass = $row['user_password'];
  $type = $row['user_type'];
  if($user==$username && $pass=$password){
    
    if($type=="admin"){
      $_SESSION['user_userName']=$user;
      $_SESSION['user_password']=$type;
      $_SESSION['loggedIn'] = TRUE;
      $stmt2 = $connect->prepare("INSERT INTO logs VALUES('', 'Secretary Successfully Logged-In', '$time', '$date')") or die(mysqli_error());
      $stmt2->execute();
      echo "<script>location.href='admin/index.php';</script>";
    } else if($type=="doctor"){
      $_SESSION['user_userName']=$user;
      $_SESSION['user_password']=$type;
      $_SESSION['loggedIn'] = TRUE;
      $stmt2 = $connect->prepare("INSERT INTO logs VALUES('', 'Doctor Successfully Logged-In', '$time', '$date')") or die(mysqli_error());
      $stmt2->execute();
      echo "<script>location.href='doctor/index.php';</script>";
    }
  } else{
    $stmt2 = $connect->prepare("INSERT INTO logs VALUES('', 'Unsuccessful Log-In, Incorrect Username and Password', '$time', '$date')") or die(mysqli_error());
      $stmt2->execute();
?>
<div class="alert alert-danger alert-dismissible" role="alert">
  <strong>Warning!</strong> This username or password not same with database.
</div>
<?php
  }
}
?>
    <body >
        <div class="login">

            <!-- Login -->
            <div class="login__block active" id="l-login">
                    <img src="images/logo.png" height="60   px" width="200px"> <br><br>
                    PREGNANCY PROGRESS MONITORING SYSTEM
                <form method="post">
                <div class="login__block__body">
                    <div class="form-group">
                        <input type="text" name="username" class="form-control text-center" placeholder="Username" required>
                    </div>

                    <div class="form-group">
                        <input type="password" name="password" class="form-control text-center" placeholder="Password" required>
                    </div>

                    <button class="btn btn--icon login__block__btn" type="submit" name="login"><i class="zmdi zmdi-long-arrow-right"></i></button>
                    </form>
                </div>
            </div>

            <!-- Forgot Password -->
        </div>


        <!-- Javascript -->
        <!-- Vendors -->
        <script src="vendors/bower_components/jquery/dist/jquery.min.js"></script>
        <script src="vendors/bower_components/popper.js/dist/umd/popper.min.js"></script>
        <script src="vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

        <!-- App functions and actions -->
        <script src="js/app.min.js"></script>
    </body>

<!-- Mirrored from byrushan.com/projects/super-admin/app/2.1/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Jan 2018 17:21:41 GMT -->
</html>