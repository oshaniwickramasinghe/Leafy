
<!-- after checking out update the post table and insert into database -->
 <?php
error_reporting(0);

// include "../Auth.php";
include "cart.php";
include "../location/distance.php";

//total of the customer order
$sub =  $_SESSION['total'];
$total_cost = 0;

//current date
$date = date("Y-m-d");

$uid = $_SESSION['USER_DATA']['user_id'];


if(isset($_POST['checkout'])){
  foreach($_SESSION['cart'] as $keys => $values){

    $item_name  = $values['item_name'];
    // $post  = $values['post_id'];
    $quan  = $values['quantity'];
     $sql  = "INSERT INTO shopping_cart(item_name, quantity, post_id, customer_id) VALUES('$item_name',$quan,5,$uid)";
     $result = mysqli_query($conn,$sql);
  }

  foreach($_SESSION["cart"] as $keys => $values)
  {


$id =$_SESSION['cart'][$keys]['post_id']; 




$sql = "SELECT * FROM `post` WHERE post_id = $id";
$result = mysqli_query($conn,$sql);
 $rows = mysqli_fetch_assoc($result);
 $agriculturalist =  $rows['user_id'];
 if(mysqli_num_rows($result)>0){
    // while($rows = mysqli_fetch_array($result,MYSQLI_ASSOC)){
        $quan = $rows['quantity']- $_SESSION['cart'][$keys]['quantity'];
          if($quan>=0){
          $sql = "UPDATE post SET quantity= '$quan' WHERE post_id = $id";
          $result = mysqli_query($conn,$sql);
          }
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
    <title>checkout</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>
<body class = "check_body">
<div  class  =  "grid_4">

<div class  = "checkout">
 
<form  method  = "post"> 
<div class  =  "logoo">
        <img src="../images/logo.svg" alt="logo" width = "150px" height = "150px" class = "responsive">
</div>

  <div class  =  "form_content">

  <h3>Summary </h3>
  <h4>Select your option:</h4>
  <input type="checkbox" id=" Delivery" name=" Delivery" value=" Delivery">
  <label for="Delivery"> Delivery</label>

  <input type="checkbox" id="Pick_Up" name="Pick_Up" value=" Pick Up"> 
   <label for="Pick_Up"> Pick Up</label>
   <!-- <button class = "update" name = "add">Add</button><br><br> -->

 <!-- setting the final sum with delivery fee -->
<div  class=  "summary_body">
 <br> <label>Sub Total : Rs <?= $sub?>.00</label>
   <?php
   $delivery =0;
   if(isset($_POST['Delivery'])){
    $delivery =1;
    $fee =  delivery();
    $total_cost = $sub+$fee;
        ?>
     <br> <br><label>Delivery Fee : Rs  <?= $fee?> .00</label>
     <br> <br><label>Total : Rs <?= $sub+$fee?>.00</label>
        <?php
        }else{
          $total_cost=$sub;
            ?>
        <br> <br><label>Total : Rs <?=$sub?>.00</label>
        <?php
      }
     ?>
   </div>
     <br>

<h4>Select your Payment option:</h4>
  <input type="checkbox" id="card" name="card" value=" Card">
  <label for="Card">Card</label>
  <input type="checkbox" id="cash" name="cash" value="Cash> 
  <label for="Pick_Up">Cash</label> <button class = "update" name = "add">Add</button><br><br>
  </div>
  <a href = "../order/orderPending.php"><input type= "submit" class= "btn_1" value= "Pay Now"  name = "payment"
  data-inline = "true" style = "font-size :16px; width:150px ; margin-left:40%; margin-top:2%;"></a>
 </form>
</div>
</div>


<!-- entering all the details into the deals table -->
<?php

$id =$_SESSION['cart']['0']['post_id']; 
$sql = "SELECT user_id FROM `post` WHERE post_id = $id";
$result = mysqli_query($conn,$sql);
 $rows = mysqli_fetch_assoc($result);
 $agriculturalist =  $rows['user_id'];
 $customer = $_SESSION['USER_DATA']['user_id'];

if(isset($_POST['add'])){

if(isset($_POST['cash'])){
  $pay  = "cash";
}else{
  $pay  = "card";
}

$query = "INSERT INTO  `checkout`(`agriculturalist_id`) VALUES ($agriculturalist)";
$result = mysqli_query($conn,$query );
$select = "SELECT orderId FROM checkout WHERE agriculturalist_id = $agriculturalist && date = '$date' ";
$result = mysqli_query($conn,$select);


$rows = mysqli_fetch_assoc($result);

$oid  =$rows['orderId'];
foreach($_SESSION['cart'] as $keys => $values){

  $item_name  = $values['item_name'];
  // $post  = $values['post_id'];
  $quan  = $values['quantity'];

 $sql  = "INSERT INTO `deals`(`order_id`,`customer_id`, `payment_method`, `delivery`,`item_name`,`total_cost`, `quantity`, `agriculturalist_id`, `post_id`) VALUES ($oid ,$customer,'$pay',$delivery,' $item_name' ,$total_cost, $quan ,$agriculturalist,$id)";

 $result = mysqli_query($conn,$sql);

}
 }

 if(isset($_POST['payment'])){
 header("Location:../order/orderPending.php");

 }

?>



</body>
</html>

