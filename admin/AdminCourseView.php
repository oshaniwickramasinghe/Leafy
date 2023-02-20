<h1>This is course page</h1>

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
      <a href="AdminCourseView.php ?deleteUID=<?=$_GET['viewcourse'] ?>" >Delete</a>
      <!-- <button onclick="AdminBlogView.php ?deleteUID=<?=$_GET['viewcourse'] ?>"  type="button" id="Delete">Delete</button> -->
      <!-- <button type="button" id="Accept">Accept</button> -->
      <a href="AdminCourseView.php ?acceptUID=<?=$_GET['viewcourse'] ?>" >Accept</a>

      <?php 
    }
?>