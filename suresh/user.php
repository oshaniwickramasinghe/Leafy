<?php

include "connect.php";

$uid = $_SESSION["user"];

$category=$_REQUEST['category'];
$fname=$_REQUEST['fname'];
$flocation=$_REQUEST['flocation'];
$quantity=$_REQUEST['quantity'];
$miniquantiy=$_REQUEST['miniquantity'];
$exdate=$_REQUEST['exdate'];
$price=$_REQUEST['price'];
// $img=$_REQUEST['pic1'];

$file_tmp1 = $_FILES['pic1']['tmp_name'];
$file_name1 = "A"."$uid".rand(1,1000).$_FILES['pic1']['name'];
$target_file1 = "images/".$file_name1;
if($file_tmp1!="")
{ move_uploaded_file($file_tmp1,$target_file1); }
else { $file_name1=""; }

$sql = "INSERT INTO postcreate (uid, category, fname, flocation, quantity, miniquantity, exdate, price, pic1 )
VALUES ('$uid','$category','$fname', '$flocation', '$quantity','$miniquantiy', '$exdate', '$price', '$file_name1' )";

if ($conn->query($sql) === TRUE) {
 
  header("Location: postview.php");
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
