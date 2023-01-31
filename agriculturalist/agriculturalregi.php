<?php
// include "database.php";
// include "User.php";

include "connect.php";

if($_SERVER['REQUEST_METHOD'] == "POST"){
if(empty($errors)){
	// $verification_code  = sha1($_POST['email'].time());
			
				$province = $_POST['province'];
				$district = $_POST['district'];
				$address1 = $_posST['address1'];
                $address2 = $_POST['address2'];
				// $password= password_hash($_POST['password'],PASSWORD_DEFAULT);
				// $role = $_POST['role'];
				// $code= $verification_code;
				
			 
    $sql  = "INSERT INTO agriculturalist(province, district, address1, address2) 
    VALUES ('$province','$district','$address1','$address2'')";
    $result = mysqli_query($conn,$sql);
    var_dump($result);
    if(!empty($result)){
        header("Location:../Customer/loging.php");
    }
}
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agriculturalist Register</title>
</head>
<body>

<link rel = "stylesheet" href = "../agriculturalist/style.css">
    <form action = "loginuser.php" method="post">

    <h1>Regiser</h1>
   

        <div class = "body">

     <label  for="">province</label><br>
    <input type="text" placeholder="Enter your province" name="province" required><br>
    <label for="">District</label><br>
    <select name="district"  class = "select">
                        <option value="Ampara">Ampara</option>
                        <option value="Anuaradapura">Anuaradapura</option>
                        <option value="Badulla">Badulla</option>
                        <option value="Batticaloa">Batticaloa</option>
    </select><br>
    <label for="">Address</label><br>
    <input type="text" placeholder="Address Line 1" name="address1"  required><br>
    <input type="text" placeholder="Address Line 2" name="address2"  required><br>

    <label for="">Main Focus </label><br>
    <select name="focuc"  class = "select">
                        <option value="Vegetables">Vegetables</option>      
                        <option value="Fruits">Fruits</option>                 
                        <option value="Seeds">Seeds</option>
    </select><br>

    <input type="submit" class="btn btn-primary w-100 " value="Submit" name=""></input>

    </form>
    <style>
     body{
   
    background-image: url('photos/agri.jpg');
}
</style>
    
</body>
</html>

<?php include '../includes/footer.view.php'?>
