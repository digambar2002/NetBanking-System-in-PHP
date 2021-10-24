<?php
session_start();
include 'connection.php';
include "script.php";
// if login session is on then following if block execute


if (!isset($_SESSION['accountNo'])) {
    header("Location: ../user/forgotPassword.php");
} else {

    if (isset($_POST['done'])) {
        $Password = $_POST['Password'];
        $ConfirmPass = $_POST['ConfirmPass'];
        $PassError = false;

        if (!empty($Password)) {
            if (!empty($ConfirmPass)) {

                if (preg_match_all('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.* )(?=.*[^a-zA-Z0-9]).{8,16}$/m', $Password)) {
                    if ($Password == $ConfirmPass) {

                        $AccountNo = $_SESSION['accountNo'];
                        $Password = md5($Password);
                        $query = "UPDATE login SET Password='{$Password}' WHERE AccountNo='{$AccountNo}'";
                        $result = mysqli_query($conn, $query) or die("query fail!") and exit();
                        session_start();
                        session_unset();
                        session_destroy();
                        header("Location: ../user/login.php");
                    } else {
                        header("Location: ../user/ResetPassword.php?error= Please Enter Same Password");
                        exit();
                    }
                } else {
                    header("Location: ../user/ResetPassword.php?error= Password not strong");
                    exit();
                }
            } else {
                header("Location: ../user/ResetPassword.php?error= Please confirm Password");
                exit();
            }
        } else {
            header("Location: ../user/ResetPassword.php?error= Please Enter New Password");
            exit();
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
    <title>Reset Password</title>

    <!-- Favicons -->
    <link href="../assets/img/favicon-32x32.png" rel="icon">
    <link href="../assets/img/apple-icon-180x180.png" rel="apple-touch-icon">

    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <!-- fontawesome -->
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../assets/js/resetPass.js"></script>
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

        .brand-wrapper {
            margin-bottom: 19px;
            display: flex;

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
            box-shadow: 0 10px 30px 0 rgba(172, 168, 168, 0.43);
            overflow: hidden;
        }

        .login-card-img {
            border-radius: 0;
            position: absolute;
            width: 95%;
            height: 95%;
            margin: 0px 80px;
            object-fit: contain;
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

        .login-card form {
            max-width: 326px;
        }

        .login-card .form-control {
            border: 1px solid #3d1dea;
            padding: 15px 25px;
            margin-bottom: 20px;
            min-height: 45px;
            font-size: 13px;
            line-height: 15;
            font-weight: normal;
            box-shadow: #8e2de2;
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
            margin-bottom: 24px;
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

        #partitioned {
            outline: none;
            padding-left: 15px;
            letter-spacing: 42px;
            border: 0;
            background-image: linear-gradient(to left, black 70%, rgba(255, 255, 255, 0) 0%);
            background-position: bottom;
            background-size: 50px 1px;
            background-repeat: repeat-x;
            background-position-x: 37px;
            width: 286px;
        }
    </style>


</head>

<body>
    <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
        <div class="container">
            <div class="card login-card">
                <div class="row no-gutters">
                    <div class="col-md-5">
                        <img src="../assets/img/PageImage/ResetPass.svg" alt="login" class="login-card-img">
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <div class="brand-wrapper">
                                <img src="../assets/img/Logo.svg" alt="logo" class="logo">
                                <p>SKY BANK</p>
                            </div>
                            <p class="login-card-description">Create New Password</p>

                            <!-- Login Form -->
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">


                                <p style="color: red;" id="PasswordError"></p>

                                <?php if (isset($_GET['error'])) {  ?>

                                    <p style="color: red;"> *<?php echo $_GET['error'] ?> ! </p>

                                <?php } ?>


                                <label for="username" class="sr-only">New Password</label>
                                <div class="form-group">
                                    <input type="password" name="Password" id="Password" class="form-control textDesign " placeholder="Password" required>

                                </div>
                                <div class="form-group mb-4 ">
                                    <label for="password" class="sr-only">Password</label>
                                    <input type="password" name="ConfirmPass" id="ConfirmPass" class="form-control textDesign" placeholder="Confirm Password" required>
                                </div>
                                <input name="done" id="done" class="btn btn-block login-btn mb-4" type="submit" value="Done">
                            </form>
                            <p class="login-card-footer-text">Go Back To <a href="../index.php" class="text-reset">Home</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Today:

        1 Validate Password with Ajax
        2 Validate Password with php
        3 update Password
        4 clear all session cookie

 -->




    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="../assets/js/sweetalert.min.js"></script>
    <script src="../assets/js/showHidePass.js"></script>

    <script>
        <?php if (isset($_GET['error'])) { ?>
            swal({
                title: "Account Alert!",
                text: "<?php echo $_GET['error'] ?>",
                icon: "error",
            });


        <?php } ?>
    </script>

    <script>
        $(document).ready(function() {
            $('input[type=\'password\']').showHidePassword();
        });
    </script>
</body>

</html>