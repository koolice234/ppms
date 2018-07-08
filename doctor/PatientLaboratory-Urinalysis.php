<?php session_start(); 
if (!isset($_SESSION['loggedIn'])) {
        echo "<script>alert('Unauthorized access!Please login! ');window.location.href='../index.php';</script>";
    }?>
<?php 
    include("includes/header.php");

    include("includes/sidebar.php");
  
    ?>
 
        <section class="content">
            
                   
            <div class="card">
                <div class="card-body">
                      <form method="POST" action="actions/urinalysisAction.php">
                    <h2 class="card-title">Urinalysis</h2>
                <div class="container-fluid">
                <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Patient Name</label>
                                  
                                    <?php
                                    include "dbconnect.php";
                                    date_default_timezone_set('Asia/Singapore');
                                    $date = date('Y-m-d');
                                      $id = $_GET['id3'];
                                    $pat = $connect->query("SELECT * FROM `schedule` INNER JOIN `patient` on schedule.patient_ID = patient.patient_ID WHERE schedule.patient_ID = '$id' AND schedule.sched_Date = '$date'") or die(mysqli_error());
                                    while($fetch = $pat->fetch_array()){?>
                                    <input type="text" class="form-control form-control" value="<?php echo $fetch['patient_Name']; ?>" disabled >
                                    <input type="hidden" name="patientcheckupID" value="<?php echo $fetch['patient_ID']; ?>" >
                                    <input type="hidden" name = "schedID" value="<?php echo $fetch['sched_ID']?>" >


                                      <?php } ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                            <label>Date of Checkup</label>
                            <?php include "dbconnect.php";

                            $pat = $connect->query("SELECT * FROM `schedule` INNER JOIN `patient` on schedule.patient_ID = patient.patient_ID WHERE schedule.patient_ID = '$id' AND schedule.sched_Date = '$date'") or die(mysqli_error());
                            while($fetch = $pat->fetch_array()){ ?>
                            <input type="date" class="form-control form-control-lg date-picker" value="<?php echo $fetch['sched_Date']; ?>" name="pat_date"  placeholder="Enter Date of Chekup"  disabled>

                            <?php } ?>

                            <i class="form-group__bar"></i>
                        </div>
                        </div>
                            
                                  
                    </div>
                    <!--Masrospc-->
                     <h3 style="padding-left: 595px;">Normal Range</h3>
                    <div class="row">
                        <div class="col-sm-7">
                          <div class="input-group">
                             <h2 style="text-align:left">Masrospic</h2>
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

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-3">
                            <h4 >Color</h4>
                        </div>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <span class="input-group-addon">Result</span>
                                <div class="form-group">

                                 <select class="select" name="u_color">
                                    <option >Red</option>
                                    <option >Yellow</option>
                                    <option >Blue</option>
                                    <option >Green</option>
                                    <option >White</option>
                                </select>
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
                            <h4 >Transparency</h4>
                        </div>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <span class="input-group-addon">Result</span>
                                <div class="form-group">

                                   <select class="select1" name="u_transparency">
                                     <option >Red</option>
                                     <option >Yellow</option>
                                     <option  >Blue</option>
                                     <option >Green</option>
                                     <option >White</option>
                                </select>
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
                            <h4 >pH</h4>
                        </div>
                        <div class="col-sm-4">
                        <div class="input-group">
                            <span class="input-group-addon">Result</span>
                            <div class="form-group">
                                <input type="number" name="u_ph" class="form-control" value="Result" >
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
                            <h4>Specific Gravity</h4>
                        </div>
                         <div class="col-sm-4">
                        <div class="input-group">
                            <span class="input-group-addon">Result</span>
                            <div class="form-group">
                                <input type="number" name="u_sg" class="form-control" value="Result" >
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
                   <div class="col-sm-3">
                          <h1 style="text-align:left">Chemical</h1><br>
                    </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-3">
                            <h4 >Sugar</h4>
                        </div>
                         <div class="col-sm-4">
                        <div class="input-group">
                            <span class="input-group-addon">Result</span>
                            <div class="form-group">
                                <input type="number" name="u_sugar" class="form-control" value="Result" >
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
                            <h4 >Protein</h4>
                        </div>
                         <div class="col-sm-4">
                        <div class="input-group">
                            <span class="input-group-addon">Result</span>
                            <div class="form-group">
                                <input type="number" name="u_protein" class="form-control" value="Result" >
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
                <h1 style="text-align:left">Micoscopic</h1><br>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-3">
                            <h4 >Transparency</h4>
                        </div>
                         <div class="col-sm-4">
                            <div class="input-group">
                                <span class="input-group-addon">Result</span>
                                <div class="form-group">

                                   <select class="select2" name="u_transparency1">
                                     <option >Red</option>
                                    <option >Yellow</option>
                                    <option  >Blue</option>
                                    <option >Green</option>
                                    <option >White</option>
                                </select>
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
                            <h4 >pH</h4>
                        </div>
                        <div class="col-sm-4">
                        <div class="input-group">
                            <span class="input-group-addon">Result</span>
                            <div class="form-group">
                                <input type="number" name="u_ph1" class="form-control" value="Result" >
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
                             <h4 >Specific Gravity</h4><br>
                        </div>
                       <div class="col-sm-4">
                        <div class="input-group">
                            <span class="input-group-addon">Result</span>
                            <div class="form-group">
                                <input type="number" name="u_sg1" class="form-control" value="Result" >
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
                </div>
         
                <div class="row" style="float:right; margin-right:20px;">
                    <button type="submit" name="uriADD" class="btn btn-primary" >SUBMIT</button>
                </div>
                 </form>
                  </div>
            </div>
        </div>

                <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="card-title">PATIENT Hematology LIST</h4>
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead>
                                            <tr>
                                                <th><center>Patient</center></th>
                                                <th><center>Checkup Date</center></th>
                                                <th><center>Laboratory Results</center></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                             <?php 
                                           include "dbconnect.php";
                                           $sta1 = $connect->query("SELECT * FROM `urinalysis` INNER JOIN schedule ON urinalysis.sched_ID = urinalysis.sched_ID INNER JOIN patient on patient.patient_ID = schedule.patient_ID WHERE urinalysis.patient_ID = '$id'") or die(mysqli_error());
                                           while($path = $sta1->fetch_array()){
                                            ?>
                                            <tr>
                                                <td><center><?php echo $path['patient_firstName'] ." ". $path['patient_lastName']?></center></td>
                                                <td><center><?php echo $path['uri_date']?></center></td>
                                                <td><center><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#MasrospicResults-<?php echo $path['uri_ID'] ?>">Results</button>

                                                      <!-- Patient Edit Modal -->
                            <div class="modal fade" id="MasrospicResults-<?php echo $path['uri_ID'] ?>" tabindex="-1">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title pull-left">("echo Patient Name") Urinalysis Results</h5>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                        <div class="">
                                                            <table class="table-responsive">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Color</th>
                                                                        <th>Transparency</th>
                                                                        <th>pH</th>
                                                                        <th>Specific Gravity</th>
                                                                        <th>Sugar</th>
                                                                        <th>pH</th>
                                                                        <th>Transparency</th>
                                                                        <th>Specific Gravity</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                       <td><?php echo $path['uri_color'] ?></td>
                                                                        <td><?php echo $path['uri_transparency'] ?></td>
                                                                        <td><?php echo $path['uri_pH'] ?></td>
                                                                        <td><?php echo $path['uri_specificGravity'] ?></td>
                                                                        <td><?php echo $path['uri_sugar'] ?></td>
                                                                        <td><?php echo $path['uri_protein'] ?></td>
                                                                        <td><?php echo $path['uri_MICtransparency'] ?></td>
                                                                         <td><?php echo $path['uri_MICpH'] ?></td>
                                                                          <td><?php echo $path['uri_MICspecificGravity'] ?></td>
                                                                    </tr>

                                                                     <tr>
                                                                       <td>Normal</td>
                                                                        <td>Normal</td>
                                                                         <td>Normal</td>
                                                                          <td>Normal</td>
                                                                           <td>Normal</td>
                                                                            <td>Normal</td>
                                                                             <td>Normal</td>
                                                                              <td>Normal</td>
                                                                       
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
                                            <?php }?>
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