 <?php

$year = date('Y');
if(isset($_GET['year']))
{
	$year=$_GET['year'];
}

$conn = new mysqli("localhost", "root", "", "ppms_db") or die(mysqli_error());
$q1 = $conn->query("SELECT COUNT(*) as total FROM `ultrasound` WHERE `comp_miscarriage` = '1' && `year` = '$year'") or die(mysqli_error());
$q1 = $q1->fetch_array();
$q2 = $conn->query("SELECT COUNT(*) as total FROM `ultrasound` WHERE `comp_premature` = '1' && `year` = '$year'") or die(mysqli_error());
$q2 = $q2->fetch_array();
$q3 = $conn->query("SELECT COUNT(*) as total FROM `ultrasound` WHERE `comp_preclampsia` = '1' && `year` = '$year'") or die(mysqli_error());
$q3 = $q3->fetch_array();
$q4 = $conn->query("SELECT COUNT(*) as total FROM `ultrasound` WHERE `comp_chromosal` = '1' && `year` = '$year'") or die(mysqli_error());
$q4 = $q4->fetch_array();
$q5 = $conn->query("SELECT COUNT(*) as total FROM `ultrasound` WHERE `comp_oligohydra` = '1' && `year` = '$year'") or die(mysqli_error());
$q5 = $q5->fetch_array();
$q6 = $conn->query("SELECT COUNT(*) as total FROM `ultrasound` WHERE `comp_ectopic` = '1' && `year` = '$year'") or die(mysqli_error());
$q6 = $q6->fetch_array();
$q7 = $conn->query("SELECT COUNT(*) as total FROM `ultrasound` WHERE `comp_placenta` = '1' && `year` = '$year'") or die(mysqli_error());
$q7 = $q7->fetch_array();

?>
<script type="text/javascript"> 
	window.onload = function() { 
		$("#cases").CanvasJSChart({
			theme: "light2",
			animationEnabled: true,
			animationDuration: 1000,
			exportFileName: "Bacteriological Status", 
			exportEnabled: true,
			title: { 
				text: "DIY OB-GYNE Clinic - Year <?php echo $year?>",
				fontSize: 20
			}, 
			subtitles:[
				{
					text: "Patient Complications - Year <?php echo $year?>"
				}
			],
			legend :{ 
				verticalAlign: "center", 
				horizontalAlign: "left" 
			}, 
			data: [ 
				{ 
					type: "doughnut", 
					showInLegend: true, 
					toolTipContent: "{label} <br/> {y}", 
					indexLabel: "{y}", 
					dataPoints: [ 
						{ label: "Miscarriage",  y: 
						 <?php
						if($q1 == ""){
							echo 0;
						}else{
							echo $q1['total'];
						}	
						 ?>, legendText: "Miscarriage"},

						{ label: "Premature labor and birth",  y: 
						 <?php 
						 if($q2 == ""){
							 echo 0;
						 }else{
							 echo $q2['total'];
						 }	
						 ?>, legendText: "Premature labor and birth"},
						{ label: "Preclampsia",  y: 
						 <?php 
						 if($q3 == ""){
							 echo 0;
						 }else{
							 echo $q3['total'];
						 }	
						 ?>, legendText: "Preclampsia"},
						{ label: "Oligohydramnios",  y: 
						 <?php 
						 if($q4 == ""){
							 echo 0;
						 }else{
							 echo $q4['total'];
						 }	
						 ?>, legendText: "Oligohydramnios"},
						{ label: "Chromosal Abnormalities",  y: 
						 <?php 
						 if($q5 == ""){
							 echo 0;
						 }else{
							 echo $q5['total'];
						 }	
						 ?>, legendText: "Chromosal Abnormalities"},
						{ label: "Ectopic Pregnancy",  y: 
						 <?php 
						 if($q6 == ""){
							 echo 0;
						 }else{
							 echo $q6['total'];
						 }	
						 ?>, legendText: "Ectopic Pregnancy"},
						 { label: "Placenta Previa",  y: 
						 <?php 
						 if($q7 == ""){
							 echo 0;
						 }else{
							 echo $q7['total'];
						 }	
						 ?>, legendText: "Placenta Previa"}
					] 
				} 
			] 
		}); 
	} 
</script>