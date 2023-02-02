
<?php 
require "connect.php";
require "../public/Auth.php";
include '../public/includes/header.view.php';
?>

<html>
<link rel="stylesheet" href="../public/CSS/style.css">

   <title>Home
</title> 
<body>

<div class = "home_body">
<ul>
<li><img src = "../public/images/items.png" width = "200px" height = "300px" class = "responsive"></li>
<li><img src = "../public/images/posts.png" width = "200px" height = "300px" class  = "responsive"></li>
<li><img src = "../public/images/courses.png" width = "200px" height = "300px" class = "responsive"></li>
<li><img src = "../public/images/blogs.png" width = "200px" height = "300px"></li>

</ul>
</div>

<div class = "home_text">
<ul>
<li><a href="items" ><Button>Items </Button></a></li>
<li><a href="posts" ><Button>  Posts </Button></a></li>
<li><a href="courses" ><Button>  Courses</Button></a></li>
<li><a href="blogs" ><Button>  Blogs </Button></a></li>
</ul>
</div>


</body>


<?php include '../public/includes/footer.view.php'?>

