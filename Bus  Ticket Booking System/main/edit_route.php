<?php
include_once('db_connect.php');
$route_id = $_GET['route_Id'];
$select = "SELECT * from route_details where route_id = '$route_id' ";
$res = mysqli_query($conn,$select);
$result = mysqli_fetch_assoc($res);
$old_source = $result['source'];
$old_dest = $result['destination'];
$old_price = $result['r_price'];
if (isset($_POST['edit-route'])) {
    $source = $_POST['source'];
    $dest = $_POST['dest'];
    $price = $_POST['price'];
    $edit="UPDATE route_details SET r_price = $price where route_id = $route_id";
    $sql = mysqli_query($conn, $edit);
    if ($sql){
        header('location: admin_route_details.php');
    }
    else{
        header('location: admin_route_details.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add route</title>
    <link rel="stylesheet" href="adminStyle.css">
</head>
<body>
    <form method="post" class="container" action="">
    <?php if(isset($_GET['error'])){ ?>
        <p class="error"><?php echo $_GET['error']; ?></p>
    <?php } ?>
    <input type="text" name="source" class="input-field" value=<?php echo $old_source ?> disabled>
    <br>
    <input type="text" name="dest" class="input-field" value=<?php echo $old_dest ?> disabled>
    <br>
    <input type="text" name="price" class="input-field" value=<?php echo $old_price ?> required>
    <br>
    <input type="submit" class="btn" value="edit route" name="edit-route"> 
    </form>
</body>
</html>