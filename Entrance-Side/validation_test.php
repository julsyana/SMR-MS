<?php
   error_reporting(0);
   // session_start();

   include "./connection.php";
   include "./function.php";
   include "./date.php";
 
 

   $stud_id = $_POST['stud_id'];
   $qr_val = $_POST['stud_id'];
   
   // checks if scanned student id exists in `stud_data` table
   $sel_stud_query = "SELECT * FROM `mis.student_info` a
   JOIN `sample_stud_data` b
   ON a.student_id = b.student_id WHERE a.student_id = '$stud_id'";
   
   $res_stud = mysqli_query($conn, $sel_stud_query);


   if(mysqli_num_rows($res_stud) === 1) {

      // echo "this $stud_id exist";

      $existing_stud = mysqli_fetch_assoc($res_stud);
      
      $student_id = $existing_stud['student_id'];
      $fullname = $existing_stud['firstname']." ".$existing_stud['lastname'];
      $role = 'student';
      
      $status = $existing_stud['Status'];
      

      $timein = "$date_today $time_today";

      // echo "$student_id: $role, $timein, $date, $status";

      $sel_appointment_today = "SELECT * FROM `stud_appointment` a
      JOIN `mis.student_info` b
      ON a.student_id = b.student_id
      JOIN `sample_stud_data` c
      ON a.student_id = c.student_id
      WHERE  a.student_id = '$student_id' AND a.`app_date` = CURRENT_DATE();";

      $res_appointment_today = mysqli_query($conn, $sel_appointment_today);

      if($status === 'Not Cleared') { 
         
         if(mysqli_num_rows($res_appointment_today) == 1) {

            $total = mysqli_num_rows($res_appointment_today);
            $appointment_stud = mysqli_fetch_assoc($res_appointment_today);
            $student_id = $appointment_stud['student_id'];
            $message = "HAS AN APPOINTMENT TODAY";
            $fullname = $appointment_stud['firstname']." ".$appointment_stud['lastname'];
            $status = $appointment_stud['Status'];

            ?>

            <script>
               $(document).ready(function(){

                  var role = "<?=$role?>";
                  var stud_id = "<?=$student_id?>";
                  var total = "<?=$total?>";
                  var mess = "<?=$message?>";
                  var fullname = "<?=$fullname?>";
                  var status = "<?=$status?>";
               
               
                  $('#not-verified').show();
               
                  $('#not-verified').load('./message.php', {

                     stud_id: stud_id,
                     total:total,
                     mess: mess,
                     fullname: fullname,
                     status: status,
                     role: role     
                               
                  });
               
               });
            </script> 


         <?php } 
         
         else {

            $total = mysqli_num_rows($res_appointment_today);
            
            $message = "NO APPOINTMENT TODAY"; ?>
            

            <script>

               $(document).ready(function(){

                  var role = "<?=$role?>";
                  var stud_id = "<?=$student_id?>";
                  var total = "<?=$total?>";
                  var mess = "<?=$message?>";
                  var fullname = "<?=$fullname?>";
                  var status = "<?=$status?>";

                  $('#not-verified').show();
   
                  $('#not-verified').load('./message.php', {

                     role: role,
                     total:total,
                     mess: mess,
                     fullname: fullname,
                     status: status,
                     stud_id: stud_id

                  });
   
               });

            </script> 
            

         <?php } 
      
            include "./entrance_log.php"; 

      } else {

            $res_ins = entrance_log($conn, $student_id, $time_today, $date_today);

            if(!$res_ins) {
               
               echo mysqli_error($conn);
            
            }
            else{  ?>

               <script>
                  $(document).ready(function(){
                  
                     var mess = 'Cleared';
                     var fullname = "<?=$fullname?>";

                     // $('.message p').css("background-color", 'red');

                     $('.message').load('./message.php', {

                        mess: mess,
                        fullname: fullname

                     });

                     $('.numerical').load('./total.php');


                  });
            </script> 
               
            <?php 
               include "./entrance_log.php";

            }


      }
     

   } else { 

      $role = 'outsider';
      
      if(archive($conn, $stud_id, $role, $date_today, $time_today)) {  
         
         include "./entrance_log.php";
         ?> 
         
         <script>
            
            $(document).ready(function(){
               
               var role = "<?=$role?>";
               // var mess = 'verified';
               var qr_val = "<?=$qr_val?>";
               

               $('#not-verified').show();
               
               $('#not-verified').load('./message.php', {

                  role: role,
                  qr_val: qr_val

               });
   
               


            });
         </script>
         

      <?php }

      
    
   }




   // echo "hello world";

?>

