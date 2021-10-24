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

    <title>Saving Sky Bank</title>

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!--fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="../../assets/css/UserDash.css">
    <style>
        #counter {
            position: absolute;
            left: 44%;
            right: auto;
            top: 47%;
            font-size: 2rem;
            color: #006CFA;
        }

        .gradient-target {
            background-color: #f3ec78;
            background-image: radial-gradient(#FF0026 15%, #FF0026 60%);
            background-size: 100%;
            -webkit-background-clip: text;
            -moz-background-clip: text;
            -webkit-text-fill-color: transparent;
            -moz-text-fill-color: transparent;
            font-size: 100px;
        }

        .transfer-icon {
            background-color: #f3ec78;
            background-image: linear-gradient(#21c8ff, #003dc7);
            background-size: 100%;
            -webkit-background-clip: text;
            -moz-background-clip: text;
            -webkit-text-fill-color: transparent;
            -moz-text-fill-color: transparent;
            font-size: 100px;
        }

        .piggybank {
            font-size: 100px;
            background-color: #f3ec78;
            background-image: radial-gradient(#FF0026 -160%, pink 80%);
            background-size: 100%;
            -webkit-background-clip: text;
            -moz-background-clip: text;
            -webkit-text-fill-color: transparent;
            -moz-text-fill-color: transparent;
            font-size: 100px;

        }

        .btn-success {
            background-color: #24AB1D;
        }
    </style>


</head>

<body>
    <?php include "header.php" ?>
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid px-lg-4">
        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Saving</h1>
                    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i>
                        Generate Report</a> -->
                </div>
                <div class="row">
                    <div class="col-md-4">

                        <!-- Add Money Class -->
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mb-4 ">Add Money for Saving</h5>
                                <h1 id="CreditDisplay" class="display-5 mt-1 mb-3 text-success"></h1>

                                <div class="d-flex justify-content-center">
                                    <i class="fas fa-piggy-bank piggybank fa-flip-horizontal"></i>
                                </div>

                                <div class="d-flex justify-content-center mt-5">
                                    <button id="AddMoneyBtn" class="btn btn-primary" type="button"> &nbsp; &nbsp;<i class="fas fa-plus-circle"></i> &nbsp; Add Money &nbsp; &nbsp;</button>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mb-4 ">Total Saving Balance</h5>
                                <h1 id="SavingDisplay" class="display-5 mt-1 mb-3 text-success"></h1>
                                <div class="mb-1">
                                    <span id="CreditLastM" class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i></span>
                                    <span class="text-muted">Your Total Saving Balance</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mb-4 ">Target Progress</h5>
                                <h1 id="CreditDisplay" class="display-5 mt-1 mb-3 text-success"></h1>
                                <div class="mb-1 d-flex justify-content-center">



                                    <div id="circle"> <strong id="counter">100%</strong></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mb-4 ">Set Saving Amount</h5>
                                <h1 class="display-5 mt-1 mb-3 text-success"></h1>


                                <div class="d-flex justify-content-center">
                                    <img style="height: 100px;" src="../UserData/assets/img/target.svg" alt="">
                                </div>

                                <div class="d-flex justify-content-center mt-5">
                                    <button id="SetTarget" class="btn btn-success setAmountbtn "> <img style="height: 18px;" src="../UserData/assets/img/targetBtn.svg" alt=""> Set Target Amount</button>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mb-4 ">Target Amount</h5>
                                <h1 id="TargetDisplay" class="display-5 mt-1 mb-3 text-primary"></h1>
                                <div class="mb-1">


                                    <span id="CreditLastM" class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i></span>
                                    <span class="text-muted">Any Time You can Change Your Target</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mb-4 ">Transfer Money to Main Account</h5>
                                <h1 id="CreditDisplay" class="display-5 mt-1 mb-3 text-success"></h1>

                                <div class="d-flex justify-content-center">
                                    <i class="fas fa-exchange-alt transfer-icon"></i>
                                </div>
                                <div class="d-flex justify-content-center mt-5">
                                    <button id="TransferBtn" class="btn btn-primary" type="button"> &nbsp; &nbsp;<i class="fas fa-wallet"></i> &nbsp; Transfer Saving &nbsp; &nbsp;</button>
                                </div>
                                <div class="mb-1">


                                    <span id="CreditLastM" class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i></span>
                                    <span class="text-muted"></span>
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
    <script src="../UserData/assets/jquery-circle-progress-master/dist/circle-progress.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../UserData/js/profileInfo.js"></script>
    <script src="../UserData/js/saving.js"></script>

    <script>
        $('#bar').click(function() {
            $(this).toggleClass('open');
            $('#page-content-wrapper ,#sidebar-wrapper').toggleClass('toggled');


        });
        
        console.log("hello");
        $("#Saving").addClass("active");
    </script>

</body>

</html>