<?php      
    include('connection.php'); 
    //
    session_start();
    // 
    
    $username = $_POST['user'];  
    $password = md5($_POST['pass']);  
   // $password = md5($password);

    echo ($username);
    echo ($password);
    
      
        //to prevent from mysqli injection  
        //$username = stripcslashes($username);  
        //$password = stripcslashes($password);  
        //$username = mysqli_real_escape_string($con, $username);  
        //$password = mysqli_real_escape_string($con, $password);  

        
      
        $sql = "SELECT * FROM users WHERE email = '$username' AND passward = '$password'";  
        

        $result = mysqli_query($con, $sql); 
        //$result = mysqli_query($sql);  

        //echo "Returned rows are: " . $result -> num_rows;
        printf("Select returned %d rows.\n", mysqli_num_rows($result));
         // Free result set
         //$result -> free_result();

        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  

        //echo ($result);
        echo ($count);
          
        if($count == 1)
        {  
            $_SESSION["ID"] = $row['user_id'];
            $_SESSION["Email"]=$row['email'];
            $_SESSION["First_Name"]=$row['first_name'];
            $_SESSION["Last_Name"]=$row['last_name']; 
            header("Location:home.php");           

        }  
        else
        {  
            header("Location:loginfail.html");      
        }     
?> 