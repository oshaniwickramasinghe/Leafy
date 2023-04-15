<?php

include "../Customer/Auth.php";
include "../Customer/database.php";
include 'orderConfirmdb.php';
include '../Customer/includes/header.php';




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/delivery.css">
    <title>Order Complete</title>
</head>
<body>


 <div class="complete">
 <form method  = "post">

<table>
    <tr>
   <th width="10%">Order ID</th>
   <th width="10%">Customer name</th>
   <th width="10%">Date</th>
   <th width="12%">Payment Method</th>
   <th width="12%">Address</th>
   <th width="10%">Total</th>
   <th width="10%">Customer Contact</th>
   <th width="10%">action</th>

    </tr>
    <tr>
      <td>#00<?=$row['orderId']?></td>
      <td>Govindani</td>
      <td><?=$row['date']?></td>
      <td><?=$row['payment_method']?></td>
      <td><?=$row['address1']?> , <?=$row['address2']?> , <?=$row['address3']?></td>
      <td>Rs.<?=$row['total_cost']?></td>
      <td>0<?=$row['contact_no']?></td>
      <td><input type  = "submit" name  = 'complete' value = 'Complete'></td>

</table>
 </div>

</body>
</html>