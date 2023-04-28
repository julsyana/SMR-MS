<?php


function generateAppID($len){

   $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

   $code = '';

   for ($i = 0; $i < $len; $i++) {

       $code .= $characters[rand(0, strlen($characters) - 1)];
   }

   return $code;

}  

function selApp($conn, $appID){
    $sel = "SELECT * FROM `appointment`
    WHERE `app_id` = '$appID'";

    $res = mysqli_query($conn, $sel);

    $app = mysqli_fetch_assoc($res);

    return $app;
}


function selAllApp($conn){
    $sel = "SELECT * FROM `appointment` ORDER BY `id` DESC";

    $res = mysqli_query($conn, $sel);

    return $res;
}


function selAppSched($conn, $appID){
    $sel = "SELECT * FROM `appointment_dates`
    WHERE `app_id` = '$appID' 
    ORDER BY `app_dates` ASC";

    $res = mysqli_query($conn, $sel);

    return $res;
}

function insApp($conn, $appID, $appType, $dateFiled){

    $ins = "INSERT INTO `appointment`
    (`app_id`, `app_type`, `date_filed`)
    VALUES 
    ('$appID', '$appType', '$dateFiled')";

    $res = mysqli_query($conn, $ins);

    return $res;
}

function insAppSched($conn, $appID, $appDates, $appSlot){

    $ins = "INSERT INTO `appointment_dates`
    (`app_id`, `app_dates`, `app_slot`, `app_status`)
    VALUES 
    ('$appID', '$appDates', '$appSlot', 'on')";

    $res = mysqli_query($conn, $ins);

    return $res;
}


?>