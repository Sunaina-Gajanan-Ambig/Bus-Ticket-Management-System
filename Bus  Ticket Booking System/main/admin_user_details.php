<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user-details</title>
    <?php
        include "db_connect.php";   
    ?>
</head>
<body>
<div>
        <table>
            <thead>
            <tr>
                <th>Sl.No</th>
                <th>UserName</th>
                <th>Mobile No.</th>
                <th>Email Id</th>
            </tr>
            </thead>
            <tbody>
                <?php
                    $sql="SELECT * from user_details";
                    $result=$conn->query($sql);
                $sl_no = 0;
                    while($row=$result->fetch_assoc()){
                    $sl_no = $sl_no + 1;
                        echo "
                        <tr>
                    <td>$sl_no</td>
                    <td>$row[username]</td>
                    <td>$row[mobile_no]</td>
                    <td>$row[email_id]</td>
                </tr>
                        ";
                    }
                ?>
                
            </tbody>
        </table>
    </div>
</body>
<?php include "admin_navbar.php"; ?>
</html>
