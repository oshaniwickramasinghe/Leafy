<?php 

require "database.php";
require "../public/Auth.php";
include "../Customer/includes/header.php";


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
          
    <title>Admin Report page</title>
</head>
<body>
    <?php include 'AdminNotificationPHP.php';?>
    <?php include "../public/includes/admin_menu.view.php"?>

<div class = "loggedhome_body">
<div class = "home_body">
    <div class="instructor_wrapper">
        
        <div class="content">
            <h2>Reports</h2>

        <section id='customer'>;
            <!-- Customer-->
            <div class="box">
                <div class="container_left">
                    <div class="main_card">
                    <p>Orders</p>
                    <div class="card_left">
                        <ul>

                            <?php while($record1=mysqli_fetch_assoc($resultcustomer)){?>
                                <li><a >
                                User <?= $record1['user_id']?> - <?=$record1['fname']?>  <?=$record1['role']?></a></li>
                            <?php }?>
                        </ul>
                    </div>
                    </div>
                </div>

                <div class="container_right" id="view_more">
                    <div class="center">
                        <?php include '../admin/charts/users.php';?>
                    </div>
                    
                </div>

           </div>
        </section>

           <!-- Instructor -->
           <div class="box">
                <div class="container_left">
                    <div class="main_card">
                    <p>Delivered orders</p>
                    <div class="card_left">
                        <ul>
                            <?php while($record2=mysqli_fetch_assoc($resultinstructor)){?>
                                <li><a>
                                User <?= $record2['user_id']?> - <?=$record2['fname']?>  <?=$record2['role']?></a></li>
                            <?php }?>
                        </ul>
                    </div>
                    </div>
                </div>
                <div class="container_right" id="view_more">
                    <div class="center">
                        <?php include '../admin/charts/users.php';?>
                    </div>
                    
                </div>

           </div>

           <!-- Agriculturalist -->
           <div class="box">
                <div class="container_left">
                    <div class="main_card">
                    <p>Users</p>
                    <div class="card_left">
                        <ul>
                            <?php while($record3=mysqli_fetch_assoc($resultall)){?>
                                <li><a >
                                User <?= $record3['user_id']?> - <?=$record3['fname']?>  <?=$record3['role']?></a></li>
                            <?php }?>
                        </ul>
                    </div>
                    </div>
                </div>
                <div class="container_right" id="view_more">
                    <div class="center">
                        <?php include '../admin/charts/user.php';?>
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