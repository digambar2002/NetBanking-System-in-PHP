<?php
session_start();
include "../connection.php";

if (isset($_POST['AccountNumber'])) {

    $AccountNo = $_POST['AccountNumber'];

    $query = "SELECT * FROM login where AccountNo = '$AccountNo' and Status = 'Deactivated'";

    $result = mysqli_query($conn, $query) or die("Not Execute");
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['ID'];
            $Ac = $row['AccountNo'];
            $Username  = $row['Username'];
            $Status  = $row['Status'];
        }

        $_SESSION["ActiveAccountNo"] = $AccountNo;

        $data = array(
            'id' => $id,
            'Ac' => $Ac,
            'Username' => $Username,
            'Status' => $Status
        );

        echo json_encode($data);
    }
}

if (isset($_POST['Deactive_AccountNumber'])) {

    $AccountNo = $_POST['Deactive_AccountNumber'];

    $query = "SELECT * FROM login where AccountNo = '$AccountNo' and Status = 'Active'";

    $result = mysqli_query($conn, $query) or die("Not Execute");
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['ID'];
            $Ac = $row['AccountNo'];
            $Username  = $row['Username'];
            $Status  = $row['Status'];
        }

        $_SESSION["De_ActiveAccountNo"] = $AccountNo;

        $data = array(
            'id' => $id,
            'Ac' => $Ac,
            'Username' => $Username,
            'Status' => $Status
        );

        echo json_encode($data);
    }
}

// Close Account Code

if (isset($_POST['CloseAccountNo'])) {
    $CloaseAc = $_POST['CloseAccountNo'];
    $_SESSION["CloseAcNo"] = $CloaseAc;
    $query = "SELECT customer_detail.C_No, customer_detail.C_First_Name, customer_detail.C_Last_Name, customer_detail.Account_No, accounts.Balance, accounts.AccountType FROM customer_detail INNER JOIN accounts ON customer_detail.Account_No = accounts.AccountNo where customer_detail.Account_No ='$CloaseAc'";
    $result = mysqli_query($conn, $query) or die("Not Execute");

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['C_No'];
            $fname = $row['C_First_Name'];
            $lname = $row['C_Last_Name'];
            $Ac = $row['Account_No'];
            $Balance = $row['Balance'];
            $AcType = $row['AccountType'];
        }



        $data = array(
            'id' => $id,
            'fname' => $fname,
            'lname' => $lname,
            'Ac' => $Ac,
            'Balance' => $Balance,
            'AcType' => $AcType,
            'message' => null
        );

        echo json_encode($data);
    } else {
        $data = array(
            'message' => "Account Not Found"
        );
    }
}

if (isset($_POST['CloseAc'])) {
    $AccountNo = $_POST['CloseAc'];

    $Balquery = "SELECT customer_detail.C_No, customer_detail.C_First_Name, customer_detail.C_Last_Name, customer_detail.Account_No, accounts.Balance, accounts.AccountType FROM customer_detail INNER JOIN accounts ON customer_detail.Account_No = accounts.AccountNo where customer_detail.Account_No ='$AccountNo'";
    $Balresult = mysqli_query($conn, $Balquery) or die("Not Execute");

    if (mysqli_num_rows($Balresult) > 0) {
        while ($row = mysqli_fetch_assoc($Balresult)) {
            $Balance = $row['Balance'];
            $AcType = $row['AccountType'];
        }

        if ($Balance == '0.0') {

            $query = "DELETE FROM customer_detail WHERE Account_No = '$AccountNo';";
            $query .= "DELETE FROM login WHERE AccountNo = '$AccountNo';";
            $query .= "DELETE FROM accounts WHERE AccountNo = '$AccountNo';";
            $query .= "DELETE FROM cards WHERE AccountNo = '$AccountNo'";
            // multi query to execute multiple query at a time
            mysqli_multi_query($conn, $query) or die("Query Fail Here");   
           


            echo "Success";
        } else {
            echo "fail";
        }
    }
}
