<?php
   include "../includes/header_process.php";

   $ref_no = $_GET['ref_no'];


   $stud_med_info = fetchStudMedHistoryRef($conn, $ref_no, $stud_id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="icon" type="image/png" href="../../assets/favcon.png"/> <!-- Icon -->
   <link rel="stylesheet" href="../css/style.css">
   <link rel="stylesheet" href="../css/med_history.css">

   <!-- Font awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

   <title> SMRMS | STUDENT | View Medical History (<?=$stud_id?>) </title>
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

            <li> 
               <a href="./personal-information.php"> Personal Information </a>
            </li>
         
            <li> 
               <a href="./medical-requirements.php"> Medical Requirements</a>
            </li>
         
            <li class="selected"> 
               <a href="./medical-history.php"> Medical History  </a>
            </li>
         
            <li> 
               <a href="./health-history.php"> Health History  </a>
            </li>
         

            <li> 
               <a href="./appointment-list.php"> Appointment </a>
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

         <div class="view-medical-history">

            <div class="link-header">
            <h3> <a href="./medical-history.php"> Medical History</a> >  View Medical History </h3>
            </div>

            <div class="med-history-info">

               <div class="nurse-status-info">

                  <div class="med-detail">

                     <div class="nurse-image">

                        <img src="../../assets/<?=$stud_med_info['profile_pic']?>" alt="">

                     </div>

                     <div class="nurse-info">
                        <h2> <?=$stud_med_info['position']?> <?=$stud_med_info['firstname']?> <?=$stud_med_info['nurse_mi']?>. <?=$stud_med_info['lastname']?></h2>
                        <p> Nurse Assistant </p>
                     </div>

                  </div>

                  <!-- <?php
                     if($stud_med_info['status'] === 'cleared') { ?>

                        <div class="med-status" style="background-color: var(--approve);">

                           <p> Status: <span> <?=$stud_med_info['status']?> </span> </p>

                        </div>

                     <?php } else { ?>

                        <div class="med-status" style="background-color: var(--decline);">

                           <p> Status: <span> <?=$stud_med_info['status']?> </span> </p>

                        </div>

                     <?php } ?> -->
            

                     <?php if($res_stud_health_status['Status'] === "Not Cleared") { ?>

                        <p> Status: <span style="background-color: var(--decline);"> <?=$res_stud_health_status['Status']?> </span> </p>

                     <?php } else { ?>

                        <p> Status: <span style="background-color: var(--approve);"> <?=$res_stud_health_status['Status']?> </span> </p>

                     <?php } ?> 
                  

               </div>


               <div class="consultation-summary-container">
                  
                  <div class="sub-header">
                     <h2> Consultation Summary </h2>
                     
                     <p> Date Consulted: <b> <?=$stud_med_info['date_of_consultation']?> </b></p>
                  </div>

                  <div class="summary-consultation">

                     <div class="consultation">
                        <h3> Symptoms </h3>
                        
                        <p>
                           
                           <ul>
                              <li> <?=$stud_med_info['symptoms']?> </li>
                              <li> <?=$stud_med_info['othersymptoms']?>  </li>
                           </ul>
                        
                        </p>

                     </div>

                     <div class="consultation">
                        <h3> Body Temperature </h3>

                        <p> Above Normal: <span> <?=$stud_med_info['body_temp']?> Degrees Celcius </span> </p>

                     </div>

                     <div class="consultation">
                        <h3> Reason of referral </h3>

                        <p> <span> <?=$stud_med_info['reason']?> </span> </p>

                     </div>

                     <div class="consultation">
                        <h3> Have you been in close contact to suspected or confirmed covid case for the past 14 days? </h3>

                        <p> <?=$stud_med_info['othersymptoms']?> </p>

                     </div>

                     <div class="consultation">
                        <h3> Medicine Given </h3>

                        <p> <span> 1pc/s <?=$stud_med_info['medicine']?> </span> </p>

                     </div>

                     <div class="consultation">
                        <h3> Hospital Name </h3>

                        <p> <span> <?=$stud_med_info['hospital']?> </span> </p>

                     </div>

                     <div class="consultation">
                        <h3> Have you been tested for covid in the past 10 days?</h3>

                        <p> <span> <?=$stud_med_info['tested_covid']?> </span> </p>

                     </div>

                     <div class="consultation">
                        <h3> Confined? How long? </h3>

                        <p> <span> <?=$stud_med_info['confined']?> | <?=$stud_med_info['how_long']?> hr </span> </p>

                     </div>

                     <div class="consultation">
                        <h3> Hospital Address </h3>

                        <p> <span> <?=$stud_med_info['hospital_add']?> </span> </p>

                     </div>

                  </div>
                  
                  <div class="form-button">

                    

                     <?php if($stud_med_info['status'] === 'cleared') { ?>

                        <button> View medical Certificate </button>

                     <?php } else { ?>

                        <button disabled> View medical Certificate </button>

                     <?php } ?>

                  </div>
               </div>
            </div>
   
         </div>
            

      </div>

   </main>

</body>
</html>