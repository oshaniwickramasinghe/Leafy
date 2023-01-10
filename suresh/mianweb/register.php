<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body >

<style>
body {
  background-image: url('photos/vege4.jpeg');
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;

}
</style>

<link rel = "stylesheet" href = "regi.css">
    <form action = "loginuser.php" method="post">

    <h1>Register</h1>
   

          <div class = "body">

     <label  for="">First Name</label><br>
    <input type="text" placeholder="Enter First name" name="fname" required><br>
    <label for="">Last Name</label><br>
    <input type="text" placeholder="Enter Last name" name="lname" required><br>
    <label for="">Email</label><br>
    <input type="email" placeholder="Enter your Email" name="uname"  required><br>
    <label for="">Contact Number</label><br>
    <input type="number" placeholder="Enter Contact Number" name="passw"  required><br>
    <label for="">Password</label><br>
    <input type="password" placeholder="Password" name="passw"  required><br>
    <label for="">Select Your Role</label><br>
    <select name="usertype"  class = "select">
                        <option value="user">customer</option>
                        <option value="admin">Agriculturalist</option>
                        <option value="admin">Instructor</option>
                        <option value="admin">Delivery Agent</option>

                        <div class="input-group">
				<button name="submit" class="btn">Sign up</button>
			</div>

    </form>
    
</body>
</html>