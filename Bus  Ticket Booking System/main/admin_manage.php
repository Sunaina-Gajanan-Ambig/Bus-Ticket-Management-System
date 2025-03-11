<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
    <?php include "db_connect.php";?>
</head>
<body>
    <div>
        <a class="btn add-btn" href="add_admin.php" role="button">Add admin</a>
        <br><br>
        <table>
            <thead>
            <tr>
                <th>sl no</th>
                <th>admin email</th>
                <th>mobile no.</th>
                <th>edit/delete</th>
            </tr>
            </thead>
            <tbody>
                <?php
                    $sql="SELECT * from admin_details";
                    $result=$conn->query($sql);
                $sl_no = 0;
                    while($row=$result->fetch_assoc()){
                    $sl_no = $sl_no + 1;
                        echo "
                        <tr>
                    <td>$sl_no</td>
                    <td>$row[Email_id]</td>
                    <td>$row[mobile_no]</td>
                    <td>
                        <a class='btn' href='admin_edit.php?email_id=$row[Email_id]'>Edit</a>
                        <a class='btn' name='delete' href='admin_delete.php?email_id=$row[Email_id]'>Delete</a>
                    </td>
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
    require_once "admin_navbar.php"
?>