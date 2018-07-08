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
              <a href="#" onclick="openPatient()" class="btn btn-primary" >Generate Graph Report</a>
            <?php  include("../dbconnect.php"); ?>
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
                                $result = mysqli_query($connect, "SELECT * FROM `patient` order by 'patient_ID'");
                                while ($res1 = mysqli_fetch_array($result)) { ?>
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
            </div>
        </div>
</section>

<script >
    function openPatient() {
                myWindow = window.open("patient_total.php?year=2018", "", "width=1350, height=650");
            }
</script>
<!-- Javascript -->
<!-- Vendors -->

<?php include("includes/footerscripts.php"); ?>

<?php include("includes/footer.php"); ?>
<!-- Javascript -->
<!-- Vendors -->



