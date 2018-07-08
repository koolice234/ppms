<?php session_start(); 
if (!isset($_SESSION['loggedIn'])) {
        echo "<script>alert('Unauthorized access!Please login! ');window.location.href='../index.php';</script>";
    }?>
<?php include("includes/header.php"); ?>
<?php include("includes/sidebar.php"); ?>

<section class="content">
    <div class="card">
        <?php include("dbconnect.php") ?>
        <div class="card-body">

                <h4>Patient Transaction History Summary Report</h4>
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
                    <div class="col-sm-4" style="margin-top: 30px;">
                        <button type="submit" name="submit" class="btn btn-primary" >Generate Report</button>
                    </div>
                </div>    
            </form>
           
                    <?php 
                    if(isset($_POST['submit'])) {  
                    include("dbconnect.php");
                    $start = mysqli_real_escape_string($connect, $_POST['startDate']);
                    $end = mysqli_real_escape_string($connect, $_POST['endDate']);
                    ?>

                    <div class="table-responsive">
                        
                        <table id="data-table" class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Transaction Type</th>
                                    <th>Transaction Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $result = mysqli_query($connect, "SELECT * FROM `transaction` INNER JOIN `patient` ON transaction.trans_patientid = patient.patient_ID WHERE transaction.trans_date BETWEEN '$start' AND '$end'");
                                while ($res1 = mysqli_fetch_array($result)) {
                                   
                                    ?>
                                    <tr>
                                    <td><?php echo $res1['patient_Name'] ?></td>
                                    <td><?php echo $res1['trans_type'] ?></td>
                                    <td><?php echo $res1['trans_date'] ?></td>
                                    <td><a href="printTransSummary.php?id=<?php echo $res1['patient_ID'] ?>" class="btn btn-primary" target="_blank">Print</a></td>
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
                                    <th>Transaction Type</th>
                                    <th>Transaction Date</th>
                                   <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $result = mysqli_query($connect, "SELECT * FROM `transaction` INNER JOIN `patient` ON transaction.trans_patientid = patient.patient_ID");
                                while ($res1 = mysqli_fetch_array($result)) {
                                   
                                    ?>
                                    <tr>
                                    <td><?php echo $res1['patient_Name'] ?></td>
                                    <td><?php echo $res1['trans_type'] ?></td>
                                    <td><?php echo $res1['trans_date'] ?></td>
                                    <td><a href="printTransSummary.php?id=<?php echo $res1['patient_ID'] ?>" class="btn btn-primary" target="_blank">Print</a></td>
                                <?php } ?>
                                </tr>
                            </tbody>
                        </table>
                     </div> 
                     <?php  } ?>


        </div>
    </div>
</section>


<!-- Javascript -->
<!-- Vendors -->

<?php include("includes/footerscripts.php"); ?>

<?php include("includes/footer.php"); ?>
<!-- Javascript -->
<!-- Vendors -->



