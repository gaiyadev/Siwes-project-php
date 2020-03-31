<?php session_start();

include 'includes/dbcon.php';

if (isset($_POST['signup'])) {

    $reg = $_POST['regno'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

        //a student
        $query = mysqli_query($con, "SELECT * FROM student WHERE regno = '$reg'") or die(mysqli_error($con));
        $count = mysqli_num_rows($query);

        $counter = mysqli_num_rows($query);

        if ($counter > 0) {
            echo "<script type='text/javascript'>alert('Registration Number already exists!')</script>";
            echo "<script>document.location='index.php'</script>";
        } else {
            mysqli_query($con, "INSERT INTO student SET firstname = '$firstname', lastname = '$lastname', email = '$email', regno = '$reg', phone = '$phone', password = '$password'")or die(mysqli_error($con));

            echo "<script type='text/javascript'>alert('Register successful. Login now')</script>";
            echo "<script type='text/javascript'>document.location='index.php'</script>";
        }

}
