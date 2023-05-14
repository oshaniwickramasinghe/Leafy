<?php
include '../includes/header.php';
$user_ID=$_SESSION['USER_DATA']['user_id'];
$user_role= $_SESSION['USER_DATA']['role'];

// error_reporting(0);


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
            $comment=$record2['comment'];
            $time=$record2['time'];
            $image1=$record2['image1'];
            $selected_color=$record2['color'];
            $background_color=$record2['background_color'];

        }
        
    }
//}

    $sql="SELECT * from user WHERE user_id=$user_id";
    $result=mysqli_query($conn,$sql);
    // var_dump($result);

    if(mysqli_num_rows($result)>0){
        $fetch= mysqli_fetch_assoc($result);
    }
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
    <title>Userblog</title>
    <!--slick carousel-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../../admin/notification.css">
    <link rel="stylesheet" href="userblog.css">
    <!-- <link rel="stylesheet" href="../../admin/notification.css"> -->
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
            </div>
                <div class="first_para">
                        <div class="text"> 
                            <p><?php if(isset ($content1)){ echo $content1;} ?></p>
                        </div>
                </div> 
            <div class="tags">
                <p>tags:</p>
                <a href="../course/theCourse.php">courses</a>
            </div>
        </div>
    </div>
<br>
    <?php 
        ////changes by oshani

    if($user_role=='admin'){
    if(isset($_GET['view_blog']))
        {?>
        <div align="center">
           
            <form action="userblog.php" method="post" id="getblogcomment">

                <input class="delete" type="submit" name="deleteUID" value="Delete" onclick="showModal(); return false;">
                <input class="accept" type="submit" name="acceptUID" value="Accept" onclick="acceptModal(); return false;">

                <input type="hidden" name="BLOGID" value="<?=$_GET['view_blog'] ?>">

            </form>



        </div>
            
        <?php 
        }
    }
            ////end of changes by oshani

    ?>


    </div>  
<div> 
    <div class="articles">
        <div class="articles-heading">
            <h5>BLOGS</h5>
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
</div>

            <div id="id01" class="modal_delete" style="display: none;">
                    <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                    <div class="modal_content_delete" action="">
                        <div class="container_delete">
                            <br>
                            <h1>Are you sure you want to delete this blog?</h1>

                            <br><br>
                            <form action="userblog.php" method="post" id="getblogcomment">

                                <label for="comment">Please add your comment</label>
                                <input type="text" id="comment" name="comment" required><br>

                                <br><br>
                                <input type="hidden" name="BLOGID" value="<?=$_GET['view_blog'] ?>">
                                
                                <div class="clearfix_delete">
                                <input class="deletebtn" type="submit" name="deleteUID" value="Delete">  </input>     <br>                         
                                <button type="button" class="cancelbtn" onclick="hideModal();">Cancel</button>
                                
                                </div>
                                </form>

                        </div>
                    </div>
            </div>

            <div id="id02" class="modal_delete" style="display: none;">
                    <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
                    <div class="modal_content_delete" action="">
                        <div class="container_delete">
                            <h1>The blog is approved</h1>

                            <div class="clearfix_delete">

                            <a  href="userblog.php ?acceptUID=<?=$_GET['view_blog'] ?>">OK</a>
                            
                            </div>
                            
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

<script src="../../admin/modal.js"> </script>


</body>
</html>

<?php

//changes by oshani


if($user_role=='admin'){

    require "../../database/database.php"; 
    
    $comment = $_POST['comment'];
    
    if(isset($_POST['deleteUID']))
    {       
        
        $blog_id = $_POST['BLOGID'];
        $sql2 = "UPDATE blog SET Verified=2,comment='$comment' WHERE blog_id=$blog_id";
        $result2=mysqli_query($conn,$sql2);

        if ($conn->query($sql2) === TRUE) {
            echo "Delete column updated successfully";
          } else {
            echo "Error updating approved column: " . $conn->error . "<br>";
          }

        echo "<script>window.location.href = '../../admin/Admin_Notifications/AdminNotification.php';</script>";
    }


    if(isset($_GET['acceptUID']))
    {

        $blog_id = $_GET['acceptUID'];
        $sql2 = "UPDATE blog SET Verified=1,comment='$comment' WHERE blog_id=$blog_id";
        $result2=mysqli_query($conn,$sql2);

        if ($conn->query($sql2) === TRUE) {
            echo "Approve column updated successfully";
          } else {
            echo "Error inserting comment: " . $conn->error;
          }

        echo "<script>window.location.href = '../../admin/Admin_Notifications/AdminNotification.php';</script>";
    }
    

}
//end of changes by oshani
?>