
<?php
$email = $_POST["email"];
$attachment = $_POST['attachment'];

require "vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$mail = new PHPMailer(true);

$mail->SMTPDebug = SMTP::DEBUG_SERVER;

$mail->isSMTP();
$mail->SMTPAuth = true;

$mail->Host = 'smtp.gmail.com' ;
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587; //TSL
// $mail->Port = 465; //SSL

// $mail->Username = "Mistergrandph@gmail.com";
// $mail->Password = "tdnshdzapjuwrbkw";

// $mail->Username = "arnejovincent03@gmail.com";
// $mail->Password = "ceecdhnpjkshnpqn";

// $mail->Username = "studmed.recordms.2023@gmail.com";
// $mail->Password = "qmgdqhrozvdbypdb";

$mail->Username = 'qcu.clinic.smrms@gmail.com';
$mail->Password = 'vptkkshttnjvnhde';


$mail->setFrom("studmed.recordms.2023@gmail.com", "Student Medical Record MS");
// $mail->addAddress("arnejovincent03@gmail.com", "MGP INQUERIES");
$mail->addAddress($email, "");//RECEPIENTS
$attachment = base64_decode($attachment);
$mail->addStringAttachment($attachment, 'Medical_certificate.pdf', 'base64', 'application/pdf');


$mail->Subject = " Medical Certificate";
$mail->Body = "Certificate";

$mail-> send();

    
    header("Location: student-verify-otp.php");
?>