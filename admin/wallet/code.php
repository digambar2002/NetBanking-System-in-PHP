<?php

include "../connection.php";
include "../mail/TransactionMail.php";

if (isset($_POST['AcNo'])) {
    $AccountNo = $_POST['AcNo'];

    $query = "SELECT * FROM customer_detail JOIN login ON customer_detail.Account_No = login.AccountNo JOIN accounts ON accounts.AccountNo = login.AccountNo WHERE customer_detail.Account_No = '$AccountNo'";

    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $Fname = $row['C_First_Name'];
            $Lname = $row['C_Last_Name'];
            $AdharNo = $row['C_Adhar_No'];
            $PanNo = $row['C_Pan_No'];
            $MobileNo = $row['C_Mobile_No'];
            $Balance = $row['Balance'];
            $Status = $row['Status'];
        }

        $flag = "success";

        $data = array(

            'Flag' => $flag,
            'Fname' => $Fname,
            'Lname' => $Lname,
            'AdharNo' => $AdharNo,
            'PanNo' => $PanNo,
            'MobileNo' => $MobileNo,
            'Balance' => $Balance,
            'Status' => $Status
        );

        echo json_encode($data);
    } else {
        $flag = "fail";
        $data = array(
            'Flag' => $flag

        );

        echo json_encode($data);
    }
}

if (isset($_POST['AcState'])) {
    $AccountNo = $_POST['AcState'];

    $query = "SELECT * FROM customer_detail JOIN login ON customer_detail.Account_No = login.AccountNo JOIN accounts ON accounts.AccountNo = login.AccountNo WHERE customer_detail.Account_No = '$AccountNo'";

    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $Status = $row['Status'];
        }

        echo $Status;
    } else {
        echo "fail";
    }
}

if (isset($_POST['DepositAc'])) {
    $AccountNo = $_POST['DepositAc'];
    $Amount = $_POST['MainAmount'];

    if ($Amount >= 100) {

        // mysqli_begin_transaction($conn, MYSQLI_TRANS_START_READ_ONLY);

        $Result = mysqli_query($conn, "SELECT * FROM customer_detail JOIN login ON customer_detail.Account_No = login.AccountNo JOIN accounts ON accounts.AccountNo = login.AccountNo WHERE customer_detail.Account_No = '$AccountNo'") or die(mysqli_error($conn));
        if (mysqli_num_rows($Result) > 0) {

            while ($row = mysqli_fetch_assoc($Result)) {
                $Status = $row['Status'];
                $Balance = $row['Balance'];
                $Name = $row['C_First_Name'];
                $LName = $row['C_Last_Name'];
                $Email = $row['C_Email'];
            }
            if ($Status == "Active") {


                (string)$total = (float)$Amount + (float)$Balance;
                $SenderName = "SKY BANK";

                // Check How to roll back perform testing and send email both side

                try {

                    mysqli_begin_transaction($conn);

                    mysqli_query($conn, "UPDATE accounts SET Balance='$total' WHERE AccountNo = '$AccountNo'") or die(mysqli_error($conn));
                    mysqli_query($conn, "INSERT INTO transaction(AccountNo, FAccountNo, Name, Amount,Status, ProfileColor, Credit, Debit) VALUES ('$AccountNo', 'NA','$SenderName', '$Amount','Credited', 'blue', '$Amount', '0.0')") or die(mysqli_error($conn));
                    mysqli_commit($conn);

                    $date = date("d/m/Y");
                    $masked =  str_pad(substr($AccountNo, -4), strlen($AccountNo), 'X', STR_PAD_LEFT);
                    // echo $REmail." ".$RName." ".$Amount." ".$Rtotal." ".$date." ".$masked;

                    creditMoneyMail($Email, $Name, $Amount, $total, $date, $masked);
                    echo "Success";
                } catch (\Throwable $th) {
                    mysqli_rollback($conn);
                    echo "fail";
                }
            } else {
                echo "Transaction Fail Account Not Active";
            }
        }
    } else {
        echo "Transaction Fail minimum amount required 100 rs";
    }
}

