<?php
include '../includes/header.php'; 

if(isset($_GET['view']))
{
    $question_ID = $_GET['view'];

    $data1 ="SELECT course_forum.*, user.image, user.fname, user.lname, course.title
            FROM course_forum
            JOIN user ON course_forum.user_id = user.user_id
            JOIN course ON course_forum.course_id = course.course_id  
            WHERE course_forum.question_id=$question_ID
            ORDER BY question_id DESC";

    $connection1=mysqli_query($conn,$data1);
    if($connection1)
    { 
        
       
        while($record2 = mysqli_fetch_assoc($connection1))
         {
            $question_id=$record2['question_id'];
            $title=$record2['title'];
            $date=$record2['date'];
            $fname=$record2['fname'];
            $lname=$record2['lname'];
            $course_id=$record2['course_id'];
            $content=$record2['content'];
            $image=$record2['image'];

        }
    
    }
    

}

//when question notification read
if(isset($_GET['ok']))
{
    $question_ID = $_GET['ok'];
    $sql1 = "UPDATE course_forum SET is_read = 1 WHERE question_id = '$question_ID'";
    mysqli_query($conn,$sql1);
}

   


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="descriptionQuestion.css">
    <script src="https://kit.fontawesome.com/e32c8f0742.js" crossorigin="anonymous"></script>
    <title>Description Question</title>
</head>
<body>
    <div class="body">

        <div class="role_name">
            <h1><?php echo $fetch['role'];?></h1>
        </div>

        <div class="instructor_wrapper">
            <?php include "../includes/instructorMenu.php"; ?>

            <div class="content">
                <div class="icon">
                <i class="fa-solid fa-envelope" style="font-size:70px;color:#43562B;"></i>
                </div>
                <!--popup div for getting more details about question-->
                <div id="id0" class="modal">
                    <form class="modal-content" action="/action_page.php">
                        <div class="container">
                            <h1>More Informations</h1>
                            <h4><i> From </i> course -<?php if(isset ( $course_id)){ echo $course_id;} ?> &nbsp;"<?php if(isset ( $title)){ echo $title;} ?>"</h4>
                            <div class="details_container">
                                <table>
                                    <tr>
                                        <th>Question ID</th>
                                        <td>:</td>
                                        <td><?php if(isset ( $question_id)){ echo $question_id;} ?></td>      
                                    </tr>
                                    <tr>
                                        <th>Question </th>
                                        <td>:</td>
                                        <td><?php if(isset ($content)){ echo $content; }?></td>
                                    </tr>
                                    <tr>
                                        <th>Link to Forum</th>
                                        <td>:</td>
                                        <td></td>
                                    </tr>
                                </table>
                                <div class="question_author"> 
                                    <div class="sender_info"> 
                                    <?php
                                        if($image == ''){
                                            echo '<img src="../images/profilepic_icon.svg"  height= "40px" border-radius:50%>';
                                        }else{
                                            echo '<img src="../images/'.$image.'"  height= "40px" border-radius:50%;>';
                                        }
                                        ?>
                                        &nbsp;
                                        <?php if(isset ( $fname)){ echo $fname;} ?> <?php if(isset ( $lname)){ echo $lname;} ?>
                                    </div>
                                    <div class="sending_date">
                                    date:<?php if(isset ( $date)){ echo $date;} ?>
                                    </div>
                                </div>
                            </div>
                            <p></p>
                            <div class="clearfix">
                                <a href="notification.php?ok=<?= $question_id?>" type="button" class="okbtn">Ok</a>
                                <button type="button" class="deletebtn" onclick="showModal(); return false;" >Delete</button>
                            </div>
                            </div>
                    </form>
                    </div>
                    <div id="id01" class="modal_delete" style="display: none;">
                    <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                    <form class="modal_content_delete" action="">
                        <div class="container_delete">
                            <h1>Delete this notification</h1>
                            <p>Are you sure you want to delete the notification?</p>
                            <div class="clearfix_delete">
                                <a href="notification.php?delete1=<?=$question_id; ?>" type="button" class="deletebtn">Delete</a>
                                <button type="button" class="cancelbtn" onclick="hideModal();">Cancel</button>
                            </div>
                            </div>
                    </form>
                    </div>
            </div>
        </div>
    </div> 
    <footer>
        <?php include "../includes/footer.php"; ?>
    </footer>
    <script>
          function showModal() {
            document.getElementById("id01").style.display = "flex";
        }

        function hideModal() {
            document.getElementById("id01").style.display = "none";
        }

    </script>
</body>
</html>