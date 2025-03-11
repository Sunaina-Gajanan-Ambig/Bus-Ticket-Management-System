<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bus details</title>
    <link rel="stylesheet" href="adminStyle.css">
    <?php include "db_connect.php";
    include "admin_navbar.php";
    ?>
</head>
<body>
    <div class='data_disp'>
        <a class="btn add-btn" role="button" href="add_bus.php">Add New Bus</a>
        <br><br>
        <table>
            <thead>
            <tr>
                <th>Bus reg. no.</th>
                <th>Bus name</th>
                <th>bus type</th>
                <th>total no. of seats</th>
                <th>edit/delete</th>
            </tr>
            </thead>
            <tbody>
                <?php
                    $sql="SELECT b.bus_reg_no,b.bus_name,t.bus_type,b.total_no_of_seats,b.bus_id
                    FROM bus_details b, bus_type t
                    WHERE b.type_id = t.type_id";
                    $result=$conn->query($sql);

                    if(!$result){
                        die("Invalid query:" . $conn->error());
                    }

                    while($row=$result->fetch_assoc()){
                    
                        echo "
                <tr>
                    <td>$row[bus_reg_no]</td>
                    <td>$row[bus_name]</td>
                    <td>$row[bus_type]</td>
                    <td>$row[total_no_of_seats]</td>
                    <td>
                        <a class='btn' name='delete-route' href='delete_bus.php?bus_id=$row[bus_id]';>Delete</a>
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
