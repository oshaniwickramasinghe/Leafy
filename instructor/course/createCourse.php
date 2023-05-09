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
 $status="";


 

 if(isset($_POST['save']))
 {
    $title=mysqli_real_escape_string($conn,$_POST['title']);
    $Topic=mysqli_real_escape_string($conn,$_POST['Topic']);
    $description=mysqli_real_escape_string($conn,$_POST['description']);
    $duration=mysqli_real_escape_string($conn,$_POST['duration']);
    $status=mysqli_real_escape_string($conn,$_POST['status']);
    $image=$_FILES['image']['name'];
    $image_size=$_FILES['image']['size'];
    $image_tmp_name=$_FILES['image']['tmp_name'];
    $image_folder="../images/".$image;
    


    $sql1=" INSERT INTO course(title,Topic,image,user_id,description,duration,status) Values ('$title',' $Topic','$image','$user_ID','$description','$duration','$status')";
    
    $result1=mysqli_query($conn,$sql1);
    if($result1){
        move_uploaded_file($image_tmp_name, $image_folder);
        $course_id = mysqli_insert_id($conn); 
        $_SESSION['course_id'] =  $course_id;
       echo"<script>alert('Details added');</script>";
    }else{
        echo"Error: " . $sql1 . "<br>" . mysqli_error($conn);
    }
    
 }


 if (isset($_POST['pass'])) {
    $session_ids = $_POST['sessions'];
    $id= $_SESSION['course_id'];

    // Retrieve the existing session IDs from the database
    $sql_select = "SELECT session_id FROM course_session WHERE course_id='$id'";
    $result_select = mysqli_query($conn, $sql_select);
    $existing_session_ids = array();
    while ($row = mysqli_fetch_assoc($result_select)) {
        $existing_session_ids[] = $row['session_id'];
    }

    // Loop through the new session IDs and insert only the ones that haven't been saved yet
    for ($i = 0; $i < count($session_ids); $i++) {
        $session_id = mysqli_real_escape_string($conn, $session_ids[$i]);

        if (!in_array($session_id, $existing_session_ids)) {
            // The session ID doesn't exist in the database, so insert it
            $sql_insert = "INSERT INTO course_session (course_id, session_id) VALUES ('$id','$session_id')";
            if (!mysqli_query($conn, $sql_insert)) {
                echo "Error: " . $sql_insert . "<br>" . mysqli_error($conn);
            }
        }
    }
}



 if(isset($_GET['edit']))
 {
     $course_ID = $_GET['edit'];
     $_SESSION['courseId'] =  $course_ID;

     $query3 = "SELECT * FROM course WHERE course_id=$course_ID";
     $stmt3 = mysqli_query($conn,$query3);
     

     
     if($stmt3){
         while($record3 = mysqli_fetch_assoc($stmt3))
         {
             $course_ID=$record3['course_id'];
             $title=$record3['title'];
             $date=$record3['date'];
             $image=$record3['image'];
             $status=$record3['status'];
             $duration=$record3['duration'];
             $description=$record3['description'];
         }
        
     }else{
         echo "<script>alert('Failed to edit data in database')</script>";
     }

     $query4 = "SELECT * FROM course_session WHERE course_id=$course_ID";
     $stmt4 = mysqli_query($conn,$query4);
     



     $update = true;

     if (isset($_POST['updateSession'])) {
        $session_ids = $_POST['sessions'];
        $id= $course_ID;
    
        // Retrieve the existing session IDs from the database
        $sql_select = "SELECT session_id FROM course_session WHERE course_id='$id'";
        $result_select = mysqli_query($conn, $sql_select);
        $already_created_session_count = mysqli_num_rows($result_select);
        $existing_session_ids = array();
        while ($row = mysqli_fetch_assoc($result_select)) {
            $existing_session_ids[] = $row['session_id'];
        }
    
        // Loop through the new session IDs and insert only the ones that haven't been saved yet
        for ($i = 0; $i < count($session_ids); $i++) {
            $session_id = mysqli_real_escape_string($conn, $session_ids[$i]);
    
            if (!in_array($session_id, $existing_session_ids)) {
                // The session ID doesn't exist in the database, so insert it
                $sql_insert = "INSERT INTO course_session (course_id, session_id) VALUES ('$id','$session_id')";
                if (!mysqli_query($conn, $sql_insert)) {
                    echo "Error: " . $sql_insert . "<br>" . mysqli_error($conn);
                }
            }
        }
    }
 }

 if(isset($_POST['update'])){

    $title=$_POST['title'];
    $date=$_POST['date'];
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
    <!-- Include stylesheet -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link href="https://cdn.quilljs.com/1.3.6/quill.bubble.css" rel="stylesheet">
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
                                        <select id="Topic" name="Topic" value="$topic">
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
                                            <button type="submit" value="update" name="update" class="btn">Update</button>
                                        <?php } else {?>     
                                            <button type="submit" value="Save" name="save" class="btn" id="save-btn">Save</button>
                                        <?php } ?>   
                                    </div> 
                                </form>
                            </div>
                            <div class="update-div" id="update-div">
                                <form action="" method="post" enctype="multipart/form-data"> 
                                    <h2><label for="description">Course Session</label><br></h2>
                                    <label for="instruction" id="instruction"><small>Here is where you can add sessions of your course.
                                    Please add more than or equal to 4 session in to your course.</small></label>   
                                    <div class="sessions">
                                        <?php if($update == true) {?>
                                            <?php while($record4 = mysqli_fetch_assoc($stmt4)){?>
                                                <div id="session_<?=$record4['session_id']?>" draggable="true" class="session">
                                                    <label for="index" id="<?=$record4['session_id']?>">Lecture-Session_<?=$record4['session_id']?></label>
                                                    <input type="hidden" name="sessions[]" value="<?=$record4['session_id']?>">
                                                    <div class="icon">
                                                        <i class="fa-solid fa-trash" style="font-size:18px;color:#ee6c41;"></i>&nbsp; &nbsp;
                                                        <a href="session.php?id=<?=$record4['session_id']?>& course=<?=$record4['course_id']?>"><i class="fa-solid fa-square-plus" style="font-size:18px;color:#000000;"></i></a>&nbsp; &nbsp;
                                                        <a href="session.php?edit_id=<?=$record4['session_id']?>& edit_course=<?=$record4['course_id']?>"><i class="fa-solid fa-pen-to-square" style="font-size:18px;color:#000000;"></i></a> 
                                                    </div>
                                                </div>
                                        <?php } }?>
                                    </div>
                                    <button onclick="add_session()" type="button" class="btn" id="add-more"><i class="fa-solid fa-square-plus"></i> Add more session</button>
                                    
                                    <div class="save">
                                        <?php if($update == true) {?>
                                            <button type="submit" value="updateSession" name="updateSession" class="save-btn">Update</button>
                                        <?php }else {?>
                                            <button  type="submit" value="pass" name="pass" class="save-btn">Save</button>
                                        <?php } ?>
                                    </div>

                                            <!--<a href="InstructorHome.php" class="btn">go back</a> -->
                                </form>
                            </div>

                    </div>
                        </div>
                    </div>
                </div>
            </div>
    <div align="right">
        <a href="course.php" class="goback-btn">Back to courses page >></a> 
    </div>    

    <footer>
           <?php include "../includes/footer.php";?>
    </footer>
