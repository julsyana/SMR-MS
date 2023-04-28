<?php 
session_start(); 
include "./includes/db_conn.php";

if (isset($_POST['login_btn'])) {


	function validate($data){
		
		$data = trim($data);

	   $data = stripslashes($data);

	   $data = htmlspecialchars($data);

	   return $data;
	}

	$uname = validate($_POST['uname']);

	$pass = validate($_POST['password']);

	if (empty($uname)) {

		header("Location: index.php?error=Username is required!");
	   exit();

	} else if(empty($pass)){
		
		header("Location: index.php?error=Password is required!");
		exit();

	} 
	
	else { 

		$sql = "SELECT * FROM `nurses` WHERE `username` = '$uname' AND `password` ='$pass'";

		$result = mysqli_query($conn1, $sql);

		if (mysqli_num_rows($result) === 1) {

			$row = mysqli_fetch_assoc($result);

            if ($row['username'] === $uname && $row['password'] === $pass) {

            	$_SESSION['username'] = $row['username'];
            	$_SESSION['firstname'] = $row['firstname'];
					$_SESSION['lastname'] = $row['lastname'];
            	$_SESSION['emp_id'] = $row['emp_id'];
					
            	header("Location: dashboard.php");
		       	exit();
            }else{
				header("Location: index.php?error=Incorect username or password!");
		        exit();
			}
		}else{
			header("Location: index.php?error=Incorect username or password!");
	        exit();
		}
	}
	
} else {

	header("Location: index.php");
	exit();
}
