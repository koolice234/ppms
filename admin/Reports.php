<?php include("includes/header.php"); ?>
<?php include("includes/sidebar.php"); ?>

<section class="content">
<div class="card">
                    <div class="card-body">
                        <form method="post">
                            <h4 class="card-title">Reports</h4>
                        <!--     <div class="col-sm-8"> -->
                            <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <select class="select2 form-control show-tick" name="ReportType">
                                        <option  name="Checkup" id="Checkup" value="Checkup">Checkup Summary Report</option>
                                        <option  name="Patient" id="Patient"  value="Patient">Patient Report</option>
                                        <option  name="Schedule" id="Schedule" value="Schedule">Schedule Pressure Report</option>
                                        <option  name="Multiple" id="Multiple" value="Multiple">Multiple Pregnancy Report</option>
                                        <option  name="PregnancyP" id="PregnancyP" value="PregnancyP">Pregnancy Progress Report</option>
                                        <option  name="PregnancyC" id="PregnancyC" value="PregnancyC">Pregnancy Complications Report</option>
                                        <option  name="PatientH" id="PatientH" value="PatientH">Patient History Report</option>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <select class="select2 form-control show-tick" name="patient">
                                        <option active >Patient Name</option>
                                        <?php
                                        include "dbconnect.php";
                                        $pat = $connect->query("SELECT * FROM `patient` ") or die(mysqli_error());
                                        while($fetch = $pat->fetch_array()){?>

                                        <option name="patient"><?php echo $fetch['patient_firstName'] ." ". $fetch['patient_lastName'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Starting Date</label>
                                        <input type="date" name="startDate" class="form-control form-control-lg">
                                        <i class="form-group__bar"></i>
                                    </div>
                                </div>
                            <br>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Ending Date</label>
                                        <input type="date" name="endDate" class="form-control form-control-lg">
                                        <i class="form-group__bar"></i>
                                    </div>
                                </div>
                            </div>
                    <button type="submit" name="submit" class="btn btn-primary">Generate Report</button>
                </form>

                <?php 
                include "../dbconnect.php";
                if(isset($_POST['submit'])) {   
                    $patientName = mysqli_real_escape_string($connect, $_POST['patient']);
                   // $month = $_POST['month'];
                    $query = mysqli_Query($connect, "SELECT * FROM `patient` WHERE `patient_Name`='$patientName'") or die(mysql_error());

                    $patient_list = mysqli_fetch_assoc($query);
                    $patientID = $patient_list['patient_ID'];    

                    $ReportType = mysqli_real_escape_string($connect, $_POST['ReportType']);

                    switch ($_POST['ReportType']) {
                    case 'Checkup':  ?>
                   
                    <!--start-->

                    <?php 
                    if($patientName == Null){ ?>

                        <div class="table-responsive">
                            
                            <table id="data-table" class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>CheckUp Date</th>
                                        <th>Diagnosis</th>
                                        <th>Blood Pressure</th>
                                        <th>Problems</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $result = mysqli_query($connect, "SELECT * FROM `patientcheckup` INNER JOIN `patient` ON patientcheckup.patient_ID = patient.patient_ID order by pc_ID");
                                    while ($res1 = mysqli_fetch_array($result)) {
                                       
                                        ?>
                                        <tr>
                                        <td><?php echo $res1['patient_Name'] ?></td>
                                        <td><?php echo $res1['pc_date'] ?></td>
                                        <td><?php echo $res1['pc_diagnosis'] ?></td>
                                        <td><?php echo $res1['pc_bloodPressure'] ?></td>
                                        <td><?php echo $res1['pc_problems'] ?></td>
                                    
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                         </div>
                        

                   <?php }else{ ?>

                    
                        <div class="table-responsive">
                            <table id="data-table" class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>CheckUp Date</th>
                                        <th>Diagnosis</th>
                                        <th>Blood Pressure</th>
                                        <th>Problems</th>
                                        <th>print</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $result = mysqli_query($connect, "SELECT * FROM `patientcheckup` INNER JOIN `patient` ON patientcheckup.patient_ID = patient.patient_ID WHERE patientcheckup.patient_ID = '$patientID'");
                                    while ($res1 = mysqli_fetch_array($result)) {
                                       
                                        ?>
                                        <tr>
                                        <td><?php echo $res1['patient_Name'] ?></td>
                                        <td><?php echo $res1['pc_date'] ?></td>
                                        <td><?php echo $res1['pc_diagnosis'] ?></td>
                                        <td><?php echo $res1['pc_bloodPressure'] ?></td>
                                        <td><?php echo $res1['pc_problems'] ?></td>
                                        <td><a href="printCheckupSummary.php?id=<?php echo $res1['patient_ID'] ?>" class="btn btn-primary" >PRINT</a></td>
                                    
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                         </div>


                         <?php } ?>

                         <!--end of checkup-->
                         <?php 
                            break;
                            case 'Patient':
                            ?>
                            <div class="table-responsive">
                            <table id="data-table" class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Contact Number</th>
                                        <th>Blood Type</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $result = mysqli_query($connect, "SELECT * FROM `patient` order by patient_ID");
                                    while ($res1 = mysqli_fetch_array($result)) {
                                       
                                        ?>
                                        <tr>
                                        <td><?php echo $res1['patient_Name'] ?></td>
                                        <td><?php echo $res1['patient_address'] ?></td>
                                        <td><?php echo $res1['patient_contactNumber'] ?></td>
                                        <td><?php echo $res1['patient_bloodType'] ?></td>
                                    
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            </div>
                            <!--start-->
                         <?php   if($patientName == Null && $month != Null){ ?>
                                 <div class="table-responsive">
                            <table id="data-table" class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Contact Number</th>
                                        <th>Blood Type</th>
                                        <th>Birth Date</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $result = mysqli_query($connect, "SELECT * FROM `patient` WHERE `patient_month` = '$month' order by patient_ID ");
                                    while ($res1 = mysqli_fetch_array($result)) {
                                       
                                        ?>
                                        <tr>
                                        <td><?php echo $res1['patient_Name'] ?></td>
                                        <td><?php echo $res1['patient_address'] ?></td>
                                        <td><?php echo $res1['patient_contactNumber'] ?></td>
                                        <td><?php echo $res1['patient_bloodType'] ?></td>
                                        <td><?php echo $res1['patient_bdate'] ?></td>
                                    
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            </div>

                       <?php }elseif($patientName != Null){ ?>
                        <div class="table-responsive">
                            <table id="data-table" class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Contact Number</th>
                                        <th>Blood Type</th>
                                        <th>Birth Date</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $result = mysqli_query($connect, "SELECT * FROM `patient` WHERE patient_ID = '$patientID'");
                                    while ($res1 = mysqli_fetch_array($result)) {
                                       
                                        ?>
                                        <tr>
                                        <td><?php echo $res1['patient_Name'] ?></td>
                                        <td><?php echo $res1['patient_address'] ?></td>
                                        <td><?php echo $res1['patient_contactNumber'] ?></td>
                                        <td><?php echo $res1['patient_bloodType'] ?></td>
                                        <td><?php echo $res1['patient_bdate'] ?></td>
                                    
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            </div>
                           
                        <?php } 
                            break;       
                            case 'Schedule':
                            ?>
                            
                            
                            <!--start-->
                         <?php   if($patientName == Null && $month != Null){ 
                             $startDate = $_POST['startDate'];
                                    $endDate = $_POST['endDate'];
                            ?>
                         
                                 <div class="table-responsive">
                             <table id="data-table" class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Schedule Date</th>
                                        <th>Schedule Time</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $result = mysqli_query($connect, "SELECT * FROM `schedule` INNER JOIN patient on schedule.patient_ID = patient.patient_ID where schedule.sched_Date BETWEEN '$startDate' AND '$endDate'");
                                    while ($res1 = mysqli_fetch_array($result)) {
                                       
                                        ?>
                                        <tr>
                                        <td><?php echo $res1['patient_Name'] ?></td>
                                        <td><?php echo $res1['sched_Date'] ?></td>
                                        <td><?php echo $res1['sched_Time'] ?></td>
                                    
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            </div>

                       <?php }elseif($patientName != Null){

                                    $startDate = $_POST['startDate'];
                                    $endDate = $_POST['endDate']; ?>
                        <div class="table-responsive">

                                 <table id="data-table" class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Schedule Date</th>
                                        <th>Schedule Time</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $result = mysqli_query($connect, "SELECT * FROM `schedule` INNER JOIN patient on schedule.patient_ID = patient.patient_ID where schedule.sched_Date BETWEEN '$startDate' AND '$endDate'");
                                    while ($res1 = mysqli_fetch_array($result)) {
                                       
                                        ?>
                                        <tr>
                                        <td><?php echo $res1['patient_Name'] ?></td>
                                        <td><?php echo $res1['sched_Date'] ?></td>
                                        <td><?php echo $res1['sched_Time'] ?></td>
                                    
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            </div>
                           
                        <?php } ?>
                                <?php 

                                default:

                                break;
                            }

                        }
                        ?> 
                </div>
            </div>
</section>
</main>


<!-- Javascript -->
<!-- Vendors -->

<?php include("includes/footerscripts.php"); ?>

<?php include("includes/footer.php"); ?>
<!-- Javascript -->
<!-- Vendors -->



