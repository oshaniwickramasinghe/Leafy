<?php 

include "connect.php";

// $conn = mysqli_connect("localhost","root","","createpost");

// error_reporting(0);

session_start();

if (isset($_SESSION['userid'])) {
    header("Location: login.php");
}

if (isset($_POST['submit'])) {
	$uname = $_POST['uname'];
	$passw = $_POST['passw'];
	$cpassw= $_POST['cpassw'];
    $fname =$_POST['fname'];
    $lname =$_POST['lname'];
    $usertype = $_POST['usertype'];

	$check_registered_email = mysqli_num_rows(mysqli_query($conn, "SELECT uname FROM loginguser WHERE uname='$uname' ")); 

      
        
	if($check_registered_email> 0){
            echo "<script>alert('already registered');</script>";

	}elseif ($passw == $cpassw) {
		$sql = "SELECT * FROM loginuser WHERE uname='$uname'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO loginuser (uname, passw,fname ,lname,usertype)
					VALUES ('$uname', '$passw', '$fname', '$lname','$usertype')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>alert('User Registration Completed.')</script>";
				$uname = "";
				$_POST['passw'] = "";
				$_POST['cpassw'] = "";
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
<body>
<link rel = "stylesheet" href = "register.css">
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
				<input type="email" placeholder="Email" name="uname"  required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="passw"  required>
            </div>
            <div class="input-group">
				<input type="password" placeholder="Confirm Password" name="cpassw" required>
			</div>
            <p>Select your Role : <select name="usertype"  class = "select">
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
    
</body>
</html>
