
<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from byrushan.com/projects/super-admin/app/2.1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Jan 2018 17:13:07 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>DIY | PPMS</title>

        
        <!-- Vendor styles -->
        <link rel="stylesheet" href="vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css">
        <link rel="stylesheet" href="vendors/bower_components/animate.css/animate.min.css">
        <link rel="stylesheet" href="vendors/bower_components/jquery.scrollbar/jquery.scrollbar.css">
        <link rel="stylesheet" href="vendors/bower_components/select2/dist/css/select2.min.css">
        <link rel="stylesheet" href="vendors/bower_components/fullcalendar/dist/fullcalendar.min.css">
        <link rel="stylesheet" href="vendors/bower_components/dropzone/dist/dropzone.css">
        <link rel="stylesheet" href="vendors/bower_components/flatpickr/dist/flatpickr.min.css" />
        <link rel="stylesheet" href="vendors/bower_components/nouislider/distribute/nouislider.min.css">
        <link rel="stylesheet" href="vendors/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.css">
        <link rel="stylesheet" href="vendors/bower_components/trumbowyg/dist/ui/trumbowyg.min.css">
        <link rel="stylesheet" href="vendors/bower_components/rateYo/min/jquery.rateyo.min.css">    
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <!-- App styles -->
        <link rel="stylesheet" href="css/app.min.css">

        <!-- Demo only -->
        <link rel="stylesheet" href="demo/css/demo.css">
    </head>

    <body data-sa-theme="7" onload="myFunction()">
        <main class="main">


            <header class="header">
                <div class="navigation-trigger hidden-xl-up" data-sa-action="aside-open" data-sa-target=".sidebar">
                    <i class="zmdi zmdi-menu"></i>
                </div>

                <div class="logo hidden-sm-down">
                    <h1 style="font-size: 18px;"><a href="index.php"><img src="../images/logo.png" height="35px" width="200px">&nbsp;&nbsp;&nbsp; Pregnancy Progress Monitoring System</a></h1>
                </div>
            <div style="margin-left: 44%;">
                <div class="clock hidden-md-down">
                    <div class="time">
                        <span class="time__hours"></span>
                        <span class="time__min"></span>
                        <span class="time__sec"></span>
                    </div>
                </div>
            </div>
            </header>
    <aside class="sidebar">
                <div class="scrollbar-inner">

                    <div class="user">
                        <div class="user__info" data-toggle="dropdown">
                            <img class="user__img" src="demo/img/profile-pics/8.jpg" alt="">
                            <div>
                                <div class="user__name">Secretary</div>
                            </div>
                        </div>
                    </div>

                    <ul class="navigation">
                        <li class="navigation_active"><a href="index.php"><i class="zmdi zmdi-home"></i>Dashboard</a></li>
                        <li class="navigation__sub">
                            <a href="#"><i class="zmdi zmdi-account-box"></i> Data Entry</a>

                            <ul>
                                <li><a href="DataEntry-Patient.php">Patient</a></li>
                                <li><a href="DataEntry-Staff.php">Staff</a></li>
                            </ul>
                        </li>

                        <li class="navigation__sub">
                            <a href="#"><i class="zmdi zmdi-hospital"></i> Patient Records</a>

                            <ul>
                               <!--  <li><a href="PatientRecord-Checkup.php">Patient Checkups</a></li> -->
                                <li><a href="PatientRecord-Schedule.php">Schedule Checkups</a></li>
                                
                            </ul>
                        </li>
                                
                        <li class="navigation_active"><a href="reports.php"><i class="zmdi zmdi-trending-up"></i>Reports</a></li>
                
                        <li class="navigation__sub">
                            <a href="#"><i class="zmdi zmdi-settings"></i> Maintenance</a>
                            <ul>
                                <li><a href="export/export.php">Export Database</a></li>
                                <li><a href="export/import.php">Import Database</a><li>
                                
                            </ul>
                        </li>
                        <li><a href="../index.php"><i class="zmdi zmdi-home"></i> Logout</a></li>
                    </ul>
                </div>
