<<<<<<< HEAD:App/views/includes/header.view.php
<html>
<link rel="stylesheet" href="../public/assets/css/curve.css">
=======
<?php
require "../Customer/Auth.php";

?>

<html>
 
>>>>>>> 10fda9860a40eea51fdb9d0d98ed94ed1e7a9c52:includes/header.view.php
<header>

<div class="header">
        <div class="center_wrapper">
            <div class="left_part">
<<<<<<< HEAD:App/views/includes/header.view.php
                <div class="logo">
                    <a href="">
                        <img src="../public/assets/images/logo.svg" alt="">
=======
                <div class="logo_1">
                    <a href="">
                        <img src="../Customer/images/logo.svg" alt="">
>>>>>>> 10fda9860a40eea51fdb9d0d98ed94ed1e7a9c52:includes/header.view.php
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
<<<<<<< HEAD:App/views/includes/header.view.php
            <ul>   
            <li><a href="login" class="">Login</a></li>
=======
            <ul> 
            <?php if(!logged_in()):

                ?>  
               <li><a href="login.view.php" class="">Login</a></li>
            <?php else: ?>
                <div>
                <li><a href="#" class="">Hi,<?= getfname()?></a></li>
                    
                </div>
                <li><a href="Logout.php" class="">Logout</a></li>
            <?php endif; ?>
>>>>>>> 10fda9860a40eea51fdb9d0d98ed94ed1e7a9c52:includes/header.view.php
            <li><a href="" class="">Languages (EN)</a></li>
                
           </ul>
          </div>

</div>
</div>
</header>
<html>