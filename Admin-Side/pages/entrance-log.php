<?php

   include "../includes/function-header.php";

?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title> SMRMS | ADMIN | Entrance Log </title>
   <?php include "../includes/head.php"; ?>

   <!-- custom css -->
   <link rel="stylesheet" href="../css/admin.css">
   <link rel="stylesheet" href="../css/entrancelog.css">
   
   
</head>
<body>

   <nav class="side-panel">

      <div class="nav-header">
         <div class="img-logo">
            <div class="img-handler">

               <img src="../assets/QCUClinicLogo.png" alt="QCUClinicLogo.png">
            </div>
         </div>

         <div class="title-logo">
            <p> Student Medical Record </p>
         </div>
      </div>

      <div class="primary-nav">
         <ul>
            <li>
               <a href="./dashboard.php" >
                  <i class="fas fa-chart-area fas-line"></i> Dashboard
               </a>
            </li>

            <li>
               <a href="./admin.php" >
                  <i class="fas fa-users-cog"></i> Admins
               </a>
            </li>

            <li>
               <a href="./department.php">
                  <i class="fas fa-building    "></i> Departments
               </a>
            </li>

            <li>
               <a href="./nurses.php">
                  <i class="fas fa-user-shield    "></i> Nurses
               </a>
            </li>

            <li>
               <a href="./hospital.php">
                  <i class="fas fa-hospital    "></i> Hospital
               </a>
            </li>

            <li>
               <a href="./medicine.php">
                  <i class="fas fa-medkit    "></i> Medicines
               </a>
            </li>

            <li>
               <a href="./appointment.php">
                  <i class="fas fa-calendar-check    "></i> Appointments
               </a>
            </li>

            <li>
               <a href="./reports.php">
                  <i class="fas fa-folder-open    "></i> Reports
               </a>
            </li>

            <li>
               <a href="./archive.php">
                  <i class="fas fa-archive    "></i> Archive
               </a>
            </li>

            <li>
               <a href="./entrance-log.php" class="isSelected">
                  <i class="fas fa-address-book    "></i> Entrance Log
               </a>
            </li>
         </ul>
      </div>
   </nav>

   <main>

      <?php include "../includes/main-header.php" ?>

      <div class="main-content">

         <div class="dept-container admin-container">

            <div class="content-header">
               <h3>  entrance log </h3>
            </div>

             <div class="form-button">

              <button id="cleared-btn" class="selected students"><b> Cleared </b></button>

              <button id="pending-btn"><b> PUI </b></button>

              <button id="visitor-btn"><b> Visitors </b></button>

              <button id="archive-btn"><b> Archive </b></button>

            </div>

            <div class="admin-list-container">
               <table border="0">
                  <thead>
                     <tr>
                        <th> Student No. </th>
                        <!-- <th> Fullname </th> -->
                        <th> Date </th>
                        <th> Time in </th>
                        
                     </tr>
                  </thead>

                  <tbody>
                     <?php 
                        if(mysqli_num_rows($entrance_log) > 0){
                           while($rows = mysqli_fetch_assoc($entrance_log)){

                                 $logdate = $rows['logdate'];
                                 $logdate = new DateTime($logdate);
                                 $logdate = $logdate->format("F d, Y");

                                 $timein = $rows['timein'];
                                 $timein = new DateTime($timein);
                                 $timein = $timein->format("h:s A");
                              ?>
                              <tr>
                                 <td> <?=$rows['student_number']?> </td>
                                 <!-- <td> Mark Melvin E. Bacabis </td> -->
                                 <td>  <?=$logdate?> </td>
                                 <td>  <?=$timein?></td>
                              </tr>
                              
                              <?php
                           }

                        } else {

                            ?>
                              <tr>
                                 <td colspan="4"> No entrance log </td>
                                
                              </tr>
                              
                              <?php

                        }
                     ?>
                        
                    
                  </tbody>
               </table>

            </div>


            
         </div>

      </div>

   </main>
   
</body>

<script>
  
  $(document).ready(function(){
    
    $('#cleared-btn').click(function(){
  
   $('#all-btn').css('background', '#ffffff');
   $('#all-btn').css('color', 'black');
   $('#cleared-btn').css('background', '#7696ff');
   $('#pending-btn').css('background', '#ffffff');
   $('#visitor-btn').css('background', '#ffffff');
   $('#archive-btn').css('background', '#ffffff');
  
      $('.admin-list-container').load('ent-cleared.php');
        
    });

    $('#pending-btn').click(function(){
  
   $('#all-btn').css('background', '#ffffff');
   $('#all-btn').css('color', 'black');
   $('#cleared-btn').css('background', '#ffffff');
   $('#pending-btn').css('background', '#7696ff');
   $('#visitor-btn').css('background', '#ffffff');
   $('#archive-btn').css('background', '#ffffff');
  
      $('.admin-list-container').load('ent-pui.php');
        
    });

    $('#visitor-btn').click(function(){
  
   $('#all-btn').css('background', '#ffffff');
   $('#all-btn').css('color', 'black');
   $('#cleared-btn').css('background', '#ffffff');
   $('#pending-btn').css('background', '#ffffff');
   $('#visitor-btn').css('background', '#7696ff');
   $('#archive-btn').css('background', '#ffffff');
  
      $('.admin-list-container').load('ent-visitor.php');
        
    });

    $('#archive-btn').click(function(){
  
   $('#all-btn').css('background', '#ffffff');
   $('#all-btn').css('color', 'black');
   $('#cleared-btn').css('background', '#ffffff');
   $('#pending-btn').css('background', '#ffffff');
   $('#visitor-btn').css('background', '#ffffff');
   $('#archive-btn').css('background', '#7696ff');
  
      $('.admin-list-container').load('ent-archive.php');
        
    });    
   });
</script>
</html>