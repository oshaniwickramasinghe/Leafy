<?php
include "../includes/header.php";

$sql= "SELECT blog.blog_id, CONCAT(user.fname,' ' , user.lname) AS author , blog.date, blog.title, blog.content1, blog.topic, blog.image1
       FROM blog
       INNER JOIN user ON blog.user_id=user.user_id";
$result= mysqli_query($conn, $sql);


?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../images/fontawesome/css/all.css" />
    <link rel="stylesheet" href="theBlog.css">
    <title>The Blog Page</title>
</head>

<body>
    <div class="page-wrapper">
        <div class="page-slider">
            <h1 class="slider-title">Trending Posts</h1>
            <i class="fa-solid fa-chevron-left prev"></i>
            <i class="fa-solid fa-chevron-right next "></i>
            <div class="post-wrapper">
                        <?php while($record=mysqli_fetch_assoc($result)){?>
                        <a href="userblog.php?view_blog=<?=$record['blog_id']; ?>"><div class="post"> 
                            <img src="../images/<?php if(isset ($record['image1'])){ echo $record['image1'];} ?>" class="slider-image">
                            <h4><?php if(isset ($record['title'])){ echo $record['title'];} ?></h4>

                            <div class="post-info">
                                <i class="fa-solid fa-user"></i>&nbsp;<?php if(isset ($record['author'])){ echo $record['author'];} ?></i> &nbsp; &nbsp;
                                <i class="fa-sharp fa-regular fa-calendar-days"></i>&nbsp;<?php if(isset ($record['date'])){ echo $record['date'];} ?></i>
                            </div>
                        </div>
                        </a>
                        <?php }?>
            </div>
        </div>
        <!--content-->
        <div class="content clearfix">
            <div class="main-content">
                <h1 class="recent-post-title">Recent Post</h1>
                <div class="post">
                    <img src="../images/vege5.jpg" alt="" class="post-image">
                    <div class="post-review">
                        <h3><a href="userBlog.php">The benefit of organic farming</a></h3>
                        <i class="fa-solid fa-user"></i>&nbsp;name</i> 
                        &nbsp; &nbsp;
                        <i class="fa-sharp fa-regular fa-calendar-days"></i>&nbsp;date</i><br>
                        <p class="preview-text">Organic agriculture reduces non-renewable energy use by
                            decreasing agrochemical needs (these require high quantities of fossil fuel to be produced).
                            Organic agriculture contributes to mitigating the greenhouse effect and global warming through
                            its ability to sequester carbon in the soil.</p><br>
                        <a href="userBlog.php" class="btn read-more">Read More</a>

                    </div>
                </div>

                <div class="post">
                    <img src="../images/vege5.jpg" alt="" class="post-image">
                    <div class="post-review">
                        <h3><a href="userBlog.php">The benefit of organic farming</a></h3>
                        <i class="fa-solid fa-user"></i>&nbsp;name</i> 
                        &nbsp; &nbsp;
                        <i class="fa-sharp fa-regular fa-calendar-days"></i>&nbsp;date</i><br>
                        <p class="preview-text">Organic agriculture reduces non-renewable energy use by
                            decreasing agrochemical needs (these require high quantities of fossil fuel to be produced).
                            Organic agriculture contributes to mitigating the greenhouse effect and global warming through
                            its ability to sequester carbon in the soil.</p><br>
                        <a href="userBlog.php" class="btn read-more">Read More</a>

                    </div>
                </div>

                <div class="post">
                    <img src="../images/vege5.jpg" alt="" class="post-image">
                    <div class="post-review">
                        <h3><a href="userBlog.php">The benefit of organic farming</a></h3>
                        <i class="fa-solid fa-user"></i>&nbsp;name</i> 
                        &nbsp; &nbsp;
                        <i class="fa-sharp fa-regular fa-calendar-days"></i>&nbsp;date</i><br>
                        <p class="preview-text">Organic agriculture reduces non-renewable energy use by
                            decreasing agrochemical needs (these require high quantities of fossil fuel to be produced).
                            Organic agriculture contributes to mitigating the greenhouse effect and global warming through
                            its ability to sequester carbon in the soil.</p><br>
                        <a href="userBlog.php" class="btn read-more">Read More</a>

                    </div>
                </div>

                <div class="post">
                    <img src="../images/vege5.jpg" alt="" class="post-image">
                    <div class="post-review">
                        <h3><a href="userBlog.php">The benefit of organic farming</a></h3>
                        <i class="fa-solid fa-user"></i>&nbsp;name</i> 
                        &nbsp; &nbsp;
                        <i class="fa-sharp fa-regular fa-calendar-days"></i>&nbsp;date</i><br>
                        <p class="preview-text">Organic agriculture reduces non-renewable energy use by
                            decreasing agrochemical needs (these require high quantities of fossil fuel to be produced).
                            Organic agriculture contributes to mitigating the greenhouse effect and global warming through
                            its ability to sequester carbon in the soil.</p><br>
                        <a href="userBlog.php" class="btn read-more">Read More</a>
                        
                    </div>
                </div>
            </div>
            <div class="slidbar">
                <div class="section-search">
                    <h2 class="section-title">search</h2>
                    <form action="userblog.php" method="post">
                        <input type="text" name="search-term" class="text-input" placeholder="search...">
                    </form>        
                </div>
                <div class="section-topics">
                    <h2 class="section-title">Topics</h2>
                    <ul>
                         <li><a href="#">Agronomy</a></li>
                         <li><a href="#">Horticulture</a></li>
                         <li><a href="#">Soil Science</a></li>
                         <li><a href="#">Plant Pathology</a></li>
                         <li><a href="#">Entomology</a></li>
                         <li><a href="#">Agricultural Engineering</a></li>
                         <li><a href="#">Agricultural Economics</a></li>
                         <li><a href="#">Agricultural Extension</a></li>
                         <li><a href="#">Agroforestry</a></li>
                </ul>
                </div>
            </div>
    

        </div>
    </div>

    <div align="right">
        <a href=".php" class="goback-btn">go back >></a> 
    </div> 

    <!--jQuery-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!--Slick Carousel -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    
    <!--fontawesome-->
    <script src="https://kit.fontawesome.com/e32c8f0742.js" crossorigin="anonymous"></script>

    <script>
    $(document).ready(function() {
        $('.post-wrapper').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            nextArrow: $('.next'),
            prevArrow: $('.prev'),
            responsive: [
        {
            breakpoint: 1024,
            settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
            infinite: true,
            dots: true
            }
        },
        {
            breakpoint: 600,
            settings: {
            slidesToShow: 2,
            slidesToScroll: 2
            }
        },
        {
            breakpoint: 480,
            settings: {
            slidesToShow: 1,
            slidesToScroll: 1
            }
        }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
        ] 
        });
    }); 
    </script>


<footer><?php include "../includes/footer.php";?></footer>


</body>

</html>