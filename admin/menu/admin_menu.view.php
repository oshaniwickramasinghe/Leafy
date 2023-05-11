<?php

//$id  = $_SESSION['USER_DATA']['user_id'];
$sql1="SELECT COUNT(*) AS blogcount FROM blog WHERE Verified = 0";
$sql2 ="SELECT COUNT(*) AS coursecount FROM course WHERE verified = 0";
$sql3 ="SELECT COUNT(*) AS usercount FROM user WHERE approved = 0";

$result1 = mysqli_query($conn,$sql1);
$result2 = mysqli_query($conn,$sql2);
$result3 = mysqli_query($conn,$sql3);

$row1  = mysqli_fetch_array($result1);
$row2  = mysqli_fetch_array($result2);
$row3  = mysqli_fetch_array($result3);

$row= $row1[0]+$row2[0]+$row3[0];
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
                <? echo $row;?>
                    <!-- <li><a href="../home/AdminHome.php">            <i class="fa-solid fa-gauge-high"  style="font-size:16px;color:black;"></i>     Home</a></li>
                    <li><a href="../Admin_Reports/AdminReport.php"> <i class="fa-solid fa-comments"  style="font-size:16px;color:black;"></i>       Reports</a></li>
                    <li><a href="../Admin_Notifications/AdminNotification.php"><i class="fa-brands fa-blogger"  style="font-size:16px;color:black;"></i>Notifications</a></li>
                    <li><a href="../Admin_Forum/AdminForum.php">    <i class="fa-brands fa-readme" style="font-size:16px;color:black;"></i>         Forum</a></li>
                    <li><a href="../../item/view/itemview.php">     <i class="fa-brands fa-readme" style="font-size:16px;color:black;"></i>         Itemsss</a></li> -->

                    <li><a href="../../admin/home/AdminHome.php">            <i class="fa-solid fa-gauge-high"  style="font-size:16px;color:black;"></i>     Home</a></li>
                    <li><a href="../../admin/Admin_Reports/AdminReport.php"> <i class="fa-solid fa-comments"  style="font-size:16px;color:black;"></i>       Reports</a></li>
                    <!-- <li><a href="../../admin/Admin_Notifications/AdminNotification.php"><i class="fa-brands fa-blogger"  style="font-size:16px;color:black;"></i>Notifications</a></li> -->

                    <li><a href="../../admin/Admin_Forum/AdminForum.php">    <i class="fa-brands fa-readme" style="font-size:16px;color:black;"></i>         Forum</a></li>
                    <li><a href="../../admin/Admin_Notifications/AdminNotification.php"><i  class="fa fa-bell" aria-hidden="true"style="font-size:16px;color:black;"></i>Notifications <div class  = "count"><?php echo $row?></div></a></li>
                    <li><a href="../../item/view/itemview.php">     <i class="fa-brands fa-readme" style="font-size:16px;color:black;"></i>         Item</a></li>
                </ul>

            </div>
        </div>
    </body>
</html>