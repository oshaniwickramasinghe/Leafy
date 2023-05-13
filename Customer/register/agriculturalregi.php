<link rel="stylesheet" href="../CSS/style.css">
<link rel="stylesheet" href="../CSS/start.css">

<?php

// include '../login/Auth.php';
include "email_verification_agri.php";

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agriculturalist Register</title>
</head>
<body>


<form action = "email_verification_agri.php" method="POST">

    <h1>Regiser</h1>
   
  <div class = "body">
   <label  for="">province</label><br>
    <input type="text" placeholder="Enter your province" name="province" required><br>
    <label for="">District</label><br>
    <select name="district"  class = "select">
    <option value="Ampara">Ampara</option>
<option value="Anuradhapura">Anuradhapura</option>
<option value="Badulla">Badulla</option>
<option value="Batticaloa">Batticaloa</option>
<option value="Colombo">Colombo</option>
<option value="Galle">Galle</option>
<option value="Gampaha">Gampaha</option>
<option value="Hambantota">Hambantota</option>
<option value="Jaffna">Jaffna</option>
<option value="Kalutara">Kalutara</option>
<option value="Kandy">Kandy</option>
<option value="Kegalle">Kegalle</option>
<option value="Kilinochchi">Kilinochchi</option>
<option value="Kurunegala">Kurunegala</option>
<option value="Mannar">Mannars</option>
<option value="Matale">Matale</option>
<option value="Matara">Matara</option>
<option value="Monaragala">Monaragala</option>
<option value="Mullaitivu">Mullaitivu</option>
<option value="Nuwara Eliya">Nuwara Eliya</option>
<option value="Polonnaruwa">Polonnaruwa</option>
<option value="Puttalam">Puttalam</option>
<option value="Ratnapura">Ratnapura</option>
<option value="Trincomalee">Trincomalee</option>

    </select><br>
    <label for="">Address</label><br>
    <input type="text" placeholder="Address Line 1" name="address1"  required><br>
    <input type="text" placeholder="Address Line 2" name="address2"  required><br>
    <label  for="">Contact  Number</label><br>
    <input type="text" placeholder="Enter your Contact Number" name="contact" required><br>


    <label for="">Main Focus </label><br>
    <select name="focuc"  class = "select">
                        <option value="Vegetables">Vegetables</option>
                        <option value="Fruits">Fruits</option>
                        <option value="Seeds">Seeds</option>
    </select><br>

    <input type="submit" class="btn btn-primary w-100 " value="Submit" name=""></input>
</div>
    </form>
   

    
</body>
</html>
