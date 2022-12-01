<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel = "stylesheet" type = "text/css" href ='home.css'>   
</head>
<body>

    <?php
    include 'connect.php';

    $query1 = "SELECT * FROM users WHERE user_id=$id";
//variables are different
    $result= mysqli_query($conn,$query1);

    ?>

    <!-- The overlay -->
    <div id="myNav" class="overlay">

        <!-- Button to close the overlay navigation -->
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

        <!-- Overlay content -->
        <div class="overlay-content">
            <a href="#">About</a>
            <a href="#">Services</a>
            <a href="#">Clients</a>
            <a href="#">Contact</a>
            <a href='#'> <?php $record['email'] ?></a>

        </div>

        

            
        <br><br>

    </div>

    <!-- Use any element to open/show the overlay navigation menu -->
    <span onclick="openNav()">open</span>

    <script>
    function openNav() {
    document.getElementById("myNav").style.width = "50%";
    }

    function closeNav() {
    document.getElementById("myNav").style.width = "0%";
    }
    </script>
</body>
</html>

