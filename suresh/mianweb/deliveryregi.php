<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>delivery person Register</title>
</head>
<body>

<link rel = "stylesheet" href = "regi.css">
    <form action = "loginuser.php" method="post">

    <h1>Regiser</h1>
   

        <div class = "body">

     <label  for="">Location</label><br>
    <input type="text" placeholder="Enter your Location" name="" required><br>
    <label for="">Work Time</label><br>
    <select name="usertype"  class = "select">
                        <option value="user">Part Time</option>
                        <option value="admin">Full Time</option>
    </select><br>

    <!-- <input type="checkbox" name="time" placeholder="Full Time"><br>
    <input type="checkbox" name="time" placeholder="part Time"><br> -->

    <label for="">Vehicle Type</label><br>
    <select name="usertype"  class = "select">
                        <option value="user">Motor Bike</option>
                        <option value="admin">Lorry</option>
                        <option value="admin">Three Weel</option>
                        
    </select><br>
    <label for="">Address</label><br>
    <input type="text" placeholder="Enter your Address" name=""  required><br>
    <input type="text" placeholder="Default Address" name=""  required><br>

    <div class="input-group">
				<button name="submit" class="btn">Sign up</button>
			</div>
  

    </form>
    
</body>
</html>