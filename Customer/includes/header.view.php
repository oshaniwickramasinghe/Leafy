<?php
include "database.php";
?>

<html>
<link rel="stylesheet" href="../CSS/style.css">


<div class="header">
        <div class="center_wrapper">
            <div class="left_part">
                <div class="logo_1">
                    
                        <img src="images/logo.svg"  height= "95.42px" >
                      
                   
                </div>
                <div class="menu">
                    <ul>
                        <li>
                            <a href="customerhome.php" class="">Home</a>
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
            <ul> 
           

               <div class="profile_icon">
                    <div  class="user-pic" >
                        <div class="user_details">
                        <?php if(logged_in()){
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
                            <img src="images/profilepic_icon.svg"  >
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
                            <img src="images/profilepic_icon.svg" alt=""  height= "100.42px">
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
  <div class  = "lan">
            <a href="" class="">Languages (EN)</a>
            </div>
            <?php }else{ ?>
                <li><a href="../Customer/Login.view.php" class="">Login</a></li>
                <div class  = "language">
            <a href="" class="">Languages (EN)</a>
            </div>
            <?php } ?>
          
            
            <!-- <li><a href="../Customer/Login.view.php" class="">Login</a></li> -->      
           </ul> 
          
           </div> 
          
        </div>          
</div>



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
<html>