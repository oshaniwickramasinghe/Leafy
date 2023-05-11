<?php
include "../includes/header.php";
$user_ID   = $_SESSION['USER_DATA']['user_id'];
$user_role = $_SESSION['USER_DATA']['role'];

error_reporting(0);

if(isset($_GET['view_course']))
{
    // adding to course_followers 

    $course_id = $_GET['view_course'];

    $sql1      = " SELECT * FROM course
                   WHERE course_id=$course_id";
    $result1   = mysqli_query($conn,$sql1);

    if($result1){
        while($record1=mysqli_fetch_assoc($result1))
        {
            $title       = $record1['title'];
            $description = $record1['description'];
            $image       = $record1['image'];
            $duration    = $record1['duration'];
        }
        
    }

    $sql2          = " SELECT * FROM course_session
                       WHERE course_id = $course_id ";
    $result2       = mysqli_query($conn,$sql2);
    $count_session = mysqli_num_rows($result2);

    //update the user entrolling data
    if($user_role == "Agriculturaist" || $user_role =="Customer"){

        $query    = "SELECT *
                     FROM course_followers
                     WHERE user_id ='$user_ID'
                     AND course_id ='$course_id'";

        $fetch     = mysqli_query($conn,$query);


        if (mysqli_num_rows($fetch) > 0) {
            // Email already exists, do not save the data
            echo "<script>alert('You are already entrolled to this course.');</script>";

        } else {

            $sql3      = "INSERT INTO course_followers
                        (user_id,course_id)
                        values('$user_ID','$course_id')";
            $result3    = mysqli_query($conn,$sql3);

            if($result3){

            echo"<script>alert('You are successfully enrolled to this course');</script>";

            }else{
                echo"Error: " . $sql3 . "<br>" . mysqli_error($conn);
            } 
        }

    }

      //get the completed session count
        $sql5                    = "SELECT * FROM session_followers
                                    WHERE course_id = $course_id
                                    AND user_id     = $user_ID
                                    AND is_completed= 1";

        $result5                 = mysqli_query($conn,$sql5);
        $completed_session_count = mysqli_num_rows($result5);

    

}

?>


<?php

//changes by oshani


