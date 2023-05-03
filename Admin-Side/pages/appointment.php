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
   <link rel="stylesheet" href="../css/appointment.css">

   <!-- for date picker -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
   <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

   
    
   
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
               <a href="./hospital.php">
                  <i class="fas fa-hospital    "></i> Hospital
               </a>
            </li>

            <li>
               <a href="./medicine.php" >
                  <i class="fas fa-medkit    "></i> Medicines
               </a>
            </li>

            <li>
               <a href="./appointment.php" class="isSelected">
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

         <div class="appointment-container">

            <div class="content-header">
               <!-- <select name="" id="">
                  <option value="Appointments"> Appointments </option>
                  <option value="Appointments"> Holiday/Suspension </option> -->
                  <h3> SERVICES LIST </h3>
               </select>


               <div class="form-button">
                  <!-- <button class="add-admin">
                     <i class="fas fa-tree    "></i>
                     <p> Add Holiday/Suspension </p>
                  </button> -->

                  <button class="add-appointment">
                     <i class="fas fa-calendar-plus"></i>
                     <p> Add New Services </p>
                  </button>

               </div>
              
            </div>


            <div class="appointment-list-container">

               <!-- <table>
                   <thead>
                     <tr> 
                        <th width="10%"> ID No. </th>
                        <th width="20%"> Type of appointment </th>
                       
                        <th width="10%"> Date Created	</th>
                        <th width="5%" style="text-align:center"> Action </th>
                     </tr>
                  </thead>
               </table> -->

               <table border="0"> 

                  <thead>
                     <tr> 
                        <th> Date Created	</th>
                        <th> Service ID </th>
                        <th> Type of Appointment </th>
                        <th> Date Scheduled </th>
                        <!-- <th width="10%"> Status </th> -->
                        <th style="text-align:center"> Action </th>
                     </tr>
                  </thead>
                 

                  <tbody>
                     <?php 
                        if(mysqli_num_rows($app_res) > 0) {

                           while($row = mysqli_fetch_assoc($app_res)){ 
                              
                              $date = $row['date_filed'];
                              $date = new DateTime($date);
                              $date = $date->format("F d, Y h:i A");

                              
                           ?>

<tr>
                              <td> <?=$date?> </td>
                              <td> <?=$row['app_id']?> </td>
                              <td> <?=$row['app_type']?> Services	 </td>
                              <td class="sched"> 
                                 <?php 

                                    $sel = selAppSched($conn, $row['app_id']);

                                    if(mysqli_num_rows($sel) > 0) {

                                       while($rowSched = mysqli_fetch_assoc($sel)){

                                          $dateSched = $rowSched['app_dates'];
                                          $dateSched = new DateTime($dateSched);
                                          $dateSched = $dateSched->format("m/d");

                                          ?>

                                             <div class="sched-date">
                                                <?=$dateSched?>
                                             </div>
                                          <?php 

                                       }
                                    }
                                 
                                 ?>

                              </td>     

                              <td>
                                 <div class="action-button">
                                    <button id="app-edit" data-role="app-edit" data-id="<?=$row['app_id']?>">
                                       <i class="fas fa-edit    "></i>
                                    </button>

                                    <!-- <button id="app-del" data-role="app-del" data-id="<?=$row['app_id']?>">
                                    <i class="fas fa-trash-alt    "></i>
                                    </button> -->
                                 </div>   
                              </td>
                           </tr>


                           <?php }
                        } else {
                           echo "<tr> <td colspan='5' style='text-align:center;'> No appointment </td> </tr>";
                        }
                     ?>
                     

                     
                  </tbody>
               </table>

            </div>

      </div>


      <!-- Modal -->
      <div id="modal-overlay-container" class="modal-overlay-container">

         <!-- Add new appointment -->

         <!-- Appointment Details -->

      </div>


   </main>
   
</body>

<script src="../ajax/appointment-modal.js"> </script>

</html>