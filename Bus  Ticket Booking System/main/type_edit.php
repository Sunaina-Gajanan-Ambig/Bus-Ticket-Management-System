<?php
include "db_connect.php";
    $type_id = $_GET['t_id'];
    $select = "SELECT * FROM bus_type WHERE type_id = '$type_id'";
$result = mysqli_query($conn, $select);
$row = mysqli_fetch_assoc($result);
$bus_type = $row['bus_type'];
$price = $row['t_price'];
if (isset($_POST['add_type'])) {
    $bus_type = $_POST['type'];
    $price = $_POST['price'];
    $edit = "UPDATE bus_type set t_price = '$price' where type_id = '$type_id'";
    $sql = mysqli_query($conn, $edit);
    if ($sql)
        header('location: admin_bus_type.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit</title>
    <link rel="stylesheet" href="adminStyle.css">
</head>
<body>
    <form action="" method="post" class="container">
            <input type="text" class="input-field" name ="type" placeholder="enter bus type" value =<?php echo $bus_type?> disabled>
            <input type="number" class="input-field" name ="price" placeholder="enter price" value =<?php echo $price?> required>
            <center><button type="submit" class="btn margin_down" name ="add_type" value ="add type">add type</center>
            </form>
</body>
</html>