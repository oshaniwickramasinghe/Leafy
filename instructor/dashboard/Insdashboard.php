<?php
//including header file to page
include '../includes/header.php';

// get user ID by using session
$user_ID = $_SESSION['USER_DATA']['user_id'];

//there is not passing session value redirect to the login page
if(!isset($user_ID)){
    header('location:../login/login.php');
};


// when click on overview button then get the data from database
/*if(isset($_GET['overview']))
{
   $select1=mysqli_query($conn,"SELECT * FROM `user` WHERE user_id='$user_ID'") or die('query failed');
   if(mysqli_num_rows($select1)>0){

    $fetch= mysqli_fetch_assoc($select1); 
    }

$select2=mysqli_query($conn,"SELECT * FROM `instructor` WHERE user_id='$user_ID'") or die('query failed');

   if(mysqli_num_rows($select2)>0){

    $result= mysqli_fetch_assoc($select2); 
    }


}

//when click on update profile button to update database columns

if(isset($_POST['update_profile'])){

    $update_fname = mysqli_real_escape_string($conn, $_POST['update_first_name']);
    $update_lname = mysqli_real_escape_string($conn, $_POST['update_last_name']);
    $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);
    $update_cnumber = mysqli_real_escape_string($conn, $_POST['update_cnumber']);
    $update_occupation = mysqli_real_escape_string($conn, $_POST['update_occupation']);
    $update_specialized_area = mysqli_real_escape_string($conn, $_POST['update_specialized_area']);
    $update_education_level = mysqli_real_escape_string($conn, $_POST['update_education_level']);
    $update_image=$_FILES['update_image']['name'];
    $image_size=$_FILES['update_image']['size'];
    $image_tmp_name=$_FILES['update_image']['tmp_name'];
    $image_folder="images/".$update_image;


// update the user table
    $sql1 = mysqli_query($conn, "UPDATE `user` SET fname='$update_fname' , lname='$update_lname', 
    email='$update_email' , image='$update_image' WHERE user_id='$user_ID'") or die('query failed');

//update the instructor table
    $sql2 = mysqli_query($conn, "UPDATE `instructor` SET contact_number='$update_cnumber', occupation='$update_occupation', 
    specialized_area='$update_specialized_area', education_level='$update_education_level' WHERE user_id='$user_ID'") or die('query failed');

// when choose the image to update
    if(!empty($update_image)){
        //check the image size
        if($image_size > 2000000){
            $message[] = 'image is too large';
        }else{
            // move the uploaded image to images file
            move_uploaded_file($image_tmp_name, $image_folder);
        }
// when did not choose image to update
    }else{
        $update_image = $image;
    }
// when data pass to database tables(user and instructor)
    if($sql1 && $sql2){
            
        $message[]='update your details successfully!';
    }else{
        $message[]="registered failed!";
    }
        
    
   
}

// when click to change password
if(isset($_POST['change_password'])){

    $old_pass = $_POST['old_pass'];
    $update_pass = mysqli_real_escape_string($conn,md5($_POST['update_pass']));
    $new_pass = mysqli_real_escape_string($conn,md5($_POST['new_pass']));
    $confirm_pass = mysqli_real_escape_string($conn,md5($_POST['confirm_pass']));

    if(!empty($update_pass) || !empty($new_pass) || !empty($confirm_pass))
    {
        if($update_pass != $old_pass){
            $message[]="old password not matched!";
           
        }elseif($new_pass != $confirm_pass){
            $message[]="confirm password is not matched!";
            echo"<script>alert('confirm password is not matched!')</script>";
        }else{
            mysqli_query($conn, "UPDATE `instructor` SET password='$confirm_pass' WHERE user_id='$user_ID'") or die ('query failed');
            $message[]="password updated successfully!";
            echo"<script>alert('password updated successfully!');</script>";
        }
    }

}
*/


?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Insdashboard.css">
    <title>Instructor Home</title>
    
    
</head>
<body>
    <div class="main-container">
        <?php include "../includes/instructorMenu.php";  ?>
        <div class="details-container">
            <div class="first-part">
                <h1>Dashboard</h1S>
                <h3> Welcome <?php echo $fetch['fname']." ".$fetch['lname']; ?> </h3>
            </div> 
            <div class="view-wrap"> 
                   <div class="card-section">
                        <div class="num-course">
                            <h2>Courses</h2>
                            <table>
                                <tr>
                                <th>Total</th>
                                <td>:</td>
                                <td>25</td>  
                                </tr>

                                <tr>
                                <th>My courses</th>
                                <td>:</td>
                                <td>5</td>  
                                </tr>
                            </table>
                        </div>
                        <div class="num-blog">
                            <h2>Blogs</h2>
                            <table>
                                <tr>
                                <th>Total</th>
                                <td>:</td>
                                <td>25</td>  
                                </tr>

                                <tr>
                                <th>My courses</th>
                                <td>:</td>
                                <td>5</td>  
                                </tr>
                            </table>
                        </div>
                        <div class="num-question">
                            <h2>Questions</h2>
                            <table>
                                <tr>
                                <th>Total</th>
                                <td>:</td>
                                <td>25</td>  
                                </tr>

                                <tr>
                                <th>Answered </th>
                                <td>:</td>
                                <td>5</td>  
                                </tr>

                                <tr>
                                <th>Ignored</th>
                                <td>:</td>
                                <td>5</td>  
                                </tr>
                            </table>
                        </div>
                   </div>
                    <div class="graph-div">
                        <div class="course-graph" id="course-graph">
                            <h2>Reports about course follwers</h2>
                            <img src="../images/bar_gart_01.png " align="middle" width="50%"  border-radius:5%>

                        </div>
                        <div class="question-graph" id="question-graph">
                            <h2>Report recieved questions</h2>
                            <img src="../images/bar-chart-06.jpg" align="middle" width="50%" border-radius:5%>
                        </div>
                    </div>
            </div>
        </div>
    </div>
 
    <footer>
           <?php include "../includes/footer.php";?>
    </footer>
    <script>
        var view_div = document.getElementById("view-div");
        var edit_profile = document.getElementById("edit-profile");
        var change_password = document.getElementById("change-password");
        var view_btn = document.getElementById("view-btn");
        var update_btn = document.getElementById("update-btn");
        var password_btn = document.getElementById("password-btn");

        view_btn.addEventListener('click', ()=>{
            view_div.style.display ='block';
            edit_profile.style.display ='none';
            change_password.style.display ='none';
        });

        update_btn.addEventListener('click', ()=>{
            edit_profile.style.display ='block';
            view_div.style.display ='none';
            change_password.style.display ='none';
        });

        password_btn.addEventListener('click', ()=>{
            change_password.style.display ='block';
            view_div.style.display ='none';
            edit_profile.style.display ='none';
        });
    
    
    
    </script>
</body>
</html>