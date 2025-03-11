<?php
    include "db_connect.php";
    session_start();
    header('location: login.php');
    $email = $_POST['regemail'];
    $password = $_POST['regpassword'];
    $sql_admin = "SELECT * FROM admin_details WHERE Email_id='$email'";
    $result_admin = mysqli_query($conn, $sql_admin);
    $num_admin = mysqli_num_rows($result_admin);
if ($num_admin) {
    header('location: login.php? regerror=this email already exist');
} else {

    $sql = "SELECT * FROM user_details WHERE email_id='$email'";

    $result = mysqli_query($conn, $sql);

    $num = mysqli_num_rows($result);
    if ($num) {
        header('location: login.php? regerror=this email already exist');
    } else {
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        header('location: update_profile.php');
    }
}
?>