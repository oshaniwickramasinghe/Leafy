<?php
 include 'config.php';
 include 'header.php';
 $user_ID = $_SESSION['user_ID'];

 $update = false;

 $blog_ID="";
 $title="";
 $date="";
 $author="";
 $content="";
 $comment="";
 $time="";
 $image="";

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



 if(isset($_GET['edit']))
 {
     $blog_ID = $_GET['edit'];


     $query3 = "SELECT * FROM blog WHERE blog_ID=$blog_ID";
     $stmt3 = mysqli_query($conn,$query3);
     

     
     if($stmt3){
         while($record3 = mysqli_fetch_assoc($stmt3))
         {
             $blog_ID=$record3['blog_ID'];
             $title=$record3['title'];
             $date=$record3['date'];
             $author=$record3['author'];
             $content=$record3['content'];
             $comment=$record3['comment'];
             $time=$record3['time'];
             $image=$record3['image'];
         }
        
     }else{
         echo "<script>alert('Failed to delete from database')</script>";
     }

     $update = true;
 }

 if(isset($_POST['update'])){
    $blog_ID=$_POST['blog_ID'];
    $title=$_POST['title'];
    $date=$_POST['date'];
    $author=$_POST['author'];
    $content=$_POST['content'];
    $comment=$_POST['comment'];
    $time=$_POST['time'];
    $image=$_POST['oldimage'];

    if(isset($_FILES['image']['name']) && ($_FILES['image']['name']!= ""))
    {
        $newimage=$_FILES['image']['name'];
        $newimage_size=$_FILES['image']['size'];
        $newimage_tmp_name=$_FILES['image']['tmp_name'];
        $image_folder="images/".$newimage;
        move_uploaded_file($newimage_tmp_name, $image_folder);

    }
    else{
        $newimage = $image;
    }

    $query =  mysqli_query($conn,"UPDATE blog SET blog_ID='$blog_ID', title='$title', date=' $date', 
    author='$author', content='$content', comment='$comment', time='$time', image='$newimage' WHERE blog_ID='$blog_ID'") 
    or die('query failed');

    if($query)
    {
        $message[]='update your details successfully!';
        ?>
        <META http-equiv="Refresh" content="6; URL=http://localhost/leafy/instructor/blog.php">
        <?php
    }else{
        $message[]="registered failed!";
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
    <?php
        if(isset($message)){
            foreach($message as $message){
    ?>
            <div class="message"> 
                <p><?php  echo $message;?></p>
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            </div>
    <?php
            }
        }
    ?>

    <h1>Create a Blog Page</h1>
    <div class="create_form_wrapper">
    
        <form action="" method="post" enctype="multipart/form-data">
            
          <div class="field">
            <div>
                <input type="hidden" name="blog_ID" value="<?= $blog_ID;?>">
                <input type="hidden" name="date" value="<?= $date;?>">
                <input type="hidden" name="author" value="<?= $author;?>">
                <input type="hidden" name="comment" value="<?= $comment;?>">
                <input type="hidden" name="time" value="<?= $time;?>">
            </div>
            <div>
                
                <label for="title">Title</label>
                <input type="text" id="title" name="title" placeholder="Title of the Blog..." class="text_input" value="<?= $title; ?>" required><br>
            </div>
            <div>
                <label for="content">Content</label>
                <textarea for="content" id="content" name="content" class="text_input"  value="" required></textarea><br>
            </div>
            <div>
                <label for="image">Attach images</label>
                <input type="hidden" name="oldimage" value="<?= $image; ?>">
                <input type="file" name="image" class="text_input" accept="image/jpg, image/jpeg, image/png"><br>
            </div>
            <?php if($update == true) {?>
                <div>
                    <img src="./images/<?= $image; ?>" width ="120" class="img-thumbnail">
                </div>
            <?php } else {?>
                <div>
                    <img src="./images/<?= $image; ?>" width ="120" class="img-thumbnail" style="visibility:hidden" >
                </div>
            <?php } ?>
          </div>
            <div align="right">
                <?php if($update == true) {?>
                    <input type="submit" value="Update Blog" name="update" class="btn">
                <?php } else {?>     
                    <input type="submit" value="Submit" name="submit" class="btn">
                <?php } ?>
        </div>
            
         </form>
      
    </div>
    <div align="right">
        <a href="blog.php" class="goback-btn">go back >></a> 
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

    
    <script>
        document.getElementById("content").value = "<?= $content;?>";
    </script>
</body>
</html>