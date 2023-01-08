
<html>
   <title>
     Login
   </title>
  
<body>
   <link rel="stylesheet" href="../public/assets/css/start.css">
    <link rel="stylesheet" href="../public/assets/css/style.css">


    <div class = "body">

    <form action = "" method="post">
      <div class= "form_body">
    <h1>Login</h1>
          <?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	    <?php } ?>
            <label for = "uname">Username</label><br>
             <input type = "email" placeholder = "example@gmail.com" id = "uName"   name = "uname" required><br>
             <label for = "password">Password</label><br>
             <input type = "password" placeholder = "Enter Password" id = "pass"    name = "password" required><br><br>
             <a href = "forgetPassword.php">  Forget password?</a>
             <input type = "submit" class = "btn btn-primary w-100 " value = "Login" name = ""></input>
             <p class="login-register-text">Do not Have an account?<a href="signup"> <b>Register Here.</b></a></p>
            </div>
            <div class  =  "logo">
    <img src="../public/assets/images/logo.svg" alt="logo" width = "150px" height = "150px">
      </div>


    </form>


</body>


</html>