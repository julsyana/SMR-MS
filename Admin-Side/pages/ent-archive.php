<?php
    include "../includes/function-header.php";

    $sel = "SELECT * FROM `stud_archive` ORDER BY `id` DESC";

    $res = mysqli_query($conn, $sel);

?>

           
           <table border="0">
                  <thead>
                     <tr>
                        <th>No.</th>
                        <th> Qr Code Value </th>
                        <!-- <th> Fullname </th> -->
                        <th> Role </th>
                        <th> Campus </th>
                        <th> Time in </th>
                        <!-- <th> Time in </th> -->
                       
                        
                     </tr>
                  </thead>

                  <tbody>
                     <?php 
                        if(mysqli_num_rows($res) > 0){
                            $x = mysqli_num_rows($res);
                           while($rows = mysqli_fetch_assoc($res)){
                                 
                                 
                                 $logdate = $rows['date_archive'];
                                 $logdate = new DateTime($logdate);
                                 $logdate = $logdate->format("F d, Y");

                                 $timein = $rows['time'];
                                 $timein = new DateTime($timein);
                                 $timein = $timein->format("g:i A");
                              ?>
                              <tr>
                                 <td> <?=$x--?></td>
                                 <td> <?=$rows['student_id']?> </td>
                                 <td>  <?=$rows['role']?></td>
                                 <td> </td>
                                 <td>  <?=$timein.' - '.$logdate?> </td>
                                 <!-- <td>  <?=$timein?></td> -->
                                 
                              </tr>
                              <?php
                           }

                        } else {

                            ?>
                              <tr>
                                 <td colspan="4"> No Archive Log Yet</td>
                                
                              </tr>
                              
                              <?php

                        }
                     ?>
                        
                    
                  </tbody>
               </table>
