<?php 
session_start();
    include "db_connect.php";
    if(isset($_POST['loginemail']) && isset($_POST['loginpassword'])){
        $logemail = $_POST['loginemail'];
        $logpassword = $_POST['loginpassword'];

        $adminlogin = "SELECT * FROM admin_details WHERE Email_id = '$logemail' AND pass ='$logpassword'";
        $adminresult = mysqli_query($conn,$adminlogin);
        $sql = "SELECT * from user_details WHERE email_id = '$logemail' AND pass = '$logpassword' ";
        $result = mysqli_query($conn, $sql);
        
        if(mysqli_num_rows($adminresult)==1){
            header('Location: admin_navbar.php'); 
            exit();
        }else if(mysqli_num_rows($result)==1){
        $row = mysqli_fetch_assoc($result); 
        $_SESSION["email"]=$row['email_id'];
            header('Location: userfront.php'); 
            exit();
        }else{
            header('Location: login.php?error= Incorrect email or password');
            exit();        
        }
    }else{
        header('Location: login.php');
        exit();
    }


?>