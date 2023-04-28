<?php
   include "./connection.php";
   include "./function.php";
   include "./date.php";

   $stud_id = $_POST['stud_id'];

   $pend = pending($conn, $stud_id);

   $entrance = entrance_log($conn, $stud_id, $time_today, $date_today);

   if(!$pend || !$entrance){
      echo mysqli_error($conn);
   }
   else{
      include "./entrance_log.php"; ?>

      <script> 

         $('.numerical').load('./total.php');
         
      </script>
   
   <?php }
?>