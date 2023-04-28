<?php 
session_start(); 
   include "./includes/db_conn.php";
   include "./functions/admin.php";

if (isset($_POST['uname']) && isset($_POST['password'])
    && isset($_POST['fname']) && isset($_POST['lname']) 
    && isset($_POST['re_password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);

	$re_pass = validate($_POST['re_password']);
	$fname = validate($_POST['fname']);
    $lname = validate($_POST['lname']);
	$img = validate($_POST['img']);
	$contact_num = validate($_POST['contact_num']);

	$user_data = 'uname='. $uname. '&fname='. $fname. '&lname='. $lname. '&img='. $img. '&contact_num='. $contact_num;


	if (empty($uname)) {
		header("Location: registration.php?error=Email is required&$user_data");
	    exit();
	}
    else if(empty($pass)){
        header("Location: registration.php?error=Password is required&$user_data");
	    exit();
	}

	else if(empty($re_pass)){
        header("Location: ./registration.php?error=Confirm Password is required&$user_data");
	    exit();
	}

	else if(empty($fname)){
        header("Location: ./registration.php?error=First Name is required&$user_data");
	    exit();
	}

    else if(empty($lname)){
        header("Location: registration.php?error=Last Name is required&$user_data");
	    exit();
	}

	else if(empty($img)){
        header("Location: registration.php?error=Image is required&$user_data");
	    exit();
	}

	else if(empty($contact_num)){
        header("Location: registration.php?error=Contact Number is required&$user_data");
	    exit();
	}

	else if($pass !== $re_pass){
        header("Location: registration.php?error=The confirmation password does not match.&$user_data");
	    exit();
	}

	else{

		// hashing the password
        $pass = md5($pass);

	    $sql = "SELECT * FROM admins WHERE email='$uname' ";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			header("Location: registration.php?error=The email is taken, try another.&$user_data");
	        exit();
		}else {
           $sql2 = "INSERT INTO admins(email, password, fname, lname, img, contact_num) VALUES('$uname', '$pass', '$fname', '$lname', '$img', '$contact_num')";
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
           	 header("Location: registration.php?success=Your account has been created successfully!");
	         exit();
           }else {
	           	header("Location: registration.php?error=Unknown error occurred!&$user_data");
		        exit();
           }
		}
	}
	
}else{
	header("Location: registration.php");
	exit();
}