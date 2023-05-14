<?php
include '../includes/header.php'; 
$user_ID=$_SESSION['USER_DATA']['user_id'];

if(!isset($user_ID)){
    header('location:../login/login.view.php');
}



$sql2="SELECT *  FROM blog where user_id='$user_ID' ORDER BY blog_id DESC";
$select=mysqli_query($conn,"SELECT * FROM `user` WHERE user_id='$user_ID'") or die('query failed');


if(mysqli_num_rows($select)>0){
    $fetch= mysqli_fetch_assoc($select);
}

// make query & get result2
$result2= mysqli_query($conn,$sql2);


    if(isset($_GET['view']))
    {
        $blog_ID = $_GET['view'];
        $sql3 = "SELECT * FROM blog WHERE blog_id=$blog_ID";
        $result3=mysqli_query($conn,$sql3);
        
        if($result3)
        { 
            
           
            while($record2 = mysqli_fetch_assoc($result3))
             {
                $blog_ID=$record2['blog_id'];
                $title=$record2['title'];
                $date=$record2['date'];
                $topic=$record2['topic'];
                $content1=$record2['content1'];
                $time=$record2['time'];
                $image1=$record2['image1'];
                $status=$record2['status'];

    }
        
    }
    }


    if(isset($_GET['delete']))
    {
        $blog_ID = $_GET['delete'];
        $query2 = "DELETE FROM blog WHERE blog_id=$blog_ID";
        $stmt2 = mysqli_query($conn,$query2);


        if(mysqli_affected_rows($conn) > 0) {
            echo "<script>alert('Record Deleted from database')</script>";
            ?>
            <META http-equiv="Refresh" content="5; URL=http://localhost/leafy/instructor/blog/blog.php">
            <?php
        } else {
            echo "<script>alert('Failed to delete from database')</script>";
            ?>
            <META http-equiv="Refresh" content="5; URL=http://localhost/leafy/instructor/blog/blog.php">
            <?php
            
        }
        
    }

    if(isset($_GET['send']))
    {
        $blog_ID = $_GET['send'];
      
    
        $query = "UPDATE blog SET submit = 1 WHERE blog_id=$blog_ID AND status='Complete'";
        $result = mysqli_query($conn, $query);
    
        if(mysqli_affected_rows($conn) > 0) {
            echo "<script>alert('Sending successful')</script>";
            ?>
            <META http-equiv="Refresh" content="5; URL=http://localhost/leafy/instructor/blog/blog.php">
            <?php
        } else {
            echo "<script>alert('Sending fail!')</script>";
            ?>
            <META http-equiv="Refresh" content="5; URL=http://localhost/leafy/instructor/blog/blog.php">
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
    <link rel="stylesheet" href="../images/fontawesome/css/all.css" />
    <script src="https://kit.fontawesome.com/e32c8f0742.js" crossorigin="anonymous"></script>
    <title>instructor blog page</title>
</head>
<body>
<div class="body">
   <div class="role_name">
        <h1><?php echo $fetch['role'];?></h1>
    </div>
    <div class="instructor_wrapper">   
    <?php include "../includes/instructorMenu.php"; ?>
        <div class="content"> 
            <h2>Blog</h2>
            <div class="container">
            <div class="table">
                <h3>Your blog list</h3>
                <table class="content-table">
                    <thead>
                        <tr>
                            <th>Blog ID</th>
                            <th>Title</th>
                            <th>Topic</th>
                            <th>Created Date</th>
                            <th>Status</th>
                            <th>Stage</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        if(mysqli_num_rows($result2)>0)
                            while($record1=mysqli_fetch_assoc($result2))
                    {?>
                        <tr>
                            <td><?php if(isset ($record1['blog_id'])){ echo $record1['blog_id'];} ?></td>
                            <td><?php if(isset ($record1['title'])){ echo $record1['title'];} ?></td>
                            <td><?php if(isset ($record1['topic'])){ echo $record1['topic'];} ?></td>
                            <td><?php if(isset ($record1['date'])){ echo $record1['date'];} ?></td>
                            <td><?php if(isset ($record1['status'])){ echo $record1['status'];} ?></td>
                            <td><?php if(isset ($record1['submit']))
                                             {if( $record1['submit']==0 && $record1['Verified']==0 )
                                                {    
                                                    echo 'Not send';
                                                }else if($record1['submit']==1 && $record1['Verified']==1){ 
                                                    echo 'Accept';
                                                }else if($record1['submit']==1 && $record1['Verified']==2){
                                                    echo 'Reject';

                                                }else if($record1['submit']==1 && $record1['Verified']==0){
                                                    echo 'Send';
                                                }
                                                    } ?>
                            </td>
                            <td>
                            <div class="container_button">
                                <a href="userblog.php?view_blog=<?= $record1['blog_id']; ?>" id="view"><i class="fa-solid fa-desktop" style="font-size:15px;color:#000000;"></i></a>
                                <a href="create_blog.php?edit=<?= $record1['blog_id']; ?>"  id="edit" ><i class="fa-solid fa-pen-to-square" style="font-size:15px;color:#000000;"></i></a>
                                <a href="#" id="delete" onclick="showModal_id01(); return false;" ><i class="fa-solid fa-trash" style="font-size:15px;color:#ee6c41;"></i></a>
                                <a href="#" type="button" id="send" onclick="showModal_id02(); return false;" ><i class="fa-solid fa-paper-plane" style="font-size:15px; color:#000000;"></i></a>
                            </div>
                            <!--delete modal-->
                                <div id="id01_<?= $record1['blog_id']; ?>" class="modal" style="display: none;">
                                    <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                                    <form class="modal-content" action="/action_page.php">
                                    <div class="container">
                                        <h1>Delete this blog</h1>
                                        <p>Are you sure you want to delete the blog?</p>
                                        <div class="clearfix">
                                            <a href="blog.php?delete=<?=$record1['blog_id']; ?>" type="button" class="deletebtn">Delete</a>
                                            <button type="button" class="cancelbtn" onclick="hideModal_id01();">Cancel</button>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                                  <!--send modal-->
                                  <div id="id02_<?= $record1['blog_id']; ?>" class="modal" style="display: none;">
                                    <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
                                    <form class="modal-content" action="/action_page.php">
                                    <div class="container">
                                        <h1>Send this blog to admin</h1>
                                        <p>Are you sure you want to send the blog to admin?</p>
                                        <div class="clearfix">
                                            <a href="blog.php?send=<?=$record1['blog_id']; ?>" type="button" class="deletebtn">Send</a>
                                            <button type="button" class="cancelbtn" onclick="hideModal_id02();">Cancel</button>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </td>
                        </tr>

                        <script>
                            function showModal_id01() {
                                
                                document.getElementById("id01_<?= $record1['blog_id']; ?>").style.display = "flex";
                            }

                            function hideModal_id01() {
                                document.getElementById("id01_<?= $record1['blog_id']; ?>").style.display = "none";
                            }

                            function showModal_id02() {
                                
                                document.getElementById("id02_<?= $record1['blog_id']; ?>").style.display = "flex";
                            }

                            function hideModal_id02() {
                                document.getElementById("id02_<?= $record1['blog_id']; ?>").style.display = "none";
                            }

                        </script>



                        <?php 
                        } else{
                        ?>
                        <tr>
                            <td colspan="6">Your blog list is empty</td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>

               

            </div>
            <div class="create-button">
                <button onclick="location.href='create_blog.php'" type="button" id="create"><i class="fa-solid fa-square-plus"></i> Create New Blog</button>
            </div>
            </div>
   </div>
   </div>
   </div>

   <footer>
           <?php include "../includes/footer.php";?>
    </footer>

    
</body>
</html>