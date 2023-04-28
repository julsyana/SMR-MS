<?php

   include "../includes/db_conn.php";
   include "../functions/admin.php";
   include "../functions/function.php";
   include "../functions/sendemail.php";

   $year = Date("y");

   $randomNum = generateID(6);

   $admin_id = $year."-".$randomNum;
   $admin_fname = $_POST['admin_fname'];
   $admin_lname = $_POST['admin_lname'];
   $admin_cNum = $_POST['admin_cNum'];
   $admin_email = $_POST['admin_email'];
   // $admin_pass = $_POST['admin_pass'];

   $admin_pass = generatePassword(16);

   $file_name = $_FILES['admin_profile']['name'];
   $file_tmp_name = $_FILES['admin_profile']['tmp_name'];
   $file_tmp_error = $_FILES['admin_profile']['error'];

   
  
  

   $insertAdminQry = insertAdmin($conn, $admin_id, $admin_email, $admin_pass, $admin_fname, $admin_lname, $file_name, $admin_cNum);

   if($insertAdminQry){

      $path = "../assets";

      moveImg($path, $file_name, $file_tmp_name, $file_tmp_error); 

      $subject = "Generated Password";
      $title = "noreply@gmail.com";

      $mess = "<h2> Good day Ms/Mr $admin_fname $admin_lname </h2>";

      $mess .= "This is your temporary password ".$admin_pass;

      sendEmail($admin_email, $subject, $mess, $title);
      
      ?>

      <div class="message-success">
         <h2> Admin Added Successful </h2>

         <div class="icon">
            <i class="fas fa-check-circle    "></i>
         </div>
      </div>


      <?php

   } else { 

      ?> 

      <div class="message-success">
         <h2> Admin Added Failed </h2>

         <div class="icon">
            <i class="fas fa-times-circle" style="color: var(--alertBgButton)"></i>
         </div>
      </div>

      <?php 
   }
   


?>





