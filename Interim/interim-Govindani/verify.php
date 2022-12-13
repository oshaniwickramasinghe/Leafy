<?php
    $conn = mysqli_connect("localhost","root","","customer_db");
echo"hey";

    if(isset($_GET['code'])){
         
        $verification_code  =$_GET['code'];
        $sql= "SELECT * FROM login WHERE verify_code = '{$verification_code}'";
        $result =  mysqli_query($conn ,$sql);

        if(mysqli_num_rows($result) == 1){
            $sql = "UPDATE login SET  is_active = 'true' , verify_code = 'NULL' WHERE 
            verify_code = '{$verification_code}' LIMIT 1";

            $result =  mysqli_query($conn , $sql);


            if(mysqli_affected_rows($conn) == 1){

                header("Location:login.php");
            }else{
                echo "<script>alert('Invalid verification code.')</script>";
            }
        }
    }

?>