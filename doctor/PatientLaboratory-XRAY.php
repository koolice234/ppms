<?php session_start(); 
if (!isset($_SESSION['loggedIn'])) {
        echo "<script>alert('Unauthorized access!Please login! ');window.location.href='../index.php';</script>";
    }?>
<?php 
    include("includes/header.php");

    include("includes/sidebar.php");

    ?>
 
        <section class="content">
            <div class="card">
                <form method="POST" action="actions/xrayAction.php">
                <div class="card-body">
                    <h2 class="card-title">X-RAY</h2>
                <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Patient Name</label>
                                    <select class="select2 form-control show-tick" name="patientxray" disabled>
                                    <?php
                                    include "dbconnect.php";
                                    date_default_timezone_set('Asia/Singapore');
                                    $date = date('Y-m-d');
                                         $id = $_GET['id4'];
                                    $pat = $connect->query("SELECT * FROM `schedule` INNER JOIN `patient` on schedule.patient_ID = patient.patient_ID WHERE schedule.patient_ID = '$id' AND schedule.sched_Date = '$date'") or die(mysqli_error());
                                    while($fetch = $pat->fetch_array()){?>
                                    <option value="<?php echo $fetch['pc_ID']; ?>"><?php echo $fetch['patient_Name']; ?></option>
                                    <input type="hidden" name="patientcheckupID" value="<?php echo $fetch['patient_ID']; ?>" >
                                    <input type="hidden" name = "schedID" value="<?php echo $fetch['sched_ID']?>" >
                                    </select>
                                    <?php } ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Date of Checkup</label>
                                <?php
                                $pat = $connect->query("SELECT * FROM `schedule` INNER JOIN `patient` on schedule.patient_ID = patient.patient_ID WHERE schedule.patient_ID = '$id' AND schedule.sched_Date = '$date'") or die(mysqli_error());
                            while($fetch = $pat->fetch_array()){ ?>
                                 <input type="date" class="form-control form-control-lg date-picker" value="<?php echo $fetch['sched_Date']; ?>" name="pat_date"  placeholder="Enter Date of Chekup"  disabled>
                                <?php } ?>
                                <i class="form-group__bar"></i>
                            </div>
                        </div>
                                <input type="hidden" name="patientcheckupID" value="<?php echo $fetch['pc_ID']; ?>">
                                    
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Impression:</label>
                                <textarea class="form-control textarea-autosize text-counter" name="xray_impression" placeholder="Enter Patient X-RAY Impression..."></textarea>
                                <i class="form-group__bar"></i>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Remarks:</label>
                                <textarea class="form-control textarea-autosize text-counter" name="xray_remark" placeholder="Enter Patient X-RAY Remarks..."></textarea>
                                <i class="form-group__bar"></i>
                            </div>
                        </div>
                    </div>
                </div>
                  <div class="row" style="float:right; margin-right:20px;">
                    <button type="submit" name="xAdd" class="btn btn-primary" >SUBMIT</button>
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
                                                <th><center>Impression</center></th>
                                                <th><center>Remarks</center></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                 <?php 
                                           include "dbconnect.php";
                                           $sta1 = $connect->query("SELECT * FROM `xray` INNER JOIN schedule ON xray.sched_ID = xray.sched_ID INNER JOIN patient on patient.patient_ID = schedule.patient_ID WHERE xray.patient_ID = '$id'") or die(mysqli_error());
                                           while($path = $sta1->fetch_array()){
                                            ?>
                                            <tr>
                                                <td><center><?php echo $path['patient_firstName'] ." ". $path['patient_lastName']?></center></td>
                                                <td><center><?php echo $path['xray_date']?></center></td>
                                                <td><center><?php echo $path['xray_impression']?></center></td>
                                                <td><center><?php echo $path['xray_remark']?></center></td>
                                                <?php } ?>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                    </div>
            </div>
        </div>
            </form>
        </section>
        </main>

<?php include("includes/footer.php"); ?>
        <!-- Javascript -->
        <!-- Vendors -->
        
    </body>

<?php include("includes/footerscripts.php"); ?>
<!-- Mirrored from byrushan.com/projects/super-admin/app/2.1/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Jan 2018 17:21:41 GMT -->
</html>