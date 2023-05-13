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

						if(isset($_POST['submit'])){

							$contact_number= mysqli_real_escape_string($conn,$_POST['contact']);
							$occupation= mysqli_real_escape_string($conn,$_POST['occupation']);
							$specialized_area= mysqli_real_escape_string($conn,$_POST['area']);
							$education_level= mysqli_real_escape_string($conn,$_POST['level']);
							if ($_FILES['image']['error'] !== UPLOAD_ERR_OK) {
								// Handle the upload error
							  }
							  $image_folder = "../images/";
							  $image_name = $_FILES['image']['name'];
							  $image_tmp_name = $_FILES['image']['tmp_name'];
							  $image_path = $image_folder . $image_name;
							  $image_type = $_FILES['image']['type'];
							  $image_size = $_FILES['image']['size'];
							  $image_allowed_types = ['image/jpeg', 'image/png'];
							  if (!in_array($image_type, $image_allowed_types)) {
								// Handle the file type error
							  }
							  if ($image_size > 10 * 1024 * 1024) {
								// Handle the file size error
							  }
							  if (move_uploaded_file($image_tmp_name, $image_path)) {

							 $sql  = "INSERT INTO `instructor`(`occupation`, `education_level`, `specialized_area`, `image`, `user_id`) VALUES ('$occupation','$education_level','$specialized_area','$image_name',$user)";
                              $result = mysqli_query($conn,$sql);
							  }
                            //   $sql  = "INSERT INTO `instructor`(`occupation`, `education_level`, `specialized_area`, `image`, `user_id`) VALUES ('$occupation','$education_level','$specialized_area','$image_name',$user)";
                            //   $result = mysqli_query($conn,$sql);
						}


    // if( !empty($r)){

	//    $mail = new PHPMailer(true);
	//    $mail->isSMTP();
	//    $mail->Host = 'smtp.gmail.com';
	//    $mail->SMTPAuth = true;
	//    $mail->Username = 'leafy2022.2023@gmail.com'; // Your gmail
	//    $mail->Password = 'ddycipvosmnrufhs'; // Your gmail app password
	//    $mail->SMTPSecure ='ssl';
	//    $mail->Port = 465;
	//    $mail->setFrom('leafy2022.2023@gmail.com');
	//    $mail->addAddress($email);
	//    $mail->isHTML(true);
	//    $mail->Subject = "Email verification";
	//    $mail->Body    = 'Please click the below link to verify you email<b><br>
	//    <a href = "http://localhost/Leafy-main/Customer/register/verify.php?code='.urldecode($code) .'">http://localhost/Leafy-mainl/Customer/register/verify.php?code = '.$code .'</a></b>';

	// 	$mail->send();
    //     header("Location:../register/message.view.php");
    // }
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up Form</title>
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="../CSS/start.css">
</head>
<body>
    <div class="form-container">
        <form action="instructorregi.php" method="POST" enctype="multipart/form-data" >
            <h1>Register</h1>
            <label for="number">Contact number</label><br>
            <input type="text" name="contact" placeholder="Enter your number" class="box" pattern="[0-9]{10}" required><br>
            <label for="occupation">Occupation</label><br>
            <input type="text" name="occupation" placeholder="Enter your occupation" class="box" required><br>
            <label for="area">Specialized area</label><br>
            <input type="text" name="area" placeholder="Specialized area" class="box" required><br>
            <label for="">Select the education level</label><br>
            <select name="level" class="box"> 
            <option name="advanced_level">Advanced Level</option>
            <option name="degree">Degree Level</option>
            </select>
            <br><label for="image">Attach images of your education certificates</label>
            <input type="file" name="image" />
            <input type="submit" name="submit" value="register now" class="btn">
        </form>

    </div>
    
</body>
</html>