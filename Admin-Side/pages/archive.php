<?php
   include "../includes/function-header.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title> SMRMS | ADMIN | Archive </title>
   <?php include "../includes/head.php"; ?>

   <!-- custom css -->
   <link rel="stylesheet" href="../css/archive.css">
   
   
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
               <a href="./medicine.php">
                  <i class="fas fa-medkit"></i> Medicines
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
               <a href="./archive.php" class="isSelected">
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

         <div class="archive-container">

            <div class="content-header">
               <h3> archive </h3>

               <div class="filter">
                  <div class="sort">
                     <label for=""> Sort by: </label>
                     <select name="sort" id="arc-sort">
                        <option value="id"> All </option>
                        <option value="archive_type"> Type of Archive </option>
                        <option value="archive_datetime"> Date/Time </option>
                     </select>
                  </div>

                  <div class="search">
                     <input type="search" name="search" id="arc-search" placeholder="Search Archive">
                  </div>
               </div>
            </div>

            
            <div class="archive-list-container">
   
               <table>
                  <thead>
                     <tr> 
                        <th width="10%" style="text-align:center"> Image </th>
                        <th width="10%"> ID No. </th>
                        <th width="20%"> Name </th>
                        <th width="10%"> Type </th>
                        <th width="15%"> Date Archive	</th>
                        <th width="5%" style="text-align:center"> Action </th>
                     </tr>
                  </thead>
               </table>
              
               <table border="0"> 
                  
                  <tbody>

                  <?php 
                     if(mysqli_num_rows($archive_res) > 0){

                        while($arch_row = mysqli_fetch_assoc($archive_res)) {

                           $dateArch = convertDate($arch_row['archive_datetime']);
                           $timeArch = convertTime($arch_row['archive_datetime']);

                           ?>

                           <tr>
                              <td width="10%">
                                 <div class="archive-img">
                                    <?php 
                                       if($arch_row['archive_img'] == ''){ ?>

                                          <img src="../assets/QCUClinicLogo.png" alt="">

                                       <?php } else { ?>

                                          <img src="../assets/<?=$arch_row['archive_img']?>" alt="">
                                          
                                       <?php }
                                    ?>
                                    
                                 </div>
                              </td>
                              <td width="10%"> <?=$arch_row['archive_id']?> </td>
                              <td width="20%"> <?=$arch_row['archive_name']?>	 </td>
                              <td width="10%"> <?=$arch_row['archive_type']?> </td>
                              <td width="15%"> <?=$dateArch." ".$timeArch?> </td>
            
                              <td width="5%">
                                 <div class="action-button">
                                    <button id="arch-restore" data-role="restore" data-id="<?=$arch_row['archive_id']?>">
                                       <i class="fas fa-redo-alt"></i>
                                    </button>
            
                                    <!-- <button id="arch-del" data-role="del-archive" data-id="<?=$arch_row['archive_id']?>">
                                       <i class="fas fa-trash-alt"></i>
                                    </button> -->
                                 </div>   
                              </td>
                           </tr>

                           <?php 

                        }

                     } else {
                        ?>
                        <tr>
                           <td colspan="6" style="text-align: center;"> No archive data </td>
                        </tr>
                        <?php 


                     }

                  ?>

                    

                  </tbody>
               </table>
              
            </div>

         </div>

         <!-- message modal -->
         <div class="archive-message-modal" id="archive-message-modal">

               
            
         </div>


      </div>

   </main>
   
</body>
<!-- sort/search -->
<script src="../ajax/sort-search_archive.js"></script>

<!-- custom script -->
<script>

   $('#archive-message-modal').hide();

   $('button[data-role=restore]').click(function(){
      let id = $(this).data('id');
      
      $('#archive-message-modal').show();

      $('#archive-message-modal').load('../modals/restore-archive_modal.php',{
         id: id,
      })
   });

   $('button[data-role=del-archive]').click(function(){
      let id = $(this).data('id');

      alert(id);
   });
</script>
</html>