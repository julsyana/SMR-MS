<?php

function fetchDept($conn){

   $sel = "SELECT * FROM `departments` WHERE isArchive = 0";
   $res = mysqli_query($conn, $sel);

   return $res;
}

function fetchSelDept($conn, $dept_id){

   $sel = "SELECT * FROM `departments` WHERE `emp_id` = '$dept_id' and isArchive = 0";
   $res = mysqli_query($conn, $sel);

   return $res;

}


// function insertDept($conn, $empId, $name, $building, $room, $image, $fname, $lname, $email, $cnum, $position){

   function insertDept($conn, $empId, $name, $building, $room, $image, $course_program, $email){

   $ins = "INSERT INTO `departments`
   (`emp_id`, `dept_name`, `building_name`, `room_num`, `image`, `course_program`, `email`) VALUES 
   ('$empId','$name','$building','$room','$image','$course_program','$email')";

   $res = mysqli_query($conn, $ins);

   return $res;

}


function updateDept($conn, $empId, $building, $room, $image, $course_program, $email){

   if($image == null){

      $upd = "UPDATE `departments` SET 
      `building_name`='$building',
      `room_num` = '$room',
      `course_program`='$course_program',
      `email`='$email'
      WHERE `emp_id` = '$empId' ";

   } else {

      $upd = "UPDATE `departments` SET 
      `building_name`='$building',
      `room_num` = '$room',
      `image` = '$image',
      `course_program`='$course_program',
      `email`='$email'
      WHERE `emp_id` = '$empId' ";

   }

   $res = mysqli_query($conn, $upd);

   return $res;

}


function archiveDept($conn, $empId, $date_today) {
   
   $sel = "SELECT * FROM `departments` WHERE `emp_id` = '$empId'";

   $sel_res = mysqli_query($conn, $sel);
   $dept = mysqli_fetch_assoc($sel_res);

   $fname = $dept['firstname'];
   $lname = $dept['lastname'];
   $arch_type = "department";
   $img = $dept['image'];


   $ins = "INSERT INTO `archive`
   (`archive_id`, `archive_name`, `archive_type`, `archive_datetime`, `archive_img`) 
   VALUES 
   ('$empId','$fname $lname','$arch_type','$date_today','$img')";

   $ins_res = mysqli_query($conn, $ins);

   if($ins_res){

      $del = "DELETE FROM `departments` WHERE `emp_id` = '$empId'";
      $del_res = mysqli_query($conn, $del);

   } else {

      $del_res = mysqli_error($conn);
      
   }

   return $del_res;

}


?>