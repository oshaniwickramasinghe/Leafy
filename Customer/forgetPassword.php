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

	<div class="reset_body">
        <h1  class = "head" >Reset Password</h1>
		<form action="" method="POST" class="login-email">
		<label for = "password">Recovery Email Address</label><br>
			<div class="input-group" >
				<input type="email" placeholder=" Enter recovery email" name="Email" required>
			</div>
			<div class="input-group">
			<input type = "submit" class = "btn btn-primary w-100 " value = "Sent" name = "sent"></input>
			</div>
			</form>
</div>
</body>


</html>

<!-- send mails using  php mailer for resetting password -->
<?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
 require 'phpmailer/src/Exception.php';
 require 'phpmailer/src/PHPMailer.php';
 require 'phpmailer/src/SMTP.php';
//  use PHPMailer\PHPMailer\PHPMailer;
//  use PHPMailer\PHPMailer\Exception;
//   use PHPMailer\PHPMailer\SMTP;
//   require 'vendor/autoload.php';

$conn = mysqli_connect("localhost","root","","leafy");

error_reporting(0);




if (isset($_POST['sent'])) {

	$email = $_POST['Email'];

    //checking the recovery email
	$sql = "SELECT * FROM user WHERE email='$email'";
    $result = mysqli_query($conn,$sql);
    $query= mysqli_num_rows($result);
    $fetch = mysqli_fetch_assoc($result);


	 if ($result->num_rows > 0) {

//getting random number for OTP
            $otp = rand(100000,999999);
            $_SESSION['otp'] = $otp;
            $_SESSION['Email'] = $email;

	   $mail = new PHPMailer(true);
	   $mail->isSMTP();
	   $mail->Host = 'smtp.gmail.com';
	   $mail->SMTPAuth = true;
	   $mail->Username = 'companyleafy@gmail.com'; // Your gmail
	   $mail->Password = 'ugwcwlkvbiubqadi'; // Your gmail app password
	   $mail->SMTPSecure ='ssl';
	   $mail->Port = 465;

	   $mail->setFrom('Leafycompany2022@gmail.com');
	   $mail->addAddress($email);
	   $mail->isHTML(true);
	   $mail->Subject = "OTP ";
	   $mail->Body    = "<p>Dear user, </p> <h3>Your verify OTP code is $otp <br></h3>
                    <br><br>
                    <p>With regards,</p>
                    <b>Leafy</b>";

		$mail->send();

	   echo"
	   <script>
	   alert('Email Sent Successfully please check your email');
	   document.location.href ='resetvalidate.php';
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