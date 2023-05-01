<?php

// include 'saveUpdateBlog.php';
include '../includes/header.php';
$user_ID = $_SESSION['USER_DATA']['user_id'];

$update = false;

$blog_ID           ="";
$title             ="";
$date              ="";
$topic             ="";
$author            ="";
$content1          ="";
$comment           ="";
$time              ="";
$image1            ="";
$description       ="";
$selected_color    ="";
$content           ="";
$opacity           ="";
$background_color  ="";
$status            ="";


if(isset($_POST['submit']))
{
  /* $blog_ID=mysqli_real_escape_string($conn,$_POST['blog_ID']); */
   $title = mysqli_real_escape_string($conn,$_POST['title']);
   $description = mysqli_real_escape_string($conn,$_POST['description']);
   $content1 = mysqli_real_escape_string($conn, $_POST['content1']);
   $topic=$_POST['topic'];
   $image1 = $_FILES['image1']['name'];
   $image1_size =$_FILES['image1']['size'];
   $image1_tmp_name =$_FILES['image1']['tmp_name'];
   $image_folder ="../images/".$image1;
   $selected_color = $_POST['color-picker'];
   $opacity = $_POST['opacity-slider'];
   $background_color=$_POST['blog-background'];
   $status=$_POST['status'];



   $sql1=" INSERT INTO blog(topic,title,content1,image1,user_id,description,color,status) Values ('$topic',$title','$content1','$image1','$user_ID ','$description','$selected_color','$status')";
    echo($sql1);
   $result1=mysqli_query($conn,$sql1);
   if($result1){
       move_uploaded_file($image1_tmp_name, $image_folder);
       ?>
       <META http-equiv="Refresh" content="6; URL=http://localhost/leafy/instructor/blog/blog.php">
       <?php
   }else{
       echo"Error: " . $sql1 . "<br>" . mysqli_error($conn);
   }


   
}



if(isset($_GET['edit']))
{
    $blog_ID = $_GET['edit'];


    $query3 = "SELECT * FROM blog WHERE blog_id=$blog_ID";
    $stmt3 = mysqli_query($conn,$query3);
    

    
    if($stmt3){
        while($record3 = mysqli_fetch_assoc($stmt3))
        {
            $blog_ID=$record3['blog_id'];
            $title=$record3['title'];
            $date=$record3['date'];
            $topic=$record3['topic'];
            $content1=$record3['content1'];
            $description=$record3['description'];
            $time=$record3['time'];
            $image1=$record3['image1'];
            $opacity = $record3['opacity'];
            $selected_color=$record3['color'];
            $status=$record3['status'];
        }
       
    }else{
        echo "<script>alert('Failed to edit data in database')</script>";
    }

    $update = true;
}

