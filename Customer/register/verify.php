<?php
    $conn = mysqli_connect("localhost","root","","leafy");


    if(isset($_GET['code'])){
         
        $verification_code  =$_GET['code'];
        $sql= "SELECT * FROM user WHERE code = '{$verification_code}'";
        $result =  mysqli_query($conn ,$sql);

        if(mysqli_num_rows($result) == 1){
            $sql = "UPDATE user SET  is_active = '1' , code = 'NULL' WHERE 
            code = '{$verification_code}' LIMIT 1";

            $result =  mysqli_query($conn , $sql);


            if(mysqli_affected_rows($conn) == 1){

                header("Location:../login/login.view.php");
            }else{
                echo "<script>alert('Invalid verification code.')</script>";
            }
        }
    }

