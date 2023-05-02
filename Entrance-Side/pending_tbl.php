<?php 

   include "./connection.php";

   // $sel_pending = "SELECT *, LEFT(b.middlename, 1) AS `middle_initial` FROM `entrance_log` a
   // JOIN `mis.student_info` b
   // ON a.student_number = b.student_id
   // JOIN `sample_stud_data` c
   // ON a.student_number = c.student_id
   // JOIN `mis.enrollment_status` d
   // ON a.student_number = d.student_id
   // WHERE c.Status = 'Pending' AND a.logdate = CURRENT_DATE() ORDER BY a.id DESC LIMIT 6;";

   $sel_pending = "SELECT *, LEFT(b.middlename, 1) AS `middle_initial` FROM `entrance_log` a
   JOIN `mis.student_info` b
   ON a.student_number = b.student_id
   JOIN `sample_stud_data` c
   ON a.student_number = c.student_id
   JOIN `mis.enrollment_status` d
   ON a.student_number = d.student_id
   WHERE a.Status = 'PUI' AND a.logdate = CURRENT_DATE() ORDER BY a.id DESC LIMIT 6;";

   $res_pending = mysqli_query($conn, $sel_pending);

?>


<table>
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
         <?php if(mysqli_num_rows($res_pending) > 0 ){

            while($pending = mysqli_fetch_assoc($res_pending)){ 

            $time_in = $pending['timein'];
            $time_in = new DateTime("$time_in");
            
            $time_in = $time_in->format("h:i A"); 

            ?>
               <tr>
                  <td> <?=$pending['student_id']?> </td>
                  <td> 
                     <?=$pending['lastname']?>, <?=$pending['firstname']?> <?=$pending['middle_initial']?> 
                  </td>
                  <td> <?=$pending['year_level']?> </td>
                  <td> <?=$pending['section']?> </td>
                  <td> <?=$time_in?> </td>
               </tr>
               <?php   }

         } else { ?>

               <tr> <td colspan="5"> NO PUI YET </td> </tr>
        <?php } ?>
      </tbody>
</table>