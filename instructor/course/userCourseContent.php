<?php
include "../includes/header.php";
$user_ID   = 1;//$_SESSION['USER_DATA']['user_id'];
$user_role = "Customer";//$_SESSION['USER_DATA']['role'];

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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                        <a href="CourseForum.php?course=<?=$course_id?>" class="forum-btn" id="forum-btn">Forum</a>
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

    // Change the stroke-dashoffset value
    anm_circle.style.strokeDashoffset = offset;

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
</body>
</html>