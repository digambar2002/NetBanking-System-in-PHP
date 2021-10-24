<?php
    
    session_start();

    // Include connection page into this page
    include 'connection.php';

    // Checking Adhar Number is set or not
    if (isset($_POST['AdharNumber'])) {
        
        /* storing Adhar Number in varible using mysqli_real_escape_string function to remove special charaters like double quotes or etc */
        $AdharNo = mysqli_real_escape_string($conn, $_POST['AdharNumber']);

        // sql query to check adhar no is available or not
        $query = "SELECT * FROM customer_detail WHERE C_Adhar_No = '".$AdharNo."'";
        
        // stroing result rows in variable
        $result = mysqli_query($conn, $query);
        
        // this single line perform most important role this line print output and this output is send to the ajax
        echo mysqli_num_rows($result);
    }


    // checking pan number is set or not
    if (isset($_POST['PanNumber'])) {

        /* storing Pan Number in varible using mysqli_real_escape_string function to remove special charaters like double quotes or etc */
        $PanNo = mysqli_real_escape_string($conn, $_POST['PanNumber']);

       // sql query to check Pan no is available or not
        $query1 = "SELECT * FROM customer_detail WHERE C_Pan_No = '".$PanNo."'";

        // stroing result rows in variable
        $result1 = mysqli_query($conn, $query1);
                
          // this single line perform most important role this line print output and this output is send to the ajax
        echo mysqli_num_rows($result1);
    }

    // checking Email is set or not
    if (isset($_POST['EmailAddress'])) {

        /* storing Email in varible using mysqli_real_escape_string function to remove special charaters like double quotes or etc */
        $Email = mysqli_real_escape_string($conn, $_POST['EmailAddress']);

       // sql query to check Pan no is available or not
        $query2 = "SELECT * FROM customer_detail WHERE C_Email = '".$Email."'";

        // stroing result rows in variable
        $result2 = mysqli_query($conn, $query2);
                
          // this single line perform most important role this line print output and this output is send to the ajax
        echo mysqli_num_rows($result2);
    }


    // Sending otp Email to Customer

    if(isset($_POST['MailSend'])){

      // Include Mail sending file
      include '../mail/mail_config.php';
      $mail = $_POST['MailSend'];
      $name = $_POST['Name'];
      echo "<br>";
  
      // Create Otp
      $otp = rand(100000, 999999);
  
      echo "<br>";

      // storing otp to server 
      $_SESSION['otp'] = $otp;
      
      // Calling Otp Function to send email
      $sucess = sendOtp($mail, $otp, $name);
      

    }

    // Validating Otp
    if(isset($_POST['OTP'])){

        $userOtp = trim($_POST['OTP']);
        $SessionOtp = trim($_SESSION['otp']);

        if($SessionOtp == $userOtp){
          
          echo "Valid";
        }
        else{
          echo "Invalid";
        }

    }


    // checking Username is set or not
    if (isset($_POST['Username'])) {

      /* storing Pan Number in varible using mysqli_real_escape_string function to remove special charaters like double quotes or etc */
      $Username = mysqli_real_escape_string($conn, $_POST['Username']);

     // sql query to check Pan no is available or not
      $query3 = "SELECT * FROM login WHERE Username = '".$Username."'";

      // stroing result rows in variable
      $result3 = mysqli_query($conn, $query3);
              
        // this single line perform most important role this line print output and this output is send to the ajax
      echo mysqli_num_rows($result3);
  }
