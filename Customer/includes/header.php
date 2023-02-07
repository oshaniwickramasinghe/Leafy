
<html>
<link rel="stylesheet" href="../CSS/style.css">
<header>

<div class="header">
        <div class="center_wrapper">
            <div class="left_part">
                <div class="logo_1">
                    
                        <img src="../images/logo.svg"  height= "121.42px" > 
                      
                   
                </div>
                <div class="menu">
                    <ul>
                        <li>
                            <a href="../customerhome.php" class="">Home</a>
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
            <?php if(!logged_in()):

                ?>  
               <li><a href="../Login.view.php" class="">Login</a></li>
            <?php else: ?>
                <div>
                <li><a href="#" class="">Hi,<?= getfname()?></a></li>
                    
                </div>
                <li><a href="../Logout.php" class="">Logout</a></li>
            <?php endif; ?>
            <li><a href="" class="">Languages (EN)</a></li>
                
           </ul>
          </div>

</div>
</div>
</header>
<html>