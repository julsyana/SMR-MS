<?php
   
   include "../../includes/db_con.php";
   include "../../includes/date.php";

   $selAvailableDates = "SELECT DISTINCT(b.app_dates) FROM `appointment` a
   JOIN `appointment_dates` b
   ON a.app_id = b.app_id
   WHERE b.app_dates > CURDATE() AND b.app_status = 'on'";

   $med_type = $_POST['med_type'];

   switch($med_type){

      case "Medical":

         $selAvailableDates .= " AND a.app_type = '$med_type'";

         break;

      case "Dental":

         $selAvailableDates .= " AND a.app_type = '$med_type'";

         break;

   }

   $selAvailableDates .= " ORDER BY b.app_dates ASC";

   // echo $selAvailableDates;
   $result = mysqli_query($conn, $selAvailableDates);

   if(mysqli_num_rows($result) > 0){

      ?>
   
      <option> --Select Available Dates-- </option>

      <?php

      while($row = mysqli_fetch_assoc($result)){ 

         $format = $row['app_dates'];
         $format = new DateTime($format);
         $format = $format->format("F d, Y");
         
      ?>

      <option value="<?=$row['app_dates']?>"> <?=$format?> </option>

      <?php

      }
   } else { ?>
   
   <option> No Available Dates </option>

   <?php }


?>




