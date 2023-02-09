

<html>
   <title>
     Login
   </title>
  
<body>
   <link rel="stylesheet" href="../Customer/CSS/start.css">
    <link rel="stylesheet" href="../Customer/CSS/style.css">

     

    <div class = "body">

    <form action = "login.php" method="post">
    
      <div class= "form_body">
    <h1>Login</h1>
    

    <?php if (isset($_GET['error'])) { ?>
      <small class = "alert"><?php echo $_GET['error'];?></small>
     		
     	<?php } ?>

      <br>
      <label for = "uname">Username</label><br>
             <input type = "email" placeholder = "example@gmail.com" id = "email"   name = "email"><br>
             <label for = "password">Password</label><br>
             <input type = "password" placeholder = "Enter Password" id = "password"    name = "password" required><br><br>
             <a href = "forgetPassword.php">  Forget password?</a>
             <input type = "submit" class = "btn " value = "Login" name = ""></input>
             <p class="login-register-text">Do not Have an account?<a href="signup.view.php"> <b>Register Here.</b></a></p>
            </div>
            <div class  =  "logo">
        <img src="../Customer/images/logo.svg" alt="logo" width = "150px" height = "150px" class = "responsive">
      </div>


    </form>


</body>


</html>