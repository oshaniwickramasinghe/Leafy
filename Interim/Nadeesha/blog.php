<?php
include 'connect.php';
session_start();
$user_ID = $_SESSION['user_ID'];
$first_name = $_SESSION['fname'];
$last_name = $_SESSION['lname']; 
if(!isset($user_ID)){
    header('location:../login.php');
};

if(isset($_GET['logout'])){
     unset($user_ID);
     session_destroy();
     header('location:login.php');
}



$sql2="SELECT *  FROM blog blog inner join instructor ins on  blog.user_ID = ins.user_ID where blog.user_ID='$user_ID' ORDER BY blog.blog_ID DESC";
$select=mysqli_query($conn,"SELECT * FROM `instructor` WHERE user_ID='$user_ID'") or die('query failed');

if(mysqli_num_rows($select)>0){
    $fetch= mysqli_fetch_assoc($select);
}

// make query & get result2
$result2= mysqli_query($conn,$sql2);





    if(isset($_GET['view']))
    {
        $blog_ID = $_GET['view'];
        $sql3 = "SELECT * FROM blog WHERE blog_ID=$blog_ID";
        $result3=mysqli_query($conn,$sql3);
        
        if($result3)
        { 
            
           
            while($record2 = mysqli_fetch_assoc($result3))
             {
                $blog_ID=$record2['blog_ID'];
                $title=$record2['title'];
                $date=$record2['date'];
                $author=$record2['author'];
                $content=$record2['content'];
                $comment=$record2['comment'];
                $time=$record2['time'];
                $image=$record2['image'];
   
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
    <link rel="stylesheet" href="blog.css">
    <title>instructor blog page</title>
</head>
<body>
    
    <div class="role_name">
        <div class="left"><h1><?php echo $fetch['role'];?></h1></div>
        <div class="right"><h3><?php echo $fetch['first_name']." ".$fetch['last_name']; ?></h3></div>
    </div>
    <div class="instructor_wrapper">
        
        <div class="left_menu_bar">
            <h3>Menu</h3>
            <ul>
                <li><a href="">Questions</a></li>
                <li><a href="blog.php">Blogs</a></li>
                <li><a href="">Courses</a></li>
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
                            <li><a onclick="myFunction()" href="blog.php?view=<?= $record1['blog_ID']; ?> ">Blog <?= $record1['blog_ID']?> - <?=$record1['title']?></a></li>
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
                    <button onclick="location.href=''" type="button" id="edit">Edit</button>
                    <button type="button" id="delete">Delete</button>
                </div>
                <div class="details_container">
                    <h4><?php if(isset ($fetch['first_name'])){ echo $fetch['first_name'];} ?></h4>
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
                <from action=   ></from>
                
            </div>

           </div>
            
            
        </div>

    </div>

        <script src="blog.js"></script>
</body>
</html>