<?php

include 'config.php';
session_start();
$user_ID = $_SESSION['user_ID'];


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
    <link rel="stylesheet" href="signup.css">
</head>
<body>
    <div class="update_profile">
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

        <form action="" method="POST" enctype="multipart/form-data">
            <div class="flex">
                <div class="inputBox">
                    <span>username :</span>
                    <input type="text" name="update_fname" value="<?php echo $fetch['first_name']?>">
                </div>
            </div>
        </form>
    </div>
    
</body>
</html>