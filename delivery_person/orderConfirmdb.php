<?php
include "../database/database.php";


// $uid  = $_SESSION['USER_DATA']['user_id'];

$uid = $_SESSION['USER_DATA']['user_id'];
// $sqldate = "SELECT CURRENT_DATE() as today";
// $resultdate = mysqli_query($conn, $sqldate);
// $rowdate = mysqli_fetch_assoc($resultdate);
// $date = $rowdate['today'];

$sql  =  "SELECT DISTINCT( checkout.orderId),checkout.delivery_status, checkout.date,checkout.address1,checkout.address2,checkout.district,deals.payment_method,
deals.total_cost,customer.contact_no FROM checkout  JOIN deals ON checkout.orderId = deals.order_id AND checkout.accepted_by =$uid 
  JOIN customer ON deals.customer_id  = customer.user_id WHERE
checkout.delivery_status = 1" ;
$result  = mysqli_query($conn, $sql);

$query  =  "SELECT DISTINCT( checkout.orderId),checkout.delivery_status, checkout.date,checkout.address1,checkout.address2,checkout.district,deals.payment_method,
deals.total_cost,customer.contact_no FROM checkout  JOIN deals ON checkout.orderId = deals.order_id AND checkout.accepted_by =$uid 
  JOIN customer ON deals.customer_id  = customer.user_id WHERE
checkout.delivery_status = 2" ;

$result_1  = mysqli_query($conn,$query);



///////quey to view history
// $query2  =  "SELECT DISTINCT( checkout.orderId),checkout.delivery_status, checkout.date,checkout.address1,checkout.address2,checkout.district,deals.payment_method,
// deals.total_cost,customer.contact_no FROM checkout  JOIN deals ON checkout.orderId = deals.order_id AND checkout.accepted_by =$uid 
//   JOIN customer ON deals.customer_id  = customer.user_id WHERE
// checkout.delivery_status = 2" ;

// $result_2  = mysqli_query($conn,$query2 );


// if(mysqli_num_rows($result)>0){
//     while($row  = mysqli_fetch_array($result )){

// var_dump($row['orderId']);


//     }
// }

// 

