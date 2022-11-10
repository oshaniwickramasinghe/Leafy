
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
              
            
             <label>
                <input type ="checkbox" checked = "checked" name = "remember"> Remember me 
             </label>
             <input type = "submit" class = "btn btn-primary w-100 " value = "Login" name = ""></input>
          </div>
          <href href = "#">  Forget password?</href>

    </form>
</body>

 
</html>