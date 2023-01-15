<?php $this->view('includes/header',$data)?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/assets/css/style.css">
<title>
     Home
</title> 
    <link rel="stylesheet" 
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>


    <div class  = "shopping">
<?php $this->view('includes/menu',$data)?>



<div class = "loggedhome_body">
<div class = "home_body">
<!-- <div class = "shopping">
<i class="fa fa-shopping-cart fa-2x" aria-hidden="true"></i>
        <button class = "cart" onclick="document.location='shopping_cart.php'"> Cart </button>
</div> -->

<ul>
<li><div class  = "container "><a href="Vegetables" ><Button class = "btn">Vegetables & Fruits </Button></a><img src = "../public/assets/images/v.png" width = "200px" height = "300px" ></div></li>
<li><div class  = "container "><a href="seeds" ><Button class = "btn">Seeds </Button></a><img src = "../public/assets/images/s.png" width = "200px" height = "300px"></div></li>
<li><div class  = "container "><a href="blog" ><Button class = "btn">Blog </Button></a><img src = "../public/assets/images/b.png" width = "200px" height = "300px"></div></li>
<li><div class  = "container "><a href="courses" ><Button class = "btn">Courses </Button></a><img src = "../public/assets/images/c.png" width = "200px" height = "300px"></div></li>
</ul>
</div>
</div>




</body>



</html>
<?php $this->view('includes/footer',$data)?>