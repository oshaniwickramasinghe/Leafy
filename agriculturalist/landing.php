<?php 

include '../public/Auth.php';
include 'include/header.view.php';

// include 'database.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="agristyle.css">
    <link rel="stylesheet" href="CSS/delivery.css">
    <link rel="stylesheet" href="CSS/style.css">

    <title>Agriculturalist Home</title>
</head>
<body>
<?php include "createpost_menu.php" ?>
      <div class="home_body"> 



<div style="margin-left:" class = "loggedhome_body">


<div style="margin-left:" class = "landing_home_body">
   <ul>
      <li><img src = "photos/post.jpg" style="border-radius: 50px;" width = "200px" height = "200px" class = "responsive"></li>
      <li><img src = "photos/courses.jpg" width = "200px" height = "200px" class  = "responsive"></li>
      <li><img src = "photos/reports.png" width = "200px" height = "200px" class = "responsive"></li>
      <li><img src = "photos/blogs.jpg" style="border-radius: 50px;" width = "200px" height = "200px" class = "responsive"></li>

   </ul>
</div>

<div style="margin-left:15px" class = "landing_home_text">
   <ul>
      <li><a href="createpost/postview.php" ><Button style="background-color:#33ca93">My Posts </Button></a></li>
      <li><a href="posts" ><Button style="background-color:#33ca93">Courses </Button></a></li>
      <li><a href="reports/agriD.php" ><Button style="background-color:#33ca93">Repots</Button></a></li>
      <li><a href="blogs" ><Button style="background-color:#33ca93">Blogs </Button></a></li>
   </ul>
</div>

</div>
      </div>
</body>
<footer>
<img src = "include/footer.php"  >
</footer>
</html>
