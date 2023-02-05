<?php
include 'config.php';
include 'header.php';



if(!isset($user_ID)){
    header('location:login.php');
};

if(isset($_GET['logout'])){
     unset($user_ID);
     session_destroy();
     header('location:login.php');
}



if(isset($_GET['overview']))
{
   $select=mysqli_query($conn,"SELECT * FROM `instructor` WHERE user_ID='$user_ID'") or die('query failed');

    if(mysqli_num_rows($select)>0){

        $fetch= mysqli_fetch_assoc($select); 
    }
}


if(isset($_POST['update_profile'])){

    $update_fname = mysqli_real_escape_string($conn, $_POST['update_first_name']);
    $update_lname = mysqli_real_escape_string($conn, $_POST['update_last_name']);
    $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);
    $update_cnumber = mysqli_real_escape_string($conn, $_POST['update_cnumber']);
    $update_occupation = mysqli_real_escape_string($conn, $_POST['update_occupation']);
    $update_specialized_area = mysqli_real_escape_string($conn, $_POST['update_specialized_area']);
    $update_education_level = mysqli_real_escape_string($conn, $_POST['update_education_level']);
    $update_image=$_FILES['update_image']['name'];
    $image_size=$_FILES['update_image']['size'];
    $image_tmp_name=$_FILES['update_image']['tmp_name'];
    $image_folder="images/".$update_image;

    $sql = mysqli_query($conn, "UPDATE `instructor` SET first_name='$update_fname' , last_name='$update_lname', 
    email='$update_email' , image='$update_image', contact_number='$update_cnumber', occupation='$update_occupation', 
    specialized_area='$update_specialized_area', education_level='$update_education_level' 
    WHERE user_ID='$user_ID'") or die('query failed');


    if(!empty($update_image)){
        if($image_size > 2000000){
            $message[] = 'image is too large';
        }else{
            move_uploaded_file($image_tmp_name, $image_folder);
        }
    }else{
        $update_image = $image;
    }

    if($sql){
            
        $message[]='update your details successfully!';
    }else{
        $message[]="registered failed!";
    }
        
    
   
}

