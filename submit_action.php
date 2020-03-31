<?php
session_start();

include 'includes/dbcon.php';

$user_id = $_SESSION['id'];

$placement = mysqli_query($con, "SELECT * FROM placement a WHERE student_id = '$user_id'") or die(mysqli_error($con));
$rws = mysqli_num_rows($placement);

if ($rws > 0) {
    echo "<script type='text/javascript'>alert('You have already submited Acceptance Letter!')</script>";
    echo "<script type='text/javascript'>document.location='dashboard.php'</script>";
    exit();
}

if (isset($_POST)) {
    $company_name = $_POST['companyName'];
    $company_addr = $_POST['companyAddr'];
    $state = $_POST['state'];
    $designation = $_POST['designation'];
    $dept = $_POST['dept'];
    $internal = $_POST['internal'];
    $phone = $_POST['phone'];

    $target_dir = 'acceptances/';
    $target_file = $target_dir . basename($_FILES['file']['name']);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

    //after sql query
    move_uploaded_file($_FILES['file']['tmp_name'], $target_file);

    //insert
    mysqli_query($con, "INSERT INTO placement SET
        student_id = '$user_id',
        company_name = '$company_name',
        address = '$company_addr',
        designation = '$designation',
        designation_dept = '$dept',
        internal_supervisor = '$internal',
        phonenumber = '$phone',
        state_id = '$state',
        acceptance_letter = '$target_file'
    ") or die(mysqli_error($con));

    echo "<script type='text/javascript'>alert('Acceptance submited successfully!')</script>";
    echo "<script type='text/javascript'>document.location='dashboard.php'</script>";

}
