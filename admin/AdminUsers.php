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
          
    <title>All users view</title>
</head>
<body>
    <?php include 'AdminUsersPHP.php';?>
    <?php include "../public/includes/admin_menu.view.php"?>

<div class = "loggedhome_body">
<div class = "home_body">
    <div class="instructor_wrapper">
        
        <div class="content">
            <h2>All Users</h2>

        <section id='customer'>;
            <!-- User-->
            <div class="box">
                <div class="container_left">
                    <div class="main_card">
                    <p>Customer</p>
                    <div class="card_left">
                        <ul>

                            <?php while($record1=mysqli_fetch_assoc($resultcustomer)){?>
                                <li><a onclick="myFunction()" href="AdminUsers.php ?view1=<?= $record1['user_id']; ?> ">
                                User <?= $record1['user_id']?> - <?=$record1['fname']?>  <?=$record1['role']?></a></li>
                            <?php }?>
                        </ul>
                    </div>
                    </div>
                    <!-- <button onclick="location.href='createblog.php'" type="button" id="create">create</button> -->
                </div>
                <div class="container_right" id="view_more">
                    <h3> User <?= $cust_user_id ?>:   <?= $cust_first_name ?></h3>
                <!-- <button class="close-button">&times;</button>-->
                    <div class="container_button">
                        <!-- <button onclick="location.href=''" type="button" id="edit">Edit</button> -->
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

           <!-- instructor -->
           <div class="box">
                <div class="container_left">
                    <div class="main_card">
                    <p>Instructor</p>
                    <div class="card_left">
                        <ul>
                            <?php while($record2=mysqli_fetch_assoc($resultinstructor)){?>
                                <li><a onclick="myFunction()" href="AdminUsers.php?view2=<?= $record2['user_id']; ?> ">
                                User <?= $record2['user_id']?> - <?=$record2['fname']?>  <?=$record2['role']?></a></li>
                            <?php }?>
                        </ul>
                    </div>
                    </div>
                </div>
                <div class="container_right" id="view_more">
                    <h3> User <?= $inst_user_id ?>:   <?= $inst_first_name ?></h3>
                <!-- <button class="close-button">&times;</button>-->
                    <div class="container_button">
                        <button onclick="location.href=''" type="button" id="edit">Edit</button>
                        <button type="button" id="delete">Delete</button>
                    </div>
                    <div class="details_container">
                        <table>
                            
                            <tr>
                                <th>User ID</th>
                                <td>:</td>
                                <td><?=$inst_user_id ?></td>
                            </tr>
                            <tr>
                                <th>Name </th>
                                <td>:</td>
                                <td><?=$inst_first_name ?></td>
                            </tr>
                        
                            <tr>
                                <th>Email </th>
                                <td>:</td>
                                <td><?=$inst_email ?></td>
                            </tr>
                            
                        </table>
                    </div>
                    
                </div>

           </div>

           <!-- Agriculturalist -->
           <div class="box">
                <div class="container_left">
                    <div class="main_card">
                    <p>Agriculturalist</p>
                    <div class="card_left">
                        <ul>
                            <?php while($record3=mysqli_fetch_assoc($resultagriculturalist)){?>
                                <li><a onclick="myFunction()" href="AdminUsers.php?view3=<?= $record3['user_id']; ?> ">
                                User <?= $record3['user_id']?> - <?=$record3['fname']?>  <?=$record3['role']?></a></li>
                            <?php }?>
                        </ul>
                    </div>
                    </div>
                </div>
                <div class="container_right" id="view_more">
                    <h3> User <?= $agri_user_id ?>:   <?= $agri_first_name ?></h3>
                <!-- <button class="close-button">&times;</button>-->
                    <div class="container_button">
                        <button onclick="location.href=''" type="button" id="edit">Edit</button>
                        <button type="button" id="delete">Delete</button>
                    </div>
                    <div class="details_container">
                        <table>
                            
                            <tr>
                                <th>User ID</th>
                                <td>:</td>
                                <td><?=$agri_user_id ?></td>
                            </tr>
                            <tr>
                                <th>Name </th>
                                <td>:</td>
                                <td><?=$agri_first_name ?></td>
                            </tr>
                        
                            <tr>
                                <th>Email</th>
                                <td>:</td>
                                <td><?=$agri_email ?></td>
                            </tr>
                            
                        </table>
                    </div>
                    
                </div>

           </div>

           
           <!-- Delivery Agent -->
           <div class="box">
                <div class="container_left">
                    <div class="main_card">
                    <p>Delivery Agent</p>
                    <div class="card_left">
                        <ul>
                            <?php while($record4=mysqli_fetch_assoc($resultdelivery)){?>
                                <li><a onclick="myFunction()" href="AdminUsers.php?view4=<?= $record4['user_id']; ?> ">
                                Users <?= $record4['user_id']?> - <?=$record4['fname']?>  <?=$record4['role']?></a></li>
                            <?php }?>
                        </ul>
                    </div>
                    </div>
                </div>
                <div class="container_right" id="view_more">
                    <h3> Users <?= $del_user_id ?>:   <?= $del_first_name ?></h3>
                <!-- <button class="close-button">&times;</button>-->
                    <div class="container_button">
                        <!-- <button onclick="location.href=''" type="button" id="edit">Edit</button> -->
                        <button type="button" id="delete">Delete</button>
                    </div>
                    <div class="details_container">
                        <table>
                            
                            <tr>
                                <th>Users ID</th>
                                <td>:</td>
                                <td><?=$del_user_id ?></td>
                            </tr>
                            <tr>
                                <th>Name </th>
                                <td>:</td>
                                <td><?=$del_first_name ?></td>
                            </tr>
                        
                            <tr>
                                <th>Email</th>
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