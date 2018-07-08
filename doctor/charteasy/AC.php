<?php
	$id=$_GET['id'];
	include("../dbconnect.php");
	$result = mysqli_query($connect, "SELECT * FROM `ultrasound` WHERE `patient_ID` = '$id'");
	$res1 = mysqli_fetch_array($result);
?>
<script type="text/javascript"> 
	window.onload = function(){ 
		$("#AC").CanvasJSChart({
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
				text: "Abdominal Circumference ",
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
				title: "Checkup Date",        
				gridDashType: "dot",
				gridThickness: 1,
				labelFontColor: "black",
				crosshair: {
					enabled: true 
				}
			},
			axisY: { 
				title: "Centimeters", 
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
					legendText: "Abdominal Circumference of Checkup Date",
					name: "Total Patients this month",
					color: "#7E8F74",
					dataPoints: [ 
						{ label: "<?php echo $res1['ultra_date']?>", y: <?php echo $res1['ultra_abdominal']?> }
						

					] 
				}
			] 
		}); 
	}
</script>