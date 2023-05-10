<?php
include '../includes/header.php'; 


// open the notification from Admin
if(isset($_GET['open']))
{
    $blog_ID = $_GET['open'];

    $data2= " SELECT blog_id,title,image1,topic,is_read,date,Verified,description,comment
              FROM blog
              WHERE blog_id=$blog_ID";

    $connection2=mysqli_query($conn,$data2);
    if($connection2)
    { 
        
    
        while($record = mysqli_fetch_assoc($connection2))
        {
            $title=$record['title'];
            $date=$record['date'];
            $blog_id=$record['blog_id'];
            $comment=$record['comment'];
            $image=$record['image1'];
            $verified=$record['Verified'];

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
                <div id="id02" class="modal">
                    <form class="modal-content" action="/action_page.php">
                        <div class="container">
                            <h1><i> Admin <?php if($verified == 1){ echo 'Accept';}else{echo 'Reject'; }?> </i> blog -<?= $blog_id ?> &nbsp;"<?=$title?>"</h1>
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
                                        <td><?php if(isset ( $blog_id)){ echo $blog_id ;} ?></td>      
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
                                        <th>Link to blog </th>
                                        <td>:</td>
                                        <td><a href="../Blog/userblog.php?view_blog=<?= $blog_id ?>">Blog-<?=$blog_id ?>-"<?=$title ?>"</a></td>
                                    </tr>
                                </table>
                                <div class="question_author"> 
                                    <div class="sending_date">
                                    date: <?= $date ?> 
                                    </div>
                                </div>
                                
                            </div>
                            <div class="clearfix">
                                <a href="notification.php?read1=<?= $blog_id ?>" type="button" class="okbtn">Ok</a>
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
                                <a href="notification.php?delete2=<?=$blog_id; ?>" type="button" class="deletebtn">Delete</a>
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