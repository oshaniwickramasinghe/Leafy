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

    <div>

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
                    $list.="<button class='note' id={$record['user_id']}'> {$record['email']}</button>";
                    $list.='</li>';
                }
                $list.='</ul>';
            }

            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $query1 = "SELECT * FROM users WHERE user_id=$id";

                $result= mysqli_query($conn,$query1);

                if($result)
                {
                        // LOOP TILL END OF DATA
                        while($rows=$result->fetch_assoc())
                        {
                            $EMAIL= $rows['email'];
                            echo "$EMAIL";

                        }
                        
                    
                    include 'NotificationView.php';
                }
                else{
                    echo "unsuccessful";
                }

            }

    ?>
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
                        
                    </div>

                </div>

    </div>

    <!-- The overlay -->
    <div id="myNav" class="overlay">

        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

        <!-- Overlay content -->
        <div class="overlay-content">
            <a href="#">About</a>
            <a href="#">Services</a>
            <a href="#">Clients</a>
            <a href="#">Contact</a>

        </div>
            
        <br><br>

    </div>

    <!-- Use any element to open/show the overlay navigation menu -->
    <span onclick="openNav()">open</span> -->

    <script>

    //document.getElementById("note").addEventListener("click", openNav);

    function openNav() {
    document.getElementById("myNav").style.width = "50%";
    }

    function closeNav() {
    document.getElementById("myNav").style.width = "0%";
    }
    </script>

    
</body>
</html>