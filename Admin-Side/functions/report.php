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


function fetchConsult($conn){
   $sel = "SELECT *, LEFT(b.middlename, 1) as mi FROM consultations a
JOIN `mis.student_info` b
ON a.student_id = b.student_id
JOIN `mis.enrollment_status` c 
ON a.student_id = c.student_id ORDER BY a.id DESC;";

   $res = mysqli_query($conn, $sel);
   
   return $res;
}

function totalService($conn, $service){

   $cnt = "SELECT * FROM `stud_appointment` WHERE `app_type` = '$service'";
   $res = mysqli_query($conn, $cnt);
   $total = mysqli_num_rows($res);

   return $total;

}  


function fetchMeds($conn){

   $cnt = "SELECT DISTINCT(name),expirationDate FROM `medicine`";
   $res = mysqli_query($conn, $cnt);
   // $total = mysqli_num_rows($res);

   return $res;

}  

function totalBranch($conn, $branch){
   $cnt = "SELECT sum(num_stocks) as total FROM `medicine` WHERE campus = '$branch'";
   $res = mysqli_query($conn, $cnt);

   $total = mysqli_fetch_assoc($res);

   return $total;
}


function totalQty($conn, $medicine){
   $cnt = "SELECT prod_id, SUM(num_stocks) as total, 
SUM((SELECT num_stocks FROM medicine WHERE campus = 'San Bartolome' AND prod_id = a.prod_id)) as sanBartolome,
SUM((SELECT num_stocks FROM medicine WHERE campus = 'Batasan' AND prod_id = a.prod_id)) as batasan,
SUM((SELECT num_stocks FROM medicine WHERE campus = 'San Francisco' AND prod_id = a.prod_id)) as sanFrancisco
FROM medicine as a WHERE name = '$medicine'";
   $res = mysqli_query($conn, $cnt);

   $total = mysqli_fetch_assoc($res);

   return $total;
}


?>