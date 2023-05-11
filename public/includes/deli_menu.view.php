<?php

$id  = $_SESSION['USER_DATA']['user_id'];

$sql  = "SELECT COUNT(*) FROM accepted_orders WHERE order_viewed = 0 && sent_deli_id = $id  ";
$result = mysqli_query($conn,$sql);
$row  = mysqli_fetch_array($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- <link rel="stylesheet" href="../Customer/CSS/delivery.css"> -->
    <link rel="stylesheet" 
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

 <div class="containerr">
        <div class="left_menu_bar">
            <div id="menu">
                <a><i class="fa-solid fa-bars"></i></a>
                <div class="image"><img src="images/badge.svg" alt=""></div>
                <h3>Leafy</h3>
            </div>
            <ul>
                <li><a href="DeliOrderHistory.php"><i class="fa-solid fa-gauge-high"  style="font-size:16px;color:black;"></i>History</a></li>
                <!-- <li><a href="DeliNotification.php"><i class="fa-solid fa-house"  style="font-size:16px;color:black;"></i>Notifications<div class  = "count"><?php //echo $row[0]?></div></a></li> -->
                <li><a href="DeliDashboard.php"><i class="fa-solid fa-comments"  style="font-size:16px;color:black;"></i>Reports</a></li>
                <li><a href="orderConfirm.php"><i class="fa-solid fa-comments"  style="font-size:16px;color:black;"></i>Order status</a></li>
                <li><a href="DeliNotification.php"><i  class="fa fa-bell" aria-hidden="true"style="font-size:16px;color:black;"></i>Notifications <div class  = "count"><?php echo $row[0]?></div></a></li>


                
            </ul>

        </div>
</div>


</body>


</html>