</aside>
 
        <section class="content">
            <div class="card">
                <form method="POST" action="actions/ultrasoundAction.php">
                <div class="card-body">
                    <h2 class="card-title">Ultrasound</h2>
                <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Patient Name</label>
                                <?php
                                include "dbconnect.php";
                                $id = $_GET['id5'];
                                $pat = $connect->query("SELECT * FROM `schedule` INNER JOIN `patient` on schedule.patient_ID = patient.patient_ID WHERE schedule.patient_ID = '$id'") or die(mysqli_error());
                                while($fetch = $pat->fetch_array()){?>
                                <input name = "patientUltra" type="text" class="form-control" value="<?php echo $fetch['patient_Name']?>"  disabled>
                                 <input type="hidden" name="patientUltraID" value="<?php echo $fetch['patient_ID']; ?>" >

                                <input type="hidden" name = "schedID" value="<?php echo $fetch['sched_ID']?>" >
                                <?php } ?> 
                                  
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Date of Checkup</label>
                                <?php include "dbconnect.php";
                           
                            $pat = $connect->query("SELECT * FROM `schedule` INNER JOIN `patient` on schedule.patient_ID = patient.patient_ID WHERE schedule.patient_ID = '$id'") or die(mysqli_error());
                            while($fetch = $pat->fetch_array()){ ?>
                        <input type="date" class="form-control form-control-lg date-picker" value="<?php echo $fetch['sched_Date']; ?>" name="pat_date"  placeholder="Enter Date of Chekup"  disabled>

                        <?php } ?>
                                
                                <i class="form-group__bar"></i>
                            </div>
                        </div>
                                <input type="hidden" name="patientcheckupID" value="<?php echo $fetch['pc_ID']; ?>">
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                    <label>Last Menstruation Period</label>
                                    <?php include "dbconnect.php";
                           
                            $pat = $connect->query("SELECT * FROM `schedule` INNER JOIN `patient` on schedule.patient_ID = patient.patient_ID WHERE schedule.patient_ID = '$id'") or die(mysqli_error());
                            while($fetch = $pat->fetch_array()){ ?>
                        <input type="text" class="form-control form-control-lg " value="<?php echo $fetch['patient_LMP']; ?>" name="pat_date"  disabled>

                        <?php } ?>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Reason For Referral</label>
                                <textarea class="form-control textarea-autosize text-counter" name="ultra_reason" placeholder="Enter Reason For Referral..."></textarea>
                                <i class="form-group__bar"></i>
                            </div>
                        </div>
                    </div>
                <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group">
                                <div class="form-group">
                                    <label>Biparietal Diameter</label>
                                        <input type="text" class="form-control" name="ultra_biparietalDiameter" placeholder="Enter Biparietal Diameter result">
                                            <i class="form-group__bar"></i>
                                </div>
                            <span class="input-group-addon">cm.</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                <div class="form-group">
                                    <label>Occipito-frontal Diameter</label>
                                        <input type="text" class="form-control" name="ultra_occiDiameter" placeholder="Enter Occipito-frontal Diameter result">
                                            <i class="form-group__bar"></i>
                                </div>
                            <span class="input-group-addon">cm.</span>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="form-group">
                                    <label>Abdominal Circumference</label>
                                        <input type="text" class="form-control" name="ultra_abdominal" placeholder="Enter Abdominal Circumference result">
                                            <i class="form-group__bar"></i>
                                </div>
                            <span class="input-group-addon">cm.</span>
                            </div>
                       </div>
                       <div class="col-md-4">
                            <div class="input-group">
                                <div class="form-group">
                                    <label>Fetal Hearth Rate</label>
                                        <input type="text" class="form-control" name="ultra_fetalHeart" placeholder="Enter Fetal Hearth Rate result">
                                            <i class="form-group__bar"></i>
                                </div>
                            <span class="input-group-addon">bpm</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="form-group">
                                    <label>Distal Femoral Epiphysis</label>
                                        <input type="text" class="form-control"  name="ultra_distalFemoral" placeholder="Enter Distal Femoral Epiphysis result">
                                            <i class="form-group__bar"></i>
                                </div>
                            <span class="input-group-addon">cm.</span>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-group">
                                <div class="form-group">
                                    <label>Femoral Length</label>
                                        <input type="number" class="form-control" name="ultra_femoralLenght" placeholder="Enter Femoral Length result">
                                        <i class="form-group__bar"></i>
                                </div>
                            <span class="input-group-addon">cm.</span>
                            <input type="number" class="form-control" name="ultra_femoralLenghtWeek" placeholder="Enter Femoral Length week result">
                                <i class="form-group__bar"></i>
                            <span class="input-group-addon">week(s)</span>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-group">
                                <div class="form-group">
                                    <label>Head Circumference</label>
                                        <input type="text" class="form-control" name="ultra_headCircumference" placeholder="Enter Occipito-frontal Diameter result">
                                        <i class="form-group__bar"></i>
                                </div>
                            <span class="input-group-addon">centimeters</span>
                            <input type="number" class="form-control" name="ultra_headCircumferenceWeek" placeholder="Enter Head Circumference week result">
                                <i class="form-group__bar"></i>
                            <span class="input-group-addon">week(s)</span>
                            </div>
                        </div>
                    </div>
                    <br>
                <hr>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group">
                                <div class="form-group">
                                    <label>Estimated Fetal Weight</label>
                                        <input type="text" class="form-control" name="ultra_estimatedFetal" placeholder="Enter Occipito-frontal Diameter result">
                                        <i class="form-group__bar"></i>
                                </div>
                            <span class="input-group-addon">weeks</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group" style="margin-top:26px;">
                                <input type="text" class="form-control" placeholder="
                                Estimated Fetal Weight Result" disabled="">
                                <i class="form-group__bar"></i>
                            </div> 
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-primary" style="margin-top:23px;">CHECK</button>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="form-group">
                                    <label>Hadlock</label>
                                        <input type="number" class="form-control" name="ultra_hadlock" placeholder="Enter Hadlock result">
                                            <i class="form-group__bar"></i>
                                </div>
                            <span class="input-group-addon">grams</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="form-group">
                                    <label>Warsof</label>
                                        <input type="number" class="form-control" name="ultra_warsof" placeholder="Enter Warsof result">
                                            <i class="form-group__bar"></i>
                                </div>
                            <span class="input-group-addon">grams</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="form-group">
                                    <label>Placenta</label>
                                        <input type="number" class="form-control" name="ultra_placenta" placeholder="Enter placenta result">
                                            <i class="form-group__bar"></i>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <br>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="input-group">
                                <div class="form-group">
                                    <label>Amoniotic Fluid Result 1</label>
                                        <input type="number" class="form-control" name="ultra_amonioticFluid1" placeholder="Enter Amoniotic Fluid Result 1 result">
                                            <i class="form-group__bar"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="input-group">
                                <div class="form-group">
                                    <label>Amoniotic Fluid Result 2</label>
                                        <input type="number" class="form-control" name="ultra_amonioticFluid2" placeholder="Enter Amoniotic Fluid Result 2 result">
                                            <i class="form-group__bar"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="input-group">
                                <div class="form-group">
                                    <label>Amoniotic Fluid Result 3</label>
                                        <input type="number" class="form-control" name="ultra_amonioticFluid3" placeholder="Enter Amoniotic Fluid Result 3 result">
                                            <i class="form-group__bar"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="input-group">
                                <div class="form-group">
                                    <label>Amoniotic Fluid Result 4</label>
                                        <input type="number" class="form-control" name="ultra_amonioticFluid4" placeholder="Enter Amoniotic Fluid Result 4 result">
                                            <i class="form-group__bar"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group">
                                <div class="form-group">
                                    <label>Cervical Length</label>
                                        <input type="text" class="form-control" name="ultra_cervical" placeholder="Enter Cervical Length result">
                                            <i class="form-group__bar"></i>
                                </div>
                            <span class="input-group-addon">cm.</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Cervical Length Description</label>
                                <textarea class="form-control textarea-autosize text-counter" name="ultra_cervicalDesc" placeholder="Enter Cervical Length Description..."></textarea>
                                <i class="form-group__bar"></i>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group">
                                <div class="form-group">
                                    <label>Nuchal Fold Thickness</label>
                                        <input type="text" class="form-control" name="ultra_nuchalFold" placeholder="Enter Nuchal Fold Thickness result">
                                            <i class="form-group__bar"></i>
                                </div>
                            <span class="input-group-addon">cm.</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                <div class="form-group">
                                    <label>Fetal Tone</label>
                                        <input type="text" class="form-control" name="ultra_fetalTone" placeholder="Enter Fetal Tone result">
                                            <i class="form-group__bar"></i>
                                </div>
                            <span class="input-group-addon">cm.</span>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group">
                                <div class="form-group">
                                    <label>Fetal Movement</label>
                                        <input type="text" class="form-control" name="ultra_fetalMovement" placeholder="Enter Fetal Movement result">
                                            <i class="form-group__bar"></i>
                                </div>
                            <span class="input-group-addon">cm.</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                <div class="form-group">
                                    <label>Fetal Breathing</label>
                                        <input type="text" class="form-control" name="ultra_fetalBreathing" placeholder="Enter Fetal Breathing Diameter result">
                                            <i class="form-group__bar"></i>
                                </div>
                            <span class="input-group-addon">cm.</span>
                            </div>
                        </div>
                    </div>
                    <br>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="input-group">
                                    <div class="form-group">
                                        <label>Biophysical Profile Score</label>
                                            <input type="number" class="form-control" name="ultra_biophysicalProfile" min="0" max="10">
                                            <i class="form-group__bar"></i>
                                    </div>
                                
                                </div>  
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Other Findings:</label>
                                <textarea class="form-control textarea-autosize text-counter" name="ultra_other" placeholder="Enter Other Findings..."></textarea>
                                <i class="form-group__bar"></i>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Remarks:</label>
                                <textarea class="form-control textarea-autosize text-counter" name="ultra_remark" placeholder="Enter Remarks..."></textarea>
                                <i class="form-group__bar"></i>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-left:800px;">
                        <button type="submit" name="ultraAdd" class="btn btn-primary" >SUBMIT</button>
                    </div>
                    
                    
















                </div>
            </form>
            </div>
            
        </section>
        </main>

<?php include("includes/footer.php"); ?>
        <!-- Javascript -->
        <!-- Vendors -->
        
    </body>
<script>
function myFunction() {
    var person = prompt("Please enter your name");
    
}
</script>
<?php include("includes/footerscripts.php"); ?>
<!-- Mirrored from byrushan.com/projects/super-admin/app/2.1/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Jan 2018 17:21:41 GMT -->
</html>