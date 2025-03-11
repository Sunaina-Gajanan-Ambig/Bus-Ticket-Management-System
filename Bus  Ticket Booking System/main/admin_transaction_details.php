<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>transactions</title>
    <link rel="stylesheet" href="adminStyle.css">
    <?php include "db_connect.php";
    include('admin_navbar.php');
    ?>
</head>
<body>
    <div>
        <table>
            <thead>
            <tr>
                <th>sl_no</th>
                <th>Transaction Id</th>
                <th>amount</th>
                <th>user name</th>
            </tr>
            </thead>
            <tbody>
                <?php
                    $sql = "SELECT payment_id,amount,username FROM (payment NATURAL JOIN user_details)";
                    $result=$conn->query($sql);
                $sl_no = 0;
                    while($row=$result->fetch_assoc()){
                    $sl_no = $sl_no + 1;
                        echo "
                        <tr>
                    <td>$sl_no</td>
                    <td>$row[payment_id]</td>
                    <td>$row[amount]</td>
                    <td>$row[username]</td>
                    </tr>
                        ";
                    }
                ?>
                
            </tbody>
        </table>
    </div>
</body>
</html>
<?php
    include "admin_navbar.php";
?>