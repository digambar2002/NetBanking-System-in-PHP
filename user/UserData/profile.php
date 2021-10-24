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

    <title>Profile Sky Bank</title>

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
    <link rel="stylesheet" href="../UserData/css/profile.css">


</head>

<body>
    <?php include "header.php" ?>
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid px-lg-4">
        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Profile</h1>
                    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i>
                        Generate Report</a> -->
                </div>


            </div>
        </div>
        <div class="row mt-2">
            <div class="col-sm-4">
                <div class="card">
                    <div>
                        <img class="card-img-top profile-banner" src="https://source.unsplash.com/1600x900/?nature" alt="Card image cap">
                    </div>

                    <div class="d-flex justify-content-center">
                        <img hidden id="ProfilePic" class="card-profile" alt="">

                        <div class="noProfile" id="ProfileTag">
                            <h2 class="nameTag" id="NameTag"></h2>
                        </div>
                    </div>
                    <div class="card-body">
                        <h1 class="namePlate" id="NamePlate"></h1>
                        <p id="GenderPlate" class="card-text text-center mb-2"></p>
                        <p id="AboutBio" class="card-text text-center" style="padding: 1rem 5rem;"></p>

                        <div class="d-flex justify-content-center">
                            <button type="button" id="EditProfileBtn" class="btn btn-outline-primary mb-2" data-toggle="modal" data-target="#EditProfileModal"><i class="fas fa-user-edit"></i> Edit Profile</button>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <h5 class="card-title mb-4">Balance</h5>
                                    <div><i class="fas fa-rupee-sign" style="color: #0cc91f; font-size:1.2rem;"></i></div>
                                </div>

                                <h1 id="BalanceDisplay" class="display-5 mt-1 mb-1 text-success"></h1>
                                <div class="mb-1">
                                    <span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i></span>
                                    <span class="text-muted">Your Total Balance</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <h5 class="card-title mb-4">Saving Balance</h5>
                                    <div><i class="fas fa-piggy-bank" style="color: #ff5ee7; font-size:1.2rem;"></i></div>
                                </div>

                                <h1 id="SavingDisplay" class="display-5 mt-1 mb-1 text-primary"></h1>
                                <div class="mb-1">
                                    <span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i></span>
                                    <span class="text-muted">Your Total Saving Balance</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">

                                <div class="d-flex justify-content-between">
                                    <h5 class="card-title mb-4">Account Detail</h5>
                                    <div><i class="fas fa-user-circle" style="color: #8000ff; font-size:1.2rem;"></i></div>
                                </div>

                                <h1 id="AccountDetail" class="display-5 mt-1 mb-3 text-primary"></h1>
                                <div style="display: flex; justify-content: space-between;">
                                    <div class="text-left" style="color: #616161;">
                                        <p>Account No</p>
                                        <p>Account Type</p>
                                        <p>Adhar Number</p>
                                        <p>Pan Number</p>
                                        <p>Account Status</p>
                                    </div>
                                    <div class="text-left">
                                        <p id="AcNo"></p>
                                        <p id="AcType"></p>
                                        <p id="Adhar"></p>
                                        <p id="Pan"></p>
                                        <p id="Status"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-body">

                                        <div class="d-flex justify-content-between">
                                            <h5 class="card-title mb-3">Login Detail</h5>
                                            <div><i class="fas fa-key" style="color: #ffbf00; font-size:1.2rem;"></i></div>
                                        </div>
                                        <div style="display: flex; justify-content: space-between;">
                                            <div class="text-left" style="color: #616161;">
                                                <p>Username</p>
                                                <p>Password</p>

                                            </div>
                                            <div class="text-left">
                                                <p id="Username"><?php echo $username; ?></p>
                                                <p id="Password">••••••••••••</p>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-body">

                                        <div class="d-flex justify-content-between">
                                            <h5 class="card-title mb-3">Contact Detail</h5>
                                            <div><i class="fas fa-paper-plane" style="color: #0077ff; font-size:1.2rem;"></i></div>
                                        </div>
                                        <div style="display: flex; justify-content: space-between;">
                                            <div class="text-left" style="color: #616161;">
                                                <p>Mobile No</p>
                                                <p>Email </p>

                                            </div>
                                            <div class="text-left">
                                                <p id="MobileNo"></p>
                                                <p id="Email"></p>

                                            </div>
                                        </div>
                                    </div>
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

    <!-- Upload Modal -->


    <!-- Large modal -->

    <div id="EditProfileModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="code.php" method="POST" enctype="multipart/form-data">
                    <div class="row mt-4 ml-2 mr-2">
                        <div class="col-sm-12">
                            <h5 class="modal-title" id="exampleModalLongTitle">Edit Profile</h5>

                        </div>
                    </div>
                    <div class="row mt-4 ml-5 mr-5">


                        <div class="col-sm-12">

                            <!-- Profile Image Show Here -->
                            <div class="d-flex justify-content-center">
                                <div>
                                    <i id="ProfileIcon" class="fas fa-user-circle" style="color: #a8a8a8; font-size: 9rem;"></i>
                                    <img hidden class="profileImage" id="ModalProfileImg" alt="profile">
                                </div>
                            </div>

                            <!-- Upload Image Button -->

                            <div class="d-flex justify-content-center mt-4">
                                <input type="file" name="upload" id="upload" hidden>

                                <label id="uploadLabel" for="upload" class="btn btn-primary profileUpload">
                                    <i class="material-icons-outlined" style="font-size: 2rem; margin-top: 5px">&#xe439;</i>
                                </label>
                            </div>

                            <div class="mr-4 ml-4 mb-4">


                                <label for="bio">Enter Your Bio</label>
                                <input id="bio" name="bio" class="form-control mb-5" type="text" placeholder="" aria-label="default input example">

                                <label for="genderbox">Select Your Gender</label>
                                <div id="genderbox">
                                    <div class="form-check form-check-inline mr-5">
                                        <input style="transform: scale(1.5);" class="form-check-input" type="radio" name="gender" id="Male" value="Male">
                                        <label class="form-check-label" for="inlineRadio1"><i class="material-icons-outlined" style="font-size: 3rem; margin-top: 5px; color: #3d3aff;">&#xe58e;</i></label>
                                    </div>
                                    <div class="form-check form-check-inline mr-5">
                                        <input style="transform: scale(1.5);" class="form-check-input" type="radio" name="gender" id="Female" value="Female">
                                        <label class="form-check-label" for="inlineRadio2"><i class="material-icons-outlined" style="font-size: 3rem; margin-top: 5px; color: #ff006a;">&#xe590;</i></label>
                                    </div>
                                </div>



                            </div>



                        </div>

                    </div>

                    <!-- close this modal with button  -->

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" id="close">Close</button>
                        <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
                    </div>

                </form>

            </div>
        </div>
    </div>


    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="../UserData/js/profile.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../UserData/js/profileInfo.js"></script>
    <!-- <script src="sweetalert2.all.min.js"></script> -->

    <script>
        $('#bar').click(function() {
            $(this).toggleClass('open');
            $('#page-content-wrapper ,#sidebar-wrapper').toggleClass('toggled');


        });
        
        $("#Profile").addClass("subActive");
        $("#collapseExample2").addClass("show");

        $("#close").click(function (e) { 

            $("#EditProfileModal").modal('hide');
            e.preventDefault();
            
        });

        $("#bankBrand").addClass("mt-4");
    </script>

    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>


</body>

</html>