<?php

// including files
include 'connection.php';
include "script.php";

// starting session 
session_start();

if (isset($_SESSION['username'])) {
    header("Location: ../user/UserData/Dashboard.php ");
} else {
    if (isset($_SESSION['accountNo'])) {
        header("Location: ../user/otpValidation.php");
    } else {

        if (isset($_POST['next'])) {
            $Username = mysqli_real_escape_string($conn, $_POST['Username']);
            $AccountNo = $_POST['AccountNo'];
            $Account_err = $Username_err = false;

            if (empty(trim($_POST['AccountNo'])) && empty(trim($_POST['Username']))) {

                $Username_err = true;
                $Account_err = true;
                header("Location: ../user/forgotPassword.php?error= Username and Account Number Required");
                exit();
            } elseif (empty(trim($_POST['Username']))) {
                header("Location: ../user/forgotPassword.php?error=Username Required");
                $Username_err = true;
                exit();
            } elseif (empty(trim($_POST['AccountNo']))) {
                header("Location: ../user/forgotPassword.php?error= Account Number Required");
                $Account_err = true;
                exit();
            } else {


                $query = "SELECT ID, Username, AccountNo, Status FROM login WHERE Username= '{$Username}' AND AccountNo= '{$AccountNo}'";

                $result = mysqli_query($conn, $query) or die("Query Fail1.");

                if (mysqli_num_rows($result) > 0) {

                    while ($row = mysqli_fetch_assoc($result)) {


                        $otp = rand(100000, 999999);

                        $_SESSION['otp'] = $otp;


                        $status = $row['Status'];
                        if ($status == "Active" || $status == "Super") {

                            $query1 = "SELECT C_Email, C_First_Name FROM customer_detail WHERE Account_No= '{$AccountNo}'";
                            $result1 = mysqli_query($conn, $query1) or die("Query Fail2.");
                            while ($row1 = mysqli_fetch_assoc($result1)) {

                                $name = $row1['C_First_Name'];
                                $email = $row1['C_Email'];


                                // header("Location: ../user/forgotPassword.php?error= i am execute")

                                require '../mail/otpForgot.php';
                                $MailResult = sendOtp($email, $otp, $name);
                                if ($MailResult == "success") {
                                    $_SESSION['accountNo'] = $row['AccountNo'];
                                    header("Location: ../user/otpValidation.php");
                                } else {
                                    echo '<div class="alert alert-danger" role="alert">
                                    Something went Wrong, Please Contact us bank <a href="../#contact" class="alert-link">Click to contact</a>.
                                  </div>';
                                }
                            }
                        } else {
                            header("Location: ../user/forgotPassword.php?error=Account not Activated");
                            exit();
                        }
                    }
                } else {
                    header("Location: ../user/forgotPassword.php?error=Invalid Credential");
                    exit();
                }
            }
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
    <title>Forgot Password</title>
    <!-- Favicons -->
    <link href="../assets/img/favicon-32x32.png" rel="icon">
    <link href="../assets/img/apple-icon-180x180.png" rel="apple-touch-icon">

    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/forgotPass.css">

    <!-- Extra CSS for external module -->
    <style>
        .swal-button {
            padding: 7px 19px;
            border-radius: 2px;
            background: linear-gradient(to right, #8e2de2, #4a00e0);
            font-size: 12px;
            color: white;
        }

        .swal-button:hover {
            opacity: 0.8;
            background-color: transparent;
        }

        @media (max-width: 768px) {
            #forgot-img {
                display: none;
            }

            .login-card .card-body {
                padding: 35px 0px;
            }

            .login-card-description {
                font-size: 1rem;
                color: #000;
                font-weight: normal;
                margin-bottom: 23px;
            }
        }
    </style>


</head>

<body>
    <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
        <div class="container">
            <div class="card login-card">
                <div class="row no-gutters">
                    <div id="forgot-img" class="col-md-5">
                        <img src="../assets/img/PageImage/forgotpass1.svg" alt="login" class="login-card-img">
                    </div>
                    <div id="card-start" class="col-md-7">
                        <div class="card-body">
                            <div class="brand-wrapper">
                                <img src="../assets/img/Logo.svg" alt="logo" class="logo">
                                <p>SKY BANK</p>
                            </div>
                            <p class="login-card-description">Validate Your Credential</p>

                            <!-- Login Form -->
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">

                                <div class="form-group">
                                    <label for="username" class="sr-only">Username</label>
                                    <input type="text" name="Username" id="Username" class="form-control" placeholder="Username" required>
                                    <p id="alert1" style="color: red;"></p>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="password" class="sr-only">Password</label>
                                    <input type="Account Number" name="AccountNo" id="AccountNo" class="form-control" placeholder="AccountNo" required>
                                </div>
                                <input name="next" id="next" class="btn btn-block login-btn mb-4" type="submit" value="Next >>">
                            </form>
                            <p class="login-card-footer-text">Go Back To <a href="../index.php" class="text-reset">Home</a></p>
                            <nav class="login-card-footer-nav">
                                <a href="../terms.html">Terms of use.</a>
                                <a href="../privacypolicy.html">Privacy policy</a>
                            </nav>
                        </div>
                    </div>
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
                title: "Account Alert!",
                text: "<?php echo $_GET['error'] ?>",
                icon: "error",
            });


        <?php } ?>
    </script>
</body>

</html>