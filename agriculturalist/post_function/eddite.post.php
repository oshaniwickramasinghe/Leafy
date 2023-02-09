<?php


include "../../public/Auth.php";
include "../database.php";






$category = $_REQUEST['category'];
$fname = $_REQUEST['fname'];
$flocation = $_REQUEST['location'];
$quantity = $_REQUEST['quantity'];
$miniquantity = $_REQUEST['miniquantity'];
$exdate = $_REQUEST['exdate'];
$price = $_REQUEST['price'];
$postid=$_REQUEST['postid'];

$user_id =$_SESSION['USER_DATA']['user_id'];
// $name= $_SESSION['USER_DATA'];

// var_dump($name);

// die;


$file_tmp1 = $_FILES['images']['tmp_name']; 
$file_name1 = "A"."$user_id".rand(1,1000).$_FILES['images']['name'];
$target_file1 = "../images/".$file_name1;
if($file_tmp1!="")
{ move_uploaded_file($file_tmp1,$target_file1); }
else { $file_name1=""; }








$sql = "UPDATE post   set  item_name='$fname', location='$flocation', quantity='$quantity', minimum_quantity='$miniquantity',unit_price='$price',
 expire_date='$exdate',category='$category',image ='$file_name1' where post_id=$postid  ";


if ($conn->query($sql) === TRUE) {
    // echo "<script> window.location.href = '../account.php' </script>";
    header("Location: ../postview.php");
  } else {
    echo "Error updating record: " . $conn->error;
  }
?>  
