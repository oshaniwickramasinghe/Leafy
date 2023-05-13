<?php
include 'conn.php';
$id = $_POST['id'];
$name = $_SESSION['USER_DATA']['fname'];
$msg = $_POST['msg'];
if($name != "" && $msg != "" && $id !=0){
	$sql = $conn->query("INSERT INTO discussion (parent_comment, customer, post ,approved)
			VALUES ('$id', '$name', '$msg',1)");
     echo json_encode(array("statusCode"=>200));
}else if($name != "" && $msg != " "){
	$sql = $conn->query("INSERT INTO discussion (parent_comment, customer, post)
			VALUES ('$id', '$name', '$msg')");
     echo json_encode(array("statusCode"=>200));
}
else{
	echo json_encode(array("statusCode"=>201));
}
$conn = null;

?>