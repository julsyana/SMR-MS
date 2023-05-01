<?php

	include "./includes/db_conn.php";
	include "./functions/admin.php";

	error_reporting(0);
	session_start();


	$check_admin = fetchAdmin($conn, null);

	$id = $_SESSION['user_id'];

	if(!empty($id)) {

		header("location: ./pages/dashboard.php");

 	}
?>

<!DOCTYPE html>
<html>
<head>

	<link rel="icon" type="image/png" href="./assets/favcon.png"/>
	<title>SMRMS | ADMIN | LOGIN</title>
	<link rel="stylesheet" type="text/css" href="./css/login.css">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<!-- ajax -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

</head>
<body>
		 <div class="icon-holder">
            <img src="./assets/settings-icon.png" alt="">
         </div>

         <!-- <div class="qcu-title">
            <img src="./assets/QCUClinicLogo.png" alt="">
            <h2> ADMIN LOGIN </h2>
         </div> -->

	<form action="./process/login.php" method="post">

     	<div class="header_login">
			<img src="./assets/QCUClinicLogo.png" alt="">
			<p>ADMIN LOGIN</p>
		</div>
		<div class="input_wrapper">
			<?php if (isset($_SESSION['errMessage'])) { ?>
				<p class="error"><?php echo $_SESSION['errMessage']; ?></p>
			<?php } ?>
			<div class="input">
				<i class="fa fa-user" aria-hidden="true"></i>
				<input type="text" name="uname" placeholder="Username">
			</div>
				<span></span>
			<div class="input">
				<i class="fa fa-lock" aria-hidden="true"></i>
				<input type="password" name="password" id="floatingPassword" placeholder="Password">
			</div>
					 <div class="show-password" style="text-align: left;">
                          <label for="show-pass" style="color: black; font-size: 15px;"> Show password  </label>
                          <input type="checkbox" name="" id="show-pass" style="margin-top: -17px; margin-left: -20px" >
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
                     </script>
				<br>
		</div>

     		<button type="submit">LOGIN</button>

			<?php if(mysqli_num_rows($check_admin) > 0 ) { ?> 

				<p style="color: #888; cursor:not-allowed;"> Create an account </p>

			<?php } else { ?>
				
				<center><a href="./registration.php" class="ca" disabled>Create an account</a> </center>
				
			<?php } ?>
			
   </form>
</body>

<script>
	$(document).ready(function(){

		$('.error').fadeOut(3500);

	});
</script>

<?php 
	unset($_SESSION['errMessage']);
?>
</html>