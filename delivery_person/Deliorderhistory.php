<?php

include "../Customer/Auth.php";
include 'orderConfirmdb.php';
include 'includes/header.php';



if(isset($_POST['complete'])){
    $id = $_POST['complete'];
    $sql  = "UPDATE checkout SET delivery_status = 2 WHERE delivery_status = 1 AND orderId = $id";
    $r = mysqli_query($conn, $sql);
    $id = 0;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Customer/CSS/style.css">
    <link rel="stylesheet" href="../Customer/CSS/delivery.css">
    <title>Order Complete</title>
</head>
<body>

<?php include "../public/includes/deli_menu.view.php"?>

<div class="complete_boby">
 <div class="complete">
 


 <form method  = "post" action = "">

<table>
    <tr>
   <th width="10%">Order ID</th>
   <th width="10%">Customer name</th>
   <th width="10%">Date</th>
   <th width="12%">Payment Method</th>
   <th width="12%">Address</th>
   <th width="10%">Total</th>
   <th width="10%">Customer Contact</th>
   <!-- <th width="5%">action</th> -->

    </tr>

    <?php  

    
    if(mysqli_num_rows($result_1 )>0){
        while($row  = mysqli_fetch_assoc($result_1  )){
           
            ?>
      
    <tr>
        
      <td>#00<?=$row['orderId']?> </td>
      <td>Govindani</td>
      <td><?=$row['date']?></td>
      <td><?=$row['payment_method']?></td>
      <td><?=$row['address1']?> , <?=$row['address2']?> , <?=$row['district']?></td>
      <td>Rs.<?=$row['total_cost']?></td>
      <td>0<?=$row['contact_no']?></td>
      <!-- <td>
        <div class="completed">
      <button name = "completed"><b>Completed</b></button>
      </div>
     </td> -->
    </tr>
 <?php  }
}
?>
</table>
</form>

 </div>
 
 
</div>
</body>
</html>