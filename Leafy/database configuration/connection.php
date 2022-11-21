<?php      
    $host = "localhost";  
    $user = "student";  
    $password = 'student';  
    $db_name = "leafy";  
      
    $con = mysqli_connect($host, $user, $password, $db_name);  
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }
    
?>  