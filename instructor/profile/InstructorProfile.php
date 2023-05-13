<?php
//including header file to page
include '../includes/header.php';

// get user ID by using session
$user_ID = $_SESSION['USER_DATA']['user_id'];

//there is not passing session value redirect to the login page
if(!isset($user_ID)){
    header('location:../login/login.view.php');
};


// when click on overview button then get the data from database
if(isset($_GET['overview']))
{
   $select1=mysqli_query($conn,"SELECT * FROM `user` WHERE user_id='$user_ID'") or die('query failed');
   if(mysqli_num_rows($select1)>0){

    $fetch= mysqli_fetch_assoc($select1); 
    }

$select2=mysqli_query($conn,"SELECT * FROM `instructor` WHERE user_id='$user_ID'") or die('query failed');

   if(mysqli_num_rows($select2)>0){

    $result= mysqli_fetch_assoc($select2); 
    }


}

//when click on update profile button to update database columns

if(isset($_POST['update_profile'])){

    $update_fname = mysqli_real_escape_string($conn, $_POST['update_first_name']);
    $update_lname = mysqli_real_escape_string($conn, $_POST['update_last_name']);
    $update_cnumber = mysqli_real_escape_string($conn, $_POST['update_cnumber']);
    $update_occupation = mysqli_real_escape_string($conn, $_POST['update_occupation']);
    $update_specialized_area = mysqli_real_escape_string($conn, $_POST['update_specialized_area']);
    $update_education_level = mysqli_real_escape_string($conn, $_POST['update_education_level']);
    $update_image=$_FILES['update_image']['name'];
    $image_size=$_FILES['update_image']['size'];
    $image_tmp_name=$_FILES['update_image']['tmp_name'];
    $image_folder="../images/".$update_image;


// update the user table
    $sql1 = mysqli_query($conn, "UPDATE `user` SET fname='$update_fname' , lname='$update_lname', 
     image='$update_image' WHERE user_id='$user_ID'") or die('query failed');

//update the instructor table
    $sql2 = mysqli_query($conn, "UPDATE `instructor` SET contact_number='$update_cnumber', occupation='$update_occupation', 
    specialized_area='$update_specialized_area', education_level='$update_education_level' WHERE user_id='$user_ID'") or die('query failed');

// when choose the image to update
    if(!empty($update_image)){
        //check the image size
        if($image_size > 2000000){
            $message[] = 'image is too large';
        }else{
            // move the uploaded image to images file
            move_uploaded_file($image_tmp_name, $image_folder);
        }
// when did not choose image to update
    }else{
        $update_image = $image;
    }
// when data pass to database tables(user and instructor)
    if($sql1 && $sql2){
            
        $message[]='update your details successfully!';
    }else{
        $message[]="registered failed!";
    }
        
    
   
}

// when click to change password
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
            mysqli_query($conn, "UPDATE `user` SET password='$confirm_pass' WHERE user_id='$user_ID'") or die ('query failed');
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
    <link rel="stylesheet" href="InstructorProfile.css">
    <title>Instructor Home</title>
    
    
</head>
<body>
    <div class="container">
        <?php include "../includes/instructorMenu.php"; ?>
        <div class="profile">
            <div class="profile-text">
                <h1>Profile</h1>
            </div> 
            <div class="view-wrap"> 
                <div class="profile-image">
                    <div class="image"><?php

                    if($fetch['image'] == ''){
                        echo '<img src="../images/profile-img.jpg" align="middle" width="60%" border-radius:50%>';
                    }else{
                        echo '<img src="../images/'.$fetch['image'].'" align="middle" width="60%" border-radius:50%;>';
                    }
            
                    ?>
                    </div>
                    <h1><?php echo $fetch['role']; ?></h1>
                    <h3><?php echo $fetch['fname']." ".$fetch['lname']; ?></h3>
                   
                    
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
                                        <input type="text" name="user_ID" value="<?php if(isset ($fetch['user_id'])) {echo $fetch['user_id'];}?>" class="box"  readonly><br>
                                        <span>First Name :</span>
                                        <input type="text" name="first_name" value="<?php  if(isset ($fetch['fname'])) {echo $fetch['fname'];}?>" class="box"  readonly><br>
                                        <span>Last Name :</span>
                                        <input type="text" name="last_name" value="<?php if(isset ($fetch['lname'])) {echo $fetch['lname'];}?>" class="box"  readonly><br>
                                        <span>Email :</span>
                                        <input type="text" name="email" value="<?php if(isset ( $fetch['email'])) {echo $fetch['email'];} ?>" class="box"  readonly><br>
                                        <span>Contact Number :</span>
                                        <input type="text" name="cnumber" value="<?php if(isset ($result['contact_number'])){echo $result['contact_number'];}?>" class="box"  readonly><br>
                                        <span>Occupation:</span>
                                        <input type="text" name="occupation" value="<?php if(isset ($result['occupation'])) {echo $result['occupation'];}?>" class="box"  readonly><br>
                                        <span>Specialized Area :</span>
                                        <input type="text" name="specialized_area" value="<?php if(isset ($result['specialized_area'])) {echo $result['specialized_area'];} ?>" class="box"  readonly><br>
                                        <span>Education Level :</span>
                                        <input type="text" name="education_level" value="<?php if(isset ($result['education_level'])) {echo $result['education_level'];}?>" class="box"  readonly><br>
                                        <span>Role :</span>
                                        <input type="text" name="role" value="<?php if(isset ( $fetch['role'])) {echo $fetch['role'];}?>" class="box"  readonly><br>
                            </form>
                        </div>
                        <div class="edit-profile" id="edit-profile">
                        <form action="" method="post" enctype="multipart/form-data"> 
                            
                        
                            <div class="flex">
                                <div class="inputBox">
                                        <span>First Name :</span>
                                        <input type="text" name="update_first_name" value="<?php if(isset ($fetch['fname'])) {echo $fetch['fname'];}?>" class="box">
                                        <span>Last Name :</span>
                                        <input type="text" name="update_last_name" value="<?php if(isset ($fetch['lname'])) {echo $fetch['lname'];}?>" class="box">
                                        <span>update your pic :</span>
                                        <input type="file" name="update_image" value="<?php if(isset ( $fetch['image'])) {echo $fetch['image'];}?>" class="box" accept="image/jpg, image/jpeg, image/png">
                                        <span>Contact Number :</span>
                                        <input type="text" name="update_cnumber" value="<?php if(isset ($result['contact_number'])){echo $result['contact_number'];}?>" class="box">
                                        <span>Occupation:</span>
                                        <input type="text" name="update_occupation" value="<?php if(isset ($result['occupation'])) {echo $result['occupation'];} ?>" class="box">
                                        <span>Specialized Area :</span>
                                        <input type="text" name="update_specialized_area" value="<?php if(isset ($result['specialized_area'])) {echo $result['specialized_area'];}?>" class="box">
                                        <span>Education Level :</span>
                                        <input type="text" name="update_education_level" value="<?php if(isset ($result['education_level'])) {echo $result['education_level'];} ?>" class="box">  
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
                                        <input type="password" name="update_pass" placeholder="enter previous password" class="box"
                                            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                                        <span>New Password :</span>
                                        <input type="password" name="new_pass" placeholder="enter new password" class="box"
                                            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                                        <span>Confirm Password :</span>
                                        <input type="password" name="confirm_pass" placeholder="confirm new password" class="box"
                                            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
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

    <footer>
           <?php include "../includes/footer.php";?>
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