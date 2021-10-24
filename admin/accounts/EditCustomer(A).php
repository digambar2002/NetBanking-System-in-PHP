<?php
session_start();

include "../connection.php";
include "../adminData.php";
//  Error Variables

$First_Name_error =  $Last_Name_error = $Father_Name_error = $Mother_Name_error = null;
$Birth_Date_error = $Mobile_Number_error =  $Pan_Number_error = $Adhar_Number_error = null;
$Email_error = $Pincode_error = null;

//  User varible


if (isset($_POST['EditTable_Edit_btn'])) {
    $EditAccountNo = $_POST['edit_id'];
    $query = "SELECT * FROM customer_detail WHERE Account_No = '$EditAccountNo' ";
    $result = mysqli_query($conn, $query) or die("Error");

    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {
            $EditFname = $row['C_First_Name'];
            $EditLname = $row['C_Last_Name'];
            $EditFaname = $row['C_Father_Name'];
            $EditManame = $row['C_Mother_Name'];
            $EditBDate = $row['C_Birth_Date'];
            $EditMobileNo = $row['C_Mobile_No'];
            $EditEmail = $row['C_Email'];
            $EditPincode = $row['C_Pincode'];
            $EditAdharDoc = $row['C_Adhar_Doc'];
            $EditPanDoc = $row['C_Pan_Doc'];
            $EditAccountNo = $row['Account_No'];
        }
    }
}




?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Edit Account Sky Bank</title>

    <!-- Favicons -->
    <link href="../../assets/img/favicon-32x32.png" rel="icon">
    <link href="../../assets/img/apple-icon-180x180.png" rel="apple-touch-icon">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700;800;900&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>



    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!--fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="../css/accounts/OpenAccount.css">

    <style>
        input[type="date"]::-webkit-calendar-picker-indicator {
            cursor: pointer;
            border-radius: 4px;
            margin-right: 2px;
            opacity: 0.6;
            filter: invert(0.8);
        }

        input[type="date"]::-webkit-calendar-picker-indicator:hover {
            opacity: 1
        }
    </style>

    <!-- Javascrip -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.2.0/dist/chart.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


</head>

