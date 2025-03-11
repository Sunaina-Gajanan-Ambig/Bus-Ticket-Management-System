<?php
session_start();
$user_id = $_SESSION['user_id'];
include("db_connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Seat</title>
    <link rel="stylesheet" href="select_seat.css">
</head>
<body>
    <img class="driver" src="driver.jpg" alt="driver_image">
    <table>
        <thead>
            <th> </th>
            <th> </th>
            <th> </th>
            <th> </th>
            <th> </th>
        </thead>
    <?php
        $scl_id = $_GET['scl_id'];
        $no_seats = $_SESSION['nfs'];
    $select_rd = "SELECT * from schedule where schedule_id = $scl_id";
    $sql_rd = mysqli_query($conn, $select_rd);
    while($row_rd = mysqli_fetch_assoc($sql_rd)){
        $route_id = $row_rd['route_id'];
        $date = $row_rd['dep_date'];
        $bus_id = $row_rd['bus_id'];
        $amount = $row_rd['total_amount'];
    }
    
    $select_sd = "SELECT source,destination from route_details where route_id = $route_id";
    $sql_sd = mysqli_query($conn, $select_sd);
    while($row_sd = mysqli_fetch_assoc($sql_sd)){
        $source = $row_sd['source'];
        $dest = $row_sd['destination'];
    }
    
    $select_b = "SELECT bus_name from bus_details where bus_id = $bus_id";
    $sql_b = mysqli_query($conn, $select_b);
    while($row_b = mysqli_fetch_assoc($sql_b)){
        $bus_name = $row_b['bus_name'];
    }
    
    $selected_seats = array();
    $seats = array();
    
    $select ="SELECT seat_id FROM reservation WHERE source = '$source' AND destination = '$dest' AND bus_name = '$bus_name' AND date='$date'";
    $sql = mysqli_query($conn, $select);
    if($sql){
        while($row=mysqli_fetch_assoc($sql)){
            array_push($selected_seats,$row['seat_id']);
        }   
    }else{
        echo "no seats selected";
    }
    $num = count($selected_seats);
    $no_seats = $no_seats / 4;
    for($i = 1 ;$i <= $no_seats; $i++){
        echo "<tbody>";
        if(in_array('A'.$i,$selected_seats)){
            echo "
            
            <td class='selected'>A$i</td>";
        }else{
            echo "
            <td class='available'>A$i</td>";
            array_push($seats,'A'.$i);
        }
        if(in_array('B'.$i,$selected_seats)){
            echo "
            <td class='selected'>B$i</td>";
        }else{
            echo "
            <td class='available'>B$i</td>";
            array_push($seats,'B'.$i);
        }
        echo "<td></td>";
        if(in_array('C'.$i,$selected_seats)){
            echo "
            <td class='selected'>C$i</td>";
        }else{
            echo "
            <td class='available'>C$i</td>";
            array_push($seats,'C'.$i);
        }
        if(in_array('D'.$i,$selected_seats)){
            echo "
            <td class='selected'>D$i</td>";
        }else{
            echo "
            <td class='available'>D$i</td>
            </tbody>";
            array_push($seats,'D'.$i);
        }
    }
    $_SESSION['user_id'] = $user_id;
    $_SESSION['scl_id'] = $scl_id;
    ?>
    </table>
    <form action="confirm_booking.php" method="post">
    <label>Select seat to be reserved</label>
    <select name="seat_id" id="">
        <?php
        $seat_count = count($seats);

        for ($i = 0; $i < $seat_count;$i++){
            ?>
            <option><?php echo $seats[$i]?></option>
            <?php }
            ?> 
    </select>
    <button type ="submit" name="confirm">Confirm Booking</button>
    </form>
<div class="info">
    <label>
        <ul>
            <li><img src="seat_available.png" alt=""><label for="">seat available</label></li>
            <li><img src="seat_booked.png" alt=""><label for="">seats already booked</label></li>
        </ul>
</div>

</body>
</html>