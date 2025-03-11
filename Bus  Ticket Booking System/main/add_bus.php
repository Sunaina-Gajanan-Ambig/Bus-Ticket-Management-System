<?php
include "db_connect.php";
$reg_no = $bus_name = $no_of_seats = $bus_type = '';
if(isset($_POST['submit'])){
$reg_no = $_POST['reg_no'];
$bus_name = $_POST['bus_name'];
$no_of_seats = $_POST['no_of_seats'];
$type = $_POST['bus_type'];
$select = "SELECT type_id FROM bus_type WHERE bus_type = '$type'";
    $sel = mysqli_query($conn, $select);
    $row=mysqli_fetch_assoc($sel);
    $type_id = $row['type_id'];
$sql = "select * from bus_details where bus_reg_no ='$reg_no'";
$query = mysqli_query($conn, $sql);
if(mysqli_num_rows($query)>0){
    header('location: add_bus.php?error=bus detail already exist');
    exit;
}else{
    $insert = "INSERT into bus_details(bus_reg_no,bus_name,type_id,total_no_of_seats) values ('$reg_no','$bus_name','$type_id','$no_of_seats')";
    $result = mysqli_query($conn, $insert);
    if($result){?>
        <script>alert("data inserted successfully")</script>
        <?php
        header('location: admin_bus_details.php');
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
<title>add Bus</title>
<link rel="stylesheet" href="adminStyle.css">
<style>
    .drop-down{
        width: 480px;
        font-size: 20px;
        padding: 5px;
        border-width: 2px;
        border-radius: 10px;
        margin-bottom: 40px;
    }
</style>
</head>
<body>
<form method="post" class="container" action=" ">
<?php if(isset($_GET['error'])){ ?>
    <p class="error"><?php echo $_GET['error']; ?></p>
<?php } ?>
<input type="text" name="reg_no" class="input-field" placeholder="enter bus registration no." required>
<br>
<input type="text" name="bus_name" class="input-field" placeholder="enter bus name" required>
<br>
<input type="number" name="no_of_seats" class="input-field" placeholder="enter total no seats" required>
<br>
<label for="bus_type">select bus type : </label>
<select name="bus_type" class="drop-down">

<?php
    $sql = "SELECT * from bus_type";
    $querry = mysqli_query($conn,$sql);
    while($row=mysqli_fetch_array($querry)){
    ?>
    <option><?php echo $row['bus_type']?></option>
    <?php } ?>
    </select>    
<input type="submit" class="btn" name = "submit" value="add route"> 
</form>
</body>
</html>