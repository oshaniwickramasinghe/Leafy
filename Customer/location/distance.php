<?php

include "../Auth.php";


//function to calculate the delivery fee of the customer using distance

function delivery(){

$host = "localhost";
$uname = "root";
$password = "";
$db_name = "leafy";


$conn = mysqli_connect($host,$uname,$password,$db_name);
foreach($_SESSION["cart"] as $keys => $values)
{


$id =$_SESSION['cart'][$keys]['post_id']; 




$sql = "SELECT * FROM `post` WHERE post_id = $id";
$result = mysqli_query($conn,$sql);
$rows = mysqli_fetch_assoc($result);
$agriculturalist =  $rows['user_id'];

}


$query = "SELECT lat ,lng FROM agriculturalist WHERE user_id  =$agriculturalist ";
$result_2 =  mysqli_query($conn , $query );
$getResult_1  = mysqli_fetch_array($result_2);

    $id = $_SESSION['USER_DATA']['user_id'];
    $sql  = "SELECT * FROM customer WHERE  user_id = $id";
    $result  =  mysqli_query($conn , $sql);
    $getResult  = mysqli_fetch_array(  $result);

    $lat  = $getResult['lat'];
    $lng = $getResult['lon'];

    $destination_lat = $getResult_1['lat'];;
    $destination_lng = $getResult_1['lng'];

// Use the Distance Matrix API to get the distance and duration
$origins = $lat . "," . $lng;
$destinations = $destination_lat . "," . $destination_lng;
$api_key = "AIzaSyADhAqLTBZnH5b4b8FFWd7o_1lq6sDrGZY";
$url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=" . urlencode($origins) . "&destinations=" . urlencode($destinations) . "&key=" . $api_key;
$response = file_get_contents($url);
$result = json_decode($response, true);

// Step 3: Extract the distance and duration values
$distance = $result['rows'][0]['elements'][0]['distance']['text'];
$duration = $result['rows'][0]['elements'][0]['duration']['text'];

// var_dump($distance);

//initial delivery fee is 100 then for every  0.1 km it added a 2 rupee
$delivery_fee  = 100;


if($distance > 1){

    while($distance > 1){
        $delivery_fee = $delivery_fee  + 2;
        $distance = (float)$distance - 0.1;
    }
}



return $delivery_fee ;

}

?>