<?php
 include'connect.php';
 if(isset($_POST['submit']))
 {
   /* $blog_ID=mysqli_real_escape_string($conn,$_POST['blog_ID']); */
    $title=mysqli_real_escape_string($conn,$_POST['title']);
    $author=mysqli_real_escape_string($conn,$_POST['author']);
    $content=mysqli_real_escape_string($conn,$_POST['content']);
    $comment=mysqli_real_escape_string($conn,$_POST['comment']);
    $date=mysqli_real_escape_string($conn,$_POST['date']);

    $sql1=" INSERT into blog(title,author,content,comment,date) values('$title','$author','$content','$comment','$date')";
    $sql2="SELECT blog_ID,title,author,content,comment,date FROM blog";

    $result1=mysqli_query($conn,$sql);
    if($result){
       echo"<script>alert('Details added');window.location.href='blog.php';</script>";
    }else{
        echo"Error: " . $sql2 . "<br>" . mysqli_error($conn);
    }

    $result2= mysqli_query($conn, $sql2);
    echo "<table id = 'blog'>";
    echo "<tr>";
        echo "<th>blog_ID</th>";
    echo"</tr>";

    if(mysqli_num_rows($result2)>0){
        while($row=mqsqli_fetch_assoc($result2t))
    }
 }

?> 



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="blog.css">
    <title>instructor blog page</title>
</head>
<body>
    <header></header>
    <div class="instructor_wrapper">
        <div class="left_menu_bar">
            <ul>
                <li><a href="">Questions</a></li>
                <li><a href="blog.php">Blogs</a></li>
                <li><a href="">Courses</a></li>
            </ul>
        </div>
        <div class="content">
            <h2>Blog</h2>
            <div class="container">
            <div class="container_right">
                <p>Your blog list</p>
                <div class="card">
                    <form action="#" method="POST" >
                        <ul>
                        <li><a href="">Blog <?php if(isset($_POST['submit'])) echo "$blog_ID";?> </a></li>
                        </ul>
                    </form>
                </div>
            </div>
            <div class="container_left"></div>
           </div>
            <button type="button" id="create">create</button>
            
        </div>

    </div>
    <script src="">

    </script>
</body>
</html>