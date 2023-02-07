<?php 

//require "connect.php";
include 'connect.php';
require "../public/Auth.php";
//include "../public/includes/header.view.php";


//customer
$sqlcustomer="SELECT * FROM user where role='customer'";

// make query & get resultcustomer
$resultcustomer= mysqli_query($conn,$sqlcustomer);

//customer
$sqlcustomer2="SELECT * FROM customer";

// make query & get resultcustomer
$resultcustomer2= mysqli_query($conn,$sqlcustomer2);

    if(isset($_GET['UID']))
    {
        $cust_user_id = $_GET['UID'];
        $sql1 = "SELECT * FROM user WHERE user_id=$cust_user_id and role='customer'";
        $result1=mysqli_query($conn,$sql1);
        
        if($result1)
        { 
                       
            while($recordcustomer = mysqli_fetch_assoc($result1))
            {
                $user_id=$recordcustomer['user_id'];
                $first_name=$recordcustomer['fname'];
                $email=$recordcustomer['email'];
                $role=$recordcustomer['role'];
   
            }

        
            // while($recordcustomer = mysqli_fetch_assoc($result1))
            // {
            //     $fetch= mysqli_fetch_assoc($result1); 
   
            // }
            
        }

        $sql2 = "SELECT * FROM customer WHERE user_id=$cust_user_id ";
        $result2=mysqli_query($conn,$sql2);
        
        if($result2)
        { 
                       
            while($recordcustomer2 = mysqli_fetch_assoc($result2))
            {
                $house_no=$recordcustomer2['house_no'];
                $lane=$recordcustomer2['lane'];
                $city=$recordcustomer2['city'];
   
            }
        }
    }

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/CSS/style.css"> 
    <link rel="stylesheet" href="profile.css">
    <title>Instructor Home</title>
    
    
</head>
<body>
<?php //include "../public/includes/admin_menu.view.php"?>


<!-- <div class = "loggedhome_body">  -->

    <!-- <div class = "home_body">  -->
    <div class="container">
    
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
                                        <input type="text" name="user_ID" value="<?=$user_id ?>" class="box"  readonly><br>
                                        <span>First Name :</span>
                                        <input type="text" name="first_name" value="<?=$first_name ?>" class="box"  readonly><br>
                                        <span>Last Name :</span>
                                        <input type="text" name="last_name" value="<?=$email ?>" class="box"  readonly><br>
                                        <span>Email :</span>
                                        <input type="text" name="email" value="<?=$role ?>" class="box"  readonly><br>
                                        <span>Contact Number :</span>
                                        <input type="text" name="cnumber" value="<?=$house_no ?>" class="box"  readonly><br>
                                        <span>Occupation:</span>
                                        <input type="text" name="occupation" value="<?=$lane ?>" class="box"  readonly><br>
                                        <span>Specialized Area :</span>
                                        <input type="text" name="specialized_area" value="<?=$city ?>" class="box"  readonly><br>
                                        
                            </form>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
                            
<!-- </div>  -->
<!-- </div>  -->
      
</body>
</html>

