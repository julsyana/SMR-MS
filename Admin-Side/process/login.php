<?php 
session_start(); 
include "../includes/db_conn.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {

	function validate($data){

      $data = trim($data);

	   $data = stripslashes($data);

	   $data = htmlspecialchars($data);

	   return $data;
	}

	echo $uname = validate($_POST['uname']);
	echo $pass = validate($_POST['password']);

	if (empty($uname)) {

		$_SESSION['errMessage'] = "Email is required!";
		header("Location: ../index.php");
	   exit();

	}

	else if(empty($pass)){

		$_SESSION['errMessage'] = "Password is required!";
		header("Location: ../index.php");
	   exit();

	}
	
	else{

		// hashing the password
      $pass = md5($pass);

		$sql = "SELECT * FROM admins WHERE email='$uname' AND password='$pass'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {

			$row = mysqli_fetch_assoc($result);

            if ($row['email'] === $uname && $row['password'] === $pass) {

            	$_SESSION['user_id'] = $row['user_id'];
            	header("Location: ../pages/dashboard.php");
		        	exit();

            } else {
					
					$_SESSION['errMessage'] = "Incorect email or password!";
					header("Location: ../index.php");
					exit();
			}

		} else{

			$_SESSION['errMessage'] = "Incorect email or password!";
			header("Location: ../index.php");
			exit();
		}
	}
	
}else{

	header("Location: index.php");
	exit();
	
}
