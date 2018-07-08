<?php session_start(); 
if (!isset($_SESSION['loggedIn'])) {
        echo "<script>alert('Unauthorized access!Please login! ');window.location.href='../index.php';</script>";
    }?>
<?php include("includes/header.php"); ?>
<?php include("includes/sidebar.php"); ?>

<section class="content">
    <div class="card">

        <div class="card-body">
            <h4>Pregnancy Progress Report</h4>
            <br>

                    <div class="table-responsive">
                        
                        <table id="data-table" class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Action</th>
                                    <th>Action</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                include("dbconnect.php");
                                $result = mysqli_query($connect, "SELECT * FROM `patient`");
                                while ($res1 = mysqli_fetch_array($result)) {
                                   
                                    ?>
                                    <tr>
                                    <td><?php echo $res1['patient_firstName']?> <?php echo $res1['patient_lastName'] ?></td>
                                    <td><a href="#" onclick="openProgressBPD(<?php echo $res1['patient_ID']; ?>)" class="btn btn-primary" >Length Progress</a></td>
                                    <td><a href="#" onclick="openProgressHC(<?php echo $res1['patient_ID']; ?>)" class="btn btn-primary" >Weight Progress</a></td>
                                    <td><a href="#" onclick="openProgressFL(<?php echo $res1['patient_ID']; ?>)" class="btn btn-primary" >Pulse Rate Progress</a></td>
                                <?php } ?>
                                </tr>
                            </tbody>
                        </table>
                     </div>
        </div>
    </div>
</section>
<script>
    function openProgressBPD(id1) {
                myWindow = window.open("viewProgressBPD.php?id="+id1, "", "width=1350, height=650");
            }
            function openProgressHC(id1) {
                myWindow = window.open("viewProgressHC.php?id="+id1, "", "width=1350, height=650");
            }
            function openProgressFL(id1) {
                myWindow = window.open("viewProgressFL.php?id="+id1, "", "width=1350, height=650");
            }
</script>

<!-- Javascript -->
<!-- Vendors -->

<?php include("includes/footerscripts.php"); ?>

<?php include("includes/footer.php"); ?>
<!-- Javascript -->
<!-- Vendors -->



