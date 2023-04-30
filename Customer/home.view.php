
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="../Customer/CSS/style.css">

<link rel="stylesheet" href="../Customer/CSS/delivery.css">

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
<img src = "images/Footer.svg"  height= "121.42px"  style = "margin-top:auto">
</div>

</body>




