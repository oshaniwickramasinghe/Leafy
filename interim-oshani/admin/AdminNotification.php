<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="notification.css">
    <title>Admin Notification page</title>
</head>
<body>
    <?php include 'AdminNotificationPHP.php';?>

    <header></header>
    <div class="instructor_wrapper">
        <div class="left_menu_bar">
            <h3>Menu</h3>
            <ul>
                <li><a href="">Questions</a></li>
                <li><a href="AdminNotification.php">Blogs</a></li>
                <li><a href="">Courses</a></li>
            </ul>
        </div>
        <div class="content">
            <h2>Notification</h2>

            <!-- Customer-->
            <div class="container">
                <div class="container_left">
                    <div class="main_card">
                    <p>Customer</p>
                    <div class="card_left">
                        <ul>
                            <?php while($record1=mysqli_fetch_assoc($resultcustomer)){?>
                                <li><a onclick="myFunction()" href="AdminNotification.php?view=<?= $record1['user_id']; ?> ">
                                Blog <?= $record1['user_id']?> - <?=$record1['first_name']?>  <?=$record1['role']?></a></li>
                            <?php }?>
                        </ul>
                    </div>
                    </div>
                    <button onclick="location.href='createblog.php'" type="button" id="create">create</button>
                </div>
                <div class="container_right" id="view_more">
                    <h3> User <?= $user_id ?>:   <?= $first_name ?></h3>
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
                                <td><?=$user_id ?></td>
                            </tr>
                            <tr>
                                <th>Name </th>
                                <td>:</td>
                                <td><?=$first_name ?></td>
                            </tr>
                        
                            <tr>
                                <th>Email </th>
                                <td>:</td>
                                <td><?=$email ?></td>
                            </tr>
                            
                        </table>
                    </div>
                    <from action=   ></from>
                    
                </div>

           </div>

           <!-- Instructor -->
           <div class="container">
                <div class="container_left">
                    <div class="main_card">
                    <p>Instructor</p>
                    <div class="card_left">
                        <ul>
                            <?php while($record2=mysqli_fetch_assoc($resultinstructor)){?>
                                <li><a onclick="myFunction()" href="AdminNotification.php?view=<?= $record2['user_id']; ?> ">
                                Blog <?= $record2['user_id']?> - <?=$record2['first_name']?>  <?=$record2['role']?></a></li>
                            <?php }?>
                        </ul>
                    </div>
                    </div>
                    <button onclick="location.href='createblog.php'" type="button" id="create">create</button>
                </div>
                <div class="container_right" id="view_more">
                    <h3> User <?= $user_id ?>:   <?= $first_name ?></h3>
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
                                <td><?=$user_id ?></td>
                            </tr>
                            <tr>
                                <th>Name </th>
                                <td>:</td>
                                <td><?=$first_name ?></td>
                            </tr>
                        
                            <tr>
                                <th>Email </th>
                                <td>:</td>
                                <td><?=$email ?></td>
                            </tr>
                            
                        </table>
                    </div>
                    <from action=   ></from>
                    
                </div>

           </div>

           <!-- Agriculturalist -->
           <div class="container">
                <div class="container_left">
                    <div class="main_card">
                    <p>Agriculturalist</p>
                    <div class="card_left">
                        <ul>
                            <?php while($record3=mysqli_fetch_assoc($resultagriculturalist)){?>
                                <li><a onclick="myFunction()" href="AdminNotification.php?view=<?= $record3['user_id']; ?> ">
                                Blog <?= $record3['user_id']?> - <?=$record3['first_name']?>  <?=$record3['role']?></a></li>
                            <?php }?>
                        </ul>
                    </div>
                    </div>
                    <button onclick="location.href='createblog.php'" type="button" id="create">create</button>
                </div>
                <div class="container_right" id="view_more">
                    <h3> User <?= $user_id ?>:   <?= $first_name ?></h3>
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
                                <td><?=$user_id ?></td>
                            </tr>
                            <tr>
                                <th>Name </th>
                                <td>:</td>
                                <td><?=$first_name ?></td>
                            </tr>
                        
                            <tr>
                                <th>Email </th>
                                <td>:</td>
                                <td><?=$email ?></td>
                            </tr>
                            
                        </table>
                    </div>
                    <from action=   ></from>
                    
                </div>

           </div>

           
           <!-- Delivery person -->
           <div class="container">
                <div class="container_left">
                    <div class="main_card">
                    <p>Delivery person</p>
                    <div class="card_left">
                        <ul>
                            <?php while($record4=mysqli_fetch_assoc($resultdelivery)){?>
                                <li><a onclick="myFunction()" href="AdminNotification.php?view=<?= $record4['user_id']; ?> ">
                                Blog <?= $record4['user_id']?> - <?=$record4['first_name']?>  <?=$record4['role']?></a></li>
                            <?php }?>
                        </ul>
                    </div>
                    </div>
                    <button onclick="location.href='createblog.php'" type="button" id="create">create</button>
                </div>
                <div class="container_right" id="view_more">
                    <h3> User <?= $user_id ?>:   <?= $first_name ?></h3>
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
                                <td><?=$user_id ?></td>
                            </tr>
                            <tr>
                                <th>Name </th>
                                <td>:</td>
                                <td><?=$first_name ?></td>
                            </tr>
                        
                            <tr>
                                <th>Email </th>
                                <td>:</td>
                                <td><?=$email ?></td>
                            </tr>
                            
                        </table>
                    </div>
                    <from action=   ></from>
                    
                </div>

           </div>

            
            
        </div>

    </div>

        <script src="notification.js"></script>
</body>
</html>