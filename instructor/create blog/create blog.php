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
   

    $result1=mysqli_query($conn,$sql1);
    if($result1){
       echo"<script>alert('Details added');window.location.href='blog.php';</script>";
    }else{
        echo"Error: " . $sql2 . "<br>" . mysqli_error($conn);
    }


    
 }

?> 





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="create blog.css">
    <title>create blog</title>
</head>
<body>
    <header></header>
    <h1>Create a Blog Page</h1>
    <div class="create_form_wrapper">
    
        <form action="blog.php" method="post">
          <div class="field">
            <div>
                <label for="title">Title</label>
                <input type="text" id="title" name="title" placeholder="Title of the Blog..." class="text_input"><br>
            </div>
            <div>
                <label for="author">Author</label>
                <input type="text" id="title" name="author" placeholder="Name of the Author..." class="text_input"><br>
            </div>
            <div>
                <label for="content">Content</label>
                <input for="content" id="content" name="content" class="text_input"><br>
            </div>
            <div>
                <label for="comment"></label>
                <input type="text" id="comment" name="comment" placeholder="Comments..." class="text_input"><br>
            </div>
            <div>
                <label for="date">Date</label>
                <input type="date" id="date" name="date" class="text_input"><br>
            </div>
          </div>
            <div align="right">
            <input type="submit" value="Submit" name="submit" class="btn">
        </div>
            
         </form>

         
         
            
    </div>
    <script src="">

    </script>
</body>
</html>