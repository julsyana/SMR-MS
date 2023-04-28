<?php
   
   include "../redo/includes/db_con.php";
   include "../redo/functions/otp_send.php";
   include "../redo/functions/student_function.php";

   session_start();

   $stud_id = $_SESSION['otp_stud_id'];

   if(isset($_POST['send-otp-btn'])){

      $otp = $_POST['otp'];
      
      $sel = "SELECT * FROM `student_account` WHERE `student_id` = '$stud_id'";

      $res = mysqli_query($conn, $sel);

      $check = mysqli_fetch_assoc($res);

      if($check['otp'] === $otp){

         $_SESSION['pass-stud_id'] = $check['student_id'];
         $_SESSION['pass-email'] = $check['email'];

         header("location: ../redo/set-new-password.php");

      }

   }

?>