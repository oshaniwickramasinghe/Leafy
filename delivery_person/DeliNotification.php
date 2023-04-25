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
          
    <title>Deli Notification page</title>
</head>
<body>
    <?php include 'DeliNotificationPHP.php';?>
    <?php include "../public/includes/deli_menu.view.php"?>

<div class = "loggedhome_body">
<div class = "home_body">
    <div class="main_wrapper">
        
        <div class="content">
            <h2>Notifications</h2>

        <section id='customer'>;
            <!-- New Notifications-->
            <div class="box">
                <div class="container_left">
                    <div class="main_card">
                    <p>New Notifications</p>
                    <div class="card_left">
                        <ul>

                            <?php while($record1=mysqli_fetch_assoc($resultorder0)){?>
                                <li><a onclick="displayRight()" href="DeliNotification.php ?orderid=<?= $record1['order_id']; ?> ">
                                <table>
                                    <td>
                                    Order <?= $record1['order_id']?> - 
                                    </td>
                                </table>  
                            </a></li>
                            <?php }?>
                        </ul>
                    </div>
                    </div>
                </div>
                <div class="container_right" id="view_more">
                    <h3> Order <?= $orderid ?></h3>
                    <div class="container_button">
                        <button onclick="location.href='DeliNotificationPHP.php?deleteID=<?= $orderid ?>'" type="button" id="Delete">Delete</button>
                        <button onclick="location.href='DeliNotificationPHP.php?acceptID=<?= $orderid ?>'" type="button" id="Accept">Accept</button>
                        <button onclick="location.href='DeliNotificationPHP.php?readID=<?= $orderid ?>'" type="button" id="Read">Mark as read</button>
                    </div>
                    <div class="details_container">
                        <table>
                            
                            <tr>
                                <th>Order ID</th>
                                <td>:<?=$orderid ?></td>
                            </tr>
                            <tr>
                                <th>Customer ID</th>
                                <td>:<?=$customer_id ?></td>
                            </tr>
                            <tr>
                                <th>Agriculturalist ID</th>
                                <td>:<?=$agriculturalist_id ?></td>
                            </tr>
                        
                            <tr>
                                <th>Payment method </th>
                                <td>:<?=$payment_method ?></td>
                            </tr>
                            <tr>
                                <th>Location </th>
                                <td>:</td>
                                
                            </tr>
                            
                        </table>

                    </div>
                    
                </div>

           </div>


           <?php //updateViewCol()?>

            <!-- Viewed Notifications-->
            <div class="box">
                <div class="container_left">
                    <div class="main_card">
                    <p>Viewed Notifications</p>
                    <div class="card_left">
                        <ul>

                            <?php while($record1=mysqli_fetch_assoc($resultorder1)){?>
                                <li><a onclick="displayRight()" href="DeliNotification.php ?viewedorder=<?= $record1['order_id']; ?> ">
                                Order <?= $record1['order_id']?> -   </a></li>
                            <?php }?>
                        </ul>
                    </div>
                    </div>
                </div>
                <div class="container_right" id="view_more">
                    <h3> Order <?= $VWorderid ?></h3>
                    <div class="container_button">
                        <button onclick="location.href='DeliNotificationPHP.php? deleteID=<?= $orderid ?>'" type="button" id="Delete">Delete</button>
                        <button onclick="location.href='DeliNotificationPHP.php? acceptID=<?= $orderid ?>'" type="button" id="Accept">Accept</button>
                    </div>
                    <div class="details_container">
                        <table>
                            
                            <tr>
                                <th>Order ID</th>
                                <td>:<?=$VWorderid ?></td>
                            </tr>
                            <tr>
                                <th>Customer ID</th>
                                <td>:<?=$VWcustomer_id ?></td>
                            </tr>
                            <tr>
                                <th>Agriculturalist ID</th>
                                <td>:<?=$VWagriculturalist_id ?></td>
                            </tr>
                        
                            <tr>
                                <th>Payment method </th>
                                <td>:<?=$VWpayment_method ?></td>
                            </tr>
                            <tr>
                                <th>Location </th>
                                <td>:</td>
                            </tr>
                            <tr>
                                
                                <?php if ($VWstatus==2) {?>
                                    <th>Status </th> 
                                    <td>:  Rejected</td>
                                <?php } ?>
                                <?php if ($VWstatus==1) {?>
                                    <th>Status </th> 
                                    <td>:  Accepted</td>
                                <?php } ?>
                                
                            </tr>
                            
                        </table>

                    </div>
                    
                </div>

           </div>        
            
        </div>

    </div>
    </div>
</div>    

        <script src="getdetails.js"></script>
</body>
</html>