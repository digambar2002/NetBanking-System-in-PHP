<?php 

    require 'PHPMailerAutoload.php';
    
    function contactMail($subject, $body, $Email, $name){

    
    $mail  = new PHPMailer;
    $mail->isSMTP();
    $mail->Host='smtp.gmail.com';
    $mail->Port=587;
    $mail->SMTPAuth=true;
    $mail->SMTPSecure='tls';

    $mail->Username = 'Enter Your Email';
    $mail->Password='Enter Your app password';

    $mail->setFrom("Enter Your Email", "Sky Bank");
    $mail->addAddress("Enter Your Email");
    $mail->addReplyTo("Enter Your Email");

    $mail->isHTML(true);
    $mail->Subject="$subject";
    $mail->Body="<p>Email From: $name</p> <p>Email Address: $Email</p> <p>$body</p>";

    if(!$mail->send()){
        return "fail";
    }
    else{
        return "success";
    }

    }

?>
