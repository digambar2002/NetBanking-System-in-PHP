<?php

    session_start();
    include "../connection.php";

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

    
?>