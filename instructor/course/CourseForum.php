<?php
include "../includes/header.php";
$user_ID   = $_SESSION['USER_DATA']['user_id'];
$user_role = $_SESSION['USER_DATA']['role'];

$sql1 = "SELECT * FROM course_forum";
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
                <h1>Course Forum</h1>
            </div> 
            <div class="view-wrap"> 
                <div class="view">
                    <div class="block">


                    </div>
                        </div>
            </div>
        </div>
</div>
<footer><?php include "../includes/footer.php" ?></footer>
</body>
</html>