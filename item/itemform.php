<?php
    require "../database/database.php";
    require "../public/Auth.php";
    include "../Customer/includes/header.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>interim list</title>
    <link rel = "stylesheet" type = "text/css" href = "itemstyle.css">
    <link rel="stylesheet" href="../admin/notification.css">
    <link rel="stylesheet" href="../public/CSS/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />                                                   
        
	</head>
<body>
    <?php include "../admin/admin_menu.view.php"?>
		
    <div class = "loggedhome_body">
        <div class = "home_body">
            <div class="instructor_wrapper">
            
            <form action="insertitem.php" method="post" id="form" enctype="multipart/form-data">
			
                <p>
                <label for="item_name">Item Name:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
                <input type="text" name="item_name" id="item_name" placeholder="Item names" required="required">
                </p>

                
                <p>
                <label for="category">Item Scientific Name:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
                <input type="text" name="category" id="category">
                </p>

                <p>
                <label for="item_image">Item Image:&nbsp&nbsp&nbsp</label>
                <input type="file" name="image" id="image" placeholder="Item Image" required="required">
                </p>

                <input id="button" type="submit" value="Submit">

            </form>

            </div>
        </div>
    </div>
        
	</center>
</body>
</html>
