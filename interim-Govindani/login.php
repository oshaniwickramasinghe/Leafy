
<html>
   <title>
     Login
   </title>
<body>
    <h1>Login</h1>
<link rel = "stylesheet" href = "login.css">
    <form action = "config.php" method="post">
   
    

          <div class = "body">
          <?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
            <label for = "uname">Username</label><br>
             <input type = "text" placeholder = "Enter your email" id = "uName"   name = "uname" required><br>
             <label for = "password">Password</label><br>
             <input type = "password" placeholder = "Enter Password" id = "pass"    name = "password" required><br><br>
              
            
             
                <a href = "forgetPassword.php">  Forget password?</a>

            
             <input type = "submit" class = "btn btn-primary w-100 " value = "Login" name = ""></input>
          </div>
          <!--<a href = "#">  Forget password?</a>--> 
          <p class="login-register-text">Do not Have an account? <a href="signup.php">  Register Here.</a></p>

    </form>
</body>

 
</html>