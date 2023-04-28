<?php

   include "../redo/includes/db_con.php";
   include "../redo/functions/student_function.php";

   session_start();


   if(isset($_POST['changePass-btn'])) {

      $stud_id = $_SESSION['student_id'];

      $oldPass = $_POST['oldPass'];
      $newPass = $_POST['newPass'];
      $confirmPass = $_POST['confirmPass'];

      $sel = "SELECT * FROM `student_account` a 
      JOIN `mis.student_info` b
      ON a.student_id = b.student_id
      WHERE a.`password` = '$oldPass';";

      $res = mysqli_query($conn, $sel);

      $_SESSION['err'] = "";
   
      if(mysqli_num_rows($res) === 1) {

         if(strlen($newPass) >= 8) {

            if($newPass !== $oldPass) {

               if($confirmPass === $newPass){

                  if(setNewPassword($conn, $stud_id, $newPass)){

                     $_SESSION['err'] = "<span style='background-color: var(--approve)'> Change password successfully </span>";
                     header("location: ../redo/pages/manage-account.php");

                  } else {

                     echo mysqli_error($conn);
                     
                  }
                 

               } else {

                  $_SESSION['err'] = "<span style='background-color: var(--decline)'> New pass and confirm pass must be the same! </span>";
                  header("location: ../redo/pages/manage-account.php");
               }


            } else {

               $_SESSION['err'] = "<span style='background-color: var(--decline)'> Old pass and new pass must not be the same! </span>";
               header("location: ../redo/pages/manage-account.php");
            }

         } else {

            $_SESSION['err'] = "<span style='background-color: var(--decline)'> Password must exceed 8 characters </span>";
            header("location: ../redo/pages/manage-account.php");
         }
   
      } else {
   
         $_SESSION['err'] = "<span style='background-color: var(--decline)'> Password didn't match </span>";
         header("location: ../redo/pages/manage-account.php");
      }
   
   
   }

?>