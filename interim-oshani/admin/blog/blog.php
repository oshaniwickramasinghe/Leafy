<?php
include 'connect.php';
$sql2="SELECT * FROM blog";

// make query & get result2
$result2= mysqli_query($conn,$sql2);

    if(isset($_GET['view']))
    {
        echo "here";
        $blog_ID = $_GET['view'];
        $sql3 = "SELECT * FROM blog WHERE blog_ID=$blog_ID";
        $result3=mysqli_query($conn,$sql3);
        
        if($result3)
        { 
            
           
            while($record2 = mysqli_fetch_assoc($result3))
             {
                $blog_ID=$record2['blog_ID'];
                $title=$record2['title'];
                $author=$record2['author'];
                $content=$record2['content'];
   
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
    <header></header>
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
                <button onclick="location.href='createblog.php'" type="button" id="create">create</button>
            </div>
            <div class="container_right" id="view_more">
                <h3> Blog <?= $blog_ID ?>:   <?= $title ?></h3>
               <!-- <button class="close-button">&times;</button>-->
                <div class="container_button">
                    <button onclick="location.href=''" type="button" id="edit">Edit</button>
                    <button type="button" id="delete">Delete</button>
                </div>
                <div class="details_container">
                    <table>
                        
                        <tr>
                            <th>Blog ID</th>
                            <td>:</td>
                            <td><?=$blog_ID ?></td>
                        </tr>
                        <tr>
                            <th>Title </th>
                            <td>:</td>
                            <td><?=$title ?></td>
                        </tr>
                    
                        <tr>
                            <th>Content </th>
                            <td>:</td>
                            <td><?=$content ?></td>
                        </tr>
                        
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