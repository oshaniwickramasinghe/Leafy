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
        header("Location:message.view.php");
    }
}
}