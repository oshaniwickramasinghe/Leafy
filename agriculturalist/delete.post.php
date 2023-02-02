<?php
include 'connect.php';

$aid = $_REQUEST["aid"];  

// sql to delete a record
$sql = "DELETE FROM post WHERE aid='$aid'";

if ($conn->query($sql) === TRUE) {
//   echo "<script> alert('Add Removed Successfully'); window.location.href='../account.php'; </script>";
} else {
  echo "Error deleting record: " . $conn->error;
}

?>