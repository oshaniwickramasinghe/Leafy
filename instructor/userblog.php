<?php
include 'header.php';
$user_ID=$_SESSION['USER_DATA']['user_id'];

if(!isset($user_ID)){
    header('location:../login.view.php');
}

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

    $sql="SELECT * from user WHERE user_id=$user_ID";
    $result=mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)>0){
        $fetch= mysqli_fetch_assoc($result);
    }



 ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>userblog</title>
    <link rel="stylesheet" href="userblog.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container">
        <div class="begin">
        </div>
        <div class="main">
            <h2><?php if(isset ($title)){ echo $title;} ?></h2> 
            <div class="profile-container">
                <div class="profile">
                    <div class="img-container">
                        <?php if($fetch['image'] == ''){
                                    echo '<img src="images/profilepic_icon.svg" >';
                                }else{
                                    echo '<img src="./images/'.$fetch['image'].'>';
                                }
                        ?>
                    </div>
                    <div class="text">
                        <h4><?php if(isset ($fetch['fname'])){ echo $fetch['fname']." ".$fetch['lname'];} ?></h4>
                        <p><?php if(isset ($date)){ echo $date;} ?></p>
                    </div>    
                </div>
                    <div class="button">
                        <a href="#" class="btn">passion</a>
                    </div>
            </div>
            <div class="content">
                <div class="first_para">
                    <h4>This is the first title</h4>
                    <div class="content-img">
                        <div class="text"> 
                            <p><?php if(isset ($content)){ echo $content;} ?></p>
                        </div>
                        <div class="image"> 
                            <img src="./images/<?php if(isset ($image)){ echo $image;} ?>">
                        </div>
                    </div>
                </div>
                <diV class="second_para">
                    <h4>This is the second title</h4>
                    <div class="content-img">
                        <div class="image">
                            <img src="./images/<?php if(isset ($image)){ echo $image;} ?>">
                        </div>
                        <div class="text"> 
                            <p><?php if(isset ($content)){ echo $content;} ?></p>
                        </div> 
                    </div>
                </diV>
                <diV class="third_para">
                    <h4>This is the third title</h4>
                    <div class="content-img">
                        <div class="text"> 
                            <p><?php if(isset ($content)){ echo $content;} ?></p>
                        </div>
                        <div class="image">
                            <img src="./images/<?php if(isset ($image)){ echo $image;} ?>">
                        </div>    
                    </div>
                </diV>
                <diV class="last_para">
                    <h4>This is the last title</h4>
                    <div class="content-img">
                        <div class="image">
                            <img src="./images/<?php if(isset ($image)){ echo $image;} ?>">
                        </div> 
                        <div class="text"> 
                            <p><?php if(isset ($content)){ echo $content;} ?></p>
                        </div>
                    </div>
                </diV>
            </div>
            <div class="tags">
                <p>tags:</p>
                <a href="#">courses</a>
                <a href="#">work shops</a>
            </div>
        </div>
    </div>

    <div class="articles">
        <div class="articles-heading">
            <h5>ARTICLES</h5>
            <h6>recent blog</h6>
        </div>
    <div class="cards">
        <div class="cards-container">
            <div class="cards-container-one">
                <div class="img-holder">
                    <a href="#">passion</a>
                </div>
                <div class="card-text">
                    <h4>8 Startups that are Revolutionizing AgTech</h4>
                    <p>Agriculture is changing rapidly in the modern age. The global population is rising at an alarming rate and consumer preferences are shifting towards organic and sustainably produced goods. To keep up with these demands, the traditional agriculture industry must adopt new technologies to make farms more efficient and automate production</p>
                </div>
            </div>
            <div class="cards-container-two">
                <div class="img-holder">
                    <a href="#">passion</a>
                </div>
                <div class="card-text">
                    <h4>Indoor Vertical Farming: The New Era of Agriculture</h4>
                    <p>As the world's population grows exponentially, our total supply of fruits and vegetables is falling 22% short of global nutritional needs. Traditional farming methods are having difficulties meeting this demand as it faces increasing problems such as water shortage, land scarcity, and an aging farming population with decreased interest from newer generations. In recent years,</p>
                </div>
            </div>
            <div class="cards-container-three">
                <div class="img-holder">
                    <a href="#">passion</a>
                </div>
                <div class="card-text">
                    <h4>New Agriculture Technology in Modern Farming</h4>
                    <p>As the world's population grows exponentially, our total supply of fruits and vegetables is falling 22% short of global nutritional needs. Traditional farming methods are having difficulties meeting this demand as it faces increasing problems such as water shortage, land scarcity, and an aging farming population with decreased interest from newer generations. In recent years,</p>
                </div>
            </div>
        </div>
        <div class="button">
            <a href="#" class="btn">view more</a>
        </div>
    </div>
<footer>
    <?php include 'footer.php'; ?>
</footer>
    
</body>
</html>