<?php 
   include "../includes/db_conn.php";
   include "../functions/hospital.php";
   include "../functions/function.php";

   $hospi_id = $_POST['hospi_id'];
   $hospi_name = $_POST['hospi_name'];
   $hospi_address = $_POST['hospi_address'];
   $hospi_email = $_POST['hospi_email'];
   $hospi_cNum = $_POST['hospi_cNum'];


   try {

      $updHost = updateHospital($conn, $hospi_id, $hospi_name, $hospi_address, $hospi_email, $hospi_cNum);

      if($updHost){
         
         ?>

         <div class="message-success">
            <h2> Hospital Edit Successful </h2>

            <div class="icon">
               <i class="fas fa-check-circle    "></i>
            </div>
         </div>

         <?php 

      } else {

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


