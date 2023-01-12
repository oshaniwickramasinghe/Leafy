<html>
<link rel="stylesheet" href="../public/assets/css/curve.css">
<title>
    <?=ucfirst(App::$page)?>
</title>   
<header>

<div class="header">
        <div class="center_wrapper">
            <div class="left_part">
                <div class="logo_1">
                    <a href="">
                        <img src="../public/assets/images/logo.svg" alt="">
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
            <ul> 
            <?php if(!Auth::logged_in()):?>  
               <li><a href="login" class="">Login</a></li>
            <?php else: ?>
                <div>
                <li><a href="#" class="">Hi,<?=Auth::getfname()?></a></li>
                    
                </div>
                <li><a href="logout" class="">Logout</a></li>
            <?php endif; ?>
            <li><a href="" class="">Languages (EN)</a></li>
                
           </ul>
          </div>

</div>
</div>
</header>
<html>