if($user_role=='admin'){

    require "../../database/database.php"; 
    
    $comment = $_POST['comment'];
    
    if(isset($_POST['deleteUID']))
    {       
        
        $course_id = $_POST['COURSEID'];
        echo 'delete';
        echo $course_id;
        $sql2 = "UPDATE course SET verified=2,comment='$comment' WHERE course_id=$course_id";
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

        $course_id = $_GET['acceptUID'];
        echo 'accept';
        echo $course_id;
        $sql2 = "UPDATE course SET verified=1,comment='$comment' WHERE course_id=$course_id";
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../admin/notification.css">
    <link rel="stylesheet" href="userCourseContent.css">
    <title>Course Content</title>
</head>
<body>
<div class="main">
        <div class="begin">
            <h1><?=$title?></h1>
            <div class="course_content">
                <img src="../images/<?php if(isset ($image)){ echo $image;} ?>" class="post-image">
                <div class="details_container">
                    <div class="details">
                        <div class="session_count">
                            <p class="icon"><i class="fa-regular fa-folder-open" style="font-size:25px;" ></i></p>
                            <p class="data"><b><?php if (isset($count_session)){echo $count_session;}?></b></p>
                            <p class="text">Session</p>
                        </div>
                        <div class="duration">
                            <p class="icon"><i class="fa-regular fa-clock" style="font-size:25px;"></i></p>
                            <p class="data"><b><?php if (isset($duration)){echo $duration;}?></b></p>
                            <p class="text">duration</p>
                        </div>
                        <div class="progress_bar">
                            <div class="progress">
                                <div class="circle">
                                    <div class="outer">
                                        <div class="inner">
                                            <div id="percentage"></div>
                                        </div>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="160px" height="160px">
                                        <defs>
                                            <linearGradient id="GradientColor">
                                            <stop offset="0%" stop-color="#e91e63" />
                                            <stop offset="100%" stop-color="#673ab7" />
                                            </linearGradient>
                                        </defs>
                                        <circle id="anm_circle" cx="80" cy="80" r="70" stroke-linecap="round" />
                                </svg>
                                </div>   
                            </div>
                            <p class="text">completed</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="view-wrap"> 
                <div class="view">
                    <div class="btn_section">
                        <a href="courseForumContentUser.php?view=<?=$course_id?>" class="forum-btn" id="forum-btn">Forum</a>
                        <a href="Rating.php?course=<?=$course_id?>" class="rating-btn" id="rating-btn">Rating & Review</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="main_container">
            <h1>SESSIONS</h1>
            <div class="session_container">
                <?php
                if(mysqli_num_rows($result2)>0)
                {
                    while($record2=mysqli_fetch_assoc($result2))
                    {
                ?>
                    <div class="session">
                        <div class="session_num">
                            <div class="session_ID">
                                <?php if(isset ($record2['session_id'])){ echo $record2['session_id'];} ?>
                            </div>
                        </div>
                        <div class="session_details"> 
                            <img src="../images/<?php if(isset ($record2['image'])){ echo $record2['image'];} ?>" class="post-image">
                            <div class="session_content">
                                <h2><?php if(isset ($record2['title'])){ echo $record2['title'];} ?></h2>
                                <div class="session_text">
                                    <p class="preview-text"><?php if(isset ($record2['description'])){ echo substr($record2['description'],0,200,).'....';} ?></p><br>
                                    <div class="session_status">
                                        Status
                                        <?php 
                                         //check the session complete or not
                                            $sql4          = " SELECT * FROM session_followers
                                                                WHERE course_id = $course_id
                                                                AND session_id  = " . $record2['session_id'] . "
                                                                AND user_id     = $user_ID";

                                            $result4       = mysqli_query($conn,$sql4);
                                            $status = 0; // default value
                                        
                                            if(mysqli_num_rows($result4)>0){
                                                while($record4=mysqli_fetch_assoc($result4)){

                                                    $status= $record4['is_completed'];
                                                }

                                            }
                                        
                                        if($status==1){
                                        ?>
                                            <p class="status">Completed</p>
                                        <?php }else{?>
                                            <p class="status">Not Complete</P>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="btn_container">
                                    <a href="userSession.php?session=<?=$record2['session_id']?>& course=<?=$course_id?>" class="btn">Follow</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }
                }?>
            </div>

        </div>

    </div>

    <?php 
        ////changes by oshani

    if($user_role=='admin'){
    if(isset($_GET['view_course']))
        {?>
        <div align="center">
           
            <form action="userCourseContent.php" method="post" id="getblogcomment">

                <input class="delete" type="submit" name="deleteUID" value="Delete" onclick="showModal(); return false;">
                <input class="accept" type="submit" name="acceptUID" value="Accept" onclick="acceptModal(); return false;">

                <input type="hidden" name="COURSEID" value="<?=$_GET['view_course'] ?>">

            </form>



        </div>
            
        <?php 
        }
    }
            ////end of changes by oshani

    ?>

            <div id="id01" class="modal_delete" style="display: none;">
                    <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                    <div class="modal_content_delete" action="">
                        <div class="container_delete">
                            <br>
                            <h1>Are you sure you want to delete this course?</h1>

                            <br><br>
                            <form action="userCourseContent.php" method="post" id="getblogcomment">

                                <label for="comment">Please add your comment</label>
                                <input type="text" id="comment" name="comment" required><br>

                                <br><br>
                                <input type="hidden" name="COURSEID" value="<?=$_GET['view_course'] ?>">
                                
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
                            <h1>The course is approved</h1>

                            <div class="clearfix_delete">

                            <a  href="userCourseContent.php ?acceptUID=<?=$_GET['view_course'] ?>">OK</a>
                            
                            </div>
                            
                            </div>
                            </div>
            </div>

 <footer><?php include "../includes/footer.php"; ?></footer>
 <script>
    
    let percentage              = document.getElementById("percentage"); //display percentage value
    let counter                 = 0; //counting from 0
    let session_count           = <?=$count_session?> ; //number of session include in course
    let completed_session_count = <?=$completed_session_count?>;
    var rating_btn              = document.getElementById("rating-btn");
    var forum_btn               = document.getElementById("forum-btn");


    let real_percentage         = (completed_session_count/session_count)*100;

    var offset                  = 472 - 472 *(real_percentage)*0.01; 
    
     // Get the path element
     var anm_circle = document.getElementById("anm_circle");

    // Set the CSS variable
    anm_circle.style.setProperty('--stroke-dashoffset', offset);


    setInterval(() => {

        if(counter == real_percentage){
            clearInterval();
        }else{
            counter += 1;
            percentage.innerHTML= counter + "%"; 
        }
             
    }, 30);


   

    rating_btn.addEventListener('click', ()=>{
        rating_btn.classList.add('active');
        forum_btn.classList.remove('active');
    });

    forum_btn.addEventListener('click', ()=>{
        rating_btn.classList.remove('active');
        forum_btn.classList.add('active');
        
    });

</script>  
 
 <script src="../../admin/modal.js"> </script>

</body>
</html>
