<?php
   include "../includes/header_process.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="icon" type="image/png" href="../../assets/favcon.png"/> <!-- Icon -->
   <link rel="stylesheet" href="../css/style.css">
   <title> SMRMS | STUDENT | Personal Information </title>
</head>
<body>

   

   <div class="side-panel">

      <?php include "../includes/profile_nav.php" ?>
        
      <nav class="nav primary-nav">
         
         <div class="sub-header">
         
            <p> Main </p>
         
         </div>
         
         <ul>

            <li> 
               <a href="./dashboard.php"> Dashboard </a>
            </li>

            <li class="selected"> 
               <a href="./personal-information.php"> Personal Information </a>
            </li>
         
            <li> 
               <a href="./medical-requirements.php"> Medical Requirements</a>
            </li>
         
            <li> 
               <a href="./medical-history.php"> Medical History </a>
            </li>

            <li> 
               <a href="./health-history.php"> Health History  </a>
            </li>
         
         
            <li> 
               <a href="./appointment-list.php"> Appointment </a>
            </li>

            <li> 
               <a href="./entrancelog.php"> Entrace Log </a>
            </li>
         </ul>
        
      </nav>
        
      <nav class="nav secondary-nav">
        
         <div class="sub-header">
         
            <p> Settings </p>
         
         </div>
        
         <ul>
            <li> 
               <a href="./manage-account.php"> Manage Account </a>
            </li>
         
            <li> 
               <a href="../../process/logout.php"> Logout </a>
            </li>
         </ul>
        
      </nav>
        
   </div>

   <main>

      <header>

         <div class="logo">
            <img src="../../assets/favcon.png" alt="">
         </div>

         <div class="title">
            <h1>Student Medical Record</h1>
         </div>

      </header>

      <div class="container">

         <div class="personal-details">
            
            <div class="personal-info">

               <div class="student-info">

                  <div class="details">

                     <h3 class="sub-header"> Personal Information </h3>

                     <h2> <?=$stud_logged['student_id']?> </h2>

                     <h3> <?=$stud_logged['lastname']?>, <?=$stud_logged['firstname']?> <?=$stud_logged['mi']?>. </h3>

                     <p> <?=$stud_logged['program']?> (<?=$stud_logged['code']?>) </p>

                     <p style="font-weight: 600;"> <?=$stud_logged['email']?></p>

                     <p><b>Contact Number: <?=$stud_logged['contact_number']?></b></p>


                     <div class="status">
                        
                        <p> <b>Medical Requirements:</b> <span style="color: var(--approve)"> Complete </span></p>
                     
                        <!-- <p> Status: 
                           <?php if($stud_logged['remarks'] === "Incomplete") { ?>

                              <span style="color: var(--decline)"> <?=$stud_logged['remarks']?> </span> 

                           <?php } else { ?>
                              
                              <span style="color: var(--approve)"> <?=$stud_logged['remarks']?> </span>

                           <?php } ?> 
                        </p> -->


                        <!-- <p> <b>Status:</b> <span style="color: var(--approve)"> Cleared </span></p> -->


                     </div>

                     <div class="status">
                        
                        <p><b> Health Status:
                     
                        
                           <?php if($res_stud_health_status['Status'] === "Not Cleared") { ?>

                              <span style="color: var(--decline)"> <?=$res_stud_health_status['Status']?> </span> 

                           <?php } else { ?>
                              
                              <span style="color: var(--approve)"> <?=$res_stud_health_status['Status']?> </span>

                           <?php } ?> 
                        </p>


                     </div>
                     
                  </div>

                  <div class="image">

                     <img src="../../assets/<?=$stud_logged['id_image']?>" alt="">

                  </div>
               </div>
            </div>

            <hr>

            <div class="basic-information">

               <h3> Basic Information </h3>

               <div class="form-input">
                  

                  <div class="text-input">

                     <input type="text" value="<?=$stud_logged['lastname']?>" id="sex" readonly>

                     <label for="sex"> Lastname </label>

                  </div>

                  <div class="text-input">

                     <input type="text" value="<?=$stud_logged['firstname']?>" id="sex" readonly>

                     <label for="sex"> Firstname </label>

                  </div>

                  <div class="text-input">

                     <input type="text" value="<?=$stud_logged['middlename']?>" id="sex" readonly>

                     <label for="sex"> Middlename </label>

                  </div>


                  <div class="text-input">

                     <input type="text" value="<?=$stud_logged['extension']?>" id="sex" readonly>

                     <label for="sex"> Extension </label>

                  </div>


                  <div class="text-input">

                     <input type="text" value="<?=$stud_logged['gender']?>" id="sex" readonly>

                     <label for="sex"> Sex </label>

                  </div>

                  <div class="text-input">

                     <input type="text" value="<?=$stud_logged['age']?>" id="age" readonly>

                     <label for="age"> Age </label>

                  </div>

                  <div class="text-input">

                     <input type="text" value="<?=$stud_logged['birthdate']?>" id="" readonly>

                     <label for=""> Birthdate </label>

                  </div>

                  <div class="text-input">

                     <input type="text" value="<?=$stud_logged['height']?>" id="" readonly>

                     <label for=""> Height </label>

                  </div>

                  <div class="text-input">

                     <input type="text" value="<?=$stud_logged['weight']?>" id="" readonly>

                     <label for=""> Weight </label>

                  </div>

                  <div class="text-input">

                     <input type="text" value="<?=$stud_logged['house_no']?>" id="" readonly>

                     <label for=""> House No. </label>

                  </div>

                  <div class="text-input">

                     <input type="text" value="<?=$stud_logged['street']?>" id="bdate" readonly>

                     <label for="bdate"> Street </label>

                  </div>

                  <div class="text-input">

                     <input type="text" value="<?=$stud_logged['brgy']?>" id="bdate" readonly>

                     <label for="bdate"> Barangay </label>

                  </div>

                  <div class="text-input">

                     <input type="text" value="<?=$stud_logged['city']?>" id="bdate" readonly>

                     <label for="bdate"> City </label>

                  </div>

                  <div class="text-input">

                     <input type="text" value="<?=$stud_logged['province']?>" id="bdate" readonly>

                     <label for="bdate"> Province </label>

                  </div>

                  <div class="text-input">

                     <input type="text" value="<?=$stud_logged['district']?>" id="" readonly>

                     <label for=""> District </label>

                  </div>

                  <div class="text-input">

                     <input type="text" value="<?=$stud_logged['zip_code']?>" id="" readonly>

                     <label for=""> Zip Code </label>

                  </div>


               </div>

            </div>

            <hr>

            <div class="emergency-contact">

               <h3> Emergency Contact </h3>

               <div class="form-input">

                  <div class="text-input">

                     <input type="text" value="<?=$stud_logged['fullname']?>" id="address" readonly>

                     <label for="address"> Fullname </label>

                  </div>

                 

                  <div class="text-input">

                     <input type="text" value="<?=$stud_logged['contact_number']?>" id="address" readonly>

                     <label for="address"> Contact Number </label>

                  </div>

                   <div class="text-input">

                     <input type="text" value="<?=$stud_logged['relation']?>" id="address" readonly>

                     <label for="address"> Relationship </label>

                  </div>

                  <div class="text-input">

                     <input type="text" value="<?=$stud_logged['rel_address']?>" id="address" readonly>

                     <label for="address"> Complete Address </label>

                  </div>

               </div>

            </div>
         </div>

      </div>

   </main>

</body>
</html>