<?php
 include '../includes/header.php';
 $user_ID = $_SESSION['USER_DATA']['user_id'];

 $update        = false;

 $session_ID    ="";
 $course_ID     ="";
 $title         ="";
 $description   ="";
 $date          ="";
 $mcq           ="";
 $image         ="";
 $content       ="";
 $question      ="";
 $option_1      ="";
 $option_2      ="";
 $option_3      ="";
 $option_4      ="";
 $answer        ="";

// Add content to session
 if(isset($_GET['id']) && ($_GET['course']))
 {
     $course_ID = $_GET['course'];
     $session_ID = $_GET['id'];

     if(isset($_POST['save']))
     {
        $title          = mysqli_real_escape_string($conn,$_POST['title']);
        $description    = mysqli_real_escape_string($conn,$_POST['description']);
        $content        = $_POST['content'];
        $mcq            = mysqli_real_escape_string($conn,$_POST['mcq']);
        $option_1       = mysqli_real_escape_string($conn,$_POST['option_1']);
        $option_2       = mysqli_real_escape_string($conn,$_POST['option_2']);
        $option_3       = mysqli_real_escape_string($conn,$_POST['option_3']);
        $option_4       = mysqli_real_escape_string($conn,$_POST['option_4']);
        $answer         = mysqli_real_escape_string($conn,$_POST['answer']);
        $image          = $_FILES['image']['name'];
        $image_size     = $_FILES['image']['size'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_folder   = "../images/".$image;
        
    
    // update the enter data
        $sql1 = "UPDATE course_session 
                SET 
                    title       = '$title', 
                    description = '$description', 
                    content     = '$content', 
                    mcq         = '$mcq', 
                    option_1    = '$option_1', 
                    option_2    = '$option_2', 
                    option_3    = '$option_3', 
                    option_4    = '$option_4', 
                    answer      = '$answer', 
                    image       = '$image' 
                WHERE 
                    course_id   = '$course_ID' 
                AND 
                    session_id  = '$session_ID'";
        
        $result1=mysqli_query($conn,$sql1);

        if($result1){
            move_uploaded_file($image_tmp_name, $image_folder); 
            echo"<script>alert('Details added');</script>";
        }else{
            echo"Error: " . $sql1 . "<br>" . mysqli_error($conn);
        }
        
     }

    
     

 }
 
 //Edit the already created session
 if(isset($_GET['edit_id']) && ($_GET['edit_course']))
 {
     $course_ID = $_GET['edit_course'];
     $session_ID= $_GET['edit_id'];
 
 
     $sql2 = "SELECT * FROM course_session WHERE course_id='$course_ID' && session_id='$session_ID'";
     $result2=mysqli_query($conn,$sql2);
     
 
     
     if($result2){
         while($record2 = mysqli_fetch_assoc($result2))
         {
             $title         = $record2['title'];
             $description   = $record2['description'];
             $content       = $record2['content'];
             $mcq           = $record2['mcq'];
             $option_1      = $record2['option_1'];
             $option_2      = $record2['option_2'];
             $option_3      = $record2['option_3'];
             $option_4      = $record2['option_4'];
             $answer        = $record2['answer'];
             $image         = $record2['image'];
         }
        
     }else{
         echo "<script>alert('Failed to edit data in database')</script>";
     }
 
     $update = true;

     //update the already entered data to session
    if(isset($_POST['update'])){

        $title          = mysqli_real_escape_string($conn,$_POST['title']);
        $description    = mysqli_real_escape_string($conn,$_POST['description']);
        $content        = $_POST['content'];
        $mcq            = mysqli_real_escape_string($conn,$_POST['mcq']);
        $option_1       = mysqli_real_escape_string($conn,$_POST['option_1']);
        $option_2       = mysqli_real_escape_string($conn,$_POST['option_2']);
        $option_3       = mysqli_real_escape_string($conn,$_POST['option_3']);
        $option_4       = mysqli_real_escape_string($conn,$_POST['option_4']);
        $answer         = mysqli_real_escape_string($conn,$_POST['answer']);
      
    
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
    
    
        $sql3 = "UPDATE course_session 
        SET 
            title       = '$title', 
            description = '$description', 
            content     = '$content', 
            mcq         = '$mcq', 
            option_1    = '$option_1', 
            option_2    = '$option_2', 
            option_3    = '$option_3', 
            option_4    = '$option_4', 
            answer      = '$answer', 
            image       = '$newimage' 
        WHERE 
            course_id   = '$course_ID' 
        AND 
            session_id  = '$session_ID'";

        $result3=mysqli_query($conn,$sql3);
    
        if($result3)
        {
            $message[]='Details updated successfully!';
            ?>
            <META http-equiv="Refresh" content="6;">
            <?php
        }else{
            $message[]='update failed!';
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
    <link rel="stylesheet" href="../course/session.css">
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link href="https://cdn.quilljs.com/1.3.6/quill.bubble.css" rel="stylesheet">
    <title>Session Page</title>
    <!-- Include the Quill library -->
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
   
    <!-- Include Quill video resize module -->
    
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
                                        <div class="content1" id="content1" name="content1"><?= $content; ?></div>
                                        <input type="hidden" name="content" id="content" value="">
                                    </div>
                                    <div class="quiz">
                                        <div>
                                            <label for="mcq">MCQ question for course followers</label><br><br>
                                            <textarea for="mcq" id="mcq" placeholder="Add a question for check course follwers knowledge..." name="mcq" class="text_input"  value=""  required><?= $mcq; ?></textarea><br>
                                        </div>
                                        <div class="options">
                                            <label for="option">Add 4 options for the answer</label><br><br>
                                            <input type="text" id="option_1" name="option_1" placeholder="first option..." class="option" value="<?=$option_1;?>" required><br>
                                            <input type="text" id="option_2" name="option_2" placeholder="second option..." class="option" value="<?=$option_2;?>" required><br>
                                            <input type="text" id="option_3" name="option_3" placeholder="third option..." class="option" value="<?=$option_3;?>" required><br>
                                            <input type="text" id="option_4" name="option_4" placeholder="fourth option..." class="option" value="<?=$option_4;?>" required><br>
                                        </div>
                                        <div class="answer">
                                            <label for="asnwer">Answer for the question</label><br><br>
                                            <input type="text" id="answer" name="answer" placeholder="answer for the question..." class="answer" value="<?=$answer;?>" required><br>
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
                                        <?php if($update == true) {?>
                                            <button type="submit" onclick="sendContent()" value="update" name="update" class="btn">Update</button>
                                        <?php } else {?>     
                                            <button type="submit" onclick="sendContent()" value="Save" name="save" class="btn" id="save-btn">Save</button>
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

        var toolbarOptions = [
        ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
        ['blockquote', 'code-block'],

        [{ 'header': 1 }, { 'header': 2 }],               // custom button values
        [{ 'list': 'ordered'}, { 'list': 'bullet' }],
        [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
        [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
        [{ 'direction': 'rtl' }],                         // text direction

        [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
        [{ 'header': [1, 2, 3, 4, 5, 6, false] }],

        [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
        [{ 'font': [] }],
        [{ 'align': [] }],

        ['link', 'image', 'video', 'formula'],

        [{'color': []}, {'background': []}],

        ['clean']                                         // remove formatting button
        ];

        var quill = new Quill('#content1', {
            modules: {
                toolbar: toolbarOptions  
            },
            placeholder: 'Create your post...',
            theme: 'snow'  // or 'bubble'
        });

        // passing data to input
        function sendContent(){
        var addhtml=document.getElementById("content1").children[0].innerHTML;

        document.getElementById('content').value=addhtml;
        }
    
    </script>
 </body>
 </html>