<?php
 
 include "../../public/Auth.php";
include "../database.php";

$accept = $_GET['orderId'];

$sql= "INSERT INTO accepted_orders (order_id, sent_deli_id, status, order_viewed) SELECT checkout.orderId, delivery_agent_area.user_id, 0, 0 
FROM checkout INNER JOIN delivery_agent_area ON checkout.district = delivery_agent_area.Area 
WHERE checkout.status = 0  AND checkout.orderId = '$accept'";

$sql2= "UPDATE checkout SET status = 3 WHERE orderId = '$accept'";

if ($conn->query($sql) === TRUE) {
    header("Location: agriculturalnotification.php");
} else {
  echo "Error deleting record: " . $conn->error;
}

if ($conn->query($sql2) === TRUE) {
  header("Location: agriculturalnotification.php");
} else {
echo "Error deleting record: " . $conn->error;
}




?>