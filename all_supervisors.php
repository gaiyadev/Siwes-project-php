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
        <?php include 'includes/admin_sidebar.php';?>
        <div class="page-wrapper">
             <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Supervisors</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Supervisors</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">

            <!-- Main Body -->

            <?php
                $query = mysqli_query($con, "SELECT * FROM supervisor") or die(mysqli_error($con));
                $count = mysqli_num_rows($query);

                if ($count == 0) {?>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body text-center">
                                <h5 class="card-title">No Supervisor!</h5>
                                <br><br>
                                <h2><p>No Supervisor added!</h2>
                                <br>

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } else {?>



            <!-- if user has no supervisor yet -->



                 <div class="row">
                    <div class="col-md-12">
                        <div class="card card-body printableArea">
                            <h3><b>SUPERVISORS</b> <span class="pull-left"> <a href="add_supervisor.php" class="btn btn-success pull-left"> Add Supervisor</a> </span>
                            
                            </h3>
                            <hr>
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="table-responsive" style="clear: both;">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">#</th>
                                                    <th>Full Name</th>
                                                    <th class="text-right">Password</th>
                                                    <th class="text-right">Email</th>
                                                    <th class="text-right">Phone</th>
                                                    <th class="text-right">States assigned to</th>
                                                    <th class="text-right">View Students</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                $i = 1;
                                                while ($row = mysqli_fetch_array($query)) {
                                                    $sup_id = $row['supervisor_id'];

                                                    // $state_id = $row['state_id'];
                                                    // $state_q = mysqli_query($con, "SELECT * FROM states WHERE state_id = '$state_id'") or die(mysqli_error($con));
                                                    // $sr = mysqli_fetch_array($state_q);

                                            ?>
                                                <tr>
                                                    <td class="text-center"><?php echo $i ?> </td>
                                                    <td><?php echo $row['fullname'] ?></td>
                                                    <td class="text-right"><?php echo $row['password'] ?></td>
                                                    <td class="text-right"><?php echo $row['email'] ?></td>
                                                    <td class="text-right"><?php echo $row['phone'] ?></td>
                                                    <td class="text-right"><?php 
                                                        $stq = mysqli_query($con, "SELECT * FROM supervisor_state a LEFT JOIN states b ON a.state_id=b.state_id WHERE a.supervisor_id = '$sup_id'")or die(mysqli_error($con));
                                                        while($sr = mysqli_fetch_array($stq)){
                                                            echo $sr['state_name']. ", ";
                                                        }
                                                    ?></td>
                                                    <td class="text-right"> <a href="supervisor.php?id=<?php echo $row['supervisor_id']; ?>" class="btn btn-info">View Students assigned</a> </td>
                                                </tr>

                                                <?php
                                                $i++;
                                                    }
                                                ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <?php }

?>

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