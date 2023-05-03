<?php
   include "../../includes/db_conn.php";
   include "../../functions/report.php";


   // select all student appointment
  $medicineRes = fetchMeds($conn);
  


?>

               <div class="report-box">

                  <div class="report-header">
                     <h2> Medicines report </h2>
                  </div>


                  <!-- <div class="graphical-data" id="graphical-data">
                     <div class="graph">
                        <div class="graph-title">
                           <h3> total number of appointments </h3>
                        </div>
                        
                        <div class="line-graph">
                           <canvas class="con-lineGraph"></canvas>
                        </div>

                        

                     </div>

                     <div class="graph">
                        <div class="graph-title">
                           <h3> services </h3>
                        </div>

                        <div class="pie-chart">
                           <canvas class="con-pieChart"></canvas>
                        </div>
                     </div>
                  </div> -->

                  <div class="list-of-data-tbl">
                     
                     <table border="0">
                        <thead>
                           <tr> 
                              <th> Medicine/Supply </th>
                              <th> Expiration Date </th>
                              <th> Total Quantity</th>
                              <!-- <th> Total of Left Medicines </th>
                              <th> Total of Reduced Medicines </th> -->
                              <th> SB (San Bartolome) </th>
                              <th> BAT (Batasan) </th>
                              <th> SF (San Fransisco) </th>
                           </tr>
                        </thead>

                        <tbody>
                           <?php 
                              if(mysqli_num_rows($medicineRes) > 0){
                                 while($row = mysqli_fetch_assoc($medicineRes)){

                                    // $sanBartolome = totalBranch($conn, $row['campus']);
                                    $totalQty = totalQty($conn, $row['name']);
                                    

                                    // $app_date = $row['app_date'];
                                    // $app_date = new DateTime($app_date);
                                    // $app_date = $app_date->format("F d, Y");

                                    ?>
                                    
                                       <tr> 
                                          <td> <?=$row['name']?> </td>
                                          <td> <?=$row['expirationDate']?></td>
                                          <td> <?=$totalQty['total']?> </td>
                                          <!-- <td>  Service </td>
                                          <td>  </td> -->
                                          <td> <?=$totalQty['sanBartolome']?> </td>
                                          <td> <?=$totalQty['batasan']?> </td>
                                          <td> <?=$totalQty['sanFrancisco']?> </td>
                                          <!-- <td> , RN </td> -->
                                          <td style="text-transform: capitalize">  </td>
                                       </tr>
                                    
                                    
                                    <?php


                                 }

                              } else {

                              }
                           ?>
                           
                        </tbody>
                     </table>
                  </div>

               

               </div>

               <div class="form-button">
                  <button id="printAppointment"> <i class="fas fa-print"></i> Print </button> 
                  or 
                  <a href="#"> <i class="fa fa-download" aria-hidden="true"></i> Download </a>
               </div>


<!-- charts -->
<?php
   include "../../js/charts/line-chart.php";
   include "../../js/charts/pie-chart.php";
?>