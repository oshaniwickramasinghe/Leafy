<?php

error_reporting(0);

require "../../database/database.php";

//user
$sqluser="SELECT * FROM user where is_active=0";

// make query & get resultcustomer
$resultuser= mysqli_query($conn,$sqluser);


//blog
$sqlblog = "SELECT * FROM user u JOIN blog b 
            ON u.user_id = b.user_id 
            WHERE verified=0;
            ";

// make query & get blogs
$resultblog= mysqli_query($conn,$sqlblog);

//course
$sqlcourse =    "SELECT * FROM user u JOIN course c 
                ON u.user_id = c.user_id 
                WHERE verified=0;
                ";

// make query & get resultcustomer
$resultcourse= mysqli_query($conn,$sqlcourse);


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

// ?> 