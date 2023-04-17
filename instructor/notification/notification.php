<?php
include '../includes/header.php'; 
$user_ID=7;
//$_SESSION['USER_DATA']['user_id'];

if(!isset($user_ID)){
    header('location:../login/login.view.php');
}

$sql2 = "SELECT course_forum.*, user.image, user.fname, user.lname, course.title
        FROM course_forum
        JOIN user ON course_forum.user_id = user.user_id
        JOIN course ON course_forum.course_id = course.course_id  
        WHERE course.user_id=$user_ID AND course_forum.visible = 0 
        ORDER BY question_id DESC";

$select=mysqli_query($conn,"SELECT * FROM `user` WHERE user_id='$user_ID'") or die('query failed');


if(mysqli_num_rows($select)>0){
    $fetch= mysqli_fetch_assoc($select);
}

//make query for getting admin notifocations

$query1= "SELECT blog_id,title,image1,topic,is_read,date,Verified,description
          FROM blog
          WHERE user_id=$user_ID AND (Verified=1 OR Verified=2) AND visible=0
          ORDER BY blog_id DESC";

$query2= "SELECT course_id,title,image,topic,is_read ,verified,date,description
          FROM course
          WHERE user_id=$user_ID AND (verified=1 OR verified=2) AND visible=0
          ORDER BY course_id DESC";


$post1= mysqli_query($conn,$query1);

// open the notification from Admin
if(isset($_GET['open']))
{
    $blog_ID = $_GET['open'];


    //$query3 = "SELECT * FROM course_forum WHERE question_id=$question_ID";
    $query4 = "UPDATE blog SET is_read = 1 WHERE blog_id='$blog_ID'";
    //$result3=mysqli_query($conn,$query3);
    mysqli_query($conn,$query4);

}


$post2= mysqli_query($conn,$query2);





// make query & get result2
$result2= mysqli_query($conn,$sql2);

    if(isset($_GET['view']))
    {
        $question_ID = $_GET['view'];
        $sql3 = "SELECT * FROM course_forum WHERE question_id=$question_ID";
        $result3=mysqli_query($conn,$sql3);
        

    }

    //when question notification read
    if(isset($_GET['ok']))
    {
        $question_ID = $_GET['ok'];
        $sql1 = "UPDATE course_forum SET is_read = 1 WHERE question_id = '$question_ID'";
        mysqli_query($conn,$sql1);
    }

    //when blog notification read
    if(isset($_GET['read1']))
    {
        $blog_ID = $_GET['read1'];
        $sql_read1 = "UPDATE blog SET is_read = 1 WHERE blog_id = '$blog_ID'";
        mysqli_query($conn,$sql_read1);
    }

    //when course notification read
    if(isset($_GET['read2']))
    {
        $course_ID = $_GET['read2'];
        $sql_read2 = "UPDATE course SET is_read = 1 WHERE course_id = '$course_ID'";
        mysqli_query($conn,$sql_read2);
    }

    //when  delete the notification from course_forum
    if(isset($_GET['delete1']))
    {
        $question_id = $_GET['delete1'];
        $sql1_delete = "UPDATE course_forum SET visible = 1 WHERE question_id = '$question_id'";
        mysqli_query($conn,$sql1_delete);

    }

     //when  delete the notification from blogs
     if(isset($_GET['delete2']))
     {
         $blog_id = $_GET['delete2'];
         $sql2_delete = "UPDATE blog SET visible = 1 WHERE blog_id = '$blog_id'";
         mysqli_query($conn,$sql2_delete);
 
     }

     
     //when  delete the notification from courses
     if(isset($_GET['delete3']))
     {
         $course_id = $_GET['delete3'];
         $sql3_delete = "UPDATE course SET visible = 1 WHERE course_id = '$course_id'";
         mysqli_query($conn,$sql3_delete);
 
     }
 
 




    $sql4 = "SELECT * from user WHERE user_id= $user_ID";
    $result4=mysqli_query($conn,$sql4);



    
