<?php
include 'config.php';
session_start();
$user_ID = $_SESSION['user_ID'];

if(!isset($user_ID)){
    header('location:login.php');
};

if(isset($_GET['logout'])){
     unset($user_ID);
     session_destroy();
     header('location:login.php');
}

?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instructor Home</title>
    <link rel="stylesheet" href="signup.css">
</head>
<body>
    <div class="container">
        <div class="profile">
            <?php
                $select=mysqli_query($conn,"SELECT * FROM `instructor` WHERE user_ID='$user_ID'")
                or die('query failed');

                if(mysqli_num_rows($select)>0){
                    $fetch= mysqli_fetch_assoc($select);
                }
                if($fetch['image'] == ''){
                    echo '<img src="images/default-avatar.png">';
                }else{
                    echo '<img src="uploaded_img/'.$fetch['image'].'">';
                }
            
            ?>
            <h3><?php echo $fetch['first_name']." ".$fetch['last_name']; ?></h3>
            <a href="update_profile.php" class="btn">update profile</a>
            <a href="instructorHome.php?logout=<?php echo $user_ID; ?>" class="delete-btn">logout</a>
            <p>new <a href="login.php">login</a> or <a href="signup.php">register</a></p>
    </div>
    
</body>
</html>