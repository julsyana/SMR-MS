<?php
   include './date.php';
   include './connection.php';
   include './queries.php';

   if(isset($_POST['visitor_btn'])){

      $visitor_name = $_POST['visitor_name'];
      $visitor_cnum = $_POST['visitor_cnum'];
      $visitor_purp = $_POST['visitor_purp'];
      $visitor_dept = $_POST['visitor_dept'];


      $ins_visitor = "INSERT INTO `visitors`
      (`fullname`, `contact_num`, `purpose`, `department`, `date`, `timein`) 
      VALUES 
      ('$visitor_name','$visitor_cnum','$visitor_purp','$visitor_dept','$date_today','$time_today')";

      $res_visitor = mysqli_query($conn, $ins_visitor);

      if(!$res_visitor) {

         echo mysqli_error($conn);

      } else{

         echo "<span style='color: #57d483;'> Submitted Successfully! </span>"; ?>

         <script>
            $('.numerical').load('./total.php');
            $('.table_contents').load('./visitor_tbl.php');
         </script>
         
         <?php 

      }
      
   }

?>