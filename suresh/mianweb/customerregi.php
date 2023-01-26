



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Register</title>
</head>
<body>

<link rel = "stylesheet" href = "style.css">
    <form action = "loginuser.php" method="post">

    <h1>Regiser</h1>
   

        <div class = "body">

     <label  for="">province</label><br>
    <input type="text" placeholder="Enter your province" name="" required><br>
    <label for="">District</label><br>
    <select name="usertype"  class = "select">
                        <option value="user">customer</option>
                        <option value="admin">Agriculturalist</option>
                        <option value="admin">Instructor</option>
                        <option value="admin">Delivery Agent</option>
    </select><br>
    <label for="">Address</label><br>
    <input type="text" placeholder="Address Line 1" name=""  required><br>
    <input type="text" placeholder="Address Line 2" name=""  required><br>

    <input type="submit" class="btn btn-primary w-100 " value="Submit" name=""></input>

    </form>
    <style>
     body{
   
    background-image: url('photos/agri.jpg');
}
</style>
    
</body>
</html>