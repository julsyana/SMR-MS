<?php
   include "../includes/db_conn.php";
   include "../functions/function.php";
   include "../functions/dept.php";
   
   $year = Date("y");
   $rand = generateID(4);

   $emp_id = $year."-".$rand;
   $dept_position = $_POST['dept_position'];
   $dept = $_POST['dept'];
   $dept_building = $_POST['dept_building'];
   $dept_room = $_POST['dept_room'];
   // $dept_fname = $_POST['dept_fname'];
   $course_program = $_POST['course_program'];
   $dept_email = $_POST['dept_email'];
   // $dept_cnum = $_POST['dept_cnum'];


   $deptImg_name = $_FILES['dept_profile']['name'];
   $deptImg_tmpName = $_FILES['dept_profile']['tmp_name'];
   $deptImg_error = $_FILES['dept_profile']['error'];


   $deptInsert = insertDept($conn, $emp_id, $dept, $dept_building, $dept_room, $deptImg_name, $course_program, $dept_email, $dept_position);

   if($deptInsert){

      $path = "../assets";

      moveImg($path, $deptImg_name, $deptImg_tmpName, $deptImg_error); 

      ?>

      <div class="message-success">
         <h2> Department Added Successful </h2>

         <div class="icon">
            <i class="fas fa-check-circle    "></i>
         </div>
      </div>

      <?php 
      
   } else {

      ?>

      <div class="message-success">
         <h2> Department Added Failed </h2>

         <div class="icon">
            <i class="fas fa-times-circle" style="color: var(--alertBgButton)"></i>
         </div>
      </div>

      <?php 

   }


?>

