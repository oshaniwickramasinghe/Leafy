<?php
include "../database/database.php";
include "User.php";
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;
// require 'phpmailer/src/Exception.php';
// require 'phpmailer/src/PHPMailer.php';
// require 'phpmailer/src/SMTP.php';

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
 
    // if(!empty($result)){

	//    $mail = new PHPMailer(true);
	//    $mail->isSMTP();
	//    $mail->Host = 'smtp.gmail.com';
	//    $mail->SMTPAuth = true;
	//    $mail->Username = 'companyleafy@gmail.com'; // Your gmail
	//    $mail->Password = 'ugwcwlkvbiubqadi'; // Your gmail app password
	//    $mail->SMTPSecure ='ssl';
	//    $mail->Port = 465;
	   
	//    $mail->setFrom('Leafycompany2022@gmail.com');
	//    $mail->addAddress($email);
	//    $mail->isHTML(true);
	//    $mail->Subject = "Email verification";
	//    $mail->Body    = 'Please click the below link to verify you email<b><br>
	//    <a href = "http://localhost/Leafy-1/Customer/verify.php?code='.urldecode($code) .'">http://localhost/Leafy-1/Customer/verify.php?code = '.$code .'</a></b>';
	    
	// 	$mail->send();
    //     header("Location:message.view.php");
    // }



if($role == "customer"){
		header("Location:customer_register.php");
}else if($role == "Instructor"){
		header("Location:instructorregi.php");
}else if($role == "DeliveryAgent"){
	header("Location:deliveryregi.php");
}else if($role == "Agriculturalist"){
	header("Location:agriculturalregi.php");
}

}

}