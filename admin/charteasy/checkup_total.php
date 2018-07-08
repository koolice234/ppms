<?php
	$year = date('Y');
if(isset($_GET['year']))
{
	$year=$_GET['year'];
}

$conn = new mysqli("localhost", "root", "", "ppms_db") or die(mysqli_error());
$qjan = $conn->query("SELECT COUNT(*) as total FROM `patientcheckup` WHERE `pc_month` = 'Jan' && `pc_year` = '$year'") or die(mysqli_error());
$fjan = $qjan->fetch_array();
$qfeb = $conn->query("SELECT COUNT(*) as total FROM `patientcheckup` WHERE `pc_month` = 'Feb' && `pc_year` = '$year'") or die(mysqli_error());
$ffeb = $qfeb->fetch_array();
$qmar = $conn->query("SELECT COUNT(*) as total FROM `patientcheckup` WHERE `pc_month` = 'Mar' && `pc_year` = '$year'") or die(mysqli_error());
$fmar = $qmar->fetch_array();
$qapr = $conn->query("SELECT COUNT(*) as total FROM `patientcheckup` WHERE `pc_month` = 'Apr' && `pc_year` = '$year'") or die(mysqli_error());
$fapr = $qapr->fetch_array();
$qmay = $conn->query("SELECT COUNT(*) as total FROM `patientcheckup` WHERE `pc_month` = 'May' && `pc_year` = '$year'") or die(mysqli_error());
$fmay = $qmay->fetch_array();
$qjun = $conn->query("SELECT COUNT(*) as total FROM `patientcheckup` WHERE `pc_month` = 'Jun' && `pc_year` = '$year'") or die(mysqli_error());
$fjun = $qjun->fetch_array();
$qjul = $conn->query("SELECT COUNT(*) as total FROM `patientcheckup` WHERE `pc_month` = 'Jul' && `pc_year` = '$year'") or die(mysqli_error());
$fjul = $qjul->fetch_array();
$qaug = $conn->query("SELECT COUNT(*) as total FROM `patientcheckup` WHERE `pc_month` = 'Aug' && `pc_year` = '$year'") or die(mysqli_error());
$faug = $qaug->fetch_array();
$qsep = $conn->query("SELECT COUNT(*) as total FROM `patientcheckup` WHERE `pc_month` = 'Sept' && `pc_year` = '$year'") or die(mysqli_error());
$fsep = $qsep->fetch_array();
$qoct = $conn->query("SELECT COUNT(*) as total FROM `patientcheckup` WHERE `pc_month` = 'Oct' && `pc_year` = '$year'") or die(mysqli_error());
$foct = $qoct->fetch_array();
$qnov = $conn->query("SELECT COUNT(*) as total FROM `patientcheckup` WHERE `pc_month` = 'Nov' && `pc_year` = '$year'") or die(mysqli_error());
$fnov = $qnov->fetch_array();
$qdec = $conn->query("SELECT COUNT(*) as total FROM `patientcheckup` WHERE `pc_month` = 'Dec' && `pc_year` = '$year'") or die(mysqli_error());
$fdec = $qdec->fetch_array();


?>
<script type="text/javascript"> 
	window.onload = function(){ 
		$("#checkup_total").CanvasJSChart({
			theme: "light2",
			zoomEnabled: true,
			zoomType: "x",
			panEnabled: true,
			animationEnabled: true,
			animationDuration: 1000,
			exportFileName: "Monthly Population", 
			exportEnabled: true,
			toolTip: {
				shared: true  
			},
			title: { 
				text: "Check-Up Population as of Year <?php echo $_GET['year']?> ",
				fontSize: 20
			},
			legend: {
				cursor: "pointer",
				itemclick: function (e) {
					if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
						e.dataSeries.visible = false;
					} else {
						e.dataSeries.visible = true;
					}
					e.chart.render();
				}
			},
			axisX: {		       
				gridDashType: "dot",
				gridThickness: 1,
				labelFontColor: "black",
				crosshair: {
					enabled: true 
				}
			},
			axisY: { 
				title: "Total Population", 
				includeZero: false,
				labelFontColor: "black",
				crosshair: {
					enabled: true 
				}
			}, 
			data: [ 
				{ 
					type: "column", 
					showInLegend: true, 
					legendText: "Total Number of Patients",
					name: "Total Patients this month",
					color: "#7E8F74",
					dataPoints: [ 
						{ label: "January", y: <?php echo $fjan['total']?> },
						 { label: "February", y: <?php echo $ffeb['total']?> },
						{ label: "March", y: <?php echo $fmar['total']?> },
						 { label: "April", y: <?php echo $fapr['total']?> },
						{ label: "May", y: <?php echo $fmay['total']?> },
						 { label: "June", y: <?php echo $fjun['total']?> },
						{ label: "July", y: <?php echo $fjul['total']?> },
						 { label: "August", y: <?php echo $faug['total']?> },
						{ label: "September", y: <?php echo $fsep['total']?> },
						 { label: "October", y: <?php echo $foct['total']?> },
						{ label: "November", y: <?php echo $fnov['total']?> },
						 { label: "December", y: <?php echo $fdec['total']?> }
					] 
				}
			] 
		}); 
	}
</script>