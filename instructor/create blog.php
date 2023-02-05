<?php
 include 'config.php';
 include 'header.php';
 $user_ID = $_SESSION['user_ID'];

 if(isset($_POST['submit']))
 {
   /* $blog_ID=mysqli_real_escape_string($conn,$_POST['blog_ID']); */
    $title=mysqli_real_escape_string($conn,$_POST['title']);
    $content=mysqli_real_escape_string($conn,$_POST['content']);
    $image=$_FILES['image']['name'];
    $image_size=$_FILES['image']['size'];
    $image_tmp_name=$_FILES['image']['tmp_name'];
    $image_folder="images/".$image;
    


    $sql1=" INSERT INTO blog(title,content,comment,image,user_ID) Values ('$title','$content','$comment','$image','$user_ID')";
   
    $result1=mysqli_query($conn,$sql1);
    if($result1){
        move_uploaded_file($image_tmp_name, $image_folder);
       echo"<script>alert('Details added');window.location.href='blog.php';</script>";
    }else{
        echo"Error: " . $sql1 . "<br>" . mysqli_error($conn);
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
    
        <form action="" method="post" enctype="multipart/form-data">
          <div class="field">
            <div>
                <label for="title">Title</label>
                <input type="text" id="title" name="title" placeholder="Title of the Blog..." class="text_input" required><br>
            </div>
            <div>
                <label for="content">Content</label>
                <textarea for="content" id="content" name="content" class="text_input" required></textarea><br>
            </div>
            <div>
                <label for="image">Attach images</label>
                <input type="file" name="image" class="text_input" accept="image/jpg, image/jpeg, image/png"><br>
            </div>
          </div>
            <div align="right">
            <input type="submit" value="Submit" name="submit" class="btn">
        </div>
            
         </form>

         
         
            
    </div>
    <footer style="background:url(images/Footer.svg)no-repeat;"class="footer">
        <ul class="footer">
            <li><a href=""><i class="fa-brands fa-facebook" style="font-size:30px;color:#FCFEF9;"></i></a></li>
            <li><a href=""><i class="fa-brands fa-instagram" style="font-size:30px;color:#FCFEF9;"></i></a></li>
            <li><a href=""><i class="fa-solid fa-envelope" style="font-size:30px;color:#FCFEF9;"></i></a></li>
        </ul>
        <div class="footer-copyright">
            <p>copyright @2022 Leafy All Rights Reserved</p>
        </div>

    </footer>

        <script src="blog.js"></script>
    <script src="">

    </script>
</body>
</html>