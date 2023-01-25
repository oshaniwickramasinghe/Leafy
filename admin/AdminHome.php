<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..\includes\css\style.css">
<title>
     Home
</title> 
</head>

<body>

<?php include '..\includes\header.view.php'; ?>
<?php include '..\includes\menu.view.php'; ?>

<div class = "home_body">
<ul>
<li><img src = "..\includes\images\items.png" width = "200px" height = "300px"></li>
<li><img src = "..\includes\images\posts.png" width = "200px" height = "300px"></li>
<li><img src = "..\includes\images\courses2.png" width = "200px" height = "300px"></li>
<li><img src = "..\includes\images\blogs.png" width = "200px" height = "300px"></li>
</ul>
</div>

<div class = "home_text">
<ul>
<li><a href="Vegetables" ><Button>Vegetables & Fruits </Button></a></li>
<li><a href="seeds" ><Button>  Seeds </Button></a></li>
<li><a href="blogs" ><Button>  Blogs</Button></a></li>
<li><a href="courses" ><Button>  Courses </Button></a></li>
</ul>
</div>

<?php include '..\includes\footer.view.php'; ?>
</body>



</html>