<link rel="stylesheet" href="../CSS/style.css">
<link rel="stylesheet" href="../CSS/delivery.css">


<?php

require "../login/Auth.php";
include "../database/database.php";
include '../includes/header.php';

//view items  selected item in the wishlist using this page
$id  = $_SESSION['wishlist_id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>View</title>
</head>
<body>
<div class  = "view_body">
<?php
    $sql  =  "SELECT * FROM post WHERE post_id  = $id ";
    $result = mysqli_query($conn , $sql);

    if(mysqli_num_rows($result)>0){
        while($res =  mysqli_fetch_array($result)){
?>

<div class  = "grid_3">
<div class  = "left_3">
<img src="../../agriculturalist/images/<?php echo $res["image"];?>" width = "360" height="360">
</div>
<div class  = "right_3">
<form method="post" action="../shopping_cart/cart.view.php"> 

                  <h5 class = "text_danger">Price: Rs  <?php echo $res['unit_price'];?>.00  per Kg</h5>
                   <h5>Quantity :   <?php echo $res['quantity']?>kg </h5>
                   <h5>Agriculturalist Name :   <?php echo $res['agriculturalist_name']?> </h5>
                    <h5>District:  <?=$res['district'];?></h5>
                    <h5>Address:  <?=$res['location'];?></h5>
                    <h5>Contact : 0<?php echo $res['contact_no']?></h5>
                    <?php $id =$res["post_id"];?>
                    <input type = "hidden" name= "item_name" value = "<?php echo $res['item_name']; ?>">
                    <input type = "hidden" name= "post_id" value = "<?php echo $id; ?>">
                    <input type = "hidden" name= "quantity" value = "<?php  echo $res['quantity']; ?>">
                    <input type = "hidden" name= "price" value = "<?php echo $res['unit_price']; ?>">
                     <input type= "submit" name= "cart" class= "btn" value= "Add to cart" data-inline = "true"/>
                    <input type= "submit" name= "wishlist" class= "btn" value= "Add to wishlist" data-inline = "true"/>

        </form>
</div>
</div>

<a href  = "../wishlist/wishlist.php"> <button class="text-danger" name  = "back">Back </button></a>
<?php
        }
    }
?>
</div>

<div class  = "footer">
<?php include "../includes/footer.php"; ?>
</div>
</body>
</html>


