<?php

include "connect.php";
$category=$_REQUEST['category'];
$fname=$_REQUEST['fname'];
$flocation=$_REQUEST['flocation'];
$quantity=$_REQUEST['quantity'];
$miniquantiy=$_REQUEST['miniquantity'];
$exdate=$_REQUEST['exdate'];
$price=$_REQUEST['price'];
$img=$_REQUEST['img'];

$sql = "INSERT INTO postcreate (category, fname, flocation, quantity, miniquantity, exdate, price, img )
VALUES ('$category','$fname', '$flocation', '$quantity','$miniquantiy', '$exdate', '$price', '$img' )";

if ($conn->query($sql) === TRUE) {
 
  header("Location: postview.php");
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}


?>