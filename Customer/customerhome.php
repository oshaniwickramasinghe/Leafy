<?php 

require "Auth.php";
include 'includes/header.view.php';



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Customer/CSS/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" 
 integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" 
 referrerpolicy="no-referrer" />

<title>
     Home
</title> 
    <link rel="stylesheet" 
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<div class  =  "search">
       <input  type = "search" placeholder = "Search for items.."  name= "search">
      <a  class = "search_button" href="#" aria-label="search">
       <div class = "icon">
        <i class="fa fa-search" aria-hidden="true"></i>
        </div>
       </a>
 </div>

 <div class="containerr">
        <div class="left_menu_bar">
            <div id="menu">
                <a><i class="fa-solid fa-bars"></i></a>
                <div class="image"><img src="images/badge.svg" alt=""></div>
                <h3>Leafy</h3>
            </div>
            <ul>
                <li><a href="../Customer/customerhome.view.php"><i class="fa-solid fa-house"  style="font-size:16px;color:black;"></i>Home</a></li>
                <li><a href="../Customer/wishlist/wishlist.php"><i class="fa fa-list" aria-hidden="true" style="font-size:16px;color:black;"></i>Wishlist</a></li>
                <li><a href=""><i  class="fa fa-bell" aria-hidden="true"style="font-size:16px;color:black;"></i>Notifications</a></li>
                <li><a href=""><i class="fa-solid fa-comments"  style="font-size:16px;color:black;"></i>Forum</a></li>
                <li><a href="blog.php"><i class="fa-solid fa-gauge-high"  style="font-size:16px;color:black;"></i>History</a></li>
            </ul>

        </div>
</div>




   


<body>
<div class = "loggedhome_body">

<div class = "home_body">
<div class = "shopping">
<a href="../Customer/shopping_cart/cart.view.php" ><button ><i class="fa fa-shopping-cart fa-2x" aria-hidden="true"></i> Cart </button></a>
        
</div>

<ul>
<li><div class  = "container "><a href="post/Vegetable.php" ><Button class = "btn">Vegetables & Fruits </Button></a><img src = "images/v.png" width = "200px" height = "300px" ></div></li>
<li><div class  = "container "><a href="seeds" ><Button class = "btn">Seeds </Button></a><img src = "images/s.png" width = "200px" height = "300px"></div></li>
<li><div class  = "container "><a href="blog" ><Button class = "btn">Blog </Button></a><img src = "images/b.png" width = "200px" height = "300px"></div></li>
<li><div class  = "container "><a href="courses" ><Button class = "btn">Courses </Button></a><img src = "images/c.png" width = "200px" height = "300px"></div></li>
</ul>
</div>
</div>




</body>



</html>
<?php include 'includes/footer.view.php'?>