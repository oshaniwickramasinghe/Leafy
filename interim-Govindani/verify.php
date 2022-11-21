<?php
    $conn = mysqli_connect("localhost","root","","customer_db");


    if(isset($_POST['code'])){
        $verification_code  =$_POST['code'];
        echo "$verification_code";
        $query = "SELECT * FROM  login WHERE verify_code = '$verification_code'";
        $result =  mysqli_query($conn ,$query);

        if(mysqli_num_rows($result) == 1){
            $query = "UPDATE login SET  is_active = '1' WHERE 
            verify_code = '$verification_code' LIMIT 1";

            $result =  mysqli_query($conn , $query);


            if(mysqli_affected_rows($conn) == 1){
                echo "Email verified";
                header("Location: login.php");
            }else{
                echo "<script>alert('Invalid verification code.')</script>";
            }
        }
    }

?>