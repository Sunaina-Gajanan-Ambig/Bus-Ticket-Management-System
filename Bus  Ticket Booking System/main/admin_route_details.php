<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Route details</title>
    <link rel="stylesheet" href="adminStyle.css">
    <?php include "db_connect.php";
        include "admin_navbar.php";
    ?>
</head>
<body>
    <div class='data_disp'>
        <a class="btn add-btn" role="button" href="add_route.php">Add New Route</a>
        <br><br>
        <table>
            <thead>
            <tr>
                <th>source</th>
                <th>destination</th>
                <th>price(Rs)</th>
                <th>edit/delete</th>
            </tr>
            </thead>
            <tbody>
                <?php
                    $sql="select route_id,source,destination,r_price from route_details";
                    $result=$conn->query($sql);

                    if(!$result){
                        die("Invalid query:" . $conn->error());
                    }

                    while($row=$result->fetch_assoc()){
                    
                        echo "
                <tr>
                    <td>$row[source]</td>
                    <td>$row[destination]</td>
                    <td>$row[r_price]</td>
                    <td>
                        <a class='btn' href='edit_route.php?route_Id=$row[route_id]'>Edit</a>
                        <a class='btn' name='delete-route' href='admin_route_delete.php?route_Id=$row[route_id]';>Delete</a>
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
