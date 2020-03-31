<?php
session_start();

include 'includes/head.php';
include 'includes/dbcon.php';

if (!isset($_SESSION['id'])) {
    header('Location: index.php');
    exit();
}

$user_id = $_SESSION['id'];
$name = $_SESSION['name'];
?>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <?php include 'includes/navbar.php';?>
        <?php include 'includes/sup_sidebar.php';?>
        <div class="page-wrapper">
             <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Dashboard</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">

            <?php 
            //students count
            $students_query = mysqli_query($con, "SELECT * FROM placement WHERE supervisor_id = '$user_id'") or die(mysqli_error($con));
            $count = mysqli_num_rows($students_query);

            //allocate states
            $states_query = mysqli_query($con, "SELECT * FROM supervisor_state a LEFT JOIN states b ON a.state_id=b.state_id WHERE a.supervisor_id = '$user_id'") or die(mysqli_error($con));
            
            $states_count = mysqli_num_rows($states_query);
            ?>

            <!-- Main Body -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Welcome, <?php echo $name ?> </h5>
                                <p>You have <b><?php echo $count == 0 ? 'No Student' : ' '.$count.' Students'; ?> </b> assigned to you for Supervision.
                                <br>
                                <h4>Your Locations:  <?php
                                 if($states_count > 0){
                                    while($row = mysqli_fetch_array($states_query)){
                                        echo $row['state_name']. ', ';
                                    } 
                                }
                                ?>

                                </h4>
                                <a href="view_students.php" class="btn btn-danger btn-lg">View Students</a>

                                </p>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <!-- Column -->
                    <div class="col-md-6">
                        <a href="view_students.php">
                        <div class="card card-hover">
                            <div class="box bg-cyan text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"></i></h1>
                                <h6 class="text-white">View Students</h6>
                            </div>
                        </div>
                        </a>
                    </div>
                    </div>
                     <!-- Column -->
                    <div class="col-md-6">
                    <a href="sup_profile.php">
                        <div class="card card-hover">
                            <div class="box bg-warning text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-collage"></i></h1>
                                <h6 class="text-white">My Profile</h6>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>

            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
               Designed for Kano Universiry of Science & Technology, Wudil.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <!-- <script src="dist/js/pages/dashboards/dashboard1.js"></script> -->
    <!-- Charts js Files -->
    <script src="assets/libs/flot/excanvas.js"></script>
    <script src="assets/libs/flot/jquery.flot.js"></script>
    <script src="assets/libs/flot/jquery.flot.pie.js"></script>
    <script src="assets/libs/flot/jquery.flot.time.js"></script>
    <script src="assets/libs/flot/jquery.flot.stack.js"></script>
    <script src="assets/libs/flot/jquery.flot.crosshair.js"></script>
    <script src="assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="dist/js/pages/chart/chart-page-init.js"></script>

</body>

</html>