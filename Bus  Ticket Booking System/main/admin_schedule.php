<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add schedule</title>
    <link rel="stylesheet" href="adminStyle.css">
    <?php include "db_connect.php";
    include "admin_navbar.php";
    ?>
</head>
<body>
    <div class='data_disp'>
        <a class="btn add-btn" role="button" href="add_schedule.php">Add New Schedule</a>
        <br><br>
        <table>
            <thead>
            <tr>
                <th>bus reg no</th>
                <th>source</th>
                <th>destination</th>
                <th>date</th>
                <th>time</th>
                <th>amount(Rs)</th>
                <th>Edit/Delete</th>
            </tr>
            </thead>
            <tbody>
                <?php
                    $sel = "SELECT * FROM (bus_details NATURAL JOIN schedule NATURAL JOIN route_details NATURAL JOIN bus_type) ORDER BY dep_date";
                    $result=mysqli_query($conn, $sel);
                    while($row=mysqli_fetch_assoc($result)){
                        echo "
                <tr>
                    <td>$row[bus_reg_no] - $row[bus_name]</td>
                    <td>$row[source]</td>
                    <td>$row[destination]</td>
                    <td>$row[dep_date]</td>
                    <td>$row[dep_time]</td>
                    <td>$row[total_amount]</td>
                    <td>
                        <a class='btn' name='delete-route' href='delete_schedule.php?scl_id=$row[schedule_id]';>Delete</a>
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

