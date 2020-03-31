<?php session_start();

include('includes/dbcon.php');

if (isset($_POST['login'])) {

	$user_unsafe = $_POST['user'];
	$pass_unsafe = $_POST['password'];

	$user = mysqli_real_escape_string($con, $user_unsafe);
	$pass = mysqli_real_escape_string($con, $pass_unsafe);

	if($user == 'admin' && $pass == '1234'){
		//an admin
		//Get user details from db
		$name = 'Administrator';
		$id = 0;
		
			$_SESSION['id'] = $id;
			$_SESSION['name'] = $name;
			$_SESSION['type'] = 'admin';

			echo "<script type='text/javascript'>alert('Login successful')</script>";
			echo "<script type='text/javascript'>document.location='admin_dashboard.php'</script>";

	}else if(substr_count($user, '/') == 2){
		//a student
		$query = mysqli_query($con, "SELECT * FROM student WHERE regno = '$user' AND password = '$pass'") or die(mysqli_error($con));
		$row = mysqli_fetch_array($query);

		//Get user details from db
		$name = $row['firstname'] . " " . $row['lastname'];
		$counter = mysqli_num_rows($query);
		$id = $row['student_id'];

		if ($counter == 0) {
			echo "<script type='text/javascript'>alert('Invalid Username or Password!')</script>";
			echo "<script>document.location='index.php'</script>";
		} else {
			$_SESSION['id'] = $id;
			$_SESSION['name'] = $name;
			$_SESSION['type'] = 'student';

			echo "<script type='text/javascript'>alert('Login successful')</script>";
			echo "<script type='text/javascript'>document.location='dashboard.php'</script>";
		}
	}else{
		//a supervisor
		$query = mysqli_query($con, "SELECT * FROM supervisor WHERE email = '$user' AND password = '$pass'") or die(mysqli_error($con));
		$row = mysqli_fetch_array($query);

		//Get user details from db
		$name = $row['fullname'];
		$counter = mysqli_num_rows($query);
		$id = $row['supervisor_id'];

		if ($counter == 0) {
			echo "<script type='text/javascript'>alert('Invalid Username or Password!')</script>";
			echo "<script>document.location='index.php'</script>";
		} else {
			$_SESSION['id'] = $id;
			$_SESSION['name'] = $name;
			$_SESSION['type'] = 'supervisor';

			echo "<script type='text/javascript'>alert('Login successful')</script>";
			echo "<script type='text/javascript'>document.location='supervisor_dashboard.php'</script>";
		}
	}

	}


