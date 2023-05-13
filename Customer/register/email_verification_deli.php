<?php
include "../database/database.php";

use \PHPMailer\PHPMailer\PHPMailer;
use \PHPMailer\PHPMailer\Exception;
require '../phpmailer/src/Exception.php';
require '../phpmailer/src/PHPMailer.php';
require '../phpmailer/src/SMTP.php';



$query = "SELECT user_id, email , code,role FROM user  ORDER BY user_id DESC LIMIT 1 ";
$r = mysqli_query($conn,$query);

$res  = mysqli_fetch_array($r);
$user = $res['user_id'];
$email = $res['email'];
$code = $res['code'];
$role  = $res['role'];


if($_SERVER['REQUEST_METHOD'] == "POST"){

    $vehicle_type  = $_POST['vehicleType'];
    $capacity  =  $_POST['capacity'];
    $fuel  = $_POST['fuel'];
    $vehicle_num  = $_POST['vehicle_num'];
    $reg_num  = $_POST['reg_num'];

    $query= "INSERT INTO `delivery_vehicle`(`reg_no`, `vehicle_no`, `type`, `fuel_type`, `capacity`, `user_id`) VALUES (' $reg_num ','$vehicle_num','$vehicle_type','$fuel','$capacity', $user)";
    $result = mysqli_query($conn,$query);



    if( !empty($r)){

	   $mail = new PHPMailer(true);
	   $mail->isSMTP();
	   $mail->Host = 'smtp.gmail.com';
	   $mail->SMTPAuth = true;
	   $mail->Username = 'leafy2022.2023@gmail.com'; // Your gmail
	   $mail->Password = 'ddycipvosmnrufhs'; // Your gmail app password
	   $mail->SMTPSecure ='ssl';
	   $mail->Port = 465;
	   $mail->setFrom('Leafycompany2022@gmail.com');
	   $mail->addAddress($email);
	   $mail->isHTML(true);
	   $mail->Subject = "Email verification";
	   $mail->Body    = 'Please click the below link to verify you email<b><br>
	   <a href = "http://localhost/Leafy-main/Customer/register/verify.php?code='.urldecode($code) .'">http://localhost/Leafy-mainl/Customer/register/verify.php?code = '.$code .'</a></b>';

		$mail->send();
        header("Location:message.view.php");
    }


}else{
	if( !empty($r)){

		$mail = new PHPMailer(true);
		$mail->isSMTP();
		$mail->Host = 'smtp.gmail.com';
		$mail->SMTPAuth = true;
		$mail->Username = 'leafy2022.2023@gmail.com'; // Your gmail
		$mail->Password = 'ddycipvosmnrufhs'; // Your gmail app password
		$mail->SMTPSecure ='ssl';
		$mail->Port = 465;
		$mail->setFrom('Leafycompany2022@gmail.com');
		$mail->addAddress($email);
		$mail->isHTML(true);
		$mail->Subject = "Email verification";
		$mail->Body    = 'Please click the below link to verify you email<b><br>
		<a href = "http://localhost/Leafy-main/Customer/register/verify.php?code='.urldecode($code) .'">http://localhost/Leafy-mainl/Customer/register/verify.php?code = '.$code .'</a></b>';
 
		 $mail->send();
		 header("Location:message.view.php");
	 }
}

