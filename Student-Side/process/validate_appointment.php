<?php  

   include "../redo/includes/db_con.php";
   include "../redo/includes/date.php";
   include "../redo/functions/student_function.php";
   include "../redo/functions/function.php";
   include "../redo/functions/generate_qr.php";
   // include "../redo/functions/sendemail.php";

   session_start();

   $stud_id = $_SESSION['student_id'];

   $stud_logged = selStudentAcc($conn, $stud_id);


  

   if(isset($_POST['submitBtn'])){

      if($medType = $_POST['med_type'] === 'Medical'){

         $start = "MED";

      } else {

         $start = "DEN";

      }

      
      $len = 12;

      $month = date("m");
      $year = date("Y");

      $ref_no = generateReferenceNo($start, $len);
      $student_id = $_SESSION['student_id'];
      $medType = $_POST['med_type'];
      $roa = $_POST['roa'];
      $date = $_POST['availableDates'];
      // $time = $_POST['timeSlot'];
      $new_dateApp = "$year-$month-$date";
      

      $images = $_FILES['multiImg'];

      $img_name = $_FILES['multiImg']['name'];
      $img_size = $_FILES['multiImg']['size'];
      $img_tmpName = $_FILES['multiImg']['tmp_name'];
      $img_error = $_FILES['multiImg']['error'];


      $isEmpty = false;

      if(empty($img_name[0])){

         $isEmpty = true;

      } else {

         $isEmpty = false;
      }

      if(!$isEmpty) {

         $path = "../redo/appointment-images";
      
         foreach ($img_name as $i => $name) {
   
            $imgName = moveImg($path, $name, $img_tmpName[$i], $img_error[$i]);
   
            insertAppImages($conn, $ref_no, $imgName);
   
         }

      }


      $tempDir = "../redo/app_qr/";
   
      $codeContents = $ref_no;

      $qrName = generateQR($tempDir, $codeContents);
     

      $insertNewApp = insertNewAppointment($conn, $ref_no, $student_id, $medType, $roa, $date, $time, $date_today, $qrName);

      if(!$insertNewApp) {
         
         echo mysqli_error($conn);

      }else {
         
         header("location: ../redo/pages/appointment-list.php?success");

      }
   }

?>