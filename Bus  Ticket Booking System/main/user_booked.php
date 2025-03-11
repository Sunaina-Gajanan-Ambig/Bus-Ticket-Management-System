<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Bookings</title>
    <style>
        table{
    position: absolute;
    border-collapse:collapse;
    width:100%;
    top: 10%;
    left: 0;
    font-size:25px;
}

th, td{
    padding: 10px;
    text-align: center;
}

thead{
    background-color: darkblue;
    color: white;
}

a{
    text-decoration: none;
}

.btn-delete{
    background: linear-gradient(to right, #ff6600, #ffff33);
    padding: 5px;
    border-color: black;
    border-width: 20px;
    border-radius: 10px;
    text-align: center;
    font: bold;
    color: black;
}
    </style>
    <?php include "db_connect.php";?>
</head>
<body>
    <div class="data_disp">
        <table>
            <thead>
            <tr>
                <th>sl.No</th>
                <th>bus name</th>
                <th>source</th>
                <th>destination</th>
                <th>date</th>
                <th>time</th>
                <th>total amount</th>
                <th>action</th>
            </tr>
            </thead>
            <tbody>
                <?php
                $date = date("Y-m-d H:i:s");
                $time = date("h:i:sa");
                $user_id = $_GET['user_id'];
                $sql = "SELECT * FROM reservation where user_id=$user_id ORDER BY date";
                $sl_no = 0;
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    $sl_no = $sl_no + 1;
                    echo "
                        <tr>
                    <td>$sl_no</td>
                    <td>$row[bus_name]</td>
                    <td>$row[source]</td>
                    <td>$row[destination]</td>
                    <td>$row[date]</td>
                    <td>$row[time]</td>
                    <td>$row[amount]</td>
                    ";
                    if ($row['date'] > $date) {
                        echo "
                    <td><a class='btn-delete' name='delete-Booked' href='cancel_booking.php?res_id=$row[res_id]';>Cancel Booking</a></td>";
                    }
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>



