<?php
session_start();
?>
<html>  
    <head>  
        <title>Home</title>  
        <link rel = "stylesheet" type = "text/css" href = "style.css">   
    </head> 

    <body>  

    <div class="header">
        <h1>Leafy</h1>   
    </div>

        <div align='center'>
            <p>Click here to register a user</p>
            <a href="form.php">
                <button id="button">form</button>
            </a>

            <p>Click here to add an item</p>
            <a href="item.html">
                <button id="button">Item</button>
            </a>
        
            <p>Click here view users</p>
            <a href="view.php">
                <button id="button">view</button>
            </a>

            
        </div>  

    <div class="footer">
        <p>Click here to logout
            <a href="logout.php">
                <button id="logout">Logout</button>
            </a>
        </p>
    </div>
        
    </body>     
</html>  