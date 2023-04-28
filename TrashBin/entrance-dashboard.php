<?php
error_reporting(0);
include './connection.php';
include './queries.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Entrance Page</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="ent-das-style.css">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
        <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        
        <!-- AJAX -->
        <script src="http://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    </head>
         
    <body>
      
      <div class="header">
          <div class="header-name">
              <!-- <img src="/Admin/assets/QCU_Logo.png" alt=""> -->
              <h3>Welcome to Quezon City University</h3>
          </div>
          <div class="time">
             <h3>Jan 1, 2023 Sunday | 0:00</h3>
          </div>
      </div>

      <div class="main-container">
        <div class="subcontainer">
         
          <div class="numerical">
            <?php include "./total.php"; ?>
          </div>

          <div class="video">
            <video id="preview" width="100%"></video>
          </div>

          <div class="form-scan">
               <form action="validation.php" method="post">
                   <input type="text" name="text" id="student_id" placeholder="Student Number" class="form-control class" method="get" style="visibility: hidden">
               </form>
           </div>

           <div class="visitor-form">
             <h4>Visitors Form</h4>
           <form action="">
              <input type="text" name="" id="" placeholder="Name">
              <input type="text" name="" id="" placeholder="Contact Number">
              <input type="text" name="" id="" placeholder="Purpose">
              <input type="submit" name="" id="" value="Capture and Submit">
            </form>
           </div>

           <div class="notification">
             <!-- <table>
               <tbody>
                 <tr>
                   <?php
                     $sql ="SELECT * FROM `entrance_log` a
                     JOIN `sample_stud_data` b
                     ON a.`student_number` = b.`student_id`
                     JOIN `stud_data` c 
                     ON a.`student_number` = c.`student_id`
                     WHERE b.`Status` = 'Not Verified' AND date(a.`timein`) = CURRENT_DATE()";
                     
                     $query = $conn->query($sql);


                     
                     while ($row = $query->fetch_assoc()){
                       // $x = $row['id'] - 1; 
               
                   ?>
                       <tr>
                         <td><?php echo $row['student_number']?></td>
                         <td><?php echo $row['lastname'].', '.$row['firstname'].' '.$row['middlename']?></td>
                         <td><?php echo $row['Section']?></td>
                         <td>Medical Certificate</td>
                         <td>
                           <form action="update-status.php" method="post">
                             <input type="submit" name="toverify" value="Verified">
                             <input type="submit" name="tonotverifiy" value="Not Verified">
                           </form>
                         </td>
                 </tr>
                 <?php
               }
              
              
               // $abc = $row['student_number'];
               // $changestatus = "UPDATE entrance_log SET status='Verified WHERE student_number = $abc;"
                
             ?>
               </tbody>
             </table> -->
          </div>
        </div>

        <div class="pop-up-modal" id="not-verified">
         
         </div>

        <div class="table">

          <div class="message"> </div>

          <?php include "./entrance_log.php"; ?>

        </div>
      </div>
      
      <script>

        $(document).ready(function(){

          let scanner = new Instascan.Scanner({ video:document.getElementById('preview'), scanPeriod: 10});


          Instascan.Camera.getCameras().then(function(cameras){

            if(cameras.length > 0) {

              scanner.start(cameras[0]);

            } else {

              alert("No cameras found!");

            }

          });

          scanner.addListener('scan', (c) => {

              var stud_id = document.getElementById('student_id') .value=c;

              // alert(stud_id);
            

              $('.table').load('./validation_test.php', {

                stud_id:stud_id

              });

          });
          

        });


      
      </script>
    </body>
</html>