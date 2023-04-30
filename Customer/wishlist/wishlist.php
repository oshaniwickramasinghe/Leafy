<link rel="stylesheet" href="../CSS/style.css">
<link rel="stylesheet" href="../CSS/delivery.css">

<?php
require "../../Customer/database/database.php";
require "../login/Auth.php";
include '../includes/header.php';


// unset($_SESSION['wishlist']);

//viewing the post information

if(isset($_POST['view'])){
     $_SESSION['wishlist_id'] = $_POST['post_id'];
      header("location:../post/view.php");
}

//deleting the post from wishlist

if(isset($_POST['delete'])){
      $id  = $_POST['post_id'];
      $sql = "DELETE FROM wishlist WHERE post_id =$id";
      $result = mysqli_query($conn , $sql);
      echo '<script>alert("Item removed from the wishlist")</script>';
      echo '<script>window.location ="wishlist.php"</script>';

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" 
    integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" 
    referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://kit.fontawesome.com/6b34f3c462.css" crossorigin="anonymous">
    <title>Wishlist</title>
</head>
<body>

<!-- body of the wishlist -->
<div class  = "wishlist_body">
<?php

$id =  $_SESSION['USER_DATA']['user_id'];

// select the correct post of the related customer using a join and inner select
$sql = "SELECT * FROM  post JOIN (SELECT * FROM wishlist WHERE user_id=$id) wishlist ON wishlist.post_id = post.post_id ";


      $result = mysqli_query($conn,$sql);
      if(mysqli_num_rows($result)>0){
            while($res =  mysqli_fetch_array($result)){

     ?>
     <br>
     <div  class = "wishlist">
      <form method="post" action="wishlist.php">
            <!-- creating a flex box-->
         <div class = "flex-container">

      <div class = "flex-item-left">
      <img src="../images/<?php echo $res["image"];?>" width = "150" height="150">
      </div>

   <!-- display item in wishlist -->
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

      <!-- viewing and removing item from wishlist -->
      <div class = "flex-item-right">
                    <button class="view" name  = "view">View</button>
                    <button class="delete" name  = "delete">Remove</button>

      </div>


      </div>
      </form>
      </div>

      <?php
            }
      }else{
        ?>
         <div class = "Empty"><p><b>Your wishlist is empty.<br></b>
         You can click on Add to wishlist button to add item to the list</p>
          <i class="far fa-list-alt fa-7x"></i>
         </div>

<?php
      }
?>

</div>
<script>
<?php

?>
</script>

<br><br><br><a href  = "../customerhome.php"> <button name  = "back" style = "margin-left:20%; border: none;">Back </button></a>

<div class = "footer">
<img src = "../images/Footer.svg"  height= "121.3px"  style = "margin-top:auto">
</div>

</body>
</html>
