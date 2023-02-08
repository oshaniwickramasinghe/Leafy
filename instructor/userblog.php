<?php
include 'header.php';

$user_ID=$_SESSION['USER_DATA']['user_id'];

if(isset($_GET['view_blog']))
{
    $blog_ID = $_GET['view_blog'];
    $sql3 = "SELECT * FROM blog WHERE blog_id=$blog_ID";
    $result3=mysqli_query($conn,$sql3);
    
    if($result3)
    { 
        
       
        while($record2 = mysqli_fetch_assoc($result3))
         {
            $blog_ID=$record2['blog_id'];
            $title=$record2['title'];
            $date=$record2['date'];
           // $author=$record2['author'];
            $content=$record2['content'];
           // $comment=$record2['comment'];
            $time=$record2['time'];
            $image=$record2['image'];

    }
        
    }
}


if(!isset($user_ID)){
    header('location:../login.view.php');
}
 ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>userblog</title>
    <link rel="stylesheet" href="./css/userblog.php">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="main">
        <div class="header">

        </div>
        <div class="container">
            <h1><?php if(isset ($title)){ echo $title;} ?></h1> 
                <div class="first_para">
                    <h2>This is the first title</h2> 
                    <img src="./images/<?php if(isset ($image)){ echo $image;} ?>">
                    <?php if(isset ($content)){ echo $content;} ?>
                </div>
                <diV class="second_para">
                    <h2>This is the second title</h2>
                    <img src="./images/<?php if(isset ($image)){ echo $image;} ?>">
                    <?php if(isset ($content)){ echo $content;} ?>
                </diV>
                <diV class="third_para">
                    <h2>This is the third title</h2>
                    <img src="./images/<?php if(isset ($image)){ echo $image;} ?>">
                    <?php if(isset ($content)){ echo $content;} ?>
                </diV>
                <diV class="last_para">
                    <h2>This is the last title</h2>
                    <img src="./images/<?php if(isset ($image)){ echo $image;} ?>">
                    <?php if(isset ($content)){ echo $content;} ?>
                </diV>

        </div>
    </div>
<footer>
    <?php include 'footer.php'; ?>
</footer>
    
</body>
</html>