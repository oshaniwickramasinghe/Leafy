<?php
$result_per_page  = 6;

$query  = "SELECT * FROM post ORDER BY post_id ASC";

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

$query = "SELECT * FROM post  LIMIT  ".$page_first_result. ','.$result_per_page; 

 