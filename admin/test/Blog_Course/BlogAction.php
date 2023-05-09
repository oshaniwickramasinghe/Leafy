<?php
    require "../../database/database.php";
    require "../../public/Auth.php";
    include '../includes/header.php';
    ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Blog action</title>
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "../itemstyle.css">
    <link rel="stylesheet" href="../notification.css">
    <link rel="stylesheet" href="../../public/CSS/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />                                                   
        
</head>
<body>
    <?php include "../../includes/admin_menu.view.php"?>
		
    <div class = "loggedhome_body">
        <div class = "home_body">


        



        <div class="main_wrapper">
                <div class="content">
                    <div class="box">

                    <div class="container_left">
                    <div class="main_card">
                    <p>Questions</p>
                    <div class="card_left">
                    <a onclick="myFunction()" href="AdminForum.php?view=<?= $record1['question_id']; ?> ">
                                button
                            </a>
                            </div>
                            </div>
                            </div>
                            
                        <div class="container_right" id="view_more">

            <form action="BlogAction.php" method="post">
            <label for="blog_id">Blog ID to delete:</label>
            <input type="text" id="blog_id" name="blog_id"><br>
            <label for="comment">Comment:</label>
            <input type="text" id="comment" name="comment"><br>
            <input type="submit" value="Delete and insert comment">
            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
    <script src="notification.js"></script>

</body>
</html>



<?php
// Get the blog ID to delete and comment to insert
$blog_id = $_POST['blog_id'];
$comment = $_POST['comment'];

// Update the "approved" column to 2 for the specified blog ID
$sql = "UPDATE blog SET Verified=2 WHERE blog_id=$blog_id";
if ($conn->query($sql) === TRUE) {
  echo "Approved column updated successfully<br>";
} else {
  echo "Error updating approved column: " . $conn->error . "<br>";
}

// Insert a comment for the specified blog ID
$sql = "UPDATE blog SET comment='$comment' WHERE blog_id=$blog_id";
if ($conn->query($sql) === TRUE) {
  echo "Comment inserted successfully";
} else {
  echo "Error inserting comment: " . $conn->error;
}

// Close the database connection
$conn->close();
?>