
<?php 
include("includes/header.php");

include("includes/sidebar.php");

?>

<section class="content">
    <div class="card">

        <div class="card-body">
           <form method="POST" action="actions/pathologyAction.php">
            <h2 class="card-title">Patient Pathology</h2>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Patient Name</label>
                        
                            <?php
                            include "dbconnect.php";
                            $id = $_GET['id1'];
                            $pat = $connect->query("SELECT * FROM `schedule` INNER JOIN `patient` on schedule.patient_ID = patient.patient_ID WHERE schedule.patient_ID = '$id'") or die(mysqli_error());
                            while($fetch = $pat->fetch_array()){?>
                            <input name = "patientPath" type="text" class="form-control" value="<?php echo $fetch['patient_Name']?>"  disabled>
                            <input type="hidden" name="patientcheckupID" value="<?php echo $fetch['patient_ID']; ?>" >
                             <input type="hidden" name = "schedID" value="<?php echo $fetch['sched_ID']?>" >
                              <?php } ?> 
                       
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Date of Checkup</label>
                        <?php include "dbconnect.php";
                           
                            $pat = $connect->query("SELECT * FROM `schedule` INNER JOIN `patient` on schedule.patient_ID = patient.patient_ID WHERE schedule.patient_ID = '$id'") or die(mysqli_error());
                            while($fetch = $pat->fetch_array()){ ?>
                        <input type="date" class="form-control form-control-lg date-picker" value="<?php echo $fetch['sched_Date']; ?>" name="pat_date"  placeholder="Enter Date of Chekup"  disabled>

                        <?php } ?>

                        <i class="form-group__bar"></i>
                    </div>
                </div>
              

            </div>
          

            <div class="row">
                <div class="col-sm-4 col-md-3">
                    <h3 class="card-body__title">LCA</h3>
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-light ">
                            <input type="radio" name="pat_lca" id="LCAa" value="Positive" autocomplete="off" required="true">POSITIVE
                        </label>
                        <label class="btn btn-light" style="margin-left:10px;">
                            <input type="radio" name="pat_lca" id="LCAb"  value="Negative" autocomplete="off" required="true">NEGATIVE</label>
                        </div>

                    </div>
                    <div class="col-sm-4 col-md-3">
                        <h3 class="card-body__title">PLAP</h3>
                        <div class="btn-group" data-toggle="buttons">
                            <label class="btn btn-light ">
                                <input type="radio" name="pat_plap" id="PLAPa" value="Positive" autocomplete="off" required="true">POSITIVE
                            </label>
                            <label class="btn btn-light" style="margin-left:10px;">
                                <input type="radio" name="pat_plap" id="PLAPb"  value="Negative" autocomplete="off" required="true">NEGATIVE</label>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-3">
                            <h3 class="card-body__title">CYTOKERATIN</h3>
                            <div class="btn-group" data-toggle="buttons">
                                <label class="btn btn-light ">
                                    <input type="radio" name="pat_cytokeratin" id="CYTOKERATINa" value="Positive" autocomplete="off" required="true">POSITIVE
                                </label>
                                <label class="btn btn-light" style="margin-left:10px;">
                                    <input type="radio" name="pat_cytokeratin" id="CYTOKERATINb"  value="Negative" autocomplete="off" required="true">NEGATIVE</label>
                                </div>
                            </div>
                            <div class="col-sm-4 col-md-3">
                                <h3 class="card-body__title">NSE</h3>
                                <div class="btn-group" data-toggle="buttons">
                                    <label class="btn btn-light ">
                                        <input type="radio" name="pat_nse" id="NSEa" value="Positive" autocomplete="off" required="true">POSITIVE
                                    </label>
                                    <label class="btn btn-light" style="margin-left:10px;">
                                        <input type="radio" name="pat_nse" id="NSEb"   value="Negative" autocomplete="off" required="true">NEGATIVE</label>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-4 col-md-4">
                                    <h3 class="card-body__title">VIMENTIN</h3>
                                    <div class="btn-group" data-toggle="buttons">
                                        <label class="btn btn-light ">
                                            <input type="radio" name="pat_vimetin" id="VIMENTINa" value="Positive" autocomplete="off" required="true">POSITIVE
                                        </label>
                                        <label class="btn btn-light" style="margin-left:10px;">
                                            <input type="radio" name="pat_vimetin" id="VIMENTINb"  value="Negative" autocomplete="off" required="true">NEGATIVE</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-md-4">
                                        <h3 class="card-body__title">CHROMOGRANIN</h3>
                                        <div class="btn-group" data-toggle="buttons">
                                            <label class="btn btn-light ">
                                                <input type="radio" name="pat_chromogranin" id="CHROMOGRANINa"  value="Positive" autocomplete="off" required="true">POSITIVE
                                            </label>
                                            <label class="btn btn-light" style="margin-left:10px;">
                                                <input type="radio" name="pat_chromogranin" id="CHROMOGRANINb"  value="Negative" autocomplete="off" required="true">NEGATIVE</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-md-4">
                                            <h3 class="card-body__title">HMB-45</h3>
                                            <div class="btn-group" data-toggle="buttons">
                                                <label class="btn btn-light ">
                                                    <input type="radio" name="pat_hmb45" id="HMB45a" value="Positive" autocomplete="off" required="true">POSITIVE
                                                </label>
                                                <label class="btn btn-light" style="margin-left:10px;">
                                                    <input type="radio" name="pat_hmb45" id="HMB45b" value="Negative" autocomplete="off" required="true">NEGATIVE</label>
                                                </div>
                                            </div>

                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <h2>NOTES</h2>
                                                    <textarea class="form-control textarea-autosize text-counter" name="pat_note" placeholder="Enter Patient's Pathology Description..."></textarea>
                                                    <i class="form-group__bar"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="float:right; margin-right:20px;">
                                              
                                            <button type="submit" name="patAdd" class="btn btn-primary" >SUBMIT</button>
                                        </div>
                                          </form>

                                    </div>
                              
                            </div>

                            <!-- script for changing the color -->


                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Patient table</h4>

                                    <div class="table-responsive">
                                        <table id="data-table" class="table">
                                            <thead>
                                                <tr>
                                                    <th>Patient</th>
                                                    <th>Testing Date</th>
                                                    <th>Notes</th>
                                                    <th>Laboratory Results</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                             <?php 
                                             include "dbconnect.php";
                                             $sta1 = $connect->query("SELECT * FROM `pathology` INNER JOIN `schedule` ON pathology.sched_ID = schedule.sched_ID INNER JOIN patient on patient.patient_ID = schedule.patient_ID WHERE pathology.patient_ID = '$id' ") or die(mysqli_error());
                                             while($path = $sta1->fetch_array()){
                                                ?>
                                                <tr>
                                                    <td><?php echo $path['patient_firstName'] ." ". $path['patient_lastName']?></td>
                                                    <td><?php echo $path['pathology_date'] ?></td>
                                                    <td><?php echo $path['pathology_notes'] ?></td>
                                                    <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#PathologyResults-<?php echo $path['pathology_ID'] ?>">Results</button><!-- Patient Edit Modal -->
                                                        <div class="modal fade" id="PathologyResults-<?php echo $path['pathology_ID'] ?>" tabindex="-1">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title pull-left"><?php echo $path['patient_firstName'] ." ". $path['patient_lastName']?></h5>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            <div class="col-sm-4">
                                                                                <div class="">
                                                                                    <table class="table-responsive">
                                                                                        <thead>
                                                                                            <tr>
                                                                                                <th > <button type="button" title="LCA TOOL TIP" data-toggle="tooltip">LCA </button> </th>
                                                                                                <th  title="PLAP TOOL TIP" data-toggle="tooltip" >PLAP</th>
                                                                                                <th  title="CYTOKERATIN TOOL TIP" data-toggle="tooltip">CYTOKERATIN</th>
                                                                                                <th title="NSE TOOL TIP" data-toggle="tooltip">NSE</th>
                                                                                                <th  title="VIMENTIN TOOL TIP" data-toggle="tooltip">VIMENTIN</th>
                                                                                                <th  title="CHROMOGRANIN TOOL TIP" data-toggle="tooltip">CHROMOGRANIN</th>
                                                                                                <th  title="HMB-45 TOOL TIP" data-toggle="tooltip">HMB-45</th>
                                                                                            </tr>
                                                                                        </thead>


                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td><?php echo $path['pathology_lca'] ?></td>
                                                                                                <td><?php echo $path['pathology_plap'] ?></td>
                                                                                                <td><?php echo $path['pathology_cytokeratin'] ?></td>
                                                                                                <td><?php echo $path['pathology_nse'] ?></td>
                                                                                                <td><?php echo $path['pathology_vimetin'] ?></td>
                                                                                                <td><?php echo $path['pathology_chromogranin'] ?></td>
                                                                                                <td><?php echo $path['pathology_hmb45'] ?></td>

                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>



                                                <?php }  ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>



                    </section>
                </main>


                <?php include("includes/footer.php"); ?>
                <!-- Javascript -->
                <!-- Vendors -->

            </body>

            <?php include("includes/footerscripts.php"); ?>
            <!-- Mirrored from byrushan.com/projects/super-admin/app/2.1/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Jan 2018 17:21:41 GMT -->
            </html>