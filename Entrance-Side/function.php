<?php

   function archive($conn, $stud_id, $role, $date, $time){
      
      $ins = "INSERT INTO `stud_archive`(`student_id`, `role`, `date_archive`, `time`) VALUES ('$stud_id','$role','$date', '$time')";

      $res = mysqli_query($conn, $ins);

 
      return $res;
   }


   
   function entrance_log($conn, $stud_id, $timein, $logdate){

      $ins_stud_log_query = "INSERT INTO entrance_log
      (`student_number`, `timein`, `logdate`, `Status`) 
      SELECT '$stud_id', '$timein', '$logdate',`Status`
      FROM `sample_stud_data` WHERE student_id = '$stud_id'";

      $res = mysqli_query($conn, $ins_stud_log_query);

      return $res;

   }

   
   function pending($conn, $stud_id) {

      $upd = "UPDATE `sample_stud_data` SET `Status`='PUI' WHERE `student_id` = '$stud_id'";

      $res = mysqli_query($conn, $upd);

      return $res;
   }

?>