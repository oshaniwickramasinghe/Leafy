<?php
include "../includes/header.php";

$user_ID   = 1;//$_SESSION['USER_DATA']['user_id'];
$user_role = "Customer";//$_SESSION['USER_DATA']['role'];

if(isset($_GET['session']) && isset($_GET['course']))
{
    $session_id = $_GET['session'];
    $course_id  = $_GET['course'];

    
    //Insert the user entrolling data to session_followers
    if($user_role == "Agriculturaist" || $user_role =="Customer"){

        $query1   = "SELECT *
                     FROM session_followers
                     WHERE user_id  ='$user_ID'
                     AND course_id  ='$course_id'
                     AND session_id ='$session_id'";

        $fetch1     = mysqli_query($conn,$query1);



        if (mysqli_num_rows($fetch1) > 0) {

        } else {

            $sql1      = "INSERT INTO session_followers
                        (user_id,course_id,session_id)
                        values('$user_ID','$course_id','$session_id')";
                    
            $result1    = mysqli_query($conn,$sql1);

            if($result1){
                echo"<script>alert(save to database');</script>";
            }else{
                echo"<script>alert('error in saving');<script>";
            }
        }

    }
    

    $sql2       = "SELECT * FROM course_session 
                   WHERE session_id='$session_id'
                   AND course_id='$course_id'";

    $result2    = mysqli_query($conn,$sql2);

    if(isset($result2)){
         while($record2  = mysqli_fetch_assoc($result2))
        {
            $title       = $record2['title'];
            $description = $record2['description'];
            $content     = $record2['content'];
            $mcq         = $record2['mcq'];
            $option_1    = $record2['option_1'];
            $option_2    = $record2['option_2'];
            $option_3    = $record2['option_3'];
            $option_4    = $record2['option_4'];
            $answer      = $record2['answer'];
            $image       = $record2['image'];

        }
    }


    if(isset($_POST['submit']))
    {
     
       $status        = $_POST['status'];
       
        //Update the table as complete the session
        if($user_role == "Agriculturaist" || $user_role =="Customer"){

            if($status==1){

                $query    = "SELECT *
                FROM session_followers
                WHERE user_id    = '$user_ID'
                AND course_id    = '$course_id'
                AND session_id   = '$session_id'
                AND is_completed = 1";

                $fetch     = mysqli_query($conn,$query);


                if (mysqli_num_rows($fetch) > 0) {
                    
                } else {
                    $sql3      = "UPDATE session_followers
                                  SET is_completed = 1
                                  WHERE user_id    = '$user_ID'
                                  AND course_id    ='$course_id'
                                  AND session_id   ='$session_id'";
                        
                    $result3    = mysqli_query($conn,$sql3);
                }

            }

        } 
       
    }

                
   



}






?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="userSession.css">
    <title>User Session</title>
</head>
<body>
    <div class="main_content">
        <div class="begin" style="background:url(../images/<?php if(isset ($image)){ echo $image;} ?>) no-repeat center center / cover;">
        </div>
        <div class="session">
            <h1><?php if(isset($title)){echo $title;}?></h1>
            <p class="description"><?php if(isset($description)){echo $description;}?></p>
            <div class="content">
                <?php if(isset($content)){echo $content;}?>
            </div>
        </div>
        
    </div>
    <div class="view-wrap"> 
        <div class="view">
            <div class="block">
                <div class="quiz-div" id="quiz-div">
                    <h1>Quiz</h1>
                    <p class="statement">This question about the this session content.To complete this session you need to answer correctly for this quiz.</p>
                    <div class="quiz_content">
                        <div class="question"><p class="quiz_mark"><b>Q</b></p>&nbsp; &nbsp;<p><?php if(isset($mcq)){echo $mcq;}?> ?</p></div>
                        <form action="" method="post" enctype="multipart/form-data" id="">
                            <div class="options">
                                <input type="radio" id="option_1" name="answer" value="<?php if(isset($option_1)){echo $option_1;}?>">
                                <label for="option_1"><?php if(isset($option_1)){echo $option_1;}?></label><br>
                                <input type="radio" id="option_2" name="answer" value="<?php if(isset($option_2)){echo $option_2;}?>">
                                <label for="option_2"><?php if(isset($option_2)){echo $option_2;}?></label><br>
                                <input type="radio" id="option_3" name="answer" value="<?php if(isset($option_3)){echo $option_3;}?>">
                                <label for="option_3"><?php if(isset($option_3)){echo $option_3;}?></label><br>
                                <input type="radio" id="option_4" name="answer" value="<?php if(isset($option_4)){echo $option_4;}?>">
                                <label for="option_4"><?php if(isset($option_4)){echo $option_4;}?></label>
                                <input type="hidden" name="status" id="status" value="">
                            </div>
                            </div>
                            <div class="btn">
                                <button  type="submit" onclick="getSelectedAnswer()" value="submit" name="submit" >Submit</button>
                            </div>

                        </form>
                    
                   
                </div>
            </div>
        </div>
    </div>
    
</body>
<footer><?php include "../includes/footer.php"; ?></footer>
<script>

    var answer = <?=$answer?>

    function getSelectedAnswer() {
        // get all the radio buttons in the group
        var radioButtons = document.getElementsByName('answer');
        
        // loop through all the radio buttons to check which one is selected
        for (var i = 0; i < radioButtons.length; i++) {
            if (radioButtons[i].checked) {
                if(radioButtons[i].value == answer){
                    // return the selected answer value
                    alert("Selected answer is correct " );

                     // set the value of a hidden input field to "correct"
                    document.getElementById("status").value =1;
                
                }else{
                    alert("Selected answer is incorrect");
                }
                return; // exit the function once an answer is selected
            }
        }
        
        // if none of the radio buttons are selected, show an error message
        alert("Please select an answer.");
    }










</script>
</html>