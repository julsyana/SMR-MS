<?php

   include "../../includes/db_con.php";
   include "../../functions/student_function.php";

   if(isset($_POST['stud_id']) && $_POST['ref_no']){

      $stud_id = $_POST['stud_id'];
      $ref_no = $_POST['ref_no'];
      $status = "cancelled";

      $isSet = setAppointmentStatus($conn, $stud_id, $ref_no, $status);

      ?>
      <script>
         window.location.href = "../pages/appointment-list.php";
      </script>
      <?php 

   }

   
?>