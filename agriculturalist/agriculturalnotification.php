<?php 


require "../public/Auth.php";
include "../public/includes/header.view.php";
// include "database.php";


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="agrinotifi.css">
    <link rel="stylesheet" href="../public/CSS/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />                                                   
          
    <title>Agriculturalist Notification page</title>
</head>
<body>
    <?php include 'agrinotificationback.php';?>
    <?php include "agri_menu.view.php"?>

<div class = "loggedhome_body">
<div class = "home_body">
    <div class="instructor_wrapper">
        
        <div class="content">
            <br><br>
            <h2>Notifications</h2>

        <section id='customer'>;
            <!-- User-->
            <div class="box">
                <div class="container_left">
                    <div class="main_card">
                    <p>New orders</p>
                    <div class="card_left">
                        <ul>

                            <?php while($record1=mysqli_fetch_assoc($resultcustomer)){?>
                                <li><a onclick="myFunction()" href="agriculturalnotification.php ?view=<?= $record1['user_id']; ?> ">
                                User <?= $record1['user_id']?> - <?=$record1['fname']?>  <?=$record1['role']?></a></li>
                            <?php }?>
                        </ul>
                    </div>
                    </div>
                    <!-- <button onclick="location.href='createblog.php'" type="button" id="create">create</button> -->
                </div>
                <div class="container_right" id="view_more">
                    <h3> New Order <?= $cust_user_id ?>:   <?= $cust_first_name ?></h3>
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
                                <td><?=$inst_user_id ?></td>
                            </tr>
                            <tr>
                                <th>Category </th>
                                <td>:</td>
                                <td><?=$inst_first_name ?></td>
                            </tr>
                            <tr>
                                <th>Quantity </th>
                                <td>:</td>
                                <td><?=$inst_first_name ?></td>
                            </tr>
                            <tr>
                                <th>Customer Address </th>
                                <td>:</td>
                                <td><?=$inst_first_name ?></td>
                            </tr>
                        
                            <tr>
                                <th>Date created </th>
                                <td>:</td>
                                <td><?=$inst_email ?></td>
                            </tr>
                            
                        </table>
                    </div>
                    
                </div>

           </div>
        </section>

           <!-- Blog -->
           
    </div>
</div>    

        <script src="agri_notification.js"></script>
</body>
<div style="margin-left: -25.5%;">
<?php include  '../includes/footer.view.php' ?>
</div>
</html>