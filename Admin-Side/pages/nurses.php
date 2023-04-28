<?php
   include "../includes/function-header.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title> SMRMS | ADMIN | Nurses </title>
   <?php include "../includes/head.php"; ?>

   <!-- custom css -->
   <link rel="stylesheet" href="../css/nurse.css">
   
   
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
               <a href="./nurses.php" class="isSelected">
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

         <div class="nurse-container">

            <div class="content-header">
               <h3> Nurses </h3>

               <button class="add-nurse">
                  <i class="fas fa-user-md    "></i>
                  <p>  Add new nurses </p>
               </button>
            </div>

            <div class="filter">
               <div class="sort sort-nurse">
                  <label for="nurse-sort"> Sort by: </label>
                  <select name="sort" id="nurse-sort">
                     <option value="id"> All </option>
                     <option value="San Bartolome"> San Bartolome </option>
                     <option value="Batasan"> Batasan </option>
                     <option value="San Francisco"> San Francisco </option>
                  </select>
               </div>

               <div class="search search-nurse">
                  <input type="search" name="search" id="nurse-search" placeholder="Search Nurse">
               </div>
            </div>


            <div class="nurse-list-container">

               <div class="card_container" id="nurse-container">

                  <!-- loop here -->

                  <?php 
                     if($total_nurse > 0) {

                        while($nurse_row = mysqli_fetch_assoc($nurse_result)) {
                           
                           $nurseSched_res = fetchScheduleByNurse($conn, $nurse_row['emp_id']);



                           ?>

                           <!-- <a href="./veiw-nurse.php?emp_id=<?=$nurse_row['emp_id']?>" class="card-holder"> -->

                              <div class="card">
                                 <div class="image-holder"><img src="../assets/<?=$nurse_row['profile_pic']?>" alt="" /></div>
                                 

                                 <div class="card_content">

                                    <span class="stud_id"> <?=$nurse_row['emp_id']?> </span>
                                    <!-- <span class="name"> <?=$nurse_row['firstname']?> <?=$nurse_row['lastname']?> </span> -->

                                     <span class="name"> <?=$nurse_row['username']?> </span>
                                    <span class="nurse"> <?=$nurse_row['position']?> </span>

                                    <div class="card_footer">
                                   
                                       <span class="date">

                                          

                                          <?php
                                             if(mysqli_num_rows($nurseSched_res) > 0){
                                                while($nurseSched_row = mysqli_fetch_assoc($nurseSched_res)){

                                                   echo "<span>".$nurseSched_row['day']."</span>";

                                                }
                                             } else {

                                                echo "No Schedule";
                                             }
                                          ?>
                                       </span>

                                       <span class="form-button">

                                          <a href="./veiw-nurse.php?emp_id=<?=$nurse_row['emp_id']?>" class="custom_btn nurseinfobtn" >

                                             
                                             <i class="fas fa-info-circle    "></i>
                                          </a>

                                          <button data-role="del-nurse" data-emp_id="<?=$nurse_row['emp_id']?>" data-uname="<?=$nurse_row['username']?>">

                                             <i class="fas fa-trash-alt"></i>
                                          </button>

                                       </span>

                                    </div>
                                 </div>
                              </div>

                           <!-- </a> -->

                           <?php


                        }

                     }
                  
                  ?>
         
                 
                  
                  <!-- loop here -->
               </div>
            </div>


            
            <!-- modal -->
            <div class="nurse-modal-container" id="nurse-modal-container">

               

            </div>

            <!-- message modal -->
            <div class="nurse-message-modal" id="nurse-message-modal">
            
            </div>

            

            
         </div>

      </div>

   </main>
   
</body>

<!-- ajax -->
<script src="../ajax/nurse.js"></script>

<!-- sort/search -->
<script src="../ajax/sort-search_nurse.js"></script>

<!-- custom script -->
</html>