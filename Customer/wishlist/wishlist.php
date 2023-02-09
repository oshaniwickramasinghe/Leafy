<?php

require "../../Customer/database.php";
require "../Auth.php";
include '../includes/header.php';


// unset($_SESSION['wishlist']);


if(isset($_POST['view'])){
     $_SESSION['wishlist_id'] = $_POST['post_id'];
      header("location:../post/view.php");
}


if(isset($_POST['delete'])){
      $id  = $_POST['post_id'];
      $sql = "DELETE FROM wishlist WHERE post_id =$id";
      $result = mysqli_query($conn , $sql);
      echo '<script>"Item removed from the wishlist"</script>';
      header("location:wishlist.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style.css">
    <title>Wishlist</title>
</head>
<body>
    
<div class  = "wishlist_body">
<?php


$id =  $_SESSION['USER_DATA']['user_id'];

$sql = "SELECT * FROM  post JOIN (SELECT * FROM wishlist WHERE user_id=$id) wishlist ON wishlist.post_id = post.post_id ";


      $result = mysqli_query($conn,$sql);
      if(mysqli_num_rows($result)>0){
            while($res =  mysqli_fetch_array($result)){
  

     ?>
     <br>
     <div  class = "wishlist">
      <form method="post" action="wishlist.php"> 
         <div class = "flex-container">  

      <div class = "flex-item-left">
          
      <img src="../images/<?php echo $res["image"];?>" width = "150" height="150">
      </div>
      <div class  = "flex-item-center">
     
                   <p><b> Name :   <?php echo $res['item_name']?> </p></b>
                   <p><b>Price: Rs  <?php echo $res['unit_price'];?>.00  per Kg</p></b>
                   <p><b>Quantity :   <?php echo $res['quantity']?>kg </p></b>
                    <p><b>District:  <?=$res['district'];?></p></b>
                    
                    <input type = "hidden" name= "item_name" value = "<?php echo $res['item_name']; ?>">
                    <input type = "hidden" name= "post_id" value = "<?php echo $res['post_id']; ?>">
                    <input type = "hidden" name= "quantity" value = "<?php  echo $res['quantity']; ?>">
                    <input type = "hidden" name= "price" value = "<?php echo $res['unit_price']; ?>">
                   
      </div>
      <div class = "flex-item-right">
      <button class="text-danger" name  = "view">View</button>
                    <button class="text-danger" name  = "delete">Remove</button>
     
            </div>
      </div>
      </form>

      </div>
     <?php
            }
      }

?>


<br><br><br><a href  = "../customerhome.php"> <button class="text-danger" name  = "back">Back </button></a>
</div>
<footer>
<img src = "../images/Footer.svg"  height= "121.3px"  style = "margin-top:auto">
</footer>

</body>
</html>
