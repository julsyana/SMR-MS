<?php

   include "../includes/db_con.php";
   include "../functions/student_function.php";
   include "../functions/sendemail.php";

   // error_reporting(0);

   session_start(); 
   
   $stud_id = $_SESSION['student_id'];

   $stud_logged = selStudentAcc($conn, $stud_id);

   if($stud_logged['isVerified'] == 0) {

      header("location: ../survey-form.php");

   }

   if(empty($stud_id)){

      header("location: ../../student-login.php");

   }

  

   // Student's information 
   $stud_logged = fetchStudData($conn, $stud_id);

   // Student's medical requirements
   $res_stud_med_reqs = fetchStudMedReq($conn, $stud_id);

   // Student's Appointment 
   $res_stud_appointment = fetchAllStudAppointment($conn, $stud_id);

   // Student's medical history
   $res_stud_med_history = fetchStudMedHistory($conn, $stud_id);

   // Student's health history
   $res_stud_hh = selStudentsHealthHistory($conn, $stud_id);

   //Student's health status
   $res_stud_health_status = fetchStudHealthStatus($conn, $stud_id);

   // Student's Entrance log
   $sel_ent_log_stud = fetchentrancelog($conn, $stud_id);

   

?>