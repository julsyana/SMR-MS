<?php
     include "./includes/db_conn.php";
     include "./functions/admin.php";


     $check_admin = fetchAdmin($conn, null);

     if(mysqli_num_rows($check_admin) > 0){

          header("location: ./index.php");
     }

     error_reporting(0);
     session_start();


     $id = $_SESSION['user_id'];

     if(!empty($id)) {

          header("location: ./pages/dashboard.php");
          
     }
?>

<!DOCTYPE html>
<html>
<head>
     <link rel="icon" type="image/png" href="./assets/favcon.png"/>
	<title>SMRMS | ADMIN | REGISTRATION</title>
	<link rel="stylesheet" type="text/css" href="./css/registration.css">
</head>
<body>
     <form action="registrationValidation.php" method="post">
          <div class="header_login">
               <img src="./assets/QCUClinicLogo.png" alt="">
               <h2>ADMIN SIGN UP</h2>
          </div>
          <div class="input_wrapper">

               <?php if (isset($_GET['error'])) { ?>
                    <p class="error"><?php echo $_GET['error']; ?></p>
               <?php } ?>
     
               <?php if (isset($_GET['success'])) { ?>
                    <p class="success"><?php echo $_GET['success']; ?></p>
               <?php } ?>



               <?php if (isset($_GET['fname'])) { ?>
                    <input type="text" 
                           name="fname" 
                           placeholder="First Name"
                           value="<?php echo $_GET['fname']; ?>"><br>
               <?php }else{ ?>
                    <input type="text" 
                           name="fname" 
                           placeholder="First Name"><br>
               <?php }?>

               
               <?php if (isset($_GET['img'])) { ?>
                    <input type="file" 
                           name="img" 
                           placeholder="Upload Image"
                           value="<?php echo $_GET['img']; ?>"><br>
               <?php }else{ ?>
                    <input type="file" 
                           name="img" 
                           placeholder="Upload Image"><br>
               <?php }?>
             
               <?php if (isset($_GET['lname'])) { ?>
                    <input type="text" 
                           name="lname" 
                           placeholder="Last Name"
                           value="<?php echo $_GET['lname']; ?>"><br>
               <?php }else{ ?>
                    <input type="text" 
                           name="lname" 
                           placeholder="Last Name"><br>
               <?php }?>

                <?php if (isset($_GET['contact_num'])) { ?>
                    <input type="text" 
                           name="contact_num" 
                           placeholder="Contact Number"
                           value="<?php echo $_GET['contact_num']; ?>"><br>
               <?php }else{ ?>
                    <input type="text" 
                           name="contact_num" 
                           placeholder="Contact Number"><br>
               <?php }?>
     
               <?php if (isset($_GET['uname'])) { ?>
                    <input type="text" 
                           name="uname" 
                           placeholder="Email"
                           value="<?php echo $_GET['uname']; ?>"><br>
               <?php }else{ ?>
                    <input type="text" 
                           name="uname" 
                           placeholder="Email"><br>
               <?php }?>
     
               <input type="password" name="password" placeholder="Password" required><br>
     
               <input type="password" name="re_password" placeholder="Confirm Password" required><br>
          </div>

          <div class="button_wrapper">
               <a href="index.php" class="ca">Already have an account?</a>
               <button type="submit">SIGN UP</button>
          </div>
     </form>
</body>
</html>


