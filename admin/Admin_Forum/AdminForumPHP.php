<?php

error_reporting(0);


//customer
$GetQuestions="SELECT * FROM discussion where approved=0";

// make query & get resultcustomer
$result= mysqli_query($conn,$GetQuestions);

    if(isset($_GET['view']))
    {
        $question_id = $_GET['view'];

        // $sql1 = "SELECT * FROM user u JOIN question q 
        //          ON u.user_id = q.user_id  
        //          WHERE question_id=$question_id ";

        $sql1 = "SELECT * FROM discussion 
                WHERE id=$question_id ";
                 
        $result1=mysqli_query($conn,$sql1);
        
        if($result1)
        { 
                       
            while($record1 = mysqli_fetch_assoc($result1))
            {
                $question_id=$record1['id'];
                $fname=$record1['customer'];
                // $lname=$record1['lname'];
                $content=$record1['post'];
   
            }
            
        }
    }




    ////////////////////////////////////////////////////
$GetcourseQuestions="SELECT * FROM course_forum where approved=0";

// make query & get resultcustomer
$Cresult= mysqli_query($conn,$GetcourseQuestions);

    if(isset($_GET['view_1']))
    {
        $Cquestion_id = $_GET['view_1'];

        $sql2 = "SELECT * FROM user u JOIN course_forum q 
                 ON u.user_id = q.user_id  
                 WHERE q.question_id=$Cquestion_id ";

        // $sql2 = "SELECT * FROM course_forum 
        //         WHERE question_id=$Cquestion_id ";
                 
        $result2=mysqli_query($conn,$sql2);
        
        if($result2)
        { 
                       
            while($Crecord = mysqli_fetch_assoc($result2))
            {
                $Cquestion_id=$Crecord['question_id'];
                $Cfname=$Crecord['fname'];
                // $lname=$record2['lname'];
                $Ccontent=$Crecord['content'];
   
            }
            
        }
    }



?> 