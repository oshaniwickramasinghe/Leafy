<?php

include "connect.php";

$uid = $_SESSION["user"];

$category = $_REQUEST['category'];
$fname = $_REQUEST['fname'];
$flocation = $_REQUEST['flocation'];
$quantity = $_REQUEST['quantity'];
$miniquantiy = $_REQUEST['miniquantity'];
$exdate = $_REQUEST['exdate'];
$price = $_REQUEST['price'];



$file_tmp1 = $_FILES['img']['tmp_name'];
$file_name1 = "A"."$uid".rand(1,1000).$_FILES['img']['name'];
$target_file1 = "images/".$file_name1;
if($file_tmp1!="")
{ move_uploaded_file($file_tmp1,$target_file1); }
else { $file_name1=""; }



$sql = "INSERT INTO postcreate (uid, category, fname, flocation, quantity, miniquantity, exdate, price,img )
VALUES ('$uid','$category','$fname', '$flocation', '$quantity','$miniquantiy', '$exdate', '$price', '$file_name1' )";

if ($conn->query($sql) === TRUE) {

  // move_uploaded_file($image_tmp_name, $image_folder);

  header("Location: postview.php");
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
