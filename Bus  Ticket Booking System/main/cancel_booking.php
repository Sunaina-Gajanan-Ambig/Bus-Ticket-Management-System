<?php
session_start();
$user_id = $_SESSION['user_id'];
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
<?php
include('db_connect.php');
    $res_id = $_GET['res_id'];
    $del = "DELETE from reservation where res_id = $res_id ";
    $sql = mysqli_query($conn, $del);
$_SESSION['user_id'] = $user_id;
    if($sql)
        header("location: user_booked.php?user_id=$user_id");
    else{
        ?>
        <script>alert("can't delete data booking ")</script>
        <?php
    header('location:user_booked.php?error=cant delete booking');
        exit;
    }
        ?>  
</body>
</html>