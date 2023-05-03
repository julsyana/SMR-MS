<?php
   
   use PHPMailer\PHPMailer\PHPMailer;
   use PHPMailer\PHPMailer\Exception;
   use PHPMailer\PHPMailer\SMTP;
   
   require '../../../PHPMailer/src/Exception.php';
   require '../../../PHPMailer/src/PHPMailer.php';
   require '../../../PHPMailer/src/SMTP.php';

  


   function sendEmail($email, $subject, $mess, $title) {

      $mail = new PHPMailer(true);
  
      $mail->isSMTP();
      $mail->Host = 'smtp.gmail.com';
      $mail->SMTPAuth = true;
      $mail->Username = 'qcu.clinic.smrms@gmail.com';
      $mail->Password = 'vptkkshttnjvnhde';
      $mail->SMTPSecure = 'ssl';
      $mail->Port = 465;
  
      
      $mail->setFrom('qcucms.codies@qcu.ph', $title);
      $mail->addAddress($email);
      $mail->Subject = $subject;
      $mail->Body = $mess;
      $mail->isHTML(true);
      $mail->send();

      return $mail;

   }

?>

