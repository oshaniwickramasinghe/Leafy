<?php
if(logged_in()){
    $uid  = $_SESSION['USER_DATA']['user_id'];
    }else{
      $uid =0;
    }

$sql  = "SELECT COUNT(*) FROM notification WHERE status = 0 && customer_id = $uid  ";
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
   
    <link rel="stylesheet" 
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
   


        <div class="left_menu_bar">
            <div id="menu">
                <a><i class="fa-solid fa-bars"></i></a>
                <div class="image"><img src="images/badge.svg" alt=""></div>
                <h3>Leafy</h3>
            </div>
            <ul>
                <li><?php if($uid!=0){?><a href="/leafy-main/customer/customerhome.php"><?php }else{?> <a href="../home.view.php"><?php }?><i class="fa-solid fa-house"  style="font-size:16px;color:black;"></i>Home</a></li>
                <li><a href="/leafy-main/customer/wishlist/wishlist.php"><i class="fa fa-list" aria-hidden="true" style="font-size:16px;color:black;"></i>Wishlist</a></li>
                <li><a href="/leafy-main/customer/notification/notification.php"><i  class="fa fa-bell" aria-hidden="true"style="font-size:16px;color:black;"></i>Notifications <div class  = "count"><?php echo $row[0]?></div></a></li>
                <li><a href="/leafy-main/customer/forum/forum.php"><i class="fa-solid fa-comments"  style="font-size:16px;color:black;"></i>Forum</a></li>
                <li><a href="/leafy-main/customer/history/history.php"><i class="fa-solid fa-gauge-high"  style="font-size:16px;color:black;"></i>History</a></li>
                <li><a href="/leafy-main/customer/location/location.php"><i class="fa-solid fa-location-arrow"  style="font-size:16px;color:black;"></i>Location</a></li>
               
            </ul>

        </div>



</body>


</html>