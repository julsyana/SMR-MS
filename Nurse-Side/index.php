<?php
	error_reporting(0);
	session_start();
	include_once 'insert_data.php';
	include_once 'insert_new_patient.php';
	include('./includes/db_conn.php');
	

  $emp_id = $_SESSION['emp_id'];

  if(!empty($emp_id)) {

	header("location: ./nurseDashboard.php");
	 
  }

?>


<!DOCTYPE html>
<html>
<head>
	<link rel="icon" type="image/png" href="./assets/favcon.png"/>
	<title>SMRMS | NURSE | LOGIN</title>
	<link rel="stylesheet" type="text/css" href="./css/login.css">
</head>
<body>
	<img
    class="demo-bg"
    src="./assets/login_bg.jpg"
    alt=""
  	>
     <form action="login.php" method="post">
	 	
     	<h2><img src="./assets/QCUClinicLogo.png" alt="">NURSE LOGIN</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<label>Username:</label>
     	<input type="text" name="uname" placeholder="Username"><br>

     	<label>Password:</label>
     	<input type="password" name="password" id="floatingPassword" placeholder="Password">
		
		 			  <div class="show-password" style="text-align: left;">
                          <label for="show-pass" style="font-size: 15px;"> Show password  </label>
                          <input type="checkbox" name="" id="show-pass" style="margin-top: -17px; margin-left: -80px" >
                      </div>

                      <script> 

                        const pass = document.getElementById('floatingPassword');
                        const showPass = document.getElementById('show-pass');
                        
                        showPass.addEventListener('change', (e)=> {

                          if(showPass.checked === true) {
                            
                            pass.type = 'text';

                          } else {
                            
                            pass.type = 'password';

                          }
                            
                        });
                      </script><br>

     	<button type="submit" name="login_btn">LOGIN</button>
     </form>
</body>
</html>