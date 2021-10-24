<?php 

    include "../SkyBank/mail/contactMail.php";

    if(isset($_POST['name'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $body = $_POST['message'];



       $result = contactMail($subject, $body, $email, $name);
       echo $result;
    }

?>