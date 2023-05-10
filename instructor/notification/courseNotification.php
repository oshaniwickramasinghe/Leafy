<?php
include '../includes/header.php'; 

// open the notification from Admin
if(isset($_GET['click']))
{
    $course_ID = $_GET['click'];

    $data2= "SELECT course_id,title,image,topic,is_read ,verified,date,description,comment
                    FROM course
                    WHERE course_id=$course_ID";


    $connection2=mysqli_query($conn,$data2);
    if($connection2)
    { 
        
    
        while($record = mysqli_fetch_assoc($connection2))
        {
            $title=$record['title'];
            $date=$record['date'];
            $course_id=$record['course_id'];
            $comment=$record['comment'];
            $image=$record['image'];
            $verified=$record['verified'];

        }

    }
          

    $query4 = "UPDATE course SET is_read = 1 WHERE course_id='$course_ID'";
    //$result3=mysqli_query($conn,$query3);
    mysqli_query($conn,$query4);

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

                <!--popup div for getting more details about blog notification from admin-->
                <div id="id03" class="modal">
                    <form class="modal-content" action="/action_page.php">
                        <div class="container">
                            <h1><i> Admin <?php if($verified == 1){ echo 'Accept';}else{echo 'Reject'; }?> </i> course -<?= $course_id ?> &nbsp;"<?=$title?>"</h1>
                            <?php
                            if($image == ''){
                                echo '<img src="../images/profilepic_icon.svg"  height= "100px" border-radius:50%>';
                            }else{
                                echo '<img src="../images/'.$image.'"  height= "100px" style=border-radius:50%;>';
                            }
                            ?>
                            <div class="details_container <?= $verified == 1 ? 'accept' : 'reject' ?>">
                                <table>
                                    <tr>
                                        <th>ID</th>
                                        <td>:</td>
                                        <td><?php if(isset ( $course_id)){ echo $course_id ;} ?></td>      
                                    </tr>
                                    <tr>
                                        <th>Title </th>
                                        <td>:</td>
                                        <td><?php if(isset ($title)){ echo $title; }?></td>
                                    </tr>
                                    <tr>
                                        <th>Reason</th>
                                        <td>:</td>
                                        <td><?php if(isset ($comment)){ echo $comment;} ?></td>
                                    </tr>
                                    <tr>
                                        <th>Course link </th>
                                        <td>:</td>
                                        <td><a href="../course/userblog.php?view_blog=<?= $course_id ?>">Course-<?=$course_id ?>-"<?=$title ?>"</a></td>
                                    </tr>
                                </table>
                                <div class="question_author"> 
                                    <div class="sending_date">
                                    date: <?= $date ?> 
                                    </div>
                                </div>
                                
                            </div>
                            <div class="clearfix">
                                <a href="notification.php?read2=<?= $course_id ?>" type="button" class="okbtn">Ok</a>
                                <a href="#" type="button" class="deletebtn" onclick="showModal(); return false;" >Delete</a>
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
                                <a href="notification.php?delete3=<?=$course_id; ?>" type="button" class="deletebtn">Delete</a>
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