<?php 

require "../../database/database.php";
require "../../public/Auth.php";
include "../../public/includes/header.view.php";

?>


<?php   

    if(isset($_GET['deleteUID']))
    {

        $user_id = $_GET['deleteUID'];
        $sql2 = "UPDATE user SET is_active=2 WHERE user_id=$user_id";
        $result2=mysqli_query($conn,$sql2);

        echo "<script>window.location.href = '../../admin/Admin_Notifications/AdminNotification.php';</script>";

    }


    if(isset($_GET['acceptUID']))
    {

        $user_id = $_GET['acceptUID'];
        $sql2 = "UPDATE user SET is_active=1 WHERE user_id=$user_id";
        $result2=mysqli_query($conn,$sql2);

        echo "<script>window.location.href = '../../admin/Admin_Notifications/AdminNotification.php';</script>";

    }

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

        <div class="top">    
            <div class="profile">
                <div class = "home_body">
                    <div class="main_wrapper">
                            
                        <div class="content">
                            <h2>Profile</h2>
                        </div>
                    </div>
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

        <div id="id01" class="modal_delete" style="display: none;">
            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
            
            <div class="modal_content_delete" action="">
                <div class="container_delete">
                    <h1>Are you sure you want to deactivate this user?</h1>
                    <div class="clearfix_delete">
                        <a class="delete" href="AdminUserView.php ?deleteUID=<?=$_GET['UID']?>">Deactivate</a>
                        <button type="button" class="cancelbtn" onclick="hideModal();">Cancel</button>
                    </div>
                </div>
            </div>
        </div>   
        
        <div id="id02" class="modal_delete" style="display: none;">
                    <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
                    <div class="modal_content_delete" action="">
                        <div class="container_delete">
                            <h1>The user has been approved</h1>

                            <div class="clearfix_delete">

                            <a  href="AdminUserView.php ?acceptUID=<?=$_GET['UID']?>">OK</a>
                            
                            </div>
                            
                            </div>
                            </div>
            </div>

        <?php
            if(isset($_GET['UID']))
            {?>
            <div align="center">
                <!-- <a class="delete" href="AdminUserView.php ?deleteUID=<?=$_GET['UID'] ?>" >Deactivate</a> -->
                <a class="delete" onclick="showModal(); return false;" >Deactivate</a>
                <a class="accept" href="AdminUserView.php ?acceptUID=<?=$_GET['UID'] ?>" onclick="acceptModal(); return false;">Accept</a>

            </div>
            
            <?php 
            }
        ?>

        <script src="../modal.js"></script>

    </body>
</html>