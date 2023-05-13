<?php
include "../database/database.php";
$query = "SELECT user_id FROM user  ORDER BY user_id DESC LIMIT 1 ";
$r = mysqli_query($conn,$query);
$res  = mysqli_fetch_array($r);
$user = $res['user_id'];


if($_SERVER['REQUEST_METHOD'] == "POST"){
    $location  = $_POST['location'];
    $address1= $_POST['address1'];
    $address2= $_POST['address2'];
    $workTime  = $_POST['workTime'];
    $vehicle_num  = $_POST['vehicle_num'];
    $reg_num  = $_POST['reg_num'];
    $l_num  = $_POST['l_num'];
    $contact  = $_POST['contact'];
    $vehicle_type  = $_POST['vehicleType'];
    $capacity  =  $_POST['capacity'];
    $fuel  = $_POST['fuel'];

    if(isset($_POST['submit'])){
      $sql =  "INSERT INTO `delivery_agent`(`location`, `address1`, `address2`, `workTime`,`contact`, `license_no`, `user_id`) VALUES ('$location','$address1','$address2','$workTime',$contact,'$l_num', $user)";
      $result = mysqli_query($conn,$sql);
      $query= "INSERT INTO `delivery_vehicle`(`reg_no`, `vehicle_no`, `type`, `fuel_type`, `capacity`, `user_id`) VALUES (' $reg_num ','$vehicle_num','$vehicle_type','$fuel','$capacity', $user)";
      $result = mysqli_query($conn,$query);
      header("Location:email_verification_deli.php");
    }

    if(isset($_POST['next'])){
        $sql =  "INSERT INTO `delivery_agent`(`location`, `address1`, `address2`, `workTime`,`contact`, `license_no`, `user_id`) VALUES ('$location','$address1','$address2','$workTime',$contact,'$l_num', $user)";
        $result = mysqli_query($conn,$sql);
        $query= "INSERT INTO `delivery_vehicle`(`reg_no`, `vehicle_no`, `type`, `fuel_type`, `capacity`, `user_id`) VALUES (' $reg_num ','$vehicle_num','$vehicle_type','$fuel','$capacity', $user)";
        $result = mysqli_query($conn,$query);
        header("Location:deli_reg.php");
    }

}





?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>delivery person Register</title>
</head>
<body>
<link rel="stylesheet" href="../CSS/style.css">
<link rel="stylesheet" href="../CSS/start.css">




   <div class = "body">
   <form action = "deliveryregi.php" method="post">
    <h1>Register</h1>
    <label for="">Address</label><br>
    <input type="text" placeholder="Enter your Address" name="address1"  required><br>
    <input type="text" placeholder="Default Address" name="address2"  required><br>
    <label  for="">District</label><br>
    <input type="text" placeholder="Enter your working district" name="location" required><br>
    <label for="">Work Time</label><br>
    <select name="workTime"  class = "select">
                        <option value="PartTime">Part Time</option>
                        <option value="FullTime">Full Time</option>
    </select><br>
    <label for="">Vehicle Type</label><br>
    <select name="vehicleType"  class = "select">
                        <option value="user">Motor Bike</option>
                        <option value="admin">Lorry</option>
                        <option value="admin">ThreeWheel</option>
    </select><br>
    <label for="">Vehicle Number</label><br>
    <input type="text" placeholder="Enter your Vehicle Number" name="vehicle_num" required><br>
    <label for="">Vehicle Register Number</label><br>
    <input type="text" placeholder="Enter your Vehicle Register Number" name="reg_num" required><br>
    <label for="">License Number</label><br>
    <input type="text" placeholder="Enter your Location" name="l_num" required><br>
    <label for="">Contact Number</label><br>
    <!-- oninput JavaScript function that replaces any non-numeric characters with an empty string, only number -->
    <input type="text" placeholder="Enter your Contact Number" name="contact" maxlength="10" pattern="[0-9]{10}" oninput="this.value = this.value.replace(/[^0-9]/g, '')" required><br>
    <label for="">Capacity</label><br>
    <input type="text" placeholder="Enter Capacity of vehicle in Kg"  name = "capacity"><br>
    <label for="">Fuel Type</label><br>
    <input type="text" placeholder="Enter vehicle fuel type" name  = "fuel"><br>
    <label for=""><b>If you want to add more than one vehicle click on "Next" </b>.</label><br>
    <div class="next_button">
    <input type="submit" class="btn btn-primary w-100 " value="Submit" name="submit" data-inline="true"></input>
    <input type="submit" class="btn btn-primary w-100 " value="Next" name="next" data-inline="true"></input>
   </div> 
</form>
</div>

</body>
</html>
