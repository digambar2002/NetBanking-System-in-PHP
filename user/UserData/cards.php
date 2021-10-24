<?php
include "../connection.php";

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
}
$username = $_SESSION['username'];
$AccountNo = $_SESSION['AccountNo'];


?>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Cards Sky Bank</title>

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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

    <link rel="stylesheet" href="../../assets/css/UserDash.css">
    <link rel="stylesheet" href="../UserData/css/cards.css">

</head>

<body>
    <?php include "header.php" ?>
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class=" begin container-fluid px-lg-4">
        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Cards</h1>
                    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i>
                        Generate Report</a> -->
                </div>


            </div>
        </div>

        <?php
        $query = "SELECT * FROM cards WHERE AccountNo = '$AccountNo' ";

        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        if (mysqli_num_rows($result) > 0) {

            while ($row = mysqli_fetch_assoc($result)) {
                $Status = $row['Status'];
                $Verified = $row['Verified'];
                $DebitCardNo = $row['CardNo'];
                $Name = $row['Name'];
                $IssuDate = $row['IssuedDate'];
                $ExpiryDate = $row['ExpiryDate'];
                $cvv = $row['cvv'];
            }

            if ($Verified == "No") { ?>
                <div class="row mt-2 d-flex justify-content-center">
                    <div class="col-sm-8">
                        <div class="card">
                            <div class="d-flex justify-content-center">


                                <div class="noProfile" id="ProfileTag">
                                    <h2 class="nameTag" id="NameTag"></h2>
                                </div>
                            </div>
                            <div class="card-body">
                                <h1 class="text-center mb-4 text-success">Your Application Sent Successfully</h1>
                                <p class="card-text pl-2 pr-2">Dear sir/madam, </p>
                                <p class="card-text pl-2 pr-2"> &emsp; You Have Successfully send your debit card Application to the bank, Your virtual debit card verificaton in progress. The Debit Card Availabel within two to three days. </p>
                                <p class="card-text pl-2 pr-2">Thank You, </p>
                                <p class="card-text mb-4 pl-2 pr-2">Sky Bank</p>


                            </div>
                        </div>
                    </div>
                </div>
            <?php
            } elseif ($Status == "Active") { ?>

                <div class="row mt-2">
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="d-flex justify-content-center">


                                <div class="noProfile" id="ProfileTag">
                                    <h2 class="nameTag" id="NameTag"></h2>
                                </div>
                            </div>

                            <!-- Debit Card Body -->

                            <div class="card-body">
                                <h1 class="text-center">Your Debit Card</h1>

                                <div class="flip-card">
                                    <div class="flip-card-inner">
                                        <div class="flip-card-front">
                                            <div class="row mt-4 mb-4 d-flex justify-content-center">
                                                <div id="debitCard-col" class="col-sm-8 mt-4 ">
                                                    <div class="card dcard-back">
                                                        <div class="card-body">
                                                            <div class="d-flex justify-content-between">
                                                                <h5 class="text-light">Sky Bank</h5>
                                                                <h5 class="text-light visa">Visa</h5>
                                                            </div>

                                                            <div class="mt-2 mb-2  d-flex justify-content-start">
                                                                <img src="../UserData/assets/img/gold-card-chip.png" alt="">
                                                            </div>

                                                            <div class=" d-flex justify-content-start">
                                                                <h5 hidden id="DebitcardNo" class="text-light"><?php echo $DebitCardNo ?></h5>
                                                                <h4 id="NewDebitNo" class="text-light" style="font-family: 'Courier New', Courier, monospace;"></h4>
                                                            </div>

                                                            <div class="d-flex justify-content-between mt-3">
                                                                <h6 class="text-light" style="font-family: 'Courier New', Courier, monospace;"><?php echo $Name ?></h6>
                                                                <h6 class="text-light" style="font-family: 'Courier New', Courier, monospace;">Exp <?php echo $ExpiryDate ?></h6>

                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>


                                        <div class="flip-card-back">
                                            <div id="debitCard-col" class="col-sm-8 mt-4 ">
                                                <div id="OnCardToggle" class="card dcard-back">
                                                    <div class="card-body" style="padding: 0px;">

                                                        <div style="padding-top: 10px;">
                                                            <p class="text-light dback-tittle">for customer service call +91 1940 88 7655</p>
                                                        </div>

                                                        <div class="strip">
                                                        </div>

                                                        <div>
                                                            <div class="strip2">
                                                                <p style="text-align: end; color:black; padding:4px"><?php echo $cvv ?></p>
                                                            </div>

                                                            <p class="description">This card issued by Sky Bank Bank pursuant to a license from Visa India,
                                                                Inc. Use ofthis card is subject to the agreement, as amended, This card isthe property ofthe issuer and must
                                                                be returned upon request and may be revoked without notice.</p>

                                                        </div>


                                                        <div class=" d-flex justify-content-start">
                                                            <h4 id="NewDebitNo" class="text-light" style="font-family: 'Courier New', Courier, monospace;"></h4>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>

                            <!-- Debit Card Details -->


                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h1 class="text-center mb-4 ">Your Debit Card Details</h1>

                                <div class="d-flex justify-content-between">
                                    <div>
                                        <p>Account Number</p>
                                        <p>Debit Card Number</p>
                                        <p>Name</p>
                                        <p>CVV Number</p>
                                        <p>Issued Date</p>
                                        <p>Expiry Date</p>
                                        <p>Card Status</p>
                                        <p>Verification Status</p>
                                    </div>

                                    <div>
                                        <p>:</p>
                                        <p>:</p>
                                        <p>:</p>
                                        <p>:</p>
                                        <p>:</p>
                                        <p>:</p>
                                        <p>:</p>
                                        <p>:</p>
                                    </div>

                                    <div>
                                        <p><?php echo $AccountNo ?></p>
                                        <p><?php echo $DebitCardNo ?></p>
                                        <p><?php echo $Name ?></p>
                                        <p><?php echo $cvv ?></p>
                                        <p><?php echo $IssuDate ?></p>
                                        <p><?php echo $ExpiryDate ?></p>
                                        <p><?php echo $Status ?></p>
                                        <p><?php echo $Verified ?></p>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>

            <?php
            } elseif ($Status == "Inactive") { ?>
                <h5 class="text-danger text-center text-size-10">Your Debit Card is Deactivated Please Call Bank To activate</h5>
            <?php }
        } else { ?>
            <div class="row mt-2 d-flex justify-content-center">
                <div class="col-sm-8">
                    <div class="card">
                        <div class="d-flex justify-content-center">


                            <div class="noProfile" id="ProfileTag">
                                <h2 class="nameTag" id="NameTag"></h2>
                            </div>
                        </div>
                        <div class="card-body">
                            <h1 class="text-center mb-4">Apply for Virtual Debit Card</h1>
                            <p class="card-text mb-4 p-2">State Bank Virtual card, also known as Electronic Card or e-Card, is a limit Debit Card created for ecommerce transactions. It provides an easy and secure way of transacting online without providing the Primary Card/ Account information to the merchant.Virtual Cards can be used at any merchant location accepting MasterCards or Visa Cards online, without any difference from a regular plastic card</p>

                            <div class="d-flex justify-content-center">
                                <button type="button" id="SendAppBtn" class="btn btn-outline-primary mb-2">Send Application</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        <?php }
        mysqli_close($conn);
        ?>


    </div>

    </div>
    <!-- End of Page Content -->

    <?php include "footer.php" ?>
    <!-- Wraper Ends Here -->



    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../UserData/js/profileInfo.js"></script>

    <script src="../UserData/js/cards.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $('#bar').click(function() {
            $(this).toggleClass('open');
            $('#page-content-wrapper ,#sidebar-wrapper').toggleClass('toggled');
            $("#debitCard-col").toggleClass("col-sm-10");
            $("#OnCardToggle").toggleClass("onfip-posion-toogle");

        });

        $("#Cards").addClass("active");

        $("#bankBrand").addClass("mt-4");

        $("#close").click(function(e) {

            $("#EditProfileModal").modal('hide');
            e.preventDefault();

        });
    </script>

    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>


</body>

</html>