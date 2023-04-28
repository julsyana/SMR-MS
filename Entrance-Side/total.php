<?php
   error_reporting(0);
   include './connection.php';
   include './queries.php';

?>


<ul>
   <li id="total"> Total <br> <?php echo $overall_total;?> </li>
   <li id="verified"> Verified <br> <?php echo $verified_total;?> </li>
   <li id="problem"> Pending <br> <?php echo $notverified_total?></li>
   <li id="visitor">Visitor <br> <?=$total_visitor?> </li>
   <li id="invalid">Archive <br> <?=$archive_total?> </li>
</ul>