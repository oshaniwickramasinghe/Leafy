<?php 

//require "connect.php";
require "../public/Auth.php";
include "../public/includes/header.view.php";


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="notification.css">
    <link rel="stylesheet" href="../public/CSS/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />                                                   
          
    <title>Admin Notification page</title>
</head>
<body>
    <?php include 'AdminNotificationPHP.php';?>
    <?php include "../public/includes/admin_menu.view.php"?>

<div class = "loggedhome_body">
<div class = "home_body">
    <div class="instructor_wrapper">
        
        <div class="content">
            <h2>Notifications</h2>

        <section id='customer'>;
            <!-- Customer-->
            <div class="box">
                <div class="container_left">
                    <div class="main_card">
                    <p>Customer</p>
                    <div class="card_left">
                        <ul>

                            <?php while($record1=mysqli_fetch_assoc($resultcustomer)){?>
                                <li><a onclick="myFunction()" href="AdminUserView.php ?UID=<?= $record1['user_id']; ?> ">
                                User <?= $record1['user_id']?> - <?=$record1['fname']?>  <?=$record1['role']?></a></li>
                            <?php }?>
                        </ul>
                    </div>
                    </div>
                </div>
                

           </div>
        </section>

           <!-- Blog -->
           <div class="box">
                <div class="container_left">
                    <div class="main_card">
                    <p>New blogs</p>
                    <div class="card_left">
                        <ul>
                            <?php while($record2=mysqli_fetch_assoc($resultblog)){?>
                                <li><a href="AdminBlogView.php ? viewblog=<?= $record2['blog_id']; ?> ">
                                Blog <?= $record2['blog_id']?> - <?=$record2['title']?> </a></li>
                            <?php }?>
                        </ul>
                    </div>
                    </div>
                </div>
            

           </div>

           <!-- Courses -->
           <div class="box">
                <div class="container_left">
                    <div class="main_card">
                    <p>New Courses</p>
                    <div class="card_left">
                        <ul>
                            <?php while($record3=mysqli_fetch_assoc($resultcourse)){?>
                                <li><a href="AdminCourseView.php ? viewcourse=<?= $record3['course_id']; ?> ">
                                Courses <?= $record3['course_id']?> - <?=$record3['title']?> </a></li>
                            <?php }?>
                        </ul>
                    </div>
                    </div>
                </div>
               

           </div>
            
            
        </div>
        </div>

    </div>
</div>    

        <script src="notification.js"></script>
</body>
</html>