<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="adminStyle.css">
</head>
<body>
    <div class="right">
        <label class="welcome"> welcome <br> Admin </label>
        <a href="admin_bus_type.php">bus type</a>
        <a href="admin_bus_details.php">bus details</a>
        <a href="admin_route_details.php">route details</a>
        <a href="admin_schedule.php">add schedule</a>
        <a href="admin_user_details.php">user details</a>
        <a href="admin_transaction_details.php">transactions</a>
        <a href="admin_manage.php">manage admin</a>
    </div>
</body>
<?php
include("db_connect.php");
$sql = "DELETE FROM schedule WHERE dep_date < NOW()";

if (!mysqli_query($conn, $sql)) {
    header("location: admin_schedule.php?error=cant delete the records");
}
?>
</html>