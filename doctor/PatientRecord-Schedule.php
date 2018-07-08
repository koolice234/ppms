<?php 
session_start(); 
if (!isset($_SESSION['loggedIn'])) {
        echo "<script>alert('Unauthorized access!Please login! ');window.location.href='../index.php';</script>";
    }
 include("includes/header.php"); 
 include("includes/sidebar.php"); 
    include("dbConnect.php");
?>
<section class="content">
    <div class="content__inner">
        <header class="content__title">
            <h1>Patient Checkups Schedule</h1>
        </header>
        <form method="post" action="actions/scheduleAction.php">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title">Patient Checkups</h2>
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Patient</label>
                                            <select class="select2 form-control show-tick" name="patient">
                                                <?php
                                                include "dbconnect.php";
                                                $pat = $connect->query("SELECT * FROM `patient` order by `patient_ID` DESC ") or die(mysqli_error());
                                                 while($fetch = $pat->fetch_array()){?>
                                                <option value="<?php echo $fetch['patient_ID']; ?>"><?php echo $fetch['patient_Name']; ?></option>
                                               
                                                <?php } ?>
                                            </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Date</label>
                                            <input type="date" name="schedDate" class="form-control form-control-lg date-picker">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Time</label>
                                            <input type="Time" name="schedTime" class="form-control form-control-lg time-picker">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                            <button type="submit" name="schedAdd" class="btn btn-primary" style="height: 50px;">SUBMIT</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>         
        </form>
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title">Patient Checkups</h2>
                            
                                <div class="table-responsive">
                                    <table id="data-table" class="table">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Schedule Date</th>
                                                <th>Schedule Time</th>
                                                <th>Status</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                            <?php 
                                            $last = date('2100-12-31');
                                            $date = date('Y-m-d');
                                            $sched = $connect->query("SELECT * FROM `schedule` INNER JOIN `patient` on schedule.patient_ID = patient.patient_ID") or die(mysqli_error());
                                                 while($fetchsched = $sched->fetch_array()){ ?>
                                                <td><?php echo $fetchsched['patient_Name'] ; ?></td>
                                                <td><?php echo $fetchsched['sched_Date']; ?></td>
                                                <td><?php echo date("g:i a",strtotime($fetchsched['sched_Time'])); ?></td>
                                                <td><?php echo $fetchsched['sched_status']; ?></td>
                                                <td><button type="button" data-toggle="modal" data-target="#SchedEdit-<?php echo $fetchsched['sched_ID']?>" class="btn btn-success">Edit</button>
                            <div class="modal fade" id="SchedEdit-<?php echo $fetchsched['sched_ID']?>" tabindex="-1">                               
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title pull-left">Modify <?php echo $fetchsched['patient_Name']; ?>'s Schedule</h5>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action="actions/editSched.php">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Date</label>
                                                            <input type="date" name="editSchedDate" class="form-control form-control-lg date-picker" value="<?php echo $fetchsched['sched_Date']; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Time</label>
                                                            <input type="Time" name="editSchedTime" class="form-control form-control-lg time-picker" value="<?php echo $fetchsched['sched_Time']; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="hidden" name="schedID" value="<?php echo $fetchsched['sched_ID']; ?>">
                                                <button type="submit" name="noShow" class="btn btn-link">Patient No-Show</button>
                                                <button type="submit" name="sEdit" class="btn btn-link">Save changes</button>
                                                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                                            </div>
                                            </form>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td><a href="actions/deleteSched.php?id=<?php echo $fetchsched['sched_ID']; ?>"  class="btn btn-danger">Cancel</a></td>
                                                
                                            </tr>
                                            <?php } ?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                </div>
</section>

    <script src="vendors/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="vendors/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="vendors/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="vendors/bower_components/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="vendors/bower_components/jszip/dist/jszip.min.js"></script>
    <script src="vendors/bower_components/select2/dist/js/select2.full.min.js"></script>
    <script src="vendors/bower_components/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="vendors/bower_components/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="vendors/bower_components/jquery.scrollbar/jquery.scrollbar.min.js"></script>
    <script src="vendors/bower_components/jquery-scrollLock/jquery-scrollLock.min.js"></script>
    <script src="vendors/bower_components/jquery-mask-plugin/dist/jquery.mask.min.js"></script>
    <script src="vendors/bower_components/dropzone/dist/min/dropzone.min.js"></script>
    <script src="vendors/bower_components/moment/min/moment.min.js"></script>
    <script src="vendors/bower_components/flatpickr/dist/flatpickr.min.js"></script>
    <script src="vendors/bower_components/nouislider/distribute/nouislider.min.js"></script>
    <script src="vendors/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
    <script src="vendors/bower_components/trumbowyg/dist/trumbowyg.min.js"></script>
    <script src="vendors/bower_components/rateYo/min/jquery.rateyo.min.js"></script>
    <script src="vendors/bower_components/jquery-text-counter/textcounter.min.js"></script>
    <script src="vendors/bower_components/autosize/dist/autosize.min.js"></script>
    
    <script src="js/app.min.js"></script>

</body>
</html>



                