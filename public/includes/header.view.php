<<<<<<< HEAD
<html>
<link rel="stylesheet" href="../CSS/style.css">
=======

<html>
<link rel="stylesheet" href="CSS/style.css">

<?php

?>

<html>
 
>>>>>>> cca0ba5fc2051c7357f3b0f3d61202676e1dc585
<header>

<div class="header">
        <div class="center_wrapper">
            <div class="left_part">
<<<<<<< HEAD
                <div class="logo">
                    <a href="">
                        <img src="../public/images/logo.svg" alt="">

                <div class="logo_1">
                    <a href="">
                        <img src="../Customer/images/logo.svg" alt="">

                    </a>
=======
                <div class="logo_1">
                    
                <img src="../public/images/logo.svg"  height= "200px" >
                      
                   
>>>>>>> cca0ba5fc2051c7357f3b0f3d61202676e1dc585
                </div>
                <div class="menu">
                    <ul>
                        <li>
                            <a href="#home" class="">Home</a>
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
<<<<<<< HEAD
            <ul>   
            <li><a href="login" class="">Login</a></li>

=======
>>>>>>> cca0ba5fc2051c7357f3b0f3d61202676e1dc585
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
<<<<<<< HEAD

=======
>>>>>>> cca0ba5fc2051c7357f3b0f3d61202676e1dc585
            <li><a href="" class="">Languages (EN)</a></li>
                
           </ul>
          </div>

</div>
</div>
</header>
<html>