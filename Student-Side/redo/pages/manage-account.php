<?php
   include "../includes/header_process.php";
   error_reporting(0);
   $errMess = $_SESSION['err'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="icon" type="image/png" href="../../assets/favcon.png"/> <!-- Icon -->
   <link rel="stylesheet" href="../css/style.css">
   <link rel="stylesheet" href="../css/manage_acc.css">
   <title> SMRMS | STUDENT | Manage Account (<?=$stud_logged['student_id']?>) </title>

   <!-- Font awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

   <!-- AJAX -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
</head>
<body>

   

   <div class="side-panel">

      <?php include "../includes/profile_nav.php" ?>
        
      <nav class="nav primary-nav">
         
         <div class="sub-header">
         
            <p> Main </p>
         
         </div>
         
         <ul>
            <li> 
               <a href="./dashboard.php"> Dashboard </a>
            </li>
            
            <li> 
               <a href="./personal-information.php"> Personal Information </a>
            </li>
         
            <li> 
               <a href="./medical-requirements.php"> Medical Requirements</a>
            </li>
         
            <li> 
               <a href="./medical-history.php"> Medical History </a>
            </li>

            <li> 
               <a href="./health-history.php"> Health History  </a>
            </li>
         
         
            <li> 
               <a href="./appointment-list.php"> Appointment </a>
            </li>

             <li> 
               <a href="./entrancelog.php"> Entrace Log </a>
            </li>
         </ul>
        
      </nav>
        
      <nav class="nav secondary-nav">
        
         <div class="sub-header">
         
            <p> Settings </p>
         
         </div>
        
         <ul>
            <li class="selected"> 
               <a href="./manage-account.php"> Manage Account </a>
            </li>
         
            <li> 
               <a href="../../process/logout.php"> Logout </a>
            </li>
         </ul>
        
      </nav>
        
   </div>

   <main>

      <header>

         <div class="logo">
            <img src="../../assets/favcon.png" alt="">
         </div>

         <div class="title">
            <h1>Student Medical Record</h1>
         </div>

      </header>

      <div class="container">
         
         <div class="manage-account">

            

            <form action="../../process/change_pass.php" method="POST">

              
               <div class="form-image">

                  <div class="image-handler">

                     <img src="../../assets/<?=$stud_logged['id_image']?>" alt="">

                     <!-- <div class="img-overlay"></div> -->

                  </div>

                  <!-- <label for="change-image">
                     <i class="fa fa-camera" aria-hidden="true"></i>
                  </label>

                  <input type="file" name="changeImage" accept="image/*" id="change-image" hidden> -->

               </div>


               <div class="form-input">
                  <label for="email"> School Email Address </label>
                  <input type="email" name="email" value="<?=$stud_logged['email']?>" id="email" readonly>
               </div>

               <div class="form-input">
                  <label for="old-pass"> Old Password <span style="color: var(--decline);">*</span> <span class="oldPass-mess" style="color: var(--decline); font-weight: 400; font-size: .9em;"></span> </label>
                  <input type="password" name="oldPass" id="old-pass" required>
               </div>

               <div class="form-input">
                  <label for="new-pass"> New Password <span style="color: var(--decline);">*</span> <span class="newPass-mess" style="color: var(--decline); font-weight: 400; font-size: .9em;"></span></label>
                  <input type="password" name="newPass" id="new-pass" required>
               </div>

               <div class="form-input">

                  <label for="confirm-pass"> Confirm Password <span style="color: var(--decline);">*</span> <span class="confirmPass-mess" style="color: var(--decline); font-weight: 400; font-size: .9em;"></span> </label>

                  <input type="password" name="confirmPass" id="confirm-pass" required>
                  
               </div>

               <div class="form-checkbox">

                  <label for="show-pass"> Show password </label>

                  <input type="checkbox" name="" id="show-pass">

               </div>


               <div class="form-button">

                  <div class="validation-message">

                     <?=$errMess?>

                  </div>

                  <input type="submit" value="Save Changes" id="change-pass-btn" name="changePass-btn">

               </div>
            </form>
         </div>
      </div>

   </main>

</body>

<script>

   $(document).ready(function() {

      $('.validation-message span').fadeOut(8000);


      $('#old-pass').keyup(function(){

         let oldPass = $('#old-pass').val();

         $('.oldPass-mess').load('../ajax/process/password_validation.php', {

            oldPass: oldPass,

         });

      });

      $('#new-pass').keyup(function(){

         let newPass = $('#new-pass').val();
         let oldPass = $('#old-pass').val();

         $('.newPass-mess').load('../ajax/process/password_validation.php', {
            newPass: newPass,
            old_pass: oldPass,
         });

      });

      $('#confirm-pass').keyup(function(){

         let newPass = $('#new-pass').val();
         let confirmPass = $('#confirm-pass').val();

         $('.confirmPass-mess').load('../ajax/process/password_validation.php', {
            newPass: newPass,
            confirmPass: confirmPass,
         });

      });


   });

   const showPassword = document.getElementById('show-pass');

   const oldPass = document.getElementById('old-pass');
   const newPass = document.getElementById('new-pass');
   const confirmPass = document.getElementById('confirm-pass');

   showPassword.addEventListener('change', (e) => {

      if(showPassword.checked === true) {

         oldPass.type = 'text';
         newPass.type = 'text';
         confirmPass.type = 'text';
      } else {
         oldPass.type = 'password';
         newPass.type = 'password';
         confirmPass.type = 'password';
      }

   });

</script>

<?php 

   unset($_SESSION['err']);
?>
</html>