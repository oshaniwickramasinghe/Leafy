
<!-- after checking out update the post table and insert into database -->
 <?php
 error_reporting(0);
include "../Auth.php";
include "cart.php";

if(isset($_POST['checkout'])){

$id =$_SESSION['cart']['0']['post_id']; 


$sql = "SELECT * FROM `post` WHERE post_id = $id";
$result = mysqli_query($conn,$sql);
 $rows = mysqli_fetch_assoc($result);
//  var_dump($rows);
 if(mysqli_num_rows($result)>0){
    // while($rows = mysqli_fetch_array($result,MYSQLI_ASSOC)){
        $quan = $rows['quantity']- $_SESSION['cart']['0']['quantity'];
        
          if($quan>=0){
          // $sql = "UPDATE post SET quantity= '$quan' WHERE post_id = $id";
          // $result = mysqli_query($conn,$sql);
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

<div class  = "checkout">
 <form  method  = "post"> 

 <div class  =  "logoo">
        <img src="../images/logo.svg" alt="logo" width = "150px" height = "150px" class = "responsive">
      </div>     
       <h3>Summary </h3>
  <h4>Select your option:</h4>
  
  <input type="checkbox" id=" Delivery" name=" Delivery" value=" Delivery">
  <label for="Delivery"> Delivery</label>

  <input type="checkbox" id="Pick_Up" name="Pick_Up" value=" Pick Up"> 
   <label for="Pick_Up"> Pick Up</label>
   <!-- <button class = "update" name = "add">Add</button><br><br> -->

<?php

   if(!empty(display())){
       $res = display();
      //  var_dump($res);
$sub =  $rows['unit_price']*$_SESSION['cart']['0']['quantity'];
       ?>
       <div  class=  "summary_body">

  <br> <label>Sub Total : Rs <?= $sub?>.00</label>
   <?php
   }   
   ?>
   <?php
   if(isset($_POST['Delivery'])){
    $fee = 100;
        ?>
     <br> <br><label>Delivery Fee : Rs  <?= $fee?> .00</label>
     <br> <br><label>Total : Rs <?= $sub+$fee?>.00</label>
 
        <?php
        }else{
            ?>
            <br> <br><label>Total : Rs <?= $sub?>.00</label>
             <?php
      }
     ?>  </div>
     <br>
<h4>Select your Payment option:</h4>
  
  <input type="checkbox" id="card" name="card" value=" Card">
  <label for="Card">Card</label>

  <input type="checkbox" id="cash" name="cash" value="Cash> 
   <label for="Pick_Up">Cash</label> <button class = "update" name = "add">Add</button><br><br>
   

</form>
<?php if(isset($_POST['card'])){

?>
<a href="payment.php"><input type= "submit" class= "btn_1" value= "Pay Now"  name = "payment"
 data-inline = "true" style = "font-size :16px; width:280px" ></a><br>
 <?php
 }else{
  ?>
  <input type= "submit" class= "btn_1" value= "Pay Now"  name = "payment"
 data-inline = "true" style = "font-size :16px; width:280px" ><br>
  <?php
 }
 ?>
</div>


</body>
</html>