if(isset($_POST['update'])){

   $title=$_POST['title'];
   $topic=$_POST['topic'];
   $date=$_POST['date'];
   $content1 = $_POST['content1'];
   $description=$_POST['description'];
   $time=$_POST['time'];
   $image1=$_POST['oldimage1'];
   $selected_color =$_POST['color-picker'];
   $opacity = $_POST['opacity-slider'];
   $background_color = $_POST['blog-background'];
   $status=$_POST['status'];

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


   $query =  mysqli_query($conn,"UPDATE blog SET  title='$title',content1='$content1',topic='$topic',
    description='$description', image1='$newimage1', color='$selected_color', opacity='$opacity', background_color='$background_color', status='$status' WHERE blog_id='$blog_ID'");

   if($query)
   {
       $message[]='Details updated successfully!';
       ?>
       <META http-equiv="Refresh" content="6; URL=http://localhost/leafy/instructor/blog/blog.php">
       <?php
   }else{
       $message[]='update failed!';
   }
   
}


?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link href="https://cdn.quilljs.com/1.3.6/quill.bubble.css" rel="stylesheet">
    <link rel="stylesheet" href="create blog.css">
    <title>create blog</title>
    <!-- Include the Quill library -->
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
    <!--<script src="../includes/ckeditor/ckeditor.js"></script>
    <script src="../includes/ckfinder/ckfinder.js"></script>-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    
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

    <h1>Create a Blog Page</h1>
    <div class="create_form_wrapper">
    
        <form action="" id="myForm" method="post" enctype="multipart/form-data">
            
          <div class="field">
            <div>
                <input type="hidden" name="blog_ID" value="<?= $blog_ID;?>">
                <input type="hidden" name="date" value="<?= $date;?>">
                <input type="hidden" name="time" value="<?= $time;?>">
            </div>
            <div>
                <label for="topic">Topic</label><br>
                <select id="topic" name="topic" value="$topic">
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
            <div>
                <label for="title">Title</label><br>
                <input type="text" id="title" name="title" placeholder="Title of the Blog..." class="text_input" value="<?= $title; ?>" required><br>
            </div>
            <div class="description">
                <label for="description">Description</label><br><br>
                <textarea for="description" id="description" placeholder="Short description about the blog..." name="description" class="text_input"  value=""  required><?= $description; ?></textarea><br>
            </div>

           <div class="contents">
                <label for="content1">Content</label><br><br>
                <div for="content" class="content" id="content" name="content"><?= $content1; ?></div>
                <input type="hidden" name="content1" id="content1">
            </div>
            <div class="images">
            <label for="image">Image for the cover page of blog</label><br><br>
            <div class="image">
                <input type="hidden" name="oldimage1" value="<?= $image1; ?>">
                <input type="file" name="image1" class="text_input" accept="image/jpg, image/jpeg, image/png"><br>

                <?php if($update == true) {?>
                <div>
                    <img src="../images/<?= $image1; ?>" width ="120" class="img-thumbnail">
                </div>
                <?php } else {?>
                <div>
                    <img src="../images/<?= $image1; ?>" width ="120" class="img-thumbnail" style="visibility:hidden" >
                </div>
                <?php } ?>
            </div>
            </div>

            <div>
                <label for="status">Status</label><br>
                <select id="status" name="status">
                    <option value="Complete">Complete</option>
                    <option value="Not Complete">Not Complete</option>
                </select><br>
            </div>

            <div class="color">
                <div>
                    <label for="color-picker">Select a background color for blog:</label>
                    <input type="color" id="color-picker" name="color-picker" value="<?= $selected_color; ?>">
                </div>
                <div>
                    <label for="opacity-slider">Select opacity:</label>
                    <input type="range" id="opacity-slider" name="opacity-slider" min="0" max="1" step="0.1" value="<?= $selected_opacity; ?>">
                </div>
                <input type="hidden" id="blog-background" name="blog-background">
            </div>
            


            </div>
            <div align="center">
                <?php if($update == true) {?>
                    <input type="submit" onclick="sendContent()" value="Update Blog" name="update" class="btn" id="submit">
                <?php } else {?>     
                    <input type="submit" onclick="sendContent()" value="Submit" name="submit" class="btn" id="submit">
                <?php } ?>
        </div>
            
         </form>
      
    </div>
    <div align="right">
        <a href="blog.php" class="goback-btn">go back to blog page >></a> 
    </div>    

    <footer>
           <?php include "../includes/footer.php";?>
    </footer>

    <script>
    
    const colorPicker = document.getElementById("color-picker");
    const opacitySlider = document.getElementById("opacity-slider");
    const background = document.getElementById("blog-background");

    function updateBackground() {
        const color = colorPicker.value;
        const opacity = opacitySlider.value;

            color.onchange = function(){
            var hex_code = this.value.split("");
            var red = parseInt(hex_code[1]+hex_code[2],16);
            var green = parseInt(hex_code[3]+hex_code[4],16);
            var blue = parseInt(hex_code[5]+hex_code[6],16);
            var rgb = red+","+green+","+blue;
            alert(rgb);
        }


        const backgroundColor = `${color}${Math.round(opacity * 255).toString(16).padStart(2, '0')}`;

        background.value = backgroundColor;
    }

    //when change the input field in color-picker or opacity-slider call the updateBackground function 
    colorPicker.addEventListener("input", updateBackground);
    opacitySlider.addEventListener("input", updateBackground);

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

        var quill = new Quill('#content', {
            modules: {
                toolbar: toolbarOptions  
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