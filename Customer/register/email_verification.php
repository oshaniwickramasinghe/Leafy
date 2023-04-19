<?php
include "../database.php";

use \PHPMailer\PHPMailer\PHPMailer;
use \PHPMailer\PHPMailer\Exception;
require '../phpmailer/src/Exception.php';
require '../phpmailer/src/PHPMailer.php';
require '../phpmailer/src/SMTP.php';



$query = "SELECT user_id, email , code FROM user  ORDER BY user_id DESC LIMIT 1 ";
$r = mysqli_query($conn,$query);

$res  = mysqli_fetch_array($r);
$user = $res['user_id'];
$email = $res['email'];
$code = $res['code'];



if($_SERVER['REQUEST_METHOD'] == "POST"){

				$address1 = $_POST['address1'];
				$address2 = $_POST['address2'];
				$district = $_POST['district'];
				$contact  = $_POST['contact_no'];

    $sql  = "INSERT INTO customer(address1, address2,district, contact_no, user_id)VALUES('$address1','$address2', '$district' , $contact, $user)";
    $result = mysqli_query($conn,$sql);
    if( !empty($r)){

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
	   $mail->Subject = "Email verification";
	   $mail->Body    = 'Please click the below link to verify you email<b><br>
	   <a href = "http://localhost/Leafy-1/Customer/verify.php?code='.urldecode($code) .'">http://localhost/Leafy-1/Customer/verify.php?code = '.$code .'</a></b>';

		$mail->send();
        header("Location:../message.view.php");
    }
}
