<?php


include('../../phpqrcode/qrlib.php');

   
function generateQR($tempDir, $codeContents){

   $fileName = $codeContents.'.png';

   $pngAbsoluteFilePath = $tempDir.$fileName;
   
   // generating
   if (!file_exists($pngAbsoluteFilePath)) {

       QRcode::png($codeContents, $pngAbsoluteFilePath);

   }

   return $fileName;

}



function convertDate($date){

   $date = new DateTime("$date");
   $date = $date->format('F d, Y');

   return $date;
}

function convertTime($time){

   $time = new DateTime("$time");
   $time = $time->format('h:i A');

   return $time;
}

function generateID($len){

   $characters = '0123456789';

   $code = '';

   for ($i = 0; $i < $len; $i++) {

       $code .= $characters[rand(0, strlen($characters) - 1)];
   }

   return $code;

}

function generatePassword($len){

   $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@$';

   $code = '';

   for ($i = 0; $i < $len; $i++) {

       $code .= $characters[rand(0, strlen($characters) - 1)];
   }

   return $code;
}

function moveImg($path, $file_name, $file_tmp_name, $file_tmp_error){

   if($file_tmp_error === 0) {
         
      $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);

      $file_ext_lc = strtolower($file_ext);

      $file_name_lc = strtolower($file_name);

      $allowed_ext = array("png", "jpg", "jpeg");

      if(in_array($file_ext_lc, $allowed_ext)) {

         $new_img_name = $file_name_lc;

         $img_path = "$path/".$new_img_name;

         move_uploaded_file($file_tmp_name, $img_path);

      } else {

         $new_img_name = "error";

      }

      return $new_img_name;

   }

}

function Archive($conn, $id, $type, $datetime){
   
   switch($type){

      case "admin":

         $archive = "UPDATE `admins`
         SET `isArchive` = 1
         WHERE `unique_id` = '$id'";

         $sel = mysqli_query($conn, "SELECT * FROM `admins` WHERE `unique_id` = '$id'");
         $res = mysqli_fetch_assoc($sel);
         $name = $res['fname']." ".$res['lname'];
         $imgName = $res['img'];

         break;

         case "departments":

         $archive = "UPDATE `departments`
         SET `isArchive` = 1
         WHERE `emp_id` = '$id'";

         $sel = mysqli_query($conn, "SELECT * FROM `departments` WHERE `emp_id` = '$id'");
         $res = mysqli_fetch_assoc($sel);
         $name = $res['firstname']." ".$res['lastname'];
         $imgName = $res['image'];

         break;

      case "nurse":
         $archive = "UPDATE `nurses`
         SET `isArchive` = 1
         WHERE `emp_id` = '$id'";

         $sel = mysqli_query($conn, "SELECT * FROM `nurses` WHERE `emp_id` = '$id'");
         $res = mysqli_fetch_assoc($sel);
         $name = $res['firstname']." ".$res['lastname'];
         $imgName = $res['profile_pic'];

         break;

      case "medicine":
         $archive = "UPDATE `medicine`
         SET `isArchive` = 1
         WHERE `prod_id` = '$id'";

         $sel = mysqli_query($conn, "SELECT * FROM `medicine` WHERE `prod_id` = '$id'");
         $res = mysqli_fetch_assoc($sel);
         $name = $res['name'];
         $imgName = $res['image'];

         break;

      case "hospital":
         $archive = "UPDATE `hospitals`
         SET `isArchive` = 1
         WHERE `hospi_id` = '$id'";

         $sel = mysqli_query($conn, "SELECT * FROM `hospitals` WHERE `hospi_id` = '$id'");
         $res = mysqli_fetch_assoc($sel);
         $name = $res['hospital'];
         $imgName = null;

         break;

   }

   $archived = mysqli_query($conn, $archive);

   if($archived){
      $ins = "INSERT INTO `archive`(`archive_id`, `archive_name`, `archive_type`, `archive_datetime`, `archive_img`) 
      VALUES
      ('$id','$name','$type','$datetime','$imgName')";

      $insert_archive = mysqli_query($conn, $ins);
   }

   return $insert_archive;
   
}

function delPermanentArchive($conn, $id){

   $del = mysqli_query($conn, "DELETE FROM `archive` WHERE `archive_id` = '$id'; ");

   return $del;
}

function unArchive($conn, $id){

   $sel = "SELECT * FROM `archive` WHERE `archive_id` = '$id'";

   $res = mysqli_query($conn, $sel);
   $archive = mysqli_fetch_assoc($res);

   $type = $archive['archive_type'];

   switch($type){

      case "admin":

         $unarchive = "UPDATE `admins`
         SET `isArchive` = 0
         WHERE `unique_id` = '$id'";
         break;

         case "departments":
         $unarchive = "UPDATE `departments`
         SET `isArchive` = 0
         WHERE `emp_id` = '$id'";

         break;

      case "nurse":
         $unarchive = "UPDATE `nurses`
         SET `isArchive` = 0
         WHERE `emp_id` = '$id'";
         break;

      case "medicine":
         $unarchive = "UPDATE `medicine`
         SET `isArchive` = 0
         WHERE `prod_id` = '$id'";
         break;

      case "hospital":
         $unarchive = "UPDATE `hospitals`
         SET `isArchive` = 0
         WHERE `hospi_id` = '$id'";

         break;
   }

   $unarchived = mysqli_query($conn, $unarchive);

   if($unarchived){

      $del = delPermanentArchive($conn, $id);
      
   }
   
   return $del;
}


?>