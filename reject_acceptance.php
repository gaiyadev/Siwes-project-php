<?php

include 'includes/dbcon.php';

$id = $_GET['id'];

//query placement
$q = mysqli_query($con, "SELECT * FROM placement WHERE placement_id = '$id'") or die(mysqli_error($con));
$qr = mysqli_fetch_array($q);
$std_id = $qr['student_id'];
mysqli_query($con, "INSERT INTO notification SET title = 'Rejection', body = 'Your acceptance letter has been rejected, submit another', student_id = '$std_id'")or die(mysqli_error($con));

$query = mysqli_query($con, "DELETE FROM placement WHERE placement_id='$id'") or die(mysqli_error($con));

if ($query) {
    echo "<script type='text/javascript'>alert('Successfully rejected!')</script>";
    echo '<script>document.location="view_acceptance_letters.php"</script>';
}
