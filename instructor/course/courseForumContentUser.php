<?php
include "../includes/header.php";
$user_ID   = 1;
$user_role = "Customer";

$update="";

if(isset($_GET['view']))
{
    $course_id = $_GET['view'];

    $sql1   = "SELECT course_forum.*, user.image, user.fname, user.lname
                FROM course_forum
                JOIN user ON course_forum.user_id = user.user_id  
                WHERE course_forum.course_id = $course_id
                AND  course_forum.approved = 1
                ORDER BY question_id DESC";

    $result1 = mysqli_query($conn,$sql1);

    if(isset($_POST['submit']) && isset($_POST['id']))
    {
     
        $question_id = $_POST['id'];

        $answer      = mysqli_real_escape_string($conn,$_POST['input_answer']);
        
        $query       = "UPDATE  course_forum
                        SET reply='$answer', answered=1
                        WHERE question_id = $question_id ";

        $stmt      = mysqli_query($conn,$query);


         if($stmt){
            $update = true;
            echo"<script>alert('Saved reply');</script>";

        }else{
            echo"Error: " . $stmt . "<br>" . mysqli_error($conn);
        }


    }

    if(isset($_POST['update']) && isset($_POST['id']))
    {
     
        $question_id = $_POST['id'];

        $answer      = mysqli_real_escape_string($conn,$_POST['input_answer']);
        
        $query2       = "UPDATE  course_forum
                        SET reply='$answer', answered=1
                        WHERE question_id = $question_id ";

        $stmt2      = mysqli_query($conn,$query2);


         if($stmt2){
            $update = true;
            echo"<script>alert('Saved reply');</script>";

        }else{
            echo"Error: " . $stmt2 . "<br>" . mysqli_error($conn);
        }


    }

    
    if(isset($_POST['save']))
    {
     
        $question      = mysqli_real_escape_string($conn,$_POST['input_question']);
        
        $sql2       = "INSERT INTO course_forum
                         (user_id,course_id,content)
                         values('$user_ID','$course_id','$question')";

        $result2      = mysqli_query($conn,$sql2);


        if($result2){
            exit('send your question');

        }else{
            echo"Error: " . $result2 . "<br>" . mysqli_error($conn);
        }



    }


       
    
    
    
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="courseForumContent.css">
    <title>course Forum Content</title>
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
                <div class="create-btn">
                    <a href="#" type="button" id="create" onclick="document.getElementById('id01').style.display='block'" >
                    <i class="fa-solid fa-square-plus" style="font-size:14px;color:#fff;"></i>&nbsp;
                        Add question
                    </a>
                </div>
                    <div class="questions">
                    <?php
                            if(mysqli_num_rows($result1)>0)
                            {
                                while($record1=mysqli_fetch_assoc($result1))
                                {
                    ?>
                        <div class="question" id="question_<?php if(isset ($record1['question_id'])){ echo $record1['question_id'];} ?>">
                            <div class="fetching_content">
                                <div class="user_image">
                                    <?php
                                        if($record1['image'] == ''){
                                            echo '<img src="../images/profilepic_icon.svg"  height= "30px" border-radius:50%>';
                                        }else{
                                            echo '<img src="../images/'.$record1['image'].'"  height= "30px" border-radius:50%;>';
                                        }
                                        ?>
                                </div>
                                <div class="question_content">
                                    <div class="question_details">
                                        <h4><?php if(isset ($record1['content'])){ echo $record1['content'];} ?> ? </h4>
                                        <p>Post By : <?php if(isset ($record1['fname'])){ echo $record1['fname'];} ?> <?php if(isset ($record1['lname'])){ echo $record1['lname'];} ?> on <?php if(isset ($record1['date'])){ echo $record1['date'];} ?>
                                         at <?php if(isset ($record1['time'])){ echo $record1['time'];} ?></p>
                                    </div>

                                    <div class="answer">
                                        <label for="answer">Answer:</label><br>
                                        <input type="text" name="reply" id="reply" value="<?=$record1['reply']?>" placeholder="Not answered yet">
                                    </div>
                                </div>
                                <div class="status_div">
                                    <div class="status">
                                        <?php
                                            if( $record1['answered']==1){
                                                ?>
                                                    <p class="status_text">Answered <i class="fa-regular fa-thumbs-up" style="font-size:17px;color:#4589D8;"></i></p>
                                                <?php }else{?>
                                                    <p class="status_text">Not answered<i class="fa-regular fa-thumbs-down"  style="font-size:17px;color:#ee6c41;"></i></P>
                                        <?php } ?>
                                    </div>
                                    <?php
                                        if( $user_role =="Instructor"){
                                            ?>
                                                 <div class="reply-btn">
                                                    <a href="#" type="button" id="reply_<?php if(isset ($record1['question_id'])){ echo $record1['question_id'];} ?>" 
                                                    onclick="document.getElementById('input_content-<?php if(isset ($record1['question_id'])){ echo $record1['question_id'];} ?>').style.display='block'" >
                                                    Reply
                                                    <i class="fa-solid fa-share" style="font-size:15px;color:#000000;"></i></a>
                                                </div>
                                                
                                            <?php }
                                    ?>
                                </div>
                            </div>
                            <!--reply div-->
                            <div class="input_content" id="input_content-<?php if(isset ($record1['question_id'])){ echo $record1['question_id'];} ?>">
                                <span onclick="document.getElementById('input_content-<?php if(isset ($record1['question_id'])){ echo $record1['question_id'];} ?>').style.display='none'" class="close" title="Close Modal">&times;</span>
                                <form action="" method="post" enctype="multipart/form-data" id="">
                                <div class="answer_div">
                                    <input type="hidden" name="id" id="id" value="<?=$record1['question_id']?>">
                                    <textarea for="input_answer" id="input_answer" placeholder="reply..." name="input_answer"  value=""  required></textarea><br>   
                                </div>
                            
                                <div class="submit-btn">
                                    <?php if($update == true) {?>
                                            <button type="submit" value="update" name="update">Update</button>
                                        <?php } else {?>     
                                            <button  type="submit"  value="submit" name="submit" >Submit</button>
                                    <?php } ?> 
                                </div>

                                </form>
                            </div>    

                        </div>
                        <?php }
                      }else{?>
                        <p> There is not any questions in forum.</p>
                    <?php  }?>
                    </div>
                    <!--create modal-->
                    <div id="id01" class="modal" style="display: none;">
                        <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                        <form class="modal-content" action="" method="post" enctype="multipart/form-data">
                                <h2>Add Question</h2>
                                <textarea for="input_question" id="input_question" placeholder="Add question..."  name="input_question"></textarea><br> 
                                <div class="clearfix">
                                    <button  class="savebtn" name="save">Save</button>
                                    <button type="button" class="cancelbtn" onclick="document.getElementById('id01').style.display='none'" >Cancel</button>
                                </div>
                        </form>
                    </div>
                        
                </div>
                    </div>
  
                </div>
           </div>
        </div>
    </div>
<footer><?php include "../includes/footer.php"; ?></footer> 
<script>




</script>
</body>
</html>