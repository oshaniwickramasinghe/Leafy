



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Register</title>
</head>
<body>

<link rel = "stylesheet" href = "../agriculturalist/style.css">
    <form action = "loginuser.php" method="post">

    <h1>Regiser</h1>
   

        <div class = "body">

     <label  for="">province</label><br>
    <input type="text" placeholder="Enter your province" name="province" required><br>
    <label for="">District</label><br>
    <select name="district"  class = "select">
                        <option value="Ampara">Ampara</option>
                        <option value="Anuaradapura">Anuaradapura</option>
                        <option value="Badulla">Badulla</option>
                        <option value="Batticaloa">Batticaloa</option>
    </select><br>
    <label for="">Address</label><br>
    <input type="text" placeholder="Address Line 1" name="address1"  required><br>
    <input type="text" placeholder="Address Line 2" name="address2"  required><br>

    <input type="submit" class="btn btn-primary w-100 " value="Submit" name=""></input>

    </form>
    <!-- <style>
     body{
   
    /* background-image: url('photos/agri.jpg'); */
} -->
</style>
    
</body>

</html>



