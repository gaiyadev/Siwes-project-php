<?php
session_start();

include('includes/head.php');
include 'includes/dbcon.php';

if(!isset($_SESSION['id'])){
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
    <!-- <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div> -->
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <?php include('includes/navbar.php'); ?>
        <?php include('includes/sidebar.php'); ?>
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

            <!-- Main Body -->

            <?php 
            //check if user has applied for acceptance
            $check_accept = mysqli_query($con, "SELECT * FROM placement WHERE student_id = '$user_id'") or die(mysqli_error($con));
            $accept_row = mysqli_num_rows($check_accept);

            //check if user acceptance is sucessful
            $placement = mysqli_query($con, "SELECT * FROM placement a WHERE student_id = '$user_id'") or die(mysqli_error($con));

            // $placement = mysqli_query($con, "SELECT * FROM placement a WHERE student_id = '1'
            // LEFT JOIN states b ON a.state_id=b.state_id
            // LEFT JOIN supervisor c ON a.supervisor_id=c.supervisor_id") or die(mysqli_error($con));

            $row = mysqli_fetch_array($placement);

            if($accept_row == 0){ ?>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Welcome, <?php echo $name ?></h5>
                                <p>You have not been Placed to any organization for S.I.W.E.S 
                                <br>
                                <h4>Download the acceptance form below to proceed</h4>
                                <a href="acceptance.php" class="btn btn-danger btn-lg">Download Acceptance Form</a>

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }else if($row['status'] == 0){
                 ?>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Welcome, <?php echo $name ?></h5>
                                <p>Your Acceptance letter submitted on <?php echo date('d, M Y - h:i a', strtotime($row['date_created'])); ?> is still being reviewed.
                                <br>
                                <h4>Check back later for your feedback</h4>

                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            <?php }else{ 

                $supervisor_id = $row['supervisor_id'];
                $state_id = $row['state_id'];

                $state_query = mysqli_query($con, "SELECT * FROM states WHERE state_id = '$state_id'")or die(mysqli_error($con));
                $state_row = mysqli_fetch_array($state_query);
                $sup_query = mysqli_query($con, "SELECT * FROM supervisor WHERE supervisor_id = '$supervisor_id'") or die(mysqli_error($con));
                $sup_row = mysqli_fetch_array($sup_query);
                
                ?>
                    <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Welcome, <?php echo $name ?></h5>
                                <p>Your Acceptence letter from <b><?php echo $row['company_name'] ?>, <?php echo $state_row['state_name'] ?></b> has been approved.
                                <br>
                                <h4>Your Supervisor is</h4>
                                <a href="supervisor.php" class="btn btn-primary btn-lg"><i class="fa fa-user"></i>  <?php echo $sup_row['fullname'] ?></a>

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
           <?php }
            ?>

                <div class="row">
                    <!-- Column -->
                    <div class="col-md-4">
                    <a href="submit_acceptance.php">
                        <div class="card card-hover">
                            <div class="box bg-cyan text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"></i></h1>
                                <h6 class="text-white">Submit Acceptance Letter</h6>
                            </div>
                        </div>
                    </a>
                    </div>
                    <!-- Column -->
                    <div class="col-md-4">
                        <a href="supervisor.php">
                        <div class="card card-hover">
                            <div class="box bg-success text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-chart-areaspline"></i></h1>
                                <h6 class="text-white">My Supervisor</h6>
                            </div>
                        </div>
                        </a>
                    </div>
                     <!-- Column -->
                    <div class="col-md-4">
                        <a href="profile.php">
                        <div class="card card-hover">
                            <div class="box bg-warning text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-collage"></i></h1>
                                <h6 class="text-white">My Profile</h6>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>

                <br>
                
                
                
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