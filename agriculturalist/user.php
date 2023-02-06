<?php
include "../public/Auth.php";
include "database.php";




$category = $_REQUEST['category'];
$fname = $_REQUEST['fname'];
$flocation = $_REQUEST['location'];
$quantity = $_REQUEST['quantity'];
$miniquantiy = $_REQUEST['miniquantity'];
$exdate = $_REQUEST['exdate'];
$price = $_REQUEST['price'];

$user_id =$_SESSION['USER_DATA']['user_id'];
// var_dump($user_id);
// die;

$file_tmp1 = $_FILES['images']['tmp_name']; 
$file_name1 = "A"."$user_id".rand(1,1000).$_FILES['images']['name'];
$target_file1 = "images/".$file_name1;
if($file_tmp1!="")
{ move_uploaded_file($file_tmp1,$target_file1); }
else { $file_name1=""; }




$name = $_SESSION['USER_DATA']['fname'];



  

$sql = "INSERT  INTO post (item_name,agriculturalist_name,location, quantity, minimum_quantity,unit_price ,expire_date,category,image,user_id )
VALUES ('$fname','$name', '$flocation', '$quantity','$miniquantiy','$price', '$exdate', '$category','$file_name1',$user_id )";

if ($conn->query($sql) === TRUE) {

  // move_uploaded_file($image_tmp_name, $image_folder);

  header("Location: postview.php");
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
