<?php
   include "./connection.php";
   include "./function.php";
   include "./date.php";

   $stud_id = $_POST['stud_id'];
   $role = 'student';

   $archive = archive($conn, $stud_id, $role, $date_today, $time_today);

     if(!$archive){
      echo mysqli_error($conn);
   }
   else{
      include "./archive_tbl.php"; ?>

      <script> 

         $('.numerical').load('./total.php');
         
      </script>
   
   <?php }
?>
