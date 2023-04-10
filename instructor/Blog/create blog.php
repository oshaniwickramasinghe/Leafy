<?php
 include '../includes/header.php';
 $user_ID = $_SESSION['USER_DATA']['user_id'];

 $update = false;

 $blog_ID="";
 $title="";
 $date="";
 $author="";
 $content1="";
 $comment="";
 $time="";
 $image1="";
 $description="";
 

 if(isset($_POST['submit']))
 {
   /* $blog_ID=mysqli_real_escape_string($conn,$_POST['blog_ID']); */
    $title=mysqli_real_escape_string($conn,$_POST['title']);
    $description=mysqli_real_escape_string($conn,$_POST['description']);
    $image1=$_FILES['image1']['name'];
    $image1_size=$_FILES['image1']['size'];
    $image1_tmp_name=$_FILES['image1']['tmp_name'];
    $image_folder="../images/".$image1;
    $quill_content = $_POST['content'];
    $content1 = mysqli_real_escape_string($conn, $quill_content);



    $sql1=" INSERT INTO blog(title,content1,image1,user_id,description) Values ('$title','$content1','$image1','$user_ID ','$description')";
   
    $result1=mysqli_query($conn,$sql1);
    if($result1){
        move_uploaded_file($image1_tmp_name, $image_folder);
       echo"<script>alert('Details added');window.location.href='blog.php';</script>";
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
             $content1=$record3['content1'];
             $description=$record3['description'];
             $time=$record3['time'];
             $image1=$record3['image1'];
         }
        
     }else{
         echo "<script>alert('Failed to edit data in database')</script>";
     }

     $update = true;
 }

 if(isset($_POST['update'])){

    $title=$_POST['title'];
    $date=$_POST['date'];
    $content1=$_POST['content'];
    $description=$_POST['description'];
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
 

    $query =  mysqli_query($conn,"UPDATE blog SET blog_id='$blog_ID', title='$title', 
    content1='$content1', description='$description', image1='$newimage1' WHERE blog_id='$blog_ID'");

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
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link href="https://cdn.quilljs.com/1.3.6/quill.bubble.css" rel="stylesheet">
    <link rel="stylesheet" href="create blog.css">
    <title>create blog</title>
        <!-- Include the Quill library -->
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
    <!--<script src="../includes/ckeditor/ckeditor.js"></script>
    <script src="../includes/ckfinder/ckfinder.js"></script>-->
    
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
                <label for="title">Topic</label><br>
                <select id="cars" name="cars">
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

           <div class="content">
                <label for="content">Content</label><br><br>
                <input type="hidden" name="content1">
                <div for="content1" class="content1" id="content1" name="content1"><?= $content1; ?></div>
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
        </div>
            <div align="center">
                <?php if($update == true) {?>
                    <input type="submit" value="Update Blog" name="update" class="btn" id="submit">
                <?php } else {?>     
                    <input type="submit" value="Submit" name="submit" class="btn" id="submit">
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
            // Replace the <textarea id="editor1"> with a CKEditor 4
            // instance, using default configuration.
             //var editor= CKEDITOR.replace( 'content1' );
             //CKFinder.setupCKEditor( editor );
            //CKEDITOR.disableAutoInline = true;
            //CKEDITOR.inline( 'content1' );

            var quill = new Quill('#content1', {
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
            
           
            var form = document.querySelector('form');
            form.onsubmit = function() {
            // Populate hidden form on submit
            var content = document.querySelector('input[name=content1]');
            content.value = JSON.stringify(quill.getContents());
            
            console.log("Submitted", $(form).serialize(), $(form).serializeArray());
            
            // No back end to actually submit to!
            alert('Open the console to see the submit data!')
            return false;

            }      
    </script>
</body>
</html>