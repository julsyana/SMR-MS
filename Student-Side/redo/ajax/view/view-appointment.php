<?php

   include "../../includes/db_con.php";
   include "../../functions/student_function.php";
   session_start();

   $ref_no = $_POST['ref_no'];

   $stud_id = $_SESSION['student_id'];


   $studApp = fetchStudAppointment($conn, $stud_id, $ref_no);
   $studAppImages = fetchStudAppointmentImages($conn, $ref_no, $stud_id);

   $appDate = $studApp['app_date'];
   $appDate = new DateTime("$appDate");
   $appDate = $appDate->format("l, F d, Y");

   $dateApply = $studApp['date_apply'];
   $dateApply = new DateTime("$dateApply");
   $dateApply = $dateApply->format("F d, Y h:i A");

  
?>


<div class="view-box view-appointment" id="view-appointment">

   <div class="view-header">
      <h3> Appointment Details </h3>
   
      <div class="date-application">
         <p> Date of Application: <span> <?=$dateApply?> </span></p>
      </div>
   </div>
   
   <div class="view-detail-container">
   
      <div class="detail-container">
   
         <div class="details">
            
            <div class="detail">
               <label for=""> Type of Service: </label>
   
               <div class="detail-label service-type">
                  <p> <?=$studApp['app_type']?> Service </p>
               </div>
            </div>
   
            <div class="detail">
               <label for=""> Reference Number: </label>
   
               <div class="detail-label">
                  <p> <?=$ref_no?> </p>
               </div>
            </div>
   
            <div class="detail">
               <label for=""> Date: </label>
   
               <div class="detail-label">
                  <p> <?=$appDate?> </p>
               </div>
            </div>
   
            <div class="detail">
               <label for=""> Time: </label>
   
               <div class="detail-label">
                  <p> <?=$studApp['app_time']?> </p>
               </div>
            </div>
               
   
         </div>
   
         <div class="app-qr">
            <div class="qr-handler">
              <img src="../app_qr/<?=$studApp['app_qr']?>" alt="">
           </div>
         </div>
      </div>
   
      <div class="app-reason">
         
         <div class="detail">
            <label for=""> Reason: </label>
   
            <div class="detail-label">
               <textarea name="" id="" disabled><?=$studApp['app_reason']?></textarea>
            </div>
         </div>
               
   
      </div>
   
      <div class="image-container">
   
         <label for=""> Image/s uploaded: <?=mysqli_num_rows($studAppImages)?> </label>
   
         <div class="image-uploaded">

            <?php if(mysqli_num_rows($studAppImages) > 0) { 
               
                     while($imageRow = mysqli_fetch_assoc($studAppImages)) {  ?> 
            
                        <div class="image-handler">

                           <img src="../appointment-images/<?=$imageRow['img_name']?>" alt="">

                        </div>
        
                     <?php }  

                  } else { ?> 

                        <div>

                           <p> No Image </p>

                        </div>
                  
                  
                  <?php } 
            ?>
   
         </div>
   
      </div>
   </div>
   
   <div class="form-button-container">

      <div class="app-status">
         <p> Status:

            <?php if($studApp['app_status'] === 'scheduled') { ?>

               <span class="status" style="background-color: var(--primary)"> <?=$studApp['app_status']?> 

            <?php } else if($studApp['app_status'] === 'completed') { ?>

               <span class="status" style="background-color: var(--approve)"> <?=$studApp['app_status']?> 

            <?php } else if($studApp['app_status'] === 'cancelled') { ?>

               <span class="status" style="background-color: #878787"> <?=$studApp['app_status']?> 

            <?php } else {?> 

               <span class="status" style="background-color: var(--decline)"> <?=$studApp['app_status']?> 

            <?php }?>

            </span>

         </p>
         
      </div>
   
      <div class="form-button">
   
         <button id="modal-back"> back </button>
   
      </div>
   </div>
   
</div>

<script>
   $(document).ready(function(){
      
      $('#modal-back').click(function(){
         
         $('.view-appointment-container').hide();
         
      });
   });
</script>