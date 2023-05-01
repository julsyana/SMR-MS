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
                           
                           <button type="button" id="appoint-next"> Next </button>

                        </div>


                     </div>

                  </div>

                  <div class="set-schedule">

                     <div class="header-title">
                        <p> Please select your preferred date & time </p>
                     </div>

                     <div class="calendar-container">

                        <div class="calendar">

                           <div class="month-year-button">

                              <h3 class="mos-year"> <span class="month"> March </span> <span class="year"> 2023 </span>  </h3>

                              <!-- <div class="button-next-prev">
                                 <div class="btn prev-btn">
                                    <button type="button"> 
                                       <i class="fas fa-less-than"></i> 
                                    </button>                               
                                 </div>

                                 <div class="btn next-btn">
                                    <button type="button"> 
                                       <i class="fas fa-greater-than"></i>
                                    </button>
                                 </div>
                              </div> -->
                           </div>


                           <div class="weeks">
                              <div class="week">
                                 <p> Sun </p>
                              </div>

                              <div class="week">
                                 <p> Mon </p>
                              </div>

                              <div class="week">
                                 <p> Tue </p>
                              </div>

                              <div class="week">
                                 <p> Wed </p>
                              </div>

                              <div class="week">
                                 <p> Thu </p>
                              </div>

                              <div class="week">
                                 <p> Fri </p>
                              </div>

                              <div class="week">
                                 <p> Sat </p>
                              </div>
                           </div>


                           <div class="days">
                              <!-- <div class="day prev-date">
                                 <label for="1"> 1 </label> 
                                 <input type="radio" name="day" id="1"> 
                              </div>

                              <div class="day prev-date">
                                 <label for="2"> 2 </label> 
                                 <input type="radio" name="day" id="2"> 
                              </div> -->

                           </div>
                        </div>

                        <div class="time-slot">
                           <table border="0">
                              <thead>
                                 <tr> 
                                    <th width="50%"> Time </th>
                                    <th> Available Slots </th>
                                 </tr>
                              </thead>

                              <tbody>
                                 <tr>
                                    <td>
                                       <input type="radio" value="8:00 AM - 10:00 AM" name="timeSlot" id="time1" hidden required> 
                                       <label for="time1"> 8:00 AM - 10:00 AM </label>
                                    </td>

                                    <td> 12 </td>
                                 </tr>

                                 <tr>
                                    <td>
                                       <input type="radio" value="10:00 AM - 12:00 PM" name="timeSlot" id="time2" hidden required> 
                                       <label for="time2"> 10:00 AM - 12:00 PM </label>
                                    </td>

                                    <td> 12 </td>
                                 </tr>

                                 <tr>
                                    <td>
                                       <input type="radio" value="1:00 PM - 3:00 PM" name="timeSlot" id="time3" hidden required> 
                                       <label for="time3"> 1:00 PM - 3:00 PM </label>
                                    </td>

                                    <td> 12 </td>
                                 </tr>

                                 <tr>
                                    <td>
                                       <input type="radio" value="3:00 PM - 5:00 PM" name="timeSlot" id="time5" hidden required> 
                                       <label for="time5"> 3:00 PM - 5:00 PM </label>
                                    </td>

                                    <td> 12 </td>
                                 </tr>
                              </tbody>
                           </table>
                        </div>
                     </div>

                     

                     <div class="form-button-next">
                        <button type="button" id="back-btn"> back </button>
                        <button type="submit" name="submitBtn" id="submit-btn"> Submit </button>
                     </div>

                  </div>

               </form>

            </div>

         </div>

      </div>

   </main>

</body>

<script src="../js/calendar.js"></script>  
<script src="../js/image_viewer.js"> </script>

<script>
   $(document).ready(function(){

      $('.type-of-appointment').show();
      $('.set-schedule').hide();


      $('#appoint-next').click(function(){

         let fileLen = `${document.getElementById('multi-image').files.length}`;

         // console.log($('#med-type').val());

         if($('#med-type').val() === ''){

            $('.type-message').html("Required!");
            $('.roa-message').html("");
            $('.message-validation').html('<span style="color: var(--decline);"></span>');
            
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

                  $('.type-of-appointment').hide();
                  $('.set-schedule').show();

                  
               }

               
            } else if ($('#med-type').val() === 'Dental'){

               $('.type-message').html("");
               $('.roa-message').html("Required!");
               $('.message-validation').html('<span style="color: var(--decline);"></span>');

               if($('#roa').val() === ''){
                  
                  $('.roa-message').html("Required!");
                  
               } else {
                  
                  $('.roa-message').html("");
                  $('.type-of-appointment').hide();
                  $('.set-schedule').show();
                  
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