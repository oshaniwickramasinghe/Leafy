<?php
include "../../public/Auth.php";
include "../database.php";

$postid=$_REQUEST['postid']; 

// sql to delete a record
$sql = "DELETE FROM post WHERE post_id=$postid";

if ($conn->query($sql) === TRUE) {
//   echo "<script> alert('Add Removed Successfully'); window.location.href='../account.php'; </script>";
header("Location: ../postview.php");
} else {
  echo "Error deleting record: " . $conn->error;
}

?>