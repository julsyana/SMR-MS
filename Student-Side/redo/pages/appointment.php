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

   <title> SMRMS | STUDENT | New Appointment </title>
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
            <h1> Student Medical Record </h1>
         </div>

      </header>

      <div class="container">

         <div class="appointment-details-container">

            <div class="link-header">
               <h3> <a href="./appointment-list.php"> Appointment List</a> > Add New Appointment </h3>
            </div>

            <div class="appointment-detail">

               <h3> Appointment Details </h3>

               <form action="../../process/validate_appointment.php" method="POST" enctype="multipart/form-data">

                  <div class="type-of-appointment">

                     <div class="form-input">
                        <select name="med_type" id="med-type"> 
                           <option value=""> Type of Appointment </option> 
                           <option value="Medical"> Medical Service </option> 
                           <option value="Dental"> Dental Service </option> 
                        </select>
                        <span>* <span class="type-message"></span></span>

                         <select name="availableDates" id="available-dates" disabled> 
                           <option value=""> --Select available date-- </option> 
                           <!-- <option value="Medical"> Medical Service </option> 
                           <option value="Dental"> Dental Service </option>  -->
                        </select>
                        <span>* <span class="type-message"></span></span>
                     </div>

                     <div class="form-input">
                        <label for="roa"> Reason for Appointment <span>* <span class="roa-message"></span></span> </label>
                        <textarea name="roa" id="roa" placeholder="(Required)"></textarea>
                     </div>


                     <div class="form-input image-multi">
                        <label for="multi-image"> 
                           <p> Drag & Drop to Upload </p>
                           <p> or </p>
                           <p> Browse </p>

                           <span> (JPEG, JPG, PNG, jpeg, jpg, png only) </span>
                        </label>

                        <input type="file" name="multiImg[]" onchange="Preview()" id="multi-image" multiple accept="image/*" hidden>

                        <p id="num-files-chosen"> No Files Chosen </p>

                        <div class="file-viewer" id="file-viewer">

                        </div>
                     </div>

                     <div class="form-button-next">

                        <div class="message-validation">
                           
                           
                        </div>

                        <div class="form-button">

                           <a href="./appointment-list.php"> Back </a>
                           
                           <button type="button" name="submitBtn" id="appoint-next"> Submit </button>

                        </div>


                     </div>

                  </div>

                  <!-- <div class="set-schedule">

                     <div class="header-title">
                        <p> Please review your appointment </p>
                     </div>

                     <div class="review-appointment">

                        <div class="form-review">
                           <label for=""> Service Type: </label>
                           <span id="se-type"> </span>
                        </div>

                         <div class="form-review">
                           <label for=""> Date Schedule: </label>
                           <span id="se-date"> </span>
                        </div>

                         <div class="form-review">
                           <label for=""> Reason: </label>
                           <span id="se-reason"> </span>
                        </div>

                     </div> 

                     <div class="form-button-next">
                        <button type="button" id="back-btn"> back </button>
                        <button type="submit" name="submitBtn" id="submit-btn"> Submit </button>
                     </div>

                  </div> -->

               </form>

            </div>

         </div>

      </div>

   </main>

</body>

<!-- <script src="../js/calendar.js"></script>   -->
<script src="../js/image_viewer.js"> </script>

<script>
   $(document).ready(function(){

      $('.type-of-appointment').show();
      $('.set-schedule').hide();

      $('#med-type').change(function(){

         let med_type = $(this).val();


         if(med_type != ""){

            $('#available-dates').attr('disabled', false);

            console.log(med_type);

            $('#available-dates').load('../ajax/process/med_type.php', {
               med_type: med_type,
            });

         } else {
            $('#available-dates').attr('disabled', true);
         }

       

      });



      $('#appoint-next').click(function(){

         let fileLen = `${document.getElementById('multi-image').files.length}`;

         // console.log($('#med-type').val());

         if($('#med-type').val() === ''){

            $('.type-message').html("Required!");
            $('.roa-message').html("");
            $('.message-validation').html('<span style="color: var(--decline);"></span>');
            $('#available-dates').css('border', '1px solid red');
            
         } else {

            if($('#med-type').val() === 'Medical'){

               $('.type-message').html("");

               if($('#roa').val() === '' && fileLen == 0) {
                  
                  $('.roa-message').html("Required!");
                  $('.message-validation').html('<span style="color: var(--decline);"> Image required </span>');
                  
               } else if($('#roa').val() !== '' && fileLen == 0) {

                  $('.roa-message').html("");
                  $('.message-validation').html('<span style="color: var(--decline);"> Image required </span>');

               } else if($('#roa').val() === '' && fileLen != 0) {

                  $('.roa-message').html("Required!");
                  $('.message-validation').html('<span style="color: var(--decline);"></span>');

               } else {
                  
                  $('.roa-message').html("");
                  $('.message-validation').html('<span style="color: var(--decline);"></span>');

                  // $('.type-of-appointment').hide();
                  
                  // $('.set-schedule').show();

                  $('#appoint-next').attr('type', 'submit');

                  
               }

               
            } else if ($('#med-type').val() === 'Dental'){

               $('.type-message').html("");
               $('.roa-message').html("Required!");
               $('.message-validation').html('<span style="color: var(--decline);"></span>');

               if($('#roa').val() === ''){
                  
                  $('.roa-message').html("Required!");
                  
               } else {
                  
                  $('.roa-message').html("");
                  // $('.type-of-appointment').hide();
                  // $('.set-schedule').show();
                  $('#appoint-next').attr('type', 'submit');
                  
               }
            }

         }

         
      });


      


      $('#back-btn').click(function(){

         $('.type-of-appointment').show();
         $('.set-schedule').hide();

      });


      // $('.day input[type="radio"]:checked').click(function(){

      //    $('.day label').css("background", "var(--primary)");

      // });

   });
</script>
</html>