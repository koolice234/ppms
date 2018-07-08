<?php
	$id=$_GET['id'];
	include("../dbconnect.php");

                $dataBPD = '';
                $dataHC = '';
                $dataFL = '';
                $dataAC = '';
                $dataEFW = '';
                $result1 = mysqli_query($connect, "SELECT * FROM `ultrasound` WHERE `patient_ID` = '$id'");
                $result2 = mysqli_query($connect, "SELECT patient_Name FROM patient WHERE patient_ID = '$id'");
                while ($res = mysqli_fetch_array($result2)) {
                	$name = $res['patient_Name'];
                }
                while ($res1 = mysqli_fetch_array($result1)) {
                    $dataBPD .="{ label: '".$res1["ultra_date"]."', y: ".$res1["ultra_biparietalDiameter"]."},";
                     $dataHC .="{ label: '".$res1["ultra_date"]."', y: ".$res1["ultra_headCircumference"]."},";
                     $dataFL .="{ label: '".$res1["ultra_date"]."', y: ".$res1["ultra_femoralLenght"]."},";
                     $dataAC .="{ label: '".$res1["ultra_date"]."', y: ".$res1["ultra_abdominal"]."},";
                }

               

                    // Output json for our calendar
                   
            
?>
<script type="text/javascript"> 
	window.onload = function(){ 
		$("#BPD").CanvasJSChart({
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
				title: "Centimeters", 
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
					legendText: "Biparietal Diameter",
					name: "Biparietal Diameter",
					color: "#7E8F74",
					dataPoints: [<?php echo "$dataBPD"; ?>] 
				},
				{ 
					type: "line", 
					showInLegend: true, 
					legendText: "Head Circumference",
					name: "Head Circumference",
					color: "#112233",
					dataPoints: [<?php echo "$dataHC"; ?>] 
				},
				{ 
					type: "line", 
					showInLegend: true, 
					legendText: "Femoral Length",
					name: "Femoral Length",
					color: "#FFACB2",
					dataPoints: [<?php echo "$dataFL"; ?>] 
				},
				{ 
					type: "line", 
					showInLegend: true, 
					legendText: "Abdominal Circumference",
					name: "Abdominal Circumference",
					color: "#004886",
					dataPoints: [<?php echo "$dataAC"; ?>] 
				}
			] 
		}); 
	}
</script>