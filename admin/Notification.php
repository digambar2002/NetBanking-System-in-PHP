<?php
    $query = "SELECT * FROM login WHERE Status='Inactive'";
    $result = mysqli_query($conn, $query) or die("query fail");
    $count = mysqli_num_rows($result);

    $query = "SELECT * FROM cards WHERE Verified='No'";
    $result = mysqli_query($conn, $query) or die("query fail");
    $debitNotify = mysqli_num_rows($result);


    
?>