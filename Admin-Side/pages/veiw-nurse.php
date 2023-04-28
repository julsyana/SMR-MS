<?php
   include "../includes/function-header.php";

   $nurse_id = $_GET['emp_id'];

   // select nurse data
   $selected_nurse_res = fetchNurse($conn, $nurse_id);
   $sel_nurse = mysqli_fetch_assoc($selected_nurse_res);

   // select nurse schedule
   $sel_nurseSched = fetchScheduleByNurse($conn, $nurse_id);

   if(!empty($sel_nurse['birthdate'])){
      // convert date
      $nurse_bdate = convertDate($sel_nurse['birthdate']);
   } else {
      $nurse_bdate = "";
   }

   

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

            <div class="link-header">
               <h3> <a href="./nurses.php">Nurses</a> > <span> Nurse Information </span></h3>
            </div>


            <div class="view-nurse-container">

               <div class="nurse-information">

                  <div class="nurse-profile">

                     <div class="profile">

                        <div class="img-handler">
                           
                           <img src="../assets/<?=$sel_nurse['profile_pic']?>" alt="">

                        </div>

                     </div>

                     <!-- <div class="form-upload">
                        <label for="nurse-profile"> Upload profile </label>

                        <input type="file" name="nurse_profile" id="nurse-profile" hidden>
                     </div> -->

                  </div>

                  <div class="personal-info">

                     <div class="form-input">
                        <label for="nurse-id"> Emp ID: </label>

                        <input type="text" value="<?=$sel_nurse['emp_id']?>" id="nurse-id" readonly>

                     </div>

                     <div class="form-input">
                        
                        <label for="nurse-email"> Email: </label>

                        <input type="text" value="<?=$sel_nurse['email']?>" id="nurse-email" readonly>

                     </div>

                     <div class="form-input">
                        <label for="nurse-position"> Position: </label>

                        <input type="text" value="<?=$sel_nurse['position']?>" id="nurse-position" readonly>

                     </div>

                     <div class="form-input">
                        <label for="nurse-campus"> Campus Assigned: </label>

                        <input type="text" value="<?=$sel_nurse['campus']?>" id="nurse-campus" readonly>

                     </div>

                     <div class="form-input">

                        <label for="nurse-sched"> Schedule: </label>

                        <div class="scheds">

                           <?php 
                           
                              if(mysqli_num_rows($sel_nurseSched) > 0) {

                                 while($sched_row = mysqli_fetch_assoc($sel_nurseSched)) {

                                    ?>

                                    <div class="form-check">
                                       
                                       <input type="checkbox" value="<?=$sched_row['schedule_day']?>" id="<?=$sched_row['schedule_day']?>" hidden disabled>

                                       <label for="<?=$sched_row['schedule_day']?>"> <?=$sched_row['schedule_day']?> </label>

                                    </div>

                                    <?php
                                 }

                              } else {

                                 ?>

                                    <div class="form-check">

                                       <label for="" style="background-color: #d6d6d6; color: #000"> No schedule </label>

                                    </div>

                                 <?php                           
                              
                              }
                           
                           ?>

                        </div>

                        


                        
                        

                     </div>

                  </div>
               </div>

               <div class="basic-info">

                  <div class="form-input">
                     <label for="nurse-uname"> Username </label>

                     <input type="text" value="<?=$sel_nurse['username']?>" id="nurse-uname" readonly>

                  </div>
                  
                  <div class="form-input">
                     <label for="nurse-fname"> Firstname </label>

                     <input type="text" value="<?=$sel_nurse['firstname']?>" id="nurse-fname" readonly>

                  </div>

                  <div class="form-input">
                     <label for="nurse-lname"> Lastname </label>

                     <input type="text" value="<?=$sel_nurse['lastname']?>" id="nurse-lname" readonly>

                  </div>

                  <div class="form-input">
                     <label for="nurse-mname"> Middlename </label>

                     <input type="text" value="<?=$sel_nurse['middlename']?>" id="nurse-mname" readonly>

                  </div>

                  <div class="form-input">
                     <label for="nurse-age"> Age </label>

                     <input type="text" value="" id="nurse-age" readonly>

                  </div>

                  <div class="form-input">
                     <label for="nurse-bdate"> Birthdate </label>

                     <input type="text" value="<?= $nurse_bdate?>" id="nurse-bdate" readonly>

                  </div>

                  <div class="form-input">
                     <label for="nurse-sex"> Sex </label>

                     <input type="text" value="<?=$sel_nurse['gender']?>" id="nurse-sex" readonly>

                  </div>

               </div>


               <div class="contact-info">

                  <div class="form-input">
                     <label for="nurse-mob"> Mobile Number </label>

                     <input type="text" value="<?=$sel_nurse['contact_num']?>" id="nurse-mob" readonly>

                  </div>

                  <div class="form-input">
                     <label for="nurse-tel"> Telephone No. (Optional) </label>

                     <input type="text" value="" id="nurse-tel" readonly>

                  </div>

                  <div class="form-input">
                     <label for="nurse-email-add"> Email Address </label>

                     <input type="text" value="<?=$sel_nurse['email']?>" id="nurse-email-add" readonly>

                  </div>

               </div>


               <div class="emergency-contact">

                  <div class="form-input">
                     <label for="nurse-mob"> Fullname </label>

                     <input type="text" value="" id="nurse-mob" readonly>

                  </div>

                  <div class="form-input">
                     <label for="nurse-tel"> Contact Number </label>

                     <input type="text" value="" id="nurse-tel" readonly>

                  </div>

                  <div class="form-input">
                     <label for="nurse-email-add"> Complete Address </label>

                     <input type="text" value="" id="nurse-email-add" readonly>

                  </div>


                  <div class="form-input">
                     <label for="nurse-email-add"> Relationship </label>

                     <input type="text" value="" id="nurse-email-add" readonly>

                  </div>

               </div>

            </div>


            
         </div>

      </div>

   </main>
   
</body>

<!-- custom script -->
</html>