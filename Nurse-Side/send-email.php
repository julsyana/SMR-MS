
<?php
$email = $_POST["email"];

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

$mail->Username = "studmed.recordms.2023@gmail.com";
$mail->Password = "btzftzujzzqnxyka";


$mail->setFrom("studmed.recordms.2023@gmail.com", "Student Medical Record MS");
// $mail->addAddress("arnejovincent03@gmail.com", "MGP INQUERIES");
$mail->addAddress($email, "");//RECEPIENTS



$mail->Subject = $otp_code . " is your verification code";
$mail->Body = "Verification Code

To verify your account and complete the sign in, enter this code in your Student Medical Record MS Account:


" 
. $otp_code . 
"


Verification codes expire after 30 minutes.

If you didn't request this code, you can ignore this message.


Thanks,
The Student Medical Record MS Team";

$mail-> send();

    
    header("Location: student-verify-otp.php");
?>