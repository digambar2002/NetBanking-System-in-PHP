<?php
include "../admin/connection.php";
include "../mail/TransactionMail.php";

if (isset($_POST['CAccountNo'])) {
    $AccountNo = $_POST['CAccountNo'];

    // $query = "SELECT * FROM customer_detail INNER JOIN login ON customer_detail.Account_No=login.AccountNo WHERE login.Status = 'Inactive' AND login.AccountNo ='$AccountNo'";

    $query = "SELECT * FROM customer_detail WHERE Account_No = '$AccountNo'";

    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $Fname = $row['C_First_Name'];
            $Lname = $row['C_Last_Name'];
            $Faname = $row['C_Father_Name'];
            $Maname = $row['C_Mother_Name'];
            $Bdate = $row['C_Birth_Date'];
            $AdharNo = $row['C_Adhar_No'];
            $PanNo = $row['C_Pan_No'];
            $MobileNo = $row['C_Mobile_No'];
            $Email = $row['C_Email'];
            $Pincode = $row['C_Pincode'];
            $AdharDoc = $row['C_Adhar_Doc'];
            $PanDoc = $row['C_Pan_Doc'];
        }

        $data = array(
            'Fname' => $Fname,
            'Lname' => $Lname,
            'Faname' => $Faname,
            'Maname' => $Maname,
            'Bdate' => $Bdate,
            'AdharNo' => $AdharNo,
            'PanNo' => $PanNo,
            'MobileNo' => $MobileNo,
            'Email' => $Email,
            'Pincode' => $Pincode,
            'AdharDoc' => $AdharDoc,
            'PanDoc' => $PanDoc
        );

        echo json_encode($data);
    }
}

// Verify / Verify Account Code

if (isset($_POST['VerifyAc'])) {
    $AccountNo = $_POST['VerifyAc'];

    $query = "UPDATE login SET Status = 'Active' WHERE AccountNo = '$AccountNo'";
    mysqli_query($conn, $query) or die(mysqli_error($conn));
    echo "Success";
}

// Verify/ Reject Account Code
if (isset($_POST['RejectAc'])) {
    $AccountNo = $_POST['RejectAc'];

    $query = "DELETE FROM customer_detail WHERE Account_No = '$AccountNo';";
    $query .= "DELETE FROM login WHERE AccountNo = '$AccountNo';";
    $query .= "DELETE FROM accounts WHERE AccountNo = '$AccountNo'";
    // multi query to execute multiple query at a time
    mysqli_multi_query($conn, $query) or die(mysqli_error($conn));

    echo "Success";
}

// verify/ reset id code

if (isset($_POST['done'])) {

    $resetQuery = "SET @autoid := 0;
        UPDATE accounts SET ID = @autoid := (@autoid+1);
        ALTER TABLE accounts AUTO_INCREMENT = 1;
        SET @autoid := 0;
        UPDATE customer_detail SET C_No = @autoid := (@autoid+1);
        ALTER TABLE customer_detail AUTO_INCREMENT = 1;
        SET @autoid := 0;
        UPDATE login SET ID = @autoid := (@autoid+1);
        ALTER TABLE login AUTO_INCREMENT = 1";
    mysqli_multi_query($conn, $resetQuery) or die(mysqli_error($conn));
}



// Debit Cards

// Check Debit card Code

if (isset($_POST['DebitCardCheck'])) {
    $AccountNo = $_POST['DebitCardCheck'];
    $issuedDate = date('d/m/y');
    $ExpiryDate = date('m/y', strtotime('+10 years'));
    $query = "UPDATE cards SET Status = 'Active', IssuedDate = '$issuedDate', ExpiryDate = '$ExpiryDate', Verified = 'Yes' WHERE AccountNo = '$AccountNo'";
    mysqli_query($conn, $query) or die(mysqli_error($conn));
    echo "Success";
}

// Reject Debit card Code
if (isset($_POST['DebitCardReject'])) {
    $AccountNo = $_POST['DebitCardReject'];

    $query = "DELETE FROM cards WHERE AccountNo = '$AccountNo'";
    mysqli_query($conn, $query) or die(mysqli_error($conn));
    echo "Success";
}

// TransferMoney / SenderAccount

if (isset($_POST['SenderAcNo'])) {
    $AccountNo = $_POST['SenderAcNo'];

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

// TransferMoney / ReceiverAccount

if (isset($_POST['ReceiverAcNo'])) {
    $AccountNo = $_POST['ReceiverAcNo'];

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

// TransferMoney / Checking Balance

if (isset($_POST['BalanceCheck'])) {
    $AccountNo = $_POST['BalanceCheck'];

    $query = "SELECT * FROM accounts WHERE AccountNo = '$AccountNo'";

    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $Balance = $row['Balance'];
        }
        echo $Balance;
    }
}




