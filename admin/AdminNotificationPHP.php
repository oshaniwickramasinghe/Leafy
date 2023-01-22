<?php
include 'connect.php';

//customer
$sqlcustomer="SELECT * FROM users where role='customer'";

// make query & get resultcustomer
$resultcustomer= mysqli_query($conn,$sqlcustomer);

    if(isset($_GET['view']))
    {
        $cust_user_id = $_GET['view'];
        $sql1 = "SELECT * FROM users WHERE user_id=$cust_user_id and role='customer'";
        $result1=mysqli_query($conn,$sql1);
        
        if($result1)
        { 
                       
            while($recordcustomer = mysqli_fetch_assoc($result1))
            {
                $cust_user_id=$recordcustomer['user_id'];
                $cust_first_name=$recordcustomer['first_name'];
                $cust_email=$recordcustomer['email'];
                $cust_contact_no=$recordcustomer['contact_no'];
                $cust_role=$recordcustomer['role'];
   
            }
            
        }
    }

//instructor
$sqlinstructor="SELECT * FROM users where role='instructor'";

// make query & get resultcustomer
$resultinstructor= mysqli_query($conn,$sqlinstructor);

    if(isset($_GET['view']))
    {
        $inst_user_id = $_GET['view'];
        $sql2 = "SELECT * FROM users WHERE user_id=$inst_user_id and role='instructor'";
        $result2=mysqli_query($conn,$sql2);
        
        if($result2)
        { 
                       
            while($recordinstructor = mysqli_fetch_assoc($result2))
            {
                $inst_user_id=$recordinstructor['user_id'];
                $inst_first_name=$recordinstructor['first_name'];
                $inst_email=$recordinstructor['email'];
                $inst_contact_no=$recordinstructor['contact_no'];
                $inst_role=$recordinstructor['role'];
   
            }
            
        }
    }

//Agriculturalist
$sqlagriculturalist="SELECT * FROM users where role='agriculturalist'";

// make query & get resultcustomer
$resultagriculturalist= mysqli_query($conn,$sqlagriculturalist);

    if(isset($_GET['view']))
    {
        $agri_user_id = $_GET['view'];
        $sql3 = "SELECT * FROM users WHERE user_id=$agri_user_id and role='agriculturalist'";
        $result3=mysqli_query($conn,$sql3);
        
        if($result3)
        { 
                       
            while($recordagriculturalist = mysqli_fetch_assoc($result3))
            {
                $agri_user_id=$recordagriculturalist['user_id'];
                $agri_first_name=$recordagriculturalist['first_name'];
                $agri_email=$recordagriculturalist['email'];
                $agri_contact_no=$recordagriculturalist['contact_no'];
                $agri_role=$recordagriculturalist['role'];
   
            }
            
        }
    }

//Delivery person
$sqldelivery="SELECT * FROM users where role='delivery_person'";

// make query & get resultcustomer
$resultdelivery= mysqli_query($conn,$sqldelivery);

    if(isset($_GET['view']))
    {
        $del_user_id = $_GET['view'];
        $sql4 = "SELECT * FROM users WHERE user_id=$del_user_id and role='delivery_person'";
        $result4=mysqli_query($conn,$sql4);
        
        if($result4)
        { 
                       
            while($recorddelivery = mysqli_fetch_assoc($result4))
            {
                $del_user_id=$recorddelivery['user_id'];
                $del_first_name=$recorddelivery['first_name'];
                $del_email=$recorddelivery['email'];
                $del_contact_no=$recorddelivery['contact_no'];
                $del_role=$recorddelivery['role'];
   
            }
            
        }
    }

?> 