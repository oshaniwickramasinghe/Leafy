<?php

include "connect.php";



if(isset($_POST['uname']) && isset($_POST['passw'])){
    function validate($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data= htmlspecialchars($data);

        return $data;
    }

     $uname = validate($_POST['uname']);
     $passw = validate($_POST['passw']);

       if(empty($uname)){

       }else if(empty($passw)){
        
       }else{
        $sql = "SELECT * FROM `loginuser` WHERE uname = '$uname' && passw = '$passw'";
         $result = mysqli_query($conn,$sql);

         if(mysqli_num_rows($result)=== 1){
            header("Location:createpost.php");
            exit();
         }else{
            header("Location: login.php?error=Incorrect username or password");
           

            exit();
         }
       }
       
}else{
    header("Location:login.php");
    exit();
}

?>




