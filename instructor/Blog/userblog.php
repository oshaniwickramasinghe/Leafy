<?php
include '../includes/header.php';
$user_ID=$_SESSION['USER_DATA']['user_id'];

if(!isset($user_ID)){
    header('location:../login/login.view.php');
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
            $user_id=$record2['user_id'];
            $content1=$record2['content1'];
           // $comment=$record2['comment'];
            $time=$record2['time'];
            $image1=$record2['image1'];
            $background_color=$record2['background_color'];

        }
        
    }
}

    $sql="SELECT * from user WHERE user_id=$user_id";
    $result=mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)>0){
        $fetch= mysqli_fetch_assoc($result);
    }

   
    $query="SELECT blog.blog_id, CONCAT(user.fname,' ' , user.lname) AS author , blog.date, blog.title, blog.content1, blog.topic, blog.image1, blog.description
    FROM blog
    INNER JOIN user ON blog.user_id=user.user_id ";
    /*  where blog.Verified=1";*/

    $result2= mysqli_query($conn, $query);

 ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>userblog</title>
    <!--slick carousel-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="userblog.css">
    <!--font-awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
</head>
<body>
    <div class="container">
        
        <div class="begin" style="background:url(../images/<?php if(isset ($image1)){ echo $image1;} ?>) no-repeat center center / cover;">
        </div>
        <div class="main" id="main">
            <h2><?php if(isset ($title)){ echo $title;} ?></h2> 
            <div class="profile-container">
                <div class="profile">
                    <div class="img-container">
                        <?php if($fetch['image'] == ''){
                                    echo '<img src="../images/profilepic_icon.svg" >';
                                }else{
                                    echo '<img src="../images/'.$fetch['image'].'" align="middle" width="100%" style="border-radius:100%;">';
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
                    <div class="content-img">
                        <div class="text"> 
                            <p><?php if(isset ($content1)){ echo $content1;} ?></p>
                        </div>
                    </div>
                </div> 
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
            <i class="fa-solid fa-chevron-left prev"></i>
            <i class="fa-solid fa-chevron-right next "></i>
        <div class="cards-container">

            <?php while($record=mysqli_fetch_assoc($result2)){?>
            <div class="cards-container-one">
                <div class="img-holder">
                    <img src="../images/<?php if(isset ($record['image1'])){ echo $record['image1'];} ?>" class="slider-image">
                    <a href="userblog.php?view_blog=<?=$record['blog_id']; ?>" class="show_more">show more</a>
                </div>
                <div class="card-text">
                    <h4><?php if(isset ($record['title'])){ echo $record['title'];} ?></h4>
                    <p><?php if(isset ($record['description'])){ echo substr($record['description'],0,70,).'....';} ?></p>
                        <div class="post-info">
                            <i class="fa-solid fa-user"></i>&nbsp;<?php if(isset ($record['author'])){ echo $record['author'];} ?></i> &nbsp; &nbsp;
                            <i class="fa-sharp fa-regular fa-calendar-days"></i>&nbsp;<?php if(isset ($record['date'])){ echo $record['date'];} ?></i>
                        </div>
                </div>
            </div> 
            <?php }?>
            </div>
        <div class="button">
            <a href="theBlog.php" class="btn">view more</a>
        </div>
</div> 
</div>
<footer>
    <?php include '../includes/footer.php'; ?>
</footer>

<!--jQuery-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!--slick carousel-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>

    // get the php value to JS variable
    const savedColor = "<?php echo $background_color ?>";
    

    // Set the background color of a div to the saved color
    const div = document.getElementById('main');
    div.style.backgroundColor = savedColor;

    //slick carousel
    $('.cards-container').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: false,
        autoplaySpeed: 2000,
        nextArrow: $('.next'),
        prevArrow: $('.prev'),
    });

</script>
</body>
</html>