if(isset($_POST['change_password'])){

    $old_pass = $_POST['old_pass'];
    $update_pass = mysqli_real_escape_string($conn,md5($_POST['update_pass']));
    $new_pass = mysqli_real_escape_string($conn,md5($_POST['new_pass']));
    $confirm_pass = mysqli_real_escape_string($conn,md5($_POST['confirm_pass']));

    if(!empty($update_pass) || !empty($new_pass) || !empty($confirm_pass))
    {
        if($update_pass != $old_pass){
            $message[]="old password not matched!";
           
        }elseif($new_pass != $confirm_pass){
            $message[]="confirm password is not matched!";
            echo"<script>alert('confirm password is not matched!')</script>";
        }else{
            mysqli_query($conn, "UPDATE `instructor` SET password='$confirm_pass' WHERE user_ID='$user_ID'") or die ('query failed');
            $message[]="password updated successfully!";
            echo"<script>alert('password updated successfully!');</script>";
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
    <link rel="stylesheet" href="InstructorHome.css">
    <title>Instructor Home</title>
    
    
</head>
<body>
    <div class="container">
    <div class="left_menu_bar">
            <div id="menu">
                <a><i class="fa-solid fa-bars" style="font-size:20px;color:#43562B;"></i></a>
                <div class="image"><img src="images/badge.svg" alt=""></div>
                <h3>Leafy</h3>
            </div>
            <ul>
                <li><a href=""><i class="fa-solid fa-gauge-high" style="font-size:18px;color:#43562B;"></i>Dashboard</a></li>
                <li><a href=""><i class="fa-solid fa-house" style="font-size:18px;color:#43562B;"></i>Home</a></li>
                <li><a href=""><i class="fa-solid fa-comments" style="font-size:17px;color:#43562B;"></i>Questions</a></li>
                <li><a href="blog.php"><i class="fa-brands fa-blogger" style="font-size:20px;color:#43562B;"></i>Blogs</a></li>
                <li><a href=""><i class="fa-brands fa-readme" style="font-size:18px;color:#43562B;"></i>Courses</a></li>
 

            </ul>

    </div>
        <div class="profile">
            <div class="profile-text">
                <h1>Profile</h1>
            </div> 
            <div class="view-wrap"> 
                <div class="profile-image">
                    <div class="image"><?php

                    if($fetch['image'] == ''){
                        echo '<img src="images/profile-img.jpg" align="middle" width="100%" border-radius:50%>';
                    }else{
                        echo '<img src="./images/'.$fetch['image'].'" align="middle" width="100%" border-radius:50%;>';
                    }
            
                    ?>
                    </div>
                    <h3><?php echo $fetch['first_name']." ".$fetch['last_name']; ?></h3>
                    
                </div>
                <div class="view">
                   <div class="btn-section">
                        <button href="InstructorHome.php" class="view-btn" id="view-btn">overview</button>
                        <button href="update_profile.php" class="update-btn" id="update-btn">update profile</button>
                        <button href="update_profile.php" class="password-btn" id="password-btn">change password</button>
                   </div>
                    <div class="block">
                            <?php
                                if(isset($message)){
                                    foreach($message as $message){
                                        ?>
                                        <div class="message"> 
                                            <p><?php  echo $message;?></p>
                                            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                                        </div>
                                        
                            <?php
                                    }
                                }
                            ?>
                        <div class="view-div" id="view-div">
                            <form action="" method="post" enctype="multipart/form-data">
                                        <span>User ID :</span>
                                        <input type="text" name="user_ID" value="<?php echo $fetch['user_ID']?>" class="box"  readonly><br>
                                        <span>First Name :</span>
                                        <input type="text" name="first_name" value="<?php echo $fetch['first_name']?>" class="box"  readonly><br>
                                        <span>Last Name :</span>
                                        <input type="text" name="last_name" value="<?php echo $fetch['last_name']?>" class="box"  readonly><br>
                                        <span>Email :</span>
                                        <input type="text" name="email" value="<?php echo $fetch['email']?>" class="box"  readonly><br>
                                        <span>Contact Number :</span>
                                        <input type="text" name="cnumber" value="<?php echo $fetch['contact_number']?>" class="box"  readonly><br>
                                        <span>Occupation:</span>
                                        <input type="text" name="occupation" value="<?php echo $fetch['occupation']?>" class="box"  readonly><br>
                                        <span>Specialized Area :</span>
                                        <input type="text" name="specialized_area" value="<?php echo $fetch['specialized_area']?>" class="box"  readonly><br>
                                        <span>Education Level :</span>
                                        <input type="text" name="education_level" value="<?php echo $fetch['education_level']?>" class="box"  readonly><br>
                                        <span>Role :</span>
                                        <input type="text" name="role" value="<?php echo $fetch['role']?>" class="box"  readonly><br>
                            </form>
                        </div>
                        <div class="edit-profile" id="edit-profile">
                        <form action="" method="post" enctype="multipart/form-data"> 
                            
                        
                            <div class="flex">
                                <div class="inputBox">
                                        <span>First Name :</span>
                                        <input type="text" name="update_first_name" value="<?php echo $fetch['first_name']?>" class="box">
                                        <span>Last Name :</span>
                                        <input type="text" name="update_last_name" value="<?php echo $fetch['last_name']?>" class="box">
                                        <span>Email :</span>
                                        <input type="text" name="update_email" value="<?php echo $fetch['email']?>" class="box">
                                        <span>update your pic :</span>
                                        <input type="file" name="update_image" value="<?php echo $fetch['image']?>" class="box" accept="image/jpg, image/jpeg, image/png">
                                        <span>Contact Number :</span>
                                        <input type="text" name="update_cnumber" value="<?php echo $fetch['contact_number']?>" class="box">
                                        <span>Occupation:</span>
                                        <input type="text" name="update_occupation" value="<?php echo $fetch['occupation']?>" class="box">
                                        <span>Specialized Area :</span>
                                        <input type="text" name="update_specialized_area" value="<?php echo $fetch['specialized_area']?>" class="box">
                                        <span>Education Level :</span>
                                        <input type="text" name="update_education_level" value="<?php echo $fetch['education_level']?>" class="box">  
                                </div> 
                                <input type="submit" value="update profile" name="update_profile" class="btn">
                                <!--<a href="InstructorHome.php" class="btn">go back</a> -->
                            </div> 
                            </form>
                        </div>
                        <div class="change-password" id="change-password">
                      
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="flex">
                                    <div class="inputBox">
                                        <input type="hidden" name="old_pass" value="<?php echo $fetch['password']?>" class="box">
                                        <span>Old Password :</span>
                                        <input type="password" name="update_pass" placeholder="enter previous password" class="box">
                                        <span>New Password :</span>
                                        <input type="password" name="new_pass" placeholder="enter new password" class="box">
                                        <span>Confirm Password :</span>
                                        <input type="password" name="confirm_pass" placeholder="confirm new password" class="box">
                                    </div>
                                    <input type="submit" value="change password" name="change_password" class="btn">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

      
      
    <footer style="background:url(images/footerFinal.svg)no-repeat;">
        <ul class="footer">
            <li><a href=""><i class="fa-brands fa-facebook" style="font-size:30px;color:#FCFEF9;"></i></a></li>
            <li><a href=""><i class="fa-brands fa-instagram" style="font-size:30px;color:#FCFEF9;"></i></a></li>
            <li><a href=""><i class="fa-solid fa-envelope" style="font-size:30px;color:#FCFEF9;"></i></a></li>
        </ul>
        <div class="footer-copyright">
            <p>copyright @2022 Leafy All Rights Reserved</p>
        </div>

    </footer>
    <script>
        var view_div = document.getElementById("view-div");
        var edit_profile = document.getElementById("edit-profile");
        var change_password = document.getElementById("change-password");
        var view_btn = document.getElementById("view-btn");
        var update_btn = document.getElementById("update-btn");
        var password_btn = document.getElementById("password-btn");

        view_btn.addEventListener('click', ()=>{
            view_div.style.display ='block';
            edit_profile.style.display ='none';
            change_password.style.display ='none';
        });

        update_btn.addEventListener('click', ()=>{
            edit_profile.style.display ='block';
            view_div.style.display ='none';
            change_password.style.display ='none';
        });

        password_btn.addEventListener('click', ()=>{
            change_password.style.display ='block';
            view_div.style.display ='none';
            edit_profile.style.display ='none';
        });
    
    
    
    </script>
</body>
</html>