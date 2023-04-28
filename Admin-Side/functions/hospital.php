<?php

function fetchHospital($conn){

   $sel = "SELECT * FROM `hospitals` WHERE `isArchive` = 0 ORDER BY `id` DESC";

   $qry = mysqli_query($conn, $sel);

   return $qry;

}

function fetchSelHospital($conn, $id){

   $sel = "SELECT * FROM `hospitals`
   WHERE `hospi_id` = '$id' AND `isArchive` = 0
   ORDER BY `id` DESC";

   $qry = mysqli_query($conn, $sel);

   return $qry;

}


function insertHospital($conn, $hospitalID, $name, $address, $email, $cnum){

   $ins = "INSERT INTO `hospitals`
   (`hospi_id`, `hospital`, `hospital_add`, `email`, `contact_num`) VALUES 
   ('$hospitalID','$name','$address','$email','$cnum')";

   $res = mysqli_query($conn, $ins);

   return $res;

}


function updateHospital($conn, $hosID, $hospitalName, $address, $email, $cnum){

   $upd = "UPDATE `hospitals` SET 
   `hospital`='$hospitalName',
   `hospital_add`='$address',
   `email`='$email',
   `contact_num`='$cnum' 
   WHERE `hospi_id` = '$hosID'";

   $res = mysqli_query($conn, $upd);

   return $res;

}


function archiveHospital($conn, $hosID, $date_today) {
   
   $sel = "SELECT * FROM `hospitals` WHERE `hospi_id` = '$hosID'";

   $sel_res = mysqli_query($conn, $sel);
   $hospital = mysqli_fetch_assoc($sel_res);

   $name = $hospital['hospital'];
   $arch_type = "hospital";
   $img = "";


   $ins = "INSERT INTO `archive`
   (`archive_id`, `archive_name`, `archive_type`, `archive_datetime`, `archive_img`) 
   VALUES 
   ('$hosID','$name','$arch_type','$date_today','$img')";

   $ins_res = mysqli_query($conn, $ins);

   if($ins_res){

      $del = "DELETE FROM `hospitals` WHERE `hospi_id` = '$hosID'";
      $del_res = mysqli_query($conn, $del);

   } else {

      $del_res = mysqli_error($conn);
      
   }

   return $del_res;

}

?>