<?php

   include "../includes/db_conn.php";
   include "../functions/nurse.php";
   include "../functions/function.php";
   include "../functions/sendemail.php";

   $year = Date("y");
   $randomNum = generateID(4);

   $empID = $year."-".$randomNum;
   $username = "SN".$year.$randomNum;
   $password = generatePassword(15);

   $email = $_POST['nurse_email'];
   $position = $_POST['nurse_position'];
   $campus = $_POST['nurse_campus'];

   $sched = $_POST['sched'];

   // $file_name = $_FILES['nurse_profile']['name'];
   // $file_tmp_name = $_FILES['nurse_profile']['tmp_name'];
   // $file_tmp_error = $_FILES['nurse_profile']['error'];

   $nurseProfile = "nurse_profile.jpg";

   try {

      $addNurse = insertNurse($conn, $empID, $username, $password, $nurseProfile, $position, $campus, $email);

      if($addNurse) {

         foreach ($sched as $key => $day) {

            insertNurseSched($conn, $empID, $day);

         }

         $subject = "Your nurse account";
         $title = "no-reply@@gmail.com";
         $mess = "<h3> Good day, Mr/Ms. $email </h3>";
         $mess .= "<p> this is your account: </p>";
         $mess .= "<p> username: $username </p>";
         $mess .= "<p> password: $password </p> <br> <br> <br>";

         sendEmail($email, $subject, $mess, $title);

         // $path = "../assets";
         // moveImg($path, $file_name, $file_tmp_name, $file_tmp_error);

         ?>

         <div class="message-success">
            <h2> Nurse Added Successful </h2>

            <div class="icon">
               <i class="fas fa-check-circle"></i>
            </div>
         </div>
     
         <?php 

      } else {

         ?>
         
         <div class="message-success">
            <h2> Nurse Added Failed </h2>

            <p> <?=mysqli_error($conn)?></p>

            <div class="icon">
               <i class="fas fa-times-circle" style="color: var(--alertBgButton);"></i>
            </div>
         </div>
     
         
         
         <?php
      }

   } catch (\Throwable $th) {

      ?>
         
      <div class="message-success">

         <h2> Query Failed </h2>

         <p> <?=mysqli_error($conn)?></p>

         <div class="icon">
            <i class="fas fa-times-circle" style="color: var(--alertBgButton);"></i>
         </div>
         
      </div>
      
      <?php

   }

   

  



  


?>



     
     

