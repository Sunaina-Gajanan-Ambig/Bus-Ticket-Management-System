<?php
        include "db_connect.php";
        session_start();
$user_id = $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>select bus</title>
    <link rel="stylesheet" href="adminStyle.css">
    <style>
        .btn{
            position: absolute;
            right: 75px;
            color: whitesmoke;
            text-align: center;
        }

        fieldset{
            background-color: #CAE4DB ;
            margin: 50px 30px 0px 30px;
            padding: 15px 10px;
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: flex-start;
            border-radius: 30px 0px 30px 0px;
            box-shadow: 10px 10px 15px #404040;
        }
        .in-content{
            padding: 0px 50px;
            max-width: 300px;
        }
        p{
            margin: 10px;
            padding: 5px;
            font-size: 25px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .font-bold{
            font-weight: bold;
            font-size: 90px;
        }
    </style>
</head>
<body>
    <?php if(isset($_GET['error'])){ ?>
        <p class="error"><?php echo $_GET['error']; ?></p>
    <?php } 
        if(isset($_POST['btn'])) {
            $source = $_POST['source'];
            $destination = $_POST['dest'];
            $route_select = "SELECT route_id from route_details where source = '$source' and destination = '$destination'";
            $rt_res = mysqli_query($conn, $route_select);
            $sel = mysqli_fetch_assoc($rt_res);
            $route_id = $sel['route_id'];
            $date = $_POST['date'];
            $sel = "SELECT * FROM (bus_details NATURAL JOIN schedule NATURAL JOIN route_details) WHERE route_id = '$route_id' AND dep_date = '$date' ";
            $result = mysqli_query($conn, $sel);
            if (mysqli_num_rows($result) < 1) {
                header('location: user_select_bus.php?error=no bus available on select route or date');
                exit;
            }else{
                $sl_no = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    $sl_no = $sl_no + 1; 
                    $_SESSION['nfs'] = $row['total_no_of_seats'];
                    ?>
                    <fieldset>
                        <div class="in-content font-bold">
                        <p>Bus:  <?php echo $row['bus_name']?></p>
                        </div>
                        <div class="in-content">
                        <p> date: <?php echo $row['dep_date']?></p>
                        <p> time: <?php echo $row['dep_time']?></p>
                        </div>
                        <div class="in-content">
                        <p> source: <?php echo $row['source']?></p>
                        <p> destination: <?php echo $row['destination']?></p>
                        </div>
                        <div class="in-content">
                        <p> price: <?php echo $row['total_amount']?></p>
                        </div>
                        <?php
                        $_SESSION['user_id'] = $user_id;
                        echo "<a class='btn' name='delete-route' href='user_select_seat.php?scl_id=$row[schedule_id]'>select seats</a>";
                        ?>
                        </fieldset>
                <?php
                }
            }
        }
?>
    </body>
</html>