<?php
session_start();
$user_id = $_SESSION['id'];

include 'includes/head.php';
include 'includes/dbcon.php';

$id = 0;
if(isset($_GET['id'])){
    $id = $_GET['id'];
}else{
    $id = $_SESSION['id'];
}

$q = mysqli_query($con, "SELECT * FROM student WHERE student_id = '$id'")or die(mysqli_error($con));
$qr = mysqli_fetch_array($q);

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
        <?php include 'includes/navbar.php';?>
        <?php include 'includes/sidebar.php';?>
        <div class="page-wrapper">
             <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Profile</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Profile</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-body printableArea">
                            <h3><b>PROFILE</b> </h3>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="pull-left">
                                        <address>
                                            <h3> &nbsp;<b class="text-danger"> <?php echo $qr['firstname'] ?>  <?php echo $qr['lastname'] ?> </b></h3>
                                            <p class="text-muted m-l-5"><?php echo $qr['regno'] ?>
                                                <br/> Email: <?php echo $qr['email'] ?>
                                                <br/> Phone: <?php echo $qr['phone'] ?></p>
                                        </address>
                                    </div>

                                    <?php
                                        $s = mysqli_query($con, "SELECT * FROM placement WHERE student_id = '$id'")or die(mysqli_error($con));
                                        $count = mysqli_num_rows($s);
                                    ?>
                                    <div class="pull-right text-right">
                                        <address>
                                            <h3><u>SIWES Organization</u></h3>
                                            <?php
                                                if($count == 0){ ?>
                                                    <h3>No Organization assigned Yet!</h3>
                                                <?php }else{ 
                                                    $sr = mysqli_fetch_array($s);
                                                    $sup_id = $sr['supervisor_id'];
                                                    $st_id = $sr['state_id'];
                                                    $f = mysqli_query($con, "SELECT * FROM supervisor WHERE supervisor_id = '$sup_id'")or die(mysqli_error($con));
                                                    $fr = mysqli_fetch_array($f);

                                                    $st = mysqli_query($con, "SELECT * FROM states WHERE state_id = '$st_id'") or die(mysqli_error($con));
                                                    $str = mysqli_fetch_array($st);

                                                    ?>
                                                    <h4 class="font-bold"><?php echo $sr['company_name'] ?></h4>
                                            <p class="text-muted m-l-30"><?php echo $sr['address'] ?>
                                                <br/> State: <?php echo $str['state_name'] ?></p>
                                            <p class="m-t-30"><b>KUST Supervisor :</b> <i class="fa fa-user"></i> <?php echo $fr['fullname'] ?></p>
                                            <p class="m-t-30"><b>KUST Supervisor Phone :</b> <i class="fa fa-phone"></i> <?php echo $fr['phone'] ?></p>
                                            <p class="m-t-30"><b>Designation :</b> <i class="fa fa-calendar"></i> <?php echo $sr['designation'] ?></p>
                                            <p><b>Internal Supervisor :</b> <i class="fa fa-user"></i> <?php echo $sr['internal_supervisor'] ?></p>

                                                <?php }
                                            ?>
                                            
                                        </address>
                                    </div>
                                </div>
                            </div>
                        </div>
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