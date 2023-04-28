<?php 
session_start();

if (isset($_SESSION['emp_id']) && isset($_SESSION['username'])) {

    include "db_conn.php";

if (isset($_POST['old_password']) && isset($_POST['new_password'])
    && isset($_POST['confirm_password'])) {

	function valemp_idate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$old_password = valemp_idate($_POST['old_password']);
	$new_password = valemp_idate($_POST['new_password']);
	$confirm_password = valemp_idate($_POST['confirm_password']);
    
    if(empty($old_password)){
      header("Location: change-password.php?error=Old Password is required");
	  exit();
    }else if(empty($new_password)){
      header("Location: change-password.php?error=New Password is required");
	  exit();
    }else if($new_password !== $confirm_password){
      header("Location: change-password.php?error=The confirmation password  does not match");
	  exit();
    }else {
        $emp_id = $_SESSION['emp_id'];

        $sql = "SELECT password FROM nurses WHERE emp_id='$emp_id' AND password='$old_password'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) === 1){
        	
        	$sql_2 = "UPDATE nurses SET password='$new_password' WHERE emp_id='$emp_id'";
        	mysqli_query($conn, $sql_2);
           
            header("Location: account.php?success=Password changed");
	        exit();

        }else {
        	header("Location: account.php?error=Incorrect password");
	        exit();
        }

    }

    
}else{
	header("Location: account-password.php");
	exit();
}

}else{
     header("Location: dashboard.php");
     exit();
}