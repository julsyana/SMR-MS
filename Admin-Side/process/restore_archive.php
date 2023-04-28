<?php

      include "../includes/db_conn.php";
      include "../includes/date.php";
      include "../functions/function.php";

      $id = $_POST['id'];

      $res = unArchive($conn, $id);
      
      if($res){
         ?>
         <script>
            window.location.href = "./archive.php";
         </script>
         <?php 
      }   
   ?>