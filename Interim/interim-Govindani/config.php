<?php
include "db_con.php";

if(isset($_POST['uname']) && isset($_POST['password'])){
    function validate($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data= htmlspecialchars($data);

        return $data;
    }

     $uname = validate($_POST['uname']);
     $pass = md5($_POST['password']);

       if(empty($uname)){

       }else if(empty($pass)){
        
       }else{
        $sql = "SELECT * FROM `login` WHERE email = '$uname' && password = '$pass'";
         $result = mysqli_query($conn,$sql);

         if(mysqli_num_rows($result)=== 1){
           $_SESSION['uname'] = $row['uname'];
            header("Location:loggedhome.php");
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