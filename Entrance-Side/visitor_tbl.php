<?php
   include "./connection.php";
   include "./queries.php";
?>

<table>
      <thead>

         <tr>
            <td>Name.</td>
            <td>Purpose</td>
            <td>Contact Number</td>
            <td>Department</td>
            <td>Time-In</td>
         </tr>
      </thead>

      <tbody>

      <?php if(mysqli_num_rows($res_visitor) > 0 ){

         while($visitor = mysqli_fetch_assoc($res_visitor)){ 
            
            $time_out = $visitor['timeout'];
            $time_in = $visitor['timein'];

            $time_in = new DateTime("$time_in");
            $time_in = $time_in->format("h:i A");

            $time_out = new DateTime("$time_out");
            $time_out = $time_out->format("h:i A");

            ?>
         
            <tr>
               <td> <?=$visitor['fullname']?> </td>
               <td> <?=$visitor['purpose']?> </td>
               <td> <?=$visitor['contact_num']?> </td>
               <td> <?=$visitor['department']?> </td>
               <td> <?=$time_in?> </td>
            </tr>

      <?php    }

      } else { ?>

            <tr> <td colspan="5"> NO VISITOR </td></tr>

      <?php } ?>
        
      </tbody>
   </table>

   <script>

   </script>