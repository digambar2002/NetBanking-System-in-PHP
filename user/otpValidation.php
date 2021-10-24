<?php

session_start();
include 'connection.php';
include "script.php";
// if login session is on then following if block execute


if (!isset($_SESSION['accountNo'])) {
    header("Location: ../user/forgotPassword.php");
} else {
    if (isset($_POST['Validate'])) {

        $otp = trim($_POST['otp']);
        echo $otp;
        $otpSession = $_SESSION['otp'];
        echo $otpSession;
        if ($otp == $otpSession) {
            header("Location: ../user/ResetPassword.php");
        } else {
            header("Location: ../user/otpValidation.php?error= Invalid Otp");
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Validate OTP</title>

    <link href="../assets/img/favicon-32x32.png" rel="icon">
    <link href="../assets/img/apple-icon-180x180.png" rel="apple-touch-icon">

    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <!-- Extra CSS for external module -->
    <style>
        body {
            font-family: "Karla", sans-serif;
            /* background: linear-gradient(to right, #8e2de2, #4a00e0); */
            /* background: linear-gradient(45deg, rgba(86, 58, 250, 0.4) 0%, rgba(116, 15, 214, 0.4) 100%), url("../img/back-img.jpg") center center no-repeat; */
            background: url("../assets/img/back-img.jpg");
            background-size: cover;
            min-height: 100vh;
        }

        .container {
            width: 100%;
            padding-right: 15px;
            padding-left: 15px;
            margin-right: 0px;
            margin-left: auto;
            align-items: center;
            justify-content: center;
        }

        @media (max-width: 422px) {
            .container {

                margin-right: auto;
                margin-left: auto;

            }

        }

        .brand-wrapper {
            margin-bottom: 19px;
            display: flex;
            margin-left: 80px;
        }

        .brand-wrapper .logo {
            height: 37px;
        }

        .brand-wrapper p {
            padding-left: 10px;
            font-size: 24px;
        }

        .login-card {
            border: 0;
            border-radius: 27.5px;
            box-shadow: 0 10px 30px 0 rgb(172 168 168 / 43%);
            overflow: hidden;
            justify-content: center;
            align-items: center;
            width: 80%;
        }

        @media (max-width: 422px) {
            .login-card {
                width: 100%;
            }
        }


        .login-card .card-body {
            padding: 85px 60px 60px;
            margin: 0px 85px;
        }

        @media (max-width: 422px) {
            .login-card .card-body {
                padding: 35px 24px;
            }

        }

        .login-card-description {
            font-size: 25px;
            color: #000;
            font-weight: normal;
            margin-bottom: 23px;
        }

        @media (max-width: 422px) {

            .login-card-description {
                font-size: 17px;
                text-align: center;
            }

        }

        .login-card form {
            max-width: 326px;
        }

        .login-card .form-control {
            border: 1px solid #d5dae2;
            padding: 15px 25px;
            margin-bottom: 20px;
            min-height: 45px;
            font-size: 13px;
            line-height: 15;
            font-weight: normal;
        }

        .login-card .form-control::-webkit-input-placeholder {
            color: #919aa3;
        }

        .login-card .form-control::-moz-placeholder {
            color: #919aa3;
        }

        .login-card .form-control:-ms-input-placeholder {
            color: #919aa3;
        }

        .login-card .form-control::-ms-input-placeholder {
            color: #919aa3;
        }

        .login-card .form-control::placeholder {
            color: #919aa3;
        }

        .login-card .login-btn {
            padding: 13px 20px 12px;
            background: linear-gradient(to right, #8e2de2, #4a00e0);
            border-radius: 4px;
            font-size: 17px;
            font-weight: bold;
            line-height: 20px;
            color: #fff;
            margin-top: 80px;
        }

        .login-card .login-btn:hover {
            opacity: 0.8;
            background-color: transparent;

        }

        .login-card .forgot-password-link {
            font-size: 14px;
            color: #919aa3;
            margin-bottom: 12px;
        }

        .login-card-footer-text {
            font-size: 16px;
            color: #0d2366;
            margin-bottom: 60px;
            text-align: center;

        }

        @media (max-width: 767px) {
            .login-card-footer-text {
                margin-bottom: 24px;
            }
        }

        .login-card-footer-nav a {
            font-size: 14px;
            color: #919aa3;
        }

        #otp {
            outline: none;
            padding-left: 15px;
            letter-spacing: 42px;
            border: 0;
            background-image: linear-gradient(to left, gray 70%, rgba(255, 255, 255, 0) 0%);
            background-position: bottom;
            background-size: 50px 1px;
            background-repeat: repeat-x;
            background-position-x: 35px;
            width: 320px;
            min-width: 320px;
            margin-top: 20px;
            margin-left: 10px;
            border-color: gray;
        }

        #divInner {
            left: 0;
            position: sticky;
        }

        #divOuter {
            width: 300px;
            overflow: hidden;
        }
    </style>


</head>

<body>
    <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
        <div class="container">
            <div class="card login-card">



                <div class="card-body">
                    <div class="brand-wrapper">
                        <img src="../assets/img/Logo.svg" alt="logo" class="logo">
                        <p>SKY BANK</p>
                    </div>
                    <p class="login-card-description">Verify One Time Password</p>

                    <!-- Login Form -->
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">

                        <div class="form-group">
                            <!-- <label for="username" class="sr-only">Username</label> -->
                            <div id="divOuter">
                                <div id="divInner">
                                    <input id="otp" name="otp" type="text" maxlength="6" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onKeyPress="if(this.value.length==6) return false;" />
                                </div>
                            </div>
                            <p id="alert1" style="color: red;"></p>
                        </div>
                        <input name="Validate" id="Validate" class="btn btn-block login-btn mb-4" type="submit" value="Validate">
                    </form>
                    <p class="login-card-footer-text">Go Back To <a href="../index.php" class="text-reset">Home</a></p>
                </div>


            </div>
        </div>
    </main>





    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="../assets/js/sweetalert.min.js"></script>

    <script>
        <?php if (isset($_GET['error'])) { ?>
            swal({
                title: "<?php echo $_GET['error'] ?>",
                icon: "error",
            });


        <?php } ?>
    </script>
</body>

</html>