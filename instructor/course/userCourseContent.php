<?php
include "../includes/header.php";
$user_ID   = $_SESSION['USER_DATA']['user_id'];
$user_role = $_SESSION['USER_DATA']['role'];

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
            $title=$record1['title'];
            $description=$record1['description'];
        }
        
    }

    $sql2      = " SELECT * FROM course_session
                   WHERE course_id = $course_id ";
    $result2   = mysqli_query($conn,$sql1);

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="userCourseContenr.css">
    <title>Course Content</title>
</head>
<body>
    <div class="main">
        <div class="begin">
            <h1><?=$title?></h1>
            <p><?=$description?></p>
        </div>
        <div class="main_container">
            <h1>Sessions</h1>
            <?php
            if(mysqli_num_rows($result2)>0)
            {
                while($record2=mysqli_fetch_assoc($result2))
                {

            ?>
            <div class="session"> 
                <img src="../images/<?php if(isset ($record2['image'])){ echo $record2['image'];} ?>" class="post-image">
                <div class="post-review">
                    <h3><?php if(isset ($record2['session_id'])){ echo $record2['session_id'];} ?>-<?php if(isset ($record2['title'])){ echo $record2['title'];} ?></h3>
                    <p class="preview-text"><?php if(isset ($record2['description'])){ echo substr($record2['description'],0,200,).'....';} ?></p><br>
                </div>
            </div>
            <?php }
            }?>

        </div>

    </div>



 <footer><?php include "../includes/footer.php"; ?></footer>   
</body>
</html>