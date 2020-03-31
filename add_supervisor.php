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

if(isset($_POST['add'])){
    $name = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $states = (array) $_POST['states'];

    //create supervisor
    $res = mysqli_query($con, "INSERT INTO supervisor SET fullname = '$name', email = '$email', password = '$password', phone = '$phone'")or die(mysqli_error($con));
    if($res){
        $iid = mysqli_insert_id($con);

        foreach ($states as $state) {
            mysqli_query($con, "INSERT INTO supervisor_state SET supervisor_id = '$iid', state_id = '$state'")or die(mysqli_error($con));
        }

        echo "<script type='text/javascript'>alert('Successfully add supervisor')</script>";
        echo "<script type='text/javascript'>document.location='admin_dashboard.php'</script>";
    }

}
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

                 <div class="row">
                    <div class="col-md-12">
                        <div class="card card-body printableArea">
                            <h3><b>ADD SUPERVISOR</b> <span class="pull-left">  </span>

                            </h3>
                            <hr>
                            <div class="row">

                                <div class="col-md-12">
                                    <!-- form goes here --><div class="card">
                                <form method="post" action="">
                            
                                    <div class="card-body">
                                    <div class="form-group row">
                                        <label class="col-md-3 m-t-15">Full Name</label>
                                        <div class="col-md-9">
                                            <input type="text" name="fullname" class="form-control" id="fname" placeholder="Full Name" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-3 m-t-15">Email</label>
                                        <div class="col-md-9">
                                            <input type="email" name="email" class="form-control" id="fname" placeholder="Email Address" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-3 m-t-15">Password</label>
                                        <div class="col-md-9">
                                            <input type="text" name="password" class="form-control" id="fname" placeholder="Password" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-3 m-t-15">Phone Number</label>
                                        <div class="col-md-9">
                                            <input type="number" min-length="11" max-length="11" name="phone" class="form-control" id="fname" placeholder="Phone Number" required>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-md-3 m-t-15">States to Assign Supervisor</label>
                                        <div class="col-md-9">
                                            <select class="select2 form-control m-t-15" multiple="multiple" name="states[]" style="height: 36px;width: 100%;">
                                                <?php 
                                                $st = mysqli_query($con, "SELECT * FROM states")or die(mysqli_error($con));
                                                while($r = mysqli_fetch_array($st)){ ?>
                                                    <option value="<?php echo $r['state_id'] ?>"><?php echo $r['state_name'] ?></option>
                                                <?php }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                
                            </div>
                            <div class="border-top">
                                <div class="card-body">
                                    <button type="submit" name="add" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                            </form>
                        </div>
                                </div>

                            </div>
                        </div>
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
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.min.js"></script>
    <!-- This Page JS -->
    <script src="assets/libs/inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
    <script src="dist/js/pages/mask/mask.init.js"></script>
    <script src="assets/libs/select2/dist/js/select2.full.min.js"></script>
    <script src="assets/libs/select2/dist/js/select2.min.js"></script>
    <script src="assets/libs/jquery-asColor/dist/jquery-asColor.min.js"></script>
    <script src="assets/libs/jquery-asGradient/dist/jquery-asGradient.js"></script>
    <script src="assets/libs/jquery-asColorPicker/dist/jquery-asColorPicker.min.js"></script>
    <script src="assets/libs/jquery-minicolors/jquery.minicolors.min.js"></script>
    <script src="assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="assets/libs/quill/dist/quill.min.js"></script>
    <script>
        //***********************************//
        // For select 2
        //***********************************//
        $(".select2").select2();

        /*colorpicker*/
        $('.demo').each(function() {
        //
        // Dear reader, it's actually very easy to initialize MiniColors. For example:
        //
        //  $(selector).minicolors();
        //
        // The way I've done it below is just for the demo, so don't get confused
        // by it. Also, data- attributes aren't supported at this time...they're
        // only used for this demo.
        //
        $(this).minicolors({
                control: $(this).attr('data-control') || 'hue',
                position: $(this).attr('data-position') || 'bottom left',

                change: function(value, opacity) {
                    if (!value) return;
                    if (opacity) value += ', ' + opacity;
                    if (typeof console === 'object') {
                        console.log(value);
                    }
                },
                theme: 'bootstrap'
            });

        });
        /*datwpicker*/
        jQuery('.mydatepicker').datepicker();
        jQuery('#datepicker-autoclose').datepicker({
            autoclose: true,
            todayHighlight: true
        });
        var quill = new Quill('#editor', {
            theme: 'snow'
        });

    </script>

</body>

</html>