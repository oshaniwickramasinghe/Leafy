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
           $user->insert($_POST);
           
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
	   <a href = "http://localhost/interim/interim-Govindani/verify.php?code=">http://localhost//interim-Govindani/verify.php?code = "</a></b>';
	    
		$mail->send();

            echo "<script>alert('Your profile was successfully created. Please check the email.')</script>";
            redirect('signup');
         }
      }

      $data['errors']=$user->errors;
    
    $data['title'] = "signup";
    $this->view('signup', $data);

    }


}