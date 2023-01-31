<?php
error_reporting(0);

require "../Auth.php";
include '../includes/header.php';
require "cart.php";

// unset($_SESSION['cart']);



if(isset($_POST["delete"]))
{
                
   
          foreach($_SESSION["cart"] as $keys => $values)
          {
               if($values["item_name"] == $_POST["item_name"])
               {
                
                    unset($_SESSION["cart"][$keys]);
                    echo '<script>alert("Item Removed")</script>';
                    echo '<script>window.location="cart.view.php</script>';
               }
          }
     }




if(isset($_POST['update'])){
 foreach($_SESSION['cart'] as $keys => $values)
          { 
  if($values['item_name'] == $_POST['item_name']){
 
    $_SESSION['cart'][$keys] =array( 
      'post_id'=>$_GET['post_id'],
      'item_name' =>$_POST['item_name'],
      'price'=>$_POST['price'],
       'quantity'=>$_POST['quantity'],
          
    );
    
}

}
          }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Shopping cart</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>

<body>


<div  class  = "grid">

<div class  = "left">
  <?php
 
    if(!empty(display())){

      $res = display();
?>


  <div class  = "grid_1">
   <div class  = "left_1">
         <img src="../images/<?php echo $res["image"];?>" width = "280" height="280">
      </div>
      <div class  = "right_1">
      <form method="post" action="cart.view.php"> 
      <h2 class= "text_info"><?php echo $res['item_name'];?></h2><br>
                   <div class = "info">
                   <h5 class = "text_danger">Price: Rs  <?php echo $res['unit_price'];?>.00  per Kg</h5>
                   <h5>Quantity :   <?php echo $res['quantity']?>kg </h5>
                   <h5>Agriculturalist Name :   <?php echo $res['agriculturalist_name']?> </h5>
                    <h5>District:  <?=$res['district'];?></h5>
                    <h5>Address:  <?=$res['location'];?></h5>
                    <h5>Contact : 0<?php echo $res['contact_no']?></h5>
                    </div> <?php $id =$res["post_id"];?>
                    <input type = "hidden" name= "item_name" value = "<?php echo $res['item_name']; ?>">
                    <input type = "hidden" name= "post_id" value = "<?php echo $id; ?>">
                    <input type = "hidden" name= "quantity" value = "<?php  echo $res['quantity']; ?>">
                    <input type = "hidden" name= "price" value = "<?php echo $res['unit_price']; ?>">

                     <input type= "submit" name= "cart" class= "btn_1" value= "Add to cart" data-inline = "true"/>
                     <input type= "submit" name= "Delete" class= "btn_1" value= "Add to wishlist" data-inline = "true"/>
    </form>
      </div>

  </div>
  <div class="continue">
          <a href = "../post/vegetable.view.php"><input type= "submit" name= "continue" class= "btn_1" value= "<< Continue" 
          data-inline = "true"/ style = "font-size :16px; width:150px"></a>

     </div>
</div>
<?php }
?>

<div class  = "right">
  <table>
  <h3><i class="fa fa-cart-plus" aria-hidden="true"></i>  Your Cart </h3>
    <tr>
   <th width="20%">Item Name</th>
   <th width="25%">Update Quantity</th>
   <th width="20%">Quantity</th>
   <th width="20%">Price</th>
   <th width="20%">Total</th>
   <th width="15%">Action</th>
    </tr>


  <?php
     if(!empty($_SESSION['cart'])){
       $total = 0;
       $val = 0;
       $val =  $_SESSION['cart']['quantity'];
       foreach($_SESSION['cart'] as $keys=>$values)
       {
        ?>
        <tr>
<form  method  = "post" action = "">
      <td> <input type = "text" value = "<?php  echo $values["item_name"] ?>"  name  ="item_name" style = "width :100px; background-color:transparent; border-color:transparent;" ></td>
      <td> 
      <input type = "number"  name = "quantity" style  = "width:50px" min = "0">
      <button class = "update" name = "update" style  = "width:50px">Add</button>

      
    </td>

      <!-- getting the quantity input by the customer -->
         
      <td> <?php  echo $values['quantity'] ?>Kg</td>
      <td> Rs <input type = "text" value = "<?php  echo $values["price"] ?>"  name  ="price"  style = "width :65px; background-color:transparent; border-color:transparent;" ></td>
			<td> Rs <?php  echo $values["price"]*$values['quantity']  *1; ?></td>
      <td><button class="text-danger" name  = "delete">Remove</button></td>  
</form>
          </tr>
        <?php
            $total = $total  + ($values["price"]*$values['quantity']  );
       }
       ?>
       <?php
       }
  ?>
  </table>
 


 <div class  = "check">
  <form method = "Post" action  =  "checkout.php">
<input type= "submit" name= "checkout" class= "btn_1" value= "Check Out  Rs. <?php echo $total ?> .00" 
 data-inline = "true" style = "font-size :16px; width:200px" >
  </form>  </div>

  

</div>
</div>




</body>
    <footer>
<img src = "../images/Footer.svg"  height= "121.3px" >
</footer>

</html>


