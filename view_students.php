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
        <?php include 'includes/sup_sidebar.php';?>
        <div class="page-wrapper">
             <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Supervisor</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">Supervisor</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><?php echo $name ?> </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">

            <!-- Main Body -->

            <!-- if user has no supervisor yet -->
            <?php
                $placement = mysqli_query($con, "SELECT * FROM placement WHERE supervisor_id = '$user_id'") or die(mysqli_error($con));
                $rws = mysqli_num_rows($placement);
                $res = mysqli_fetch_array($placement);

                if($rws == 0){ ?>
            <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body text-center">
                                <h5 class="card-title">No Student!</h5>
                                <br><br>
                                <h2><p>You don't have any students asigned to you yet! Check back later!</h2>
                                <br>

                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <?php }else{
                    ?>


                 <div class="row">
                    <div class="col-md-12">
                        <div class="card card-body printableArea">
                            <h3><b>STUDENTS</b> <span class="pull-right"></span></h3>
                            <hr>
                            <div class="row">
                                
                                <?php
                                    $students = mysqli_query($con, "SELECT * FROM placement WHERE supervisor_id = '$user_id'") or die(mysqli_error($con));
                                    $num = mysqli_num_rows($students);

                                    ?>
                                <div class="col-md-12">
                                    <div class="table-responsive" style="clear: both;">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">#</th>
                                                    <th>Full Name</th>
                                                    <th class="text-right">Company</th>
                                                    <th class="text-right">Phone Number</th>
                                                    <th class="text-right">Address</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 1;
                                                while ($std_row = mysqli_fetch_array($students)) {

                                                    $std_id = $std_row['student_id'];
                                                    $squery = mysqli_query($con, "SELECT * FROM student WHERE student_id = '$std_id'") or die(mysqli_error($con));
                                                    $sr = mysqli_fetch_array($squery);
    ?>
                                                    <tr>
                                                        <td class="text-center"><?php echo $i ?></td>
                                                        <td><?php echo $sr['firstname'] ?>  <?php echo $sr['lastname'] ?></td>
                                                        <td class="text-right"><?php echo $std_row['company_name'] ?> </td>
                                                        <td class="text-right"> <?php echo $std_row['phonenumber'] ?></td>
                                                        <td class="text-right"> <?php echo $std_row['address'] ?></td>
                                                    </tr>

                                                    <?php $i++;}
?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                </div>

                            </div>
                        </div>
                    </div>
                                                <?php } ?>
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