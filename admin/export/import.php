
<?php
$connection = mysqli_connect('localhost', 'root', '', 'ppms_db');
$date = date("Y-m-d H:i:s");

$filename = 'ppms_db.sql';
$handle = fopen($filename, "r+");
$contents = fread($handle, filesize($filename));

$sql = explode(';', $contents);
foreach ($sql as $query){ 
	 $result = mysqli_query($connection, $query);?>
<!DOCTYPE html>
<html>
<head>

	<title>loading....</title>
	        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Vendor styles -->
        <link rel="stylesheet" href="vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css">
        <link rel="stylesheet" href="vendors/bower_components/animate.css/animate.min.css">
        <link rel="stylesheet" href="vendors/bower_components/jquery.scrollbar/jquery.scrollbar.css">

        <!-- App styles -->
        <link rel="stylesheet" href="css/app.min.css">
</head>
<body data-sa-theme="7">
	<main class="main">
		<div class="page-loader">
		    <div class="page-loader__spinner">
		        <svg viewBox="25 25 50 50">
		            <circle cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
		        </svg>
		    </div>
		</div>
	</main>
        <script src="vendors/bower_components/jquery/dist/jquery.min.js"></script>
        <script src="vendors/bower_components/popper.js/dist/umd/popper.min.js"></script>
        <script src="vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="vendors/bower_components/jquery.scrollbar/jquery.scrollbar.min.js"></script>
        <script src="vendors/bower_components/jquery-scrollLock/jquery-scrollLock.min.js"></script>

        <!-- App functions and actions -->
        <script src="js/app.min.js"></script>
</body>
</html>

<?php   
}

fclose($handle);
date_default_timezone_set('Asia/Manila');
$date=date("F j, Y, g:i a");
$connection->query("INSERT INTO `backup` VALUES('','Successfully imported database', '$date')") or die(mysqli_error());
echo "<script>alert('Successfully imported database!')</script>";
echo "<script>document.location='../index.php'</script>";  


?>