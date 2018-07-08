<?php
	$id=$_GET['id'];
	include("../dbconnect.php");

               
                $dataHR = '';
                $result1 = mysqli_query($connect, "SELECT * FROM `ultrasound` WHERE `patient_ID` = '$id'");
                $result2 = mysqli_query($connect, "SELECT patient_Name FROM patient WHERE patient_ID = '$id'");
                while ($res = mysqli_fetch_array($result2)) {
                	$name = $res['patient_Name'];
                }
                while ($res1 = mysqli_fetch_array($result1)) {
                     $dataHR .="{ label: '".$res1["ultra_date"]."', y: ".$res1["ultra_fetalHeart"]."},";
                }

               

                    // Output json for our calendar
                   
           
?>
<script type="text/javascript"> 
	window.onload = function(){ 
		$("#FL").CanvasJSChart({
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
				text: "<?php echo $name ?>'s Progress  ",
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
				title: "Beats Per Minute", 
				includeZero: false,
				labelFontColor: "black",
				crosshair: {
					enabled: true 
				}
			}, 
			data: [ 
				{ 
					type: "line", 
					showInLegend: true, 
					legendText: "Fetal Heart Rate",
					name: "Fetal Heart Rate",
					color: "#004886",
					dataPoints: [<?php echo "$dataHR"; ?>] 
				}
			] 
		}); 
	}
</script>