<?php

error_reporting(0);

include '../../database/database.php';

//not delivered orders
$sqlorder="SELECT * FROM `order` WHERE delivery=0";
// make query & get resultcustomer
$resultorder= mysqli_query($conn,$sqlorder);


//delivered orders
$sqlnonorder="SELECT * FROM `order` WHERE delivery=1";
// make query & get resultcustomer
$resultnonorder= mysqli_query($conn,$sqlnonorder);


//select all
//$sqlall="SELECT * FROM user";

// make query & get resultcustomer
// $resultall= mysqli_query($conn,$sqlall);

//     if(isset($_GET['view']))
//     {
//         $del_user_id = $_GET['view'];
//         $sql4 = "SELECT * FROM user WHERE user_id=$del_user_id and role='delivery_person'";
//         $result4=mysqli_query($conn,$sql4);
        
//         if($result4)
//         { 
                       
//             while($recorddelivery = mysqli_fetch_assoc($result4))
//             {
//                 $del_user_id=$recorddelivery['user_id'];
//                 $del_first_name=$recorddelivery['fname'];
//                 $del_email=$recorddelivery['email'];
//                 $del_role=$recorddelivery['role'];
   
//             }
            
//         }
//     }


//select blog
//$sqlblog="SELECT * FROM blog ORDER BY date";

// make query & get blogs
//$resultblog= mysqli_query($conn,$sqlblog);


////select users by role
if(ISSET($_POST['search'])){
	$keyword = $_POST['start1'];
			
    //require '../connect.php';
    $queryusers = mysqli_query($conn, "SELECT * FROM `user` WHERE `role` LIKE '%$keyword%' ") ;

}


////select blog by range
if(ISSET($_POST['search'])){
	$keyword = $_POST['start2'];
			
    //require '../connect.php';
    $query = mysqli_query($conn, "SELECT * FROM `blog` WHERE `date` LIKE '%$keyword%' ORDER BY `date`") ;

}


////select course by range
if(ISSET($_POST['search'])){
	$keyword = $_POST['start3'];
			
    //require '../connect.php';
    $querycourse = mysqli_query($conn, "SELECT * FROM `course` WHERE `user_id` LIKE '%$keyword%' ") ;

}





//select course
//$sqlcourse="SELECT * FROM course ";

// make query & get blogs
//$resultcourse= mysqli_query($conn,$sqlcourse);


?> 

