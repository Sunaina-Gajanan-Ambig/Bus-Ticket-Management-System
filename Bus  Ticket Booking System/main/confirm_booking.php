<?php
session_start();
include "db_connect.php";
$scl_id = $_SESSION['scl_id'];
$user_id = $_SESSION['user_id'];
if(isset($_POST['seat_id'])){
    $seat_id = $_POST['seat_id'];
    $_SESSION['seat_id'] = $seat_id;
}
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
            bottom: 100px;
            right: 700px;
            color: whitesmoke;
            text-align: center;
        }

        fieldset{
            background-color: bisque;
            margin: 50px 30px 0px 30px;
            padding: 15px 0px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            border-radius: 30px 0px 30px 0px;
            box-shadow: 10px 10px 15px #404040;
        }

        p{
            margin: 10px;
            padding: 5px;
            font-size: 25px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
    </style>
</head>
<body>
    <?php if(isset($_GET['error'])){ ?>
        <p class="error"><?php echo $_GET['error']; ?></p>
    <?php }
        $select = "SELECT * from (bus_details NATURAL JOIN schedule NATURAL JOIN route_details) WHERE schedule_id=$scl_id";
        $result = mysqli_query($conn, $select);
            if (mysqli_num_rows($result) < 1) {
                header('location: user_select_bus.php?error=no bus available on select route or date');
                exit;
            }else{
                $sl_no = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    $sl_no = $sl_no + 1; 
                    ?>
                    
                    <fieldset>
                        <p>Bus:  <?php echo $row['bus_name']?></p>
                        <br>
                        <p> date: <?php echo $row['dep_date']?></p>
                        <p> time: <?php echo $row['dep_time']?></p>
                        <br>
                        <p> source: <?php echo $row['source']?></p>
                        <p> destination: <?php echo $row['destination']?></p>
                        <br>
                        <p> price: <?php echo $row['total_amount']?></p>
                        <br>
                        <p>selected seat:<?php echo $seat_id?></p>
                        <br>
                        <form action="pay.php" method='post'>
                        <button class="btn" name='pay' type="submit">pay <?php echo $row['total_amount']?></button>
                        <?php
                        $_SESSION['scl_id'] = $scl_id;
                        $_SESSION['user_id'] = $user_id;
                        $_SESSION['amount'] = $row['total_amount'];
                        ?>
                        </form>
                        </fieldset>
                <?php
                }
            }
?>
    </body>
</html>
