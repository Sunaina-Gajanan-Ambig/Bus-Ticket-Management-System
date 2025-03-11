<?php
    include "db_connect.php";
            if (isset($_POST['add_type'])) {
                $bus_type = $_POST['type'];
                $price = $_POST['price'];
                $exist = "SELECT * from bus_type WHERE bus_type = '$bus_type'";
                $run = mysqli_query($conn, $exist);  
                if (mysqli_num_rows($run)>1){
                    header('location: admin_add_bus_type.php?error=bus type already exist');
                }
                else{
                    $sql = "INSERT INTO bus_type(bus_type,t_price) VALUES ('$bus_type','$price')";
                    $query = mysqli_query($conn, $sql);
                    header('Location: admin_bus_type.php');
                }
            }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add bus type</title>
    <style>
        .margin_down{
            margin-bottom: 20px;
        }

        .btn{
        background-color: rgb(113, 113, 252);
        width: 150px;
        font-size: 20px;
        color: #fff;
        border-radius: 10px;
        padding: 10px;
        }

.container{
    display: flex;
    align-items: center;
    justify-content: center;
    margin-top: 10%;

}

.input-field{
    display: flex;
    flex-direction: column;
    margin: 40px;

}

    </style>
</head>
<body>
    <div class="container">
        <fieldset>
            
            <?php if(isset($_GET['error'])){ ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>
            <form action="" method="post">
            <input type="text" class="input-field" name ="type" placeholder="enter bus type" required>
            <input type="number" class="input-field" name ="price" placeholder="enter price" required>
            <center><button type="submit" class="btn margin_down" name ="add_type" value ="add type">add type</center>
            </form>
            </fieldset>
    </div>
</body>
</html>