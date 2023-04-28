<?php
   // error_reporting(0);
   session_start();


   include "../redo/includes/db_con.php";
   include "../redo/functions/student_function.php";

   $stud_id = $_SESSION['pass-stud_id'];
   $email = $_SESSION['pass-email'];

   $err =  $_SESSION['err'];

   if(isset($_POST['set-pass-btn'])) {

      $newPass = $_POST['newPass'];
      $confirmPass = $_POST['confirmPass'];

      if($confirmPass === $newPass){

         $new_password = $newPass;

         // set password
         $result = setNewPassword($conn, $stud_id, $new_password);

         if(!$result){

            echo mysqli_error($conn);

         } else {

            // session_unset();
            header("location: ./survey-form.php");
         }

      } else {

         $_SESSION['err'] = "Password didn't match";

      }
      


   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

   <link rel="stylesheet" href="../custom-properties.css">
   <link rel="stylesheet" href="mediaQueries.css">
   <link rel="stylesheet" href="./css/register.css">
   
   <link rel="shortcut icon" href="../assets/favcon.png" type="image/x-icon">
   <title> Regiter your Email | QCU CMS </title>
</head>
<body>

      <nav class="navbar" style="background: var(--primary-bg);">
        <div class="container-fluid">
          <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="../clinic-logo.png" alt="" width="50" height="50" class="d-inline-block align-text-top mx-3">
            <h4 class="fw-bold text-light w-100 text-wrap" style="font-size: 30px">Welcome to Student Medical Record</h4>
          </a>
        </div>
      </nav>
   
   <main>
      <form action="./set-new-password.php" method="POST" class="set-pass">

         <div class="form-input">

             <label for="email"> Email </label>

            <input type="text" name="email" id="email" value="<?=$email?>" readonly>

         </div>

         <div class="form-input">
            
            <label for="new-pass"> New Password </label>

            <input type="password" name="newPass" id="new-pass">

         </div>

         <div class="form-input">
            
            <label for="confirm-pass"> Confirm Password <span style="color: var(--decline)"> <?=$err?> </span> </label>

            <input type="password" name="confirmPass" id="confirm-pass">

         </div>

         <div class="form-checkbox">
            
            <label for="show-pass"> Show password </label>

            <input type="checkbox" name="" id="show-pass">

         </div>


         <div class="form-button">
            <input type="submit" value="Set Password" name="set-pass-btn">
         </div>

      </form>
   </main>
</body>
<script>
   const showPassword = document.getElementById('show-pass');
   
   const newPass = document.getElementById('new-pass');
   const confirmPass = document.getElementById('confirm-pass');
   
   
   showPassword.addEventListener('change', (e) => {
   
      // console.log(showPassword.checked);
   
      if(showPassword.checked === true) {
   
       
         newPass.type = 'text';
         confirmPass.type = 'text';
      } else {
         
         newPass.type = 'password';
         confirmPass.type = 'password';
      }
   
   });

</script>
</html>