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
                            <form method="POST" action="actions/staffAction.php">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input type="text" name="staff_fname" class="form-control form-control-lg">
                                        <i class="form-group__bar"></i>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input type="text" name="staff_lname" class="form-control form-control-lg">
                                        <i class="form-group__bar"></i>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Contact Number</label>
                                        <input type="number" name="staff_contact" class="form-control form-control-lg">
                                        <i class="form-group__bar"></i>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" name="staff_address" class="form-control form-control-lg">
                                        <i class="form-group__bar"></i>
                                    </div>
                                </div> 
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <h3 class="card-body__title">Gender</h3>
                                        <div class="btn-group" data-toggle="buttons">
                                            <label class="btn btn-light active">
                                                <input type="radio" name="staff_gender" id="CYTOKERATINa" value ="Male" autocomplete="off">MALE
                                            </label>
                                            <label class="btn btn-light" style="margin-left:10px;">
                                                <input type="radio" name="staff_gender" id="CYTOKERATINb" value ="Female" autocomplete="off">FEMALE</label>
                                        </div>
                      
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Birthdate</label>
                                            <input type="text"  name="staff_bdate" class="form-control form-control-lg date-picker" placeholder="Enter Birthdate">
                                            <i class="form-group__bar"></i>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Position</label>
                                            <select  name="staff_pos" class="select2" data-minimum-results-for-search="Infinity">
                                                <option>Secretary</option>
                                                <option>Doctor</option>
                                            </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="float:right; margin-right:20px;">

                                <button type="submit" name="sAdd" class="btn btn-primary" >SUBMIT</button>
                            </div>
                        </form>
                        </div>
                    </div>

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">LIST OF PATIENTS</h4>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Address</th>
                                            <th>Date of Birth</th>
                                            <th>Contact Number</th>
                                            <th>Gender</th>
                                            <th>Position</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                        <?php 
                        include "dbconnect.php";
                        $sta = mysqli_query($connect,"SELECT * FROM staff") or die(mysqli_error());
                          while ($staff = mysqli_fetch_array($sta)){ ?>
                        <tr>
                                <td><?php echo $staff['staff_fname'] ." ". $staff['staff_lname'];?></td>
                                <td><?php echo $staff['staff_address'];?></td>
                                <td><?php echo $staff['staff_bdate'];?></td>
                                <td><?php echo $staff['staff_contactNumber'];?></td>
                                <td><?php echo $staff['staff_gender'];?></td>
                                <td><?php echo $staff['staff_position'];?></td>
                                <td><button type="button" data-toggle="modal" data-target="#staffEdit-<?php echo $staff['staff_ID'];?>" class="btn btn-success">Edit</button>
                                <form method="post" action="actions/updateStaff.php">
                                <div class="modal fade" id="staffEdit-<?php echo $staff['staff_ID']?>" tabindex="-1">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title pull-left">Modify Patient Information</h5>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label>First Name</label>
                                                            <input type="text" name="s_fname" value ="<?php echo $staff['staff_fname'];?> " class="form-control form-control-lg">
                                                            <i class="form-group__bar"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label>Last Name</label>
                                                            <input type="text" name="s_lname"  value ="<?php echo $staff['staff_lname'];?> " class="form-control form-control-lg">
                                                            <i class="form-group__bar"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label>Contact Number</label>
                                                            <input type="text"  name="s_contact"  value ="<?php echo $staff['staff_contactNumber']; ?>" class="form-control form-control-lg">
                                                            <i class="form-group__bar"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label>Address</label>
                                                            <input type="text" name="s_address"  value ="<?php echo $staff['staff_address'];?> " class="form-control form-control-lg">
                                                            <i class="form-group__bar"></i>
                                                        </div>
                                                    </div> 
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <h3 class="card-body__title">Gender</h3>
                                                            <div class="btn-group" data-toggle="buttons">
                                                                <label class="btn btn-light <?php if($staff['staff_gender']=="Male") echo  'active' ;    ?>">
                                                                <input type="radio" name="s_gender" <?php if($staff['staff_gender']=="Male") echo  'checked' ;    ?>" value ="Male">MALE
                                                                </label>
                                                                <label class="btn btn-light <?php if($staff['staff_gender']=="Female") echo  'active';   ?>" style="margin-left:10px;">
                                                                    <input type="radio" name="s_gender" <?php if($staff['staff_gender']=="Female") echo  'checked' ;    ?>"  value ="Female" >FEMALE
                                                                </label>
                                                            </div>
                                          
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label>Birthdate</label>
                                                                <input type="text" name="s_bdate" value ="<?php echo $staff['staff_bdate'];?> " class="form-control form-control-lg date-picker" placeholder="Enter Birthdate">
                                                                <i class="form-group__bar"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Position</label>
                                                                <select name="s_position" value ="<?php echo $staff['staff_position'];?> " class="select form-control">
                                                                    <option style="color: black;" value="Secretary">Secretary</option>
                                                                    <option style="color: black;" value="Doctor">Doctor</option>
                                                                </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="hidden" name="id" value="<?php echo $staff['staff_ID'] ?>">
                                                    <button type="Submit" name="sEdit" class="btn btn-link">Save changes</button>
                                                    <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div></td>
                                <td> <form method="post" action="actions/deleteStaff.php">
                                    <input type="hidden" name="id" value="<?php echo $staff['staff_ID'] ?>">
                                    <button type="submit" name="sdel" class="btn btn-danger">Delete</button></form></td>
                        </tr>
                        <?php } ?>
                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

       

        <!-- Javascript -->
        <!-- Vendors -->
        
    <?php include("includes/footer.php"); ?>
        <!-- Javascript -->
        <!-- Vendors -->
        
    </body>

<?php include("includes/footerscripts.php"); ?>

<!-- Mirrored from byrushan.com/projects/super-admin/app/2.1/form-components.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Jan 2018 17:17:59 GMT -->
</html>