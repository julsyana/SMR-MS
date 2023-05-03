<?php

   // Select student's data

   function fetchStudData($conn, $StudId){

      $SelQuerry = "SELECT *, LEFT(a.middlename, 1) as `mi`, c.address as `rel_address` FROM `mis.student_info` a
      JOIN `mis.student_address` b
      ON a.student_id = b.student_id
      JOIN `mis.emergency_contact` c
      ON a.student_id = c.student_id
      JOIN `mis.enrollment_status` d
      ON a.student_id = d.student_id
      WHERE a.student_id = '$StudId'";
      $result = mysqli_query($conn, $SelQuerry);
      $student_logged = mysqli_fetch_assoc($result);

      return $student_logged;
   }

   function fetchStudHealthStatus($conn, $stud_id){

      $SelQuerry = "SELECT * FROM `sample_stud_data` WHERE `student_id` = '$stud_id'";

      $result = mysqli_query($conn, $SelQuerry);

      $fetch = mysqli_fetch_assoc($result);

      return $fetch;
   }

   function fetchStudMedReq($conn, $StudId){

      $SelQuerry = "SELECT * FROM `stud_medical_requirements` WHERE `student_id` = '$StudId'";

      $result = mysqli_query($conn, $SelQuerry);

      // $student_med_reqs = mysqli_fetch_assoc($result);

      return $result;

   }

   function fetchAllStudAppointment($conn, $StudId){

      $SelQuerry = "SELECT * FROM `stud_appointment`
      WHERE `student_id` = '$StudId' ORDER BY `date_apply` DESC";

      $result = mysqli_query($conn, $SelQuerry);

      return $result;

   }

   function fetchStudAppointment($conn, $StudId, $refNo){

      $SelQuerry = "SELECT * FROM `stud_appointment`
      WHERE `student_id` = '$StudId' AND `reference_no`='$refNo';";

      $result = mysqli_query($conn, $SelQuerry);

      $fetch = mysqli_fetch_assoc($result);

      return $fetch;

   }

   function fetchStudAppointmentImages($conn, $reference_no, $stud_id){

      $SelQuerry = "SELECT * FROM `stud_app_files` a
      JOIN `stud_appointment` b
      ON a.reference_no = b.reference_no
      WHERE a.reference_no = '$reference_no' AND b.student_id = '$stud_id'";

      $result = mysqli_query($conn, $SelQuerry);

      return $result;

   }

   function fetchStudMedHistory($conn, $stud_id){

      $sel = "SELECT *  FROM consultations
      WHERE student_id = '$stud_id';";

      $res_query = mysqli_query($conn, $sel);

      return $res_query;
   }

   function fetchStudMedHistoryRef($conn, $ref_no, $stud_id) {

      $sel = "SELECT *, LEFT(b.middlename, 1) as `nurse_mi` FROM `consultations` a 
      JOIN `nurses` b 
      ON a.emp_id = b.emp_id 
      WHERE a.student_id = '$stud_id' AND a.reference_no = '$ref_no';";

      $res_query = mysqli_query($conn, $sel);

      $fetch = mysqli_fetch_assoc($res_query);

      return $fetch;
   }


   function selStudentAcc($conn, $stud_id){

      $select = "SELECT * FROM `student_account` a
      JOIN `mis.student_info` b
      ON a.student_id = b.student_id
      WHERE a.`student_id` = '$stud_id'";

      $result = mysqli_query($conn, $select);

      $res_stud = mysqli_fetch_assoc($result);

      return $res_stud;
   }

   function selStudentsHealthHistory($conn, $stud_id){

      $select = "SELECT * FROM `stud_health_history` a
      JOIN `stud_covid_vaccine` b
      ON a.student_id = b.student_id
      JOIN `stud_booster_shot` c
      ON a.student_id = c.student_id
      JOIN `stud_family_med_history` d
      ON a.student_id = d.student_id
      WHERE a.student_id = '$stud_id';";

      $result = mysqli_query($conn, $select);

      $res_stud = mysqli_fetch_assoc($result);

      return $res_stud;
   }

   function fetchentrancelog($conn, $stud_id){
      $select ="SELECT * FROM `entrance_log` a
      JOIN `stud_archive` b
      ON a.student_number = b.student_id
      WHERE a.student_number = '$stud_id'
      ORDER BY `timein` DESC";

      $run_query = mysqli_query($conn,$select) or die(mysqli_error($conn));

      return $run_query;
   }


   // Insert student's data

   function insertStudentAcc($conn, $stud_id, $email, $otp){

      $insert = "INSERT INTO `student_account` (`student_id`, `email`, `otp`, `isVerified`) 
      VALUES 
      ('$stud_id', '$email', '$otp', '0')";

      $result = mysqli_query($conn, $insert);

      return $result;

   }

   function insertStudInfo($conn, $stud_id, $date_today){

      $ins = "INSERT INTO `student_info`(`student_id`, `clinic_status`, `date_register`) VALUES ('$stud_id', 'cleared', '$date_today')";

      $res_query = mysqli_query($conn, $ins);

      return $res_query;

   }

   function insertStudVaccine($conn, $stud_id, $isVaccinated, $firstVaccine, $firstVaccineDate, $secVaccine, $secVaccineDate){

      $ins = "INSERT INTO `stud_covid_vaccine` (`student_id`, `isVaccinated`, `first-vaccine`, `first-vaccine_date`, `second-vaccine`, `second-vaccine_date`) 
      VALUES 
      ('$stud_id', '$isVaccinated', '$firstVaccine', '$firstVaccineDate', '$secVaccine', '$secVaccineDate')";

      $res_query = mysqli_query($conn, $ins);

      return $res_query;

   }

   function insertStudBooster($conn, $stud_id, $firstBooster, $firstBoosterDate, $secBooster, $secBoosterDate){

      $ins = "INSERT INTO `stud_booster_shot` (`student_id`, `first-booster`, `first-booster_date`, `second-booster`, `second-booster_date`) 
      VALUES 
      ('$stud_id','$firstBooster','$firstBoosterDate','$secBooster','$secBoosterDate')";

      $res_query = mysqli_query($conn, $ins);

      return $res_query;

   }

   function insertFamMedHistory($conn, $stud_id, $fatherHistory, $motherHistory){

      $ins = "INSERT INTO `stud_family_med_history`(`student_id`, `father`, `mother`) 
      VALUES 
      ('$stud_id','$fatherHistory','$motherHistory')";

      $res_query = mysqli_query($conn, $ins);

      return $res_query;
   }

   function insertStudHealthHistory($conn, $stud_id, $headInjury, $eyeProblem, $wearLenses, $earProblem, $asthma, $asthmaMed, $asthmaDate, $hasUlcer, $ulcerMed, $hasPtb, $ptbDateDiag, $ptbDateMedStart, $heartProblem, $hpSpec, $hpMed, $hasAllergy, $allergySpec, $allergyMed, $hospitalized, $hospitalizedDetails, $hasSeizure, $hasFracture, $hasVices, $others) {

      $ins = "INSERT INTO `stud_health_history`
      (`student_id`, `head_injury`, `eye_problem`, `wear_lenses`, `ear_problem`, `has_asthma`, `asthma_med`, `asthma_date`, `has_ulcer`, `ulcer_med`, `has_ptb`, `ptb_date_diag`, `ptb_date_med_start`, `heart_problem`, `hp_spec`, `hp_med`, `has_allergy`, `allergy_spec`, `allergy_med`, `hospitalized`, `hospitalized_details`, `has_seizure`, `has_fracture`, `has_vices`, `other`)
      VALUES 
      ('$stud_id', '$headInjury', '$eyeProblem', '$wearLenses', '$earProblem', '$asthma', '$asthmaMed', '$asthmaDate', '$hasUlcer', '$ulcerMed', '$hasPtb', '$ptbDateDiag', '$ptbDateMedStart', '$heartProblem', '$hpSpec', '$hpMed', '$hasAllergy', '$allergySpec', '$allergyMed', '$hospitalized', '$hospitalizedDetails', '$hasSeizure', '$hasFracture', '$hasVices', '$others')";

      $res_query = mysqli_query($conn, $ins);

      return $res_query;
   }


   function insertStudMedicalReqs($conn, $stud_id, $cbcFile, $cbcDateSubmit, $uriFile, $uriDateSubmit, $xrayFile, $xrayDateSubmit, $medCertFile, $medCertDateSubmit){

      $ins = "INSERT INTO `stud_medical_requirements`
      (`student_id`,
      `cbc_file`, `cbc_date_submitted`, `cbc_status`, `cbc_reason`, 
      `uri_file`, `uri_date_submitted`, `uri_status`, `uri_reason`, 
      `xray_file`, `xray_date_submitted`, `xray_status`, `xray_reason`, 
      `med_cert_file`, `med_cert_date_submitted`, `med_cert_status`, `med_cert_reason`) 
      VALUES 
      ('$stud_id', 
      '$cbcFile', '$cbcDateSubmit', 'pending', '-',
      '$uriFile', '$uriDateSubmit', 'pending', '-',
      '$xrayFile','$xrayDateSubmit', 'pending', '-',
      '$medCertFile','$medCertDateSubmit', 'pending', '-')";

      $res_query = mysqli_query($conn, $ins);

      return $res_query;
   }


   function insertNewAppointment($conn, $ref_no, $stud_id, $appType, $appReason, $appDate, $appTime, $dateApply, $qrName){

      $ins = "INSERT INTO `stud_appointment`
      (`reference_no`, `student_id`, `app_type`, `app_reason`, `app_date`, `date_apply`, `app_status`, `app_qr`) 
      VALUES 
      ('$ref_no','$stud_id','$appType','$appReason','$appDate', '$dateApply','scheduled', '$qrName')";

      $res_query = mysqli_query($conn, $ins);

      return $res_query;
   }

   function insertAppImages($conn, $ref_no, $imgName){

      $ins = "INSERT INTO `stud_app_files` (`reference_no`, `img_name`) VALUES ('$ref_no','$imgName')";

      $res_query = mysqli_query($conn, $ins);

      return $res_query;
   }

   


   // Update student's data

   function setNewPassword($conn, $stud_id, $new_password){

      $update = "UPDATE `student_account` 
      SET `password`= '$new_password'
      WHERE `student_id` = '$stud_id'";

      $result = mysqli_query($conn, $update);

      return $result;

   }

   function setVerified($conn, $stud_id){

      $update = "UPDATE `student_account` 
      SET `isVerified`= '1'
      WHERE `student_id` = '$stud_id'";

      $result = mysqli_query($conn, $update);

      return $result;
   }


   function setAppointmentStatus($conn, $stud_id, $ref_no, $status){

      $update = "UPDATE `stud_appointment` SET `app_status` = '$status' WHERE `reference_no` = '$ref_no' AND `student_id` = '$stud_id'";

      $result = mysqli_query($conn, $update);

      return $result;
   }




  



?>