<?php
include "../public/Auth.php";



$category = $_REQUEST['category'];
$fname = $_REQUEST['fname'];
$flocation = $_REQUEST['location'];
$quantity = $_REQUEST['quantity'];
$miniquantiy = $_REQUEST['miniquantity'];
$exdate = $_REQUEST['exdate'];
$price = $_REQUEST['price'];



// $file_tmp1 = $_FILES['image']['tmp_name']; 
// $file_name1 = "A"."$uid".rand(1,1000).$_FILES['image']['name'];
// $target_file1 = "images/".$file_name1;
// if($file_tmp1!="")
// { move_uploaded_file($file_tmp1,$target_file1); }
// else { $file_name1=""; }



$sql = "INSERT INTO post (item_name,location, quantity, miniquantity,unit_price expire_date,category,image,user_id )
VALUES ('$fname', '$flocation', '$quantity','$miniquantiy','$price' '$exdate', '$price',,'$category', '$file_name1',$uid )";

if ($conn->query($sql) === TRUE) {

  // move_uploaded_file($image_tmp_name, $image_folder);

  header("Location: postview.php");
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
