<?php

//$id  = $_SESSION['USER_DATA']['user_id'];

$sql  = "SELECT COUNT(*) FROM accepted_orders WHERE order_viewed = 0 ";
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

    <body>
        <div class="containerr">
            <div class="left_menu_bar">
                <div id="menu">
                    <a>
                        <i class="fa-solid fa-bars"></i>
                    </a>
                    <div class="image">
                        <img src="images/badge.svg" alt="">
                    </div>
                    <h3>Leafy</h3>
                </div>

                <ul>
                    <!-- <li><a href="../home/AdminHome.php">            <i class="fa-solid fa-gauge-high"  style="font-size:16px;color:black;"></i>     Home</a></li>
                    <li><a href="../Admin_Reports/AdminReport.php"> <i class="fa-solid fa-comments"  style="font-size:16px;color:black;"></i>       Reports</a></li>
                    <li><a href="../Admin_Notifications/AdminNotification.php"><i class="fa-brands fa-blogger"  style="font-size:16px;color:black;"></i>Notifications</a></li>
                    <li><a href="../Admin_Forum/AdminForum.php">    <i class="fa-brands fa-readme" style="font-size:16px;color:black;"></i>         Forum</a></li>
                    <li><a href="../../item/view/itemview.php">     <i class="fa-brands fa-readme" style="font-size:16px;color:black;"></i>         Itemsss</a></li> -->

                    <li><a href="../../admin/home/AdminHome.php">            <i class="fa-solid fa-gauge-high"  style="font-size:16px;color:black;"></i>     Home</a></li>
                    <li><a href="../../admin/Admin_Reports/AdminReport.php"> <i class="fa-solid fa-comments"  style="font-size:16px;color:black;"></i>       Reports</a></li>
                    <li><a href="../../admin/Admin_Notifications/AdminNotification.php"><i class="fa-brands fa-blogger"  style="font-size:16px;color:black;"></i>Notifications</a></li>

                    <li><a href="../../admin/Admin_Notifications/AdminNotification.php"><i  class="fa fa-bell" aria-hidden="true"style="font-size:16px;color:black;"></i>test <div class  = "count"><?php echo $row[0]?></div></a></li>

                    <li><a href="../../admin/Admin_Forum/AdminForum.php">    <i class="fa-brands fa-readme" style="font-size:16px;color:black;"></i>         Forum</a></li>
                    <li><a href="../../item/view/itemview.php">     <i class="fa-brands fa-readme" style="font-size:16px;color:black;"></i>         Item</a></li>
                </ul>

            </div>
        </div>
    </body>
</html>