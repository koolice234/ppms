<?php session_start(); 
if (!isset($_SESSION['loggedIn'])) {
        echo "<script>alert('Unauthorized access!Please login! ');window.location.href='../index.php';</script>";
    }?>
<?php include("includes/header.php"); ?>
<?php include("includes/sidebar.php");
    include("dbconnect.php");
    $id = $_GET['id']; 
    $date = date('Y-m-d');
    $row = $connect->query("SELECT * FROM `patientcheckup` inner join `patient` on patientcheckup.patient_ID = patient.patient_ID where patient.patient_ID = '$id' AND patientcheckup.pc_date = '$date'") or die(mysqli_error());
   while ($fetch1 = $row->fetch_array()){
    
 ?>

<section class="content">
<div class="card">
                    
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Patient Checkups</h2>
                <form method="POST" action="actions/patientRecordAction.php">
                <div class="row">

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Patient</label>
                                <input type="text" class="form-control" value="<?php echo $fetch1['patient_Name']; ?>" disabled>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="input-group">
                            <div class="form-group">
                                 <label>Weight</label>
                                <input type="text" class="form-control" value="<?php echo $fetch1['pc_weight']; ?>" disabled>
                                <i class="form-group__bar"></i>
                            </div>
                            <span class="input-group-addon">Kilogram(Kg)</span>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Blood Pressure</label>
                            <input type="text" class="form-control" name="pc_BP" value="<?php echo $fetch1['pc_bloodPressure']; ?>" disabled>
                            <i class="form-group__bar"></i>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Diagnosis</label>
                           <textarea class="form-control textarea-autosize" name="pc_problem" disabled><?php echo $fetch1['pc_diagnosis']; ?></textarea>
                            <i class="form-group__bar"></i>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Patient Problem/Symtoms Description:</label>
                            <textarea class="form-control textarea-autosize" name="pc_problem" disabled><?php echo $fetch1['pc_problems']; ?></textarea>
                            <i class="form-group__bar"></i>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </form>
            </div>
            <div class="card-body">
               <h2 class="card-title">Prescription</h2>
                <form method="POST" action="actions/PrescriptionAction.php">
                    <?php 
                    include("dbconnect.php");
                    $id = $_GET['id']; 
                    $row = $connect->query("SELECT * FROM `patientcheckup` inner join `patient` on patientcheckup.patient_ID = patient.patient_ID  where patient.patient_ID = '$id' AND patientcheckup.pc_date = '$date'") or die(mysqli_error());
                    while ($fetch = $row->fetch_array()) {
                    
                    ?>
                    <input type="hidden" name="patientID" value="<?php echo $fetch['patient_ID'] ?>">
                    <?php } ?>

                    <?php
                    include("dbconnect.php");
                    $id = $_GET['id']; 
                    $row = $connect->query("SELECT * FROM `patientcheckup` inner join `patient` on patientcheckup.patient_ID = patient.patient_ID where patient.patient_ID = '$id' AND patientcheckup.pc_date = '$date'") or die(mysqli_error());
                    while ($fetch1 = $row->fetch_array()){ ?>

                    <input type="hidden" name="pcID" value="<?php echo $fetch1['pc_ID'] ?>">

                        <?php } ?>


                 

                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">  
                            <table class="table" id="dynamic_field">  
                                <tr>  
                                    <td>
                                        <div class="form-group">
                                        <label>Medicines</label>
                                        <select class="select2" name="medicineName">
                                            <option value="Biogesic">Biogesic</option>
                                            <option value="Medicol">Medicol</option>
                                            <option value="Decolgen">Decolgen</option>
                                            <option value="Tempra">Tempra</option>
                                            <option value="Solmux">Solmux</option>
                                        </select>
                                    </td>  
                                    <td>
                                        <div class="input-group">
                                            <div class="form-group">
                                                <label>Dosage</label>
                                                <input type="text" class="form-control" name="Dosage">
                                                <i class="form-group__bar"></i>
                                              </div>
                                            <span class="input-group-addon">Milligram(mg)</span>
                                        </div>
                                    </td>
                                    <td>
                                       
                                        <div class="form-group">
                                        <label>Frequency</label>
                                        <input type="number" name="frequency" class="form-control" placeholder="Enter Frequency">
                                        <i class="form-group__bar"></i>
                                        </div>
                                     
                                    </td> 
                                    <td>
                                        <button type="submit"  name="prescADD"  class="btn btn-primary" style="margin-top:100px; margin-right:50;">Add Prescription
                                        </button>  
                                    </td> 
                                </tr>
                                 </table>
                            </div>
                        </div>
                </div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="card-title">PATIENT XRAY LIST</h4>
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead>
                                            <tr>
                                                <th><center>Patient</center></th>
                                                <th><center>Checkup Date</center></th>
                                                <th><center>Medicines</center></th>
                                                <th><center>Dosage</center></th>
                                                <th><center>Frequency</center></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                               <!--  -->
                                                 <?php 
                                           include "dbconnect.php";
                                           date_default_timezone_set('Asia/Kuala_Lumpur');
                                           $date = date('Y-m-d');
                                           $sta1 = $connect->query("SELECT * FROM `prescription` INNER JOIN patientcheckup ON prescription.pc_ID = patientcheckup.pc_ID INNER JOIN patient on prescription.patient_ID = prescription.patient_ID WHERE patientcheckup.pc_date = '$date'AND patient.patient_ID = '$id'") or die(mysqli_error());
                                           while($path = $sta1->fetch_array()){
                                            ?>
                                            <tr>
                                                <td><center><?php echo $path['patient_Name'] ?></center></td>
                                                <td><center><?php echo $path['pc_date'] ?></center></td> 
                                                <td><center><?php echo $path['presc_medicines'] ?></center></td>
                                                <td><center><?php echo $path['presc_dosage'] ?></center></td>
                                                <td><center><?php echo $path['presc_frequency'] ?></center></td>
                                                
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                    </div>
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



