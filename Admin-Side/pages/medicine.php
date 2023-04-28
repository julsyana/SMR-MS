<?php

   include "../includes/function-header.php";
 

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title> SMRMS | ADMIN | Medicine </title>
   <?php include "../includes/head.php"; ?>

   <!-- custom css -->
   <link rel="stylesheet" href="../css/medicine.css">
   
   
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
               <a href="./medicine.php" class="isSelected">
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

         <div class="medicine-container">

            <div class="content-header">
               <h3> Medicines </h3>

               <button class="add-medicine">
                  <i class="fas fa-medkit    "></i>
                  <p>  Add medicine </p>
               </button>
            </div>

            <div class="filter">
               <div class="sort sort-med">
                  <label for="med-sort"> Sort by: </label>
                  <select name="sort" id="med-sort">
                     <option value="id"> All </option>
                     <option value="expirationDate"> Expiration Date </option>
                     <option value="num_stocks"> Stocks </option>
                     <!-- <option value="campus"> Campus </option> -->
                     <option value="San Bartolome"> San Bartolome Campus </option>
                     <option value="San Francisco"> San Francisco Campus </option>
                     <option value="Batasan"> Batasan Campus </option>
                     <!-- <option value="San Francisco"> San Francisco </option> -->
                  </select>
               </div>
               

               <div class="search search-med">
                  <input type="search" name="search" id="med-search" placeholder="Search Medicine">
               </div>
            </div>


            <div class="medicine-list-container">
               <table class="medicine-list" border="0">
                  <tbody>

                  <?php 
                     if(mysqli_num_rows($med_res) > 0) {

                        while($med_row = mysqli_fetch_assoc($med_res)){

                           $expDate = convertDate($med_row['expirationDate']);

                           $description = substr($med_row['description'], 0, 120);

                           

                           ?>
                              <tr>
                                 <td>
                                    <div class="med-img" style="padding-left:10px;">
                                       <img src="../assets/<?=$med_row['image']?>" alt="<?=$med_row['image']?>">
                                    </div>
                                 </td>
         
                                 <td width="17%">
                                    <h3 style="text-transform:capitalize;"> <?=$med_row['name']?> </h3>
                                    
                                    <p class="med-id"> <?=$med_row['prod_id']?> </p>

                                    <p class="brand"> Campus: <span> <?=$med_row['campus']?> </span> </p>
         
                                    
                                 </td>
         
                                 <td width="40%">
                                    <div class="med-desc">
                                       
                                       <p>  Description:  <span><?=$description?>...</span> </p>
         
                                    </div>
                                    
                                 </td>
         
                                 <td style="padding-left:40px;">
                                    <p> Expiration Date: <em><?=$expDate?></em> </p>
         
                                    <p> Stocks: <span> <?=$med_row['num_stocks']?> </span></p>
                                 </td>
         
                                 <!-- <td>
                                    <div class="qr-image">
                                       <img src="../qr_images/<?=$med_row['qr_code']?>" alt="">
                                    </div>
                                 </td> -->
         
                                 <td width="8%">
                                    <div class="action-button">
         
                                       <button id="med-edit" data-role="med-edit" data-id="<?=$med_row['prod_id']?>">
                                          <i class="fas fa-edit"></i>
                                       </button>
         
                                       <button id="med-del" data-role="med-del" data-id="<?=$med_row['prod_id']?>">
                                       <i class="fas fa-trash-alt"></i>
                                       </button>
                                    </div>
                                 </td>
                              </tr>
                              
                           <?php 

                        }


                     } else { ?>

                        <tr>
                           <td colspan="6" style="text-align:center;"> No Medicine </td>
                        </tr>


                     <?php }
                  ?>
                     
                     
                  </tbody>

                  
               </table>

              
            </div>


            
         </div>

         <!-- modal -->
         <div class="medicine-modal-container" id="medicine-modal-container">

            
            
         </div>


         <!-- message modal -->
         <div class="medicine-message-modal" id="medicine-message-modal">
            
         </div>

      </div>

   </main>
   
</body>
<!-- ajax -->
<script src="../ajax/medicine.js"></script>

<!-- sort/search -->
<script src="../ajax/sort-search_medicine.js"></script>

<!-- custom script -->
</html>