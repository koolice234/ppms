<?php session_start(); 
if (!isset($_SESSION['loggedIn'])) {
        echo "<script>alert('Unauthorized access!Please login! ');window.location.href='../index.php';</script>";
    }?>
<?php include("includes/header.php"); ?>
<?php include("includes/sidebar.php"); ?>

<section class="content">
    <div class="card">

        <div class="card-body">

                <h4>Patient Checkup Summary Report</h4>
                <br>
            <form method="post">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Starting Date</label>
                            <input type="date" name="startDate" class="form-control form-control-lg">
                            <i class="form-group__bar"></i>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Ending Date</label>
                            <input type="date" name="endDate" class="form-control form-control-lg">
                            <i class="form-group__bar"></i>
                        </div>
                    </div>
                    <div class="col-sm-2" style="margin-top: 30px;">
                        <button type="submit" name="submit" class="btn btn-primary" >Generate Report</button>
                    </div>
                    <div class="col-sm-2" style="margin-top: 30px;">
                        <a href="#" onclick="openCheckup()" class="btn btn-primary" >Generate Graph Report</a>
                    </div>
                </div>    
            </form>
           
                    <?php 
                    if(isset($_POST['submit'])) {  
                    include("dbconnect.php");
                    $start = mysqli_real_escape_string($connect, $_POST['startDate']);
                    $end = mysqli_real_escape_string($connect, $_POST['endDate']);
                    ?>

                    <div class="print">
                        
                        <table id="data-table" class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>CheckUp Date</th>
                                    <th>Diagnosis</th>
                                    <th>Blood Pressure</th>
                                    <th>Problems</th>
                                    <th>Print</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $result = mysqli_query($connect, "SELECT * FROM `patientcheckup` INNER JOIN `patient` ON patientcheckup.patient_ID = patient.patient_ID INNER JOIN `schedule` ON patientcheckup.sched_ID = schedule.sched_ID WHERE schedule.sched_Date BETWEEN '$start' AND '$end'");
                                while ($res1 = mysqli_fetch_array($result)) {
                                   
                                    ?>
                                    <tr>
                                    <td><?php echo $res1['patient_Name'] ?></td>
                                    <td><?php echo $res1['pc_date'] ?></td>
                                    <td><?php echo $res1['pc_diagnosis'] ?></td>
                                    <td><?php echo $res1['pc_bloodPressure'] ?></td>
                                    <td><?php echo $res1['pc_problems'] ?></td>
                                    <td><a href="printCheckupSummary.php?id=<?php echo $res1['patient_ID'] ?>" class="btn btn-primary" target="_blank">Print</a></td>
                                <?php } ?>
                                </tr>
                            </tbody>
                        </table>
                     </div>
                     <?php  }else {?>
                     <div class="table-responsive">
                        
                        <table id="data-table" class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>CheckUp Date</th>
                                    <th>Diagnosis</th>
                                    <th>Blood Pressure</th>
                                    <th>Problems</th>
                                    <th>Print</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                include("dbconnect.php");
                                $result = mysqli_query($connect, "SELECT * FROM `patientcheckup` INNER JOIN `patient` ON patientcheckup.patient_ID = patient.patient_ID INNER JOIN `schedule` ON patientcheckup.sched_ID = schedule.sched_ID");
                                while ($res1 = mysqli_fetch_array($result)) {
                                   
                                    ?>
                                    <tr>
                                    <td><?php echo $res1['patient_Name'] ?></td>
                                    <td><?php echo $res1['pc_date'] ?></td>
                                    <td><?php echo $res1['pc_diagnosis'] ?></td>
                                    <td><?php echo $res1['pc_bloodPressure'] ?></td>
                                    <td><?php echo $res1['pc_problems'] ?></td>
                                    <td><a href="printCheckupSummary.php?id=<?php echo $res1['patient_ID'] ?>" class="btn btn-primary" target="_blank">Print</a></td>
                                <?php } ?>
                                </tr>
                            </tbody>
                        </table>
                     </div> 
                     <?php  } ?>


        </div>
    </div>
</section>
<script>
    function openCheckup() {
                myWindow = window.open("diagnosis.php?year=2018", "", "width=1350, height=650");
            }
</script>

<!-- Javascript -->
<!-- Vendors -->

<?php include("includes/footerscripts.php"); ?>

<?php include("includes/footer.php"); ?>
<!-- Javascript -->
<!-- Vendors -->



