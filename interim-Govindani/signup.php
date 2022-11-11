<?php 

$conn = mysqli_connect("localhost","root","","customer");

error_reporting(0);

session_start();

if (isset($_SESSION['username'])) {
    header("Location: login.php");
}

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = $_POST['password'];
	$cpassword = $_POST['cpassword'];
    $fname =$_POST['fname'];
    $lname =$_POST['lname'];
    $usertype = $_POST['user_type'];


	if ($password == $cpassword) {
		$sql = "SELECT * FROM login WHERE email='$email'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO login (email, password ,fname ,lname,userType)
					VALUES ('$email', '$password', '$fname', '$lname','$usertype')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>alert('User Registration Completed.')</script>";
				$email = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
			} else {
				echo "<script>alert('Something Wrong Went.')</script>";
			}
		} else {
			echo "<script>alert('Email Already Exists.')</script>";
		}
		
	} else {
		echo "<script>alert('Password Not Matched.')</script>";
	}
}

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