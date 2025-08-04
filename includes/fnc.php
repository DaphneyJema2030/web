<?php

function checkUserLoggedIn() {

    // Check if the user is logged in
    if (!isset($_SESSION['consort'])) {
        header("Location: signin.php?error=not_logged_in");
        exit;
    }

    }

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;

function SendMail($to, $subject, $message){
    require_once 'pluggins/PHPMailer/vendor/autoload.php';

    //creating new phpmailer instance
    $mail = new PHPMailer(true);

    //set mailer to use smtp
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'daphneyjema@gmail.com';                     
    $mail->Password   = 'sovg dphb sbdr wevv';    
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;        
    $mail->Port       = 465;        

    //Recipients
    $mail->setFrom('daphneyjema@example.com', 'Daphney Jema');
    $mail->addAddress($to);

    //content
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = $message;

    //SEND MAIL
    if ($mail->send()) {
        echo "Message could not be sent. Maier error: {$mail->ErrorInfo}";
    } else { 
        echo "Message has been sent";
}
}