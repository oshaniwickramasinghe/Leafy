<?php

// error_reporting(0);

require "../../database/database.php";

//user
$sqlcustomer="SELECT * FROM user where approved=0";

// make query & get resultcustomer
$resultcustomer= mysqli_query($conn,$sqlcustomer);

    if(isset($_GET['view']))
    {
        $cust_user_id = $_GET['view'];
        $sql1 = "SELECT * FROM user WHERE user_id=$cust_user_id";
        $result1=mysqli_query($conn,$sql1);
        
        if($result1)
        { 
                       
            while($recordcustomer = mysqli_fetch_assoc($result1))
            {
                $cust_user_id=$recordcustomer['user_id'];
                $cust_first_name=$recordcustomer['fname'];
                $cust_email=$recordcustomer['email'];
                $cust_role=$recordcustomer['role'];
   
            }
            
        }
    }

//blog
$sqlblog="SELECT * FROM blog where verified=0";

// make query & get blogs
$resultblog= mysqli_query($conn,$sqlblog);

    if(isset($_GET['viewblog']))
    {
        $blog_id = $_GET['viewblog'];
        $sql2 = "SELECT * FROM blog WHERE blog_id=$blog_id and verified=0";
        $result2=mysqli_query($conn,$sql2);
        
        if($result2)
        { 
                       
            while($recordblog = mysqli_fetch_assoc($result2))
            {
                $blog_id=$recordblog['blog_id'];
                $blog_title=$recordblog['title'];
                $created_date=$recordblog['date'];
   
            }
            
        }
    }

//course
$sqlcourse="SELECT * FROM course where verified=0";

// make query & get resultcustomer
$resultcourse= mysqli_query($conn,$sqlcourse);

    if(isset($_GET['viewcourse']))
    {
        $course_user_id = $_GET['viewcourse'];
        $sql3 = "SELECT * FROM course WHERE course_id=$course_user_id and verified=0";
        $result3=mysqli_query($conn,$sql3);
        
        if($result3)
        { 
                       
            while($recordcourse = mysqli_fetch_assoc($result3))
            {
                $course_id=$recordcourse['course_id'];
                $course_name=$recordcourse['title'];
                
   
            }
            
        }
    }



//Delivery person
$sqldelivery="SELECT * FROM user where role='delivery_person'";

// make query & get resultcustomer
$resultdelivery= mysqli_query($conn,$sqldelivery);

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