<!-- Include the Quill library -->
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>

    <script>
        var view_div = document.getElementById("view-div");
        var update_div = document.getElementById("update-div");
        var view_btn = document.getElementById("view-btn");
        var update_btn = document.getElementById("update-btn");
        var save_btn = document.getElementById("save-btn");
        var steps = document.getElementById("steps");
        var sessions_div = document.querySelector(".sessions");
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
        

        // Define a counter variable outside of the function
        <?php if($update == false) { ?>
            // newly creating session list
            var session_counter = 0;
        <?php }else{ 
            // when adding new session to existing session list
             if(isset($_GET['edit']))
             {
                $course_ID = $_GET['edit'];

                // Retrieve the existing session IDs from the database
                $sql_select = "SELECT session_id FROM course_session WHERE course_id=$course_ID";
                $result_select = mysqli_query($conn, $sql_select);
                $already_created_session_count = mysqli_num_rows($result_select);
             
         ?>
               session_counter= <?php echo $already_created_session_count;?>;

         <?php } }?> 


        function add_session()
        {
         
            // Increment the counter variable
            session_counter++;
            
            // Generate the ID using the counter variable
            var session_name = "session_" + session_counter;
            session_id=session_counter;
            // Check if the maximum number of sessions has been reached
        //    if (sessions.length >= steps.value) {
        //        alert("You already created sessions that you need.");
        //        return;
          //  }
            var session_html = `
            <div id="${session_name}" draggable="true" class="session">
                <label for="index" id="${session_id}">Lecture-Session_${session_id}</label>
                <input type="hidden" name="sessions[]" value="${session_id}">
                <div class="icon">
                <i class="fa-solid fa-trash" style="font-size:18px;color:#ee6c41;"></i>
                </div>
            </div>
            `;
            sessions_div.insertAdjacentHTML("beforeend", session_html);

            // Disable the delete button for the first four input areas
            var delete_icons = sessions_div.querySelectorAll(".fa-trash");
            var icons_to_delete = [];

            // create a new array containing only the icons to delete
            for (var i = 0; i < delete_icons.length; i++) {
                if (i >= 4) {
                    icons_to_delete.push(delete_icons[i]);
                }
            }

            // loop through the new array and add click event listeners
            for (var i = 0; i < icons_to_delete.length; i++) {

                icons_to_delete[i].addEventListener("click", function() {
                    
                        if (!confirm("Are you sure you want to delete?")) {
                            return;
                        }
                        this.parentNode.parentNode.remove();
                    }
                );
            } 
            // Add the new session to the sessions array
            sessions.push("");

            // Return the unique ID
            return session_id;
        }
        
        // Add the minimum number of input areas to the DOM when the page loads, if not in update mode
        <?php if($update == false) { ?>
        window.onload = function() {
            for (var i = 0; i < 4; i++) {
                add_session();
            }
        };
        <?php } ?>




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