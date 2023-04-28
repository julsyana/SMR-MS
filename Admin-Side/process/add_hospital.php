<?php
   include "../includes/db_conn.php";
   include "../functions/hospital.php";
   include "../functions/function.php";
   
   $hospital_name = $_POST['hospital_name']; 
   $hospital_addr = $_POST['hospital_addr'];
   $hospital_email = $_POST['hospital_email'];
   $hospital_num = $_POST['hospital_num'];
   $hospital_id = "A10-".generateID(4);


   try {

      $hospital = insertHospital($conn, $hospital_id, $hospital_name, $hospital_addr, $hospital_email, $hospital_num);

      if($hospital){

         ?>

         <div class="message-success">
            <h2> Hospital Added Successful </h2>

            <div class="icon">
               <i class="fas fa-check-circle    "></i>
            </div>
         </div>

         <script>
            window.location.href = "../pages/hospital.php";
         </script>

         <?php

      }

   } catch (\Throwable $th) {

      ?>

      <div class="message-success">
         <h2> Query Failed </h2>

         <p> <?=mysqli_error($conn)?> </p>

         <div class="icon">
            <i class="fas fa-times-circle" style="color: var(--alertBgButton)"></i>
         </div>
      </div>

      <?php 

   }

?>

