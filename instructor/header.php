<?php
include 'Auth.php';
include 'database.php';

$user_ID = $_SESSION['USER_DATA']['user_id'];
//$user_ID = $_SESSION['user_ID'];
if(!isset($user_ID)){
   header('location:login.php');
};

if(isset($_GET['logout'])){
     unset($user_ID);
     session_destroy();
     header('location:login.php');
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

    
</head>
<body>
    <nav>
    <div class="header">
        <div class="center_wrapper">
            <div class="left_part">
                <div class="logo">
                    <a href="">
                    <img src="../../Customer/images/logo.svg"  height= "121.42px" >
                    </a>
                </div>
                <div class="menu">
                    <ul>
                        <li>
                            <a href="#home" >Home</a>
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
                        <?php if(logged_in()):
$user_ID = $_SESSION['USER_DATA']['user_id'];
// if(!isset($user_ID)){
//     header('location:login.php');
// };

// if(isset($_GET['logout'])){
//      unset($user_ID);
//      session_destroy();
//      header('location:../Customer/home.view.php');
// }


$select=mysqli_query($conn,"SELECT * FROM user WHERE user_ID='$user_ID'") or die('query failed');

if(mysqli_num_rows($select)>0){
    $fetch= mysqli_fetch_assoc($select);
}
?>  
                            <img src="images/profilepic_icon.svg" alt="" height= "21.42px">
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
                            <img src="images/profilepic_icon.svg" alt="">
                            <p><?php echo $fetch['fname']." ".$fetch['lname']; ?></p>
                        </div>
                        <hr>
                        <a href = "InstructorHome.php" class="sub-menu-link">
                            <i class="fa-solid fa-circle-user" style="font-size:18px;color:#43562B;"></i>
                            <p>My Profile</p>
                            <span>></span>
                        </a>
                        <a href = "../Customer/Logout.php" class="sub-menu-link">
                            <i class="fa-solid fa-right-from-bracket" style="font-size:18px;color:#43562B;"></i>
                            <p>Logout</p>
                            <span>></span>
                        </a>
                
                        
                    </div>
                    
                </div>

               
            </div>
        </div>
        <?php else: ?>
            <li><a href="../Customer/Login.view.php" class="">Login</a></li>

            <?php endif; ?>
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
    </script>
</body>
</html>