<?php
include "../includes/header.php";

$posts = array();
$postsTitle ="Recent Posts";


$query="SELECT blog.blog_id, CONCAT(user.fname,' ' , user.lname) AS author , blog.date, blog.title, blog.content1, blog.topic, blog.image1, blog.description
       FROM blog
       INNER JOIN user ON blog.user_id=user.user_id ";
    /*  where blog.Verified=1";*/

$result2= mysqli_query($conn, $query);

/*function executeQuery($sql, $data)
{
    global $conn;

    $stmt = $conn ->prepare($sql);
    $values = array_values($data);
    $types = str_repeat{'s' , count($values)};
    $stmt->bind_param($types, ...$values);
    return $stmt;

}*/

function getPublishedPosts($page_first_result, $blog_per_page)
{
	global $conn;

	$sql1= "SELECT blog.blog_id, CONCAT(user.fname,' ' , user.lname) AS author , blog.date, blog.title, blog.content1, blog.topic, blog.image1, blog.description
           FROM blog
           INNER JOIN user ON blog.user_id=user.user_id
           LIMIT ".$page_first_result.", ".$blog_per_page;
		   /*  where blog.Verified=1"; */

    $stmt = $conn -> prepare($sql1);
    $stmt -> execute();
    $records = $stmt -> get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;

}

//pagination
$blog_per_page = 5;
$sql5            = "SELECT * FROM blog";
$result5         = mysqli_query($conn,$sql5);
$blog_count    = mysqli_num_rows($result5);


//rounds a number UP to the nearest integer
$number_of_page  = ceil($blog_count/ $blog_per_page);


if(!(isset($_GET['page']))){
    $page  = 1;
}else{
    $page = $_GET['page'];
}

$page_first_result= ($page-1)*  $blog_per_page;

function search($term,$page_first_result, $blog_per_page)
{
    global $conn;

    $match = '%'. $term .'%';

    $sql2="SELECT blog.blog_id, CONCAT(user.fname,' ' , user.lname) AS author , blog.date, blog.title, blog.content1, blog.topic, blog.image1, blog.description
           FROM blog
           INNER JOIN user ON blog.user_id=user.user_id /* where blog.Verified=1*/
           AND (blog.title LIKE ? OR blog.content1 LIKE ? OR blog.description LIKE ? OR blog.topic LIKE ?)
           LIMIT ".$page_first_result.", ".$blog_per_page;

    $stmt = $conn -> prepare($sql2);
    $stmt->bind_param('ssss', $match, $match, $match, $match);
	$stmt -> execute();
	$records = $stmt -> get_result()->fetch_all(MYSQLI_ASSOC);
	return $records;
}

function getPostByTopic($topic,$page_first_result, $blog_per_page)
{
    global $conn;

    $sql3="SELECT blog.blog_id, CONCAT(user.fname,' ' , user.lname) AS author , blog.date, blog.title, blog.content1, blog.topic, blog.image1, blog.description
    FROM blog
    INNER JOIN user ON blog.user_id=user.user_id /* where blog.Verified=1 AND*/
    WHERE blog.topic=?
    LIMIT ".$page_first_result.", ".$blog_per_page;

    $stmt = $conn -> prepare($sql3);
    $stmt->bind_param('s', $topic);
    $stmt -> execute();
	$records = $stmt -> get_result()->fetch_all(MYSQLI_ASSOC);
	return $records;


}







 if(isset($_POST['search-term']))
 {
    $postsTitle = "You searched for '" . $_POST['search-term'] ."'";
    $posts = search($_POST['search-term'],$page_first_result, $blog_per_page);

 }else if(isset($_GET['view'])){

    $postsTitle = "You searched for '" . $_GET['view'] ."'";
    $posts = getPostByTopic($_GET['view'],$page_first_result, $blog_per_page);

}else{
 $posts = getPublishedPosts($page_first_result, $blog_per_page);
}

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
                <?php while($record=mysqli_fetch_assoc($result2)){?>
                    <a href="userblog.php?view_blog=<?=$record['blog_id']; ?>">
                    <div class="post"> 
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
                <h1 class="recent-post-title"><?php echo $postsTitle?></h1>
                <?php foreach ($posts as $post): ?>
                    <div class="post"> 
                        <img src="../images/<?php if(isset ($post['image1'])){ echo $post['image1'];} ?>" class="post-image">
                        <div class="post-review">
                            <h3><?php if(isset ($post['title'])){ echo $post['title'];} ?></h3>
                            <div class="icon">
                                <i class="fa-solid fa-user"></i>&nbsp;<?php if(isset ($post['author'])){ echo $post['author'];} ?></i> &nbsp; &nbsp;
                                <i class="fa-sharp fa-regular fa-calendar-days"></i>&nbsp;<?php if(isset ($post['date'])){ echo $post['date'];} ?></i>
                            </div>
                            <p class="preview-text"><?php if(isset ($post['description'])){ echo substr($post['description'],0,200,).'....';} ?></p><br>
                            <a href="userblog.php?view_blog=<?=$post['blog_id'];?>" class="btn read-more">Read More</a>
    
                        </div>
                    </div>
                <?php endforeach; ?>
            <!--pagination-->
                <div class  = "pagination">
                    <?php
                    $records1 = getPublishedPosts($page_first_result, $blog_per_page);
                    $records2 = getPostByTopic($topic,$page_first_result, $blog_per_page);
                    $records3 = search($term,$page_first_result, $blog_per_page);
                    

                        if($page>= 2 ){
                        echo "<a class  =  'prev' href='theBlog.php?page=".($page-1)."'> Previous page  </a>";
                        }else{
                        echo "<a class  =  'prev' href='theBlog.php?page=".($page)."'> Previous page </a>";
                        }

                        for($i = 1; $i<= $number_of_page; $i++){
                        if($i== $page){
                        $pagLink= "<a class ='active' href='theBlog.php?page=".$i."'>$i</a>";
                        echo $pagLink;
                        }else{
                        $pagLink= "<a class = 'normal' href='theBlog.php?page=".$i."'>$i</a>";
                        echo $pagLink;
                        }

                        };

                        if($page < $number_of_page){
                        echo "<a class  =  'next' href ='theBlog.php?page=".($page+1)."'> Next page  </a>";   

                        }else{
                        echo "<a class  =  'next' href ='theBlog.php?page=".($page)."'> Next page </a>"; 
                    }?>
                    </div>
            </div>
         
            <div class="slidbar">
                <div class="section-search">
                    <h2 class="section-title">search</h2>
                    <form action="theBlog.php" method="post">
                        <input type="text" name="search-term" class="text-input" placeholder="search...">
                    </form>        
                </div>
                <div class="section-topics">
                    <h2 class="section-title">Topics</h2>
                    <ul>
                         <li><a href="theBlog.php?view=Agronomy">Agronomy</a></li>
                         <li><a href="theBlog.php?view=Horticulture">Horticulture</a></li>
                         <li><a href="theBlog.php?view=Soil Science">Soil Science</a></li>
                         <li><a href="theBlog.php?view=Plant Pathology">Plant Pathology</a></li>
                         <li><a href="theBlog.php?view=Entomology">Entomology</a></li>
                         <li><a href="theBlog.php?view=Agricultural Engineering">Agricultural Engineering</a></li>
                         <li><a href="theBlog.php?view=Agricultural EconomicsHorticulture">Agricultural Economics</a></li>
                         <li><a href="theBlog.php?view=Agricultural Extension">Agricultural Extension</a></li>
                         <li><a href="theBlog.php?view=Agroforestry">Agroforestry</a></li>
                    </ul>
                </div>
            </div>
        </div>
    
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