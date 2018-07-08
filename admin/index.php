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
                        <h1>Dashboard</h1>
                    </header>

                <div class="row quick-stats">
                    <div class="col-sm-6 col-md-3">
                        <div class="quick-stats__item">
                            <div class="quick-stats__info">
                               
                                <?php include "dbconnect.php";
                                $date = date("Y-m-d");                                    
                                $pat = $connect->query("SELECT COUNT(sched_ID) as total FROM `schedule` WHERE `sched_Date` = '$date'") or die(mysqli_error());
                                while($fetch = $pat->fetch_array()){ ?>


                               
                                <h2><?php echo $fetch['total'] ?></h2>
                                 <?php } ?>
                                <small>Schedules for Today</small>
                            </div>

                            <div class="quick-stats__chart peity-bar"></div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="quick-stats__item">
                            <div class="quick-stats__info">
                                  <?php include "dbconnect.php";
                                $date = date("Y-m-d");                                    
                                $pat = $connect->query("SELECT COUNT(patient_ID) as total FROM `patient` ") or die(mysqli_error());
                                while($fetch = $pat->fetch_array()){ ?>


                               
                                <h2><?php echo $fetch['total'] ?></h2>
                                 <?php } ?>
                                <small>Total Patients</small>
                            </div>

                            <div class="quick-stats__chart peity-bar"></div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3">
                        <div class="quick-stats__item">
                            <div class="quick-stats__info">
                                  <?php include "dbconnect.php";
                                $date = date("Y-m-d");
                                $time = date("h:i:sa");                                    
                                $patserve = $connect->query("SELECT COUNT(sched_ID) as total FROM `schedule` WHERE `sched_Date` = '$date' AND `sched_Time` > '$time'") or die(mysqli_error());
                                while($fetch = $patserve->fetch_array()){   
                                if($fetch['total']==0){
                                    echo "<h2>0</h2>";
                                }else{             ?>      
                                <h2><?php echo $fetch['total'] ?></h2>
                                 <?php }  } ?>
                                <small>Total Patient Served Today</small>
                            </div>

                            <div class="quick-stats__chart peity-bar"></div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3">
                        <div class="quick-stats__item">
                            <div class="quick-stats__info">
                                  <?php include "dbconnect.php";
                                $date = date("Y-m-d");                                    
                                $pat = $connect->query("SELECT COUNT(sched_ID) as total FROM `schedule` WHERE `sched_Date` = '$date'") or die(mysqli_error());
                                while($fetch = $pat->fetch_array()){ ?>
                                <h2><?php echo $fetch['total'] ?></h2>
                                 <?php } ?>
                                <small>Total Patients for Today</small>
                            </div>

                            <div class="quick-stats__chart peity-bar"></div>
                        </div>
                    </div>


                <div class="row">
                    <div class="col-sm-6 col-md-12">
                    <header class="content__title content__title--calendar">
                        <h1>Calendar</h1>
                        <div class="actions actions--calendar">
                        <a href="#" class="actions__item actions__calender-prev"><i class="zmdi zmdi-long-arrow-left"></i></a>
                        <a href="#" class="actions__item actions__calender-next"><i class="zmdi zmdi-long-arrow-right"></i></a>
                        <i class="actions__item actions__item--active zmdi zmdi-view-comfy" data-calendar-view="month"></i>
                        <i class="actions__item zmdi zmdi-view-week" data-calendar-view="basicWeek"></i>
                        <i class="actions__item zmdi zmdi-view-day" data-calendar-view="basicDay"></i>
                        </div>
                    </header>

                    <div class="calendar card"></div>


                </div>
            </div>
        </section>

        <!-- Javascript -->
        <!-- Vendors -->
        <script src="vendors/bower_components/jquery/dist/jquery.min.js"></script>
        <script src="vendors/bower_components/popper.js/dist/umd/popper.min.js"></script>
        <script src="vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="vendors/bower_components/jquery.scrollbar/jquery.scrollbar.min.js"></script>
        <script src="vendors/bower_components/jquery-scrollLock/jquery-scrollLock.min.js"></script>

        <script src="vendors/bower_components/moment/min/moment.min.js"></script>
        <script src="vendors/bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
        <script src="vendors/bower_components/autosize/dist/autosize.min.js"></script>
        <script src="vendors/bower_components/sweetalert2/dist/sweetalert2.min.js"></script>

        <!-- App functions and actions -->
        <script src="js/app.min.js"></script>

        <!-- Calendar Script -->
        <script type="text/javascript">
            'use strict';
            $(document).ready(function() {
                var date = new Date();
                var m = date.getMonth();
                var y = date.getFullYear();

                $('.calendar').fullCalendar({
                    header: {
                        right: '',
                        center: '',
                        left: ''
                    },
                    buttonIcons: {
                        prev: 'calendar__prev',
                        next: 'calendar__next'
                    },
                    theme: false,
                    selectable: true,
                    selectHelper: true,
                    editable: false,
                    events: jArray,
                    viewRender: function (view) {
                        var calendarDate = $('.calendar').fullCalendar('getDate');
                        var calendarMonth = calendarDate.month();

                        //Set data attribute for header. This is used to switch header images using css
                        $('.calendar .fc-toolbar').attr('data-calendar-month', calendarMonth);

                        //Set title in page header
                        $('.content__title--calendar > h1').html(view.title);
                    },
                    eventClick: function (event, element) {
                        $('#edit-event').modal('show');
                        $('.edit-event__title').val(event.title);
                        $('.edit-event__id').val(event.id);
                        $('.edit-event__start').val(event.start);
                        $('.edit-event__description').val(event.description);
                    }


                });
                //Calendar views switch
                $('body').on('click', '[data-calendar-view]', function(e){
                    e.preventDefault();

                    $('[data-calendar-view]').removeClass('actions__item--active');
                    $(this).addClass('actions__item--active');
                    var calendarView = $(this).attr('data-calendar-view');
                    $('.calendar').fullCalendar('changeView', calendarView);
                });


                //Calendar Next
                $('body').on('click', '.actions__calender-next', function (e) {
                    e.preventDefault();
                    $('.calendar').fullCalendar('next');
                });


                //Calendar Prev
                $('body').on('click', '.actions__calender-prev', function (e) {
                    e.preventDefault();
                    $('.calendar').fullCalendar('prev');
                });
            });
        </script>
        <?php 

                $result = mysqli_query($connect, "SELECT * FROM schedule WHERE sched_status != 'Cancelled'");
                $events = array();
                while ($res = mysqli_fetch_array($result)) { 
                $patientID = $res['patient_ID'];
                  
                $result1 = mysqli_query($connect, "SELECT * FROM patient where patient_ID = '$patientID'");
                
                while ($res1 = mysqli_fetch_array($result1)) {
                    

                        $e = array();
                        $e['title'] = $res1['patient_Name'];
                        $e['id'] = $res['sched_ID'];
                        $e['start'] = date("Y-m-d", strtotime($res['sched_Date']));
                        $e['description'] = date("h:i a", strtotime($res['sched_Time']));

                        // Merge the event array into the return array
                        array_push($events, $e);

                }

                    // Output json for our calendar
                    
            }
            
    ?>
    <div class="modal fade" id="edit-event" data-backdrop="static" data-keyboard="false">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <h5 class="modal-title">Check-up Details</h5>
                                    <br><br>
                                    <form class="edit-event__form" >
                                        <div class="form-group">
                                            <input type="hidden" name="">
                                            <label for="patient_Name">Patient Name</label>
                                            <input type="text" class="form-control edit-event__title" placeholder="Event Title" name="patient_Name" id="patient_Name" disabled>
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" name="sched_ID"  id="sched_ID" disabled class="form-control edit-event__id textarea-autosize"  placeholder="Event Desctiption">
                                            
                                        </div>
                                        <div class="form-group">
                                            <label for="sched_Time">Time</label>
                                            <input type="text" name="sched_Time"  id="sched_Time" disabled class="form-control edit-event__description textarea-autosize"  placeholder="Event Desctiption">
                                            
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    
                                    <button class="btn btn-link" onclick="changeSched()">Edit</button>
                                    <button class="btn btn-link" onclick="deleteSched()">Delete</button>
                                    <button class="btn btn-link" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
    </div>

    <script type="text/javascript">var jArray =<?php echo json_encode($events); ?>
            
      function changeSched() { 
      var id = document.getElementById("sched_ID").value;
      window.location.href = "editSched.php?name=" + id; 
}
function deleteSched() { 
      var id = document.getElementById("sched_ID").value;
      window.location.href = "actions/deleteSched.php?id=" + id; 
}
    </script>
    </body>
        </html>