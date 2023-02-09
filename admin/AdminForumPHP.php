<?php

error_reporting(0);

include 'connect.php';

//customer
$GetQuestions="SELECT * FROM question";

// make query & get resultcustomer
$result= mysqli_query($conn,$GetQuestions);

    if(isset($_GET['view']))
    {
        $question_id = $_GET['view'];
        $sql1 = "SELECT * FROM question WHERE question_id=$question_id ";
        $result1=mysqli_query($conn,$sql1);
        
        if($result1)
        { 
                       
            while($recordcustomer = mysqli_fetch_assoc($result1))
            {
                $question_id=$recordcustomer['question_id'];
                $questioner=$recordcustomer['user_id'];
                $content=$recordcustomer['content'];
   
            }
            
        }
    }



?> 