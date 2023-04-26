<?php
require "../Auth.php";
include "../database.php";

$date = date("Y-m-d");

//store rate and and review in the database
$userId = $_SESSION['USER_DATA']['user_id'];
$rating = $_POST['rating'];
$review = $_POST['comment'];

$query = "SELECT order_id ,agriculturalist_id FROM deals WHERE customer_id  = $userId && Date = '$date' ORDER BY  order_id DESC ";

$result = mysqli_query($conn, $query);
$r  = mysqli_fetch_array($result);
$order_id = $r['order_id'];
$id  = $r['agriculturalist_id'];

// Insert the review into the database
// $sql = "INSERT INTO  order_rate (rate, comment, user_id ,order_id, agri_id) VALUES ( $rating ,'$review', $userId,$order_id,$id )";
// if ($conn->query($sql) === TRUE) {
//   ?>

<!-- edit of rate and review -->
<html>
<link rel="stylesheet" href="../CSS/style.css">

<div class  = "post">
	<div class  = "text"><b>Thank you for rating Us </b></div><br>
		<a href = "../customerhome.php"><input type  = "submit" value  = "Go Back" style = "margin-left:-5% ; margin-top:2%"></a>
</div>

</html>
  <?php
?>


