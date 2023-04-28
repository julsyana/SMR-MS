<?php

   session_start();

   unset($_SESSION['student_id']);

   header("location: ../redo/student-login.php");

?>