<?php





$uid = 27;
$date = '2023-04-09';

$sql  =  "SELECT  checkout.orderId, checkout.date,checkout.address1,checkout.address2,checkout.address3,deals.payment_method,
deals.total_cost,customer.contact_no FROM checkout JOIN deals ON checkout.orderId = deals.order_id AND checkout.date = deals.Date
AND deals.customer_id = $uid  AND deals.Date = '$date'
JOIN customer ON deals.customer_id  = customer.user_id";

$result  = mysqli_query($conn, $sql);
$row  = mysqli_fetch_array($result );
// var_dump($row);



