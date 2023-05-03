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
   <link rel="stylesheet" href="../css/appointment.css">

   <!-- Font awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

   <!-- AJAX -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

   <title>  SMRMS | STUDENT | Appointment List </title>
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
            
            <li > 
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
         
         
            <li class="selected"> 
               <a href="./appointment-list.php"> Appointment </a>
            </li>

            <li > 
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
            <h1> Student Medical Record </h1>
         </div>

      </header>

      <div class="container">

         <div class="appointment-list-container">

            <div class="appointment-list">

               <div class="add-new-app">

                  <h2> Appointment List </h2>

                  <a href="./appointment.php"> <i class="fa fa-plus" aria-hidden="true"></i> Add New Appointment </a>
               </div>

               <table>
                  <thead>
                     <tr>
                        <th> Date Appointed </th>
                        <th> Appointment Type </th>
                        <th> Reference Number </th>
                        <th> Appointment Date </th>
                        <th> Status </th>
                        <th> Action </th>
                     </tr>
                  </thead>

                  <tbody>

                  <?php

                     if(mysqli_num_rows($res_stud_appointment) > 0) {

                        while($row = mysqli_fetch_assoc($res_stud_appointment)) { 
                        
                           $appointment_date = $row['app_date'];
                           $appointment_date = new DateTime("$appointment_date");
                           $appointment_date = $appointment_date->format("l, F d, Y");
                           
                           $conDate = strtotime($row['date_apply']); 
                           $formattedDate = date('F d, Y g:i A', $conDate);
                        ?>

                     <tr>
                        <td> 
                           <div>

                              <?=$formattedDate?>
                              
                           </div>
                        <td> 
                           <div class="type">

                              <?=$row['app_type']?> Service 
                              
                           </div>
                        </td>
                        <td> <?=$row['reference_no']?> </td>
                        <td> <?=$appointment_date?></td>
                        
                        <td> 
                           <div class="status"> 
                              <?php if($row['app_status'] === 'scheduled') { ?>

                                 <p style="color: var(--primary)"> <?=$row['app_status']?> </p>
                                 
                              <?php } else if($row['app_status'] === 'completed') { ?>

                                 <p style="color: var(--approve)"> <?=$row['app_status']?> </p>

                              <?php } else if($row['app_status'] === 'cancelled') { ?>

                                 <p style="color: var(--decline)"> <?=$row['app_status']?> </p>

                              <?php } else {?> 

                                 <p style="color: var(--decline)"> <?=$row['app_status']?> </p>
                              
                              <?php }?>
                           </div>
                        </td>

                        <td> 
                           <div class="action">

                              <div class="form-button">
                                 <button id="appoint_view" data-role="view-appoint" data-ref_no="<?=$row['reference_no']?>"> View </button>
                              </div>

                              <div class="form-button">
                                 <button id="appoint_cancel" data-role="cancel-appoint" data-ref_no="<?=$row['reference_no']?>"
                                 <?php if($row['app_status'] == 'scheduled') { ?>
                                    

                                 <?php } else { ?>

                                    disabled
                                    
                                 <?php } ?>>  Cancel </button>
                              </div>
                           </div>
                        </td>
                     </tr>


                     <?php   }

                     } else { ?> 

                     <tr>
                        <td colspan="5"> No Appointment Record Yet </td>
                     </tr>
                     
                     
                     <?php }
                  
                  ?>
                     
                  </tbody>
               </table>
            </div>

         
         </div>

      </div>

   </main>


   <!-- Viewer -->
   <div class="view-appointment-container">

      <div class="view-modal" id="view-modal">
         

      </div>

   </div>

</body>

<script src="../ajax/modal-appointment.js"></script>

</html>