<body class="dark_bg">


    <div id="wrapper">
        <div class="overlay"></div>

        <!-- Sidebar -->
        <nav class="fixed-top align-top" id="sidebar-wrapper" role="navigation">
            <div class="simplebar-content" style="padding: 0px;">
                <a class="sidebar-brand" href="../../index.php">
                    <span class="align-middle">SKY BANK</span>
                </a>

                <ul class="navbar-nav align-self-stretch">

                    <!-- <li class="sidebar-header">
                        Pages
                    </li> -->
                    <li class="menuHover">

                        <a href="../Dashboard.php" class="nav-link text-left" role="button" aria-haspopup="true" aria-expanded="false">
                            <i class="flaticon-bar-chart-1"></i><i class="bx bxs-dashboard ico"></i> Dashboard
                        </a>
                    </li>

                    <li class="has-sub menuHover">
                        <!-- this link href="collapseExample1" shows submenue  -->
                        <a class="nav-link collapsed text-left" href="#collapseExample1" role="button" data-toggle="collapse">
                            <i class="flaticon-user"></i> <i class="bx bxs-wallet-alt Profile ico"></i> Wallet
                        </a>
                        <!-- id is a collapseExample1 -->
                        <div class="collapse menu mega-dropdown" id="collapseExample1">
                            <div class="dropmenu" aria-labelledby="navbarDropdown">
                                <div class="container-fluid ">
                                    <div class="row">
                                        <div class="col-lg-12 px-2">
                                            <div class="submenu-box">
                                                <ul class="list-unstyled m-0">
                                                    <li><a href="../wallet/Withdraw.php">Withdraw Money</a></li>
                                                    <li><a href="../wallet/Deposit.php">Deposit Money</a></li>

                                                </ul>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>


                    <li class="menuHover">
                        <a href="../TransferMoney.php" class="nav-link text-left" role="button">
                            <i class="flaticon-bar-chart-1"></i><i class="bx bx-transfer ico"></i> Transfer
                        </a>
                    </li>

                    <li class="has-sub menuHover">
                        <a class="nav-link collapsed text-left" href="#collapseExample2" role="button" data-toggle="collapse">
                            <i class="flaticon-user"></i> <i class="bx bx-user-circle Profile ico"></i> Customer Accounts
                        </a>
                        <!-- Show class show dropdown by default -->
                        <div class="collapse show menu mega-dropdown " id="collapseExample2">
                            <div class="dropmenu" aria-labelledby="navbarDropdown">
                                <div class="container-fluid ">
                                    <div class="row">
                                        <div class="col-lg-12 px-2">
                                            <div class="submenu-box">
                                                <ul class="list-unstyled m-0">
                                                    <!-- active class for helight on which page we are -->
                                                    <!-- <li><a href="../accounts/OpenAccount.php">Open Account</a></li> -->
                                                    <li><a class="active" href="../accounts/EditAccount.php">Edit Account</a></li>
                                                    <li><a href="../accounts/ActivateAccount.php">Activate Account</a></li>
                                                    <li><a href="../accounts/DeactivateAccount.php">Deactivate Account</a></li>
                                                    <li><a href="../accounts/CloseAccount.php">Close Account</a></li>


                                                </ul>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="menuHover box-icon">
                        <a href="../VerifyAccount.php" class="nav-link text-left" role="button">
                            <i class="flaticon-bar-chart-1"></i> <i class="bx bx-check-circle ico"></i> Verify Account
                        </a>
                    </li>

                    <!-- <li class="menuHover" id="Transaction">
                        <a class="nav-link text-left" role="button">
                            <i class="flaticon-bar-chart-1"></i> <i class="bx bx-history ico"></i> Transaction
                        </a>
                    </li> -->






                    <!-- <li class="sidebar-header">
                        tools and component
                    </li> -->

                    <!-- <li class="menuHover box-icon">
                        <a class="nav-link text-left" role="button">
                            <i class="flaticon-bar-chart-1"></i> <i class="bx bx-dollar-circle ico"></i>Insurance Requests
                        </a>
                    </li>

                    <li class="menuHover box-icon">
                        <a class="nav-link text-left" role="button">
                            <i class="flaticon-bar-chart-1"></i><i class="bx bxs-coin ico"></i> Loan Requests
                        </a>
                    </li> -->

                   <li class="menuHover">
                        <a href="../admin/cards.php" class="nav-link text-left" role="button">
                            <i class="flaticon-bar-chart-1"></i> <i class="bx bxs-credit-card ico"></i>Cards Requests <span class="badge badge-success" style="font-size: 12px; margin-left: 50px;"> <?php echo $debitNotify; ?> new</span>
                        </a>
                    </li> 

                    <!-- <li class="sidebar-header">
                        tools and component
                    </li> -->
                    <!-- <li class="menuHover">
                        <a class="nav-link text-left" role="button">
                            <i class="flaticon-bar-chart-1"></i> <i class="bx bxs-cog ico"></i> Setting
                        </a>
                    </li> -->
                    <li class="menuHover">
                        <a href="../logout.php" class="nav-link text-left" role="button" href="../user/logout.php">
                            <i class="flaticon-map"></i><i class="bx bx-log-out ico"></i> Logout
                        </a>
                    </li>

                </ul>


            </div>


        </nav>
        <!-- /#sidebar-wrapper -->


        <!-- Page Content -->
        <div id="page-content-wrapper">


            <div id="content">

                <div class="container-fluid p-0 px-lg-0 px-md-0">
                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light gray_bg my-navbar">

                        <!-- Sidebar Toggle (Topbar) -->
                        <div type="button" id="bar" class="nav-icon1 hamburger animated fadeInLeft is-closed" data-toggle="offcanvas">
                            <span class="light_bg"></span>
                            <span class="light_bg"></span>
                            <span class="light_bg"></span>
                        </div>

                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav ml-auto">

                            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                            <li class="nav-item dropdown  d-sm-none">

                                <!-- Dropdown - Messages -->
                                <div class="dropdown-menu dropdown-menu-right p-3">
                                    <form class="form-inline mr-auto w-100 navbar-search">
                                        <div class="input-group">
                                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for...">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="button">
                                                    <i class="fas fa-search fa-sm"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </li>




                            <!-- Nav Item - User Information -->
                            <li class="nav-item ">
                                <a class="nav-link" href="#"  role="button">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $Admin ?></span>
                                    <img id="AdminDropdown" class="img-profile rounded-circle" src="<?php echo  $AdminProfileInner ?>">
                                </a>
                            </li>

                        </ul>

                    </nav>
                    <!-- End of Topbar -->

                    <?php
                    if (isset($_POST['Update1'])) {


                        $EditFname = $_POST['FirstName'];

                        $EditLname = $_POST['LastName'];
                        $EditFaname = $_POST['FatherName'];
                        $EditManame =  $_POST['MotherName'];
                        $EditBDate = $_POST['BirthDate'];
                        $EditMobileNo = $_POST['MobileNumber'];
                        $EditEmail = $_POST['email'];
                        $EditPincode = $_POST['pincode'];
                        $EditAccountNo = $_POST['AccountNo'];

                        // ********************************** Birth Date Validation *********************************************

                        $today = new DateTime();
                        $diff = $today->diff(new datetime($EditBDate));
                        $age = $diff->y;

                        if ($age < 18) {

                            $Birth_Date_error = "* You Are Not Eligible to Open Online Account.";
                        }

                        if (!is_numeric($EditMobileNo) || is_null($EditMobileNo) || !preg_match('/^[0-9]{10}+$/', $EditMobileNo)) {
                            $Mobile_Number_error = "Invalid Mobile Number";
                        }

                        // ************************************************** Email Validation *********************************************

                        if (!empty($EditEmail)) {
                            if (!preg_match('/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix', $EditEmail)) {
                                $Email_error = "* Invalid Email ID";
                            } else {
                                $EditEmail = mysqli_real_escape_string($conn, $_POST['email']);
                                $query2 = "SELECT * FROM customer_detail WHERE C_Email = '" . $EditEmail . "'";

                                $result2 =  mysqli_query($conn, $query2);

                                if (mysqli_num_rows($result2) > 1) {
                                   echo $Email_error = "* Email Already Exist";
                                   echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                   <strong>Email Already Exist!</strong> This Email Already Exist try another one.
                                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                     <span aria-hidden="true">&times;</span>
                                   </button>
                                 </div>';
                                }
                            }
                        } else {
                            $Email_error = "* Enter Your Email";
                        }

                        // ************************************************** Picode Validation *********************************************


                        if (!empty($EditPincode)) {
                            $match = '/^[1-9]{1}[0-9]{2}\s{0,1}[0-9]{3}$/';
                            if (!preg_match_all($match, $EditPincode)) {
                                $Pincode_error = "* Invalid Pincode";
                            }
                        } else {
                            $Pincode_error = "* Enter Your Area Pincode";
                        }

                        if (!empty($EditFname)) {
                            if (preg_match_all('!\d+!', $EditFname)) {
                                $First_Name_error = "* Numeric value not allowed in First Name";
                            }
                        } else {
                            $First_Name_error = "* Please Enter First Name";
                        }

                        if (!empty($EditLname)) {
                            if (preg_match_all('!\d+!', $EditLname) == 1) {
                                $Last_Name_error = "* Numeric value not allowed in Last Name";
                            }
                        } else {
                            $Last_Name_error = "* Please Enter Last Name";
                        }

                        if (!empty($EditFaname)) {
                            if (preg_match_all('!\d+!', $EditFaname) == 1) {
                                $Father_Name_error = "* Numeric value not allowed in Father Name";
                            }
                        } else {
                            $Father_Name_error = "* Please Enter Father Name";
                        }

                        if (!empty($EditManame)) {
                            if (preg_match_all('!\d+!', $EditManame) == 1) {
                                $Mother_Name_error = "* Numeric value not allowed in Mother Name";
                            }
                        } else {
                            $Mother_Name_error = "* Please Enter Mother Name";
                        }

                        if ($First_Name_error == null && $Last_Name_error == null && $Father_Name_error == null && $Mother_Name_error == null && $Birth_Date_error == null && $Mobile_Number_error == null && $Email_error == null && $Pincode_error == null) {

                            $query3 = "UPDATE customer_detail SET C_First_Name='$EditFname',C_Last_Name='$EditLname',C_Father_Name='$EditFaname',C_Mother_Name='$EditManame',C_Birth_Date='$EditBDate',C_Mobile_No='$EditMobileNo',C_Email='$EditEmail',C_Pincode='$EditPincode' WHERE Account_No= '$EditAccountNo'";
                            $result = mysqli_query($conn, $query3) or  die(mysqli_error($conn));
                            if ($result) {

                                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                           <strong>Your Account Updated!</strong> You should check in on some of those fields below.
                                           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                             <span aria-hidden="true">&times;</span>
                                           </button>
                                         </div>';
                            }
                        }
                    }
                    ?>

                    <!-- Begin Page Content -->
                    <div class="container-fluid px-lg-4 dark_bg light">
                        <div class="row">
                            <div class="col-md-12 mt-lg-4 mt-4">
                                <!-- Page Heading -->
                                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                    <h1 class="h3 mb-0 light">Edit Account #<?php echo $EditAccountNo ?></h1>

                                    <a href="../accounts/EditAccount.php"><button name="Edit_another" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm light btn-custo "><i class="bx bxs-pencil ico"></i> Edit Another</button></a>

                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="card gray_bg">
                                            <div class="card-body ">
                                                <h5 class="card-title light mb-4 ">Update Account Details</h5>


                                                <form id="regForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">


                                                    <!-- Tab 1 -->

                                                    <div class="tab mb-3">

                                                        <p class="SubAction" style="margin-top: 30px; margin: bottom 10px;">Update Personal Detail:</p>
                                                        <div class="row g-2 mb-3">
                                                            <div class="col-md">
                                                                <div class="col-md mb-3">

                                                                    <input type="hidden" name="AccountNo" value="<?php echo $EditAccountNo; ?>">

                                                                    <input type="text" name="FirstName" class="form-control dark_bg light" id="FirstName" placeholder="First Name" value="<?php echo $EditFname; ?>">

                                                                    <span id="FnameError" style="color: red;"><?php if (isset($_POST['Update1'])) {
                                                                                                                    echo $First_Name_error;
                                                                                                                } ?></span>

                                                                </div>
                                                            </div>
                                                            <div class="col-md">
                                                                <div class="col-md mb-3">


                                                                    <input type="text" name="LastName" class="form-control dark_bg light" id="Lname" placeholder="Last Name" value="<?php echo $EditLname; ?>">


                                                                    <span id="LnameError" style="color: red;"><?php if (isset($_POST['Update1'])) {
                                                                                                                    echo $Last_Name_error;
                                                                                                                } ?></span>


                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row g-2 mb-3">
                                                            <div class="col-md">
                                                                <div class="col-md mb-3">


                                                                    <input type="text" name="FatherName" class="form-control dark_bg light" id="FAname" placeholder="Father's Name" value="<?php echo $EditFaname; ?>">

                                                                    <span id="FAnameError" style="color: red;"><?php if (isset($_POST['Update1'])) {
                                                                                                                    echo $Father_Name_error;
                                                                                                                } ?></span>

                                                                </div>
                                                            </div>
                                                            <div class="col-md">
                                                                <div class="col-md mb-3">


                                                                    <input type="text" name="MotherName" class="form-control dark_bg light" id="MAname" placeholder="Mother's Name" value="<?php echo $EditManame; ?>">

                                                                    <span id="MAnameError" style="color: red;"><?php if (isset($_POST['Update1'])) {
                                                                                                                    echo $Mother_Name_error;
                                                                                                                } ?></span>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row g-2 mb-3">
                                                            <div class="col-md">
                                                                <div class="col-md mb-3">

                                                                    <input type="date" name="BirthDate" class="form-control dark_bg light m-wrap" id="BirthDate" placeholder="Birth Date" value="<?php echo strftime('%Y-%m-%d', strtotime($EditBDate)); ?>">

                                                                    <!-- <input type="date" class="m-wrap" value="<?php echo strftime('%Y-%m-%d', strtotime($EditBDate)); ?>" name="date" /> -->
                                                                    <span id="AgeError" style="color: red;"><?php if (isset($_POST['Update1'])) {
                                                                                                                echo $Birth_Date_error;
                                                                                                            } ?></span>

                                                                </div>
                                                            </div>
                                                            <div class="col-md">
                                                                <div class="col-md mb-3">

                                                                    <input name="MobileNumber" class="form-control dark_bg light" type="tel" id="MobileNo" pattern="[0-9]{10}" placeholder="Mobile Number" onkeypress="return isNumber(event)" value="<?php echo $EditMobileNo ?>">

                                                                    <span id="MobileNoError" style="color: red;"><?php if (isset($_POST['Update1'])) {
                                                                                                                        echo $Mobile_Number_error;
                                                                                                                    } ?></span>

                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row g-2 mb-3">
                                                            <div class="col-md">
                                                                <div class="col-md mb-3">

                                                                    <input type="email" name="email" class="form-control dark_bg light" id="email" placeholder="Email Address" value="<?php echo $EditEmail; ?>">

                                                                    <span id="EmailError" style="color: red;"><?php if (isset($_POST['Update1'])) {
                                                                                                                    echo $Email_error;
                                                                                                                } ?></span>

                                                                </div>
                                                            </div>
                                                            <div class="col-md">
                                                                <div class="col-md mb-3">

                                                                    <input name="pincode" class="form-control dark_bg light" type="tel" id="pincode" pattern="[0-9]{6}" placeholder="Pin Code" onkeypress="return isNumber(event)" value="<?php echo $EditPincode; ?>">

                                                                    <span id="PincodeError" style="color: red;"><?php if (isset($_POST['Update1'])) {
                                                                                                                    echo $Pincode_error;
                                                                                                                } ?></span>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-4" style="margin-top:40px; display:flex; align-items: center; justify-content:center;">

                                                            <input type="submit" name="Update1" value="Update" class="btn btn-sm btn-primary shadow-sm light btn-custo" style="font-size:20px; width: 200px; height:40px;">

                                                        </div>
                                                    </div>
                                                </form>

                                            </div>

                                        </div>
                                    </div>

                                </div>


                            </div>


                        </div>

                    </div>

                </div>


            </div>

            <footer class="footer gray_bg">
                <div class="container-fluid">
                    <div class="row text-muted">
                        <div class="col-6 text-left">
                            <p class="mb-0">
                                <a href="../../index.php" class="text-muted light"><strong>Sky Bank
                                    </strong></a> &copy
                            </p>
                        </div>
                        <div class="col-6 text-right">
                            <ul class="list-inline">
                                <!-- <li class="footer-item">
                                    <a class="text-muted light" href="#">Support</a>
                                </li>
                                <li class="footer-item">
                                    <a class="text-muted light" href="#">Help Center</a>
                                </li> -->
                                <li class="footer-item">
                                    <a class="text-muted light" href="../../privacypolicy.html">Privacy</a>
                                </li>
                                <li class="footer-item">
                                    <a class="text-muted light" href="../../terms.html">Terms</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>

        </div>
    </div>
    <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->





    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


    <script>
        $('#bar').click(function() {
            $(this).toggleClass('open');
            $('#page-content-wrapper ,#sidebar-wrapper').toggleClass('toggled');

        });

        $("#AdminDropdown").click(function() {
            $(this).popover({

                title: 'Profile Detail',
                html: true,
                container: "body",
                placement: 'bottom',
                content: ` <a href="../../admin/logout.php" role="button" class="btn btn-danger nav-link">Logout</a>`

            })


        });
    </script>


</body>

</html>