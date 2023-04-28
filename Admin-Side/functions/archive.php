<?php

function fetchArchive($conn){

   $sel = "SELECT * FROM `archive` ORDER BY `id` DESC";

   $res = mysqli_query($conn, $sel);

   return $res;
}

?>