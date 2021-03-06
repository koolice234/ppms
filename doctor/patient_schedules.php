
<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Patient Schedules Total</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <script src="charteasy/jquery.min.js"></script>
        <script src = "charteasy/jquery.canvasjs.min.js"></script>
        <?php require 'charteasy/patient_schedules.php' ?>
    </head>
    <body>

        <div class="panel-body">
           <center><img src="../img/logo.png" style="width:100%;height: 50%; max-width:300px;max-height:200px;"></center>
        <div id="patient_population" style="width: 100%; height: 400px"></div>
        </div>
        <div class="btn-group pull-right">
            <div class="pull-left">
                <select id="pyear" class="validate[required] select" data-style="btn-primary" data-live-search="true">
                    <option>Select Year...</option>
                    <option value="<?php 
    if(isset($_GET['year'])){
        $value=$_GET['year']; 
        echo $value;
    }
        else{
            echo date('Y');
        }
                                   ?>">
                        <?php 
                        if(isset($_GET['year'])){
                            $value=$_GET['year']; 
                            echo $value;
                        }
                        else{
                            echo date('Y');
                        }
                        ?></option>
                    <?php
                    for($y=2013; $y<=2025; $y++){
                    ?>
                    <option value="<?php echo $y ?>"><?php echo $y; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
        </div>
        <script>
            $(document).ready(function(){
                $("#pyear").on('change', function(){
                    var year=$(this).val();
                    window.location = 'patient_schedules.php?year='+year;
                });
            });
        </script>
    </body>
</html>