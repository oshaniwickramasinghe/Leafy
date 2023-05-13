<?php
 
 include "../../public/Auth.php";
include "../database.php";

$accept = $_REQUEST['orderId'];

$sql = "UPDATE checkout SET status = 2 WHERE orderId = '$accept'";

if ($conn->query($sql) === TRUE) {
    header("Location: delivery_ok.php");
} else {
  echo "Error deleting record: " . $conn->error;
}


?>