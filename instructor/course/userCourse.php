<?php
include "../includes/header.php";
$user_ID=$_SESSION['USER_DATA']['user_id'];

if(!isset($user_ID)){
    header('location:../login/login.view.php');   
}

if(isset($_GET['view']))
    {
        $course_ID = $_GET['view'];
        $sql1      = "SELECT * FROM course WHERE course_id=$course_ID";
        $result1    = mysqli_query($conn,$sql1);
        
        if($result1)
        { 
            while($record1 = mysqli_fetch_assoc($result1))
             {
                $course_ID  = $record1['course_id'];
                $title      = $record1['title'];
                $date       = $record1['date'];
                $description= $record1['description'];
                $image      = $record1['image'];
                $date       = $record1['date'];
                $duration   = $record1['duration'];
    
            }
            
        }

        $sql2 ="SELECT user.fname,user.lname,user.image,user.user_id
                FROM user
                JOIN course ON course.user_id=user.user_id
                where course.course_id=$course_ID ";

        $result2 = mysqli_query($conn,$sql2);
                
        if($result2)
        { 
            while($record2 = mysqli_fetch_assoc($result2))
            {
                $first_name  = $record2['fname'];
                $last_name   = $record2['lname'];
                $user_image  = $record2['image'];
                $user_ID     = $record2['user_id'];

            }
            
        }


        $sql3            = "SELECT * FROM course_followers where course_id=$course_ID ";
        $record_3        = mysqli_query($conn,$sql3);
        $count_followers = mysqli_num_rows($record_3);

        $sql4    = "SELECT instructor.occupation,instructor.education_level,instructor.specialized_area,instructor.user_id
                    FROM instructor
                    JOIN user ON instructor.user_id=user.user_id
                    JOIN course ON course.user_id=instructor.user_id
                    WHERE course.course_id=$course_ID ";

        $result4 = mysqli_query($conn,$sql4);
        $row     = mysqli_fetch_assoc($result4);

        if(isset($row))
        {   
            $user_ID         = $row['user_id'];
            $occupation      = $row['occupation'];
            $education_level = $row['education_level'];
            $specialized_are = $row['specialized_area'];

            $sql5            = "SELECT * FROM course where user_id=$user_ID ";
            $record_5        = mysqli_query($conn,$sql5);
            $count_course    = mysqli_num_rows($record_5);

            $sql6            = "SELECT * FROM agriculturalist_course
                                JOIN course ON course.course_id = agriculturalist_course.course_id
                                WHERE course.user_id=$user_ID ";
            $record_6        = mysqli_query($conn,$sql6);
            $total_followers = mysqli_num_rows($record_6);
      
        }
        
        $sql7           = "SELECT * FROM course_session 
                           WHERE course_id=$course_ID
                           ORDER BY session_id ASC";
        
        $result7        = mysqli_query($conn,$sql7);


    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="userCourse.css">
    <title></title>
</head>
<body>
    <div class="main">
        <div class="begin" style="background:url(../images/flowerbascket.jpg) no-repeat center center / cover;">
            <div class="container">
                <div class="main_detail_container">
                    <h1><?php if(isset ($title)){ echo $title;} ?></h1>
                    <div class="profile-container">
                        <div class="profile">
                            <div class="img-container">
                                <?php if($user_image == ''){
                                            echo '<img src="../images/profilepic_icon.svg" width="50px" >';
                                        }else{
                                            echo '<img src="../images/'.$user_image.'" align="middle" width="70px" style="border-radius:100%;">';
                                        }
                                ?>
                            </div>
                            <div class="text">
                                <h4><?php if(isset ($first_name)){ echo $first_name." ".$last_name;} ?> | <?php if(isset ($occupation)){ echo $occupation;} ?></h4>
                            </div>    
                        </div>
                    </div>
                    <div class="begin_button">
                        <a href="userCourseContent.php?view_course=<?= $course_ID; ?>" class="btn">Entroll to the Course</a>
                    </div>
                    <p><b><?=$count_followers?> Already Entrolled</b></p>
                </div>
            </div>
        </div>
        <div class="view-wrap"> 
                <div class="view">
                   <div class="btn_section">
                        <button class="about-btn" id="about-btn">About</button>
                        <button class="instructor-btn" id="instructor-btn">Instructors</button>
                        <button class="syllabus-btn" id="syllabus-btn">Syllabus</button>
                        <button class="review-btn" id="review-btn">Reviews</button>
                   </div>
                    <div class="block">
                        <div class="about-div" id="about-div">
                            <h1>About this course</h1>
                            <p><?=$description;?></p>
                        </div>
                        <div class="instructor-div" id="instructor-div">
                            <h1>Instructor</h1>
                            <div class="Instructor_details">
                                <div class="profile">
                                    <div class="img-container">
                                        <?php if($user_image == ''){
                                                    echo '<img src="../images/profilepic_icon.svg" width="50px" >';
                                                }else{
                                                    echo '<img src="../images/'.$user_image.'" align="middle" width="150px" style="border-radius:100%;">';
                                                }
                                        ?>
                                    </div>
                                    <div class="text">
                                        <?php if(isset ($first_name)){ echo $first_name." ".$last_name;} ?><br>
                                        <?php if(isset ($occupation)){ echo $occupation;} ?><br>
                                        <?php if(isset ($education_level)){ echo $education_level;} ?> in <?php if(isset ($specialized_are)){ echo $specialized_are;} ?><br>
                                        <i class="fa-solid fa-user-group"></i> <?php if(isset ($total_followers)){ echo $total_followers;} ?> learners <br>
                                        <i class="fa-brands fa-readme" style="font-size:18px;color:#43562B;"></i><?php if(isset ($count_course)){ echo $count_course;} ?> courses
                                    </div>    
                                </div>
                            </div>
                        </div>
                        <div class="syllabus-div" id="syllabus-div">
                            <h1>Syllabus</h1>
                            <b>Course duration -<?=$duration?></b>
                            <h2>sessions</h2>
                            <?php
                                if(mysqli_num_rows($result7)>0)
                                    while($record7=mysqli_fetch_assoc($result7))
                            {?>
                            <h3><?php if(isset ($record7['session_id'])){ echo $record7['session_id'];} ?>-<?php if(isset ($record7['title'])){ echo $record7['title'];} ?></h3>
                            <?php if(isset ($record7['description'])){ echo $record7['description'];} ?><br>
                            <p>Quiz</p>
                            <?php 
                            }?>
                        </div>
                        <div class="review-div" id="review-div">
                            <h1>Review</h1>
                        </div>
                    </div>
                        </div>
                    </div>

    </div>
    <footer><?php include "../includes/footer.php";?></footer>

    <script>

        var about_div = document.getElementById("about-div");
        var instructor_div = document.getElementById("instructor-div");
        var syllabus_div = document.getElementById("syllabus-div");
        var review_div = document.getElementById("review-div");
        var about_btn = document.getElementById("about-btn");
        var instructor_btn = document.getElementById("instructor-btn");
        var syllabus_btn = document.getElementById("syllabus-btn");
        var review_btn = document.getElementById("review-btn");

        about_btn.addEventListener('click', ()=>{
            about_div.style.display ='block';
            instructor_div.style.display ='none';
            syllabus_div.style.display ='none';
            review_div.style.display ='none';
            about_btn.classList.add('active');
            instructor_btn.classList.remove('active');
            syllabus_btn.classList.remove('active');
            review_btn.classList.remove('active');
        });

        instructor_btn.addEventListener('click', ()=>{
            instructor_div.style.display ='block';
            about_div.style.display ='none';
            syllabus_div.style.display ='none';
            review_div.style.display ='none';
            about_btn.classList.remove('active');
            instructor_btn.classList.add('active');
            syllabus_btn.classList.remove('active');
            review_btn.classList.remove('active');
            
        });

        syllabus_btn.addEventListener('click', ()=>{
            instructor_div.style.display ='none';
            about_div.style.display ='none';
            syllabus_div.style.display ='block';
            review_div.style.display ='none';
            syllabus_btn.classList.add('active');
            review_btn.classList.remove('active');
            about_btn.classList.remove('active');
            instructor_btn.classList.remove('active');
            
        });

        review_btn.addEventListener('click', ()=>{
            instructor_div.style.display ='none';
            about_div.style.display ='none';
            syllabus_div.style.display ='none';
            review_div.style.display ='block';
            about_btn.classList.remove('active');
            instructor_btn.classList.remove('active');
            syllabus_btn.classList.remove('active');
            review_btn.classList.add('active');
            
        });



    </script>
</body>
</html>