<?php
include "db_connect.php";
if (isset($_POST['submit'])) {
    $date = $_POST['date'];
    $time = $_POST['time'];
    if (isset($_POST['bus_reg_no'])) {
        $reg_no = $_POST['bus_reg_no'];
    } else {
        header("location: add_schedule.php?error=no bus selected/no bus available");
        exit;
    }

    $select = "SELECT bus_id,bus_reg_no,bus_name,type_id from bus_details";
    $b_query = mysqli_query($conn, $select);
    while ($row = mysqli_fetch_assoc($b_query)) {
        $bus = $row['bus_reg_no'] . "-" . $row['bus_name'];
        if ($reg_no == $bus) {
            $bus_id = $row['bus_id'];
            $type_id = $row['type_id'];
        }
    }

    $source_dest = $_POST['source-destination'];
    $select = "SELECT route_id,source,destination,r_price from route_details";
    $query = mysqli_query($conn, $select);
    while ($row = mysqli_fetch_assoc($query)) {
        $route = $row['source'] . "-" . $row['destination'];
        if ($route == $source_dest) {
            $route_id = $row['route_id'];
        }
    }

    $select_r = "SELECT r_price from route_details WHERE route_id = $route_id";
    $sql_r = mysqli_query($conn, $select_r);
    while ($r_row = mysqli_fetch_assoc($sql_r)) {
        $route_price = $r_row['r_price'];
    }

    $select_t = "SELECT * FROM bus_type WHERE type_id = $type_id";
    $sql_t = mysqli_query($conn, $select_t);
    while ($t_row = mysqli_fetch_assoc($sql_t)) {
        $type_price = $t_row['t_price'];
    }

    $amount = $route_price + $type_price;
    $insert = "INSERT into schedule(bus_id,route_id,dep_date,dep_time,total_amount) values ($bus_id,$route_id,'$date','$time',$amount)";
    $result = mysqli_query($conn, $insert);
    if ($result) { ?>
        <script>alert("data inserted successfully")</script>
        <?php
        header("location: admin_schedule.php");
        exit;
    } else {
        header('location: admin_schedule.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add Schedule</title>
    <link rel="stylesheet" href="adminStyle.css">
    <style>
        .drop-down {
            width: 480px;
            font-size: 20px;
            padding: 5px;
            border-width: 2px;
            border-radius: 10px;
            margin-bottom: 40px;
        }

        label {
            font-size: 20px;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <form method="post" class="container" action=" ">
        <?php if (isset($_GET['error'])) { ?>
            <p class="error">
                <?php echo $_GET['error']; ?>
            </p>
        <?php } ?>
        <label>select bus : </label>
        <select name="bus_reg_no" class="drop-down">
            <?php
            $sql = "SELECT * FROM bus_details WHERE bus_id 
    NOT IN(SELECT bus_id from (bus_details NATURAL JOIN schedule))";
            $querry = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($querry)) {
                ?>
                <option>
                    <?php echo $row['bus_reg_no'] . "-" . $row['bus_name'] ?>
                </option>
            <?php } ?>
        </select>
        <br>
        <label>select source and destination : </label>
        <select name="source-destination" class="drop-down">
            <?php
            $sql = "SELECT source,destination from route_details";
            $querry = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($querry)) {
                ?>
                <option>
                    <?php echo $row['source'] . "-" . $row['destination'] ?>
                </option>
            <?php }
            ?>
        </select>
        <br>
        <label>select date</label>
        <input type="date" name="date" min="<?php echo date('Y-m-d'); ?>" class="input-field" required>
        <br>
        <label for="">time of departure</label>
        <input type="time" name="time" class="input-field" required>
        <input type="submit" class="btn" name="submit" value="add route">
    </form>
</body>

</html>