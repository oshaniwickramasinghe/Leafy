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
$selected_color="";


if(isset($_POST['submit']))
{
  /* $blog_ID=mysqli_real_escape_string($conn,$_POST['blog_ID']); */
   $title = mysqli_real_escape_string($conn,$_POST['title']);
   $description = mysqli_real_escape_string($conn,$_POST['description']);
   $image1 = $_FILES['image1']['name'];
   $image1_size =$_FILES['image1']['size'];
   $image1_tmp_name =$_FILES['image1']['tmp_name'];
   $image_folder ="../images/".$image1;
   $selected_color = $_POST['color-picker'];
   if(isset($_POST['content1'])) {
    $content = $_POST['content1'];
    //rest of the code that uses $content variable
    } else {
        echo "Error: Content data is not set in the AJAX request.";
    }
    $content1 = mysqli_real_escape_string($conn, $content);



   $sql1=" INSERT INTO blog(title,content1,image1,user_id,description,color) Values ('$title','$content1','$image1','$user_ID ','$description','$selected_color')";
  echo($sql1);
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
            $selected_color=$record3['color'];
        }
       
    }else{
        echo "<script>alert('Failed to edit data in database')</script>";
    }

    $update = true;
}

if(isset($_POST['update'])){

   $title=$_POST['title'];
   $date=$_POST['date'];
   //if(isset($_POST['content1'])) {
    //$content1 = $_POST['content1'];
    //rest of the code that uses $content variable
    //} else {
    //    echo "Error: Content data is not set in the AJAX request.";
    //}
   $description=$_POST['description'];
   $time=$_POST['time'];
   $image1=$_POST['oldimage1'];
   $selected_color =$_POST['color-picker'];

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


   $query =  mysqli_query($conn,"UPDATE blog SET  title='$title', 
    description='$description', image1='$newimage1', color='$selected_color' WHERE blog_id='$blog_ID'");

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