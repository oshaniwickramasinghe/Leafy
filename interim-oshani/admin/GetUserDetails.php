<?php
include 'connect.php';

echo "getting user details";


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

                ?>
                <head>
                    <meta charset="UTF-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Document</title>
                    <link rel = "stylesheet" type = "text/css" href ='home.css'>   
                </head>
                <body>

                    <!-- The overlay -->
                    <div id="myNav" class="overlay">

                        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

                        <!-- Overlay content -->
                        <div class="overlay-content">
                            <a href="#">About</a>
                            <a href="#">Services</a>
                            <a href="#">Clients</a>
                            <a href="#">Contact</a>

                            <?php
                                $EMAIL= $rows['email'];
                                echo "$EMAIL";
                            ?>

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

<?php

            }
			
        
        include 'NotificationView.php';
    }
    else{
        echo "unsuccessful";
    }

}
else{
    echo "value not found";
}

?> 