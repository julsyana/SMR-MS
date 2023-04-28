<?php

function fetchAllNurse($conn){

   $sel = "SELECT * FROM `nurses` WHERE `isArchive` = 0 ORDER BY `id` DESC";

   $res = mysqli_query($conn, $sel);

   return $res;

}

function fetchNurse($conn, $empID){

   $sel = "SELECT * FROM `nurses`
   WHERE `emp_id` = '$empID' AND `isArchive` = 0
   ORDER BY `id` DESC";

   $res = mysqli_query($conn, $sel);

   return $res;

}


function fetchScheduleByNurse($conn, $empID) {

   $sel = "SELECT *, LEFT(schedule_day, 3) AS `day` FROM `nurse_schedule`
   WHERE `emp_id` = '$empID'
   ORDER BY `id` ASC";

   $res = mysqli_query($conn, $sel);

   return $res;

}


function insertNurse($conn, $empID, $username, $password, $profilePic, $position, $campus, $email){

   $ins = "INSERT INTO `nurses`
   (`emp_id`, `username`, `password`, `profile_pic`,`position`, `campus`, `email`) 
   VALUES 
   ('$empID','$username','$password','$profilePic', '$position','$campus','$email')";

   $res = mysqli_query($conn, $ins);

   return $res;

}

function insertNurseSched($conn, $empID, $sched){

   $ins = "INSERT INTO `nurse_schedule`
   (`emp_id`, `schedule_day`) 
   VALUES 
   ('$empID','$sched')";

   $res = mysqli_query($conn, $ins);
   
   return $res;

}


function archiveNurse($conn, $uniqueId, $date_today) {
   
   $sel = "SELECT * FROM `nurses` WHERE `emp_id` = '$uniqueId'";

   $sel_res = mysqli_query($conn, $sel);
   $nurse = mysqli_fetch_assoc($sel_res);

   $uname = "(username) ".$nurse['username'];
   $arch_type = "nurse";
   $img = $nurse['profile_pic'];


   $ins = "INSERT INTO `archive`
   (`archive_id`, `archive_name`, `archive_type`, `archive_datetime`, `archive_img`) 
   VALUES 
   ('$uniqueId','$uname','$arch_type','$date_today','$img')";

   $ins_res = mysqli_query($conn, $ins);

   if($ins_res){

      $del = "DELETE FROM `nurses` WHERE `emp_id` = '$uniqueId'";
      $del_res = mysqli_query($conn, $del);

   } else {

      $del_res = mysqli_error($conn);
      
   }

   return $del_res;

}


?>