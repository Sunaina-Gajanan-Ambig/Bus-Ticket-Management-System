
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
    $type_id = $_GET['t_id'];
    $del = "DELETE from bus_type where type_id = '$type_id'";
    $sql = mysqli_query($conn, $del);
    if($sql)
        header('location: admin_bus_type.php');
    else{
        ?>
        <script>alert("can't delete data bus details exist")</script>
        <?php
    header('location:admin_bus_type.php?error=cant delete bus type');
        exit;
    }
        ?>  
</body>
</html>