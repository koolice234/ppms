<?php session_start(); 
if (!isset($_SESSION['loggedIn'])) {
        echo "<script>alert('Unauthorized access!Please login! ');window.location.href='../index.php';</script>";
    }?>
<?php include("includes/header.php"); ?>
<?php include("includes/sidebar.php"); ?>

<section class="content">
    <div class="content__inner">
        <header class="content__title">
            <h1>Data Entry</h1>
        </header>

        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add Patients</h4>
                <form method="POST" action="actions/patientAction.php">
                    <div class="row">

                     <div class="col-sm-3">
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" name="p_fname" class="form-control form-control-lg">
                            <i class="form-group__bar"></i>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" name="p_lname" class="form-control form-control-lg">
                            <i class="form-group__bar"></i>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" name="p_address" class="form-control form-control-lg">
                            <i class="form-group__bar"></i>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>Date and Time</label>
                            <?php 
                            $now = new DateTime('',new DateTimeZone('Singapore'));
                            
                            ?>
                            <input type="text" value="<?php echo $now->format('Y/m/d -- H:i:s')  ?>" class="form-control form-control-lg">
                            <i class="form-group__bar"></i>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>Last Menstrual Period</label>
                            <input type="date" name="LMP" class="form-control form-control-lg">
                            <i class="form-group__bar"></i>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>Age</label>
                            <input type="number" name="p_age" class="form-control form-control-lg " placeholder="Enter Age">
                            <i class="form-group__bar"></i>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>Contact Number</label>
                            <input type="number" name="p_contact" class="form-control " >
                            <i class="form-group__bar"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Blood Type</label>
                            <select name="p_btype" class="select2">
                                <option>O+</option>
                                <option>O-</option>
                                <option>A+</option>
                                <option>A-</option>
                                <option>B+</option>
                                <option>B-</option>
                                <option>AB+</option>
                                <option>AB-</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row" style="float:right; margin-right:20px;">
                    <button type="submit" name="pAdd" class="btn btn-primary" >SUBMIT</button>
                </div>
                </form>
            </div>

        </div>

        <div class="card">
           
            <div class="card-body">
                <h4 class="card-title">Patient table</h4>

                <div class="table-responsive">
                    <table id="data-table" class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Age</th>
                                <th>Contact Number</th>
                                <th>Blood Type</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                         <?php 
                         include "dbconnect.php";
                         $sta = $connect->query("SELECT * FROM `patient`") or die(mysqli_error());


                         while($patient = $sta->fetch_array()){
                            ?>
                            <tr>
                                <td><?php echo $patient['patient_firstName'] ." ". $patient['patient_lastName']?></td>
                                <td><?php echo $patient['patient_address']?></td>
                                <td><?php echo $patient['patient_Age']?></td>
                                <td><?php echo $patient['patient_contactNumber']?>9</td>
                                <td><?php echo $patient['patient_bloodType']?></td>

                                <td><button type="button" data-toggle="modal" data-target="#patientEdit-<?php echo $patient['patient_ID']?>" class="btn btn-success">Edit</button>

                                 <div class="modal fade" id="patientEdit-<?php echo $patient['patient_ID']?>" tabindex="-1">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                             <form method="POST" action="actions/patientAction.php">
                                            <div class="modal-header">
                                                <h5 class="modal-title pull-left">Modify Patient Information</h5>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">

                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <label>First Name</label>
                                                            <input type="text" name="patient_firstName" value ="<?php echo $patient['patient_firstName']?>" class="form-control form-control-lg">
                                                            <i class="form-group__bar"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <label>Last Name</label>
                                                            <input type="text"  name="p_lname1" value ="<?php echo $patient['patient_lastName']?>"  class="form-control form-control-lg">
                                                            <i class="form-group__bar"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Address</label>
                                                            <input type="text" name="p_address1" value ="<?php echo $patient['patient_address']?>" class="form-control form-control-lg">
                                                            <i class="form-group__bar"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Age</label>
                                                            <input type="number" name="p_bdate1" value ="<?php echo $patient['patient_Age']?>"  class="form-control form-control-lg r" placeholder="Enter Age">
                                                            <i class="form-group__bar"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label>Contact Number</label>
                                                            <input type="number" name="p_contact1" value ="<?php echo $patient['patient_contactNumber']?>" class="form-control " >
                                                            <i class="form-group__bar"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Blood Type</label>
                                                            <select name="p_btype1" value ="<?php echo $patient['patient_bloodType']?>" class="select form-control">
                                                                <option style="color: black;">O+</option>
                                                                <option style="color: black;">O-</option>
                                                                <option style="color: black;">A+</option>
                                                                <option style="color: black;">A-</option>
                                                                <option style="color: black;">B+</option>
                                                                <option style="color: black;">B-</option>
                                                                <option style="color: black;">AB+</option>
                                                                <option style="color: black;">AB-</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="hidden" name="id1" value="<?php echo $patient['patient_ID'] ?> " /> 
                                                <button type="submit" name="modEdit" class="btn btn-link">Save changes</button>
                                                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                                            </div>
                                    </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
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






