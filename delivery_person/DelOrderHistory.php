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
          
    <title>Deli Order History</title>
</head>
<body>
    <?php include 'DeliNotificationPHP.php';?>
    <?php include "../public/includes/deli_menu.view.php"?>

<div class = "loggedhome_body">
    <div class="main_wrapper">
        
        <div class="content">
            <h2>Completed Orders History</h2>

        <section id='customer'>;
            <!-- User-->
            <div class="box">
                <div class="container_left">
                    <div class="main_card">
                    <p>Order details</p>
                    <div class="card_left">
                        <ul>

                            <?php while($record1=mysqli_fetch_assoc($resultcustomer)){?>
                                <li><a onclick="myFunction()" href="DelOrderHistory.php ?view=<?= $record1['user_id']; ?> ">
                                Customer order <?= $record1['user_id']?> - <?=$record1['fname']?>  <?=$record1['role']?></a></li>
                            <?php }?>
                        </ul>
                    </div>
                    </div>
                    <!-- <button onclick="location.href='createblog.php'" type="button" id="create">create</button> -->
                </div>
                <div class="container_right" id="view_more">
                    <h3> Customer order <?= $cust_user_id ?></h3>
                <!-- <button class="close-button">&times;</button>-->
                    <div class="container_button">
                        <!-- <button onclick="location.href=''" type="button" id="edit">Edit</button> -->
                        <button type="button" id="delete">Delete</button>
                    </div>
                    <div class="details_container">
                        <table>
                            
                            <tr>
                                <th>Order ID</th>
                                <td>:</td>
                                <td><?=$cust_user_id ?></td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td>:</td>
                                <td><?=$cust_first_name ?></td>
                            </tr>
                        
                            <tr>
                                <th>Location </th>
                                <td>:</td>
                                <td><?=$cust_email ?></td>
                            </tr>

                            <tr>
                                <th>Total Value </th>
                                <td>:</td>
                                <td></td>
                            </tr>
                            
                        </table>
                    </div>
                    
                </div>

           </div>
        </section>

        
            
        </div>

    </div>
</div>    

        <script src="getdetails.js"></script>
</body>
</html>