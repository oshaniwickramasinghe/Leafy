<?php
include'config.php';
session_start();

if(isset($_POST['submit'])){
   
    $email= mysqli_real_escape_string($conn,$_POST['email']);
    $password= mysqli_real_escape_string($conn,md5($_POST['password']));

    $select=mysqli_query($conn,"SELECT * FROM instructor WHERE email='$email' AND password='$password'")or die('query failed');

    if(mysqli_num_rows($select)>0){
        $row= mysqli_fetch_assoc($select);
        $_SESSION['user_id']=$row['id'];
        header('location:instructorHome.php');
    
    }else{
        $message[]='incorrect email or password!';
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="signup.css">
</head>
<body>
    <div class="form-container">
        <form action="" method="POST" enctype="multipart/form-data">
            <h1>Login now</h1>
            <?php
                if(isset($message)){
                    foreach($message as $message){
                        echo '<div class="message">'.$message.'</div>';
                    }
                }
            ?>
            <p>Don't have an account?<a href="signup.php">register now</a></p>
            
            <label for="email">Email</label>
            <input type="text" name="email" placeholder="Enter your email" class="box" required>
            <label for="password">Password</label>
            <input type="password" name="password" placeholder="enter password" class="box" required>
            <input type="submit" name="submit" value="login now" class="btn">
             
        </form>

    </div>
</body>
</html>