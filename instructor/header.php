<?php
include 'Auth.php';
include 'database.php';

$user_ID = $_SESSION['USER_DATA']['user_id'];
//$user_ID = $_SESSION['user_ID'];
if(!isset($user_ID)){
   header('location:login.view.php');
};

if(isset($_GET['logout'])){
     unset($user_ID);
     session_destroy();
     header('location:login.view.php');
}


$select=mysqli_query($conn,"SELECT * FROM `user` WHERE user_id='$user_ID'") or die('query failed');

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
    <script src="https://kit.fontawesome.com/e32c8f0742.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="images/fontawesome/css/all.css" />
    <link rel="stylesheet" href="header.css">
    
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
                    <div  class="user-pic" >
                        <div class="user_details">
                            <?php
                                if($fetch['image'] == ''){
                                    echo '<img src="images/profilepic_icon.svg" >';
                                }else{
                                    echo '<img src="./images/'.$fetch['image'].'>';
                                }
                            ?>
                            <p><?php echo $fetch['fname']." ".$fetch['lname']; ?></p>
                        </div>
                        <button onclick="toggleMenu()">
                        <span class="fa-solid fa-circle-chevron-down" ></span>
                        </button>
                    </div>
                </div>
                <div class="sub-menu-wrap" id="subMenu">
                    <div class="sub-menu">
                        <div class="user-info">
                        <?php
                                if($fetch['image'] == ''){
                                    echo '<img src="images/profilepic_icon.svg" >';
                                }else{
                                    echo '<img src="./images/'.$fetch['image'].'>';
                                }
                                ?>
                            <p><?php echo $fetch['fname']." ".$fetch['lname']; ?></p>
                        </div>
                        <hr>
                        <a href = "InstructorHome.php" class="sub-menu-link">
                            <i class="fa-solid fa-circle-user" style="font-size:18px;color:#43562B;"></i>
                            <p>My Profile</p>
                            <span>></span>
                        </a>
                        <a href = "instructorHome.php?logout=<?php echo $user_ID; ?>" class="sub-menu-link">
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
                    <button onclick="toggleLan()">
                        <span class="fa-solid fa-caret-down" style="font-size:20px; color:#FFFFFF;"></span>
                    </button>
                    <div class="languages" id="lanList">
                        <a href = "" class="lan-link">
                            <p>English</p>
                        </a>
                        <hr>
                        <a href = "" class="lan-link">
                            <p>Sinhala</p>
                        </a>
                     </div>
                </div>
            </div>
     
    </div>
    </nav>
    <script>
        
        function toggleMenu()
        {
            var subMenu = document.getElementById("subMenu");
            if(subMenu.style.display == "none")
            {
                subMenu.style.display = "block";
            }else{
                subMenu.style.display = "none";
            }
        }
        function toggleLan()
        {
            var languages = document.getElementById("lanList");
            if(languages.style.display == "none")
            {
                languages.style.display = "block";
            }else{
                languages.style.display = "none";
            }
        }


    </script>
</body>
</html>