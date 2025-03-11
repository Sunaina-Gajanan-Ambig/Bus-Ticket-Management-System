<?php
include_once('db_connect.php');
$email_id = $_GET['email_id'];
$select = "SELECT * from admin_details where Email_id='$email_id' ";
$res = mysqli_query($conn,$select);
$result = mysqli_fetch_assoc($res);
$old_email = $result['Email_id'];
$old_mobile = $result['mobile_no'];
$old_pass = $result['pass'];
if (isset($_POST['edit-admin'])) {
    $email_id = $_POST['email_id'];
    $mobile_no = $_POST['mobile'];
    $pass = $_POST['pass'];
    $edit="UPDATE admin_details SET mobile_no = $mobile_no , pass = $pass where Email_ide_id = $email_id";
    $sql = mysqli_query($conn, $edit);
    if ($sql){
        header('location: admin_manage.php');
    }
    else{
        header('location: admin_manage.php');
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
    <input type="text" name="email_id" class="input-field" value=<?php echo $old_email ?> readonly>
    <br>
    <input type="number" name="mobile" class="input-field" value=<?php echo $old_mobile ?> required>
    <br>
    <input type="password" name="pass" class="input-field" value=<?php echo $old_pass ?> required>
    <br>
    <input type="submit" class="btn" value="edit admin" name="edit-admin"> 
    </form>
</body>
</html>