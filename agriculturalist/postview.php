<?php 

include '../public/Auth.php';
include '../public/includes/header.view.php';
include 'database.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>postview</title>
  <link rel="stylesheet" href="agristyle.css">
</head>

<body>

<?php 
include '../public/includes/agri_menu.view.php';


?>
<!-- <button class = "btnn" onclick="document.location='createpost.php'"> Create New Post </button> -->

<div class = "vegetable_body">
<div class = "row">

<?php

    $user_id =$_SESSION["USER_DATA"]["user_id"];

    $sql  =  "SELECT * FROM post WHERE user_id='$user_id' ";
    $result = mysqli_query($conn , $sql);

      $query = "SELECT * FROM postcreate ORDER BY itemID ASC";
      //execute mysql query and store data in result
      $result = mysqli_query($conn, $query);




<div class = "column_2" >
<form method  = "Post " action  =  ""  enctype="multipart/form-data">  
                <div class = "cards" >
                    <div class = "card_body">

                    <img src="./images/<?php echo $res['image'];?>" width="180" height="180" > 

                    <h5 style="font-size:large;">    <?php echo $res['item_name']?></h5>

                            
                    <h5 class = "text_danger">Price: Rs  <?php echo $res['unit_price'];?>.00  per Kg</h5>
                    <h5>Quantity :   <?php echo $res['quantity']?>kg </h5>
                    <h5>Minimum Quantity :   <?php echo $res['minimum_quantity']?>kg </h5>
                    <h5>Expire Date :   <?php echo $res['expire_date']?></h5>
                    

                    <a class="btn"  href="eddit.php">Edit</a>
                      <a class="btn" href="eddit.php">Delete</a>
                    
                     <!-- <input type= "submit" name= "Delete" class= "btn" value= "Delete" data-inline = "true"/> 
                     
                     <input type= "submit" name= "Delete" class= "btn" value= "Delete" data-inline = "true"/>  -->

                    
                  </div>
                </div>
             </form> 
       
  </div> 
</body>

</html>
<?php
 
  }
  }
  ?>
<?php include '../includes/footer.view.php'?>