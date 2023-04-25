<?php

// error_reporting(0);

include '../connect.php';

if(isset($_GET['UID']) )
{
    $get_user_id = $_GET['UID'];
    $role=$_GET['ROLE'];
    $sql1 = "SELECT * FROM user WHERE user_id=$get_user_id ";
    $result1=mysqli_query($conn,$sql1);
    
    if($result1)
    { 
                   
        while($recordcommon = mysqli_fetch_assoc($result1))
        {
            $user_id=$recordcommon['user_id'];
            $first_name=$recordcommon['fname'];
            $last_name=$recordcommon['lname'];
            $email=$recordcommon['email'];
            $role=$recordcommon['role'];

        }

    }

    //customer
    if($role=='customer')
    {
        $sql2 = "SELECT * FROM customer WHERE user_id=$get_user_id";
        $result2=mysqli_query($conn,$sql2);
        
        if($result2)
        { 
                    
            while($recordcustomer = mysqli_fetch_assoc($result2))
            {
                $contact_no=$recordcustomer['contact_no'];
                $district=$recordcustomer['district'];
                $address1=$recordcustomer['address1'];
                $address2=$recordcustomer['address2'];

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
                $district=$recordagri['district'];
                $address1=$recordagri['address1'];
                $address2=$recordagri['address2'];
                $rate=$recordagri['rate'];

            }

            
        }
    }


    //instructor
    if($role=='Instructor')
    {
        $sql4 = "SELECT * FROM instructor WHERE user_id=$get_user_id";
        $result4=mysqli_query($conn,$sql4);
        
        if($result4)
        { 
                    
            while($recordinsti = mysqli_fetch_assoc($result4))
            {
                $occupation=$recordinsti['occupation'];
                $education_level=$recordinsti['education_level'];
                $specialized_area=$recordinsti['specialized_area'];
                $contact_number=$recordinsti['contact_number'];

            }

            
        }
    }

    //Delivery agent
    if($role=='Delivery Agent')
    {
        $sql5 = "SELECT * FROM delivery_agent WHERE user_id=$get_user_id";
        $result5=mysqli_query($conn,$sql5);
        
        if($result5)
        { 
                    
            while($recorddeli = mysqli_fetch_assoc($result5))
            {
                $location=$recorddeli['location'];
                $license_no=$recorddeli['license_no'];

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