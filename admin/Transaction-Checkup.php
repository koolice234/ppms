<?php include("includes/header.php"); ?>
<?php include("includes/sidebar.php"); ?>

            <section class="content">
                <div class="content__inner">
                    <header class="content__title">
                        <h1>Patient Checkups</h1>
                    </header>

            
                        

                    <!-- Patient Edit Modal -->
                            <div class="modal fade" id="patientEdit" tabindex="-1">
                                <div class="modal-dialog ">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title pull-left">("echo Patient Name") Prescriptions</h5>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                        <div class="table-responsive">
                                                            <table class="table mb-0">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Medicines</th>
                                                                        <th>Dosage</th>
                                                                        <th>Frequency</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>biogesic</td>
                                                                        <td>1</td>
                                                                        <td>3 times a day</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>solmux</td>
                                                                        <td>1</td>
                                                                        <td>every 4 hours</td>
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


<!-- Mirrored from byrushan.com/projects/super-admin/app/2.1/form-components.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Jan 2018 17:17:59 GMT -->
</html>