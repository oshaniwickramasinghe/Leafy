<?php
include'config.php';

if(isset($_POST['submit'])){
    $first_name= mysqli_real_escape_string($conn,$_POST['fname']);
    $last_name= mysqli_real_escape_string($conn,$_POST['lname']);
    $email= mysqli_real_escape_string($conn,$_POST['email']);
    $contact_number= mysqli_real_escape_string($conn,$_POST['cnumber']);
    $password= mysqli_real_escape_string($conn,md5($_POST['password']));
    $cpassword= mysqli_real_escape_string($conn,md5($_POST['cpassword']));
    $occupation= mysqli_real_escape_string($conn,$_POST['occupation']);
    $specialized_area= mysqli_real_escape_string($conn,$_POST['sarea']);
    $education_level= mysqli_real_escape_string($conn,$_POST['elevel']);
    $role= mysqli_real_escape_string($conn,$_POST['role']);
    $image=$_FILES['image']['name'];
    $image_size=$_FILES['image']['size'];
    $image_tmp_name=$_FILES['image']['tmp_name'];
    $image_folder="images/".$image;

    

    $select=mysqli_query($conn,"SELECT * FROM instructor WHERE email='$email' AND password='$password'")or die('query failed');

    if(mysqli_num_rows($select)>0){
        $message[]='user already exist';
    }else{
        if($password != $cpassword){
            $message[]='confirm password not matched!';
        }elseif($image_size>2000000){
            $message[]="image size is too large!";
        }else{
            $sql =mysqli_query($conn,"INSERT INTO instructor(first_name,last_name,email,contact_number,password,occupation,specialized_area,education_level,role,image) Values('$first_name','$last_name','$email','$contact_number','$password','$occupation','$specialized_area','$education_level','$role','$image')");
        if($sql){
            move_uploaded_file($image_tmp_name, $image_folder);
            $message[]='registered successfully!';
            echo"<script>alert('registered successfully!');window.location.href='login.php';</script>";
        }else{
            $message[]="registered failed!";

        }
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
    <title>Sign up Form</title>
    <link rel="stylesheet" href="signup.css">
</head>
<body>
    <div class="form-container">
        <form action="" method="POST" enctype="multipart/form-data" id="form">
            <h1>Register</h1>
            <?php
                if(isset($message)){
                    foreach($message as $message){
                        echo '<div class="message">'.$message.'</div>';
                    }
                }
            ?>
            <p>Already you have an account?<a href="login.php">Login here</a></p>
            <label for="fname">First Name</label>
            <input type="text" name="fname" placeholder="Enter your first name" class="box" required>
            <label for="lname">Last Name</label>
            <input type="text" name="lname" placeholder="Enter your last name" class="box" required>
            <label for="email">Email</label>
            <input type="email" name="email" placeholder="Enter your email" class="box" required>
            <label for="cnumber">Contact number</label>
            <input type="tel" name="cnumber" placeholder="Enter your number" class="box" pattern="[0-9]{10}" required>
            <label for="password">Password</label>
            <input type="password" name="password" placeholder="enter password" class="box" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
            <label for="cpassword">Confirm Password</label>
            <input type="password" name="cpassword" placeholder="confirm password" class="box"  required>
            <label for="occupation">Occupation</label>
            <input type="text" name="occupation" placeholder="Enter your occupation" class="box" required>
            <label for="sarea">Specialized area</label>
            <input type="text" name="sarea" placeholder="Specialized area" class="box" required>
            <label for="elevel">Select the education level</label><br>
            <select name="elevel" class="box"> 
            <option value="advanced_level">Advanced Level</option>
            <option value="degree">Degree Level</option>

            <br>
            </select>
            <label for="role">Select the user role</label><br> 
            <select name="role" class="box">
            <option value="Customer">ustomer</option>
            <option value="Agriculturalist">Agriculruralist</option>
            <option value="Delivery_person">Delivery Person</option>
            <option value="Instructor" selected>Instructor</option>
            <br>
            </select>
            <label for="image">Attach images of your education certificates</label>
            <input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png" required> 
            <input type="submit" name="submit" value="register now" class="btn">
             
        </form>

    </div>
    
</body>
</html>