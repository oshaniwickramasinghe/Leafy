<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="../../admin/notification.css">
    <link rel="stylesheet" href="../../public/CSS/style.css">
    <title>Home</title>
    
<link rel="stylesheet"   href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
    /* Flexible layout */
    .containerr {
        display: flex;
        flex-wrap: wrap;
    }

    .left_menu_bar {
        flex: 1;
    }

    /* Responsive images */
    img {
        max-width: 100%;
        height: auto;
    }

    /* Media queries for different screen sizes */
    @media (max-width: 768px) {
        .left_menu_bar {
            flex-basis: 100%;
        }
    }

    @media (min-width: 768px) and (max-width: 1024px) {
        .left_menu_bar {
            flex-basis: 50%;
        }
    }

    @media (min-width: 1024px) {
        .left_menu_bar {
            flex-basis: 30%;
        }
    }
</style>
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
            <li><a href="../home/AdminHome.php"><i class="fa-solid fa-gauge-high"  style="font-size:16px;color:black;"></i>Home</a></li>
            <li><a href="../Admin_Reports/AdminReport.php"><i class="fa-solid fa-comments"  style="font-size:16px;color:black;"></i>Reports</a></li>
            <li><a href="../Admin_Notifications/AdminNotification.php"><i class="fa-brands fa-blogger"  style="font-size:16px;color:black;"></i>Notifications</a></li>
            <li><a href="../Admin_Forum/AdminForum.php"><i class="fa-brands fa-readme" style="font-size:16px;color:black;"></i>Forum</a></li>
            <li><a href="../../item/itemview.php"><i class="fa-brands fa-readme" style="font-size:16px;color:black;"></i>Item</a></li>
        </ul>

    </div>
</div>
</body>
</html>