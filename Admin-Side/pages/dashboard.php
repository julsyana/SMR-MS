<?php
   include "../includes/function-header.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title> SMRMS | ADMIN | Dashboard </title>
   <?php include "../includes/head.php"; ?>

   <!-- custom css -->
   <link rel="stylesheet" href="../css/dashboard.css">
   
   
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
               <a href="./dashboard.php" class="isSelected">
                  <i class="fas fa-chart-area fas-line"></i> Dashboard
               </a>
            </li>

            <li>
               <a href="./admin.php" >
                  <i class="fas fa-users-cog"></i> Admins
               </a>
            </li>

            <li>
               <a href="./department.php">
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
               <a href="./reports.php">
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

         <div class="dashboard">

            <div class="content-header">
               
               <h3> Analytics </h3>
            </div>

            <div class="card-count">

               <div class="card admin">

                  <div class="card-header">
                     <i class="fas fa-users-cog"> </i>
                     <p> Admins</p>
                  </div>

                  <div class="card-number">
                     <h2> <?=$total_admins?> </h2>
                  </div>   

               </div>

               <div class="card nurse">

                  <div class="card-header" style="background-color: #E49F30;">
                     <i class="fas fa-user-shield    "></i>
                     <p> Nurse </p>
                  </div>

                  <div class="card-number"  style="background-color: #F3AF43;">
                     <h2> <?=$total_nurse?> </h2>
                  </div>   

               </div>

               <div class="card students">

                  <div class="card-header" style="background-color: #72AE32;">
                     <i class="fas fa-user-graduate"></i>
                     <p> Students </p>
                  </div>

                  <div class="card-number" style="background-color: #84BF46;">
                     <h2> 2 </h2>
                  </div>   

               </div>

               <div class="card dept">

                  <div class="card-header" style="background-color: #0C52BB;">
                     <i class="fas fa-building" > </i>
                     <p>  Department </p>
                  </div>

                  <div class="card-number" style="background-color: #2C6AC8;">
                     <h2> <?=$total_dept?> </h2>
                  </div>   

               </div>

               <div class="card ent-log">

                  <div class="card-header" style="background-color: #7C7C7C;">
                     <i class="fas fa-address-book    "></i>
                     <p> Entrance Log </p>
                  </div>

                  <div class="card-number" style="background-color: #999999;">
                     <h2> <?=$total_eLog?> </h2>
                  </div>   

               </div>
            </div>
            
            <div class="chart_container">

               <div class="card_content">

                  <div class="chart_header">

                     <span>STUDENT COVID-19 CASES</span>

                     <div class="chart_filter">

                        <select name="filter" id="filter">
                           <option value="Campus">Campus</option>
                        </select>

                        <select name="filter" id="filter">
                           <option value="Monthly">Monthly</option>
                           <option value="Yearly">Yearly</option>
                        </select>

                     </div>
                  </div>

                  <div class="chart1">

                     <canvas id="myChart" class="chart"></canvas>

                  </div>

               </div>
             
               <div class="card_content">

                  <div class="chart_header">
                     <span>ENTRANCE LOG</span>
                  </div>
                  
                  <br>
                  
                  <div class="chart1" style="display:flex; justify-content:center; align-items:center;">
                     <canvas id="myChart2" class="circle_chart"></canvas>
                  </div>
               </div>
           
            </div>


            <div class="chart_container">
               
               <div class="card_content">

                  <div class="chart_header">

                     <span> APPOINTMENTS </span>
                     
                     <div class="chart_filter">
                        
                        <select name="filter" id="filter">
                           <option value="Medical">Medical</option>
                           <option value="Dental">Dental</option>
                           </select>
                           <select name="filter" id="filter">
                           <option value="Monthly">Monthly</option>
                           <option value="Yearly">Yearly</option>
                        </select>

                     </div>
                  </div>

                 <div class="chart1">
                   <canvas id="myChart3" class="chart"></canvas>
                 </div>
               </div>

               <div class="card_content table_card">

                  <div class="chart_header">
                     <span style="font-size: .9em;"> ACTIVE NURSES TODAY </span>
                  </div>

                  <table>
                     <tr>
                        <!-- <th>Image</th> -->
                        <th>Emp ID</th>
                        <th>Fullname</th>
                        <th>Campus</th>
                     </tr>
                    
                     <tr>
                        <!-- <td><img src="./assets/nurse.jpg"></td> -->
                        <td>23-0003</td>
                        <td>Juan Two T. Dela Cruz</td>
                        <td>San Francisco</td>
                     </tr>

                  </table>
               </div>
            </div>

            
         
         </div>

      </div>

   </main>
   
</body>

<!-- charts -->
<script src="../js/line_graph.js"></script>
<script src="../js/circle_graph.js"></script>
<script src="../js/bar_graph.js"></script>

<!-- custom script -->
</html>