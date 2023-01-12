<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../phpmailer/src/Exception.php';
require '../phpmailer/src/PHPMailer.php';
require '../phpmailer/src/SMTP.php';


class Signup extends Controller{
    
   public  function index(){
    $data['errors'] = [];
    $user = new User();
   if($_SERVER['REQUEST_METHOD'] == "POST"){
       if($user->validate($_POST))
         {
			$verification_code  = sha1($_POST['email'].time());
			$arr=	array (
				'fname' => $_POST['fname'],
				'lname'=> $_POST['lname'],
				'email' => $_POST['email'],
				'password'=>password_hash($_POST['password'],PASSWORD_DEFAULT),
				'role' => $_POST['role'],
				'code'=>  $verification_code ,
				
			 );
		
           $user->insert($arr);
           
	   $mail = new PHPMailer(true);
	   $mail->isSMTP();
	   $mail->Host = 'smtp.gmail.com';
	   $mail->SMTPAuth = true;
	   $mail->Username = 'Leafycompany2022@gmail.com'; // Your gmail
	   $mail->Password = 'qgzilgqvjzfljtel'; // Your gmail app password
	   $mail->SMTPSecure ='ssl';
	   $mail->Port = 465;
	   
	   $mail->setFrom('Leafycompany2022@gmail.com');
	   $mail->addAddress($_POST['email']);
	   $mail->isHTML(true);
	   $mail->Subject = "Email verification";
	   $mail->Body    = 'Please click the below link to verify you email<b><br>
	<a href = "http://localhost/Leafy/public/'.urldecode($verification_code) .'">http://localhost/copy/interim-Govindani/verify.php?code = '.$verification_code .'</a></b>';
	   
	    
		       $mail->send();
            redirect('message');
         }
      }

      $data['errors']=$user->errors;
    
    $data['title'] = "signup";
    $this->view('signup', $data);

    }


}
