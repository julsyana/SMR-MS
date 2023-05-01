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
   <link rel="stylesheet" href="../css/med_req.css">
   <title> SMRMS | STUDENT | Medical Requirements </title>
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
         
            <li class="selected"> 
               <a href="./medical-requirements.php"> Medical Requirements</a>
            </li>
         
            <li> 
               <a href="./medical-history.php"> Medical History  </a>
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

         <div class="medical-requirements">
            <h3> Medical Requirements List </h3>

            <table border="0">
               <thead>
                  <tr>
                     <th> Requirement Type </th>
                     <th> Date Submitted </th>
                     <th> File </th>
                     <th> Status </th>
                     <th width="25%"> Reason </th>
                  </tr>
               </thead>

               <tbody>
                  <?php if(mysqli_num_rows($res_stud_med_reqs) === 1){

                     $med_reqs_files = mysqli_fetch_assoc($res_stud_med_reqs);


                     $cbc_date_sub = $med_reqs_files['cbc_date_submitted'];
                     $cbc_date_sub = new DateTime("$cbc_date_sub");
                     $cbc_date_sub = $cbc_date_sub->format("F d, Y");

                     $uri_date_sub = $med_reqs_files['uri_date_submitted'];
                     $uri_date_sub = new DateTime("$uri_date_sub");
                     $uri_date_sub = $uri_date_sub->format("F d, Y");

                     $xray_date_sub = $med_reqs_files['xray_date_submitted'];
                     $xray_date_sub = new DateTime("$xray_date_sub");
                     $xray_date_sub = $xray_date_sub->format("F d, Y");

                     $medCert_date_sub = $med_reqs_files['med_cert_date_submitted'];
                     $medCert_date_sub = new DateTime("$medCert_date_sub");
                     $medCert_date_sub = $medCert_date_sub->format("F d, Y");

                     ?>

                        <tr>
                           <td> Complete Blood Count (CBC) </td>
                           <td> <?=$cbc_date_sub?> </td>

                           <td> 
                              <div class="file-link">
                                 <a target="_blank" href="../medical-requirements/<?=$med_reqs_files['cbc_file']?>">
                                    <?=$med_reqs_files['cbc_file']?>  
                                 </a>
                              </div>
                           </td>

                           <td> 
                              <?php
                                 if($med_reqs_files['cbc_status'] == 'approved') { ?>
                                 
                                    <div class="status" style="background-color: var(--approve); ">
                                       <?=$med_reqs_files['cbc_status']?> 
                                    </div>
                                 <?php } 
                                    
                                 else if($med_reqs_files['cbc_status'] == 'declined') { ?> 

                                    <div class="status" style="background-color: var(--decline); ">
                                       <?=$med_reqs_files['cbc_status']?>  
                                    </div>
                                 <?php } 
                                 
                                 else { ?>

                                    <div class="status" style="background-color: #c4c4c4; ">
                                       <?=$med_reqs_files['cbc_status']?>
                                    </div>
                                 <?php }
                              ?>
                           </td>

                           

                           <td> <?=$med_reqs_files['cbc_reason']?> </td>
                        </tr>

                        <tr>
                           <td> Urinalysis </td>

                           <td> <?=$uri_date_sub?> </td>

                           <td> 
                              <div class="file-link">
                                 <a target="_blank" href="../medical-requirements/<?=$med_reqs_files['uri_file']?>">
                                    <?=$med_reqs_files['uri_file']?>  
                                 </a>
                              </div>
                           </td>

                           <td> 
                              <?php
                                 if($med_reqs_files['uri_status'] == 'approved') { ?>
                                 
                                    <div class="status" style="background-color: var(--approve); ">
                                       <?=$med_reqs_files['uri_status']?>
                                    </div>
                                 <?php } 
                                 
                                 else if($med_reqs_files['uri_status'] == 'declined') { ?> 

                                    <div class="status" style="background-color: var(--decline); ">
                                       <?=$med_reqs_files['uri_status']?>
                                    </div>
                                 <?php } 
                                 
                                 else { ?>

                                    <div class="status" style="background-color: #c4c4c4; ">
                                       <?=$med_reqs_files['uri_status']?>
                                    </div>
                                 <?php }
                              ?>
                           </td>    

                           <td> <?=$med_reqs_files['uri_reason']?> </td>
                        </tr>

                        <tr>
                           <td> Chest X-ray </td>

                           <td> <?=$xray_date_sub?> </td>

                           <td> 
                              <div class="file-link">
                                 <a target="_blank" href="../medical-requirements/<?=$med_reqs_files['xray_file']?>">
                                    <?=$med_reqs_files['xray_file']?>  
                                    
                                 </a>
                              </div>
                           </td>

                           <td> 
                              <?php
                                 if($med_reqs_files['xray_status'] == 'approved') { ?>
                                 
                                    <div class="status" style="background-color: var(--approve); ">
                                       <?=$med_reqs_files['xray_status']?>
                                    </div>
                                 <?php } 
                                 
                                 else if($med_reqs_files['xray_status'] == 'declined') { ?> 

                                    <div class="status" style="background-color: var(--decline); ">
                                       <?=$med_reqs_files['xray_status']?>
                                    </div>
                                 <?php } 
                                 
                                 else { ?>

                                    <div class="status" style="background-color: #c4c4c4; ">
                                       <?=$med_reqs_files['xray_status']?> 
                                    </div>

                                 <?php }
                              ?>
                                 
                           </td>

                           <td> <?=$med_reqs_files['xray_reason']?> </td>
                        </tr>

                        <tr>
                           <td> Medical Certificate </td>

                           <td> <?=$medCert_date_sub?> </td>

                           <td>
                              <div class="file-link">
                                 <a target="_blank" href="../medical-requirements/<?=$med_reqs_files['med_cert_file']?>">
                                    <?=$med_reqs_files['med_cert_file']?>  
                                 </a>
                              </div>
                           </td>

                           <td> 
                              <?php
                                 if($med_reqs_files['med_cert_status'] == 'approved') { ?>
                                 
                                    <div class="status" style="background-color: var(--approve); ">
                                       <?=$med_reqs_files['med_cert_status']?>
                                    </div>
                                 <?php } 
                                 
                                 else if($med_reqs_files['med_cert_status'] == 'declined') { ?> 

                                    <div class="status" style="background-color: var(--decline); ">
                                       <?=$med_reqs_files['med_cert_status']?> 
                                    </div>
                                 <?php } 
                                 
                                 else { ?>

                                    <div class="status" style="background-color: #c4c4c4; ">
                                       <?=$med_reqs_files['med_cert_status']?> 
                                    </div>

                                 <?php }
                              ?>
                           </td>

                           <td> <?=$med_reqs_files['med_cert_reason']?> </td>
                        </tr>

                     <?php 

                  } else { ?>

                     <tr>
                        <td colspan="5"> No Medical Requirement</td>
                     </tr>
                  <?php }?>
               

        

               </tbody>
            </table>
         </div>

      </div>

   </main>

</body>
</html>