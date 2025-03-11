<?php

    $conn = new mysqli('localhost','root','','mini_project');

    if($conn->connect_error){
        die("Failed to connect: " .$conn->connect_error);
    }
?>