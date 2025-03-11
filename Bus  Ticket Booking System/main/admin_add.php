<?php
include "db_connect.php";
$reg_no = $bus_name = $no_of_seats = $bus_type = '';
if(isset($_POST['submit'])){
$email = $_POST['email_id'];
$mobile = $_POST['mobile_no'];
$password = $_POST['password'];
$sql = "select * from admin_details where Email_id ='$email";
$query = mysqli_query($conn, $sql);
if(mysqli_num_rows($query)>0){
    header('location: add_bus.php?error=admin detail already exist');
    exit;
}else{
    $insert = "INSERT into admin_details(Email_id,mobile_no,pass) values ('$email','$mobile','$password')";
    $result = mysqli_query($conn, $insert);
    if($result){?>
        <script>alert("data inserted successfully")</script>
        <?php
        header('location: admin_bus_details.php');
        exit;
    }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>add Bus</title>
<link rel="stylesheet" href="adminStyle.css">
<style>
    .drop-down{
        width: 480px;
        font-size: 20px;
        padding: 5px;
        border-width: 2px;
        border-radius: 10px;
        margin-bottom: 40px;
    }
</style>
</head>
<body>
<form method="post" class="container" action=" ">
<?php if(isset($_GET['error'])){ ?>
    <p class="error"><?php echo $_GET['error']; ?></p>
<?php } ?>
<input type="text" name="email_id" class="input-field" placeholder="enter admin email" required>
<br>
<input type="text" name="mobile_no" class="input-field" placeholder="enter admin phone" required>
<br>
<input type="password" name="password" class="input-field" placeholder="enter password" required>
<br>
<input type="submit" class="btn" name = "submit" value="add route"> 
</form>
</body>
</html>