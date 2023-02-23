<?php

//error_reporting(0);

include 'connect.php';

//not delivered orders
$sqlorder="SELECT * FROM `order` WHERE delivery=0";
// make query & get resultcustomer
$resultorder= mysqli_query($conn,$sqlorder);


//delivered orders
$sqlnonorder="SELECT * FROM `order` WHERE delivery=1";
// make query & get resultcustomer
$resultnonorder= mysqli_query($conn,$sqlnonorder);


//select all
$sqlall="SELECT * FROM user";

// make query & get resultcustomer
$resultall= mysqli_query($conn,$sqlall);

    if(isset($_GET['view']))
    {
        $del_user_id = $_GET['view'];
        $sql4 = "SELECT * FROM user WHERE user_id=$del_user_id and role='delivery_person'";
        $result4=mysqli_query($conn,$sql4);
        
        if($result4)
        { 
                       
            while($recorddelivery = mysqli_fetch_assoc($result4))
            {
                $del_user_id=$recorddelivery['user_id'];
                $del_first_name=$recorddelivery['fname'];
                $del_email=$recorddelivery['email'];
                $del_role=$recorddelivery['role'];
   
            }
            
        }
    }


//select blog
$sqlblog="SELECT * FROM blog ORDER BY date";

// make query & get blogs
$resultblog= mysqli_query($conn,$sqlblog);

    if(isset($_GET['view']))
    {
        $del_user_id = $_GET['view'];
        $sql4 = "SELECT * FROM user WHERE user_id=$del_user_id and role='delivery_person'";
        $result4=mysqli_query($conn,$sql4);
        
        if($result4)
        { 
                       
            while($recorddelivery = mysqli_fetch_assoc($result4))
            {
                $del_user_id=$recorddelivery['user_id'];
                $del_first_name=$recorddelivery['fname'];
                $del_email=$recorddelivery['email'];
                $del_role=$recorddelivery['role'];
   
            }
            
        }
    }



//select course
$sqlcourse="SELECT * FROM course ";

// make query & get blogs
$resultcourse= mysqli_query($conn,$sqlcourse);

    if(isset($_GET['view']))
    {
        $del_user_id = $_GET['view'];
        $sql4 = "SELECT * FROM user WHERE user_id=$del_user_id and role='delivery_person'";
        $result4=mysqli_query($conn,$sql4);
        
        if($result4)
        { 
                       
            while($recorddelivery = mysqli_fetch_assoc($result4))
            {
                $del_user_id=$recorddelivery['user_id'];
                $del_first_name=$recorddelivery['fname'];
                $del_email=$recorddelivery['email'];
                $del_role=$recorddelivery['role'];
   
            }
            
        }
    }

?> 


