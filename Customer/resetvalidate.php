<?php 
include "Auth.php";

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

	<div class=" otp_body">
    <h1  class = "head" >Reset Password</h1>
		<form action="" method="POST" class="login-email">
		<label for = "password">OTP</label><br>
			<div class="input-group" >
				<input type="text" placeholder=" Enter OTP" name="otp_code" required>
			</div>
			<div class="input-group">
            <input type = "submit" class = "btn btn-primary w-100 " value = "Verify" name = "verify">
			</div>
			</form>
</div>
</body>

 
</html>



<?php 
    include('database.php');
    if(isset($_POST["verify"])){
        $otp = $_SESSION['otp'];
        $otp_code = $_POST['otp_code'];

        if($otp != $otp_code){
            ?>
           <script>
               alert("Invalid OTP code");
           </script>
           <?php
        }else{

            ?>
             <script>

                   window.location.replace("reset.php");
             </script>
             <?php
        }

    }

