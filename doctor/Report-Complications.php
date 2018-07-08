<?php session_start(); 
if (!isset($_SESSION['loggedIn'])) {
        echo "<script>alert('Unauthorized access!Please login! ');window.location.href='../index.php';</script>";
    }?>
<?php include("includes/header.php"); ?>
<?php include("includes/sidebar.php"); ?>
<section class="content">
    <div class="card">
        <div class="card-body">
            <h4>Pregnancy Complications Report</h4>
            <br>
            <form method="post">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <select class="select2 form-control show-tick" name="complication">
                                <option >Please Choose Complication</option>
                                <option value="Miscarriage">Miscarriage</option>
                                <option value="Premature">Premature labor and birth</option>
                                <option value="Preeclampsia">Preeclampsia</option>
                                <option value="Oligohydra">Oligohydramnios</option>
                                <option value="Chromosomal">Chromosomal Abnormalities</option>
                                <option value="Ectopic">Ectopic pregnancy</option>
                                <option value="Placenta">Placenta previa</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <button type="submit" name="submit" class="btn btn-primary" >Generate Report</button>
                    </div>
                    <div class="col-sm-4">
                        <a href="#" onclick="openCases()"  class="btn btn-primary" >Generate Graph Report</a>
                    </div>
                </div>    
            </form>    
            <?php 
                if(isset($_POST['submit'])) {  
                    include("dbconnect.php");
                    switch ($_POST['complication']) {
                    case 'Miscarriage': ?>
                        <div class="table-responsive">
                            <table id="data-table" class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Ultrasound Date</th>
                                        <th>Complications</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $result = mysqli_query($connect, "SELECT * FROM `ultrasound` INNER JOIN `patient` ON ultrasound.patient_ID = patient.patient_ID WHERE ultrasound.comp_miscarriage = '1'");
                                    while ($res1 = mysqli_fetch_array($result)) {
                                       
                                        ?>
                                        <tr>
                                        <td><?php echo $res1['patient_Name'] ?></td>
                                        <td><?php echo $res1['ultra_date'] ?></td>
                                        <td>Miscarriage</td>
                                    <?php } ?>
                                    </tr>
                                </tbody>
                            </table>
                         </div>
                    <?php break;
                    case 'Premature': ?>
                        <div class="table-responsive">
                            <table id="data-table" class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Ultrasound Date</th>
                                        <th>Complications</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $result = mysqli_query($connect, "SELECT * FROM `ultrasound` INNER JOIN `patient` ON ultrasound.patient_ID = patient.patient_ID WHERE ultrasound.comp_premature = '1'");
                                    while ($res1 = mysqli_fetch_array($result)) {
                                       
                                        ?>
                                        <tr>
                                        <td><?php echo $res1['patient_Name'] ?></td>
                                        <td><?php echo $res1['ultra_date'] ?></td>
                                        <td>Premature labor and birth</td>
                                    <?php } ?>
                                    </tr>
                                </tbody>
                            </table>
                         </div>
                    <?php break;
                    case 'Preeclampsia': ?>
                        <div class="table-responsive">
                            <table id="data-table" class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Ultrasound Date</th>
                                        <th>Complications</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $result = mysqli_query($connect, "SELECT * FROM `ultrasound` INNER JOIN `patient` ON ultrasound.patient_ID = patient.patient_ID WHERE ultrasound.comp_preclampsia = '1'");
                                    while ($res1 = mysqli_fetch_array($result)) {
                                       
                                        ?>
                                        <tr>
                                        <td><?php echo $res1['patient_Name'] ?></td>
                                        <td><?php echo $res1['ultra_date'] ?></td>
                                        <td>Preeclampsia</td>
                                    <?php } ?>
                                    </tr>
                                </tbody>
                            </table>
                         </div>
                    <?php break;
                    case 'Oligohydra': ?>
                        <div class="table-responsive">
                            <table id="data-table" class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Ultrasound Date</th>
                                        <th>Complications</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $result = mysqli_query($connect, "SELECT * FROM `ultrasound` INNER JOIN `patient` ON ultrasound.patient_ID = patient.patient_ID WHERE ultrasound.comp_oligohydra = '1'");
                                    while ($res1 = mysqli_fetch_array($result)) {
                                       
                                        ?>
                                        <tr>
                                        <td><?php echo $res1['patient_Name'] ?></td>
                                        <td><?php echo $res1['ultra_date'] ?></td>
                                        <td>Oligohydramnios</td>
                                    <?php } ?>
                                    </tr>
                                </tbody>
                            </table>
                         </div>
                    <?php break;
                    case 'Chromosomal': ?>
                        <div class="table-responsive">
                            <table id="data-table" class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Ultrasound Date</th>
                                        <th>Complications</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $result = mysqli_query($connect, "SELECT * FROM `ultrasound` INNER JOIN `patient` ON ultrasound.patient_ID = patient.patient_ID WHERE ultrasound.comp_chromosal = '1'");
                                    while ($res1 = mysqli_fetch_array($result)) {
                                       
                                        ?>
                                        <tr>
                                        <td><?php echo $res1['patient_Name'] ?></td>
                                        <td><?php echo $res1['ultra_date'] ?></td>
                                        <td>Chromosomal Abnormalities</td>
                                    <?php } ?>
                                    </tr>
                                </tbody>
                            </table>
                         </div>
                    <?php break;
                    case 'Ectopic': ?>
                        <div class="table-responsive">
                            <table id="data-table" class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Ultrasound Date</th>
                                        <th>Complications</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $result = mysqli_query($connect, "SELECT * FROM `ultrasound` INNER JOIN `patient` ON ultrasound.patient_ID = patient.patient_ID WHERE ultrasound.comp_ectopic = '1'");
                                    while ($res1 = mysqli_fetch_array($result)) {
                                       
                                        ?>
                                        <tr>
                                        <td><?php echo $res1['patient_Name'] ?></td>
                                        <td><?php echo $res1['ultra_date'] ?></td>
                                        <td>Ectopic pregnancy</td>
                                    <?php } ?>
                                    </tr>
                                </tbody>
                            </table>
                         </div>
                    <?php break;
                    case 'Placenta': ?>
                        <div class="table-responsive">
                            <table id="data-table" class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Ultrasound Date</th>
                                        <th>Complications</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $result = mysqli_query($connect, "SELECT * FROM `ultrasound` INNER JOIN `patient` ON ultrasound.patient_ID = patient.patient_ID WHERE ultrasound.comp_placenta = '1'");
                                    while ($res1 = mysqli_fetch_array($result)) {
                                       
                                        ?>
                                        <tr>
                                        <td><?php echo $res1['patient_Name'] ?></td>
                                        <td><?php echo $res1['ultra_date'] ?></td>
                                        <td>Placenta previa</td>
                                    <?php } ?>
                                    </tr>
                                </tbody>
                            </table>
                         </div>
                <?php break; } }?>
        </div>
    </div>
</section>


<!-- Javascript -->
<!-- Vendors -->
<script>
    function openCases() {
                myWindow = window.open("cases.php?year=2018", "", "width=1350, height=650");
            }
</script>
<?php include("includes/footerscripts.php"); ?>

<?php include("includes/footer.php"); ?>
<!-- Javascript -->
<!-- Vendors -->



