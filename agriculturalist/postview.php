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
include 'agri_menu.view.php';


?>
<!-- <button class = "btnn" onclick="document.location='createpost.php'"> Create New Post </button> -->

<div class = "vegetable_body">
<div class = "row">

<?php

    $user_id =$_SESSION["USER_DATA"]["user_id"];
   

    $sql  =  "SELECT * FROM post WHERE user_id='$user_id' ";
    $result = mysqli_query($conn , $sql);

      // $query = "SELECT * FROM post ORDER BY post_id ASC";
      // //execute mysql query and store data in result
      // $result = mysqli_query($conn, $query);

      if (mysqli_num_rows($result) > 0) {

        while ($res = mysqli_fetch_array($result)) {
      ?>



<div class = "column_2" >
<form method  = "Post " action  =  "postview.php"  enctype="multipart/form-data">  
                <div class = "cards" >
                    <div class = "card_body">

                    <img src="./images/<?php echo $res['image'];?>" width="180" height="180" > 

                    <h5 style="font-size:large;"><?php echo $res['item_name']?></h5>

                    <h5 class = "text_danger">Location:   <?php echo $res['location'];?></h5>       
                    <h5 class = "text_danger">Price: Rs  <?php echo $res['unit_price'];?>.00  per Kg</h5>
                    <h5>Quantity :   <?php echo $res['quantity']?>kg </h5>
                    <h5>Minimum Quantity :   <?php echo $res['minimum_quantity']?>kg </h5>
                    <h5>Expire Date :   <?php echo $res['expire_date']?></h5>
                    
                    <div  class="edit_delete">
                    <a   href="eddit.php?Qtt=<?php echo $res['quantity'] ?>&mQtt=<?php echo $res['minimum_quantity'] ?>
                    &ex=<?php echo $res['expire_date'] ?>&price=<?php echo $res['unit_price'] ?>&loc=<?php echo $res['location'] ?>
                    &img=<?php echo $res['image'] ?>&vegi=<?php echo $res['item_name'] ?>&postid=<?php echo $res['post_id'] ?>">Edit</a>

                      <a  href="post_function/delete.post.php?postid=<?php echo $res['post_id'] ?>">Delete</a>
                      </div>
                     <!-- <input type= "submit" name= "Delete" class= "btn" value= "Delete" data-inline = "true"/> 
                     
                     <input type= "submit" name= "Delete" class= "btn" value= "Delete" data-inline = "true"/>  -->

                    
                  </div>
                </div>
             </form> 
       
        </div>
  <?php
 
  }
  }
  ?>
</div> 
<footer>
<img src = "../Customer/images/Footer.svg"  height= "121.3px"  style = "margin-top:auto">
</footer>

</body>

</html>