// ------------------------------------------- Withdraw Money Code -------------------------------------------------

if (isset($_POST['WAcNo'])) {
    $AccountNo = $_POST['WAcNo'];

    $query = "SELECT * FROM customer_detail JOIN login ON customer_detail.Account_No = login.AccountNo JOIN accounts ON accounts.AccountNo = login.AccountNo WHERE customer_detail.Account_No = '$AccountNo'";

    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $Fname = $row['C_First_Name'];
            $Lname = $row['C_Last_Name'];
            $AdharNo = $row['C_Adhar_No'];
            $PanNo = $row['C_Pan_No'];
            $MobileNo = $row['C_Mobile_No'];
            $Balance = $row['Balance'];
            $Status = $row['Status'];
        }

        $flag = "success";

        $data = array(

            'Flag' => $flag,
            'Fname' => $Fname,
            'Lname' => $Lname,
            'AdharNo' => $AdharNo,
            'PanNo' => $PanNo,
            'MobileNo' => $MobileNo,
            'Balance' => $Balance,
            'Status' => $Status
        );

        echo json_encode($data);
    } else {
        $flag = "fail";
        $data = array(
            'Flag' => $flag

        );

        echo json_encode($data);
    }
}

if (isset($_POST['WAcState'])) {
    $AccountNo = $_POST['WAcState'];

    $query = "SELECT * FROM customer_detail JOIN login ON customer_detail.Account_No = login.AccountNo JOIN accounts ON accounts.AccountNo = login.AccountNo WHERE customer_detail.Account_No = '$AccountNo'";

    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $Status = $row['Status'];
        }

        echo $Status;
    } else {
        echo "fail";
    }
}





if (isset($_POST['WDepositAc'])) {
    $AccountNo = $_POST['WDepositAc'];
    $Amount = $_POST['WMainAmount'];

    if ($Amount >= 100) {

        // mysqli_begin_transaction($conn, MYSQLI_TRANS_START_READ_ONLY);

        $Result = mysqli_query($conn, "SELECT * FROM customer_detail JOIN login ON customer_detail.Account_No = login.AccountNo JOIN accounts ON accounts.AccountNo = login.AccountNo WHERE customer_detail.Account_No = '$AccountNo'") or die(mysqli_error($conn));
        if (mysqli_num_rows($Result) > 0) {

            while ($row = mysqli_fetch_assoc($Result)) {
                $Status = $row['Status'];
                $Balance = $row['Balance'];
                $Name = $row['C_First_Name'];
                $LName = $row['C_Last_Name'];
                $Email = $row['C_Email'];
            }

            if ($Balance != "0") {

                if ($Status == "Active") {


                    (string)$total = (float)$Balance - (float)$Amount;
                    $SenderName = "SKY BANK";

                    // Check How to roll back perform testing and send email both side

                    try {

                        mysqli_begin_transaction($conn);
                        $minusAmount = "-" . $Amount;
                        mysqli_query($conn, "UPDATE accounts SET Balance='$total' WHERE AccountNo = '$AccountNo'") or die(mysqli_error($conn));
                        mysqli_query($conn, "INSERT INTO transaction(AccountNo, FAccountNo, Name, Amount,Status, ProfileColor, Credit, Debit) VALUES ('$AccountNo', 'NA','$SenderName', '$minusAmount','Debited','blue', '0.0', '$Amount')");
                        mysqli_commit($conn);

                        $date = date("d/m/Y");
                        $masked =  str_pad(substr($AccountNo, -4), strlen($AccountNo), 'X', STR_PAD_LEFT);
                        // echo $REmail." ".$RName." ".$Amount." ".$Rtotal." ".$date." ".$masked;

                        debitMoneyMail($Email, $Name, $Amount, $total, $date, $masked);
                        echo "Success";
                    } catch (\Throwable $th) {
                        mysqli_rollback($conn);
                        echo "fail";
                    }
                } else {
                    echo "Transaction Fail Account Not Active";
                }
            } else {
                echo "Inseficcient Balance In Your Account!";
            }
        }
    } else {
        echo "Transaction Fail minimum amount required 100 rs";
    }
}
