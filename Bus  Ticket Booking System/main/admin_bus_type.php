<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bus type</title>
    <?php include "db_connect.php";?>
</head>
<body>
    <div>
        <a class="btn add-btn" href="admin_add_bus_type.php" role="button">Add bus type</a>
        <?php if(isset($_GET['error'])){ ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>
        <br><br>
        <table>
            <thead>
            <tr>
                <th>sl no</th>
                <th>bus type</th>
                <th>price(Rs)</th>
                <th>edit/delete</th>
            </tr>
            </thead>
            <tbody>
                <?php
                    $sql="SELECT * from bus_type";
                    $result=$conn->query($sql);
                $sl_no = 0;
                    while($row=$result->fetch_assoc()){
                    $sl_no = $sl_no + 1;
                        echo "
                        <tr>
                    <td>$sl_no</td>
                    <td>$row[bus_type]</td>
                    <td>$row[t_price]</td>
                    <td>
                        <a class='btn' href='type_edit.php?t_id=$row[type_id]'>Edit</a>
                        <a class='btn' name='delete' href='type_delete.php?t_id=$row[type_id]'>Delete</a>

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