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

<div class="view-box cancel-appointment" id="cancel-appointment">

   

   <div class="view-header">

      <div class="icon-holder">

         <i class="fas fa-trash-alt    "></i>
         
      </div>
   

      <h3> Are you sure you want to <span> cancel </span> this appointment? </h3>

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
   
      <!-- <div class="image-container">
   
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
   
      </div> -->
   </div>
   
   <div class="form-button-container">
   
      <div class="form-button">
   
         <button id="modal-back"> No </button>

         <button id="yes-cancel" data-ref_no="<?=$ref_no?>"> Yes </button>
   
      </div>
   </div>
   
</div>

<div class="sample">

</div>


<script>
   $(document).ready(function(){
      
      $('#modal-back').click(function(){
         
         $('.view-appointment-container').hide();
         
      });


      $('#yes-cancel').click(function(){

         let ref_no = $(this).data('ref_no');
         let stud_id = "<?=$stud_id?>";
      

         $('.sample').load('../ajax/process/cancel_appointment.php', {

            ref_no: ref_no,
            stud_id: stud_id

         });

         

      });
   });
</script>