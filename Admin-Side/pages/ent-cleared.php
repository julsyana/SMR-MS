<?php
    include "../includes/function-header.php";

?>

           
           <table border="0">
                  <thead>
                     <tr>
                        <th> No. </th>
                        <th> Student No. </th>
                        <!-- <th> Fullname </th> -->
                        <th> Campus </th>
                        <th> Time in </th>
                        
                     </tr>
                  </thead>

                  <tbody>
                     <?php 
                        if(mysqli_num_rows($entrance_log) > 0){
                            $x = mysqli_num_rows($entrance_log);
                           while($rows = mysqli_fetch_assoc($entrance_log)){

                                 $logdate = $rows['logdate'];
                                 $logdate = new DateTime($logdate);
                                 $logdate = $logdate->format("F d, Y");

                                 $timein = $rows['timein'];
                                 $timein = new DateTime($timein);
                                 $timein = $timein->format("h:s A");
                              ?>
                              <tr>
                                 <td> <?=$x--?></td>
                                 <td> <?=$rows['student_number']?> </td>
                                 <!-- <td> Mark Melvin E. Bacabis </td> -->
                                 <td>  </td>
                                 <td>  <?=$timein.' - '.$logdate?> </td>
                              </tr>
                              
                              <?php
                           }

                        } else {

                            ?>
                              <tr>
                                 <td colspan="4"> No entrance log </td>
                                
                              </tr>
                              
                              <?php

                        }
                     ?>
                        
                    
                  </tbody>
               </table>
