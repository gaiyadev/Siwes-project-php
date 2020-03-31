<?php

include 'includes/dbcon.php';

$id = $_GET['id'];

//query placement
$q = mysqli_query($con, "SELECT * FROM placement WHERE placement_id = '$id'") or die(mysqli_error($con));
$qr = mysqli_fetch_array($q);
$state_id = $qr['state_id'];
$std_id = $qr['student_id'];

mysqli_query($con, "INSERT INTO notification SET title = 'Success', body = 'Your acceptance letter has been accepted', student_id = '$std_id'") or die(mysqli_error($con));


//get supervisors for state
$s = mysqli_query($con, "SELECT * FROM supervisor_state WHERE state_id = '$state_id' ORDER BY id DESC LIMIT 1") or die(mysqli_error($con));
$sr = mysqli_fetch_array($s);

$sup_id = $sr['supervisor_id'];
mysqli_query($con, "INSERT INTO notification SET title = 'Success', body = 'A student has been allocated to you, please check dashboard', supervisor_id = '$sup_id'") or die(mysqli_error($con));

$query = mysqli_query($con, "UPDATE placement SET supervisor_id = '$sup_id', status='1' WHERE placement_id = '$id'") or die(mysqli_error($con));

if ($query) {
    echo "<script type='text/javascript'>alert('Successfully accepted!')</script>";
    echo '<script>document.location="view_acceptance_letters.php"</script>';
}
