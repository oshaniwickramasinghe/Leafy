<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>
<h1>Login</h1>
<link rel = "stylesheet" href = "login.css">
    <form action = "loginuser.php" method="post">
   

          <div class = "body">

          <?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
    
            <label for = "uname">Username</label><br>
             <input type = "text" placeholder = "Enter your email" id = "uname"   name = "uname" required><br>
             <label for = "password">Password</label><br>
             <input type = "password" placeholder = "Enter Password" id = "pass"    name = "passw" required><br><br>
              
            
             <label>
                <input type ="checkbox" checked = "checked" name = "remember"> Remember me 
             </label>
             <input type = "submit" class = "btn btn-primary w-100 " value = "Login" name = "log"></input>
          </div>
          <href href = "#">  Forget password?</href>

    </form>
    
</body>
</html>