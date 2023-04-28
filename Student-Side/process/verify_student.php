<?php
   error_reporting(0);

   include "../redo/includes/db_con.php";
   include "../redo/includes/date.php";
   include "../redo/functions/student_function.php";
   include "../redo/functions/function.php";

   session_start();

   $student_id = $_SESSION['student_id'];

   if(isset($_POST['insert-btn'])){

      $isVaccinated = $_POST['isVaccinated'];

      // CBC
      $cbc_name = $_FILES['cbc']['name'];
      $cbc_tmpName = $_FILES['cbc']['tmp_name'];
      $cbc_error = $_FILES['cbc']['error'];
      $cbc_extName = $student_id."-CBC"; 

      // Urinalysis
      $urinalysis_name = $_FILES['urinalysis']['name'];
      $urinalysis_tmpName = $_FILES['urinalysis']['tmp_name'];
      $urinalysis_error = $_FILES['urinalysis']['error'];
      $urinalysis_extName = $student_id."-Urinalysis"; 

      // Xray
      $chestXray_name = $_FILES['chestXray']['name'];
      $chestXray_tmpName = $_FILES['chestXray']['tmp_name'];
      $chestXray_error = $_FILES['chestXray']['error'];
      $chestXray_extName = $student_id."-Xray"; 

      // Medcert
      $medCert_name = $_FILES['medCert']['name'];
      $medCert_tmpName = $_FILES['medCert']['tmp_name'];
      $medCert_error = $_FILES['medCert']['error'];
      $medCert_extName = $student_id."-Medical-Certificate"; 

      $path = "../redo/medical-requirements";

      if($isVaccinated === 'No'){

         $vaccineType1 = "N/A";
         $vaccineDate1 = "N/A";
         $vaccineType2 = "N/A";
         $vaccineDate2 = "N/A";

         $boosterType1 = "N/A";
         $boosterDate1 = "N/A";
         $boosterType2 = "N/A";
         $boosterDate2 = "N/A";

      } else {

         $vaccineType1 = $_POST['vaccineType'];
         $vaccineDate1 = $_POST['vaccineDate1'];
         $vaccineType2 = $_POST['vaccineType2'];
         $vaccineDate2 = $_POST['vaccineDate2'];

         $boosterType1 = $_POST['boosterType1'];
         $boosterDate1 = $_POST['boosterDate1'];
         $boosterType2 = $_POST['boosterType2'];
         $boosterDate2 = $_POST['boosterDate2'];

      }

      $healthHistory = array($_POST['head-injury'], $_POST['eye-problem'], $_POST['removalLenses'], $_POST['ear-problem'], $_POST['asthma'], $_POST['asthma-last-attact'], $_POST['ulcer'], $_POST['ulcerMed'], $_POST['pulTuber'], $_POST['ptDateDiag'],  $_POST['ptDateMedStart'], $_POST['heartProb'],  $_POST['hpSpec'], $_POST['hpMed'],  $_POST['allergy'], $_POST['allergySpec'], $_POST['allergyMed'], $_POST['hospitalOperation'], $_POST['hoDetails'], $_POST['seizure'], $_POST['fracture'], $_POST['vices'], $_POST['otherMedHistoryDetails']);


      foreach ($healthHistory as $i => $value) {
         if(empty($value)){
            $healthHistory[$i] = "None";
         }
      }

      $famHistory = array($_POST['med-history-father'], $_POST['med-history-mother']);

      foreach ($famHistory as $i => $value) {
         if(empty($value)){

            $famHistory[$i] = "None";

         }
      }


      $medHistoryFather = $famHistory[0];
      $medHistoryMother =  $famHistory[1];

      $headInjury = $healthHistory[0];
      $eyeProblem = $healthHistory[1];
      $removalLenses = $healthHistory[2];
      $earProblem =$healthHistory[3];
      $asthma = $healthHistory[4];
      $asthmaLastAttack = $healthHistory[5];
      $ulcer = $healthHistory[6];
      $ulcerMed = $healthHistory[7];
      $pulTuber = $healthHistory[8];
      $ptDateDiag = $healthHistory[9];
      $ptDateMedStart = $healthHistory[10];
      $heartProb = $healthHistory[11];
      $hpSpec = $healthHistory[12];
      $hpMed = $healthHistory[13];
      $allergy = $healthHistory[14];
      $allergySpec = $healthHistory[15];
      $allergyMed = $healthHistory[16];
      $hospitalOperation = $healthHistory[17];
      $hoDetails = $healthHistory[18];
      $seizure =$healthHistory[19];
      $fracture = $healthHistory[20];
      $vices =$healthHistory[21];
      $otherMedHistoryDetails =$healthHistory[22];

      $cbc = moveFile($path, $cbc_name, $cbc_tmpName, $cbc_error, $cbc_extName);
      $urinalysis = moveFile($path, $urinalysis_name, $urinalysis_tmpName, $urinalysis_error, $urinalysis_extName);
      $xRay = moveFile($path, $chestXray_name, $chestXray_tmpName, $chestXray_error, $chestXray_extName);
      $medCert = moveFile($path, $medCert_name, $medCert_tmpName, $medCert_error, $medCert_extName);

      
      // insert medical requirements
      $insertMedReqs = insertStudMedicalReqs($conn, $student_id, $cbc, $date_today, $urinalysis, $date_today, $xRay, $date_today, $medCert, $date_today);


      if($insertMedReqs){

         // insert vaccine
         $insertVaccine = insertStudVaccine($conn, $student_id, $isVaccinated, $vaccineType1, $vaccineDate1, $vaccineType2, $vaccineDate2);

         // insert booster
         $insertBooster = insertStudBooster($conn, $student_id, $boosterType1, $boosterDate1, $boosterType2, $boosterDate2);


         if($insertVaccine && $insertBooster){

            // insert health history
            $insertHealthHistory = insertStudHealthHistory($conn, $student_id, $headInjury, $eyeProblem, $removalLenses, $earProblem, $asthma, $asthmaLastAttack, $asthmaDate, $ulcer, $ulcerMed, $pulTuber, $ptDateDiag, $ptDateMedStart, $heartProb, $hpSpec, $hpMed, $allergy, $allergySpec, $allergyMed, $hospitalOperation, $hoDetails, $seizure, $fracture, $vices, $otherMedHistoryDetails);

            // insert family med history
            $insertFamMedHistory = insertFamMedHistory($conn, $student_id, $medHistoryFather, $medHistoryMother);

            if($insertHealthHistory && $insertFamMedHistory){

               $isVerified = setVerified($conn, $student_id);

               if($isVerified){

                  header("location: ../redo/pages/health-history.php");

               }
            }

         }
      }

     

      

      

     

     

      
   }


?>