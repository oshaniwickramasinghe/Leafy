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
    <?php include 'AdminReportPHP.php';?>
    <?php include "../public/includes/admin_menu.view.php"?>

<div class = "loggedhome_body">
<div class = "home_body">
    <div class="instructor_wrapper">
        
        <div class="content">
            <h2>Reports</h2>

        <section id='customer'>;
            <!-- not delivered orders-->
            <div class="box">
                <div class="container_left">
                    <div class="main_card">
                    <p>Orders to be delivered</p>
                    <div class="card_left">
                        <ul>

                        <li><a style="color: gray;">
                        OrderID&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;CustomerID&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Payment method
                        </a></li>

                            <?php while($record1=mysqli_fetch_assoc($resultorder)){?>
                                <li><a >
                                <?= $record1['order_id']?> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp; &emsp;&emsp;&emsp;&emsp;&emsp;<?= $record1['customer_id']?>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<?= $record1['payment_method']?></a></li>
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

           <!-- delivered orders -->
           <div class="box">
                <div class="container_left">
                    <div class="main_card">
                    <p>Delivered orders</p>
                    <div class="card_left">
                        <ul>

                        <li><a style="color: gray;">
                        OrderID&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;CustomerID&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Payment method
                        </a></li>

                            <?php while($record2=mysqli_fetch_assoc($resultnonorder)){?>
                                <li><a>
                                <?= $record2['order_id']?> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<?= $record2['customer_id']?>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<?= $record2['payment_method']?></a></li>
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

           <!-- All Users -->
           <div class="box">
                <div class="container_left">
                    <div class="main_card">
                    <p>Users</p>
                    <div class="card_left">
                        <ul>

                        <li><a style="color: gray;">
                        UserID&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;First name&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Role
                        </a></li>

                            <?php while($record3=mysqli_fetch_assoc($resultall)){?>
                                <li><a >
                                <?= $record3['user_id']?> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<?=$record3['fname']?>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<?=$record3['role']?></a></li>
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


           <!-- All Blogs -->
           <div class="box">
                <div class="container_left">
                    <div class="main_card">
                    <p>Blogs</p>
                    <div class="card_left">
                        <ul>

                        <li><a style="color: gray;">
                        BlogID&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Blog Title&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Date created
                        </a></li>

                            <?php while($record4=mysqli_fetch_assoc($resultblog)){?>
                                <li><a >
                                <?= $record4['blog_id']?> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<?=$record4['title']?>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<?=$record4['date']?></a></li>
                            <?php }?>
                        </ul>
                    </div>
                    </div>
                </div>
                <div class="container_right" id="view_more">
                    <div class="center">
                        <?php include '../admin/charts/blog.php';?>
                    </div>
                    
                </div>

           </div>

           <!-- All Courses -->
           <div class="box">
                <div class="container_left">
                    <div class="main_card">
                    <p>Courses</p>
                    <div class="card_left">
                        <ul>

                            <li><a style="color: gray;">
                            CoursesID &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; Courses Title
                            </a></li>                      

                            <?php while($record4=mysqli_fetch_assoc($resultcourse)){?>
                                <li><a >
                                <?= $record4['course_id']?> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<?=$record4['title']?>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</a></li>
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