<?php

// error_reporting(0);

require "../../database/database.php";

//user
$sqluser="SELECT * FROM user where is_active=0";

// make query & get resultcustomer
$resultuser= mysqli_query($conn,$sqluser);

    // if(isset($_GET['view']))
    // {
    //     $cust_user_id = $_GET['view'];
    //     $sql1 = "SELECT * FROM user WHERE user_id=$cust_user_id";
    //     $result1=mysqli_query($conn,$sql1);
        
    //     if($result1)
    //     { 
                       
    //         while($recordcustomer = mysqli_fetch_assoc($result1))
    //         {
    //             $cust_user_id=$recordcustomer['user_id'];
    //             $cust_first_name=$recordcustomer['fname'];
    //             $cust_email=$recordcustomer['email'];
    //             $cust_role=$recordcustomer['role'];
   
    //         }
            
    //     }
    // }

//blog
//$sqlblog="SELECT * FROM blog where verified=0";
$sqlblog = "SELECT * FROM user u JOIN blog b 
            ON u.user_id = b.user_id 
            WHERE verified=0;
            ";

// make query & get blogs
$resultblog= mysqli_query($conn,$sqlblog);

    // if(isset($_GET['viewblog']))
    // {
    //     $blog_id = $_GET['viewblog'];
    //     //$sql2 = "SELECT * FROM blog WHERE blog_id=$blog_id and verified=0";
    //     $sql2 = "SELECT * FROM user u JOIN blog b 
    //             ON u.user_id = b.user_id 
    //             WHERE b.blog_id = $blog_id and verified=0;
    //             ";
    //     $result2=mysqli_query($conn,$sql2);
        
    //     if($result2)
    //     { 
                       
    //         while($recordblog = mysqli_fetch_assoc($result2))
    //         {
    //             $blog_id=$recordblog['blog_id'];
    //             $blog_title=$recordblog['title'];
    //             $fname=$recordblog['fname'];
    //             $lname=$recordblog['lname'];
    //             $email=$recordblog['email'];
   
    //         }
            
    //     }

    //     //header('location:../../instructor/Blog/userblog.php');
    // }

//course
//$sqlcourse="SELECT * FROM course where verified=0";
$sqlcourse =    "SELECT * FROM user u JOIN course c 
                ON u.user_id = c.user_id 
                WHERE verified=0;
                ";

// make query & get resultcustomer
$resultcourse= mysqli_query($conn,$sqlcourse);




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

?> 