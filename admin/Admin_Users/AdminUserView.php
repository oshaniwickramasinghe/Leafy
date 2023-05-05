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
    


    <!-- </div>  -->
                            
     <!-- </div>  -->
<!-- </div>  -->
    


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

<?php
    if(isset($_GET['UID']))
    {?>
    <div align="center">
        <a class="delete" href="AdminUserView.php ?deleteUID=<?=$_GET['UID'] ?>" >Deactivate</a>
        <a class="accept" href="AdminUserView.php ?acceptUID=<?=$_GET['UID'] ?>" >Accept</a>

    </div>
      
      <?php 
    }
?>

</body>
</html>


