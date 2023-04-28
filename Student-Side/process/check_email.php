<?php 

   include "../redo/includes/db_con.php";
   include "../redo/functions/otp_send.php";
   include "../redo/functions/student_function.php";

   if(isset($_POST['reg-btn'])){

      $email = $_POST['email'];

      // check if email is existed in mis.student_info
      $ifExisted = "SELECT * FROM `mis.student_info` WHERE `email` = '$email'";

      $result = mysqli_query($conn, $ifExisted);

      if(mysqli_num_rows($result) === 1 ) {     // condition if email existed

         // check if email is existed in student_account

         $ifExistedinClinic = "SELECT * FROM `student_account` WHERE `email` = '$email'";

         $clinic_result = mysqli_query($conn, $ifExistedinClinic);

         if(mysqli_num_rows($clinic_result) === 0) {

            $stud_exist = mysqli_fetch_assoc($result);

            $stud_id = $stud_exist['student_id'];
   
            $otp = generateOTP(6);
   
            // Insert student's account
            $insert_student = insertStudentAcc($conn, $stud_id, $email, $otp);

            
   
            if(!$insert_student){
   
               echo mysqli_error($conn);
   
            } else {
               session_start();

               $_SESSION['otp_stud_id'] = $stud_id;
               $_SESSION['otp_email'] = $email;

               sendOTP($email, $otp);
               header("location: ../redo/verify_otp.php");
            }
   
   
            // echo "exist";

         } else {

         echo '<script>';
         echo "alert('This email is already registered');";
         echo 'window.location.href = "../redo/register.php";';
         echo '</script>';

         } 

      } else {

         echo '<script>';
         echo "alert('$email');";
         echo 'window.location.href = "../redo/register.php";';
         echo '</script>';
      }

   }

?>