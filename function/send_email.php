<?php

   use PHPMailer\PHPMailer\PHPMailer;
   use PHPMailer\PHPMailer\Exception;

   require '../PHPMailer/src/Exception.php';
   require '../PHPMailer/src/PHPMailer.php';
   require '../PHPMailer/src/SMTP.php';
   
   function send_temp_acc($email, $first_name, $last_name)
   {
       $str = file_get_contents('email/index.html');
       $str = str_replace('@lastname', $last_name, $str);
       $str = str_replace('@firstname', $first_name, $str);
     
   
       $mail = new PHPMailer(true);
   
       $mail->isSMTP();
       $mail->Host = 'smtp.gmail.com';
       $mail->SMTPAuth = true;
       $mail->Username = 'qcu.clinic.smrms@gmail.com';
       $mail->Password = 'vptkkshttnjvnhde';
       $mail->SMTPSecure = 'ssl';
       $mail->Port = 465;
   
       $mail->setFrom('no-reply@gmail.com', 'no-reply@gmail.com');
       $mail->addAddress($email);
       $mail->addEmbeddedImage('email/images/image-1.jpeg', '@image');
       $mail->Subject = "Pet Adoption Notification";
       $mail->Body = $str;
       $mail->isHTML(true);
       $mail->send();
   
   
   }
   
   
?>