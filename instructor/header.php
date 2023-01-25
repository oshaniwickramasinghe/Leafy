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


$select=mysqli_query($conn,"SELECT * FROM `instructor` WHERE user_ID='$user_ID'") or die('query failed');

if(mysqli_num_rows($select)>0){
    $fetch= mysqli_fetch_assoc($select);
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="home.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
    <nav>
    <div style="background:url(images/header7.svg)no-repeat;"class="header">
        <div class="center_wrapper">
            <div class="left_part">
                <div class="logo">
                    <a href="">
                        <img src="images/logo.svg" alt="">
                    </a>
                </div>
                <div class="menu">
                    <ul>
                        <li>
                            <a href="#home" class="active">Home</a>
                        </li>
                        <li>
                            <a href="#blogs" class="">Blogs</a>
                        </li>
                        <li>
                            <a href="#courses" class="">Courses</a>
                        </li>
                        <li>
                            <a href="#contact" class="">Contact</a>
                        </li>
                    </ul> 
                </div>
            </div>
            <div class="right_part">
                <div class="profile_icon">
                    <label for="" class="button">
                    <a href="#" class="user-pic" onclick="toggleMenu()">
                        <img src="images/profilepic_icon.svg" alt="">
                        <p><?php echo $fetch['first_name']." ".$fetch['last_name']; ?></p>
                    </a>
                    <span class="fa-solid fa-circle-chevron-down"></span>
                    </label>
                    <i class="fa-solid fa-right-from-bracket" style="font-size:18px;color:#43562B;"></i>
                </div>
                <div class="sub-menu-wrap" id="subMenu">
                    <div class="sub-menu">
                        <div class="user-info">
                            <img src="images/profilepic_icon.svg" alt="">
                            <p><?php echo $fetch['first_name']." ".$fetch['last_name']; ?></p>
                        </div>
                        <hr>
                        <a href = "InstructorHome.php" class="sub-menu-link">
                            <i class="fa-solid fa-circle-user" style="font-size:18px;color:#43562B;"></i>
                            <p>My Profile</p>
                            <span>></span>
                        </a>
                        <a href = "InstructorHome.php" class="sub-menu-link">
                            <i class="fa-solid fa-right-from-bracket" style="font-size:18px;color:#43562B;"></i>
                            <p>Logout</p>
                            <span>></span>
                        </a>
                        <a href = "InstructorHome.php" class="sub-menu-link">
                            <i class="fa-solid fa-bell" style="font-size:18px;color:#43562B;"></i>
                            <p>Notifications</p>
                            <span>></span>
                        </a>
                        
                    </div>
                    
                </div>

                <div class="language">
                    <a href="" class="">Languages (EN)</a>
                </div>
            </div>
        </div>
     
    </div>
    </nav>
    <script>
        let subMenu = documrnt.getElementById("subMenu");

        function toggleMenu()
        {
            subMenu.classList.toggle("open-menu");
        }
    </script>
</body>
</html>