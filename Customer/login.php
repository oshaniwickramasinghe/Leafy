<?php

include "database.php";
require "Auth.php";


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
         header("Location:customerhome.php");
       }else if(is_agriculturalist()){
        header("Location:../agriculturalist/agriD.php");
       }else if(is_instructor()){
        header("Location:../instructor/blog.php");
       }else{
        header("Location:../admin/AdminHome.php");
          
        } // exit();

           
         }else{
            header("Location:login.view.php?error=Incorrect username or password");

            exit();
            header("Location:login.view.php");
          
         }


}
