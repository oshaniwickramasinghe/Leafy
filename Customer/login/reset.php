<?php
include "Auth.php";
include "../database/database.php";
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Reset password</title>
</head>
<body>
<link rel = "stylesheet" href = "CSS/style.css">

    <!-- new password creating UIs -->
	<div class="newPass_body">

      <h1  class = "head" >Reset Password</h1>
		<form action="" method="POST" class="login-email">
		 <b><label for = "password">New Password</label><br></b>
         <div class="input-group">
		 <input type="password" placeholder="Password" name="password" 
				 pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
            </div>
            <div class="input-group">
				<input type="password" placeholder="Confirm Password" name="cpassword"
				 pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
			</div>
			<input type = "submit" class = "btn btn-primary w-100 " value = "Reset" name = "reset">
			</div>
			</form>

</body>

<!-- checking emails and new password to password reset -->
<?php
if(isset($_POST["reset"])){
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];



$email = $_SESSION['Email'];

if($password == $cpassword){
    $password= password_hash($_POST['password'],PASSWORD_DEFAULT);
$sql = "SELECT * FROM user WHERE email='$email'";
  $result = mysqli_query($conn,$sql);
    $query= mysqli_num_rows($result);
     $fetch = mysqli_fetch_assoc($result);

     if($email){
                 $new_pass = $password;
                 $sql = "UPDATE user SET password='$new_pass' WHERE email='$email'"; 
                 $result = mysqli_query($conn,$sql);
                 ?>
                  <script>
                 window.location.replace("login.view.php");
                alert("<?php echo "your password has been succesful reset"?>");
             </script>
            <?php
     }else{
        ?>
        <script>
            alert("<?php echo "Please try again"?>");
        </script>
        <?php
     }
    }else{
        echo "<script>alert('Password Not Matched.')</script>";
    }
   
}

?>