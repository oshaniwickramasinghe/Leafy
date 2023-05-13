<?php
include "../includes/header.php";

$posts = array();
$postsTitle ="Recent Posts";

function getPublishedPosts($page_first_result, $course_per_page)
{
	global $conn;
    $sql1 = "SELECT course.course_id, CONCAT(user.fname,' ' , user.lname) AS author, course.date, course.title, course.Topic, course.image, course.description, MAX(course_followers.rate)
            FROM course
            INNER JOIN user ON course.user_id=user.user_id
            LEFT JOIN course_followers ON course.course_id = course_followers.course_id
            GROUP BY course.course_id, user.fname, user.lname, course.date, course.title, course.Topic, course.image, course.description
            LIMIT ".$page_first_result.", ".$course_per_page;
		   /*  where course.verified=1"; */

           

    $stmt = $conn -> prepare($sql1);
    $stmt -> execute();
    $records = $stmt -> get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}

//pagination
$course_per_page = 6;
$sql5            = "SELECT * FROM course";
$result5         = mysqli_query($conn,$sql5);
$course_count    = mysqli_num_rows($result5);


//rounds a number UP to the nearest integer
$number_of_page  = ceil($course_count/ $course_per_page);


if(!(isset($_GET['page']))){
    $page  = 1;
}else{
    $page = $_GET['page'];
}

$page_first_result= ($page-1)*  $course_per_page;



function search($term)
{
    global $conn;

    $match = '%'. $term .'%';

    $sql2="SELECT course.course_id, CONCAT(user.fname,' ' , user.lname) AS author , course.date, course.title, course.Topic, course.image, course.description
           FROM course
           INNER JOIN user ON course.user_id=user.user_id /* where course.verified=1*/
           AND (course.title LIKE ? OR course.description LIKE ? OR course.Topic LIKE ?)";

    $stmt = $conn -> prepare($sql2);
    $stmt->bind_param('sss', $match, $match, $match);
    $stmt -> execute();
    $records = $stmt -> get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}

function getPostByTopic($topic)
{
    global $conn;

    $sql3="SELECT course.course_id, CONCAT(user.fname,' ' , user.lname) AS author , course.date, course.title, course.Topic, course.image, course.description
            FROM course
            INNER JOIN user ON course.user_id=user.user_id /* where course.verified=1*/
            WHERE course.topic=?";

    $stmt = $conn -> prepare($sql3);
    $stmt->bind_param('s', $topic);
    $stmt -> execute();
    $records = $stmt -> get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;


}


 if(isset($_POST['search-term']))
 {
    $postsTitle = "You searched for '" . $_POST['search-term'] ."'";
    $posts = search($_POST['search-term']);

 }else if(isset($_GET['view'])){

    $postsTitle = "You searched for '" . $_GET['view'] ."'";
    $posts = getPostByTopic($_GET['view']);

}else{
 $posts = getPublishedPosts($page_first_result, $course_per_page);
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Course Page</title>
    <link rel="stylesheet" href="theCourse.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container">
        <div class="begin">
            <h1>AGRICULTURE COURSES</h1>
            <p>Leafy offers courses for farming careers or hobby farming.<br>
             Courses with practical experience for working in agriculture, 
             focusing on animal and food production and farm management. Offering great support,
            online courses and lots of study options in science, technology & management of all types of livestock and crops.</p>
         </div>
        <div class="main">
            <div class="main-heading">
                    <h2>COURSES</h2>
            </div>
            <div class="content clearfix">
              <div class="card_section">
                <div class="row">
                <?php foreach ($posts as $post): ?>
                    <div class="column">
                    <a href="userCourse.php?view=<?=$post['course_id']?>">
                        <div class="card">
                          <div class="img-holder">
                            <img src="../images/<?php if(isset ($post['image'])){ echo $post['image'];} ?>">
                          </div>
                          <div class="card-text">
                            <h4><?php if(isset ($post['title'])){ echo $post['title'];} ?></h4>
                            <p class="description"><?php if(isset ($post['description'])){ echo substr($post['description'],0,150,).'....';} ?></p>
                            <div class="instructor_details">
                               <i class="fa-solid fa-user"></i> &nbsp; 
                               <b>Author : <?php if(isset ($post['author'])){ echo $post['author'];} ?></b></i> &nbsp; &nbsp;
                            </div>
                            <div class="rating">
                                <b><p><i class="fa-solid fa-star"></i>&nbsp;
                                      Rating : <i class="fa-solid fa-star" style="color:#EFE483;"></i>&nbsp; <b><?php if(isset ($post[' MAX(course_followers.rate)'])){ echo $post[' MAX(course_followers.rate)'];}else{echo'empty rate';} ?></b>
                                </p></b>
                            </div>
                            <!--sessions count-->
                            <?php
                                $sql4    =" SELECT * FROM course_session
                                            WHERE course_id =".$post['course_id']."";

                                $result4 = mysqli_query($conn,$sql4);

                                $session_count = mysqli_num_rows($result4);
                             ?>
                            <div class="course_session">
                                <b><p><i class="fa-solid fa-book-open-reader"></i> &nbsp;
                                       number of sessions : <?php if(isset ($session_count)){ echo $session_count;} ?>
                                </p></b>
                            </div>
                         </div> 
                        </div>
                    </a>
                    </div>
                    <?php endforeach; ?>
                  </div>
                    <div class  = "pagination">
                    <?php
                    $records = getPublishedPosts($page_first_result, $course_per_page);

                        if($page>= 2 ){
                        echo "<a class  =  'prev' href='theCourse.php?page=".($page-1)."'> Previous page << </a>";
                        }else{
                        echo "<a class  =  'prev' href='theCourse.php?page=".($page)."'> Previous page << </a>";
                        }

                        for($i = 1; $i<= $number_of_page; $i++){
                        if($i== $page){
                        $pagLink= "<a class ='active' href='theCourse.php?page=".$i."'>$i</a>";
                        echo $pagLink;
                        }else{
                        $pagLink= "<a class = 'normal' href='theCourse.php?page=".$i."'>$i</a>";
                        echo $pagLink;
                        }

                        };

                        if($page < $number_of_page){
                        echo "<a class  =  'next' href ='theCourse.php?page=".($page+1)."'> Next page >> </a>";   

                        }else{
                        echo "<a class  =  'next' href ='theCourse.php?page=".($page)."'> Next page >> </a>"; 
                    }?>
                    </div>
              </div> 
              <div class="slidbar">
                <div class="section-search">
                    <h2 class="section-title">search</h2>
                    <form action="theCourse.php" method="post">
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
    </div>

    <footer><?php include "../includes/footer.php";?></footer>
</body>

</html>