<?php

   error_reporting(0);
   include "../../includes/db_con.php";

   if(isset($_POST['oldPass'])) {

      $oldPass = $_POST['oldPass'];

      if(strlen($oldPass) >= 8){

         $sel = "SELECT * FROM `student_account` a
         JOIN `mis.student_info` b 
         ON a.student_id = b.student_id
         WHERE a.`password` = '$oldPass';";
   
         $res = mysqli_query($conn, $sel);
   
         if(mysqli_num_rows($res) === 1) {
   
            $fetch = mysqli_fetch_assoc($res);
   
            echo "<span style='color: var(--approve)'> Password match </span>";
   
         } else {

            echo "Password didn't match";
         }

      }

   }

   if(isset($_POST['newPass']) && isset($_POST['old_pass'])){

      $newPass = $_POST['newPass'];
      $oldPass = $_POST['old_pass'];

      $newPassLen = strlen($newPass);

      if($newPassLen >= 8){

         if($newPass === $oldPass){

            echo "Old password and new password must not be same!";
         } else {
            echo "<span style='color: var(--approve)'> Goods </span>";
         }

      } else {

         echo "password must be 8 character lenght!";

      }

   }

   if(isset($_POST['confirmPass'])){

      $confirmPass = $_POST['confirmPass'];
      $newPass = $_POST['newPass'];

      if(strlen($confirmPass) >= 8) {

         if($confirmPass !== $newPass){

            echo "Confirm password and new password didn't match";
   
         } else {
   
            echo "<span style='color: var(--approve)'> Goods na </span>";
         }

      }

      

   }


   



?>