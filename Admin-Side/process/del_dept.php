<?php

   error_reporting(0);
   include "../includes/db_conn.php";
   include "../includes/date.php";
   include "../functions/function.php";

   $emp_id = $_POST['emp_id'];

   $res = Archive($conn, $emp_id, "departments", $date_today);

   if($res){ ?>

      <div class="message-success">
         <h2> Successfully Removed </h2>

         <div class="icon">
            <i class="fas fa-check-circle"></i>
         </div>
      </div>

      <script>
         window.location.href = "../pages/department.php";
      </script>

   <?php } else { ?> 
   
      <div class="message-success">
         <h2> Query Failed </h2>

         <p> <?=mysqli_error($conn)?> </p>

         <div class="icon">
            <i class="fas fa-times-circle" style="color: red;"></i>
         </div>

         <script>
            window.location.href = "../pages/department.php";
         </script>
      </div>
   
   <?php }


?>