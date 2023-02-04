<?php
require "../Auth.php";
include "../database.php";

$host = "localhost";
$uname = "root";
$password = "";
$db_name = "leafy";

var_dump($_SESSION['cart']['post_id']);

$conn = mysqli_connect($host,$uname,$password,$db_name);


$userId = $_SESSION['USER_DATA']['user_id'];


$jd = json_decode(file_get_contents('php://input'),true);

$var = $jd['rate']+1;
echo json_encode($var);

$sql  =  "INSERT INTO rate(rate, user_id ,order_id) VALUES ($var,$userId,1)";
$result = mysqli_query($conn,$sql);



try {
    if(0) {
        throw "error";
    }
    echo json_encode("success");
}
catch(Exception $e) {
    echo json_encode("error");
}


// $json = json_decode($jd, true);
// echo $json;

