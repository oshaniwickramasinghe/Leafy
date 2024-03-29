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
    <link rel="stylesheet" href="../profile.css">
    <link rel="stylesheet" href="../../public/CSS/style.css">
    <!-- <link rel="stylesheet" href="../../instructor/profile/InstructorProfile.css"> -->
    <title>Admin view for profile</title>
    
    
</head>
<body>
<?php include "AdminUsersPHP.php"?>
<?php include "../menu/admin_menu.view.php"?>

    <div class="container">
    <div class="top"> 
        <div class="profile">
        <div class = "home_body">
                    <div class="main_wrapper">
            <div class="profile-text">
                <h1>Profile</h1>
            </div> 
            <div class="view-wrap"> 
                <div class="profile-image">
                    <div class="image"><?php

                    if($fetch['image'] == ''){
                        echo '<img src="../images/profile-img.jpg" align="middle" width="60%" border-radius:50%>';
                    }else{
                        echo '<img src="../images/'.$fetch['image'].'" align="middle" width="60%" border-radius:50%;>';
                    }
            
                    ?>
                    </div>
                    <h1><?php echo $fetch['role']; ?></h1>
                    <h3><?php echo $fetch['fname']." ".$fetch['lname']; ?></h3>
                   
                    
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
            <input type="text" name="last_name" value="<?=$last_name ?>" class="box"  readonly><br>
            <span>Email :</span><br>
            <input type="text" name="last_name" value="<?=$email ?>" class="box"  readonly><br>
            <span>Role :</span><br>
            <input type="text" name="email" value="<?=$role ?>" class="box"  readonly><br>
            
            <?php 
                if($role=='customer')
                {
                    ?>
                    <span>Contact Number :</span>
                    <input type="text" name="contact_no" value="<?=$contact_no ?>" class="box"  readonly><br>
                    <span>district:</span><br>
                    <input type="text" name="district" value="<?=$district ?>" class="box"  readonly><br>
                    <span>address1 :</span>
                    <input type="text" name="address1" value="<?=$address1 ?>" class="box"  readonly><br>
                    <span>address2 :</span>
                    <input type="text" name="address2" value="<?=$address2 ?>" class="box"  readonly><br>
                    
                    <?php   
                }
            ?>

            <?php 
                if($role=='agriculturalist')
                {
                    ?>
                    <span>district:</span><br>
                    <input type="text" name="district" value="<?=$district ?>" class="box"  readonly><br>
                    <span>address1 :</span>
                    <input type="text" name="address1" value="<?=$address1 ?>" class="box"  readonly><br>
                    <span>address2 :</span>
                    <input type="text" name="address2" value="<?=$address2 ?>" class="box"  readonly><br>
                    <span>Rate :</span>
                    <input type="text" name="rate" value="<?=$rate ?>" class="box"  readonly><br>
                <?php   
                }
            ?>           

            <?php 
                if($role=='instructor')
                {
                    ?>
                    <span>Occupation :</span>
                    <input type="text" name="occupation" value="<?=$occupation ?>" class="box"  readonly><br>
                    <span>Education Level:</span><br>
                    <input type="text" name="education" value="<?=$education_level ?>" class="box"  readonly><br>
                    <span>Specialized area :</span>
                    <input type="text" name="Specialization" value="<?=$specialized_area ?>" class="box"  readonly><br>
                    <span>Contact Number :</span>
                    <input type="text" name="contact_no" value="<?=$contact_number ?>" class="box"  readonly><br>
                    
                    <?php   
                }
            ?>

            <?php 
                if($role=='Delivery Agent')
                {
                    ?>
                    <span>Location :</span>
                    <input type="text" name="location" value="<?=$location ?>" class="box"  readonly><br>
                    <span>License Number:</span><br>
                    <input type="text" name="license_number" value="<?=$license_no ?>" class="box"  readonly><br>
                    
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
        </div>
            </div>
    </div>

    <footer>
           <?php include "../includes/footer.php";?>
    </footer>
    
    <script>
        var view_div = document.getElementById("view-div");
        var edit_profile = document.getElementById("edit-profile");
        var change_password = document.getElementById("change-password");
        var view_btn = document.getElementById("view-btn");
        var update_btn = document.getElementById("update-btn");
        var password_btn = document.getElementById("password-btn");

        view_btn.addEventListener('click', ()=>{
            view_div.style.display ='block';
            edit_profile.style.display ='none';
            change_password.style.display ='none';
        });    
    
    
    </script>
</body>
</html>