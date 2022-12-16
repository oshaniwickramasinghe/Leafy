<?php
 include 'connect.php';
 session_start();
 $user_ID = $_SESSION['user_ID'];
 $first_name=$_SESSION['fname'];
 $last_name= $_SESSION['lname'];

 if(isset($_POST['submit']))
 {
   /* $blog_ID=mysqli_real_escape_string($conn,$_POST['blog_ID']); */
    $title=mysqli_real_escape_string($conn,$_POST['title']);
    $content=mysqli_real_escape_string($conn,$_POST['content']);
    $auther=mysqli_real_escape_string($conn,$_POST['auther']);
    $comment=mysqli_real_escape_string($conn,$_POST['comment']);
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
    <script src="">

    </script>
</body>
</html>