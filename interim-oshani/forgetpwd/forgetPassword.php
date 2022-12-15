
<?php
  session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel = "stylesheet" type = "text/css" href = "style.css"> 
</head>
<body>
<div class="header">
        <h1>Reset password</h1>   
    </div>
<link rel = "stylesheet" href = "signup.css">
	<div>
		<form action="" method="POST" >
		<label for = "password">Recovery Email Address</label><br>
			<div class="input-group" >
				<input type="email" placeholder=" Enter recovery email" name="Email" required>
			</div>
			<div class="input-group">
			<input type = "submit" class = "button " value = "Sent" name = "sent"></input>
			</div>
			</form>
</div>
</body>

 
</html>

<?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
 require './phpmailer/src/Exception.php';
 require './phpmailer/src/PHPMailer.php';
 require './phpmailer/src/SMTP.php';
 
//  use PHPMailer\PHPMailer\PHPMailer;
//  use PHPMailer\PHPMailer\Exception;
//   use PHPMailer\PHPMailer\SMTP;
//   require 'vendor/autoload.php';

//$conn = mysqli_connect("localhost","root","","customer_db");
include "connection.php";

error_reporting(0);




if (isset($_POST['sent'])) {
    
	
	$email = $_POST['Email'];
    
	
	
	$sql = "SELECT * FROM login WHERE email='$email'";
  $result = mysqli_query($conn,$sql);
    $query= mysqli_num_rows($result);
     $fetch = mysqli_fetch_assoc($result);

     
		
	 if ($result->num_rows > 0) {
		
			echo "hi_1";
            $otp = rand(100000,999999);
            $_SESSION['otp'] = $otp;
            $_SESSION['Email'] = $email;

			
	  
	   $mail = new PHPMailer(true);
	   $mail->isSMTP();
	   $mail->Host = 'smtp.gmail.com';
	   $mail->SMTPAuth = true;
	   $mail->Username = 'Leafycompany2022@gmail.com'; // Your gmail
	   $mail->Password = 'qgzilgqvjzfljtel'; // Your gmail app password
	   $mail->SMTPSecure ='ssl';
	   $mail->Port = 465;
	   
	   $mail->setFrom('Leafycompany2022@gmail.com');
	   $mail->addAddress($email);
	   $mail->isHTML(true);
	   $mail->Subject = "OTP ";
	   $mail->Body    = "<p>Dear user, </p> <h3>Your verify OTP code is $otp <br></h3>
                    <br><br>
                    <p>With regrads,</p>
                    <b>Leafy</b>";
	   
	    
		$mail->send();

	   echo"
	   <script>
	   alert('Email Sent Successfully please check your email');
	   document.location.href ='verification.php';
	   </script>
	   ";
	 
	 
 }else{ 	
 ?>
 <script>
	 alert("<?php  echo "Sorry, no emails exists "?>");
 </script>
 <?php

}
}	

?>