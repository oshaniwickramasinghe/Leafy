<?php


include '../Auth.php';
include '../include/header.php';
// include '../database.php';


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="agrinotifi.css">
  <link rel="stylesheet" href="delivery.css">
  <link rel="stylesheet" href="../includes/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>Agriculturalist Notification page</title>
</head>

<body>


  <?php

  $user_id = $_SESSION["USER_DATA"]["user_id"];





  // $sql = "SELECT * FROM checkout JOIN deals ON checkout.orderId = deals.order_id JOIN customer ON deals.customer_id = customer.user_id 
  //   WHERE customer.user_id = deals.customer_id  AND checkout.status = 0 AND deals.delivery=0  AND deals.agriculturalist_id = '$user_id' ";



// $sql="SELECT *, GROUP_CONCAT(deals.item_name SEPARATOR ', ') AS products 
// FROM deals 
// JOIN customer ON deals.customer_id = customer.user_id
// JOIN checkout ON deals.order_id = checkout.orderId
// WHERE deals.agriculturalist_id = '$user_id' AND checkout.status = 0 AND deals.delivery=0
// GROUP BY order_id";

$sql="SELECT *, GROUP_CONCAT(deals.item_name SEPARATOR ', ') AS products, GROUP_CONCAT(deals.quantity SEPARATOR 'Kg,') AS quantities
FROM deals 
JOIN customer ON deals.customer_id = customer.user_id
JOIN checkout ON deals.order_id = checkout.orderId
WHERE deals.agriculturalist_id = '$user_id' AND checkout.status = 0 AND deals.delivery=0
GROUP BY order_id";

  $result = mysqli_query($conn, $sql);



  while ($res = mysqli_fetch_assoc($result)) {

    $accept = $res['order_id'];

    
  ?>

    <div class="notification-row">
      <div class="notification-text">

        <p>Order Number -<?php echo $accept ?></p>
        <p>Customer -<?php echo $res['fname'] ?></p>
        <p>Address - <?php echo $res['province'] ?>, <?php echo $res['district'] ?>, <?php echo $res['address1'] ?>, <?php echo $res['address2'] ?>. </p>
        <p>Item Name -<?php echo $res['products'] ?></p>
        <p>Quantity - <?php echo $res['quantities'] ?>Kg</p>

        
      
        <p>Total - Rs- <?php echo $res['total_cost'] ?></p>

      </div>

      <div class="notification-buttons">

        <button onclick="window.location.href='accept_add.php?orderId=<?php echo $accept; ?>'" type="submit" name="statu" value="1" class="notification-button accept">Accept</button>
        <button onclick="window.location.href='reject_add.php?orderId=<?php echo $accept; ?>'" type="submit" value="0" name="status" class="notification-button reject">Reject</button>
      </div>
    </div>


    <div id="state">

    </div>



  <?php


  }

  ?>
<div style="background: #5A713D; "> <h2>Delivery Required</h2></div>
 

  <?php

  $user_id = $_SESSION["USER_DATA"]["user_id"];




//   $sql = "SELECT * FROM checkout JOIN deals ON checkout.orderId = deals.order_id JOIN customer ON deals.customer_id = customer.user_id 
// WHERE customer.user_id = deals.customer_id  AND checkout.status = 0 AND deals.delivery=1   AND deals.agriculturalist_id = '$user_id' ";

$sql="SELECT *, GROUP_CONCAT(deals.item_name SEPARATOR ', ') AS products, GROUP_CONCAT(deals.quantity SEPARATOR 'Kg,') AS quantities
FROM deals 
JOIN customer ON deals.customer_id = customer.user_id
JOIN checkout ON deals.order_id = checkout.orderId
WHERE deals.agriculturalist_id = '$user_id' AND checkout.status = 0 AND deals.delivery=1
GROUP BY order_id";

  $result = mysqli_query($conn, $sql);



  while ($res = mysqli_fetch_assoc($result)) {

    $accept = $res['orderId'];



  ?>

    <div class="notification-row">
      <div class="notification-text">

        <p>Order Number -<?php echo $accept ?></p>
        <p>Customer -<?php echo $res['fname'] ?></p>
        <p>Address - <?php echo $res['province'] ?>, <?php echo $res['district'] ?>, <?php echo $res['address1'] ?>, <?php echo $res['address2'] ?>. </p>
        <p>Item Name -<?php echo $res['products'] ?></p>
        <p>Quantity - <?php echo $res['quantities'] ?>Kg</p>
        <p>Total - Rs- <?php echo $res['total_cost'] ?></p>

      </div>

      <div class="notification-buttons">




        <button onclick="window.location.href='find_delivery.php?orderId=<?php echo $accept; ?>'" type="submit" id="find" name="status" value="1" class="notification-button accept">Find Delivery</button>
        <!-- <button onclick="window.location.href='reject_add.php?orderId=<?php //echo $accept; ?>'" type="submit" value="0" name="status" class="notification-button reject">Reject</button> -->


      </div>
    </div>


    <div id="state">

    </div>



  <?php


  }

  ?>

  <!-- <script>
    function changeText() {
      document.getElementById("find").innerHTML = "Pending";
      document.getElementById("find").disabled = true;

      window.location.href='find_delivery.php?orderId=<?php echo $accept; ?>';



    }
  </script> -->



  <footer>

    <img src="../photos/Footer.svg" height="121.3px" style=" margin-top:15%">
  </footer>

</body>


</html>