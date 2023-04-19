<?php
// $id  =  $_SESSION['USER_DATA']['user_id'];


$result_per_page  = 6;
$query  = "SELECT * FROM post WHERE category = 'Vegetable' ORDER BY post_id ASC";
$result = mysqli_query($conn,$query);
$num_of_result  = mysqli_num_rows($result);

//rounds a number UP to the nearest integer
$number_of_page  = ceil($num_of_result/$result_per_page);
$pageLink  =  "";

if(!(isset($_GET['page']))){
    $page  = 1;
}else{
    $page = $_GET['page'];

}

$page_first_result= ($page-1)* $result_per_page;



