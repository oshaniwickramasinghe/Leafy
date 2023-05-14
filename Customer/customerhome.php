

<link rel="stylesheet" href="../Customer/CSS/delivery.css">
<?php 
include"database/database.php";
require "login/Auth.php";
include 'includes/header.php';

$uid  = $_SESSION['USER_DATA']['user_id'];
if(!isset($user_ID)){
    header('location:/leafy-main/customer/login/login.view.php');
  };

$count = 0;
if(isset($_SESSION['cart'])){
foreach($_SESSION['cart'] as $keys => $values){
$count +=1;
}
}
// var_dump($count);
$sql  = "SELECT COUNT(*) FROM notification WHERE status = 0 && customer_id = $uid ";
$result = mysqli_query($conn,$sql);
$row  = mysqli_fetch_array($result);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Customer/CSS/style.css">
    <link rel="stylesheet" href="../Customer/CSS/delivery.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" 
 integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" 
 referrerpolicy="no-referrer" />

<title>
     Home
</title>
    <link rel="stylesheet" 
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<!-- <div class  =  "search">
       <input  type = "search" placeholder = "Search for items.."  name= "search">
      <a  class = "search_button" href="#" aria-label="search">
       <div class = "icon">
        <i class="fa fa-search" aria-hidden="true"></i>
        </div>
       </a>
 </div> -->


       

<body>
<div class = "loggedhome_body">
   
<div class="left_menu_bar">
            <div id="menu">
                <a><i class="fa-solid fa-bars"></i></a>
                <div class="image"><img src="images/badge.svg" alt=""></div>
                <h3>Leafy</h3>
            </div>
            <ul>
                <li><a href="../Customer/customerhome.php"><i class="fa-solid fa-house"  style="font-size:16px;color:black;"></i>Home</a></li>
                <li><a href="../Customer/wishlist/wishlist.php"><i class="fa fa-list" aria-hidden="true" style="font-size:16px;color:black;"></i>Wishlist</a></li>
                <li ><a href="../Customer/notification/notification.php" style  =  "height:10%"><i  class="fa fa-bell" aria-hidden="true"style="font-size:16px;color:black;">
               </i>Notifications<div class  = "count"><?php echo $row[0]?></div> </a></li>
                <li><a href="../Customer/forum/forum.php"><i class="fa-solid fa-comments"  style="font-size:16px;color:black;"></i>Forum</a></li>
                <li><a href="../Customer/history/history.php"><i class="fa-solid fa-gauge-high"  style="font-size:16px;color:black;"></i>History</a></li>
                <li><a href="../Customer/location/location.php"><i class="fa-solid fa-location-arrow"  style="font-size:16px;color:black;"></i>Location</a></li>
            </ul>

</div>

<div class = "home_body">
<div class = "shopping">
<a href="../Customer/shopping_cart/cart.view.php" ><button ><i class="fa fa-shopping-cart fa-2x" aria-hidden="true"></i> Cart<div class  = "count_2"><?php echo $count?></div> </button></a>
        
</div>

<ul>
<li><div class  = "container "><a href="post/Vegetable.php?page=1" ><Button class = "btn">Vegetables & Fruits </Button></a><img src = "images/v.png" width = "200px" height = "300px" ></div></li>
<li><div class  = "container "><a href="post/seed.php?page=1" ><Button class = "btn">Seeds </Button></a><img src = "images/s.png" width = "200px" height = "300px"></div></li>
<li><div class  = "container "><a href="/leafy-main/instructor/Blog/theBlog.php" ><Button class = "btn">Blog </Button></a><img src = "images/b.png" width = "200px" height = "300px"></div></li>
<li><div class  = "container "><a href="/leafy-main/instructor/course/theCourse.php" ><Button class = "btn">Courses </Button></a><img src = "images/c.png" width = "200px" height = "300px"></div></li>
</ul>
</div>

</div>


<div class="footer">

<div class="cont">
               <div class="Roww">
                   <div class="footer-col">
                       <h4>Leafy</h4>
                       
                         <p>  Leafy is an Agricultural E-commerce<br>  website that
                            can make your day-to-day <br>life easier
                         </p>
                       
                   </div>
                   
                   <div class="footer-col">
                       <h4>Contact US</h4>
                       <ul>
                        <i class='fas fa-phone-alt fa-lg'></i> &emsp; 0372234210<br>
                       <i class='fas fa-mail-bulk fa-lg'></i> &emsp;leafy2022.2023@gmail.com
                           <!-- <li><i class='fas fa-phone-alt fa-lg'></i>   0372234210</li> -->
                           <!-- <li><i class='fas fa-mail-bulk fa-lg'></i> leafy2022.2023@gmail.com </li> -->
                          
                       </ul>
                   </div>
                   <div class="footer-col">
                       <h4>follow us</h4>
                       <div class="social-links">
                           <a href="#"><i class="fab fa-facebook-f fa-1x"></i></a>
                           <a href="#"><i class="fab fa-twitter fa-1x"></i></a>
                           <a href="#"><i class="fab fa-instagram fa-1x"></i></a>
                           <a href="#"><i class="fab fa-linkedin-in fa-1x"></i></a>
                       </div>
                   </div>
               </div>
           </div>
</div>

</body>

</html>
