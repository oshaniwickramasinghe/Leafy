<<<<<<< HEAD:includes/header.view.php

<html>
<link rel="stylesheet" href="CSS/style.css">

=======
>>>>>>> 5513fdc1da9bd97508fa236930afc30427686be7:public/includes/header.view.php
<?php

?>

<html>
 
<<<<<<< HEAD:includes/header.view.php

=======
>>>>>>> 5513fdc1da9bd97508fa236930afc30427686be7:public/includes/header.view.php
<header>

<div class="header">
        <div class="center_wrapper">
            <div class="left_part">
<<<<<<< HEAD:includes/header.view.php

                <div class="logo">
                    <a href="">
                        <img src="../public/assets/images/logo.svg" alt="">

                <div class="logo_1">
                    <a href="">
                        <img src="../Customer/images/logo.svg" alt="">

                    </a>
=======
                <div class="logo_1">
                    
                        <img src="images/logo.svg"  height= "121.42px" >
                      
                   
>>>>>>> 5513fdc1da9bd97508fa236930afc30427686be7:public/includes/header.view.php
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
<<<<<<< HEAD:includes/header.view.php

            <ul>   
            <li><a href="login" class="">Login</a></li>

=======
>>>>>>> 5513fdc1da9bd97508fa236930afc30427686be7:public/includes/header.view.php
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
<<<<<<< HEAD:includes/header.view.php

=======
>>>>>>> 5513fdc1da9bd97508fa236930afc30427686be7:public/includes/header.view.php
            <li><a href="" class="">Languages (EN)</a></li>
                
           </ul>
          </div>

</div>
</div>
</header>
<html>