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

   <title>  SMRMS | STUDENT | Entrace Log </title>
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
         
         
            <li> 
               <a href="./appointment-list.php"> Appointment </a>
            </li>

            <li class="selected"> 
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

                  <h2> Entrance Log </h2>

               </div>

               <table>
                  <thead>
                     <tr>
                        <th> Date and Time</th>
                        <th> Campus </th>
                        <th> Status </th>
                     </tr>
                  </thead>

                  <tbody>

                     <?php 
                           if(mysqli_num_rows($sel_ent_log_stud) > 0){
                              while($row = mysqli_fetch_array($sel_ent_log_stud)){

                                  $conDate = strtotime($row['logdate'].$row['timein']); 
                                 $formattedDate = date('F d, Y -  g:i A', $conDate);
                                 
                     ?>
                     <tr>
                        <td> 
                           <div>
                              <?=$formattedDate?>
                           </div>
                        <td> 
                           campus
                        </td>
                        <td>
                           <div class="type">

                              <?=$row['Status']?> 
                              
                           </div>
                        </td>
                     </tr>
                     <?php
                              }
                           }else { ?>
                        <tr> 
                           <td colspan="7"> No Entrance Log Found</td>
                        </tr>
                     <?php } ?>
                     
                  </tbody>
               </table>
            </div>

         
         </div>

      </div>

   </main>

</body>

<!-- <script src="../ajax/modal-appointment.js"></script> -->

</html>