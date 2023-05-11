<?php
include "../includes/header.php";
$user_ID   = $_SESSION['USER_DATA']['user_id'];
$user_role = $_SESSION['USER_DATA']['role'];

$sql1    = "SELECT * FROM course
            WHERE user_id='$user_ID'";

$result1 = mysqli_query($conn,$sql1);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CourseForum.css">
    <title>Course Forum</title>
</head>
<body>
<div class="container">
        <?php include "../includes/instructorMenu.php"; ?>
        <div class="create_form_wrapper">
            <div class="title">
                <h1>Course List in Course Forum</h1>
            </div> 
            <div class="view-wrap"> 
                <div class="view">
                    <div class="block">
                        <div class="courses">
                            <?php
                            if(mysqli_num_rows($result1)>0)
                            {
                                while($record1=mysqli_fetch_assoc($result1))
                                {
                            ?>
                            <a href="courseForumContent.php?view=<?=$record1['course_id']?>">
                                <div class="course" id="course">
                                    <div class="course_image">
                                        <img src="../images/<?php if(isset ($record1['image'])){ echo $record1['image'];} ?>" class="post-image">
                                    </div>
                                    <div class="course_content">
                                        <h3><?php if(isset ($record1['title'])){ echo $record1['title'];} ?></h3>
                                        <div class="questions_details">
                                            <div class="question_status">
                                                <?php 
                                                //get the questions regarding to this course
                                                    $sql2 = "SELECT* FROM course_forum
                                                             WHERE course_id =" . $record1['course_id'] . "
                                                             AND approved = 1";

                                                    $result2       = mysqli_query($conn,$sql2);
                                                    $count_question = mysqli_num_rows($result2);


                                                //answered question count
                                                    $sql3          = " SELECT * FROM course_forum
                                                                        WHERE course_id =" . $record1['course_id'] . "
                                                                        AND approved  = 1
                                                                        AND answered  = 1 ";

                                                    $result3       = mysqli_query($conn,$sql3);
                                                    $answered_count_question= mysqli_num_rows($result3);
                                                
                                                
                                                //did not answer question count
                                                    $sql4          = " SELECT * FROM course_forum
                                                                        WHERE course_id =" . $record1['course_id'] . "
                                                                        AND approved  = 1
                                                                        AND answered  = 0 ";

                                                    $result4       = mysqli_query($conn,$sql4);
                                                    $not_answered_count_question= mysqli_num_rows($result4);
                                                ?>
                                                 <div class="all_questions" id="counts">
                                                    <p class="icon"><i class="fa-brands fa-stack-exchange" style="font-size:25px;" ></i></p>
                                                    <p class="data"><b><?php if (isset($count_question)){echo $count_question;}?></b></p>
                                                    <p class="text">All questions</p>
                                                </div>
                                                <div class="answered_questions" id="counts">
                                                    <p class="icon"><i class="fa-solid fa-message" style="font-size:25px;" ></i></p>
                                                    <p class="data"><b><?php if (isset($answered_count_question)){echo $answered_count_question;}?></b></p>
                                                    <p class="text">Answered questions</p>
                                                </div>
                                                <div class="not_answered_questions" id="counts">
                                                    <p class="icon"><i class="fa-regular fa-message" style="font-size:25px;" ></i></p>
                                                    <p class="data"><b><?php if (isset($not_answered_count_question)){echo $not_answered_count_question;}?></b></p>
                                                    <p class="text">Need to answered questions</p>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                            </div>
                            </a>
                            <?php }
                        }?>
                    </div>
              
                </div>
            </div>
           </div>
        </div>
    </div>
<footer><?php include "../includes/footer.php" ?></footer>
</body>
</html>