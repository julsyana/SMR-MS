
<?php

   include './connection.php';
   include "./queries.php";


   
   

?>

<table>
      <thead>

         <tr>
            <td>QR Code Value</td>
            <!-- <td>Name/td> -->
            <td>Role </td>
            <!-- <td> date</td> -->
            <td> Time-in </td>
         </tr>
      </thead>

      <tbody>

      <?php
         if(mysqli_num_rows($res_archive) > 0){

            while($archive = mysqli_fetch_assoc($res_archive)){ ?>

               <tr>
                  <td> <?=$archive['student_id']?> </td>
                  <td> <?=$archive['role']?> </td>
                  <td> <?=$archive['date_archive']?> <?=$archive['time']?> </td>
                 
               </tr>

         <?php   }

         } else { ?>

               <tr> <td colspan="3"> NO ARCHIVE </td> </tr>

         <?php }
      ?>
        
      </tbody>
   </table>