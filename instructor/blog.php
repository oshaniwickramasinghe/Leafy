<?php
include 'header.php'; 
$user_ID=$_SESSION['USER_DATA']['user_id'];

if(!isset($user_ID)){
    header('location:../login.view.php');
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
               // $author=$record2['author'];
                $content=$record2['content'];
               // $comment=$record2['comment'];
                $time=$record2['time'];
                $image=$record2['image'];
   
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
            <META http-equiv="Refresh" content="5; URL=http://localhost/leafy/instructor/blog.php">
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
    <link rel="stylesheet" href="blog.css">
    <script src="https://kit.fontawesome.com/e32c8f0742.js" crossorigin="anonymous"></script>
    <title>instructor blog page</title>
</head>
<body>
    
   <div class="body">
   <div class="role_name">
        <h1><?php echo $fetch['role'];?></h1>
    </div>
    <div class="instructor_wrapper">
        
        <div class="left_menu_bar">
           <div id="menu">
            <a><i class="fa-solid fa-bars" style="font-size:20px;color:#43562B;"></i></a>
            <div class="image"><img src="images/badge.svg" alt=""></div>
            <h3>Leafy</h3>
           </div>
            <ul>
                <li><a href="home.view.php"><i class="fa-solid fa-house" style="font-size:18px;color:#43562B;"></i>Home</a></li>
                <li><a href="Insdashboard.php"><i class="fa-solid fa-gauge-high" style="font-size:18px;color:#43562B;"></i>Dashboard</a></li>
                <li><a href="notification.php"><i class="fa-solid fa-comments" style="font-size:17px;color:#43562B;"></i>Questions</a></li>
                <li><a href="blog.php"><i class="fa-brands fa-blogger" style="font-size:20px;color:#43562B;"></i>Blogs</a></li>
                <li><a href="course.php"><i class="fa-brands fa-readme" style="font-size:18px;color:#43562B;"></i>Courses</a></li>
            </ul>
        </div>
        <div class="content">
            
            <h2>Blog</h2>
            <div class="container">
            <div class="container_left">
                <div class="main_card">
                <p>Your blog list</p>
                <div class="card_left">
                    <ul>
                        <?php while($record1=mysqli_fetch_assoc($result2)){?>
                            <li><a  href="blog.php?view=<?= $record1['blog_id']; ?>">Blog <?= $record1['blog_id']?> - <?=$record1['title']?></a></li>
                        <?php }?>
                    </ul>
                </div>
                </div>
                <button onclick="location.href='create blog.php'" type="button" id="create">create</button>
            </div>
            <div class="container_right" id="view_more">
                <h3> Blog <?php if(isset ($blog_ID)){ echo $blog_ID;} ?>:   <?php if(isset ($title)){ echo $title;} ?></h3>
               <!-- <button class="close-button">&times;</button>-->
                <div class="container_button">
                    <a href="userblog.php?view_blog=<?=$blog_ID; ?>" type="button" id="view">View</a>
                    <a href="create blog.php?edit=<?=$blog_ID; ?>" type="button" id="edit" >Edit</a>
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
                <div class="details_container">
                    <h4><?php if(isset ($fetch['fname'])){ echo $fetch['fname'];} ?></h4>
                    <p><?php if(isset ($time)){ echo $time;} ?></p>
                    <table>
                        
                        <tr>
                            <th>Blog ID</th>
                            <td>:</td>
                            <td><?php if(isset ($blog_ID)){ echo $blog_ID;} ?></td>
                            
                                
                        </tr>
                        <tr>
                            <th>Image</th>
                            <td>:</td>
                            <td><img src="./images/<?php if(isset ($image)){ echo $image;} ?>" align="middle" width="110"></td>
                        </tr>
                        <tr>
                            <th>Title </th>
                            <td>:</td>
                            <td><?php if(isset ($title)){ echo $title;} ?></td>
                        </tr>
                        <tr>
                            <th>Date </th>
                            <td>:</td>
                            <td><?php if(isset ($date)){ echo $date;} ?></td>
                            
                        </tr>
                        <tr>
                            <th>Content </th>
                            <td>:</td>
                            <td><?php if(isset ($content)){ echo $content;} ?></td>
                        </tr>
                       <!-- <tr>
                            <th>Comment </th>
                            <td>:</td>
                            <td><?php if(isset ($commen)){ echo $commen;} ?></td>
                        </tr>-->
                    </table>
                </div>
            
                
            </div>

           </div>
            
            
        </div>

    </div>
   </div>
   <footer>
           <?php include "footer.php";?>
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