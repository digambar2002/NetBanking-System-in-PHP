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

    <title>Transaction History Sky Bank</title>

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


</head>

<body>
    <?php include "header.php" ?>
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid px-lg-4">
        <div class="row">
            <div class="col-md-12 mt-4">

                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Transaction History</h1>
                    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i>
                        Generate Report</a> -->
                </div>

                <div class="card">
                    <div class="card-body">
                        <!-- title -->
                        <div class="d-md-flex align-items-center">
                            <div>
                                <h4 class="card-title">Transaction History</h4>
                                <h5 class="card-subtitle">Overview of All Time Transaction</h5>
                            </div>
                            <div class="ml-auto">
                                <!-- <a href="T_history.php" class="btn btn-info" role="button">View More</a> -->
                                <!-- <div class="dl">
                                    <select class="custom-select">
                                        <option value="0" selected="">Monthly</option>
                                        <option value="1">Daily</option>
                                        <option value="2">Weekly</option>
                                        <option value="3">Yearly</option>
                                    </select>
                                </div> -->
                            </div>
                        </div>
                        <!-- title -->
                    </div>
                    <div class="table-responsive">
                        <table class="table v-middle">
                            <thead>
                                <tr class="bg-light">
                                    <th class="border-top-0">Sr.No</th>
                                    <th class="border-top-0">Name</th>
                                    <th class="border-top-0">Account No</th>
                                    <th class="border-top-0">Date</th>
                                    <th class="border-top-0">Amount</th>
                                    <th class="border-top-0">Status</th>


                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * FROM transaction WHERE AccountNo = '$AccountNo' ORDER BY id DESC";
                                $result = mysqli_query($conn, $query) or die("query fail");

                                if (mysqli_num_rows($result) > 0) {
                                    $increment = 1;
                                    while ($row = mysqli_fetch_assoc($result)) {

                                ?>
                                        <tr>
                                            <td><?php echo $increment; ?></td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="m-r-10"><a style="font-size: 13px; background-color:<?php echo $row['ProfileColor'] ?>" class="btn btn-circle text-white"> <?php
                                                                                                                                                                                            $name = $row['Name'];
                                                                                                                                                                                            $pices = explode(" ", $name);
                                                                                                                                                                                            echo substr($pices[0], 0, 1);
                                                                                                                                                                                            echo substr($pices[1], 0, 1);
                                                                                                                                                                                            ?></a>
                                                    </div>
                                                    <div class="">
                                                        <h4 class="m-b-0 font-16"><?php echo $row['Name'] ?></h4>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><?php echo $row['FAccountNo'] ?></td>
                                            <td><?php echo $row['Date'] ?></td>
                                            <td>
                                                <label class="label label-danger"><?php echo $row['Amount'] ?></label>
                                            </td>
                                            <td>

                                                <span class="Status
                                            
                                            <?php
                                            if ($row['Status'] == 'Debited')
                                                echo "text-danger";
                                            else
                                                echo "text-success";
                                            ?>"><?php echo $row['Status'] ?></span>

                                            </td>

                                        </tr>
                                    <?php
                                        $increment++;
                                    } ?>
                                <?php } ?>

                            </tbody>
                        </table>
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


    <script>
        $('#bar').click(function() {
            $(this).toggleClass('open');
            $('#page-content-wrapper ,#sidebar-wrapper').toggleClass('toggled');


        });
        console.log("hello");
        $("#TransactionHistory").addClass("active");
    </script>

</body>

</html>