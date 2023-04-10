<?php
include '../includes/header.php'; 
$user_ID=$_SESSION['USER_DATA']['user_id'];

if(!isset($user_ID)){
    header('location:../login/login.view.php');
}

$sql2 = "SELECT course_forum.*, user.image, user.fname, user.lname, course.title
        FROM course_forum
        JOIN user ON course_forum.user_id = user.user_id
        JOIN course ON course_forum.course_id = course.course_id  
        WHERE course.user_id=$user_ID
        ORDER BY question_id DESC";

$select=mysqli_query($conn,"SELECT * FROM `user` WHERE user_id='$user_ID'") or die('query failed');


if(mysqli_num_rows($select)>0){
    $fetch= mysqli_fetch_assoc($select);
}


// make query & get result2
$result2= mysqli_query($conn,$sql2);

    if(isset($_GET['view']))
    {
        $question_ID = $_GET['view'];


        $sql3 = "SELECT * FROM course_forum WHERE question_id=$question_ID";
        $sql1 = "UPDATE course_forum SET is_read = 1 WHERE question_id = '$question_ID'";
        $result3=mysqli_query($conn,$sql3);
        mysqli_query($conn,$sql1);

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
                    <h3>Notifications from Admin</h3>
                    <div class="card_left">
                        <ul>
                            <?php  if(mysqli_num_rows($result2)>0){
                                        while($record1=mysqli_fetch_assoc($result2)){?>
                                <li><a  href="notification.php?view=<?= $record1['question_id'] ?>" class="message <?= $record1['is_read'] == 1 ? 'opened' : 'unopened' ?>">
                                    <?php
                                    if($record1['image'] == ''){
                                        echo '<img src="../images/profilepic_icon.svg"  height= "30px" border-radius:50%>';
                                    }else{
                                        echo '<img src="../images/'.$record1['image'].'"  height= "30px" border-radius:50%;>';
                                    }
                                    ?>
                                    
                                    (<?= $record1['question_id'] ?>) Question &nbsp; &nbsp;
                                    <small>
                                        "<?php if(isset ($record1['content'])){ echo substr($record1['content'],0,25,).'...';} ?>" &nbsp;
                                        from course -<?= $record1['course_id'] ?> &nbsp;<?= $record1['title'] ?>course
                                    <br>1<?= $record1['date'] ?></small>
                                </a></li>
                            <?php }
                                } else{
                            ?>
                            <p>You haven't any notification from admin</p>
                            <?php
                            }
                            ?>
                        </ul>
                    </div>
                </div>
                <div class="main_card">
                    <h3>Notification from course forum</h3>
                    <div class="card_left">
                        <ul>
                            <?php while($record1=mysqli_fetch_assoc($result2)){?>
                                <li><a  href="notification.php?view=<?= $record1['question_id'] ?>">question from <?= $record1['course_id'] ?></a></li>
                            <?php }?>
                        </ul>
                    </div>
                </div>
                
      <!--      <div class="container_right" id="view_more">
                <h3> Question<!--<?php if(isset ($blog_ID)){ echo $blog_ID;} ?>:   <?php if(isset ($title)){ echo $title;} ?>--></h3>
               <!-- <button class="close-button">&times;</button>
                <div class="container_button">
                    <button href="notification.php" id="answer-btn"  class="answer-btn" >Answer</button>
                    <a href="#" type="button" id="delete" onclick="showModal(); return false;" >Delete</a>
                </div>
                <div id="id01" class="modal" style="display: none;">
                    <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
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
            <!--   <div class="details_container">
                    <h4><?php if(isset ($fetch['fname'])){ echo $fetch['fname'];} ?></h4>
                    <p><?php if(isset ($date)){ echo $date;} ?></p>
                    <p><?php if(isset ($time)){ echo $time;} ?></p>
                    <table>
                        
                        <tr>
                            <th>Question ID</th>
                            <td>:</td>
                            <td><?php if(isset ($blog_ID)){ echo $blog_ID;} ?></td>      
                        </tr>
                        <tr>
                            <th>Question </th>
                            <td>:</td>
                            <td><?php if(isset ($title)){ echo $title;} ?></td>
                        </tr>
                        <tr>
                            <th>Comment </th>
                            <td>:</td>
                            <td><?php if(isset ($commen)){ echo $commen;} ?></td>
                        </tr>
                    </table>   
                </div> -->
                <div class="answer-container" id="answer-div">
                        <h3>Answer</h3>
                        <p>Ensure that the field is level, well drained, and under shade. Chop compost materials into small pieces (3−5 cm). If possible, build compost heaps in layers consisting of rice crop material, combined with legume or manure wastes, on a 2:1 ratio. Keep compost heaps moist—not to wet and not too dry.</p>
                        <a href="#" type="button" class="submit-btn" id="submit-btn">Submit</a>
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
         var answer_div = document.getElementById("answer-div");
         var answer_btn = document.getElementById("answer-btn");
         var submit_btn = document.getElementById("submit-btn");

         answer_btn.addEventListener('click', ()=>{
            answer_div.style.display ='block';
        });

        submit_btn.addEventListener('click', ()=>{
            answer_div.style.display ='none';
        });



        function showModal() {
            document.getElementById("id01").style.display = "flex";
        }

        function hideModal() {
            document.getElementById("id01").style.display = "none";
        }

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