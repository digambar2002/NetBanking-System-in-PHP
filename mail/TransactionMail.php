<?php 
    

    require 'PHPMailerAutoload.php';
    require 'class.smtp.php';
    
    function debitMoneyMail($customerMail, $name, $amount, $totalAmount, $date, $AccountNo){

        
        $mail  = new PHPMailer;
        $mail->isSMTP();
        $mail->Host='smtp.gmail.com';
        $mail->Port=587;
        $mail->SMTPAuth=true;
        $mail->SMTPSecure='tls';

       

        $mail->Username = 'Enter Your Email';
        $mail->Password='Enter Your app password';
        
        $content = file_get_contents('../mail/DebitMailTemp.php');
        $mail->setFrom("Enter Your Email", "Sky Bank");
        $mail->addAddress($customerMail);
        $mail->addReplyTo("Enter Your Email");

        $mail->isHTML(true);
        $mail->Subject="Your Account '$AccountNo' has been debited";

        $swap_var = array(

            "{Name}"=> "$name",
            "{AccountNo}"=>"$AccountNo",
            "{Amount}"=>"$amount",
            "{Date}"=>"$date",
            "{totalAmount}"=>"$totalAmount"

        );

        foreach(array_keys($swap_var) as $key){
            if(strlen($key) > 2 && trim($key) !=""){
                $content = str_replace($key, $swap_var[$key], $content);
            }

        }
         
        $mail->Body="$content";
        

        if(!$mail->send()){
            echo"mail not sent";
        }
        
    }

    function creditMoneyMail($customerMail, $name, $amount, $totalAmount, $date, $AccountNo){
        $mail  = new PHPMailer;
        $mail->isSMTP();
        $mail->Host='smtp.gmail.com';
        $mail->Port=587;
        $mail->SMTPAuth=true;
        $mail->SMTPSecure='tls';

      

        $mail->Username = 'Enter Your Email';
        $mail->Password='Enter Your app password';
        
        $content = file_get_contents('../mail/CreditMailTemp.php');
        $mail->setFrom("Enter Your Email", "Sky Bank");
        $mail->addAddress($customerMail);
        $mail->addReplyTo("Enter Your Email");

        $mail->isHTML(true);
        $mail->Subject="Your Account '$AccountNo' can be credited";

        $swap_var = array(

            "{Name}"=> "$name",
            "{AccountNo}"=>"$AccountNo",
            "{Amount}"=>"$amount",
            "{Date}"=>"$date",
            "{totalAmount}"=>"$totalAmount"

        );

        foreach(array_keys($swap_var) as $key){
            if(strlen($key) > 2 && trim($key) !=""){
                $content = str_replace($key, $swap_var[$key], $content);
            }

        }
         
        $mail->Body="$content";
        

        if(!$mail->send()){
            echo"mail not sent";
        }
        
    }  

?>
