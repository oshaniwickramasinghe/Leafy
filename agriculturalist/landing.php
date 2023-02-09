<?php 

include '../public/Auth.php';
include '../public/includes/header.view.php';
// include 'database.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="agristyle.css">
    <title>Agriculturalist Home</title>
</head>
<body>
<?php include "agri_menu.view.php"?>
      <div class="home_body"> 



<div style="padding-top:50px" class = "loggedhome_body">


<div class = "home_body">
   <ul>
      <li><img src = "photos/post.jpg" style="border-radius: 50px;" width = "200px" height = "200px" class = "responsive"></li>
      <li><img src = "photos/courses.jpg" width = "200px" height = "200px" class  = "responsive"></li>
      <li><img src = "photos/reports.png" width = "200px" height = "200px" class = "responsive"></li>
      <li><img src = "photos/blogs.jpg" style="border-radius: 50px;" width = "200px" height = "200px" class = "responsive"></li>

   </ul>
</div>

<div style="margin-left:15px" class = "home_text">
   <ul>
      <li><a href="postview.php" ><Button style="background-color:#33ca93">My Posts </Button></a></li>
      <li><a href="posts" ><Button style="background-color:#33ca93">Courses </Button></a></li>
      <li><a href="agriD.php" ><Button style="background-color:#33ca93">Repots</Button></a></li>
      <li><a href="blogs" ><Button style="background-color:#33ca93">Blogs </Button></a></li>
   </ul>
</div>

</div>
      </div>
</body>
<footer>
<img src = "../Customer/images/Footer.svg"  height= "121.3px"  style = "margin-top:auto">
</footer>
</html>
