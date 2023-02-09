
<?php 
require "database.php";
require "../public/Auth.php";
include '../public/includes/header.view.php';
?>

<html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" 
 integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" 
 referrerpolicy="no-referrer" />
<link rel="stylesheet" href="../public/CSS/style.css">

   <title>Home
</title> 
<body>

   
<?php include "../public/includes/admin_menu.view.php"?>


   <div class = "loggedhome_body">

   
   <div class = "home_body">
      <ul>
         <li><img src = "../public/images/items.png" width = "200px" height = "200px" class = "responsive"></li>
         <li><img src = "../public/images/posts.png" width = "200px" height = "200px" class  = "responsive"></li>
         <li><img src = "../public/images/courses.png" width = "200px" height = "200px" class = "responsive"></li>
         <li><img src = "../public/images/blogs.png" width = "200px" height = "200px" class = "responsive"></li>

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

   </div>

</body>


<?php include '../public/includes/footer.view.php'?>

