<?php

$role = $_SESSION['USER_DATA']['role'];

?>

<html>
<link rel="stylesheet" href="../Customer/CSS/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" 
 integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" 
 referrerpolicy="no-referrer" />

<header>
<div class="header">

        <div class="center_wrapper">
            <div class="left_part">
                <div class="logo_1">
                        <img src="/leafy-main/customer/images/logo.svg"  height= "95.42px "  >

                </div>
                <div class="menu">
                    <?php if($role == "customer"){?>
                    <ul>
                        <li>
                            <a href="/leafy-main/customer/customerhome.php" class="">Home</a>
                        </li>
                        <li>
                            <a href="/leafy-main/instructor/Blog/theBlog.php" class="">Blogs</a>
                        </li>
                        <li>
                            <a href="/leafy-main/instructor/course/theCourse.php" class="">Courses</a>
                        </li>
                        
                    </ul> 
                    <?php }else if($role == "Agriculturalist"){ ?>
                        <ul>
                        <li>
                            <a href="/leafy-main/agriculturalist/landing.php" class="">Home</a>
                        </li>
                        <li>
                            <a href="/leafy-main/instructor/Blog/theBlog.php" class="">Blogs</a>
                        </li>
                        <li>
                            <a href="/leafy-main/instructor/course/theCourse.php" class="">Courses</a>
                        </li>
                        
                    </ul> 
                   <?php }else if($role == "Instructor"){?>
                    <ul>
                        <li>
                            <a href="/leafy-main/instructor/dashboard/InsDashboard.php" class="">Home</a>
                        </li>
                        <li>
                            <a href="/leafy-main/instructor/Blog/theBlog.php" class="">Blogs</a>
                        </li>
                        <li>
                            <a href="/leafy-main/instructor/course/theCourse.php" class="">Courses</a>
                        </li>
                        
                    </ul> 

                    <?php } ?>

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
   <!-- fetch the profile image -->
                            <?php
                                if($fetch['image'] == ''){
                                    echo '<img src="/leafy-main/customer/images/profilepic_icon.svg"  height= "21.42px">';
                                }else{
                                    echo '<img src="/leafy-main/instructor/images/'.$fetch['image'].'"   width= "60px" >';
                                }
                            ?>
                            <p><?php echo $fetch['fname']; ?></p>
                        </div>
                        <button onclick="toggleMenu()">
                        <span class="fa-solid fa-circle-chevron-down"  ></span>
                        </button>
                    </div>
                </div>
                <div class="sub-menu-wrap" id="subMenu">
                    <div class="sub-menu">
                        <div class="user-info">
                            <img src="/leafy-main/customer/images/profilepic_icon.svg" alt=""  height= "100.42px">
                            <p><?php echo $fetch['fname']; ?></p>
                        </div>
                        <hr>
                        <a href = "/leafy-main/instructor/profile/InstructorProfile.php" class="sub-menu-link">
                            <i class="fa-solid fa-circle-user" style="font-size:16px;color:#43562B;"></i>
                            <p>My Profile</p>
                            <span>></span>
                        </a>
                        <a href = "/leafy-main/customer/login/Logout.php" class="sub-menu-link">
                            <i class="fa-solid fa-right-from-bracket" style="font-size:16px;color:#43562B;"></i>
                            <p>Logout</p>
                            <span>></span>
                        </a>

                    </div>

                </div> 
                <div class  = "lan">
                <div class="translate">
            <div id="google_translate_element"></div></div>
<script type="text/javascript">
function googleTranslateElementInit() {
    new google.translate.TranslateElement({pageLanguage: 'en' , includedLanguages : 'si,en,EN'}, 'google_translate_element');
  }
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

            </div>
            <?php }else{ ?>

                <div class="login">
                <li><a href="/leafy-main/customer/login/Login.view.php">Login</a></li>
                </div>
                <div class  = "language">
            <a href="" class="">Languages (EN)</a>
            </div>
            <?php } ?>

           </ul>

           </div>
        </div>          
</div>
 </header>


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