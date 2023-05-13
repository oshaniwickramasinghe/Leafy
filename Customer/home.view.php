
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="../Customer/CSS/style.css">

<link rel="stylesheet" href="../Customer/CSS/delivery.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" 
 integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" 
 referrerpolicy="no-referrer" />
<?php 
require "login/Auth.php";
include 'includes/header.view.php';

?>



   <title>Home
</title> 
<body>
<div class = "para">


<p><b>Agriculture </b>is the art and science f cultivating the soil,
growing crops and raising livestock.<br>It includes the preparation 
of plant and animal products for people to use and their distribution to markets.
Here you will find numerous resources to grow your business and a platform to 
sell and by products.</p>
</div>
<div class = "home_view_body">
<ul>
<li><a href="post/Vegetable.php?page=1" ><div class  = "container "><Button class = "btn">Vegetables & Fruits </Button><img src = "images/v.png" width = "200px" height = "300px" class = "responsive"></div></a></li>
<li><a href="post/seed.php?page=1" ><div class  = "container "><Button class = "btn">Seeds </Button><img src = "images/s.png" width = "200px" height = "300px" class  = "responsive"></a></div></li>
<li><div class  = "container "><Button class = "btn">Blog </Button><img src = "images/b.png" width = "200px" height = "300px" class = "responsive"></div></li>
<li><div class  = "container "><Button class = "btn">Courses </Button><img src = "images/c.png" width = "200px" height = "300px"></div></li>

</ul>
</div>

<!-- <div class = "home_text">
<ul>
<li><a href="Vegetables" ><Button>Vegetables & Fruits </Button></a></li>
<li><a href="seeds" ><Button>  Seeds </Button></a></li>
<li><a href="blogs" ><Button>  Blogs</Button></a></li>
<li><a href="courses" ><Button>  Courses </Button></a></li>
</ul>
</div> -->

<div class  = "footer">
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




