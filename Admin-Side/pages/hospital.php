<?php
   include "../includes/function-header.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title> SMRMS | ADMIN | Hospital </title>
   <?php include "../includes/head.php"; ?>

   <!-- custom css -->
   <link rel="stylesheet" href="../css/hospital.css">
   
   
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
               <a href="./department.php" >
                  <i class="fas fa-building    "></i> Departments
               </a>
            </li>

            <li>
               <a href="./nurses.php">
                  <i class="fas fa-user-shield    "></i> Nurses
               </a>
            </li>

            <li>
               <a href="./hospital.php" class="isSelected">
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

         <div class="hospital-container">

            <div class="content-header">
               <h3> Hospitals </h3>
            </div>

            <div class="filter">

               <div class="search search-hospital">
                  <input type="search" name="search" id="search_hospital" placeholder="Search Hospital">
               </div>


               <button class="add-hospital">
                  <i class="fas fa-plus    "></i>
                  <p> Add Hospital </p>
               </button>
            </div>


            <div class="hospital-list-container">
               <table class="hospital-list" border="0">
                  <thead>
                     <tr>
                        <th width="10%" style="text-align:center"> Hospital ID </th>
                        <th> Hospital Name </th>
                        <th width="30%"> Address </th>
                        <th> Email </th>
                        <th width="15%"> Contact </th>
                        <th width="8%" style="text-align:center"> Action </th>
                     </tr>
                  </thead>

                  <tbody>

                  <?php 
                  
                     if(mysqli_num_rows($hospital_res) > 0) {

                        while($hospital_row = mysqli_fetch_assoc($hospital_res)){

                           ?>

                           <tr>
                              <td  style="text-align:center"> <?=$hospital_row['hospi_id']?>	</td>
                              <td> <?=$hospital_row['hospital']?> </td>
                              <td style="font-size: .9em;"> <?=$hospital_row['hospital_add']?> </td>
                              <td> 
                                 <div class="email">

                                    <?=$hospital_row['email']?>

                                 </div>
                              </td>
                              <td> <?=$hospital_row['contact_num']?> </td>
                              <td> 
                                 <div class="action-button">

                                    <button id="hospital-edit" data-role="hospital-edit" data-hos_id="<?=$hospital_row['hospi_id']?>">

                                       <i class="fas fa-edit"></i>

                                    </button>

                                    <button id="hospital-del" data-role="hospital-del" data-hos_id="<?=$hospital_row['hospi_id']?>" data-name="<?=$hospital_row['hospital']?>">

                                       <i class="fas fa-trash-alt"></i>

                                    </button>

                                 </div>
                              </td>
                              
                           </tr>


                           <?php

                        }

                     } else {

                        ?>

                           <tr>
                              <td  style="text-align:center" colspan="6"> No data </td>
                           
                              
                           </tr>


                           <?php

                        

                     }
                  ?>
                     
                  </tbody>
               </table>
            </div>

            <!-- modal -->
            <div class="hospital-modal-container" id="hospital-modal-container">
   
            </div>


            <!-- message modal -->
            <div class="hospital-message-modal" id="hospital-message-modal">
         
            </div>
            


            
         </div>

      </div>

   </main>
   
</body>
<!-- ajax -->
<script src="../ajax/hospital.js"> </script>

<!-- sort/search -->
<script src="../ajax/sort-search_hospital.js"></script>

<!-- custom script -->
</html>