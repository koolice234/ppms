<?php session_start(); 
if (!isset($_SESSION['loggedIn'])) {
        echo "<script>alert('Unauthorized access!Please login! ');window.location.href='../index.php';</script>";
    }?>
<?php include("includes/header.php"); ?>
<?php include("includes/sidebar.php");
    include("dbconnect.php");
    $id = $_GET['id']; 
    $row = $connect->query("SELECT * FROM `patientcheckup` inner join `patient` on patientcheckup.patient_ID = patient.patient_ID where patient.patient_ID = '$id'") or die(mysqli_error());
   while ($fetch1 = $row->fetch_array()){
    
 ?>
 <section class="content">
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
    </div>
</section>
