<?php
   include "../includes/db_conn.php";
   include "../functions/dept.php";
   include "../functions/function.php";
   
   $emp_id = $_POST['dept_id'];
   $dept_building = $_POST['dept_building'];
   $dept_room = $_POST['dept_room'];
   $dept_fname = $_POST['dept_fname'];
   $dept_lname = $_POST['dept_lname'];
   $dept_email = $_POST['dept_email'];
   $dept_cnum = $_POST['dept_cnum'];


   try {


      if(!empty($_FILES['dept_profile']['name'])){

         $deptImg_name = $_FILES['dept_profile']['name'];
         $deptImg_tmpName = $_FILES['dept_profile']['tmp_name'];
         $deptImg_error = $_FILES['dept_profile']['error'];

         $updDept = updateDept($conn, $emp_id, $dept_building, $dept_room, $deptImg_name, $dept_fname, $dept_lname, $dept_email, $dept_cnum);

         if($updDept) {

            $path = "../assets";
            moveImg($path, $deptImg_name, $deptImg_tmpName, $deptImg_error);
   
            ?>
      
            <div class="message-success">
               <h2> Department Edit Successful </h2>
      
               <div class="icon">
                  <i class="fas fa-check-circle    "></i>
               </div>
            </div>
      
            <?php 
            
         } else {
      
            ?>
      
            <div class="message-success">
               <h2> Department Edit Failed </h2>
      
               <p> <?=mysqli_error($conn)?> </p>
      
               <div class="icon">
                  <i class="fas fa-times-circle" style="color: var(--alertBgButton)"></i>
               </div>
            </div>
      
            <?php 
      
         }
         

      } else {

         $deptImg_name = null;

         $updDept = updateDept($conn, $emp_id, $dept_building, $dept_room, $deptImg_name, $dept_fname, $dept_lname, $dept_email, $dept_cnum);

         if($updDept) {
   
            ?>
      
            <div class="message-success">
               <h2> Department Edit Successful </h2>
      
               <div class="icon">
                  <i class="fas fa-check-circle    "></i>
               </div>
            </div>
      
            <?php 
            
         } else {
      
            ?>
      
            <div class="message-success">
               <h2> Department Edit Failed </h2>
      
               <p> <?=mysqli_error($conn)?> </p>
      
               <div class="icon">
                  <i class="fas fa-times-circle" style="color: var(--alertBgButton)"></i>
               </div>
            </div>
      
            <?php 
      
         }

      }
   

      
   

   } catch (\Throwable $th) {

      ?>
   
         <div class="message-success">
            <h2> Department Edit Failed </h2>
   
            <p> <?=mysqli_error($conn)?> </p>
   
            <div class="icon">
               <i class="fas fa-times-circle" style="color: var(--alertBgButton)"></i>
            </div>
         </div>
   
         <?php 

   }

  
?>