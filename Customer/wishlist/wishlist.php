<?php

require "../../Customer/database.php";
require "../Auth.php";
include '../includes/header.php';


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
    

<?php

if(isset($_SESSION['wishlist'])){

      foreach($_SESSION["wishlist"] as $keys => $values)
      {
$id = $_SESSION['wishlist'][$keys]['id'];

   
      $sql = "SELECT * FROM post WHERE post_id = $id ";

      $result = mysqli_query($conn,$sql);
      if(mysqli_num_rows($result)>0){
      $res =  mysqli_fetch_array($result);

     ?>
     <br>
     <div  class = "wishlist">
      <form method="post" action="wishlist.php"> 
         <div class = "flex-container">  

      <div class = "flex-item-left">
      <img src="../images/<?php echo $res["image"];?>" width = "180" height="180">
      </div>
      <div class  = "flex-item-right">

       <h5>Price: Rs  <?php echo $res['unit_price'];?>.00  per Kg</h5>
                   <h5>Quantity :   <?php echo $res['quantity']?>kg </h5>
                   <h5>Agriculturalist Name :   <?php echo $res['agriculturalist_name']?> </h5>
                    <h5>District:  <?=$res['district'];?></h5>
                    <h5>Address:  <?=$res['location'];?></h5>
                    <input type = "hidden" name= "item_name" value = "<?php echo $res['item_name']; ?>">
                    <input type = "hidden" name= "post_id" value = "<?php echo $res['post_id']; ?>">
                    <input type = "hidden" name= "quantity" value = "<?php  echo $res['quantity']; ?>">
                    <input type = "hidden" name= "price" value = "<?php echo $res['unit_price']; ?>">
      </div>
      </div>
      </form>
      </div>
     <?php

      }
}
  
}
?>


</body>
</html>
<footer>
<img src = "../images/Footer.svg"  height= "121.3px" >
</footer>
