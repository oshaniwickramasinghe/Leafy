<?php

include "signup_db.php";

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<title>Sign up</title>
</head>
<body>
<link rel = "stylesheet" href = "signup.css">
<h1>Sign Up</h1>
	<div class="body">
		<form action="" method="POST" class="login-email">
            
			<div class="input-group" >
				<input type="text" placeholder=" First name" name="fname" required>
			</div>
            <div class="input-group" >
				<input type="text" placeholder=" Last name" name="lname" required>
			</div>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email"  required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password"  required>
            </div>
            <div class="input-group">
				<input type="password" placeholder="Confirm Password" name="cpassword" required>
			</div>
            <p>Select your Role : <select name="user_type"  class = "select">
                        <option value="user">customer</option>
                        <option value="admin">Agriculturalist</option>
                        <option value="admin">Instructor</option>
                        <option value="admin">Delivery Agent</option>
           </select>
 

			<div class="input-group">
				<button name="submit" class="btn">Sign up</button>
			</div>

			<p class="login-register-text">Have an account? <a href="login.php">Login Here.</a></p>
		</form>
	</div>
</body>
</html>