<?php

// error_reporting(0);

include '../connect.php';

// //customer
// $sqlcustomer="SELECT * FROM user where role='customer'";

// // make query & get resultcustomer
// $resultcustomer= mysqli_query($conn,$sqlcustomer);

//     if(isset($_GET['view1']))
//     {
//         $cust_user_id = $_GET['view1'];
//         $sql1 = "SELECT * FROM user WHERE user_id=$cust_user_id and role='customer'";
//         $result1=mysqli_query($conn,$sql1);
        
//         if($result1)
//         { 
                       
//             while($recordcustomer = mysqli_fetch_assoc($result1))
//             {
//                 $cust_user_id=$recordcustomer['user_id'];
//                 $cust_first_name=$recordcustomer['fname'];
//                 $cust_email=$recordcustomer['email'];
//                 $cust_role=$recordcustomer['role'];
   
//             }
            
//         }
//     }

// //instructor
// $sqlinstructor="SELECT * FROM user where role='instructor'";

// // make query & get resultcustomer
// $resultinstructor= mysqli_query($conn,$sqlinstructor);

//     if(isset($_GET['view2']))
//     {
//         $inst_user_id = $_GET['view2'];
//         $sql2 = "SELECT * FROM user WHERE user_id=$inst_user_id and role='instructor'";
//         $result2=mysqli_query($conn,$sql2);
        
//         if($result2)
//         { 
                       
//             while($recordinstructor = mysqli_fetch_assoc($result2))
//             {
//                 $inst_user_id=$recordinstructor['user_id'];
//                 $inst_first_name=$recordinstructor['fname'];
//                 $inst_email=$recordinstructor['email'];
//                 $inst_role=$recordinstructor['role'];
   
//             }
            
//         }
//     }

// //Agriculturalist
// $sqlagriculturalist="SELECT * FROM user where role='agriculturalist'";

// // make query & get resultcustomer
// $resultagriculturalist= mysqli_query($conn,$sqlagriculturalist);

//     if(isset($_GET['view3']))
//     {
//         $agri_user_id = $_GET['view3'];
//         $sql3 = "SELECT * FROM user WHERE user_id=$agri_user_id and role='agriculturalist'";
//         $result3=mysqli_query($conn,$sql3);
        
//         if($result3)
//         { 
                       
//             while($recordagriculturalist = mysqli_fetch_assoc($result3))
//             {
//                 $agri_user_id=$recordagriculturalist['user_id'];
//                 $agri_first_name=$recordagriculturalist['fname'];
//                 $agri_email=$recordagriculturalist['email'];
//                 $agri_role=$recordagriculturalist['role'];
   
//             }
            
//         }
//     }

// //Delivery person
// $sqldelivery="SELECT * FROM user where role='Delivery Agent'";

// // make query & get resultcustomer
// $resultdelivery= mysqli_query($conn,$sqldelivery);

//     if(isset($_GET['view4']))
//     {
//         $del_user_id = $_GET['view4'];
//         $sql4 = "SELECT * FROM user WHERE user_id=$del_user_id and role='Delivery Agent'";
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


if(isset($_GET['UID']) )
{
    $get_user_id = $_GET['UID'];
    $role=$_GET['ROLE'];
    $sql1 = "SELECT * FROM user WHERE user_id=$get_user_id ";
    $result1=mysqli_query($conn,$sql1);
    
    if($result1)
    { 
                   
        while($recordcustomer = mysqli_fetch_assoc($result1))
        {
            $user_id=$recordcustomer['user_id'];
            $first_name=$recordcustomer['fname'];
            $email=$recordcustomer['email'];
            $role=$recordcustomer['role'];

        }

    }

    //customer
    if($role=='customer')
    {
        $sql2 = "SELECT * FROM customer WHERE user_id=$get_user_id";
        $result2=mysqli_query($conn,$sql2);
        
        if($result2)
        { 
                    
            while($recordcustomer2 = mysqli_fetch_assoc($result2))
            {
                $contact_no=$recordcustomer2['contact_no'];
                $district=$recordcustomer2['district'];
                $address1=$recordcustomer2['address1'];

            }

            
        }
    }

    //agriculturalist
    if($role=='agriculturalist')
    {
        $sql3 = "SELECT * FROM agriculturalist WHERE user_id=$get_user_id";
        $result3=mysqli_query($conn,$sql3);
        
        if($result3)
        { 
                    
            while($recordagri = mysqli_fetch_assoc($result3))
            {
                $address1agri=$recordagri['address1'];
                $districtagri=$recordagri['district'];
                $rate=$recordagri['rate'];

            }

            
        }
    }

    

}


?> 

<?php   

  if(isset($_GET['deleteUID']))
  {
      
      $user_id = $_GET['deleteUID'];
      $sql2 = "UPDATE user SET approved=2 WHERE user_id=$user_id";
      $result2=mysqli_query($conn,$sql2);

      echo 'deleted';

  }


  if(isset($_GET['acceptUID']))
  {

      $user_id = $_GET['acceptUID'];
      $sql2 = "UPDATE user SET approved=1 WHERE user_id=$user_id";
      $result2=mysqli_query($conn,$sql2);

      echo 'updated';

  }

?>

<?php
    if(isset($_GET['UID']))
    {?>
    <div align="right">
        <a class="delete" href="AdminUserView.php ?deleteUID=<?=$_GET['UID'] ?>" >Deactivate</a>
        <a class="accept" href="AdminUserView.php ?acceptUID=<?=$_GET['UID'] ?>" >Accept</a>

    </div>
      
      <?php 
    }
?>