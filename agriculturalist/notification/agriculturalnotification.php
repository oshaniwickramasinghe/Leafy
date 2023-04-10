<?php


require "../public/Auth.php";
include "../public/includes/header.view.php";

// include "database.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="agrinotifi.css">
  <link rel="stylesheet" href="../public/CSS/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>Agriculturalist Notification page</title>
</head>

<body>

  <?php

  $user_id = $_SESSION["USER_DATA"]["user_id"];



  $sql = "SELECT  orderId,date from checkout where agriculturalist_id ='$user_id' AND status = 0";


  $result = mysqli_query($conn, $sql);


  if (mysqli_num_rows($result) > 0) {

    while ($res = mysqli_fetch_assoc($result)) {

      $accept = $res['orderId'];
 
      $sql1 = "SELECT customer.user_id,customer.fname,customer.address1,customer.address2,customer.district,customer.province, deals.item_name,deals.quantity, deals.total_cost, deals.order_id FROM customer inner JOIN deals 
        on customer.user_id=deals.customer_id WHERE  deals.agriculturalist_id = '$user_id' ";

      $result1 = mysqli_query($conn, $sql1);



      if (mysqli_num_rows($result1) > 0) {

        while ($res = mysqli_fetch_array($result1)) {

  ?>

          <div class="notification-row">
            <div class="notification-text">

              <p>Customer -<?php echo $res['fname'] ?></p>
              <p>Address - <?php echo $res['province'] ?>, <?php echo $res['district'] ?>, <?php echo $res['address1'] ?>, <?php echo $res['address2'] ?>. </p>
              <p>Item Name -<?php echo $res['item_name'] ?></p>
              <p>Quantity - <?php echo $res['quantity'] ?> Kg</p>
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
      }
    }
  }
  ?>



  <footer>

    <img src="photos/Footer.svg" height="121.3px" style=" margin-top:15%">
  </footer>

</body>


</html>