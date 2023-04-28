<?php
   include "../includes/function-header.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title> SMRMS | ADMIN | Admin </title>
   <?php include "../includes/head.php"; ?>

   <!-- custom css -->
   <link rel="stylesheet" href="../css/admin.css">
   
   
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
               <a href="./admin.php" class="isSelected">
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

         <div class="admin-container">

            <div class="content-header">
               <h3> admin list </h3>

               <?php if($total_admins < 3) { ?>

                  <button class="add-admin" id="add-admin">
                     <i class="fas fa-user-plus    "></i>
                     <p> Add new Admin </p>
                  </button>

               <?php } else { ?>

                  <button class="add-admin" id="add-admin" disabled>
                     <i class="fas fa-user-plus    "></i>
                     <p> Add new Admin </p>
                  </button>

               <?php } ?>
            </div>


            <div class="admin-list-container">

               

               <table border="0">
                  <thead>
                     <tr>
                        <th> image </th>
                        <th> Admin ID </th>
                        <th> Firstname </th>
                        <th> Lastname </th>
                        <th> Email </th>
                        <th> Contact </th>
                        <th> Action </th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php if($total_admins > 0) { 
                        while($row = mysqli_fetch_assoc($admin_result)) { ?>

                        <tr>
                           <td>
                              <div class="admin-profile">
                                 <img src="../assets/<?=$row['img']?>" alt="">
                              </div>
                           </td>
                           <td> <?=$row['unique_id']?> </td>
                           <td> <?=$row['fname']?> </td>
                           <td> <?=$row['lname']?> </td>
                           <td> 
                              <div class="email"> <?=$row['email']?> </div>  
                           </td>

                           <td> <?=$row['contact_num']?> </td>
                           <td> 

                              <?php if($row['user_id'] == $id) { ?>

                                 <div class="action-button">
                                    <!-- <button id="admin-edit" data-role="edit-admin" data-admin_id="<?=$row['user_id']?>" disabled>
                                       <i class="fas fa-edit"></i>
                                    </button> -->

                                    <button id="admin-del" data-role="del-admin" data-admin_id="<?=$row['user_id']?>" disabled>
                                       <i class="fas fa-trash-alt"></i>
                                    </button>
                                 </div> 


                              <?php } else { ?>

                                 <div class="action-button">
                                    <!-- <button id="admin-edit" data-role="edit-admin" data-admin_id="<?=$row['user_id']?>">
                                       <i class="fas fa-edit"></i>
                                    </button> -->

                                    <button id="admin-del" data-role="del-admin" data-admin_id="<?=$row['user_id']?>">
                                       <i class="fas fa-trash-alt"></i>
                                    </button>
                                 </div> 
                              
                              
                              <?php } ?>
                                
                           </td>
                        </tr>

                        <?php }

                     } ?>
                    
                  </tbody>
               </table>

            </div>
         </div> 


         <!-- modal -->
         <div class="admin-modal-container" id="admin-modal-container">

         </div>

      </div>

      <!-- message modal -->
      <div class="admin-message-modal" id="admin-message-modal">
         
      </div>

          
   </main>
   
</body>
<!-- ajax -->
<script src="../ajax/admin.js"></script>

<!-- custom script -->
</html>