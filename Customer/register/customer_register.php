<link rel="stylesheet" href="../CSS/style.css">
<link rel="stylesheet" href="../CSS/start.css">

<?php
include "email_verification.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Register</title>
    
</head>
<body>

<!-- second register form for  the customer to fill about the location and Contact
   after signup to the web page -->

<div  class  = "register_body">
<form method  = "post" action = "email_verification.php " >
<img src="../images/logo.svg" alt="logo" width = "120px" height = "120px" class = "Logo">
    <h2>Location Information </h2>

    <label for="">Address</label><br>
    <input type="text" placeholder="Address Line 1" name="address1"  required><br>
    <input type="text" placeholder="Address Line 2" name="address2"  required><br>
    <label for="">District</label><br>
    <input type="text" placeholder="Address Line 1" name="district"  required><br
    <label for="">Contact Number</label><br>
   <!-- oninput JavaScript function that replaces any non-numeric characters with an empty string, only number -->
   <input type="text" placeholder="Enter your Contact Number" name="contact" maxlength="10" pattern="[0-9]{10}" oninput="this.value = this.value.replace(/[^0-9]/g, '')" required><br>

    <input type="submit" class="btn btn-primary w-100 " value="Save" name=""></input>

</form>
</body>
</html>


