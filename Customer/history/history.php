<?php
include "../Auth.php";
include "../database.php";
include '../includes/header.php';

$uid  = $_SESSION['USER_DATA']['user_id'];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="../CSS/delivery.css">
    <title>History</title>
</head>
<body>
<div class="history_body">
 <form class  =  "history">
    <h2><i class="fa fa-cart-plus" aria-hidden="true"></i> Order History </h2> 
<table>
  
    <tr>
  
   <th width="10%">Item name</th>
   <th width="10%">Date</th>
   <th width="12%">Payment Method</th>
   <th width="12%">Delivery Method</th>
   <th width="10%">Quantity</th>
   <th width="10%">Total</th>
   <th width="10%">Agriculturalist</th>

    </tr>

    <?php

    $sql   = "SELECT * FROM deals WHERE customer_id  =$uid";
    $result = mysqli_query($conn , $sql);

    while($res = mysqli_fetch_array($result )){
        if($res['delivery'] ==1){
            $del  = "Delivery";
        }else{
            $del  = "Pick Up";
        }

        $agriculturalist = $res['agriculturalist_id'];
        $query  = "SELECT fname ,lname FROM user WHERE user_id=$agriculturalist";
        $r = mysqli_query($conn ,   $query);
        while($row = mysqli_fetch_array($r)){


        ?>
        <tr>

    <td><?=$res['item_name']?></td>
    <td><?=$res['Date']?></td>
    <td><?=$res['payment_method']?></td>
    <td><?=$del ?></td>
    <td><?=$res['quantity']?> kg</td>
    <td>Rs <?=$res['total_cost']?>.00</td>
    <td><?=$row['fname'];?> &nbsp <?= $row['lname']?> </td>
     </tr>
   <?php

  }
    }
?>

</table>
    </form>


<div class  = "backk">
<a href  = "../customerhome.php" ><input type  = "submit" name  =  "back" value  =  "Back" ></a>
</div>
</div>


</body>
</html>
<footer>
<img src = "../images/Footer.svg"  height= "121.3px"  style = "margin-top:auto">
</footer>



