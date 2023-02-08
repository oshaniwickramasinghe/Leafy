<?php
include "../Auth.php";
include "../database.php";
include '../includes/header.php';

$uid  = $_SESSION['USER_DATA']['user_id'];

$sql = "SELECT * FROM shopping_cart WHERE user_id  = $uid ";
$result   =  mysqli_query($conn , $sql);
while($row  = mysqli_fetch_array($result )){
   $id = $row['order_id'];
 

   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>History</title>
</head>
<body>
<div class="history_body">
<table>
  <h3><i class="fa fa-cart-plus" aria-hidden="true"></i> Order History </h3>
    <tr>
   <th width="20%">Order Id</th>
   <th width="25%">Date</th>
   <th width="20%">Payment Method</th>
   <th width="20%">Item name</th>
   <th width="20%">Total</th>
  
    </tr>
<tr>
    <?php
 
       $sql = "SELECT * FROM `order` WHERE order_id = $id ";
   
       $result   =  mysqli_query($conn , $sql);
       
     while(  $res = mysqli_fetch_array($result )){
        ?>
    <td><?=$res['order_id']?></td>
    <td><?=$res['Date']?></td>
    <td><?=$res['payment_method']?></td>
    <td>Cabbage</td>
    <td><?=$row['total_cost']?></td>
    
     </tr>
     </table>

<?php
 }
}
?>
</div>
</body>
</html>

<footer>
<!-- <div class="footer-copyright">
            <p>copyright @2022 Leafy All Rights Reserved</p>
        </div> -->
<img src = "../images/Footer.svg"  height= "121.3px" style = "margin-top:auto">
</footer>
</html>