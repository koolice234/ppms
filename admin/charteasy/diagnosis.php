 <?php

$year = date('Y');
if(isset($_GET['year']))
{
	$year=$_GET['year'];
}

$conn = new mysqli("localhost", "root", "", "ppms_db") or die(mysqli_error());
$q1 = $conn->query("SELECT COUNT(*) as total FROM `patientcheckup` WHERE `pc_diagnosis` = 'Chronic' && `pc_year` = '$year'") or die(mysqli_error());
$q1 = $q1->fetch_array();
$q2 = $conn->query("SELECT COUNT(*) as total FROM `patientcheckup` WHERE `pc_diagnosis` = 'villus' && `pc_year` = '$year'") or die(mysqli_error());
$q2 = $q2->fetch_array();
$q3 = $conn->query("SELECT COUNT(*) as total FROM `patientcheckup` WHERE `pc_diagnosis` = 'Diabetes' && `pc_year` = '$year'") or die(mysqli_error());
$q3 = $q3->fetch_array();
$q4 = $conn->query("SELECT COUNT(*) as total FROM `patientcheckup` WHERE `pc_diagnosis` = 'Pelvic Inflammatory' && `pc_year` = '$year'") or die(mysqli_error());
$q4 = $q4->fetch_array();
$q7 = $conn->query("SELECT COUNT(*) as total FROM `patientcheckup` WHERE `pc_diagnosis` = 'Alpha - Fetoprotein' && `pc_year` = '$year'") or die(mysqli_error());
$q7 = $q7->fetch_array();
$q6 = $conn->query("SELECT COUNT(*) as total FROM `patientcheckup` WHERE `pc_diagnosis` = 'Asthma' && `pc_year` = '$year'") or die(mysqli_error());
$q6 = $q6->fetch_array();
$q5 = $conn->query("SELECT COUNT(*) as total FROM `patientcheckup` WHERE `pc_diagnosis` = 'Hemophilia A' && `pc_year` = '$year'") or die(mysqli_error());
$q5 = $q5->fetch_array();

?>
<script type="text/javascript"> 
	window.onload = function() { 
		$("#diagnosis").CanvasJSChart({
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
					text: "Patient Diagnosis - Year <?php echo $year?>"
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
						{ label: "Chronic Villus Sampling",  y: 
						 <?php
						if($q1 == ""){
							echo 0;
						}else{
							echo $q1['total'];
						}	
						 ?>, legendText: "Chronic Villus Sampling"},

						{ label: "Amniocentesis",  y: 
						 <?php 
						 if($q2 == ""){
							 echo 0;
						 }else{
							 echo $q2['total'];
						 }	
						 ?>, legendText: "Amniocentesis"},
						{ label: "Diabetes",  y: 
						 <?php 
						 if($q3 == ""){
							 echo 0;
						 }else{
							 echo $q3['total'];
						 }	
						 ?>, legendText: "Diabetes"},
						{ label: "Pelvic Inflammatory",  y: 
						 <?php 
						 if($q4 == ""){
							 echo 0;
						 }else{
							 echo $q4['total'];
						 }	
						 ?>, legendText: "Pelvic Inflammatory"},
						{ label: "Hemophilia A",  y: 
						 <?php 
						 if($q5 == ""){
							 echo 0;
						 }else{
							 echo $q5['total'];
						 }	
						 ?>, legendText: "Hemophilia A"},
						{ label: "Alpha - Fetoprotein",  y: 
						 <?php 
						 if($q6 == ""){
							 echo 0;
						 }else{
							 echo $q6['total'];
						 }	
						 ?>, legendText: "Alpha - Fetoprotein"},
						 { label: "Asthma",  y: 
						 <?php 
						 if($q7 == ""){
							 echo 0;
						 }else{
							 echo $q7['total'];
						 }	
						 ?>, legendText: "Asthma"}
					] 
				} 
			] 
		}); 
	} 
</script>