<?php 
   // session_start(); 
   include "./connection.php";
   include './queries.php';
?>

<table border="1">
   <thead>
      <tr>
         <td>Student No.</td>
         <td>Name</td>
         <td>Year Level</td>
         <td>Section</td>
         <td>Time-in</td>
      </tr>
   </thead>

   <tbody>
      <?php
         if(mysqli_num_rows($res_entrance_log) > 0){
         while($entered_student = mysqli_fetch_assoc($res_entrance_log)) {
            
            $student_name = $entered_student['lastname'].", ".$entered_student['firstname']." ".$entered_student['middle_initial'];

            
            $time_in = $entered_student['timein'];
            $time_in = new DateTime("$time_in");
            
            $time_in = $time_in->format("h:i A"); 
            
            
            if($entered_student['Status'] == 'Cleared') { ?>

               <tr>
                  <td style="background-color:#4EC745 "><?=$entered_student['student_number']?></td>
                  <td><?=$student_name?> </td>
                  <td><?=$entered_student['year_level']?></td>
                  <td><?=$entered_student['section']?>
                  <td><?=$time_in?></td>
               </tr>

            <?php } ?>

         <?php }

         } else { ?>

            <tr>
               <td colspan="5"> NO STUDENT </td>
            </tr>
            
         <?php }
      ?>
   </tbody>
</table>
