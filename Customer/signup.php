<?php
include "database.php";
include "User.php";

if($_SERVER['REQUEST_METHOD'] == "POST"){
if(empty($errors)){
	$verification_code  = sha1($_POST['email'].time());
			
				$fname = $_POST['fname'];
				$lname = $_POST['lname'];
				$email = $_POST['email'];
				$password= password_hash($_POST['password'],PASSWORD_DEFAULT);
				$role = $_POST['role'];
				$code= $verification_code;
				
			 
    $sql  = "INSERT INTO user(fname, lname, email, password, role, code) VALUES ('$fname','$lname','$email','$password','$role','$code')";
    $result = mysqli_query($conn,$sql);
    var_dump($result);
    if(!empty($result)){

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
	   <a href = "http://localhost/Leafy-1/Customer/verify.php?code='.urldecode($code) .'">http://localhost/Leafy-1/Customer/verify.php?code = '.$code .'</a></b>';
	    
		$mail->send();
        header("Location:message.view.php");
    }
}
}