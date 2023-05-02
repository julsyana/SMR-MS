<?php
    include "../includes/function-header.php";

    $sel = "SELECT * FROM `visitors` ORDER BY id DESC";

    $res = mysqli_query($conn, $sel);

?>

           
           <table border="0">
                  <thead>
                     <tr>
                        <th>No.</th>
                        <th> Fullname </th>
                        <!-- <th> Fullname </th> -->
                        <th> Contact Number </th>
                        <th> Purpose </th>
                        <th> Department </th>
                        <th> Campus </th>
                        <th> Time-in </th>
                       
                        
                     </tr>
                  </thead>

                  <tbody>
                     <?php 
                        if(mysqli_num_rows($res) > 0){
                            $x = mysqli_num_rows($res);
                           while($rows = mysqli_fetch_assoc($res)){
                                 
                                 
                                 $logdate = $rows['date'];
                                 $logdate = new DateTime($logdate);
                                 $logdate = $logdate->format("F d, Y");

                                 $timein = $rows['timein'];
                                 $timein = new DateTime($timein);
                                 $timein = $timein->format("h:s A");
                              ?>
                              <tr>
                                 <td> <?=$x--?></td>
                                 <td> <?=$rows['fullname']?> </td>
                                 <td>  <?=$rows['contact_num']?></td>
                                 <td>  <?=$rows['purpose']?></td>
                                 <td>  <?=$rows['department']?></td>
                                 <td>  </td>
                                 <td>  <?=$timein.' <br> '.$logdate?> </td>
                                 
                              </tr>
                              <?php
                           }

                        } else {

                            ?>
                              <tr>
                                 <td colspan="4"> No Vistors Log Yet</td>
                                
                              </tr>
                              
                              <?php

                        }
                     ?>
                        
                    
                  </tbody>
               </table>
