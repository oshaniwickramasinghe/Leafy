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

 if(isset($_POST['Save']))
 {
   /* $blog_ID=mysqli_real_escape_string($conn,$_POST['blog_ID']); */
    $title=mysqli_real_escape_string($conn,$_POST['title']);
    $content=mysqli_real_escape_string($conn,$_POST['content']);
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
       echo"<script>alert('Details added');window.location.href='blog.php';</script>";
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
         echo "<script>alert('Failed to delete from database')</script>";
     }

     $update = true;
 }

 if(isset($_POST['update'])){
    $blog_ID=$_POST['blog_id'];
    $title=$_POST['title'];
    $date=$_POST['date'];
    $content1=$_POST['content1'];
    $time=$_POST['time'];
    $image1=$_POST['oldimage1'];

    if(isset($_FILES['image1']['name']) && ($_FILES['image1']['name']!= ""))
    {
        $newimage1=$_FILES['image1']['name'];
        $newimage1_size=$_FILES['image1']['size'];
        $newimage1_tmp_name=$_FILES['image1']['tmp_name'];
        $image_folder="../images/".$newimage1;
        move_uploaded_file($newimage1_tmp_name, $image_folder);

    }
    else{
        $newimage1 = $image1;
    }

    $query =  mysqli_query($conn,"UPDATE blog SET blog_id='$blog_ID', title='$title', date=' $date', 
     content1='$content1', time='$time', image1='$newimage1' WHERE blog_id='$blog_ID'") 
    or die('query failed');

    if($query)
    {
        $message[]='update your details successfully!';
        ?>
        <META http-equiv="Refresh" content="6; URL=http://localhost/leafy/instructor/blog/blog.php">
        <?php
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

    <h1>Create a Course </h1>
    <div class="create_form_wrapper">
    
        <form action="" method="post" enctype="multipart/form-data" id="step-form">
            
          <div class="field">
            <div>
                <input type="hidden" name="course_ID" value="<?= $course_ID;?>">
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
                <label for="image">Image for the cover page of course</label><br><br>
            <div class="image">
                <input type="hidden" name="oldimage1" value="<?= $image;?>">
                <input type="file" name="image" class="text_input" accept="image/jpg, image/jpeg, image/png"><br>

                <?php if($update == true) {?>
                <div>
                    <img src="../images/<?= $image; ?>" width ="120" class="img-thumbnail">
                </div>
                <?php } else {?>
                <div>
                    <img src="../images/<?= $image; ?>" width ="120" class="img-thumbnail" style="visibility:hidden" >
                </div>
                <?php } ?>
            </div>
            </div>
          
        <!-- <div>
                <label for="image">Attach images</label>
                <input type="hidden" name="oldimage" value="<?= $image; ?>">
                <input type="file" name="image" class="text_input" accept="image/jpg, image/jpeg, image/png"><br>
            </div>
            <?php if($update == true) {?>
                <div>
                    <img src="./images/<?= $image; ?>" width ="120" class="img-thumbnail">
                </div>
            <?php } else {?>
                <div>
                    <img src="./images/<?= $image; ?>" width ="120" class="img-thumbnail" style="visibility:hidden" >
                </div>
            <?php } ?>-->
            </div>
            <div class="button-section">
                <button onclick="createTextAreas()" type="submit" class="btn" id="continue">Continue</button>
                <input type="submit" value="Save" name="Save" class="btn">
             </div> 
         </form>
      
    </div>
    <div align="right">
        <a href="course.php" class="goback-btn">go back >></a> 
    </div>    

    <footer>
           <?php include "../includes/footer.php";?>
    </footer>

    
    <script>
        document.getElementById("content").value = "<?= $content;?>";

        function createTextAreas() {
            console.log("this is the message");
        // Get the user input for the number of text areas
        const steps = parseInt(document.getElementById("steps").value);

        // Create a new HTML page to show the text areas
        const newPage = window.open("", "_blank");

        // Create the required number of text areas
        for (let i = 1; i <= steps; i++) {
            const textarea = document.createElement("textarea");
            textarea.id = `textarea${i}`;
            textarea.name = `textarea${i}`;
            textarea.required = true;
            const label = document.createElement("label");
            label.innerHTML = `Step ${i}: `;
            label.appendChild(textarea);
            newPage.document.body.appendChild(label);

            // Create a "Continue" button for each text area
            const continueButton = document.createElement("button");
            continueButton.innerHTML = "Continue";
            continueButton.onclick = function () {
            // Check if all previous text areas have been filled
            let isFilled = true;
            for (let j = 1; j < i; j++) {
                const previousTextarea = newPage.document.getElementById(`textarea${j}`);
                if (!previousTextarea.value) {
                isFilled = false;
                break;
                }
            }

            // If all previous text areas have been filled, show the next text area
            if (isFilled) {
                newPage.location.href = `page${i + 1}.php`;
            } else {
                alert("Please fill all previous steps before continuing.");
            }
            };
            newPage.document.body.appendChild(continueButton);
        }

        // Create a "Submit" button for the final page
        if (steps > 0) {
            const submitButton = document.createElement("button");
            submitButton.innerHTML = "Submit";
            submitButton.onclick = function () {
            // Check if all text areas have been filled
            let isFilled = true;
            for (let j = 1; j <= steps; j++) {
                const textarea = newPage.document.getElementById(`textarea${j}`);
                if (!textarea.value) {
                isFilled = false;
                break;
                }
            }

            // If all text areas have been filled, submit the form
            if (isFilled) {
                newPage.document.body.innerHTML = "Form submitted!";
                // Code to submit the form goes here...
            } else {
                alert("Please fill all steps before submitting.");
            }
            };
            newPage.document.body.appendChild(submitButton);
        }
        }
    


     
    </script>
</body>
</html>
