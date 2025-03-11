<?php
include_once('db_connect.php');
    $email_id = $_GET['email_id'];
    $del = "DELETE from admin_details where Email_id='$email_id'";
    $sql = mysqli_query($conn, $del);
    if($sql)
        header('location: admin_manage.php? admin deleted successfully');
?>  
