<?php      
    include('connection.php'); 
    //
    session_start();
    // 
    $username = $_POST['user'];  
    $password = $_POST['pass'];  

    echo ($username);
    echo ($password);
    
      
        //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($con, $username);  
        $password = mysqli_real_escape_string($con, $password);  
      
        $sql = "SELECT * FROM users WHERE first_name = '$username' AND passward = '$password'";  
        //$sql = "SELECT * FROM login where username = '$username' ";  
        //echo ($username);
        //echo ($password);

        //echo ($username);
        //echo ($sql);
        //echo ($password);

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
          
        if($count == 1){  
            echo "<h1><center> Login successful </center></h1>";  
            header("Location:home.php");           

        }  
        else{  
            echo "<h1> Login failed. Invalid username or password.</h1>";  
        }     
?> 