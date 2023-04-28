<?php 

function moveFile($path, $file_name, $file_tmp_name, $file_tmp_error, $new_fileName){

   if($file_tmp_error === 0) {
         
      $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);

      $file_ext_lc = strtolower($file_ext);

      $allowed_ext = array("pdf");

      if(in_array($file_ext_lc, $allowed_ext)) {

         $new_img_name = $new_fileName.'.'.$file_ext_lc;

         $img_path = "$path/".$new_img_name;

         move_uploaded_file($file_tmp_name, $img_path);

      } else {

         $new_img_name = "error";

      }

      return $new_img_name;

   }

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



function generateReferenceNo($start, $len){

   $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';

   $charactersLength = strlen($characters);
   
   $randomString = '';

   for ($i = 0; $i < $len; $i++) {

      $randomString .= $characters[rand(0, $charactersLength - 1)];

   }

   $ref_no = $start.$randomString;
   
   return $ref_no;

}


?>