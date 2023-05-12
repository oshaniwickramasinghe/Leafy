<?php
include "../../database/database.php";

$uid = $_SESSION['USER_DATA']['user_id'];

$sql = "SELECT DAY(CURRENT_DATE()) as day, MONTH(CURRENT_DATE()) as month,YEAR(CURRENT_DATE()) as year";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$day = $row['day'];
$month = $row['month'];
$year = $row['year'];

//select orders tha has been completed of today
$query  =  "SELECT DISTINCT( checkout.orderId),checkout.delivery_status, checkout.date,checkout.address1,checkout.address2,checkout.district,deals.payment_method,deals.total_cost,customer.contact_no 
FROM checkout  
JOIN deals ON checkout.orderId = deals.order_id AND checkout.accepted_by =$uid 
JOIN customer ON deals.customer_id  = customer.user_id 
WHERE checkout.delivery_status = 2 HAVING YEAR(checkout.date) = $year AND MONTH(checkout.date) = $month AND DAY(checkout.date) = $day ";

$result_1  = mysqli_query($conn,$query);

//selcet orders to be completed of today
$query2  =  "SELECT DISTINCT( checkout.orderId),checkout.delivery_status, checkout.date,checkout.address1,checkout.address2,checkout.district,deals.payment_method,deals.total_cost,customer.contact_no 
FROM checkout  
JOIN deals ON checkout.orderId = deals.order_id AND checkout.accepted_by =$uid 
JOIN customer ON deals.customer_id  = customer.user_id 
WHERE checkout.delivery_status = 1 HAVING YEAR(checkout.date) = $year AND MONTH(checkout.date) = $month AND DAY(checkout.date) = $day " ;

$result_2  = mysqli_query($conn,$query2);

//selcet orders to be completed of today
$query3  =  "SELECT DISTINCT( checkout.orderId),checkout.delivery_status, checkout.date,checkout.address1,checkout.address2,checkout.district,deals.payment_method,deals.total_cost,customer.contact_no 
FROM checkout  
JOIN deals ON checkout.orderId = deals.order_id AND checkout.accepted_by =$uid 
JOIN customer ON deals.customer_id  = customer.user_id 
WHERE checkout.delivery_status = 2" ;

$result_3  = mysqli_query($conn,$query3);

