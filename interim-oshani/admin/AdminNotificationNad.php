<?php
include 'connect.php';
$sql2="SELECT * FROM users";

// make query & get result2
$result2= mysqli_query($conn,$sql2);

if($result2)
    {
        echo mysqli_num_rows($result2);
        $list='<ul>';
        while($record=mysqli_fetch_assoc($result2)){
            $list.='<li>';
            $list.="<a href='GetUserDetails.php?id={$record['user_id']}'> {$record['email']}</a>";
            $list.='</li>';
        }
        $list.='</ul>';

     
    }



?> 





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home.css">
    <title>instructor blog page</title>
</head>
<body>
    <header></header>
    <div class="instructor_wrapper">
        <div class="left_menu_bar">
            <ul>
                <li><a href="">Questions</a></li>
                <li><a href="blog.php">Blogs</a></li>
                <li><a href="">Courses</a></li>
            </ul>
        </div>
        <div class="content">
            <h2>Blog</h2>
            <div class="container">
            <div class="container_right">
                <p>Your blog list</p>
                <div class="card">
                   <?php echo $list;?>
                </div>
            </div>
            <div class="container_left"></div>
           </div>
            <button onclick="location.href='create blog.php'" type="button" id="create">create</button>
            
        </div>

    </div>
    <script >

    </script>
</body>
</html>