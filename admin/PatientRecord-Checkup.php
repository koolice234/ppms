<?php session_start(); 
if (!isset($_SESSION['loggedIn'])) {
        echo "<script>alert('Unauthorized access!Please login! ');window.location.href='../index.php';</script>";
    }?>
<?php 
    include("includes/header.php");

    include("includes/sidebar.php");
    include("dbconnect.php");
    ?>
    
        <section class="content">
            <div class="content__inner">
    <div class="card">
            <div class="card-body">
                <form method="post" action="actions/patientRecordAction.php"></form>
                <h2 class="card-title" id="tableName">Patient Checkups</h2>
        
        <div class="table-responsive">
            <table id="data-table" class="table">
                <thead>
                    <tr>
                       <th>Patient</th>
                       <th>Diagnosis</th>
                       <th>Prescriptions</th>
                       <th>Laboratories</th>
                   </tr>
               </thead>

               <tbody>
                <?php 
                date_default_timezone_set('Asia/Singapore');
                $date = date('Y-m-d');
                $pat = $connect->query("SELECT * FROM `schedule`  INNER JOIN `patient` ON schedule.patient_ID = patient.patient_ID  WHERE schedule.sched_Date ='$date' ") or die(mysqli_error());
                                     while($fetch = $pat->fetch_array()){
                                        $patientID = $fetch['patient_ID']; ?>
                <tr>
                   <?php 

                   $row = $connect->query("SELECT * FROM `patient` where patient_ID = $patientID") or die(mysqli_error());
                    while($fetch1 = $row->fetch_array()){ ?>
                    <td><?php echo $fetch1['patient_Name']; ?></td>
                    <td><button type="button" data-toggle="modal" data-target="#checkup-<?php echo $fetch['patient_ID']?>" class="btn btn-success">Diagnosis</button>


                        <div class="modal fade" id="checkup-<?php echo $fetch['patient_ID']?>" tabindex="-1">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title pull-left"><?php echo $fetch['patient_Name']; ?>'s Check-up Details</h5>
                                        </div>
                                        <div class="modal-body">
                <form method="POST" action="actions/patientRecordAction.php">
                <input type="hidden" name="patientID" value="<?php echo $fetch['patient_ID']; ?>">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="input-group">
                            <div class="form-group">
                                 <label>Weight</label>
                                <input  name="pr_weight" type="number" class="form-control" >
                                <i class="form-group__bar"></i>
                            </div>
                            <span class="input-group-addon">Kilogram(Kg)</span>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="input-group">
                            <div class="form-group">
                                 <label>Blood Pressure</label>
                                <input  name="bp1" type="number" class="form-control">
                                <i class="form-group__bar"></i>
                            </div>
                            <span class="input-group-addon">over</span>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="input-group">
                            <div class="form-group">
                                <label style="visibility: hidden">Weight</label>
                                <input name="bp2" type="number" class="form-control" >
                                <i class="form-group__bar"></i>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="card-body__title">Diagnosis</h3>
                        <table>
                            <tr>
                                <td>
                                <label class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" value="Chronic Villus" name="checkbox[]" id="check1">
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">Chronic Villus Sampling</span>
                                </label>
                                </td>
                                <td>
                                <label class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" value="Amniocentesis" name="checkbox[]">
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">Amniocentesis</span>
                                </label>
                                </td>
                                <td>
                                <label class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" value="Alpha - Fetoprotein" name="checkbox[]">
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">Alpha - Fetoprotein</span>
                                </label>
                                </td>
                                <td>
                                <label class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" value="Chromosomal Abnormalities" name="checkbox[]">
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">Chromosomal Abnormalities </span>
                                </label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <label class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" value="Gestational Diabetes" name="checkbox[]">
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">Gestational Diabetes</span>
                                </label>
                                </td>
                                <td>
                                <label class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" value="Group B Streptococcus" name="checkbox[]">
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">Group B Streptococcus</span>
                                </label>
                                </td>
                                <td>
                                <label class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" value="Cystic Fibrosis" name="checkbox[]">
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">Cystic Fibrosis</span>
                                </label>
                                </td>
                                <td>
                                <label class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" value="Duchenne Muscular Dysthroph" name="checkbox[]">
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">Duchenne Muscular Dysthrophy</span>
                                </label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <label class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" value="Hemophilia A" name="checkbox[]">
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">Hemophilia A</span>
                                </label>
                                </td>
                                <td>
                                <label class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" value="Thalassemia" name="checkbox[]">
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">Thalassemia</span>
                                </label>
                                </td>
                                <td>
                                <label class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" value="Polycystic Kidney Disease" name="checkbox[]">
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">Polycystic Kidney Disease</span>
                                </label>
                                </td>
                                <td>
                                <label class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" value="Tay-Sachs Disease" name="checkbox[]">
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">Tay-Sachs Disease</span>
                                </label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <label class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" value="Pelvic Inflammatory Disease" name="checkbox[]">
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">Pelvic Inflammatory Disease</span>
                                </label>
                                </td>                                
                                <td>
                                <label class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" value="Asthma" name="checkbox[]">
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">Asthma</span>
                                </label>
                                </td>
                                <td></td><td></td>
                            </tr>
                        </table>
                    </div>
                    
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Patient Problem/Symtoms Description:</label>
                            <textarea class="form-control textarea-autosize text-counter" name="pc_problem" placeholder="Enter Patient Problem Description..."></textarea>
                            <i class="form-group__bar"></i>
                        </div>
                    </div>
                </div>
                <br>
                    <div class="modal-footer">
                        <input type="hidden" name="patientFetchID" value="<?php echo $fetch['patient_ID']; ?>">
                        <button type="submit" name="checkADD" class="btn btn-link">ADD</button>
                        <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                    </div>
                </form>
                            </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td><a href="prescriptionCheckup.php?id=<?php echo $fetch['patient_ID']; ?>" class="btn btn-primary">Prescription(s)</a></td>
                    <td><button type="button" data-toggle="modal" data-target="#Lab-<?php echo $fetch['patient_ID'] ?>" class="btn btn-success">Laboratories</button>
                    <div class="modal fade" id="Lab-<?php echo $fetch['patient_ID'] ?>" tabindex="-1">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title pull-left"><?php echo $fetch1['patient_Name']; ?>'s Laboratories</h5>
                                </div>
                                <?php } ?>
                                <div class="modal-body">
                                    <div class="row">
                                    <a href="PatientLaboratory-Pathology.php?id1=<?php echo $fetch['patient_ID']; ?>" class="btn btn-primary">Pathology</a><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                    <a href="PatientLaboratory-Hematology.php?id2=<?php echo $fetch['patient_ID']; ?>" class="btn btn-primary">Hematology</a><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                    <a href="PatientLaboratory-Urinalysis.php?id3=<?php echo $fetch['patient_ID']; ?>" class="btn btn-primary">Urinalysis</a><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                    
                                    <a href="PatientLaboratory-XRAY.php?id4=<?php echo $fetch['patient_ID']; ?>" class="btn btn-primary">XRAY</a><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                    <a href="PatientLaboratory-Ultrasound.php?id5=<?php echo $fetch['patient_ID']; ?>" class="btn btn-primary">Ultrasound</a>
                                </div>  
                                </div>
                                <div class="modal-footer">
                                <input type="hidden" name="id" value="<?php echo $fetch['sched_ID'] ?> "> 
                                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </td>
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
<script>
    function printContent(el){
    var restorepage = document.body.innerHTML;
    var printcontent = document.getElementById(el).innerHTML;
    document.body.innerHTML = printcontent;
    window.print();
    document.body.innerHTML = restorepage;
}

</script>

<?php include("includes/footer.php"); ?>
        <!-- Javascript -->
        <!-- Vendors -->
        
    </body>

<?php include("includes/footerscripts.php"); ?>
<!-- Mirrored from byrushan.com/projects/super-admin/app/2.1/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Jan 2018 17:21:41 GMT -->
</html>