<?php 

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer\src\PHPMailer.php';
    require 'PHPMailer\src\SMTP.php';
    require 'PHPMailer\src\Exception.php';

    function sendMail(){

        $subject = "Food order";

        // Creating a new PHPmailer object

        $mail = new PHPMailer(true);

        // Using the SMTP protocol to send the email

        $mail->isSMTP();

        $mail->SMTPAuth = true;

        $mail->Host = MAILHOST;

        $mail->Username = USERNAME;

        $mail->Password = PASSWORD;

        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

        $mail->Port = 587;

        $mail->setFrom(SEND_FROM, SEND_FROM_NAME);

        $mail->addAddress('elizaveta.practiceweb@gmail.com');

        $mail->addReplyTo(REPLY_TO, REPLY_TO_NAME);

        $mail->IsHTML(true);

        $mail->Subject = $subject;

        $mail->Body = MESSAGE;

        $mail->AltBody = MESSAGE;

        if(!$mail->send()){

            return "Email not send. Please try again";

        }
        else{
            return "Success";
        }

    }

?>