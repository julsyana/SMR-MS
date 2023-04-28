<?php
// error_reporting(0);
include './connection.php';
include './queries.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="icon" type="image/png" href="./assets/favcon.png"/>
        <title>SMRMS | Entrance Page</title>
        
        <link rel="stylesheet" href="./style.css" />
        <link rel="stylesheet" href="./ent-das-style.css" />
        <link rel="stylesheet" href="table.css">
        
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

        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

    </head>
         
    <body>
      
      <div class="header">

          <div class="header-name">
              <img src="./assets/QCULogo.png" alt="">
              <h3>Welcome to Quezon City University</h3>
          </div>

          <div id="date">

          </div>
          
      </div>

      <div class="main-container">

        <div class="container">

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

              <h4>Visitors Form <span></span></h4>
              
              <form action="./insert_visitor.php" method="POST" enctype="multipart/form-data" id="form_visitor">

                <input type="text" id="visitor_name" name="visitor_name" placeholder="Name">

                <input type="text" id="visitor_cnum" name="visitor_cnum" placeholder="Contact Number">

                <input type="text" id="visitor_dept" name="visitor_dept" placeholder="Department">

                <input type="text" id="visitor_purp" name="visitor_purp" placeholder="Purpose">

                <input type="button" id="visitor_btn" name="visitor_btn" value="Submit">

              </form>
            </div>

          
            
          </div>
            
          <div class="table-container">
          

            <div class="message"> 

            </div>

            <div class="form-button">

              <button id="students-btn" class="selected students"> Students </button>

              <button id="pending-btn"> Pending </button>

              <button id="visitor-btn"> Visitors </button>

              <button id="archive-btn"> Archive </button>

            </div>

         

            <div class="table-contents">

              <?php include "./entrance_log.php"; ?>

            </div>

            
            <div class="student-id">
                <!--  student_info.php -->
            
            </div>
              

          </div>

          <div class="pop-up-modal" id="not-verified">
            <!-- modal -->
          </div>
            
        </div>

        
        
       
      </div>


<script>

  $(document).ready(function(){

    $('#visitor_btn').click(function(){
      
      const visitor_btn = $('#visitor_btn').serialize();
      const visitor_cnum = $('#visitor_cnum').val(); 
      const visitor_purp = $('#visitor_purp').val();
      const visitor_name = $('#visitor_name').val();
      const visitor_dept = $('#visitor_dept').val();

      if(visitor_cnum == '' || visitor_name === ''  || visitor_purp === '' || visitor_dept === ''){

        $('.visitor-form h4 span').html('<span> Fill up form </span>');
        // alert('fill up!');

      } else {

        $('.visitor-form h4 span').load('./insert_visitor.php',{
          
          visitor_btn: visitor_btn,
          visitor_purp: visitor_purp,
          visitor_cnum: visitor_cnum,
          visitor_name: visitor_name,
          visitor_dept: visitor_dept,
          
        });
        
        $('#visitor_cnum').val('');
        $('#visitor_purp').val('');
        $('#visitor_name').val('');
        $('#visitor_dept').val('');

        $('#visitor_cnum').attr('placeholder', 'Contact Number');
        $('#visitor_purp').attr('placeholder', 'Purpose');
        $('#visitor_name').attr('placeholder', 'Name');
        $('#visitor_dept').attr('placeholder', 'Department');
      }

      
    
     
    });


  
    
  });

</script>
      
<script>
  
  $(document).ready(function(){
    
    $('#students-btn').click(function(){
  
      $('#students-btn').css('background', '#4EC745');
      $('#pending-btn').css('background', 'none');
      $('#visitor-btn').css('background', 'none');
      $('#archive-btn').css('background', 'none');
  
      $('.table-contents').load('./entrance_log.php');
        
    });
  
    $('#pending-btn').click(function(){
  
      $('#students-btn').css('background', 'none');
      $('#pending-btn').css('background', '#DCED31');
      $('#visitor-btn').css('background', 'none');
      $('#archive-btn').css('background', 'none');
      $('.table-contents').load('./pending_tbl.php');
        
    });
    
    $('#visitor-btn').click(function(){
  
      $('#students-btn').css('background', 'none');
      $('#pending-btn').css('background', 'none');
      $('#visitor-btn').css('background', '#f58800');
      $('#archive-btn').css('background', 'none');
      $('.table-contents').load('./visitor_tbl.php');
        
    });
  
    $('#archive-btn').click(function(){
    
      $('#students-btn').css('background', 'none');
      $('#pending-btn').css('background', 'none');
      $('#visitor-btn').css('background', 'none');
      $('#archive-btn').css('background', '#FF0022');
      $('.table-contents').load('./archive_tbl.php');
        
    });
  
  });
  
</script>



<script>

  $(document).ready(function(){

    let scanner = new Instascan.Scanner({ video:document.getElementById('preview')});
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
      

        $('.table-contents').load('./validation_test.php', {

          stud_id:stud_id

        });


        $('.student-id').load('./student_info.php',{

          stud_id:stud_id
          
        });

    });
    

  });

  
  
  function updateClock() {
    var now = new Date();
    var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    var days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
    var month = months[now.getMonth()];
    var day = days[now.getDay()];
    var date = now.getDate();
    var hours = now.getHours();
    var minutes = now.getMinutes();
    var seconds = now.getSeconds();
    var amOrPm = hours < 12 ? 'AM' : 'PM';
    
    // Convert to 12-hour time
    if (hours > 12) {
      hours -= 12;
    } else if (hours === 0) {
      hours = 12;
    }
  
    // Add leading zeros to minutes and seconds
    if (minutes < 10) {
      minutes = '0' + minutes;
    }
    if (seconds < 10) {
      seconds = '0' + seconds;
    }
  
    // Build the clock string
    var clockStr = month + ' ' + date + ', ' + day + ' ' + hours + ':' + minutes + ':' + seconds + ' ' + amOrPm;
  
    // Update the clock element
    document.getElementById('date').textContent = clockStr;
  }

  // Call updateClock() every second
  setInterval(updateClock, 1000);

</script>
      
    </body>
</html>