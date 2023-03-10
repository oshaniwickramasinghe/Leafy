<?php 

//require "connect.php";
include 'connect.php';      
      

  if(isset($_GET['deleteUID']))
  {
      
      $course_id = $_GET['deleteUID'];
      $sql2 = "DELETE FROM course WHERE course_id=$course_id";
      $result2=mysqli_query($conn,$sql2);

      echo 'deleted';

  }


  if(isset($_GET['acceptUID']))
  {

      $course_id = $_GET['acceptUID'];
      $sql2 = "UPDATE course SET Verified=1 WHERE course_id=$course_id";
      $result2=mysqli_query($conn,$sql2);

      echo 'updated';

  }

?>

<?php
    if(isset($_GET['viewcourse']))
    {?>
    <div align="right">
        <a class="delete" href="AdminCourseView.php ?deleteUID=<?=$_GET['viewcourse'] ?>" >Delete</a>
        <a class="accept" href="AdminCourseView.php ?acceptUID=<?=$_GET['viewcourse'] ?>" >Accept</a>

    </div>
      
      <?php 
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course</title>
    <link rel="stylesheet" href="notification.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

    <p>
      This is course page
    </p>
</body>