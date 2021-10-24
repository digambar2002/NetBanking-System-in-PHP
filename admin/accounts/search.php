<?php
    session_start();
    include "../connection.php";

    if(isset($_POST['AccountNumber'])){

        $AccountNo = $_POST['AccountNumber'];

        $query = "SELECT * FROM customer_detail where Account_No = '$AccountNo'";

        $result = mysqli_query($conn, $query) or die("Not Execute");
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                $id = $row['C_No'];
                $Ac = $row['Account_No'];
                $Fname  = $row['C_First_Name'];
                $Lname  = $row['C_Last_Name'];
            }

            $_SESSION["EditAccountNo"] = $AccountNo;

            $data = array(
                'id'=>$id, 
                 'Ac'=>$Ac, 
                 'Fname'=>$Fname, 
                 'Lname'=>$Lname);
        
            echo json_encode($data);

        }
    }
