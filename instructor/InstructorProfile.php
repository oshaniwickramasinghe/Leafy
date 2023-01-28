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

?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instructor Home</title>
    
    <link rel="stylesheet" href="InstructorHome.css">
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
                    <?php
                    $select=mysqli_query($conn,"SELECT * FROM `instructor` WHERE user_ID='$user_ID'")
                    or die('query failed');

                    if(mysqli_num_rows($select)>0){
                        $fetch= mysqli_fetch_assoc($select);
                    }
                    if($fetch['image'] == ''){
                        echo '<img src="images/profile-img.jpg">';
                    }else{
                        echo '<img src="uploaded_img/'.$fetch['image'].'">';
                    }
            
                    ?>
                    <h3><?php echo $fetch['first_name']." ".$fetch['last_name']; ?></h3>
                </div>
                <div class="view">
                   <div class="btn-section">
                        <button href="InstructorHome.php" class="view-btn" id="view-btn">overview</button>
                        <button href="update_profile.php" class="update-btn" id="update-btn">update profile</button>
                        <button href="update_profile.php" class="password-btn" id="password-btn">change password</button>
                   </div>
                    <div class="block">
                        <div class="view-div" id="view-div"></div>
                        <div class="edit-profile" id="edit-profile"></div>
                        <div class="change-password" id="change-password"></div>
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