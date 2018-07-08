<?php 
include("includes/header.php");

include("includes/sidebar.php");

?>

<section class="content">




    <div class="card">
        <div class="card-body">
            <form method="POST" action="actions/hematologyAction.php">
            <h2 class="card-title">Hematology</h2>
            <div class="container-fluid">  
                <div class="row">
                   
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Patient Name</label>
                                    
                                    <?php
                                    include "dbconnect.php";
                                    $id = $_GET['id2'];
                                    $pat = $connect->query("SELECT * FROM `schedule` INNER JOIN `patient` on schedule.patient_ID = patient.patient_ID WHERE schedule.patient_ID = '$id'") or die(mysqli_error());
                                    while($fetch = $pat->fetch_array()){?>
                                    <input type="text" name="ultraPname" class="form-control" value="<?php echo $fetch['patient_Name']; ?> ">
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

                  <h3 style="padding-left: 595px;">Normal Range</h3>
                    <div class="row">
                        <div class="col-sm-7">
                          <div class="input-group">
                             <h2 style="text-align:left">Complete Blood Count</h2>
                        </div>
                    </div>

                    
                    <div class="col-sm-2">
                        <div class="input-group">
                            <h4>Min</h4>
                            <div class="form-group">
                                
                                <i class="form-group__bar"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="input-group">
                           <h4>Max</h4>
                            <div class="form-group">
                               
                                <i class="form-group__bar"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <br>

                    <div class="row">
                        <div class="col-sm-3">
                          <div class="input-group">
                            <h4>Hemoglobin</h4>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="input-group">
                            <span class="input-group-addon">Result</span>
                            <div class="form-group">
                                <input type="number" name="result_hemoglobin" min="0" class="form-control" value="Result" >
                                <i class="form-group__bar"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="input-group">
                          
                            <div class="form-group">
                                <input type="text" class="form-control" value="160" disabled>
                                <i class="form-group__bar"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="input-group">
                          
                            <div class="form-group">
                                <input type="text" class="form-control" value="200" disabled>
                                <i class="form-group__bar"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <br>

            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-3">
                        <h4>Hematocrit</h4>
                    </div>
                    <div class="col-sm-4">
                        <div class="input-group">
                            <span class="input-group-addon">Result</span>
                            <div class="form-group">
                                <input type="number"  min="0" name="result_hematocrit" class="form-control" value="Result" >
                                <i class="form-group__bar"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="input-group">
                          
                            <div class="form-group">
                                <input type="text" class="form-control" value="160" disabled>
                                <i class="form-group__bar"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="input-group">
                          
                            <div class="form-group">
                                <input type="text" class="form-control" value="200" disabled>
                                <i class="form-group__bar"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <br>

                </div>
          
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-3">
                        <h4 >RBC Count</h4>
                    </div>
                    <div class="col-sm-4">
                        <div class="input-group">
                            <span class="input-group-addon">Result</span>
                            <div class="form-group">
                                <input type="number"  min="0" name="result_rbcCount" class="form-control" value="Result" >
                                <i class="form-group__bar"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="input-group">
                          
                            <div class="form-group">
                                <input type="text" class="form-control" value="160" disabled>
                                <i class="form-group__bar"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="input-group">
                           
                            <div class="form-group">
                                <input type="text" class="form-control" value="200" disabled>
                                <i class="form-group__bar"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <br>

                </div>
            
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-3">
                        <h4 >WBC Count</h4>
                    </div>
                    <div class="col-sm-4">
                        <div class="input-group">
                            <span class="input-group-addon">Result</span>
                            <div class="form-group">
                                <input type="number"  min="0" name="result_wbcCount" class="form-control" value="Result" >
                                <i class="form-group__bar"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="input-group">
                           
                            <div class="form-group">
                                <input type="text" class="form-control" value="160" disabled>
                                <i class="form-group__bar"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="input-group">
                           
                            <div class="form-group">
                                <input type="text" class="form-control" value="200" disabled>
                                <i class="form-group__bar"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <br>

                </div>
        
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-3">
                        <h4 >Platelet Count</h4>
                    </div>
                    <div class="col-sm-4">
                        <div class="input-group">
                            <span class="input-group-addon">Result</span>
                            <div class="form-group">
                                <input type="number"  min="0" name="result_platelet" class="form-control" value="Result" >
                                <i class="form-group__bar"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="input-group">
                            
                            <div class="form-group">
                                <input type="text" class="form-control" value="160" disabled>
                                <i class="form-group__bar"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="input-group">
                            
                            <div class="form-group">
                                <input type="text" class="form-control" value="200" disabled>
                                <i class="form-group__bar"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <br>

                </div>
            </div>
            
            <h1 style="text-align:left">Differential Count</h1><br>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-3">
                        <h4 >Neutrophils</h4>
                    </div>
                    <div class="col-sm-4">
                        <div class="input-group">
                            <span class="input-group-addon">Result</span>
                            <div class="form-group">
                                <input type="number"  min="0" name="result_neutropils" class="form-control" value="Result" >
                                <i class="form-group__bar"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="input-group">
                            
                            <div class="form-group">
                                <input type="text" class="form-control" value="160" disabled>
                                <i class="form-group__bar"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="input-group">
                            
                            <div class="form-group">
                                <input type="text" class="form-control" value="200" disabled>
                                <i class="form-group__bar"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <br>

                </div>
       
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-3">
                        <h4 >Eosinophils</h4>
                    </div>
                    <div class="col-sm-4">
                        <div class="input-group">
                            <span class="input-group-addon">Result</span>
                            <div class="form-group">
                                <input type="number"  min="0" name="result_eosinophils" class="form-control" value="Result" >
                                <i class="form-group__bar"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="input-group">
                            
                            <div class="form-group">
                                <input type="text" class="form-control" value="160" disabled>
                                <i class="form-group__bar"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="input-group">
                            
                            <div class="form-group">
                                <input type="text" class="form-control" value="200" disabled>
                                <i class="form-group__bar"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <br>

                </div>
         
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-3">
                        <h4 >Basophils</h4>
                    </div>
                    <div class="col-sm-4">
                        <div class="input-group">
                            <span class="input-group-addon">Result</span>
                            <div class="form-group">
                                <input type="number"  min="0" name="result_basophils" class="form-control" value="Result" >
                                <i class="form-group__bar"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="input-group">
                            
                            <div class="form-group">
                                <input type="text" class="form-control" value="160" disabled>
                                <i class="form-group__bar"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="input-group">
                            
                            <div class="form-group">
                                <input type="text" class="form-control" value="200" disabled>
                                <i class="form-group__bar"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <br>

                </div>
      
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-3">
                        <h4 >Total Diff Count</h4>
                    </div>
                    <div class="col-sm-4">
                        <div class="input-group">
                            <span class="input-group-addon">Result</span>
                            <div class="form-group">
                                <input type="number"  min="0" name="result_diffCount" class="form-control" value="Result" >
                                <i class="form-group__bar"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="input-group">
                            
                            <div class="form-group">
                                <input type="text" class="form-control" value="160" disabled>
                                <i class="form-group__bar"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="input-group">
                            
                            <div class="form-group">
                                <input type="text" class="form-control" value="200" disabled>
                                <i class="form-group__bar"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <br>

                </div>
          
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-3">
                        <h4 >Monocytes</h4>
                    </div>
                   <div class="col-sm-4">
                        <div class="input-group">
                            <span class="input-group-addon">Result</span>
                            <div class="form-group">
                                <input type="number"  min="0" name="result_monocytes" class="form-control" value="Result" >
                                <i class="form-group__bar"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="input-group">
                            
                            <div class="form-group">
                                <input type="text" class="form-control" value="160" disabled>
                                <i class="form-group__bar"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="input-group">
                            
                            <div class="form-group">
                                <input type="text" class="form-control" value="200" disabled>
                                <i class="form-group__bar"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
<div class="row">
      <div class="col-sm-12">
                <button style="float: right;" type="submit" name="hemaAdd" class="btn btn-primary" >SUBMIT</button>
            </div>
</div>
            </div>
            
           
            
 </form>
        </div>
</div>



<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <h4 class="card-title">PATIENT Hematology LIST</h4>
                <div class="table-responsive">
                <table id="data-table" class="table">
                        <thead>
                            <tr>
                                <th><center>Patient</center></th>
                                <th><center>Checkup Date</center></th>
                                <th><center>Actions</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            include "dbconnect.php";

                            $sta1 = $connect->query("SELECT * FROM `hematology` INNER JOIN schedule ON hematology.sched_ID = schedule.sched_ID INNER JOIN patient on schedule.patient_ID = patient.patient_ID WHERE hematology.patient_ID = '$id' ") or die(mysqli_error());

                            while($path = $sta1->fetch_array()){
                                ?>

                                <tr>
                                    <td><center><?php echo $path['patient_firstName'] ." ". $path['patient_lastName']?></center></td>
                                    <td><center><?php echo $path['sched_Date'] ?></center></td>
                                    <td><center><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#CompleteBloodCountResults-<?php echo $path['hema_ID'] ?>">Complete Blood Count</button>
                                       <!-- Patient Edit Modal -->
                                       <div class="modal fade" id="CompleteBloodCountResults-<?php echo $path['hema_ID'] ?>" tabindex="-1">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title pull-left"><?php echo $path['patient_firstName'] ." ". $path['patient_lastName']?> Hematology Laboratory Complete Blood Count Results</h5>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="">
                                                                <table class="table-responsive">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Hemoglobin</th>
                                                                            <th>Hematocrit</th>
                                                                            <th>RBC Count</th>
                                                                            <th>WBC Count</th>
                                                                            <th>Platelet Count</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td><?php echo $path['hema_hemoglobin'] ?></td>
                                                                            <td><?php echo $path['hema_hematocrit'] ?></td>
                                                                            <td><?php echo $path['hema_rbcCount'] ?></td>
                                                                            <td><?php echo $path['hema_wbcCount'] ?></td>
                                                                            <td><?php echo $path['hema_plateletCount'] ?></td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td>normal</td>
                                                                            <td>normal</td>
                                                                            <td>normal</td>
                                                                            <td>normal</td>
                                                                            <td>normal</td>
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
                                <td> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#DifferentialCountResults-<?php echo $path['hema_ID'] ?>">Differential Count</button></center>
                                 <div class="modal fade" id="DifferentialCountResults-<?php echo $path['hema_ID'] ?>" tabindex="-1">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title pull-left">(<?php echo $path['patient_firstName'] ." ". $path['patient_lastName']?> Hematology Laboratory Differential Count Results</h5>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="">
                                                            <table class="table-responsive">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Neutrophils</th>
                                                                        <th>Eosinophils</th>
                                                                        <th>Basophils</th>
                                                                        <th>Total Diff Count</th>
                                                                        <th>Monocytes</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td><?php echo $path['hema_neutropils'] ?></td>
                                                                        <td><?php echo $path['hema_eosinophils'] ?></td>
                                                                        <td><?php echo $path['hema_basophils'] ?></td>
                                                                        <td><?php echo $path['hema_totalDiffCount'] ?></td>
                                                                        <td><?php echo $path['hema_monocytes'] ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        
                                                                        <td>normal</td>
                                                                        <td>normal</td>
                                                                        <td>normal</td>
                                                                        <td>normal</td>
                                                                        <td>normal</td>
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