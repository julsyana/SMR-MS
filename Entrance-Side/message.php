<?php
   error_reporting(0);
   date_default_timezone_set("Asia/Manila");
   include "./connection.php";
   include "./function.php";
   // include "./validation_test.php";

   $status = $_POST['status'];
   $fullname = $_POST['fullname'];
   $message = $_POST['mess'];
   $total = $_POST['total'];
   $stud_id = $_POST['stud_id'];
   $role = $_POST['role'];
   $qr_val = $_POST['qr_val'];

   // echo $total;

   if($role == 'outsider') { ?>

         <div class="modal-message">

            <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
            <p> This qr code <b> <?=$qr_val?>  </b> didn't exist in student table </p>
   
            <div class="form-button">
               <button id="close"> close </button>
            </div>
         </div>
      

   <?php } else {

      if($total == '1' && $status == 'Not Cleared') { ?>

         <div class="modal-message">
            <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
            <p> This student <b> <?=$stud_id?> <?=$fullname?> <b> has an issue in clinic. 
               <!-- <?=$total?> -->
            </p>
   
            <div class="message-appointment">
               
               <div style="color: green;"> <?=$message?>  </div>
   
               <!-- <ul>
                  <li> document </li>
                  <li> document </li>
                  <li> document </li>
                  <li> document </li>
               </ul> -->
            </div>
   
            <div class="form-button">
               <button id="validated-btn" data-stud_id="<?=$stud_id?>"> Allowed </button>
               <button id="not-validated-btn" data-stud_id="<?=$stud_id?>"> Not Allowed </button>
               <button id="close"> close </button>
            </div>
         </div>
   
      <?php } else if ($total == '0' && $status == 'Not Cleared') { 
   
         $role = 'student';
         $date = date('Y-m-d');
         $time = date('h:i:s');
         
         archive($conn, $stud_id, $role, $date, $time);
   
      
   
         ?>
   
         <div class="modal-message">
   
            <!-- <p>  <?=$total?> </p> -->
            <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
            <p> This student <b> <?=$stud_id?> <?=$fullname?> <b> has an issue in clinic. </p>
   
            <div class="message-appointment">
   
               <div style="color: red;">  <?=$message?> </div>
   
            </div>
   
            <div class="form-button">
               <button id="close"> close </button>
            </div>
         </div>
   
   
   
      
      <?php } else { ?>
   
         <p id="notification" style="background-color: #4EC745; padding:10px; position:absolute;"> This student <b> <?=$fullname?> </b> is <?=$message?></p>
   
      <?php }

   }
 

  

?>

<script>

setTimeout(function(){
  var notification = document.getElementById('notification');
  notification.style.display = 'none';
}, 3000);

   $(document).ready(function(){

      $('#validated-btn').click(function(){

         var stud_id = $(this).data('stud_id');
         // alert('change status to pending ' + stud_id );

         $('.table-contents').load('./update_status.php',{

            stud_id: stud_id, 

         })

         $('#not-verified').hide();

      });

      $('#not-validated-btn').click(function(){

         var stud_id = $(this).data('stud_id');
         alert('Go to archive table ' + stud_id);

          $('.table-contents').load('./update_status_archive.php',{

            stud_id: stud_id, 

         })

         $('#not-verified').hide();

        
      });


      $('#close').click(function(){

         $('#not-verified').hide();

         $('.numerical').load('./total.php');

      });

   });

 
</script>
