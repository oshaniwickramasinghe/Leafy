<?php

if(logged_in()){
    $uid  = $_SESSION['USER_DATA']['user_id'];
    $sql  = "SELECT district FROM customer WHERE  user_id = $uid";
$result = mysqli_query($conn,$sql);
$re = mysqli_fetch_array($result);
// $district = $re ['district'];

    }else{
      $uid =0;
    }
$result_per_page  = 6
;


//AND district = '$district'
$query  = "SELECT * FROM post WHERE category = 'seed'  ORDER BY post_id ASC";

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

//AND district = '$district'
$query = "SELECT * FROM post  WHERE category = 'seed'  LIMIT  ".$page_first_result. ','.$result_per_page; 

 