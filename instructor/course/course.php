<?php
include '../includes/header.php'; 
$user_ID=$_SESSION['USER_DATA']['user_id'];
$user_role=$_SESSION['USER_DATA']['role'];

if(!isset($user_ID)){
    header('location:../login/login.view.php');
}

$sql2="SELECT * FROM course where user_id='$user_ID'";
$select=mysqli_query($conn,$sql2);


// make query & get result2
$result2= mysqli_query($conn,$sql2);

    if(isset($_GET['view']))
    {
        $course_ID = $_GET['view'];
        $sql3 = "SELECT * FROM course WHERE course_id=$course_ID";
        $result3=mysqli_query($conn,$sql3);
        
        if($result3)
        { 
            
           
            while($record2 = mysqli_fetch_assoc($result3))
             {
                $course_ID=$record2['course_id'];
                $title=$record2['title'];
                $date=$record2['date'];
               // $author=$record2['author'];
                $content1=$record2['content1'];
               // $comment=$record2['comment'];
                $time=$record2['time'];
                $image1=$record2['image'];
   
        }
            
        }
    }


    if(isset($_GET['delete']))
    {
        $blog_ID = $_GET['delete'];

        /*$query1 = "SELECT image FROM instructor WHERE blog_ID=$blog_ID";
        $stmt1 = mysqli_query($conn,$query1);
        $result4 = mysqli_fetch_assoc($stmt1);
        $imagepath = $result4['image'];

        unlink($imagepath);*/

        $query2 = "DELETE FROM blog WHERE blog_ID=$blog_ID";
        $stmt2 = mysqli_query($conn,$query2);
        

        
        if($stmt2){
            echo"<script>alert('Record Deleted from database')</script>";
            ?>
            <META http-equiv="Refresh" content="5; URL=http://localhost/leafy/instructor/course.php">
        <?php
        }else{
            echo "<script>alert('Failed to delete from database')</script>";
        }
    }

   




?> 



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../course/course.css">
    <script src="https://kit.fontawesome.com/e32c8f0742.js" crossorigin="anonymous"></script>
    <title>instructor course page</title>
</head>
<body>
    
   <div class="body">
   <div class="role_name">
        <h1><?php echo $user_role?></h1>
    </div>
    <div class="instructor_wrapper">
        
        <div class="left_menu_bar">
           <div id="menu">
            <a><i class="fa-solid fa-bars" style="font-size:20px;color:#43562B;"></i></a>
            <div class="image"><img src="../images/badge.svg" alt=""></div>
            <h3>Leafy</h3>
           </div>
            <ul>
                <li><a href="../home/home.view.php"><i class="fa-solid fa-house" style="font-size:18px;color:#43562B;"></i>Home</a></li>
                <li><a href="../dashboard/Insdashboard.php"><i class="fa-solid fa-gauge-high" style="font-size:18px;color:#43562B;"></i>Dashboard</a></li>
                <li><a href="../notification/notification.php"><i class="fa-solid fa-comments" style="font-size:16px;color:#43562B;"></i>Notifications</a></li>
                <li><a href="../blog/blog.php"><i class="fa-brands fa-blogger" style="font-size:20px;color:#43562B;"></i>Blogs</a></li>
                <li><a href="course.php"><i class="fa-brands fa-readme" style="font-size:18px;color:#43562B;"></i>Courses</a></li>
            </ul>
        </div>
        <div class="content"> 
            <h2>Course</h2>
            <div class="container">
            <div class="table">
                <h3>Your Course List</h3>
                <table class="content-table">
                    <thead>
                        <tr>
                            <th>Course ID</th>
                            <th>Title</th>
                            <th>Topic</th>
                            <th>Created Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        if(mysqli_num_rows($select)>0){
                            while($fetch= mysqli_fetch_assoc($select)){
                    ?>
                        <tr>
                            <td><?php if(isset ($fetch['course_id'])){ echo $fetch['course_id'];} ?></td>
                            <td><?php if(isset ($fetch['title'])){ echo $fetch['title'];} ?></td>
                            <td><?php if(isset ($fetch['Topic'])){ echo $fetch['Topic'];} ?></td>
                            <td><?php if(isset ($fetch['date'])){ echo $fetch['date'];} ?></td>
                            <td><?php if(isset ($fetch['status'])){ echo $fetch['status'];} ?></td>
                            <td>
                                <div class="container_button">
                                    <a href="userCourse.php?view_blog=<?=$fetch['course_id']; ?>" type="button" id="view">View</a>
                                    <a href="create course.php?edit=<?=$fetch['course_id']; ?>" type="button" id="edit" >Edit</a>
                                    <a href="#" type="button" id="delete" onclick="showModal(); return false;" >Delete</a>
                                </div>
                                <div id="id01" class="modal" style="display: none;">
                                    <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                                    <form class="modal-content" action="/action_page.php">
                                    <div class="container">
                                        <h1>Delete this course</h1>
                                        <p>Are you sure you want to delete the course?</p>
                                    <div class="clearfix">
                                    <a href="blog.php?delete=<?=$blog_ID; ?>" type="button" class="deletebtn" onclick="deleteDetails();">Delete</a>
                                    <button type="button" class="cancelbtn" onclick="hideModal();">Cancel</button>
                                </div>
                                </div>
                                </form>


                                </div>
                            </td>
                        </tr>
                        <?php }
                        } else{
                        ?>
                        <tr>
                            <td colspan="6">Your course list is empty</td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>

               

            </div>
            <div class="create-button">
                <button onclick="location.href='create course.php'" type="button" id="create"><i class="fa-solid fa-square-plus"></i> Create New Course</button>
            </div>
            </div>
   </div>
   </div>
   </div>
    <footer>
        <?php    include "../includes/footer.php"; ?>
    </footer>

    <script>
        function showModal() {
            document.getElementById("id01").style.display = "flex";
        }

        function hideModal() {
            document.getElementById("id01").style.display = "none";
        }

        function deleteDetails() {

        hideModal();
        }
    </script>
</body>
</html>