/*
    if(isset($_GET['delete']))
    {
        $blog_ID = $_GET['delete'];

        /*$query1 = "SELECT image FROM instructor WHERE blog_ID=$blog_ID";
        $stmt1 = mysqli_query($conn,$query1);
        $result4 = mysqli_fetch_assoc($stmt1);
        $imagepath = $result4['image'];
        unlink($imagepath);

        $query2 = "DELETE FROM blog WHERE blog_ID=$blog_ID";
        $stmt2 = mysqli_query($conn,$query2);
        

        
        if($stmt2){
            echo"<script>alert('Record Deleted from database')</script>";
            ?>
            <META http-equiv="Refresh" content="5; URL=http://localhost/leafy/instructor/blog.php">
        <?php
        }else{
            echo "<script>alert('Failed to delete from database')</script>";
        }

*/
   




?> 



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="notification.css">
    <script src="https://kit.fontawesome.com/e32c8f0742.js" crossorigin="anonymous"></script>
    <title>instructor notification page</title>
</head>
<body>
    
   <div class="body">
   <div class="role_name">
        <h1><?php echo $fetch['role'];?></h1>
    </div>
    <div class="instructor_wrapper">
        <?php include "../includes/instructorMenu.php"; ?>
        <div class="content"> 
            <h2>Notifications</h2>
            <div class="container">
                <div class="main_card">
                    <h3>Notification from course forum</h3>
                    <div class="card_left">
                        <ul>
                            <?php  if(mysqli_num_rows($result2)>0){
                                        while($record1=mysqli_fetch_assoc($result2)){?>
                                <li><a 
                                    href="descriptionQuestion.php?view=<?= $record1['question_id'] ?>" 
                                    class="messageForum <?= $record1['is_read'] == 1 ? 'opened' : 'unopened' ?>">
                                    <?php
                                    if($record1['image'] == ''){
                                        echo '<img src="../images/profilepic_icon.svg"  height= "30px" border-radius:50%>';
                                    }else{
                                        echo '<img src="../images/'.$record1['image'].'"  height= "30px" border-radius:50%;>';
                                    }
                                    ?>
                                    
                                    <?= $record1['question_id'] ?>. Question &nbsp; &nbsp;
                                    
                                    <b>"<?php if(isset ($record1['content'])){ echo substr($record1['content'],0,25,).'...';} ?>"</b> 
                                    &nbsp; &nbsp;
                                    <small>
                                        from
                                        &nbsp; &nbsp;
                                        <b> course -<?= $record1['course_id'] ?> &nbsp;<?= $record1['title'] ?></b>
                                        on <?= $record1['date'] ?>
                                        
                                    </small>
                                
                                </a>
                                
                                </li>
                            <?php }
                                } else{
                            ?>
                            <p>You haven't any notification from course forum</p>
                            <?php
                            }
                            ?>
                        </ul>
                    </div>
                </div>
                <div class="main_card_admin_notification">
                    <h3>Notifications from Admin</h3>
                    <div class="card_left">
                    
                        <div class="blog_notifications">
                            <h3>About your blogs</h3>
                            <ul>
                                <?php  if(mysqli_num_rows($post1)>0){
                                            while($mark1=mysqli_fetch_assoc($post1)){?>
                                    <li><a  
                                        href="blogNotification.php?open=<?= $mark1['blog_id'] ?>" 
                                        class="message <?= $mark1['is_read'] == 1 ? 'opened' : 'unopened' ?> <?= $mark1['Verified'] == 1 ? 'accept' : 'reject' ?>" 
                                        onclick="showModal2(); return false;">

                                        <?php
                                        if($mark1['image1'] == ''){
                                            echo '<img src="../images/profilepic_icon.svg"  height= "30px" border-radius:50%>';
                                        }else{
                                            echo '<img src="../images/'.$mark1['image1'].'"  height= "30px" width="30px" style=border-radius:50%;>';
                                        }
                                        ?>
                                        
                                        Admin 
                                        &nbsp;
                                        <!--check whether accept or reject the blog-->
                                        <b>
                                        <?php
                                        if($mark1['Verified'] == 1){
                                            echo 'Accept';
                                        }else{
                                            echo 'Reject';
                                        }
                                        ?>
                                        </b>
                                        &nbsp;
                                        the blog-<?= $mark1['blog_id'] ?>- "<?=$mark1['title'] ?>"  &nbsp; 
                                        <small>which is created on <?= $mark1['date'] ?> by you.</small>
                                    </a></li>
       
                                <?php }
                                    } else{
                                ?>
                                <p>You haven't any notification from Admin about your blogs</p>
                                <?php
                                }
                                ?>
                            </ul>
                        </div>
                           
                            
                        <div class="course_notifications">
                            <h3>About your courses</h3>
                            <ul>
                            <?php  if(mysqli_num_rows($post2)>0){
                                        while($mark2=mysqli_fetch_assoc($post2)){?>
                                <li><a 
                                    href="courseNotification.php?click=<?= $mark2['course_id'] ?>" 
                                    class="message <?= $mark2['is_read'] == 1 ? 'opened' : 'unopened' ?> <?= $mark2['verified'] == 1 ? 'accept' : 'reject' ?>" 
                                    onclick="showModal3(); return false;">

                                    <?php
                                    if($mark2['image'] == ''){
                                        echo '<img src="../images/profilepic_icon.svg"  height= "30px" border-radius:50%>';
                                    }else{
                                        echo '<img src="../images/'.$mark2['image'].'"  height= "30px" width="30px" style=border-radius:50%;>';
                                    }
                                    ?>
                                    
                                    Admin
                                    &nbsp;
                                    <!--check whether accept or reject the course-->
                                    <b>
                                    <?php
                                    if($mark2['verified'] == 1){
                                        echo 'Accept';
                                    }else{
                                        echo 'Reject';
                                    }
                                    ?>
                                    </b>
                                    &nbsp;
                                    the course-<?= $mark2['course_id'] ?>- "<?=$mark2['title'] ?>"  &nbsp;
                                    <small> which is created on <?= $mark2['date'] ?> by you.</small>
                                </a></li>
                            <?php }
                                } else{
                            ?>
                            <p>You haven't any notification from Admin about your courses</p>
                            <?php
                            }
                            ?>
                            </ul>
                        </div>
                        <!--popup div for more details about the blog notification from admin-->
                        <div id="id03" class="modal" style="display: none;">
                            <span onclick="document.getElementById('id03').style.display='none'" class="close" title="Close Modal">&times;</span>
                            <form class="modal-content" action="/action_page.php">
                                <div class="container">
                                    <h1>Delete this blog</h1>
                                    <p>Are you sure you want to delete the blog?</p>
                                    <div class="clearfix">
                                        <a href="blog.php?delete=<?=$blog_ID; ?>" type="button" class="deletebtn" onclick="deleteDetails();">Delete</a>
                                        <button type="button" class="cancelbtn" onclick="hideModal();">Cancel</button>
                                    </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>   
        </div>

    </div>
   </div>
    <footer>
        <?php include "../includes/footer.php"; ?>
    </footer>

    <script>
        /* var answer_div = document.getElementById("answer-div");
        // var answer_btn = document.getElementById("answer-btn");
        //var submit_btn = document.getElementById("submit-btn");

         answer_btn.addEventListener('click', ()=>{
            answer_div.style.display ='block';
        });

        submit_btn.addEventListener('click', ()=>{
            answer_div.style.display ='none';
        });
        */


        function deleteDetails() {

        hideModal();
        }

        var messages = document.getElementsByClassName('message');
        for (var i = 0; i < messages.length; i++) {
        messages[i].addEventListener('click', function() {
            this.classList.add('opened');
        });
        }
    </script>
</body>
</html>