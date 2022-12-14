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

$conn = mysqli_connect("localhost","root","","customer_db");

error_reporting(0);

session_start();
if(isset($_POST['submit'])){
if (isset($_SESSION['username'])) {
   header("Location: login.php");
}

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);
    $fname =$_POST['fname'];
    $lname =$_POST['lname'];
    $usertype = $_POST['user_type'];
	$verification_code  = sha1($email.time());




	if ($password == $cpassword) {
		$sql = "SELECT * FROM login WHERE email='$email'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO login (email, password ,fname ,lname,userType, verify_code, is_active)
					VALUES ('$email', '$password', '$fname', '$lname','$usertype', '$verification_code', 'false')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>alert('User Registration Completed.')
      </script>";
	//   $email = "";
	//   $_POST['password'] = "";
	//   $_POST['cpassword'] = "";
      //header("Location: login.php");

	  
	
	  
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
	   $mail->Subject = "Email verification";
	   $mail->Body    = 'Please click the below link to verify you email<b><br>
	   <a href = "http://localhost/copy/interim-Govindani/verify.php?code='.urldecode($verification_code) .'">http://localhost/copy/interim-Govindani/verify.php?code = '.$verification_code .'</a></b>';
	    
		$mail->send();

	   echo"
	   <script>
	   alert('Sent Successfully');
	   document.location.href ='signup.php';
	   </script>
	   ";
	 
	 
	  
	

}else{
	echo "<script>alert('Email Already Exists.')</script>";
}

}else{
	echo "<script>alert('No data in database.')</script>";
}
		
		

	} else {
		echo "<script>alert('Password Not Matched.')</script>";
	}

     }
}

?>