<?php
include "../Auth.php";
include "../database.php";

 $customerId  = $_SESSION['USER_DATA']['user_id'];

$date = date("Y-m-d");

$sql  = "SELECT order_id,payment_method FROM `deals` WHERE customer_id  = $customerId  && Date = '$date' ORDER BY order_id DESC";
$result  = mysqli_query($conn,$sql);
$row  = mysqli_fetch_array($result);
$orderId = $row['order_id'];

$query ="SELECT status FROM checkout WHERE orderId = $orderId";
$Rlt  = mysqli_query($conn,$query);
$res = mysqli_fetch_array($Rlt);

var_dump($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="refresh" content="5" > 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Customer/CSS/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" 
 integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" 
 referrerpolicy="no-referrer" />
    <title>Pending</title>
</head>
<body>
   <?php
   
if($res['status'] == 0){
  
    ?>
    <div class  =  "msg_body">
    <div class ='card'>
  <div class ='upper-side'>
  <i class="fa fa-check-circle-o fa-5x" aria-hidden="true"></i>
  <h2  style = "margin-left:-10px">Pending <i class="fa fa-spinner fa-pulse fa-1x fa-fw"></i>
<span class="sr-only">Loading...</span></h2>
   
  </div>
  <div class='lower-side'>
    <p>
      Your order  request has been sent to the agriculturalist.<br>
      <b>We will get back to you soon </b>
    </p>
    <!-- <a href="signup.view.php" class="contBtn">Continue</a> -->
  </div>
</div>
</div>

<?php }?>

<?php   

if($res['status'] == 1 && $row['payment_method'] === "card"){
unset($_SESSION['cart']);

?>

<div class  =  "msg_body">
 <div class ='card'>
 <div class ='upper-side'>

<h2>Successfully Orded </h2>

</div>
<div class='lower-side'>
<p>
  Your order has been accept by the agriculturalist<br>
  <b>Please click on continue to proceed with the payment </b> </p>
 <a href="../shopping_cart/payment.php" class="contBtn">Continue</a>
 </div>
 </div>
 </div>


<?php
}

if($res['status'] == 1 &&  $row['payment_method'] === "cash"){
  unset($_SESSION['cart']);

?>


<div class  =  "msg_body">
 <div class ='card'>
 <div class ='upper-side'>

<h2>Successfully Ordered </h2>

</div>
<div class='lower-side'>
<p>
  Your order has been accept by the agriculturalist<br>
  <b>Please do the necessary payment to complete the order </b> </p>
 <a href="../customerhome.php" class="contBtn">Continue</a>
 </div>
 </div>
 </div>


<?php
}
?>

</body>
</html>