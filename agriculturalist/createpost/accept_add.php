<?php
 
 include "../public/Auth.php";
include "database.php";

$accept = $_REQUEST['orderId'];

$sql = "UPDATE checkout SET status = 1 WHERE orderId = '$accept'";

if ($conn->query($sql) === TRUE) {
    header("Location: agriculturalnotification.php");
} else {
  echo "Error deleting record: " . $conn->error;
}


?>