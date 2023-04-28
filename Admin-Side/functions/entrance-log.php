<?php

function fetchEntrance($conn){
   // $sel = "SELECT *, b.middlename as `middle_initial` FROM `entrance_log` a
   // JOIN `mis.student_info` b 
   // ON a.student_number = b.student_id
   // ORDER BY a.id DESC";

   $sel = "SELECT * FROM `entrance_log` ORDER BY id DESC";

   $res = mysqli_query($conn, $sel);

   return $res;
}

?>