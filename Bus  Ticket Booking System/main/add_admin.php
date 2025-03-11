<?php
include "db_connect.php";
$reg_no = $bus_name = $no_of_seats = $bus_type = '';
if(isset($_POST['submit'])){
$email_id = $_POST['email_id'];
$mobile_no = $_POST['mobile_no'];
$pass = $_POST['pass'];
$sql = "select * from admin_details where Email_id ='$email_id'";
$query = mysqli_query($conn, $sql);
if(mysqli_num_rows($query)>0){
    header('location: add_bus.php?error=admin details already exist');
    exit;
}else{
    $insert = "INSERT into admin_details(Email_id,mobile_no,pass) values ('$email_id','$mobile_no','$pass')";
    $result = mysqli_query($conn, $insert);
    if($result){?>
        <script>alert("data inserted successfully")</script>
        <?php
        header('location: admin_manage.php');
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
<input type="text" name="email_id" class="input-field" placeholder="enter email_id" required>
<br>
<input type="number" name="mobile_no" class="input-field" placeholder="enter mobile_No" required>
<br>
<input type="password" name="pass" class="input-field" placeholder="enter password" required>
<br>   
<input type="submit" class="btn" name = "submit" value="add admin"> 
</form>
</body>
</html>