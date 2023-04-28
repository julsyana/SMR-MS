<?php
   include "../includes/function-header.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title> SMRMS | ADMIN | Report </title>
   <?php include "../includes/head.php"; ?>



   
   <!-- pdfmake cdn -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js" integrity="sha512-a9NgEEK7tsCvABL7KqtUTQjl69z7091EVPpw5KxPlZ93T141ffe1woLtbXTX+r2/8TtTvRX/v4zTL2UlMUPgwg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

   <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js" integrity="sha512-pAoMgvsSBQTe8P3og+SAnjILwnti03Kz92V3Mxm0WOtHuA482QeldNM5wEdnKwjOnQ/X11IM6Dn3nbmvOz365g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

   <!-- custom css -->
   <link rel="stylesheet" href="../css/reports.css">
   
   
</head>
<body>

   <nav class="side-panel">

      <div class="nav-header">
         <div class="img-logo">
            <div class="img-handler">

               <img src="../assets/QCUClinicLogo.png" alt="QCUClinicLogo.png">
            </div>
         </div>

         <div class="title-logo">
            <p> Student Medical Record </p>
         </div>
      </div>

      <div class="primary-nav">
         <ul>
            <li>
               <a href="./dashboard.php" >
                  <i class="fas fa-chart-area fas-line"></i> Dashboard
               </a>
            </li>

            <li>
               <a href="./admin.php" >
                  <i class="fas fa-users-cog"></i> Admins
               </a>
            </li>

            <li>
               <a href="./department.php" >
                  <i class="fas fa-building    "></i> Departments
               </a>
            </li>

            <li>
               <a href="./nurses.php">
                  <i class="fas fa-user-shield    "></i> Nurses
               </a>
            </li>

            <li>
               <a href="./hospital.php">
                  <i class="fas fa-hospital    "></i> Hospital
               </a>
            </li>

            <li>
               <a href="./medicine.php">
                  <i class="fas fa-medkit    "></i> Medicines
               </a>
            </li>

            <li>
               <a href="./appointment.php">
                  <i class="fas fa-calendar-check    "></i> Appointments
               </a>
            </li>

            <li>
               <a href="./reports.php" class="isSelected">
                  <i class="fas fa-folder-open    "></i> Reports
               </a>
            </li>

            <li>
               <a href="./archive.php">
                  <i class="fas fa-archive    "></i> Archive
               </a>
            </li>

            <li>
               <a href="./entrance-log.php">
                  <i class="fas fa-address-book    "></i> Entrance Log
               </a>
            </li>
         </ul>
      </div>
   </nav>

   <main>

      <?php include "../includes/main-header.php" ?>

      <div class="main-content">

         <div class="report-container">

            <div class="content-header">
               <h3> reports </h3>

               <div class="form-button">
                  <select name="" id="type">
                     <option value="Consultation"> Consultation </option>
                     <option value="Appointments"> Appointments </option>
                     <option value="Medicine"> Medicine </option>
                  </select>

                  <select name="" id="">
                     <option value=""> Campus </option>
                     <option value="San Fransisco"> San Bartolome </option>
                     <option value="Batasan"> Batasan </option>
                     <option value="San Fransisco"> San Fransisco </option>
                  </select>

                  <input type="number" maxlength="4" minlength="4" min="2005" max="2023" step="1" value="2023" />

                  

               </div>

               
              
            </div>
            
            <div class="report-content-container" id="report-content-container">

               <div class="report-box">

                  <div class="report-header">
                     <h2> Students consultation report </h2>
                  </div>


                  <div class="graphical-data" id="graphical-data">
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
                  </div>

                  <div class="list-of-data-tbl">
                     
                     <table border="0">
                        <thead>
                           <tr> 
                              <th> Student No. </th>
                              <th> Student Name </th>
                              <th> Section </th>
                              <th> Consultation Date </th>
                              <th> Temperature </th>
                              <th> Symptom(s) </th>
                              <th> Medicine Given </th>
                              <th> Duration </th>
                              <th> Nurse Assisted </th>
                              <th> Remarks </th>
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
                                          <td> <?=$row['student_id']?> </td>
                                          <td> <?=$row['lastname']?>, <?=$row['firstname']?> <?=$row['mi']?>.  </td>
                                          <td> <?=$row['section']?> </td>
                                          <td> <?=$row['app_type']?> Service </td>
                                          <td> <?=$row['app_reason']?> </td>
                                          <td> <?=$app_date?> </td>
                                          <td> <?=$row['app_time']?> </td>
                                          <td> <?=$row['reference_no']?> </td>
                                           <td> Nr. </td>
                                          <td style="text-transform: capitalize"> <?=$row['app_status']?> </td>
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


            </div>
            
         </div>

      </div>

   </main>
   
</body>


<!-- charts -->
<?php
   include "../js/charts/line-chart.php";
   include "../js/charts/pie-chart.php";

?>

<!-- ajax -->
<script src="../ajax/report.js"></script>

<!-- custom script -->
<script>


</script>
</html>