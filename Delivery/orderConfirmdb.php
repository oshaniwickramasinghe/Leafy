<?php
include "../Customer/database.php";


// $uid  = $_SESSION['USER_DATA']['user_id'];

$uid = 3;
$date = '2023-04-09';


$sql  =  "SELECT DISTINCT( checkout.orderId),checkout.delivery_status, checkout.date,checkout.address1, customer.user_id,checkout.address2,checkout.district,deals.payment_method,
deals.total_cost,customer.contact_no FROM checkout  JOIN deals ON checkout.orderId = deals.order_id AND checkout.accepted_by =$uid 
  JOIN customer ON deals.customer_id  = customer.user_id WHERE
checkout.delivery_status = 1" ;
$result  = mysqli_query($conn, $sql);

$query  =  "SELECT DISTINCT( checkout.orderId),checkout.delivery_status, checkout.date,checkout.address1,checkout.address2,checkout.district,deals.payment_method,customer.user_id,
deals.total_cost,customer.contact_no FROM checkout  JOIN deals ON checkout.orderId = deals.order_id AND checkout.accepted_by =$uid 
  JOIN customer ON deals.customer_id  = customer.user_id WHERE
checkout.delivery_status = 2" ;

$result_1  = mysqli_query($conn,$query );
// if(mysqli_num_rows($result)>0){
//     while($row  = mysqli_fetch_array($result )){

// var_dump($row['orderId']);


//   

 
