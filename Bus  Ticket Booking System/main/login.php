<?php
include("db_connect.php");
$select = "SELECT * from admin_details";
$result = mysqli_query($conn, $select);
if(mysqli_num_rows($result)<1){
    $ins =" CALL `def_admin`()";
    $query = mysqli_query($conn, $ins);
}

$sql = "DELETE FROM schedule WHERE dep_date < NOW()";

if (!mysqli_query($conn, $sql)) {
    header("location: admin_schedule.php?error=cant delete the records");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="outer">
        <div class="form-box">
            <div class="button-box">
                <div id="btn"></div>
                <button type="button" class="toggle-btn" onclick="login()">Signin</button>
                <button type="button" class="toggle-btn" onclick="register()">Signup</button>
            </div>
            <form id="signin" method="post" action = "validlogin.php" class="input-group">
                <?php $error = '';
                if(isset($_GET['error'])){ ?>
                        <p class="error"><?php echo $_GET['error']; ?></p>
                <?php } ?>
                <input type="text" class="input-field" placeholder="email" name="loginemail" required>
                <input type="password" class="input-field bottom" placeholder="password" name = "loginpassword" required>
                <button type="submit" class="submit-btn">SignIn</button>
            </form>
            
            <form id="signup" method="post" action = "validreg.php" class="input-group">
                <?php if(isset($_GET['regerror'])){ ?>
                        <p class="error"><?php echo $_GET['regerror']; ?></p>
                <?php } ?>
                <input type="email" class="input-field" placeholder="Email" name="regemail" required>
                <input type="password" class="input-field" placeholder="password" name="regpassword" required>
                <button type="submit" class="submit-btn">SignUp</button>
            </form>
        </div>
    </div>
    <script>
    var x = document.getElementById("signin");
    var y = document.getElementById("signup");
    var z = document.getElementById("btn");

    function register() {
        x.style.left = "-400px";
        y.style.left = "50px";
        z.style.left = "110px";
    }

    function login() {
        x.style.left = "50px";
        y.style.left = "450px";
        z.style.left = "0px";
    }
</script>
</body>
</html>