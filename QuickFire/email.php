<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

{






//Load Composer's autoloader
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';



//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER; //Enable verbose debug output
    $mail->isSMTP(); //Send using SMTP
    $mail->Host = 'smtp.gmail.com'; //Set the SMTP server to send through
    $mail->SMTPAuth = true; //Enable SMTP authentication
    $mail->Username = 'paiaditya250@gmail.com'; //SMTP username
    $mail->Password = ''; //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Enable implicit TLS encryption
    $mail->Port = 465; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    $name = $_SESSION['login_active'][0];

    // Accessing the email
    $email = $_SESSION['login_active'][1];

    //Recipients
    $mail->setFrom('paiaditya250@gmail.com', 'QuizMaster');
    $mail->addAddress($email, $name); //Add a recipient
  
    $mail->isHTML(true); //Set email format to HTML
    $mail->Subject = "Hey ".$name . ",your Test Score is...";

    $userResponsesHtml = '<ul>';
    foreach ($_SESSION['user_responses'] as $questionNumber => $response) {
        $userResponsesHtml .= '<li>Question ' . $questionNumber . ': ' . $response . '</li>';
    }
    $userResponsesHtml .= '</ul>';

    
    $mail->Body = "Your Test Score is : " .  $_SESSION['score'] . " Out of " . $_SESSION['attempted'] ."<br> <br>Your Responses Were :  " .  $userResponsesHtml ."<br> Thank you for choosing QuizFire.<br><br>Best regards,<br>The QuizFire Team. " ;

    $mail->send();
    header("Location: result.php");
    exit();
    // echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}
?>
