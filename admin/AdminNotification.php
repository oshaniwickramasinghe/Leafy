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
                                <li><a onclick="myFunction()" href="AdminNotification.php ?view=<?= $record1['user_id']; ?> ">
                                User <?= $record1['user_id']?> - <?=$record1['fname']?>  <?=$record1['role']?></a></li>
                            <?php }?>
                        </ul>
                    </div>
                    </div>
                </div>
                <div class="container_right" id="view_more">
                    <h3> User <?= $cust_user_id ?>:   <?= $cust_first_name ?></h3>

                    <?php  $id = $_GET['view']; ?>

                <!-- <button class="close-button">&times;</button>-->
                    <div class="container_button">
                        <a href="AdminUserView.php ?UID=<?=$id ?>" >View</a>
                        <button type="button" id="delete">Delete</button>
                    </div>
                    <div class="details_container">
                        <table>
                            
                            <tr>
                                <th>User ID</th>
                                <td>:</td>
                                <td><?=$cust_user_id ?></td>
                            </tr>
                            <tr>
                                <th>Name </th>
                                <td>:</td>
                                <td><?=$cust_first_name ?></td>
                            </tr>
                        
                            <tr>
                                <th>Email </th>
                                <td>:</td>
                                <td><?=$cust_email ?></td>
                            </tr>
                            
                        </table>
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
                                <li><a onclick="myFunction()" href="AdminNotification.php?viewblog=<?= $record2['blog_id']; ?> ">
                                Blog <?= $record2['blog_id']?> - <?=$record2['title']?></a></li>
                            <?php }?>
                        </ul>
                    </div>
                    </div>
                </div>
                <div class="container_right" id="view_more">
                    <h3> Blog </h3>

                    <?php  $id = $_GET['viewblog']; ?>
                <!-- <button class="close-button">&times;</button>-->
                    <div class="container_button">
                        <!-- <button onclick="location.href='AdminBlogView.php'" type="button" id="Accept">View</button> -->
                        <a href="AdminBlogView.php ?UID=<?=$id ?>" >View</a>
                        <button type="button" id="delete">Delete</button>
                    </div>
                    <div class="details_container">
                        <table>
                            
                            <tr>
                                <th>Blog ID</th>
                                <td>:</td>
                                <td><?=$blog_id ?></td>
                            </tr>
                            <tr>
                                <th>Title </th>
                                <td>:</td>
                                <td><?=$blog_title ?></td>
                            </tr>
                        
                            <tr>
                                <th>Date created </th>
                                <td>:</td>
                                <td><?=$created_date ?></td>
                            </tr>
                            
                        </table>
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
                            <?php while($record3=mysqli_fetch_assoc($resultagriculturalist)){?>
                                <li><a onclick="myFunction()" href="AdminNotification.php?view=<?= $record3['user_id']; ?> ">
                                Courses <?= $record3['user_id']?> - <?=$record3['fname']?>  <?=$record3['role']?></a></li>
                            <?php }?>
                        </ul>
                    </div>
                    </div>
                </div>
                <div class="container_right" id="view_more">
                    <h3> Courses <?= $agri_user_id ?>:   <?= $agri_first_name ?></h3>
                <!-- <button class="close-button">&times;</button>-->
                    <div class="container_button">
                        <button onclick="location.href=''" type="button" id="Accept">Accept</button>
                        <button type="button" id="delete">Delete</button>
                    </div>
                    <div class="details_container">
                        <table>
                            
                            <tr>
                                <th>Courses ID</th>
                                <td>:</td>
                                <td><?=$agri_user_id ?></td>
                            </tr>
                            <tr>
                                <th>Title </th>
                                <td>:</td>
                                <td><?=$agri_first_name ?></td>
                            </tr>
                        
                            <tr>
                                <th>Date created </th>
                                <td>:</td>
                                <td><?=$agri_email ?></td>
                            </tr>
                            
                        </table>
                    </div>
                    
                </div>

           </div>

           
           <!-- Orders -->
           <div class="box">
                <div class="container_left">
                    <div class="main_card">
                    <p>New Orders</p>
                    <div class="card_left">
                        <ul>
                            <?php while($record4=mysqli_fetch_assoc($resultdelivery)){?>
                                <li><a onclick="myFunction()" href="AdminNotification.php?view=<?= $record4['user_id']; ?> ">
                                Orders <?= $record4['user_id']?> - <?=$record4['fname']?>  <?=$record4['role']?></a></li>
                            <?php }?>
                        </ul>
                    </div>
                    </div>
                </div>
                <div class="container_right" id="view_more">
                    <h3> Orders <?= $del_user_id ?>:   <?= $del_first_name ?></h3>
                <!-- <button class="close-button">&times;</button>-->
                    <div class="container_button">
                        <button onclick="location.href=''" type="button" id="Accept">Accept</button> 
                        <button type="button" id="delete">Delete</button>
                    </div>
                    <div class="details_container">
                        <table>
                            
                            <tr>
                                <th>Orders ID</th>
                                <td>:</td>
                                <td><?=$del_user_id ?></td>
                            </tr>
                            <tr>
                                <th>Title </th>
                                <td>:</td>
                                <td><?=$del_first_name ?></td>
                            </tr>
                        
                            <tr>
                                <th>Date created </th>
                                <td>:</td>
                                <td><?=$del_email ?></td>
                            </tr>
                            
                        </table>
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