// TransferMoney / Transaction Code

if (isset($_POST['TSenderAc'])) {
    $SenderAc = $_POST['TSenderAc'];
    $ReceiverAc = $_POST['TReceiverAc'];
    $Amount = $_POST['MainAmount'];

    if ($SenderAc == $ReceiverAc) {
        echo "Can't Transfer Money in same account";
    } else {

        if ($Amount >= 100) {

            // mysqli_begin_transaction($conn, MYSQLI_TRANS_START_READ_ONLY);

            $SenderResult = mysqli_query($conn, "SELECT * FROM customer_detail JOIN login ON customer_detail.Account_No = login.AccountNo JOIN accounts ON accounts.AccountNo = login.AccountNo WHERE customer_detail.Account_No = '$SenderAc'") or die(mysqli_error($conn));
            if (mysqli_num_rows($SenderResult) > 0) {

                while ($row = mysqli_fetch_assoc($SenderResult)) {
                    $SStatus = $row['Status'];
                    $SBalance = $row['Balance'];
                    $SName = $row['C_First_Name'];
                    $SLName = $row['C_Last_Name'];
                    $SEmail = $row['C_Email'];
                    $SProColor = $row['ProfileColor'];
                }

                $ReceiverResult = mysqli_query($conn, "SELECT * FROM customer_detail JOIN login ON customer_detail.Account_No = login.AccountNo JOIN accounts ON accounts.AccountNo = login.AccountNo WHERE customer_detail.Account_No = '$ReceiverAc'") or die(mysqli_error($conn));
                if (mysqli_num_rows($ReceiverResult) > 0) {
                    while ($row = mysqli_fetch_assoc($ReceiverResult)) {
                        $RStatus = $row['Status'];
                        $RBalance = $row['Balance'];
                        $RName = $row['C_First_Name'];
                        $RLName = $row['C_Last_Name'];
                        $REmail = $row['C_Email'];
                        $RProColor = $row['ProfileColor'];
                    }

                    if ($SStatus == "Active" && $RStatus == "Active") {

                        if ($SBalance != 0) {

                            if ($SBalance > $Amount) {

                                (string)$Rtotal = (float)$Amount + (float)$RBalance;
                                (string)$Stotal = (float)$SBalance - (float)$Amount;
                                $SenderName = $SName . " " . $SLName;
                                $ReceiverName = $RName . " " . $RLName;
                                $DebitAmount = '-' . $Amount;

                                // Check How to roll back perform testing and send email both side

                                try {

                                    mysqli_begin_transaction($conn);

                                    mysqli_query($conn, "UPDATE accounts SET Balance='$Rtotal' WHERE AccountNo = '$ReceiverAc'") or die(mysqli_error($conn));
                                    mysqli_query($conn, "UPDATE accounts SET Balance='$Stotal' WHERE AccountNo = '$SenderAc'") or die(mysqli_error($conn));
                                    mysqli_query($conn, "INSERT INTO transaction(AccountNo, FAccountNo, Name, Amount, Status, ProfileColor, Credit, Debit) VALUES ('$ReceiverAc', '$SenderAc','$SenderName', '$Amount', 'Credited', '$SProColor', $Amount, '0.0')");
                                    mysqli_query($conn, "INSERT INTO transaction(AccountNo, FAccountNo, Name, Amount, Status, ProfileColor, Credit, Debit) VALUES ('$SenderAc', $ReceiverAc,'$ReceiverName', '$DebitAmount', 'Debited', '$RProColor', '0.0', $Amount)");
                                    mysqli_commit($conn);

                                    $date = date("d/m/Y");
                                    $Rmasked =  str_pad(substr($ReceiverAc, -4), strlen($ReceiverAc), 'X', STR_PAD_LEFT);
                                    $Smasked =  str_pad(substr($SenderAc, -4), strlen($SenderAc), 'X', STR_PAD_LEFT);
                                    // echo $REmail." ".$RName." ".$Amount." ".$Rtotal." ".$date." ".$masked;

                                    creditMoneyMail($REmail, $RName, $Amount, $Rtotal, $date, $Rmasked);
                                    debitMoneyMail($SEmail, $SName, $Amount, $Stotal, $date, $Smasked);
                                    echo "Success";
                                } catch (\Throwable $th) {
                                    mysqli_rollback($conn);
                                    echo "fail";
                                }
                            }
                            else{
                                echo "Insufficient Account Balance";
                            }
                        } 
                        else {
                            echo "No Balance In Account!";
                        }
                    } else {
                        echo "Transaction Fail Account is not Active!";
                    }
                }
            }
        } else {
            echo "Transaction Fail minimum amount required 100 rs";
        }
    }
}
