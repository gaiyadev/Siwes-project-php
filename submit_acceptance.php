<?php
session_start();

include 'includes/head.php';
include 'includes/dbcon.php';

$user_id = $_SESSION['id'];

$placement = mysqli_query($con, "SELECT * FROM placement a WHERE student_id = '$user_id'") or die(mysqli_error($con));
$rws = mysqli_num_rows($placement);

if($rws > 0){
    echo "<script type='text/javascript'>alert('You have already submited Acceptance Letter!')</script>";
    echo "<script type='text/javascript'>document.location='dashboard.php'</script>";
    exit();
}

// if(isset($_POST)){
//     $company_name = $_POST['companyName'];
//     $company_addr = $_POST['companyAddr'];
//     $state = $_POST['state'];
//     $designation = $_POST['designation'];
//     $dept = $_POST['dept'];
//     $internal = $_POST['internal'];
//     $phone = $_POST['phone'];

//     $target_dir = 'acceptances/';
//     $target_file = $target_dir . basename($_FILES['file']['name']);
//     $uploadOk = 1;
//     $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

//     //after sql query
//     move_uploaded_file($_FILES['file']['tmp_name'], $target_file);


//     //insert
//     mysqli_query($con, "INSERT INTO placement SET 
//         student_id = '$user_id',
//         company_name = '$company_name',
//         designation = '$designation',
//         designation_dept = '$dept',
//         internal_supervisor = '$internal',
//         phonenumber = '$phone',
//         state_id = '$state',
//         acceptance_letter = '$target_file'
//     ")or die(mysqli_error($con));

//     echo "<script type='text/javascript'>alert('Acceptance submited successfully!')</script>";
//     echo "<script type='text/javascript'>document.location='dashboard.php'</script>";

// }


?>
<!-- Custom CSS -->
    <link href="assets/libs/jquery-steps/jquery.steps.css" rel="stylesheet">
    <link href="assets/libs/jquery-steps/steps.css" rel="stylesheet">
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
        <?php include 'includes/sidebar.php';?>
        <div class="page-wrapper">
             <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Submit Acceptance</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Submit Acceptance Letter</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">

            <!-- Main Body -->
                 <div class="card">
                    <div class="card-body wizard-content">
                        <h4 class="card-title">Submit Acceptance Form</h4>
                        <h6 class="card-subtitle"></h6>
                        <form id="example-form" action="submit_action.php" method="post" class="m-t-40" enctype="multipart/form-data">
                            <div>
                                <h3>Company Information</h3>
                                <section>
                                    <label for="companyName">Company Name *</label>
                                    <input id="companyName" name="companyName" type="text" class="required form-control">
                                    <label for="companyAddr">Company Address *</label>
                                    <input id="companyAddr" name="companyAddr" type="text" class="required form-control">
                                    <label for="state">State *</label>
                                    <select name="state" class="form-control required" required>
                                        <?php
                                            $states = mysqli_query($con, "SELECT * FROM states")or die(mysqli_Error($con));
                                            while($strow = mysqli_fetch_array($states)){ ?>
                                                <option value="<?php echo $strow['state_id'] ?>"> <?php echo $strow['state_name'] ?> </option>
                                            <?php }
                                        ?></select>
                                    <p>(*) Mandatory</p>
                                </section>
                                <h3>Your Info</h3>
                                <section>
                                    <label for="designation">Acceptance Letter</label>
                                    <input id="designation" name="file" type="file" class="required form-control">
                                    <label for="designation">Designation in Company</label>
                                    <input id="designation" name="designation" type="text" class="required form-control">
                                    <label for="dept">Department assigned to</label>
                                    <input id="dept" name="dept" type="text" class="required form-control">
                                    <label for="internal">Internal Supervisor *</label>
                                    <input id="internal" name="internal" type="text" class="required form-control">
                                    <label for="phone">Phone Number</label>
                                    <input id="phone" name="phone" type="text" class=" form-control required">
                                    <p>(*) Mandatory</p>
                                </section>
                                <h3>Preview</h3>
                                <section>
                                    <h3><b>
                                        This Information will be saved and you will be assigned a Supervisor from the institution <br><br>
                                        Please, confirm and review your information entered before submitting. Thanks
                                    </b></h3>
                                </section>
                                
                            </div>
                        </form>
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
    <!-- this page js -->
    <script src="assets/libs/jquery-steps/build/jquery.steps.min.js"></script>
    <script src="assets/libs/jquery-validation/dist/jquery.validate.min.js"></script>
    <script>
        // Basic Example with form
    var form = $("#example-form");
    form.validate({
        errorPlacement: function errorPlacement(error, element) { element.before(error); },
        rules: {
            confirm: {
                equalTo: "#password"
            }
        }
    });
     form.children("div").steps({
        headerTag: "h3",
        bodyTag: "section",
        transitionEffect: "slideLeft",
        onStepChanging: function(event, currentIndex, newIndex) {
            form.validate().settings.ignore = ":disabled,:hidden";
            return form.valid();
        },
        onFinishing: function(event, currentIndex) {
            form.validate().settings.ignore = ":disabled";
            return form.valid();
        },
        onFinished: function(event, currentIndex) {
            // alert("Submitted!");
             form.submit();

        }
    });


    </script>

</body>

</html>