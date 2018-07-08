<?php session_start(); 
if (!isset($_SESSION['loggedIn'])) {
        echo "<script>alert('Unauthorized access!Please login! ');window.location.href='../index.php';</script>";
    }?>
<?php include("includes/header.php"); ?>
<?php include("includes/sidebar.php"); 
$identity=$_GET['name']; ?>

<section class="content">
    <div class="content__inner">
        <header class="content__title">
            <h1>Change Schedule</h1>
        </header>
<?php include "dbconnect.php";
$schedSel = $connect->query("SELECT * FROM `schedule` where sched_ID = $identity") or die(mysqli_error());
while($fetchsched = $schedSel->fetch_array()){?>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Schedule Details</h4>
                <form method="POST" action="actions/schedUpdate.php">
                    <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>Name</label>
                            <?php  
                            $patientID = $fetchsched['patient_ID'];
                            $pat = $connect->query("SELECT * FROM `patient` where patient_ID = '$patientID'") or die(mysqli_error()); 
                            while($fetchsname = $pat->fetch_array()){?>
                            <input type="hidden" name="sched_ID" value="<?php echo $fetchsched['sched_ID']?>">
                            <input type="text" name="p_name" class="form-control form-control-lg"  value="<?php echo $fetchsname['patient_Name']?>" disabled>
                            <i class="form-group__bar"></i>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>Date</label>
                            <input type="date" name="schedDate" class="form-control form-control-lg date-picker" value="<?php echo $fetchsched['sched_Date']?>">
                            <i class="form-group__bar"></i>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>Time</label>
                            <input type="text" name="schedTime" class="form-control form-control-lg time-picker" value="<?php echo $fetchsched['sched_Time']?>">
                            <i class="form-group__bar"></i>
                        </div>
                    </div>
                </div>
        <?php }?>
                <div class="row" style="float:right; margin-right:20px;">
                    <button type="submit" name="schedUpdate" class="btn btn-primary" >SUBMIT</button>
                </div>
                </form>
            </div>

        </div>



        <!-- Start of modal -->

        <!--End of Modal -->





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

</body>

</html>






