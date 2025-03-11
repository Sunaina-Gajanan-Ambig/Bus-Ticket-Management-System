<?php
include_once('db_connect.php');
    $route_id = $_GET['route_Id'];
    $del = "DELETE from route_details where route_id = '$route_id'";
    $sql = mysqli_query($conn, $del);
    if($sql)
        header('location: admin_route_details.php?route deleted successfully');
    else{
    header('location: admin_route_details.php?cant delete route details');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DELETE</title>
</head>
<body>
    
</body>
</html>