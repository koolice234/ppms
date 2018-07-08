<?php session_start(); 
if (!isset($_SESSION['loggedIn'])) {
        echo "<script>alert('Unauthorized access!Please login! ');window.location.href='../index.php';</script>";
    }?>
<?php include("includes/header.php"); ?>
<?php include("includes/sidebar.php"); 
    include("dbConnect.php");
?>

<section class="content">
    <div class="content__inner">
        <header class="content__title">
            <h1>Backup Database</h1>
        </header>      
 <a href="export/export.php" class="btn btn-primary">Export Database</a>
<a href="export/import.php" class="btn btn-primary">Import Database</a>
<br>
<br>
             
        <form method="post" action="actions/scheduleAction.php">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title">Backup History   </h2>
               
                                <div class="table-responsive">
                                    <table id="data-table" class="table">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Backup Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <?php 
                                                 
                                            $sched = $connect->query("SELECT * FROM `Backup`") or die(mysqli_error());

                                                 while($fetchsched = $sched->fetch_array()){ ?>
                                                <td><?php echo $fetchsched['remarks']; ?></td>
                                                <td><?php echo $fetchsched['backup_date']; ?></td>
                                           </tr>   
                                            <?php } ?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </form>
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



                