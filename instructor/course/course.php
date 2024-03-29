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
        $course_ID = $_GET['delete'];


        $query2 = "DELETE FROM course WHERE course_id=$course_ID";
        $stmt2 = mysqli_query($conn,$query2);
        

       
        if(mysqli_affected_rows($conn) > 0) {
            echo "<script>alert('Record Deleted from database')</script>";
            ?>
            <META http-equiv="Refresh" content="5; URL=http://localhost/leafy/instructor/course/course.php">
            <?php
        } else {
            echo "<script>alert('Failed to delete from database')</script>";
            ?>
            <META http-equiv="Refresh" content="5; URL=http://localhost/leafy/instructor/course/course.php">
            <?php
            
        }
    }

    if(isset($_GET['send']))
    {
        $course_ID = $_GET['send'];

        $sql4   = "SELECT * FROM course_session WHERE course_id='$course_ID'";

        $record = mysqli_query($conn,$sql4);

        $num_rows=mysqli_num_rows($record);


        if($num_rows >= 4)
        {
            $query3 = "UPDATE course 
                        SET submit=1
                        WHERE course_id=$course_ID";

            $stmt3 = mysqli_query($conn,$query3);


            if(mysqli_affected_rows($conn) > 0) {
                echo "<script>alert('Sending successful')</script>";
                ?>
                <META http-equiv="Refresh" content="5; URL=http://localhost/leafy/instructor/course/course.php">
                <?php
            } else {
                echo "<script>alert('Sending fail!')</script>";
                ?>
                <META http-equiv="Refresh" content="5; URL=http://localhost/leafy/instructor/course/course.php">
                <?php
            }

        }else{
            echo "<script>alert('This course is not completed,therefore you cannot send this!')</script>";
            ?>
            <META http-equiv="Refresh" content="5; URL=http://localhost/leafy/instructor/course/course.php">
            <?php
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
    <?php include "../includes/instructorMenu.php"; ?>
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
                            <td><?php if(isset ($fetch['submit']))
                                             {if( $fetch['submit']==0 && $fetch['verified']==0 )
                                                {    
                                                    echo 'Not send';
                                                }else if($fetch['submit']==1 && $fetch['verified']==1){ 
                                                    echo 'Verified';
                                                }else if($fetch['submit']==1 && $fetch['verified']==2){
                                                    echo 'Reject';

                                                }else if($fetch['submit']==1 && $fetch['verified']==0){
                                                    echo 'Send';
                                                }
                                                    } ?></td>
                            <td>
                                <div class="container_button">
                                    <a href="createCourse.php?edit=<?=$fetch['course_id']; ?>" type="button" id="edit" ><i class="fa-solid fa-pen-to-square" style="font-size:15px;color:#000000;"></i></a>
                                    <a href="#" type="button" id="delete" onclick="showModal_id01(); return false;" ><i class="fa-solid fa-trash" style="font-size:15px;color:#ee6c41;"></i></a>
                                    <a href="#" type="button" id="send" onclick="showModal_id02(); return false;" ><i class="fa-solid fa-paper-plane" style="font-size:15px; color:#000000;"></i></a>
                                </div>
                                <!--delete modal-->
                                <div id="id01_<?=$fetch['course_id']; ?>" class="modal" style="display: none;">
                                    <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                                    <form class="modal-content" action="/action_page.php">
                                    <div class="container">
                                        <h1>Delete this course</h1>
                                        <p>Are you sure you want to delete the course?</p>
                                        <div class="clearfix">
                                            <a href="course.php?delete=<?=$fetch['course_id']; ?>" type="button" class="deletebtn">Delete</a>
                                            <button type="button" class="cancelbtn" onclick="hideModal_id01();">Cancel</button>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                                <!--send modal-->
                                <div id="id02_<?=$fetch['course_id']; ?>" class="modal" style="display: none;">
                                    <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
                                    <form class="modal-content" action="/action_page.php">
                                    <div class="container">
                                        <h1>Send this course to admin</h1>
                                        <p>Are you sure you want to send the course to admin?</p>
                                        <div class="clearfix">
                                            <a href="course.php?send=<?=$fetch['course_id']; ?>" type="button" class="deletebtn">Send</a>
                                            <button type="button" class="cancelbtn" onclick="hideModal_id02();">Cancel</button>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <script>
                        function showModal_id01() {
                            
                            document.getElementById("id01_<?=$fetch['course_id']; ?>").style.display = "flex";
                        }

                        function hideModal_id01() {
                            document.getElementById("id01_<?=$fetch['course_id']; ?>").style.display = "none";
                        }

                        function showModal_id02() {
                            
                            document.getElementById("id02_<?=$fetch['course_id']; ?>").style.display = "flex";
                        }

                        function hideModal_id02() {
                            document.getElementById("id02_<?=$fetch['course_id']; ?>").style.display = "none";
                        }

                    </script>
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
                <button onclick="location.href='createCourse.php'" type="button" id="create"><i class="fa-solid fa-square-plus"></i> Create New Course</button>
            </div>
            </div>
   </div>
   </div>
   </div>
    <footer>
        <?php    include "../includes/footer.php"; ?>
    </footer>
</body>
</html>