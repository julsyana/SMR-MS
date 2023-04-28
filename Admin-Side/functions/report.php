<?php

function fetchReport($conn){
   $sel = "SELECT *, LEFT(b.middlename, 1) as `mi` FROM `stud_appointment` a
   JOIN `mis.student_info` b
   ON a.student_id = b.student_id
   JOIN `mis.enrollment_status` c
   ON a.student_id = c.student_id
   ORDER BY a.id DESC LIMIT 5";

   $res = mysqli_query($conn, $sel);
   
   return $res;
}

function totalService($conn, $service){

   $cnt = "SELECT * FROM `stud_appointment` WHERE `app_type` = '$service'";
   $res = mysqli_query($conn, $cnt);
   $total = mysqli_num_rows($res);

   return $total;

}  

?>