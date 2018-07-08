<?php session_start(); 
if (!isset($_SESSION['loggedIn'])) {
        echo "<script>alert('Unauthorized access!Please login! ');window.location.href='../index.php';</script>";
    }?>
<?php include("includes/header.php"); ?>
<?php include("includes/sidebar.php"); ?>

<section class="content">
    <div class="content__inner">
        <header class="content__title">
            <h1>System Log</h1>
        </header>

        <div class="card">
           
            <div class="card-body">
                <h4 class="card-title">LOGS TABLE</h4>

                <div class="table-responsive">
                    <table id="data-table" class="table">
                        <thead>
                            <tr>
                                <th>System Log</th>
                                <th>Date</th>
                                <th>Time</th>
                            </tr>
                        </thead>
                        <tbody>
                         <?php 
                         include "dbconnect.php";
                         $sta = $connect->query("SELECT * FROM `logs`") or die(mysqli_error());


                         while($patient = $sta->fetch_array()){
                            ?>
                            <tr>
                                <td><?php echo $patient['log_Description']?></td>
                                <td><?php echo $patient['log_Date']?></td>
                                <td><?php echo $patient['log_Time']?></td>
                            </tr>
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






