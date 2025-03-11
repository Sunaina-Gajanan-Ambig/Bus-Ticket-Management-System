<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bus ticket booking</title>
    <link rel="stylesheet" href="userfront.css">
    <style>
        .rightnavn a {
            text-decoration: none;
        }
    </style>
</head>

<body>
    <?php
    include_once "db_connect.php";
    $email = $_SESSION['email'];
    $sql = "CALL `get_userid`($email)";
    $sel_u_id = "SELECT user_id from user_details where email_id = '$email'";
    $res = mysqli_query($conn, $sel_u_id);
    while ($row = mysqli_fetch_assoc($res)) {
        $user_id = $row['user_id'];
    }
    ?>
    <div class="outer">
        <div class="navbar">
            <div class="leftnav">bus ticket<br> booking system</div>
            <div class="rightnav">
                <a href='#HOME' class='nav-btn'>Home</a>
                <?php
                echo "
                    <a href='user_booked.php?user_id=$user_id' class='nav-btn'>My bookings</a>"
                    ?>
            </div>
        </div>
        <div class="image-content">
        </div>
    </div>
    <fieldset id="HOME">
        <form method='post' action="user_select_bus.php" class="input-form">
            <label for="source">select source : </label>
            <select name="source">
                <option value='1'>---select---</option>
                <?php
                $sql = "SELECT DISTINCT source from route_details group by source";
                $query = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($query)) {
                    ?>
                    <option>
                        <?php echo $row['source'] ?>
                    </option>
                <?php } ?>
            </select>
            <br>
            <label for="dest">select destination : </label>
            <select name="dest">
                <option value='1'>---select---</option>
                <?php
                $sql = "SELECT DISTINCT destination from route_details group by destination";
                $query = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($query)) {
                    ?>
                    <option>
                        <?php echo $row['destination'] ?>
                    </option>
                <?php }
                $_SESSION['user_id'] = $user_id; ?>
            </select>
            <br>
            <label for="date">select date : </label>
            <input type="date" name="date" min="<?php echo date('Y-m-d'); ?>">
            <button name='btn' class="btn">select bus</button>
        </form>
    </fieldset>
    <hr>
    <div class="foot">
        <a href="">terms & condition</a>
        <a href="">bus partners</a>
        <br>
        <a href="">view places</a>
        <a href="">services</a>
        <br>
        <a href="">contact us</a>
        <a href="">ask a question</a>
        <br>
    </div>
</body>

</html>