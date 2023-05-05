<?php

include "../Customer/database.php";
require "../public/Auth.php";


if(isset($_POST['email']) && isset($_POST['password'])){
    function validate($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data= htmlspecialchars($data);

        return $data;
}


$email= validate($_POST['email']);
     
    $row  = "SELECT password FROM user WHERE email = '$email'";
    $result = mysqli_query($conn,$row);
    $res =  mysqli_fetch_array($result);
   
     
     if(password_verify($_POST['password'],$res[0]))
     {
        $row  = "SELECT * FROM user WHERE email = '$email'";
        $result = mysqli_query($conn,$row);
        $res =  mysqli_fetch_array($result);
         $_SESSION['USER_DATA'] = $res;

     
       if(is_customer()){
         header("Location:../Customer/customerhome.php");
       }else if(is_agriculturalist()){
         header("Location:../agriculturalist/agriD.php");
       }else if(is_admin()){
        header("Location: ../admin/home/AdminHome.php");
       }else if(is_deliveryAgent()){
        header("Location: ../delivery_person/DeliDashboard.php");
       }else{
        header("Location:../Customer/home.view.php");
       }

      
          
            // exit(); 
         }else{
            header("Location:login.view.php?error=Incorrect username or password");

            exit();
            header("Location:login.view.php");
          
         }


}
