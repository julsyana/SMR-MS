<?php

function fetchMedicine($conn){

   $sel = "SELECT * FROM `medicine` WHERE `isArchive` = 0 ORDER BY `id` DESC";

   $res = mysqli_query($conn, $sel);

   return $res;
}


function fetchSelMedicine($conn, $prodID){

   $sel = "SELECT * FROM `medicine`
   WHERE `prod_id` = '$prodID' AND `isArchive` = 0";

   $res = mysqli_query($conn, $sel);

   return $res;
}



function insertMed($conn, $medID, $medName, $medQty, $expDate, $medDesc, $imgName, $medCampus, $qrCode) {

   $ins = "INSERT INTO `medicine`
   (`prod_id`, `name`, `image`, `num_stocks`, `expirationDate`, `description`, `campus`, `qr_code`) VALUES
   ('$medID','$medName','$imgName','$medQty','$expDate','$medDesc','$medCampus','$qrCode')";

   $res = mysqli_query($conn, $ins);

   return $res;

}

function updMed($conn, $med_id, $med_stocks, $med_expDate, $med_campus){
   $upd = "UPDATE `medicine` SET `num_stocks`='$med_stocks', `expirationDate`='$med_expDate',`campus`='$med_campus' WHERE prod_id = '$med_id'";

   $res = mysqli_query($conn, $upd);

   return $res;
}

function delMed($conn, $med_id){
   $del = "DELETE FROM `medicine` WHERE prod_id = '$med_id'";
   
   $res = mysqli_query($conn, $del);

   return $res;
}

function archiveMedicine($conn, $med_id, $date_today) {
   
   $sel = "SELECT * FROM `medicine` WHERE `prod_id` = '$med_id'";

   $sel_res = mysqli_query($conn, $sel);
   $med = mysqli_fetch_assoc($sel_res);

   $name = $med['name'];
   $arch_type = "medicine";
   $img = $med['image'];;


   $ins = "INSERT INTO `archive`
   (`archive_id`, `archive_name`, `archive_type`, `archive_datetime`, `archive_img`) 
   VALUES 
   ('$med_id','$name','$arch_type','$date_today','$img')";

   $ins_res = mysqli_query($conn, $ins);

   if($ins_res){

      $del = "DELETE FROM `medicine` WHERE `prod_id` = '$med_id'";
      $del_res = mysqli_query($conn, $del);

   } else {

      $del_res = mysqli_error($conn);
      
   }

   return $del_res;

}

?>