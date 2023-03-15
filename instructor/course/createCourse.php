<?php
 include '../includes/header.php';
 $user_ID = $_SESSION['USER_DATA']['user_id'];

 $update = false;

 $course_ID="";
 $title="";
 $description="";
 $date="";
 $author="";
 $comment="";
 $time="";
 $image="";
 $duration="";
 $steps="";
 $status="";

 if(isset($_POST['save']))
 {
   /* $blog_ID=mysqli_real_escape_string($conn,$_POST['blog_ID']); */
    $title=mysqli_real_escape_string($conn,$_POST['title']);
    $Topic=mysqli_real_escape_string($conn,$_POST['Topic']);
    $description=mysqli_real_escape_string($conn,$_POST['description']);
    $duration=mysqli_real_escape_string($conn,$_POST['duration']);
    $status=mysqli_real_escape_string($conn,$_POST['status']);
    $steps=mysqli_real_escape_string($conn,$_POST['steps']);
    $image=$_FILES['image']['name'];
    $image_size=$_FILES['image']['size'];
    $image_tmp_name=$_FILES['image']['tmp_name'];
    $image_folder="../images/".$image;
    


    $sql1=" INSERT INTO course(title,Topic,image,user_id,description,duration,status,steps) Values ('$title',' $Topic','$image','$user_ID','$description','$duration','$status','$steps')";
   
    $result1=mysqli_query($conn,$sql1);
    if($result1){
        move_uploaded_file($image_tmp_name, $image_folder);
       echo"<script>alert('Details added');</script>";
    }else{
        echo"Error: " . $sql1 . "<br>" . mysqli_error($conn);
    }


    
 }



 if(isset($_GET['edit']))
 {
     $course_ID = $_GET['edit'];


     $query3 = "SELECT * FROM course WHERE course_id=$course_ID";
     $stmt3 = mysqli_query($conn,$query3);
     

     
     if($stmt3){
         while($record3 = mysqli_fetch_assoc($stmt3))
         {
             $course_ID=$record3['course_id'];
             $title=$record3['title'];
             $date=$record3['date'];
             $image=$record3['image'];
             $steps=$record3['steps'];
             $status=$record3['status'];
             $duration=$record3['duration'];
             $description=$record3['description'];
             $steps=$record3['steps'];
         }
        
     }else{
         echo "<script>alert('Failed to edit data in database')</script>";
     }

     $update = true;
 }

 if(isset($_POST['update'])){

    $title=$_POST['title'];
    $date=$_POST['date'];
    $steps=$_POST['steps'];
    $image=$_POST['oldimage1'];
    $description=$_POST['description'];
    $duration=$_POST['duration'];

    if(isset($_FILES['image']['name']) && ($_FILES['image']['name']!= ""))
    {
        $newimage=$_FILES['image']['name'];
        $newimage_size=$_FILES['image']['size'];
        $newimage_tmp_name=$_FILES['image']['tmp_name'];
        $image_folder="../images/".$newimage;
        move_uploaded_file($newimage_tmp_name, $image_folder);

    }
    else{
        $newimage = $image;
    }

    $query =  mysqli_query($conn,"UPDATE course SET course_id='$course_ID', title='$title', date=' $date', steps='$steps',duration='$duration', 
    description='$description', image='$newimage' WHERE course_id='$course_ID'") 
    or die('query failed');

    if($query)
    {
        $message[]='update your details successfully!';
    }else{
        $message[]="registered failed!";
    }
    

 }

?> 





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../course/createCourse.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>create course</title>
</head>
<body>
<div class="container">
        <?php include "../includes/instructorMenu.php"; ?>
        <div class="create_form_wrapper">
            <div class="title">
                <h1>Create Course</h1>
            </div> 
            <div class="view-wrap"> 
                <div class="view">
                   <div class="btn-section">
                        <button class="view-btn" id="view-btn">Basic Details</button>
                        <button class="update-btn" id="update-btn">Sessions</button>
                   </div>
                    <div class="block">
                            <?php
                                if(isset($message)){
                                    foreach($message as $message){
                                        ?>
                                        <div class="message"> 
                                            <p><?php  echo $message;?></p>
                                            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                                        </div>
                                        
                            <?php
                                    }
                                }
                            ?>
                        <div class="view-div" id="view-div">
                        <form action="" method="post" enctype="multipart/form-data" id="step-form">
                                
                                <div class="field">
                                    <div>
                                        <input type="hidden" name="course_id" value="<?= $course_ID;?>">
                                        <input type="hidden" name="date" value="<?= $date;?>">
                                        <input type="hidden" name="time" value="<?= $time;?>">
                                    </div>
                                    <div>
                                        <label for="title">Title</label>
                                        <input type="text" id="title" name="title" placeholder="Title of the course..." class="text_input" value="<?= $title; ?>" required><br>
                                    </div>
                                    
                                    <div>
                                        <label for="Topic">Topic</label><br>
                                        <select id="Topic" name="Topic">
                                            <option value="agronomy">Agronomy</option>
                                            <option value="horticulture">Horticulture</option>
                                            <option value="soil science">Soil Science</option>
                                            <option value="plant pathology">Plant Pathology</option>
                                            <option value="entomology">Entomology</option>
                                            <option value="agricultural engineering">Agricultural Engineering</option>
                                            <option value="agricultural economics">Agricultural Economics</option>
                                            <option value="agricultural extension">Agricultural Extension</option>
                                            <option value="agroforestry">Agroforestry</option>
                                        </select><br>
                                    </div>
                                    <div class="description">
                                        <label for="description">Course Description</label><br><br>
                                        <textarea for="description" id="description" placeholder="Short description about the blog..." name="description" class="text_input"  value=""  required><?= $description; ?></textarea><br>
                                    </div> 
                                    <div>
                                        <label for="steps">Number of steps</label>
                                        <input type="number" id="steps" name="steps"placeholder="Enter the number of steps course will included..." min="1" value="<?= $steps; ?>" required><br>
                                    </div>
                                    <div>
                                        <label for="duration">Course Duration</label>
                                        <input type="text" id="duration" name="duration" placeholder="Duration of the course..." class="text_input" value="<?= $duration; ?>" required><br>
                                    </div>
                                    <div>
                                        <label for="status">Status</label><br>
                                        <select id="status" name="status">
                                            <option value="Complete">Complete</option>
                                            <option value="Not Complete">Not Complete</option>
                                        </select><br>
                                    </div>
                                    <div class="images">
                                        <label for="image" >Image for the cover page of course</label><br><br>
                                    <div class="image">
                                    <?php 
                                    if($image == ''){
                                        echo '<img src="../images/placeholde.png" align="middle" width="60%" border-radius:50%>';
                                    }else{
                                        echo '<img src="../images/'.$image.'" align="middle" width="60%" border-radius:50%;>';
                                    }
                                    
                                    ?>

                                    
                                        <input type="hidden" name="oldimage1" value="<?= $image;?>">
                                        <input type="file" name="image" class="text_input" accept="image/jpg, image/jpeg, image/png"><br>
                                        
                                    
                                    </div>
                                    </div>
                                
                                <!-- <div>
                                        <label for="image">Attach images</label>
                                        <input type="hidden" name="oldimage" value="<?= $image; ?>">
                                        <input type="file" name="image" class="text_input" accept="image/jpg, image/jpeg, image/png"><br>
                                    </div>
                                >-->
                                    </div>
                                    <div class="button-section">
                                 <!--   <button onclick="createTextAreas()" type="submit" class="btn" id="continue">Continue</button> -->
                                        <?php if($update == true) {?>
                                            <input type="submit" value="update" name="update" class="btn">
                                        <?php } else {?>     
                                            <input type="submit" value="Save" name="save" class="btn" id="save-btn">
                                        <?php } ?>   
                                    </div> 
                                </form>
                            </div>
                            <div class="update-div" id="update-div">
                                <form action="" method="post" enctype="multipart/form-data"> 
                                    <h2><label for="description">Course Session</label><br></h2>
                                    <label for="instruction" id="instruction"><small>Here is where you can add sessions of your course.
                                    Please add less than 15 session in to your course.</small></label>   
                                    <div class="sessions">
                                    <div class="session">
                                        <input type="text" id="session">
                                        <div class="icon">
                                        <i class="fa-solid fa-trash" onclick="alert('Are you sure you want to delete?');" style="font-size:18px;color:#ee6c41;"></i>&nbsp; &nbsp;
                                        <i class="fa-solid fa-pen-to-square" style="font-size:18px;color:#000000;"></i>
                                        </div>
                                    </div>
                                    </div>
                                            <button onclick="add_session()" type="button" class="btn" id="add-more"><i class="fa-solid fa-square-plus"></i> Add more session</button>
                                            <textarea for="textareas-container" id="textareas-container" placeholder="..." name="textareas-container " class="text_input"  value=""  required></textarea><br>
                                            <div class="save">
                                                <button  onclick="save_sessions()" class="save-btn">Save</button>
                                            </div>
                                            <!--<a href="InstructorHome.php" class="btn">go back</a> -->
                                        </div> 
                                </form>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
    </div>
    <div align="right">
        <a href="course.php" class="goback-btn">go back >></a> 
    </div>    

    <footer>
           <?php include "../includes/footer.php";?>
    </footer>

    
    <script>
        var view_div = document.getElementById("view-div");
        var update_div = document.getElementById("update-div");
        var view_btn = document.getElementById("view-btn");
        var update_btn = document.getElementById("update-btn");
        var save_btn = document.getElementById("save-btn");
        var sessions = [];

        view_btn.addEventListener('click', ()=>{
            view_div.style.display ='block';
            update_div.style.display ='none';
            view_btn.background
        });

        update_btn.addEventListener('click', ()=>{
            update_div.style.display ='block';
            view_div.style.display ='none';
            
        });

        function add_session()
        {
            var sessions_div = document.querySelector(".sessions");
            var session_html = `
            <div class="session">
                <input type="text" id="session">
                <div class="icon">
                <i class="fa-solid fa-trash" style="font-size:18px;color:#ee6c41;"></i>&nbsp; &nbsp;
                <i class="fa-solid fa-pen-to-square" style="font-size:18px;color:#000000;"></i>
                </div>
            </div>
            `;
            sessions_div.insertAdjacentHTML("beforeend", session_html);

            var delete_icon = sessions_div.lastElementChild.querySelector(".fa-trash");
            delete_icon.addEventListener("click", () => {
            if(!confirm('Are you sure you want to delete ?')){

                return;
            }
            sessions_div.removeChild(delete_icon.parentNode.parentNode);
            });
        }

        function save_sessions() {
            var session_inputs = document.querySelectorAll(".session input");

            // Loop through all the input elements and add their values to the sessions array
            for (var i = 0; i < session_inputs.length; i++) {
            sessions.push(session_inputs[i].value);
            }

            // Perform any necessary action with the sessions array
            console.log(sessions);

            // Clear the sessions array and reset the input fields
            sessions = [];
            var session_div = document.querySelector(".sessions");
            session_div.innerHTML = "";
        }



        function createTextAreas() {
            var numSteps = document.getElementById("steps").value;
            var textareasContainer = document.getElementById("textareas-container");
            textareasContainer.innerHTML = "";

            for (var i = 1; i <= numSteps; i++) {
                var textarea = document.createElement("textarea");
                textarea.setAttribute("name", "step" + i);
                textarea.setAttribute("placeholder", "Step " + i + " Details");
                textareasContainer.appendChild(textarea);
            }
        }
     
    </script>
</body>
</html>
