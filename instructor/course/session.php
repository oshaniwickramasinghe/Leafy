<?php
 include '../includes/header.php';
 $user_ID = $_SESSION['USER_DATA']['user_id'];

 $update = false;

 $update = false;

 $session_ID="";
 $course_ID="";
 $title="";
 $description="";
 $date="";
 $time="";
 $image="";
 $content="";
 $question="";
 $option_1="";
 $option_2="";
 $option_3="";
 $option_4="";
 $answer="";


 if(isset($_GET['id']) && ($_GET['course']))
 {
     $course_ID = $_GET['course'];
     $session_ID = $_GET['id'];

 }
 
 if(isset($_POST['save']))
 {
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
        $course_id = mysqli_insert_id($conn); 
        $_SESSION['course_id'] =  $course_id;
       echo"<script>alert('Details added');</script>";
    }else{
        echo"Error: " . $sql1 . "<br>" . mysqli_error($conn);
    }
    
 }

 
 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../course/session.css">
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link href="https://cdn.quilljs.com/1.3.6/quill.bubble.css" rel="stylesheet">
    <title>Session Page</title>
        <!-- Include the Quill library -->
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
 </head>
 <body>
    <div class="container">
        <?php include "../includes/instructorMenu.php"; ?>
        <div class="create_form_wrapper">
            <div class="title">
                <h1>Create Session</h1>
            </div> 
            <div class="view-wrap"> 
                <div class="view">
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
                        <div class="forum" id="forum">
                            <form action="" method="post" enctype="multipart/form-data" id="step-form">
                                <div class="field">
                                    <div>
                                        <input type="hidden" name="course_id" value="<?= $course_ID;?>">
                                        <input type="hidden" name="date" value="<?= $date;?>">
                                        <input type="hidden" name="time" value="<?= $time;?>">
                                    </div>
                                    <div class="title">
                                        <label for="title">Title</label>
                                        <input type="text" id="title" name="title" placeholder="Title of the session..." class="text_input" value="<?= $title; ?>" required><br>
                                    </div>
                                    <div class="description">
                                        <label for="description">Description about session</label><br><br>
                                        <textarea for="description" id="description" placeholder="Short description about the session..." name="description" class="text_input"  value=""  required><?= $description; ?></textarea><br>
                                    </div>
                                    <div class="content">
                                        <label for="content">Content</label><br><br>
                                        <div for="content" class="content" id="content" name="content"><?= $content; ?></div>
                                    </div>
                                    <div class="quiz">
                                        <div>
                                            <label for="mcq">MCQ question for course followers</label><br><br>
                                            <textarea for="description" id="description" placeholder="Add a question for check course follwers knowledge..." name="description" class="text_input"  value=""  required><?= $description; ?></textarea><br>
                                        </div>
                                        <div class="options">
                                            <label for="option">Add 4 options for the answer</label><br><br>
                                            <input type="text" id="option-1" name="option" placeholder="first option..." class="option" value="" required><br>
                                            <input type="text" id="option-2" name="option" placeholder="second option..." class="option" value="" required><br>
                                            <input type="text" id="option-3" name="option" placeholder="third option..." class="option" value="" required><br>
                                            <input type="text" id="option-4" name="option" placeholder="fourth option..." class="option" value="" required><br>
                                        </div>
                                        <div class="answer">
                                            <label for="asnwer">Answer for the question</label><br><br>
                                            <input type="text" id="answer" name="answer" placeholder="answer for the question..." class="answer" value="" required><br>
                                        </div>
                                    </div> 
                                    <div class="images">
                                        <label for="image" >Image for the cover page of session</label><br><br>
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
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <footer>
           <?php include "../includes/footer.php";?>
    </footer>
    <script>
        var quill = new Quill('#content', {
            modules: {
                toolbar: [
                [{ header: [1, 2, 3, 4, false] }],
                [{'font':[]}],
                [{'align':[]}],
                ['bold', 'italic', 'underline', 'strike'],
                ['image', 'code-block', 'blockquote'],
                [{'list': 'ordered'}, {'list': 'bullet'}],
                [{'script': 'sub'}, {'script': 'super'}],
                [{'indent': '-1'}, {'indent': '+1'}],
                [{'direction': 'rtl'}],
                ['link', 'image', 'video', 'formula'],
                [{'color': []}, {'background': []}]
                ]
            },
            placeholder: 'Create your post...',
            theme: 'snow'  // or 'bubble'
        });

        // passing data to input
        function sendContent(){
        var addhtml=document.getElementById("content").children[0].innerHTML;

        document.getElementById('content1').value=addhtml;
        }
    
    </script>
 </body>
 </html>