<?php 
error_reporting(0);
require "../Auth.php";
include '../includes/header.php';
require "cart.php";
// unset($_SESSION['cart']);

?>


</script>

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



       <?php

var_dump($_SESSION['cart']['post_id'] );
      if(!empty(display())){
       $res = display();

       ?>
       <div class = "f_c">
     <form method = "post" action = ""> 
       <div class="grid">

    <div class="left">

                <div class="grid_1">
                <div class="left_1">
                    <div class="pic">
                    <img src="../images/<?php echo $res["image"];?>" width = "280" height="280" >
                   </div>
                   <div class="continue">
                   <input type= "submit" name= "continue" class= "btn_1" value= "<< Continue" data-inline = "true"/ style = "font-size :16px; width:150px">

                   </div> 

               </div>

        <div class="right_1">

                   <h2 class= "text_info"><?php echo $res['item_name'];?></h2><br>
                   <div class = "info">
                   <h5 class = "text_danger">Price: Rs  <?php echo $res['unit_price'];?>.00  per Kg</h5>
                   <h5>Quantity :   <?php 
                       $firstQuantity = $res['quantity'];
                   echo $res['quantity']?>kg </h5>
                   <h5>Agriculturalist Name :   <?php echo $res['agriculturalist_name']?> </h5>
                    <h5>District:  <?=$res['district'];?></h5>
                    <h5>Address:  <?=$res['location'];?></h5>
                    <h5>Contact : 0<?php echo $res['contact_no']?></h5>
                    </div> <?php $id =$res["post_id"];?>

                    <input type = "hidden" name= "post_id" value = "<?php echo $id; ?>">
                     <input type= "submit" name= "cart" class= "btn_1" value= "Add to cart" data-inline = "true"/>
                     <input type= "submit" name= "Delete" class= "btn_1" value= "Add to wishlist" data-inline = "true"/>

      </div>
      </div>
      </div>



       <?php
             }
        ?>
    </div>
    <div class="right">


    <table class = "table_content">
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
    $total =0;


    $id =$_SESSION['cart']['0']['post_id']; 

  
  
    $sql = "SELECT * FROM `post` WHERE post_id = $id";
    $result = mysqli_query($conn,$sql);
    //  $rows = mysqli_fetch_assoc($result);
    //  var_dump(mysqli_num_rows($result)>0);
    //  die;
     if(mysqli_num_rows($result)>0){
        // while($rows = mysqli_fetch_array($result,MYSQLI_ASSOC)){   
        while($rows = mysqli_fetch_assoc($result)){

   ?>

     <!-- //details for the shopping cart -->
    <tr>
      <td> <?php  echo $rows["item_name"]; ?></td>
      <td> <input type = "number" name = "quantity" id = "number" value = "<?php echo $_POST['quantity'];?>" class = "form-control"   width = "50px">
      <button class = "update" name = "update">Add</button>
    </td>

      <!-- getting the quantity input by the customer -->
          <?php if($_SERVER['REQUEST_METHOD'] == "POST"){
            $quantity = $_POST['quantity'];
            if(isset($_POST['update'])){
            if($quantity<= $rows['quantity'] && $quantity>0){
               
               if(isset($_SESSION['cart']['quantity'])){
                $_SESSION['cart']['quantity'] +=$quantity;
               }else{
               $_SESSION['cart']['quantity'] =  $quantity;
               }
            }
              
              }
            }
           ?>
      <td> <?php  echo $_SESSION['cart']['quantity']?>Kg</td>
      <td> Rs <?php  echo $rows["unit_price"]; ?></td>
			<td> Rs <?php  echo $rows["unit_price"]*$_SESSION['cart']['quantity']*1; ?></td>
      <td><button class="text-danger"  name  = "remove" onclick = "deleteItem()" >Remove</button></td>
    <?php
    function total(){
         
    }
    ?>

    <script>

function deleteItem(){
  if( confirm('Are you sure want to delete this item?') == true){
    <?php
    if (isset($_POST['remove'])){
    foreach ($_SESSION['cart'] as $key => $value){
       unset($_SESSION['cart'][$key]);
      }
      }
      
      ?>


  }
}
</script>


       <!-- getting sum of the items -->
            <?php
              $total  += $rows["unit_price"]*$_SESSION['cart']['quantity'];

            ?>
</tr>
</table>

 <!-- closing the while loop -->
<?php
   }
   }

?>

</div>

</form>  

<div class  =  "check_form">
<form method = "Post" action  =  "checkout.php">
 <div class  = "check">
<input type= "submit" name= "checkout" class= "btn_1" value= "Check Out  Rs. <?php echo $total ?> .00" 
 data-inline = "true" style = "font-size :16px; width:200px" >
  </div>
  </form>
  </div>
 </div>

<br>

  <!-- showing related items -->
<p class = "topic">You may wish to add items from same agriculturalist...</p>

<div class = "column">
                <div class = "cards">
                    <div class = "card_body">


                    <img src="../images/<?php echo $res["image"];?>" width = "180" height="150">
                    <div class="detail"> 
                    <h5 class= "text_info">Name:<?php echo $res['item_name'];?></h5>
                    <h5>Location:<?=$res['district'];?></h5>
                    <h5>Quantity : <?php echo $res['quantity']?>kg </h5>
                    <h5 class = "text_danger">Price: Rs <?php echo $res['unit_price'];?> /kg</h5> 
                </div>

                   <input type= "submit" name= "cart" class= "btn_1" value= "Add to cart" data-inline = "true"/>
                  <input type= "submit" name= "wishlist" class= "btn_1" value= "Add to wishlist" data-inline = "true"/>

                  </div>
                </div>
      </div>
             
</body>
<footer>
<img src = "../images/Footer.svg"  height= "121.3px" >
</footer>

</html>