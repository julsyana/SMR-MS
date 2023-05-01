<?php
   // start session
   session_start();

   // connection
   include "../redo/includes/db_con.php";


   if(isset($_POST['submit_btn'])){

      $email = $_POST['email'];
       
      $password = $_POST['password'];


      $sel_stud = "SELECT * FROM `student_account` WHERE `email` = '$email' AND `password` = '$password'";

      $res_stud = mysqli_query($conn, $sel_stud);

      if(mysqli_num_rows($res_stud) === 1) {          //if exist in student_account
         

         $stud = mysqli_fetch_assoc($res_stud);

         $_SESSION['student_id'] = $stud['student_id'];

         if($stud['isVerified'] == 0) {

            $_SESSION['is_verified'] = $stud['isVerified'];
            header("location: ../redo/survey-form.php");

         } else {

            $_SESSION['is_verified'] = $stud['isVerified'];
            header("location: ../redo/pages/dashboard.php");

         }

         

         
        
         


      } else {
      echo '<script>';
      echo "alert('Wrong Email and Password!');";
      echo 'window.location.href = "../redo/student-login.php";';
      echo '</script>';

      }
   }

?>