<?php
include "../connection.php";

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
}
$username = $_SESSION['username'];
$AccountNo = $_SESSION['AccountNo'];


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Secure Account Sky Bank</title>

    <!-- Favicons -->
    <link href="../../assets/img/favicon-32x32.png" rel="icon">
    <link href="../../assets/img/apple-icon-180x180.png" rel="apple-touch-icon">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700;800;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../../assets/vendor/boxicons/css/boxicons.css">
    <link rel="stylesheet" href="../../assets/vendor/boxicons/css/boxicons.min.css">
    <link rel="stylesheet" href="../../assets/vendor/boxicons/css/animations.css">
    <link rel="stylesheet" href="../../assets/vendor/boxicons/css/transformations.css">


    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!--fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="../../assets/css/UserDash.css">
    <link rel="stylesheet" href="../UserData/css/secureAc.css">


</head>

<body>
    <?php include "header.php" ?>
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid px-lg-4">
        <div class="row">
            <div class="col-md-12 mt-4">

                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Secure Account</h1>
                    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i>
                        Generate Report</a> -->
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body">
                                <!-- title -->
                                <div class="d-md-flex align-items-center">
                                    <div>
                                        <h4 class="card-title">Change Username</h4>
                                        <h5 class="card-subtitle"></h5>
                                    </div>
                                </div>


                                <div class="mr-4 ml-4">

                                    <div class="mb-4 mt-4 ">
                                        <input type="text" class="form-control" value="<?php echo $username ?>" placeholder="Enter Username" id="OldUsername" disabled require>
                                        <div id="OldUserError" style="color: red;" class="form-text"></div>
                                    </div>

                                    <div class="mb-4 mt-4">
                                        <input type="text" placeholder="Enter New Username" class="form-control" id="NewUsername" require>
                                        <div id="NewUserError" style="color: red;" class="form-text"></div>
                                    </div>

                                    <div class="mb-4 mt-4">
                                        <input type="password" placeholder="Enter Password" class="form-control" id="UserPassword" require>
                                        <div id="UserPassError" style="color: red;" class="form-text"></div>
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <button id="UsernameBtn" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="col-sm-5">

                        <div class="card">
                            <div class="card-body">
                                <!-- title -->
                                <div class="d-md-flex align-items-center">
                                    <div>
                                        <h4 class="card-title">Change Password</h4>
                                        <h5 class="card-subtitle"></h5>
                                    </div>
                                </div>
                                <!-- title -->

                                <div class="mr-4 ml-4">

                                    <div class="mb-4 mt-4 ">
                                        <input type="password" class="form-control" placeholder="Enter Your Password" id="OldPassword" require>
                                        <div id="OldPassError" style="color: red;" class="form-text"></div>
                                    </div>

                                    <div class="mb-4 mt-4">
                                        <input type="password" placeholder="Enter New Password" class="form-control" id="NewPassword" require>
                                        <div id="NewPassError" style="color: gray; font-size: 12px" class="form-text"> Your password must be 8-12 characters long, contain letters and numbers, and must not contain spaces, special characters .</div>
                                    </div>

                                    <div class="mb-4 mt-4">
                                        <input type="password" placeholder="Confirm Password" class="form-control" id="ConfirmPassword" require>
                                        <div id="ConfirmPassError" style="color: red;" class="form-text"></div>
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <button id="PasswordBtn" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="col-sm-3">
                        <div class="card">
                            <div class="card-body">
                                <!-- title -->
                                <div class="d-md-flex align-items-center">
                                    <div>
                                        <h4 class="card-title">Activate / Deactivate Account</h4>
                                        <h5 class="card-subtitle"></h5>
                                    </div>
                                </div>

                                <div class="mb-5 mt-5 d-flex justify-content-center">
                                    <label class="switch">
                                        <input id="SwitchBtn" type="checkbox">
                                        <span class="slider round"></span>
                                        <p class="mt-4 text-center" id="Status" ><Strong></Strong></p>

                                    </label>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    </div>
    <!-- End of Page Content -->

    <?php include "footer.php" ?>
    <!-- Wraper Ends Here -->


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="../UserData/js/profileInfo.js"></script>
    <script src="../UserData/js/secureAccount.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../UserData/js/showHidePass.js"></script>

    <script>
        $('#bar').click(function() {
            $(this).toggleClass('open');
            $('#page-content-wrapper ,#sidebar-wrapper').toggleClass('toggled');


        });
        console.log("hello");
        $("#SecureAccount").addClass("subActive");
        $("#collapseExample2").addClass("show");
    </script>

    <script>
        $(document).ready(function() {
            $('input[type=\'password\']').showHidePassword();

        });
    </script>

</body>

</html>