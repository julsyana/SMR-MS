<?php
   include "../includes/function-header.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title> SMRMS | ADMIN | Dashboard </title>
   <?php include "../includes/head.php"; ?>

   <!-- custom css -->
   <link rel="stylesheet" href="../css/department.css">
   
   
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
               <a href="./department.php" class="isSelected">
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
               <a href="./entrance-log.php">
                  <i class="fas fa-address-book    "></i> Entrance Log
               </a>
            </li>
         </ul>
      </div>
   </nav>

   <main>

      <?php include "../includes/main-header.php" ?>

      <div class="main-content">

         <div class="dept-container">

            <div class="content-header">
               <h3> Department List </h3>

               <button class="add-dept">
                  <i class="fas fa-building"></i>
                  <p> Add Department </p>
               </button>
            </div>

            <div class="dept-list-container">

               <div class="card_container">

                  <?php

                     if(mysqli_num_rows($dept_result) > 0) {

                        while($dept_rows = mysqli_fetch_assoc($dept_result)){
                           ?> 
                           
                           <div class="card">
                              <div class="card_header">

                                 <span class="department_name"> <?=$dept_rows['dept_name']?> Department </span>

                                 <div class="actions">

                                    <div class="action-button">
                                       <button id="dept-edit" data-role="edit-dept" data-dept_id="<?=$dept_rows['emp_id']?>">
                                          <i class="fas fa-edit"></i>
                                       </button>

                                       <button id="dept-del" data-role="del-dept" data-dept_id="<?=$dept_rows['emp_id']?>"
                                       data-dept_name="<?=$dept_rows['dept_name']?>">
                                          <i class="fas fa-trash-alt"></i>
                                       </button>
                                    </div> 
                                    
                                 </div>
                              </div>

                              <div class="room_info">

                                 <div>
                                    <span style="font-weight: bold;">Building Name: </span>
                                    <span> <?=$dept_rows['building_name']?> </span>
                                 </div>

                                 <div>
                                    <span style="font-weight: bold;">Room No.: </span>
                                    <span> <?=$dept_rows['room_num']?> </span>
                                 </div>

                              </div>

                              <div class="profile_img">
                                 
                                 <img src="../assets/<?=$dept_rows['image']?>" alt="" />
                              </div>

                              <div class="card_content">

                                 <div>
                                    <span class="name" style="font-weight: bold; text-transform:capitalize">
                                       <?=$dept_rows['firstname']?> <?=$dept_rows['lastname']?>
                                    </span>

                                    <span class="nurse">
                                       <!-- <?=$dept_rows['emp_id']?> -->
                                    </span>
                                 </div>

                                 <span class="nurse"> <?=$dept_rows['email']?> </span>

                                 <!-- <span class="nurse"> <?=$dept_rows['contact_num']?> </span> -->

                                 <!-- <div class="position">

                                    <span style="font-weight: bold;"> Position: </span>
                                    
                                    <span class="nurse" style="text-transform: capitalize;"> <?=$dept_rows['position']?> </span>
                                 </div> -->
                              </div>
                           </div>
                           
                           
                           <?php
                        }

                     }
                  
                  ?>
                  
                  

                  
               </div>
            </div>


             <!-- modal -->
            <div class="modal-dept-container" id="modal-dept-container">

            
            </div>

            <!-- message -->

            <div class="dept-message-modal" id="dept-message-modal">

            </div>

         </div>

        

      </div>


     

   </main>
   
</body>

<!-- ajax -->
<script src="../ajax/dept.js"></script>


<!-- custom script -->
</html>