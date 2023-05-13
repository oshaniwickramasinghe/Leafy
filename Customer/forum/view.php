<?php
include 'conn.php';
$data = array();
$sql = "SELECT *  FROM `discussion`   WHERE approved = 1 ORDER BY id DESC";
$result = $conn->query($sql);
while($row = $result->fetch()){
        array_push($data, $row);
        array_push($data);
}

echo json_encode($data);
$conn = null;
exit();


