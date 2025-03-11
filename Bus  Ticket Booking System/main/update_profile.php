<?php
session_start();
$email = $_SESSION['email'];
$password = $_SESSION['password'];
include "db_connect.php";   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update_profile</title>
    <link rel="stylesheet" href="adminStyle.css">
    <style>
        .body{
            background-image: url(2.jpg);
            background-size: cover;
        }
    </style>
</head>
<body>
    <div class="outer">
        <form class="container" method="post">
            <p><?php $errmsg='' ;?></p>
            <input type="text" value=<?php echo $email; ?> class="input-field" disabled>
            <input type="name" name="username" class="input-field" placeholder="enter your username" required>
            <input type="number" name="mobileno" class="input-field" placeholder="enter your mobile number" required>
            <button type="submit" class="btn">Update Profile</button>
        </form>
    </div>
<?php
    if(isset($_POST['username']) && isset($_POST['mobileno'])){
        $mobileno = $_POST['mobileno'];
        $username = $_POST['username'];
        $reg = "INSERT INTO user_details(email_id,pass,mobile_no,username) VALUES('$email','$password','$mobileno','$username')";
        $result = mysqli_query($conn, $reg);
        if($result){?>
            <script>alert("registration successful");</script><?php
            header('location: userfront.php');
        }else{
            header('location: update_profile.php');
            exit();
        } 
    }
?>
</body>
</html>

