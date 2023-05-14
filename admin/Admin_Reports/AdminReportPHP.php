<?php

// error_reporting(0);

include '../../database/database.php';

//not delivered orders
$sqlorder="SELECT * FROM `checkout` WHERE delivery_status=0";
// make query & get resultcustomer
$resultorder= mysqli_query($conn,$sqlorder);


//delivered orders
$sqlnonorder="SELECT * FROM `checkout` WHERE delivery_status=1";
// make query & get resultcustomer
$resultnonorder= mysqli_query($conn,$sqlnonorder);


////select users by role
if(ISSET($_POST['search'])){
    
	$keyword = $_POST['start1'];

    $queryusers = mysqli_query($conn, "SELECT * FROM `user` WHERE `role` LIKE '%$keyword%' OR `fname` LIKE '%$keyword%'") ;
			

}
else{
    $queryusers = mysqli_query($conn, "SELECT * FROM `user`") ;
}


////select blog by range
if(ISSET($_POST['search'])){
	$keyword = $_POST['start2'];
			
    //require '../connect.php';
    $query = mysqli_query($conn, "SELECT * FROM `blog` WHERE `date` LIKE '%$keyword%' ORDER BY `date`") ;

}
else{
    $query = mysqli_query($conn, "SELECT * FROM `blog`") ;

}


////select course by range
if(ISSET($_POST['search'])){
	$keyword = $_POST['start3'];
			
    //require '../connect.php';
    $querycourse = mysqli_query($conn, "SELECT * FROM `course` WHERE `user_id` LIKE '%$keyword%' OR `title` LIKE '%$keyword%'") ;

}
else{
    $querycourse = mysqli_query($conn, "SELECT * FROM `course` ") ;

}

?> 

