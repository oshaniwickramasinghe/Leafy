
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
    
    <?php if(!empty($errors['email'])):?>
				   <small class = "alert"><?=$errors['email']?></small>
		<?php endif; ?>
      <br>
      <label for = "uname">Username</label><br>
             <input type = "email" placeholder = "example@gmail.com" id = "email"   name = "email"><br>
             
             <label for = "password">Password</label><br>
             <input type = "password" placeholder = "Enter Password" id = "password"    name = "password" required><br><br>
             <a href = "#">  Forget password?</a>
             <input type = "submit" class = "btn " value = "Login" name = ""></input>
             <p class="login-register-text">Do not Have an account?<a href="signup"> <b>Register Here.</b></a></p>
            </div>
            <div class  =  "logo">
    <img src="../public/assets/images/logo.svg" alt="logo" width = "150px" height = "150px">
      </div>


    </form>


</body>


</html>