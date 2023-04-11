<?php 

require "../../database/database.php";
require "../../public/Auth.php";
include "../../public/includes/header.view.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../notification.css">
    <link rel="stylesheet" href="../../public/CSS/style.css"> 
    <title>User Details</title>
    
    
</head>
<body>
<?php include "AdminUsersPHP.php"?>
<?php include "../menu/admin_menu.view.php"?>


<!-- <div class = "loggedhome_body">  -->

    <!-- <div class = "home_body">  -->
    <!-- <div class="container"> -->

    <div class="top">
        
    <div class="profile">
            <div class="profile-text">
                <h1>Profile</h1>
            </div> 
            <div class="view-wrap"> 
                <div class="profile-image">
                    <!-- <div class="image">
                    <?php

                    // if($fetch['image'] == ''){
                    //     echo '<img src="images/profile-img.jpg" align="middle" width="100%" border-radius:50%>';
                    // }else{
                    //     echo '<img src="./images/'.$fetch['image'].'" align="middle" width="100%" border-radius:50%;>';
                    // }
            
                    ?> -->
                    <!--</div> -->
                    <!--<h3><?php //echo $fetch['first_name']." ".$fetch['last_name']; ?></h3>-->
                    
                </div>
                <div class="view">
                   
                    <div class="block">
                    <?php
                                if(isset($message)){
                                    foreach($message as $message){
                                        ?>
                                        <div class="message"> 
                                            <p><?php  echo $message;?></p>
                                            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                                        </div>
                                        
                            <?php
                                    }
                                }
                            ?>
                        <div class="view-div" id="view-div">
                            <form action="" method="post" enctype="multipart/form-data">
                                        <span>User ID :</span>
                                        <input type="text" name="user_ID" value="<?=$user_id ?>" class="box" readonly><br>
                                        <span>First Name :</span>
                                        <input type="text" name="first_name" value="<?=$first_name ?>" class="box"  readonly><br>
                                        <span>Last Name :</span>
                                        <input type="text" name="last_name" value="<?=$ ?>" class="box"  readonly><br>
                                        <span>Email :</span><br>
                                        <input type="text" name="last_name" value="<?=$email ?>" class="box"  readonly><br>
                                        <span>Role :</span><br>
                                        <input type="text" name="email" value="<?=$role ?>" class="box"  readonly><br>
                                        
                                        <?php 
                                            if($role=='agriculturalist')
                                            {
                                                ?>
                                                agri part
                                                <span>Contact Number :</span>
                                                <input type="text" name="contact_no" value="<?=$address1agri ?>" class="box"  readonly><br>
                                                <span>district:</span><br>
                                                <input type="text" name="district" value="<?=$districtagri ?>" class="box"  readonly><br>
                                                <span>address1 :</span>
                                                <input type="text" name="address1" value="<?=$ ?>" class="box"  readonly><br>
                                                <span>address2 :</span>
                                                <input type="text" name="address2" value="<?=$ ?>" class="box"  readonly><br>
                                                <span>Rate :</span>
                                                <input type="text" name="rate" value="<?=$ ?>" class="box"  readonly><br>
                                             <?php   
                                            }
                                        ?>

                                        <?php 
                                            if($role=='customer')
                                            {
                                                ?>
                                                cust part
                                                <span>Contact Number :</span>
                                                <input type="text" name="contact_no" value="<?=$contact_no ?>" class="box"  readonly><br>
                                                <span>district:</span><br>
                                                <input type="text" name="district" value="<?=$district ?>" class="box"  readonly><br>
                                                <span>address1 :</span>
                                                <input type="text" name="address1" value="<?=$address1 ?>" class="box"  readonly><br>
                                                <span>address2 :</span>
                                                <input type="text" name="address1" value="<?=$address1 ?>" class="box"  readonly><br>
                                                
                                                <?php   
                                            }
                                        ?>

                                        <?php 
                                            if($role=='instructor')
                                            {
                                                ?>
                                                inst part
                                                <span>Occupation :</span>
                                                <input type="text" name="occupation" value="<?=$ ?>" class="box"  readonly><br>
                                                <span>Education Level:</span><br>
                                                <input type="text" name="education" value="<?=$ ?>" class="box"  readonly><br>
                                                <span>Specialized area :</span>
                                                <input type="text" name="Specialization" value="<?=$ ?>" class="box"  readonly><br>
                                                <span>Contact Number :</span>
                                                <input type="text" name="contact_no" value="<?=$ ?>" class="box"  readonly><br>
                                                
                                                <?php   
                                            }
                                        ?>

                                        <?php 
                                            if($role=='instructor')
                                            {
                                                ?>
                                                deli part
                                                <span>Location :</span>
                                                <input type="text" name="location" value="<?=$ ?>" class="box"  readonly><br>
                                                <span>License Number:</span><br>
                                                <input type="text" name="license_number" value="<?=$ ?>" class="box"  readonly><br>
                                                
                                                <?php   
                                            }
                                        ?>
                                        
                                        
                            </form>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        </div>
    


    <!-- </div>  -->
                            
     <!-- </div>  -->
<!-- </div>  -->
      
</body>
</html>
