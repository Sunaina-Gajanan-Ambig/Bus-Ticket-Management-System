<?php
    include "db_connect.php";
    $source = $dest = '';
    if(isset($_POST['submit'])){
    $source = $_POST['source'];
    $dest = $_POST['dest'];
    $price = $_POST['price'];
    if($source == $dest){
        header('location: add_route.php?error=source and destination cant be same');
        exit;
    }

    $sql = "select * from route_details where source='$source' AND  destination = '$dest'";
    $query = mysqli_query($conn, $sql);
    if(mysqli_num_rows($query)>0){
        header('location: add_route.php?error=route detail already exist');
        exit;
    }else{
        $insert = "INSERT into route_details(source,destination,r_price) values ('$source','$dest','$price')";
        $result = mysqli_query($conn, $insert);
        if($result){?>
            <script>alert("data inserted successfully")</script>
            <?php
            header('location: admin_route_details.php');
            exit;
        }
            }
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add route</title>
    <link rel="stylesheet" href="adminStyle.css">
</head>
<body>
    <form method="post" class="container" action=" ">
    <?php if(isset($_GET['error'])){ ?>
        <p class="error"><?php echo $_GET['error']; ?></p>
    <?php } ?>
    <input type="text" name="source" class="input-field" placeholder="enter source" required>
    <br>
    <input type="text" name="dest" class="input-field" placeholder="enter destination" required>
    <br>
    <input type="text" name="price" class="input-field" placeholder="enter price" required>
    <br>
    <input type="submit" class="btn" name = "submit" value="add route"> 
    </form>
</body>
</html>