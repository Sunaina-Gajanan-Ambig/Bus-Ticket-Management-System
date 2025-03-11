<?php
session_start();
include("db_connect.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link rel="stylesheet" href="pay_style.css">
</head>

<body>
    <div class="success-animation">
        <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
            <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
            <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
        </svg>
        <br>
        <center>
            <p>payment successful</p>
        </center>
        <center><a href="userfront.php">HOME</a>
    </div>
    <?php
    $scl_id = $_SESSION['scl_id'];
    $user_id = $_SESSION['user_id'];
    $amount = $_SESSION['amount'];
    $seat_id = $_SESSION['seat_id'];
    $select = "SELECT * from (bus_details NATURAL JOIN schedule NATURAL JOIN route_details) WHERE schedule_id=$scl_id";
    $result = mysqli_query($conn, $select);
    while ($row = mysqli_fetch_assoc($result)) {
        $bus_name = $row['bus_name'];
        $source = $row['source'];
        $dest = $row['destination'];
        $date = $row['dep_date'];
        $time = $row['dep_time'];
    }
    $insert = "INSERT into reservation(user_id,bus_name,source,destination,date,time,seat_id,amount) values($user_id,'$bus_name','$source','$dest','$date','$time','$seat_id',$amount)";
    $sql = mysqli_query($conn, $insert);
    if($sql){
        $pay_id = mt_rand(1000, 100000);
        $ins_id = "INSERT into payment(payment_id,user_id,amount) VALUES ($pay_id,$user_id,$amount)";
        $pay_sql = mysqli_query($conn, $ins_id);
    }
    ?>
</body>
</html>