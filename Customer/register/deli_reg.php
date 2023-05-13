<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivery register page</title>
</head>
<body>
<link rel="stylesheet" href="../CSS/style.css">
<link rel="stylesheet" href="../CSS/start.css">

<form action = "email_verification_deli.php" method="post">
    <h2>Register Your vehicle</h2>
    <div class="body">
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
    <label for="">Fuel Type</label><br>
    <input type="text" placeholder="Enter vehicle fuel type" name  = "fuel"><br>
    <label for="">Capacity</label><br>
    <input type="text" placeholder="Enter Capacity of vehicle in Kg"  name = "capacity"><br>
    <input type="submit" value="Save" name="save">
    </div>

</form>
</body>
</html>