 <?php

$year = date('Y');
if(isset($_GET['year']))
{
	$year=$_GET['year'];
}

$conn = new mysqli("localhost", "root", "", "ppms_db") or die(mysqli_error());
$q1 = $conn->query("SELECT COUNT(*) as total FROM `ultrasound` WHERE `ultra_fetusQty` = '1' && `year` = '$year'") or die(mysqli_error());
$q1 = $q1->fetch_array();
$q2 = $conn->query("SELECT COUNT(*) as total FROM `ultrasound` WHERE `ultra_fetusQty` = '2' && `year` = '$year'") or die(mysqli_error());
$q2 = $q2->fetch_array();
$q3 = $conn->query("SELECT COUNT(*) as total FROM `ultrasound` WHERE `ultra_fetusQty` = '3' && `year` = '$year'") or die(mysqli_error());
$q3 = $q3->fetch_array();
$q4 = $conn->query("SELECT COUNT(*) as total FROM `ultrasound` WHERE `ultra_fetusQty` = '4' && `year` = '$year'") or die(mysqli_error());
$q4 = $q4->fetch_array();
$q5 = $conn->query("SELECT COUNT(*) as total FROM `ultrasound` WHERE `ultra_fetusQty` = '5' && `year` = '$year'") or die(mysqli_error());
$q5 = $q5->fetch_array();
$q6 = $conn->query("SELECT COUNT(*) as total FROM `ultrasound` WHERE `ultra_fetusQty` = '6' && `year` = '$year'") or die(mysqli_error());
$q6 = $q6->fetch_array();

?>
<script type="text/javascript"> 
	window.onload = function() { 
		$("#multiple").CanvasJSChart({
			theme: "light2",
			animationEnabled: true,
			animationDuration: 1000,
			exportFileName: "Bacteriological Status", 
			exportEnabled: true,
			title: { 
				text: "DIY OB-Gyne Clinic - Year <?php echo $year?>",
				fontSize: 20
			}, 
			subtitles:[
				{
					text: "Multiple Pregnancy Cases - Year <?php echo $year?>"
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
						{ label: "Normal",  y: 
						 <?php
						if($q1 == ""){
							echo 0;
						}else{
							echo $q1['total'];
						}	
						 ?>, legendText: "Normal"},

						{ label: "Twins",  y: 
						 <?php 
						 if($q2 == ""){
							 echo 0;
						 }else{
							 echo $q2['total'];
						 }	
						 ?>, legendText: "Twins"},
						{ label: "Triplets",  y: 
						 <?php 
						 if($q3 == ""){
							 echo 0;
						 }else{
							 echo $q3['total'];
						 }	
						 ?>, legendText: "Triplets"},
						{ label: "Quadruplets",  y: 
						 <?php 
						 if($q4 == ""){
							 echo 0;
						 }else{
							 echo $q4['total'];
						 }	
						 ?>, legendText: "Quadruplets"},
						{ label: "Quintuplets",  y: 
						 <?php 
						 if($q5 == ""){
							 echo 0;
						 }else{
							 echo $q5['total'];
						 }	
						 ?>, legendText: "Quintuplets"},
						{ label: "Sextoplets",  y: 
						 <?php 
						 if($q6 == ""){
							 echo 0;
						 }else{
							 echo $q6['total'];
						 }	
						 ?>, legendText: "Sextoplets"}
					] 
				} 
			] 
		}); 
	} 
</script>