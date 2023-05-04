<?php
   include "../../includes/db_conn.php";
   include "../../functions/report.php";


   // select all student appointment
   $stud_app = fetchReport($conn);

   $total_medical = totalService($conn, "Medical");
   $total_dental = totalService($conn, "Dental");


?>

               <div class="report-box">

                  <div class="report-header">
                     <h2> Appointments report </h2>
                  </div>


                  <!-- <div class="graphical-data" id="graphical-data">
                     <div class="graph">
                        <div class="graph-title">
                           <h3> total number of appointments </h3>
                        </div>
                        
                        <div class="line-graph">
                           <canvas class="apps-lineGraph"></canvas>
                        </div>

                        

                     </div>

                     <div class="graph">
                        <div class="graph-title">
                           <h3> services </h3>
                        </div>

                        <div class="pie-chart">
                           <canvas class="apps-pieChart"></canvas>
                        </div>
                     </div>
                  </div> -->

                  <div class="list-of-data-tbl" id="divToPrint">
                     
                     <table border="0">
                        <thead>
                           <tr> 
                              <th> Student Name </th>
                              <th> Gender </th>
                              <th> Course </th>
                              <th> Section </th>
                              <th> Appointment type </th>
                              <th> Date of Appointments </th>
                              <th> Time of Appointments </th>
                              <!-- <th> Nurse Assisted </th> -->
                              <th> Campus </th>
                              <th> Date of Appointments Created </th>
                           </tr>
                        </thead>

                        <tbody>
                           <?php 
                              if(mysqli_num_rows($stud_app) > 0){
                                 while($row = mysqli_fetch_assoc($stud_app)){

                                    $app_date = $row['app_date'];
                                    $app_date = new DateTime($app_date);
                                    $app_date = $app_date->format("F d, Y");

                                    ?>
                                    
                                       <tr> 
                                          <td> <?=$row['lastname']?>, <?=$row['firstname']?> <?=$row['mi']?>.  </td>
                                          <td> <?=$row['gender']?> </td>
                                          <td> <?=$row['program']?> </td>
                                          <td> <?=$row['section']?> </td>
                                          <td> <?=$row['app_type']?> Service </td>
                                          <!-- <td> <?=$row['app_reason']?> </td> -->
                                          <td> <?=$app_date?> </td>
                                          <td> <?=$row['app_time']?> </td>
                                          <!-- <td>  </td> -->
                                          <td> <?=$row['branch']?> </td>
                                          <td> <?=$row['date_apply']?> </td>
                                          <!-- <td style="text-transform: capitalize"> <?=$row['app_status']?> </td> -->
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
                  <i class="fas fa-print"><input style="background: #3E64FF;" type="button" value="print" onclick="PrintDiv();" /></i>
                  <!-- <button id="printAppointment"> <i class="fas fa-print"></i> Print </button>  -->
                  or 
                  <a href="#"> <i class="fa fa-download" aria-hidden="true"></i> Download </a>
               </div>

<script type="text/javascript">     
    function PrintDiv() {    
       var divToPrint = document.getElementById('divToPrint');
       var popupWin = window.open('', '_blank', 'width=300,height=300');
       popupWin.document.open();
       popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
            }
 </script>

<!-- charts -->
<?php
   include "../../js/charts/line-chart.php";
   include "../../js/charts/pie-chart.php";

?>