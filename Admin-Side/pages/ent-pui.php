<?php
    include "../includes/function-header.php";

    $sel = "SELECT * FROM `entrance_log`
    WHERE Status = 'PUI'    
    ORDER BY 'timein' DESC";

    $res = mysqli_query($conn, $sel);

?>

           
           <table border="0">
                  <thead>
                     <tr>
                        <th> No. </th>
                        <th> Student No. </th>
                        <th> Campus </th>
                        <th> Time in </th>
                       
                        
                     </tr>
                  </thead>

                  <tbody>
                     <?php 
                        if(mysqli_num_rows($res) > 0){
                            $x = mysqli_num_rows($res);
                           while($rows = mysqli_fetch_assoc($res)){
                                 
                                 
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
                                 <td>  </td>
                                 <td>  <?=$timein.' - '.$logdate?> </td>
                              </tr>
                              <?php
                           }

                        } else {

                            ?>
                              <tr>
                                 <td colspan="4"> No PUI Log Yet</td>
                                
                              </tr>
                              
                              <?php

                        }
                     ?>
                        
                    
                  </tbody>
               </table>
