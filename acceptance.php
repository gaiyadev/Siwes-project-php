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

$query = mysqli_query($con, "SELECT * FROM student WHERE student_id = '$user_id'")or die(mysqli_error($con));
$row = mysqli_fetch_array($query);

$regno = $row['regno'];

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title> SIWES LETTER</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
</head>

<body class="bg">

    <table width="100%" align="center">

        <tr>
            <td width="100%" align="center">
                <div style="align: center; float: left"><img src="kustsmall.png" width="70%" /></div>
                <strong>
                    <h4 style="color: green;">KANO UNIVERSITY OF SCIENCE AND TECHNOLOGY, WUDIL </h4>
                </strong>
                <h4 style="">DEPARTMENT OF COMPUTER SCIENCE </h4>
                <h4 style="">FACULTY OF COMPUTING AND MATHEMATICAL SCIENCES </h4>
                
                <small><b>Vice-Chancellor: PROF. Shehu Alhaji Musa B.Sc (UDUS), MSC, PhD Agric. Econs.(ATBU),MASN,MAESON MNRSA
                <br> H.O.D: Dr Salisu Mamman Abdulrahman B.Sc (KUST), MSc. (BUK), PhD (University of Porto) </b></small>
            </td>
        </tr>
    </table>

    <hr style="background-color: black; height: 3px;"/>

    <table width="100%" align="left">

        <tr>
            <td width="50%" align="left">
                . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .  <br/> <br/>
                . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .  <br/> <br/>
                . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .  <br/> <br/>
            </td>
        </tr>
    </table>

    <p>
        Dear Sir/Ma, <br><br>

        <h3 align="center"><u>STUDENT INDUSTRIAL WORK EXPERIENCE SCHEME (SIWES) </u></h3>

        I write to enquire from you the possibility of your organization accepting our student for
        the SIWES programme for a period of three months. <br><br>
        We acquire a place for <b><?php echo $name ?></b> with Matric Number <b><?php echo $regno ?></b>
        subject to the vacancy you may have. <br><br>
        I would be grateful if you could respond to this request soonest as this will enable us
        prepare the placement list to Industrial Training Fund (ITF) headquarters in time. 
        <br><br>
        Yours faithfully,  <br>
        <b>Departmental SIWES Coordinator </b>
    </p>

    <br><br><br>
    <br><br><br>
    <br><br><br>
    <br><br><br>
    <br><br><br>
    <br><br><br>
    <br><br><br>
    <br><br><br>
    <br><br><br>
    <br><br><br>
    <br><br><br>
    <br><br><br>
    <br><br><br>
    <br><br><br>
    <br><br><br>
    <br><br><br>


    <div style="align: center" align="center"><img src="kustsmall.png" width="20%" /></div>
    <br>
    <h3 align="center"><u>ACCEPTANCE LETTER</u></h3>


    <p>
        To <br> <br>
        Departmental SIWES Coordinator, <br> <br>
        Department of Computer Science, <br> <br>
        Kano University of Science and Technology, Wudil.<br> <br> <br>

        The bearer: <b><?php echo $name ?> (<?php echo $regno ?>)</b> who is seeking a place for
        SIWES in our organization is hereby: <br><br><br>

        <b>ACCEPTED: ____________</b> <br><br>
        <b>REJECTED: ____________</b> <br><br> <br>

        Name of Company/Organization . . . . . . . . . . . . . . . . . . . . . . . . . . . .  . . . . . . . . . . <br><br>
        Address: . . . . . . . . . . . . . . . . . . . . . . . . . . . .  . . . . . . . . . .  . . . . . . . . . . . . . . . .  . . . . . . . . . . <br><br>
        . . . . . . . . . . . . . . . . . . . . . . . . . . . .  . . . . . . . . . . <br><br>
        Name of Officer: . . . . . . . . . . . . . . . . . . . . . . . . . . . .  . . . . . . . . . . . . . . . <br><br>
        Designation: . . . . . . . . . . . . . . . . . . . . . . . . . . . .  . . . . . . . . . . . . . . . . . <br><br>
        Signature/Stamp: . . . . . . . . . . . . . . . . . . . . . . . . . . . .  . . . . . . . . . . . . . . . .<br><br>
        Date: . . . . . . . . . . . . . . . . . . . . . . . . . . . .  . . . . . . . . . . <br><br>
    </p>

    
    <script>
        window.print();
    </script>

</body>

</html>