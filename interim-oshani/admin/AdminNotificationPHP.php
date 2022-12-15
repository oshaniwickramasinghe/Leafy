<?php
include 'connect.php';

//customer
$sqlcustomer="SELECT * FROM users where role='customer'";

// make query & get resultcustomer
$resultcustomer= mysqli_query($conn,$sqlcustomer);

    if(isset($_GET['view']))
    {
        $user_id = $_GET['view'];
        $sql1 = "SELECT * FROM users WHERE user_id=$user_id and role='customer'";
        $result1=mysqli_query($conn,$sql1);
        
        if($result1)
        { 
                       
            while($recordcustomer = mysqli_fetch_assoc($result1))
            {
                $user_id=$recordcustomer['user_id'];
                $first_name=$recordcustomer['first_name'];
                $email=$recordcustomer['email'];
                $contact_no=$recordcustomer['contact_no'];
                $role=$recordcustomer['role'];
   
            }
            
        }
    }

//instructor
$sqlinstructor="SELECT * FROM users where role='instructor'";

// make query & get resultcustomer
$resultinstructor= mysqli_query($conn,$sqlinstructor);

    if(isset($_GET['view']))
    {
        $user_id = $_GET['view'];
        $sql2 = "SELECT * FROM users WHERE user_id=$user_id and role='instructor'";
        $result2=mysqli_query($conn,$sql2);
        
        if($result2)
        { 
                       
            while($recordinstructor = mysqli_fetch_assoc($result2))
            {
                $user_id=$recordinstructor['user_id'];
                $first_name=$recordinstructor['first_name'];
                $email=$recordinstructor['email'];
                $contact_no=$recordinstructor['contact_no'];
                $role=$recordinstructor['role'];
   
            }
            
        }
    }

//Agriculturalist
$sqlagriculturalist="SELECT * FROM users where role='agriculturalist'";

// make query & get resultcustomer
$resultagriculturalist= mysqli_query($conn,$sqlagriculturalist);

    if(isset($_GET['view']))
    {
        $user_id = $_GET['view'];
        $sql3 = "SELECT * FROM users WHERE user_id=$user_id and role='agriculturalist'";
        $result3=mysqli_query($conn,$sql3);
        
        if($result3)
        { 
                       
            while($recordagriculturalist = mysqli_fetch_assoc($result3))
            {
                $user_id=$recordagriculturalist['user_id'];
                $first_name=$recordagriculturalist['first_name'];
                $email=$recordagriculturalist['email'];
                $contact_no=$recordagriculturalist['contact_no'];
                $role=$recordagriculturalist['role'];
   
            }
            
        }
    }

//Delivery person
$sqldelivery="SELECT * FROM users where role='delivery_person'";

// make query & get resultcustomer
$resultdelivery= mysqli_query($conn,$sqldelivery);

    if(isset($_GET['view']))
    {
        $user_id = $_GET['view'];
        $sql4 = "SELECT * FROM users WHERE user_id=$user_id and role='delivery_person'";
        $result4=mysqli_query($conn,$sql4);
        
        if($result4)
        { 
                       
            while($recorddelivery = mysqli_fetch_assoc($result4))
            {
                $user_id=$recorddelivery['user_id'];
                $first_name=$recorddelivery['first_name'];
                $email=$recorddelivery['email'];
                $contact_no=$recorddelivery['contact_no'];
                $role=$recorddelivery['role'];
   
            }
            
        }
    }

?> 