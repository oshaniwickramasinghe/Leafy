<<<<<<< HEAD:App/views/signup.view.php
=======
<?php 


include "signup.php";
?>


>>>>>>> 10fda9860a40eea51fdb9d0d98ed94ed1e7a9c52:Customer/signup.view.php
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<title>Sign up</title>
</head>
<body>



<<<<<<< HEAD:App/views/signup.view.php
<link rel="stylesheet" href="../public/assets/css/start.css">
<link rel="stylesheet" href="../public/assets/css/style.css">
=======
<link rel="stylesheet" href="../Customer/CSS/start.css">
<link rel="stylesheet" href="../Customer/CSS/style.css">
>>>>>>> 10fda9860a40eea51fdb9d0d98ed94ed1e7a9c52:Customer/signup.view.php

	<div class="body_1">
    
		<form action="" method="POST" class="login-email">
<<<<<<< HEAD:App/views/signup.view.php
=======
		
>>>>>>> 10fda9860a40eea51fdb9d0d98ed94ed1e7a9c52:Customer/signup.view.php

            <h1>Sign Up</h1>
			<div class="input-group" >
				<input type="text"  placeholder= "First name" name="fname"><br>
				<?php if(!empty($errors['fname'])):?>
				<small><?=$errors['fname']?></small>
				<?php endif; ?>
			</div>
            <div class="input-group" >
				<input type="text" placeholder=" Last name" name="lname"><br>
				<?php if(!empty($errors['lname'])):?>
				<small><?=$errors['lname']?></small>
				<?php endif; ?>
			</div>
			<div class="input-group">
				<input type="email" placeholder="example@gmail.com" name="email" ><br>

				<?php if(!empty($errors['email'])):?>
				<small><?=$errors['email']?></small>
					<?php endif; ?>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" 
				 pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
            </div>
            <div class="input-group">
				<input type="password" placeholder="Confirm Password" name="cpassword"
				 pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"><br>
				<?php if(!empty($errors['password'])):?>
				 <small><?=$errors['password']?></small>
				 <?php endif; ?>
					
			</div>
            <p><b>Select your Role : </b><select name="role"  class = "select">
<<<<<<< HEAD:App/views/signup.view.php
                        <option value="customer">customer</option>
=======
                        <option value="customer">Customer</option>
>>>>>>> 10fda9860a40eea51fdb9d0d98ed94ed1e7a9c52:Customer/signup.view.php
                        <option value="Agriculturalist">Agriculturalist</option>
                        <option value="Instructor">Instructor</option>
                        <option value="Delivery Agent">Delivery Agent</option>
           </select>
 

			<div class="input-group">
            <input type = "submit" class = "btn btn-primary w-100 " value = "Signup" name = ""></input>

<<<<<<< HEAD:App/views/signup.view.php
			<p class="login-register-text"><b>Have an account? </b><a href="login"><b>Login Here.</b></a></p>
=======
			<p class="login-register-text"><b>Have an account? </b><a href="login.view.php"><b>Login Here.</b></a></p>
>>>>>>> 10fda9860a40eea51fdb9d0d98ed94ed1e7a9c52:Customer/signup.view.php
          

		</form>
	</div>
</body>
</html>