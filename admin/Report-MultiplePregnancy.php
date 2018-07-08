<?php session_start(); 
if (!isset($_SESSION['loggedIn'])) {
        echo "<script>alert('Unauthorized access!Please login! ');window.location.href='../index.php';</script>";
    }?>
<?php include("includes/header.php"); ?>
<?php include("includes/sidebar.php"); ?>

<section class="content">
    <div class="card">

        <div class="card-body">
            <h4>Multiple Pregnancy Report</h4>
            <br>
            <form method="post">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <select class="select2 form-control show-tick" name="multiple">
                                <option >Please Choose Category</option>
                                <option value="1">Normal</option>
                                <option value="2">Twins</option>
                                <option value="3">Triplets</option>
                                <option value="4">Quadruplets</option>
                                <option value="5">Quintoplets</option>
                                <option value="6">Sextoplets</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-sm-4">
                        <button type="submit" name="submit" class="btn btn-primary" >Generate Report</button>
                    </div>
                    <div class="col-sm-4">
                        <a href="#" onclick="openMultiple()"  class="btn btn-primary" >Generate Graph Report</a>
                    </div>
                </div>    
            </form>
           
                    <?php 
                    if(isset($_POST['submit'])) {  
                    include("dbconnect.php");
                    $multiple = mysqli_real_escape_string($connect, $_POST['multiple']);
                    ?>

                    <div class="table-responsive">
                        
                        <table id="data-table" class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Gestational Weeks</th>
                                    <th>Ultrasound Date</th>
                                    <th>Number of Fetus</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $result = mysqli_query($connect, "SELECT * FROM `ultrasound` INNER JOIN `patient` ON ultrasound.patient_ID = patient.patient_ID WHERE ultrasound.ultra_fetusQty = '$multiple'");
                                while ($res1 = mysqli_fetch_array($result)) {
                                   
                                    ?>
                                    <tr>
                                    <td><?php echo $res1['patient_Name'] ?></td>
                                    <td><?php echo $res1['ultra_genweeks'] ?></td>
                                    <td><?php echo $res1['ultra_date'] ?></td>
                                     <td><?php echo $res1['ultra_fetusQty'] ?></td>
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
                                    <th>Gestational Weeks</th>
                                    <th>Ultrasound Date</th>
                                    <th>Number of Fetus</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                include("dbconnect.php");
                                $result = mysqli_query($connect, "SELECT * FROM `ultrasound` INNER JOIN `patient` ON ultrasound.patient_ID = patient.patient_ID");
                                while ($res1 = mysqli_fetch_array($result)) {
                                   
                                    ?>
                                    <tr>
                                    <td><?php echo $res1['patient_Name'] ?></td>
                                    <td><?php echo $res1['ultra_genweeks'] ?></td>
                                    <td><?php echo $res1['ultra_date'] ?></td>
                                    <td><?php echo $res1['ultra_fetusQty'] ?></td>
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
    function openMultiple() {
                myWindow = window.open("multiple.php?year=2018", "", "width=1350, height=650");
            }
</script>
<!-- Javascript -->
<!-- Vendors -->

<?php include("includes/footerscripts.php"); ?>

<?php include("includes/footer.php"); ?>
<!-- Javascript -->
<!-- Vendors -->



