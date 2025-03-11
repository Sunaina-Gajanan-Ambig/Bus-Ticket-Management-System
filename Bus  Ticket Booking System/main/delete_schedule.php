<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DELETE</title>
</head>
<body>
<?php
include_once('db_connect.php');
    $scl_id = $_GET['scl_id'];
    $del = "DELETE from schedule where schedule_id = $scl_id";
    $sql = mysqli_query($conn, $del);
    if($sql)
        header('location: admin_schedule.php');
    else{
        ?>
        <script>alert("can't delete data bus details exist")</script>
        <?php
    header('location:admin_schedule.php?error=cant delete bus type');
        exit;
    }
        ?>  
</body>
</html>